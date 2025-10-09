<?php

namespace App\DataTables;

use App\Models\Links;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LinkTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query,Request $request): EloquentDataTable
    {

        if ($request->has('from') || $request->has('to')) {
            $startDate = $request->input('from');
            $endDate = $request->input('to');
        
            if (!empty($startDate) && !empty($endDate)){
                $endDateInclusive = Carbon::parse($endDate)->endOfDay();
                $startDateInclusive = Carbon::parse($startDate)->startOfDay();

                $query->whereBetween('referral.created_at', [$startDateInclusive, $endDateInclusive]);
                // print_r($startDateInclusive); die;
            } elseif (!empty($startDate)){
                $startDateInclusive = Carbon::parse($startDate)->startOfDay();

                $query->where('referral.created_at', '>=', $startDateInclusive);
            } elseif (!empty($endDate)){
                $endDateInclusive = Carbon::parse($endDate)->endOfDay();
                $query->where('referral.created_at', '<=', $endDateInclusive);
                // print_r($endDateInclusive);
            }
        }

        if ($request->has('link')) {
            $links = $request->input('link');
        
                $query->whereIn('links.id',$links);
        
        }

        if ($request->has('status')) {
            $status = $request->input('status');
            if(!empty($status)){
                $query->where('form_submissions.lead_type',$status);
            }
        
        }
        $query->leftJoin('referral', 'referral.referral_id', '=', 'links.id')
        ->leftJoin('form_submissions', 'form_submissions.id', '=', 'referral.form_id')
        ->select('links.*', 
                 \DB::raw('COUNT(referral.referral_id) as link_count'),
                 \DB::raw('SUM(CASE WHEN referral.type = "Hit" THEN 1 ELSE 0 END) as counthits'),
                 \DB::raw('SUM(CASE WHEN referral.type = "Lead" THEN 1 ELSE 0 END) as countleads'))

                 ->groupBy('links.id')

        ->orderBy('links.id', 'DESC');
// print_r($query); die;
        return (new EloquentDataTable($query))
            
            ->rawColumns(['user', 'last_login_at', 'checkbox'])
            ->editColumn('user', function (Links $Links) {
                return view('pages/apps.links-management.links.columns._user', compact('Links'));
            })
            ->editColumn('links', function (Links $Links) {
				return view('pages/apps.links-management.links.columns._bname', compact('Links'));
            })
            ->editColumn('created_at', function (Links $Links) {
                return $Links->created_at->format('d M Y,h:i a');
            })
            ->addColumn('action', function (Links $FormSubmission) {
                return view('pages/apps.links-management.links.columns._actions', compact('FormSubmission'));
            })
            ->setRowId('id');
    }

  
    public function query(Links $model): QueryBuilder
    {
        return $model->newQuery();
    }

    
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('link-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>")
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(2)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/user-management/users/columns/_draw-scripts.js')) . "}");
    }

   
    public function getColumns(): array
    {
        return [
            Column::make('links')->title('links'),
            Column::make('counthits')->title('hits')->addClass('text-nowrap'),
            Column::make('countleads')->title('leads')->addClass('text-nowrap'),
            Column::make('created_at')->title('Date')->addClass('text-nowrap'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->orderable(false)
        ];
    }



    
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}

