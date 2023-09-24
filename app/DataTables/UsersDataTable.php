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
        //number
        $start = 1;
        //button 
        $btn =  '<a href="{{LINK_VIEW}}" id="users-view-{{id}}" value="{{id}}" class="view btn btn-secondary btn-sm">View</a> ';
        $btn .= '<a href="{{LINK_EDIT}}" id="users-edit-{{id}}" value="{{id}}" class="edit btn btn-secondary btn-sm">Edit</a> ';
        $btn .= '<a href="{{LINK_DEL}}" id="users-delete-{{id}}" value="{{id}}" class="delete btn btn-secondary btn-sm" data-confirm-delete="true">Delete</a>';

        $permision = '<label class="badge bg-success">{{PERMISION}}</label> ';
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) use ($btn) {
                $link_view = route('users.show',$row->id);
                $link_edit = route('users.edit',$row->id);
                $link_del = route('users.destroy',$row->id);
                
                $btn = str_replace('{{LINK_VIEW}}',$link_view,$btn);
                $btn = str_replace('{{LINK_EDIT}}',$link_edit,$btn);
                $btn = str_replace('{{LINK_DEL}}',$link_del,$btn);
                $btn = str_replace('{{id}}',$row->id,$btn);
                //return $row->id;
                return $btn;
            })
            ->addColumn('permision',function($row) use ($permision){
                if(!empty($row->getRoleNames()))
                {
                    $a='<h5>';
                    foreach($row->getRoleNames() as $k=>$v)
                    {
                        $a .=  $btn = str_replace('{{PERMISION}}',$v,$permision);
                    }
                    $a .='</h5>';
                }
                return $a;
            })
            ->rawColumns(['permision','action'])
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
                    //->dom('Blrtip')
                    ->dom('Bftrpi')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    //->paging(false)
                    //->info(false)
                    //->dom('B<"clear">lfrtip')
                    //->dom('B<"clear">')
                    ->buttons([
                        Button::make('add'),//->action("alert('baru');"),//->text('huhuy'),
                        'buttons'      => 
                           [
                             "extend"=> 'collection',
                             "text"=> 'Export',
                             "buttons" => 
                                 [ 
                                   'csv',
                                   'excel',
                                   'pdf',
                                    /*[                
                                        [
                                           'text' =>'<i class="fa fa-eye"></i> ' . 'My custom button',
                                           'className' => 'My custom class',
                                           'action' => "function ( e, dt, node, config ) {
                                                           // dt.column( -1 ).visible( ! dt.column( -1 ).visible() );
                                                           alert('custom');
                                                        }"
                                        ],
                                     ]*/ 
                                 ]
                           ],
                        Button::make('reset'),
                        Button::make('reload'),
                    ]) 
                        
                    /*->buttons([
                        Button::make('add'),
                        /*Button::make([
                            //'extend' =>    'copyHtml5',
                            'text' =>      '<i class="far fa-copy"></i>',
                            'titleAttr' => 'Copy'
                        ]),/
                       
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload'),
                    ])*/
                    //->ordering(false)
                    //->searching(false)
                    //->language(["lengthMenu"=> "tampilkan _MENU_ data"])
                    ->language([
                        "search"=> "Pencarian :  _INPUT_",
                        "info"=> "ini data mulai _START_ sampai _END_ dari total _TOTAL_",
                        "infoEmpty"=> "No entries to show ,kosong huhuy",
                        ])
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
            Column::make('permision'),
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
