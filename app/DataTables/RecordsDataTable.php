<?php

namespace App\DataTables;

use App\Models\Record;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RecordsDataTable extends DataTable
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
            ->editColumn('created_at', function ($record) {
                return $record->created_at->format('d/m/Y');
            })
            ->editColumn('updated_at', function ($record) {
                return $record->updated_at->format('d/m/Y');
            })
            ->editColumn('user_id', function ($record) {
                return $record->user_id;
            })
            ->editColumn('course_id', function ($record) {
                return $record->course_id;
            })
            ->editColumn('title', function ($record) {
                return $record->title;
            })
            ->editColumn('description', function ($record) {
                return $record->description;
            })
            ->editColumn('price', function ($record) {
                return number_format($record->price, 2, ',', ' ') . ' fcfa';
            })
            ->editColumn('image', function ($record) {
                return $record->image;
            })
            ->addColumn('show', function ($record) {
                return '<a href="' . route('records.show', $record->id) . '" class="btn btn-xs btn-info btn-block">Voir</a>';
            })
            ->rawColumns(['user', 'user_id', 'course_id', 'show']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Record $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Record $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('records-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->parameters([
                        'order' => [1, 'asc']
                    ])
                    ->lengthMenu()
                    ->language('//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json');
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
            Column::make('user_id')->title('Id apprenant'),
            Column::make('course_id')->title('Id formation'),
            Column::make('title')->title('Titre formation'),
            Column::make('description')->title('Description formation'),
            Column::make('price')->title('Prix'),
            Column::make('image')->title('Image'),
            Column::make('created_at')->title('Date'),
            Column::make('updated_at')->title('Dernière modification'),
            Column::computed('show')->title('Voir')->width(60)->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Records_' . date('YmdHis');
    }
}