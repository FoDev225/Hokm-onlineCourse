<?php

namespace App\DataTables;

use App\Models\Lesson;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LessonsDataTable extends DataTable
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
            ->addColumn('show', function ($lesson) {
                return '<a href="' . route('lessons.show', $lesson->id) . '" class="btn btn-xs btn-info btn-block" target="_blank">Voir</a>';
            })
            ->addColumn('edit', function ($lesson) {
                return '<a href="' . route('lessons.edit', $lesson->id) . '" class="btn btn-xs btn-warning btn-block">Modifier</a>';
            })
            ->addColumn('destroy', function ($lesson) {
                return '<a href="' . route('lessons.destroy.alert', $lesson->id) . '" class="btn btn-xs btn-danger btn-block">Supprimer</a>';
            })
            ->editColumn('published', function ($lesson) {
                return $lesson->published ? '<i class="fas fa-check text-success"></i>' : ''; 
            })
            ->rawColumns(['show', 'edit', 'destroy', 'published']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LessonsDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Lesson $model)
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
                    ->setTableId('lessons-table')
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
            Column::make('course_id')->title('Formation'),
            Column::make('title')->title('Titre'),
            Column::make('slug')->title('Slug'),
            Column::make('full_text')->title('Leçon'),
            Column::make('position')->title('Ordre'),
            Column::computed('show')
              ->title('Voir')
              ->width(60)
              ->addClass('text-center'),
            Column::computed('edit')
              ->title('Modification')
              ->width(60)
              ->addClass('text-center'),
            Column::computed('destroy')
              ->title('Suppression')
              ->width(60)
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
        return 'Lessons_' . date('YmdHis');
    }
}
