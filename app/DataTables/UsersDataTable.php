<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $start = 1;
        return (new EloquentDataTable($query))
            ->addColumn('action', 'users.action')
            ->addColumn('no', function($query) use (&$start) {return $start++;})
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    //->dom('B<"clear">lfrtip')
                    //->dom('B<"clear">')
                    ->buttons([
                        Button::make('add'),
                        Button::make([
                            //'extend' =>    'copyHtml5',
                            'text' =>      '<i class="far fa-copy"></i>',
                            'titleAttr' => 'Copy'
                        ]),
                        //Button::make('excel'),
                        //Button::make('csv'),
                        //Button::make('pdf'),
                        //Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload'),
                    ])
                    //->ordering(false)
                    //->searching(false)
                    //->language(["lengthMenu"=> "tampilkan _MENU_ data"])
                    //->language(["search"=> "Pencarian :  _INPUT_"])
                    //->lengthChange(false) //disabel number dropdown
                    //->lengthMenu ([ 10, 50, 100 , "All"])
                    ;
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            
            Column::computed('no')->addClass('text-center'),
            //Column::make('add your columns'),
            Column::make('name'),
            Column::make('email'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
