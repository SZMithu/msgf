<?php

namespace App\DataTables;

use App\Models\MCAScannedEmails;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class MCAScannedEmailsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns([
                'id',
                'created-on',
                'subject',
                'total file',
                'report id',
                'report status',
                'actions'
            ])
            ->addColumn('created-on', fn($row) => '<span>' . $row->created_at->format('d M Y, h:i a') . '</span>')
            ->addColumn('subject', function ($row) {
                return $row["subject"];
            })
            ->addColumn('total file', function ($row) {
                $response = $row->attachments_count;
                return $response;
            })
            ->addColumn('report id', function ($row) {
                $report_id = 'Null';
                if ($row->report()->exists()) {
                    $report_id = $row->report->id;
                }
                return $report_id;
            })
            ->addColumn('report status', function ($row) {
                $response = $row->report_status;
                if ($row->report()->exists()) {
                    $response = $row->report->status;
                }
                return $response;
            })

            ->addColumn('action', function (MCAScannedEmails $row) {
                return view('pages/apps.mca-management.scanned-emails.columns._actions', compact('row'));
            })
            ->setRowId('id');
    }

    public function query(MCAScannedEmails $model)
    {
        return $model->newQuery()->latest();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('mca-scanned-emails-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(0)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/mca-management/scanned-emails/columns/_draw-scripts.js')) . "}");
    }

    protected function getColumns()
    {
        return [
            // Column::computed('checkbox')->title('<input type="checkbox" id="select-all">')->exportable(false)->printable(false)->width(10)->addClass('text-center'),
            Column::make('id'),
            Column::make('created-on')->title('Created Date'),
            Column::make('subject'),
            Column::make('total file'),
            Column::make('report id'),
            Column::make('report status'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(100)
        ];
    }

    protected function filename(): string
    {
        return 'MCA_Scanned_Emails' . date('YmdHis');
    }
}
