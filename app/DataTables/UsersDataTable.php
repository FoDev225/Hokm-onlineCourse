<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Cache;
use Illuminate\Support\Facades\DB;

class UsersDataTable extends DataTable
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
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('d/m/Y');
            })
            ->addColumn('show', function ($user) {
                return '<a href="' . route('users.show', $user->id) . '" class="btn btn-xs btn-info btn-block">Voir</a>';
            })
            ->editColumn('newsletter', function ($user) {
                return $user->newsletter ? '<i class="fas fa-check text-success"></i>' : ''; 
            })
            ->addColumn('online', function ($user) {
                return Cache::has('user-is-online-' . $user->id) ? '<i class="fas fa-check text-success"></i>' : ''; 
            })
            // ->addColumn('last_seen', function ($user) {
            //     return $user->last_seen ? $user->last_seen->calendar() : ''; 
            // })
            ->rawColumns(['newsletter', 'online', 'last_seen', 'show']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UsersDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->whereAdmin(false)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('users-table')
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
            Column::make('name')->title('Nom'),
            Column::make('phone')->title('N° téléphone'),
            Column::make('email'),
            Column::make('photo')->title('Photo de profile'),
            Column::make('newsletter')->title('Lettre d\'information')->addClass('text-center'),
            Column::make('status')->title('Statut'),
            Column::make('created_at')->title('Date d\'nscription'),
            Column::computed('online')
                  ->title('En ligne')
                  ->width(60)
                  ->addClass('text-center'),
            // Column::computed('last_seen')
            //       ->title('Dernier vu')
            //       ->width(100)
            //       ->addClass('text-center'),
            Column::computed('show')
                  ->title('Voir')
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
        return 'Users_' . date('YmdHis');
    }
}
