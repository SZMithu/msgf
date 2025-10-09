<?php

namespace App\DataTables;

use App\Models\FormSubmission;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class FormDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $query = $query->orderBy('id', 'DESC');

        return (new EloquentDataTable($query))
            ->addColumn('checkbox', function (FormSubmission $FormSubmission) {
                return '<input type="checkbox" name="form_ids[]" value="' . $FormSubmission->id . '">';
            })
            ->rawColumns(['user', 'last_login_at', 'checkbox'])
            ->editColumn('user', function (FormSubmission $FormSubmission) {
                return view('pages/apps.form-management.forms.columns._user', compact('FormSubmission'));
            })
            ->editColumn('b_name', function (FormSubmission $FormSubmission) {
				return view('pages/apps.form-management.forms.columns._bname', compact('FormSubmission'));
                // return ucwords($FormSubmission->b_name);
            })
            ->editColumn('created_at', function (FormSubmission $FormSubmission) {
                return $FormSubmission->created_at->format('d M Y,h:i a');
            })
            ->addColumn('action', function (FormSubmission $FormSubmission) {
                return view('pages/apps.form-management.forms.columns._actions', compact('FormSubmission'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(FormSubmission $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('form-table')
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
            Column::computed('checkbox')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')
                ->width(20),
            Column::make('f_name')->title('first-name'),
            Column::make('b_name')->title('business-name'),
            Column::make('business_industry')->title('business-industry'),
            Column::make('amt')->title('Amount')->addClass('text-nowrap'),
            Column::make('average')->title('Monthly Revenue')->addClass('text-nowrap'),
            Column::make('created_at')->title('Date')->addClass('text-nowrap'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60)
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

