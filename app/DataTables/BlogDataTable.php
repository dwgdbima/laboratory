<?php

namespace App\DataTables;

use App\Models\Blog;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BlogDataTable extends DataTable
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
            ->editColumn('created_at', function (Blog $blog) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('d-m-Y H:i:s');
            })
            ->addColumn('action', function (Blog $blog) {
                $show = '<a href="' . route('blog.show', $blog->slug) . '" target="_blank" class="btn btn-info btn-sm">Lihat</a>';
                $edit = '<a href="' . route('admin.blogs.edit', $blog->slug) . '" class="btn btn-primary btn-sm">Edit</a>';
                $delete = '<a href="#" onclick="_delete(event, \'' . $blog->slug . '\')" class="btn btn-danger btn-sm">Hapus</a>';
                return $show . ' ' . $edit . ' ' . $delete;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Blog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Blog $model)
    {
        if (request()->user()->hasRole('super-admin')) {
            return $model->with('user')->newQuery();
        } else {
            return $model->where('user_id', request()->user()->id)->with('user')->newQuery();
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
            ->setTableId('blog-table')
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
            Column::make('title')->title('Judul'),
            Column::make('user.name')->title('Author'),
            Column::make('created_at')->title('Dibuat')
                ->addClass('text-center'),
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
        return 'Blog_' . date('YmdHis');
    }
}
