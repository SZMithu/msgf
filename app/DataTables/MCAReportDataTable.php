<?php

namespace App\DataTables;

use App\Models\MCAFileForAdmin;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;


class MCAReportDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns([
                // 'checkbox',
                'created-on',
                'source',
                'company',
                'owner',
                'business type',
                'credit score',
                'status',
                'manual approval',
                'original status',
                'approval amount',
                'approval risk',
                'actions'
            ])
            // ->addColumn('checkbox', function ($row) {
            //     return '<input type="checkbox" name="report_ids[]" value="' . $row->id . '">';
            // })
            ->addColumn('created-on', fn($row) => '<span>' . $row->created_at->format('d M Y, h:i a') . '</span>')
            ->addColumn(
                'source',
                fn($row) =>
                $row->isFromEmail()
                    ? '<span class="badge bg-info">Email</span>'
                    : '<span class="badge bg-primary">Upload</span>'
            )
            ->addColumn('company', fn($row) => '<span class="fw-bold">' . $row->company . '</span>')
            ->addColumn('owner', fn($row) => $row->owner_name)
            ->addColumn('business type', fn($row) => $row->business_type)
            ->addColumn('credit score', fn($row) => $row->credit_score)
            ->addColumn('status', function ($row) {
                return $row->report()->exists()
                    ? '<p>' . $row->report->status . '</p>'
                    : '<p>' . $row->status . '</p>';
            })
            ->addColumn('manual approval', function ($row) {
                $class = str_contains($row->status, 'Approved') ? 'text-bg-info' : 'text-bg-danger';
                return '<a class="manualApproval badge btn-sm ' . $class . '" type="button" id="' . $row->id . '" href="#">' . $row->status . '</a>';
            })
            ->addColumn('original status', function ($row) {
                if ($row->report()->exists()) {
                    $class = str_contains($row->report->original_status, 'Approved') ? 'badge text-bg-info' : '';
                    return '<p class="' . $class . '">' . $row->report->original_status . '</p>';
                }
                return '<a class="badge btn-sm">In Process</a>';
            })
            ->addColumn('approval amount', fn($row) => $row->approved_amount)
            ->addColumn('approval risk', fn($row) => $row->approval_risk)
            ->addColumn('action', function (MCAFileForAdmin $row) {
                return view('pages/apps.mca-management.columns._actions', compact('row'));
            })
            ->setRowId('id');
    }

    public function query(MCAFileForAdmin $model)
    {
        return $model->newQuery()->latest();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('mca-reports-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(0)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/mca-management/columns/_draw-scripts.js')) . "}");
    }

    protected function getColumns()
    {
        return [
            // Column::computed('checkbox')->title('<input type="checkbox" id="select-all">')->exportable(false)->printable(false)->width(10)->addClass('text-center'),
            Column::make('id'),
            Column::make('created-on')->title('Created Date'),
            Column::make('source'),
            Column::make('company'),
            Column::make('owner'),
            Column::make('business type'),
            Column::make('credit score'),
            Column::make('status'),
            Column::make('manual approval'),
            Column::make('original status'),
            Column::make('approval amount'),
            Column::make('approval risk'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(100)
        ];
    }

    protected function filename(): string
    {
        return 'MCA_Reports_' . date('YmdHis');
    }
}
