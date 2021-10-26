<?php

namespace App\DataTables;

use App\Models\Laboratory;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LaboratoryDataTable extends DataTable
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
            ->addColumn('action', '
            <a href="#" onclick="edit(event, {{$id}})" class="btn btn-primary btn-sm">Edit</a>
            <a href="#" onclick="_delete(event, {{$id}})" class="btn btn-danger btn-sm">Hapus</a>');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Laboratory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Laboratory $model)
    {
        return $model->with('user')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('laboratory-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->dom('Bfrtip')
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
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
            Column::make('name'),
            Column::make('user.email')
                ->title('Email'),
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
        return 'Laboratory_' . date('YmdHis');
    }
}
