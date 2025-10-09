<?php

namespace App\DataTables;

use App\Models\Referral;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\Request;

class ReferralTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query ,Request $request): EloquentDataTable
    {
        // $query = $query->orderBy('id', 'DESC');
        $id= $request->segment(2);
        // print_r($id); die;
        $query = $query->select('referral.*','form_submissions.lead_type') 
        ->leftJoin('links', 'referral.referral_id', '=', 'links.id') 
        ->leftJoin('form_submissions', 'form_submissions.id', '=', 'referral.form_id')

        ->where('referral.referral_id',$id)
        ->orderBy('referral.id', 'DESC');

        return (new EloquentDataTable($query))
            
            ->rawColumns(['user', 'last_login_at', 'checkbox'])
            ->editColumn('user', function (Referral $Referral) {
                return view('pages/apps.referral-management.forms.columns._user', compact('Referral'));
            })
            ->editColumn('b_name', function (Referral $Referral) {
				return view('pages/apps.referral-management.forms.columns._bname', compact('Referral'));
                // return ucwords($FormSubmission->b_name);
            })
            ->editColumn('created_at', function (Referral $Referral) {
                return $Referral->created_at->format('d M Y,h:i a');
            })
            ->addColumn('action', function (Referral $FormSubmission) {
                return view('pages/apps.referral-management.forms.columns._actions', compact('FormSubmission'));
            })->addColumn('serial', function ($row) {

                    $start = request()->input('start', 1);
                
                    static $serial =null;
                    if ($serial === null) {
                        $serial = $start+1;
                    }
                    return $serial++;
              
                
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Referral $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('referral-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>")
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(2)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/user-management/users/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            // Column::make('id')->title('id'),
            Column::computed('serial')
            ->title('S.No.'),
            Column::make('type')->title('Type')->addClass('text-nowrap'),
            Column::make('lead_type')->title('lead_type id')->addClass('text-nowrap'),
            Column::make('created_at')->title('Date')->addClass('text-nowrap'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->orderable(false)
        ];
    }



    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}

