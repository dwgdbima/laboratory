<?php

namespace App\DataTables;

use App\Models\Test;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TestDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function (Test $test) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $test->created_at)->format('d-m-Y H:i:s');
            })
            ->addColumn('action', '
            <a href="#" onclick="edit(event, {{$id}})" class="btn btn-primary btn-sm">Edit</a>
            <a href="#" onclick="_delete(event, {{$id}})" class="btn btn-danger btn-sm">Hapus</a>');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Test $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Test $model)
    {
        if (auth()->user()->hasRole('super-admin')) {
            return $model->with('laboratory')->newQuery();
        }
        if (auth()->user()->hasRole('admin')) {
            return $model->with('laboratory')->where('laboratory_id', auth()->user()->laboratory->id)->newQuery();
        }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('test-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('title')->title('Nama'),
            Column::make('laboratory.name')->title('Laboratorium'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Test_' . date('YmdHis');
    }
}
