<?php

namespace App\DataTables;

use App\Models\WeeksDetail;
use Yajra\DataTables\Services\DataTable;

class WeeksDetailsDataTable extends DataTable
{
    use BuilderParameters;

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->addColumn('checkbox', '<input type="checkbox" class="selected_data" name="selected_data[]" value="{{ $id }}">')
        ->addColumn('show', 'backend.weeks_details.buttons.show')
        ->addColumn('edit', 'backend.weeks_details.buttons.edit')
        ->addColumn('delete', 'backend.weeks_details.buttons.delete')
        ->rawColumns(['checkbox','show','edit', 'delete'])
        ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Course_Detail $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = WeeksDetail::query()->with('week_relation', 'class_relation')->select('weeks_details.*');
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $html =  $this->builder()
         ->columns($this->getColumns())
         ->ajax('')
         ->parameters($this->getCustomBuilderParameters([1,2,3,4], [], GetLanguage() == 'ar'));

        return $html;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
             [
                 'name' => 'checkbox',
                 'data' => 'checkbox',
                 'title' => '<input type="checkbox" class="select-all" onclick="select_all()">',
                 'orderable'      => false,
                 'searchable'     => false,
                 'exportable'     => false,
                 'printable'      => false,
                 'width'          => '10px',
                 'aaSorting'      => 'none'
             ],
             [
                 'name' => "week_relation.name",
                 'data'    => 'week_relation.name',
                 'title'   => trans('main.week'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '300px',
             ],
             [
                 'name' => "class_relation.name",
                 'data'    => 'class_relation.name',
                 'title'   => trans('main.class'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '100px',
             ],
             [
                 'name' => "weeks_details.startdate",
                 'data'    => 'startdate',
                 'title'   => trans('main.start_date'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '100px',
             ],
             [
                 'name' => "weeks_details.status",
                 'data'    => 'status',
                 'title'   => trans('main.status'),
                 'searchable' => true,
                 'orderable'  => true,
                 'width'          => '75px',
             ],
             [
                 'name' => 'show',
                 'data' => 'show',
                 'title' => trans('main.show'),
                 'exportable' => false,
                 'printable'  => false,
                 'searchable' => false,
                 'orderable'  => false,
             ],
             [
                 'name' => 'edit',
                 'data' => 'edit',
                 'title' => trans('main.edit'),
                 'exportable' => false,
                 'printable'  => false,
                 'searchable' => false,
                 'orderable'  => false,
             ],
             [
                 'name' => 'delete',
                 'data' => 'delete',
                 'title' => trans('main.delete'),
                 'exportable' => false,
                 'printable'  => false,
                 'searchable' => false,
                 'orderable'  => false,
             ],

         ];
    }

    protected function filename()
    {
        return 'weeks_details_' . date('YmdHis');
    }
}