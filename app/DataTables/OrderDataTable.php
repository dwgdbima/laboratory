<?php

namespace App\DataTables;

use App\Models\Order;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
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
            ->editColumn('created_at', function (Order $order) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d-m-Y H:i:s');
            })
            ->editColumn('price', function(Order $order){
                return formatRupiah($order->price);
            })
            ->editColumn('acceptance', function(Order $order) {
                if($order->acceptance == 0){
                    $acceptance = '<span class="badge badge-warning"><i class="fas fa-clock"></i> Tertunda</span>';
                }elseif($order->acceptance == 1){
                    $acceptance = '<span class="badge badge-success"><i class="fas fa-check"></i> Disetujui</span>';
                }else{
                    $acceptance = '<span class="badge badge-danger"><i class="fas fa-times"></i> Ditolak</span>';
                }
                return $acceptance;
            })
            ->editColumn('payment', function(Order $order){
                if($order->payment == 0){
                    $payment = '<span class="badge badge-warning"><i class="fas fa-clock"></i> Proses</span>';
                }elseif($order->payment == 1){
                    $payment = '<span class="badge badge-success"><i class="fas fa-check"></i> Lunas</span>';
                }else{
                    $payment = '<span class="badge badge-danger"><i class="fas fa-exclamation"></i> Baru</span>';
                }
                return $payment;
            })
            ->addColumn('action', '
            <a href="#" onclick="show({{$id}}), event.preventDefault();" class="btn btn-info btn-sm">Detail</a>
            <a href="#" onclick="destroy({{$id}}), event.preventDefault();" class="btn btn-danger btn-sm">Hapus</a>')
            ->rawColumns(['acceptance', 'payment', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->with(['service.unit', 'customerStatus'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('order-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(7)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    )
                    ->scrollX(true);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('order_id')->title('ID Pemesanan')->addClass('text-center'),
            Column::make('service.name')->title('Layanan'),
            Column::make('name')->title('Nama'),
            Column::make('phone')->title('No. Telepon'),
            Column::make('price')->title('Harga')->addClass('text-right'),
            Column::make('acceptance')->title('Persetujuan')->addClass('text-center'),
            Column::make('payment')->title('Pembayaran')->addClass('text-center'),
            Column::make('created_at')->title('Waktu Pesan')->addClass('text-center'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width('150')
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
        return 'Order_' . date('YmdHis');
    }
}
