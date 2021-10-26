<?php

namespace App\DataTables;

use App\Models\Equipment;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EquipmentDataTable extends DataTable
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
            ->editColumn('image', '
            <a href="{{asset($image)}}" data-toggle="lightbox">
                <img src="{{asset($image)}}" class="img-fluid" style="max-height: 100px;">
            </a>')
            ->editColumn('created_at', function (Equipment $equipment) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $equipment->created_at)->format('d-m-Y H:i:s');
            })
            ->addColumn('action', function (Equipment $equipment) {
                $show = '<a href="' . route('laboratory.equipment.show', ['slug' => $equipment->laboratory->slug, 'id' => $equipment->id]) . '" target="_blank" class="btn btn-info btn-sm">Lihat</a>';
                $edit = '<a href="' . route('admin.equipments.edit', $equipment->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                $delete = '<a href="#" onclick="_delete(event, \'' . $equipment->id . '\')" class="btn btn-danger btn-sm">Hapus</a>';
                return $show . ' ' . $edit . ' ' . $delete;
            })
            ->rawColumns(['image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Equipment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Equipment $model)
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
            ->setTableId('equipment-table')
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
            Column::make('id')->addClass('text-center'),
            Column::make('image')
                ->title('Gambar')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
            Column::make('name')->title('Nama'),
            Column::make('laboratory.name')->title('Laboratorium'),
            Column::make('created_at')->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(170)
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
        return 'Equipment_' . date('YmdHis');
    }
}
