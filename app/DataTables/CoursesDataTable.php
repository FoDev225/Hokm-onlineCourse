<?php

namespace App\DataTables;

use App\Models\Course;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CoursesDataTable extends DataTable
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
            ->addColumn('show', function ($course) {
                return '<a href="' . route('formation.show', $course->slug) . '" class="btn btn-xs btn-info btn-block" target="_blank">Voir</a>';
            })
            ->addColumn('edit', function ($course) {
                return '<a href="' . route('courses.edit', $course->id) . '" class="btn btn-xs btn-warning btn-block">Modifier</a>';
            })
            ->addColumn('destroy', function ($course) {
                return '<a href="' . route('courses.destroy.alert', $course->id) . '" class="btn btn-xs btn-danger btn-block">Supprimer</a>';
            })
            ->editColumn('published', function ($course) {
                return $course->published ? '<i class="fas fa-check text-success"></i>' : ''; 
            })
            ->rawColumns(['show', 'edit', 'destroy', 'published']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Course $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Course $model)
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
                    ->setTableId('courses-table')
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
            Column::make('category_id')->title('Categorie'),
            Column::make('user_id')->title('Formateur'),
            Column::make('title')->title('Titre'),
            Column::make('slug')->title('Slug'),
            Column::make('description')->title('Description'),
            Column::make('price')->title('Prix'),
            Column::make('image')->title('Image'),
            Column::make('published')
              ->title('Publi??')              
              ->width(60)
              ->addClass('text-center'),
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
        return 'Courses_' . date('YmdHis');
    }
}