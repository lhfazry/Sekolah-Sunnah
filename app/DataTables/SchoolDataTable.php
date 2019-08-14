<?php

namespace App\DataTables;

use App\Models\School;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SchoolDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'schools.datatables_actions')
            ->addColumn('level_name', function($school){
                return $school->level->name;
            })
            ->addColumn('city_name', function($school){
                $city_name = "";

                if(!empty($school->city)) {
                    $city_name = $school->city_province();
                }

                return $city_name;
            })
            ->addColumn('facility', function($school){
                $html = "";

                foreach($school->facilities as $facility) {
                    $html .= "<i title=\"".$facility->facility->name."\" style=\"font-size:24px;\" class=\"text-success fas ".$facility->facility->icon."\"></i>&nbsp;";
                }

                return $html;
            })
            ->addColumn('status_name', function($school){
                if(!empty($school->verified_at)){
                    return "<span class=\"badge badge-success\">Verified</span>";
                }
                else {
                    return "<span class=\"badge badge-danger\">Unverified</span>";
                }
            })
            ->filterColumn('level_name', function($query, $keyword) {
                $query->whereHas('level', function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', "%{$keyword}%");
                });
            })
            ->rawColumns(['action', 'status_name', 'facility']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\School $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(School $model)
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
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'frtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'updated_at' => ['searchable' => false, 'visible' => false],
            'nama_sekolah' => ['searchable' => true, 'title' => 'Name'],
            'city_name' => ['searchable' => true, 'title' => 'City', 'class' => 'text-center'],
            'level_name' => ['searchable' => true, 'title' => 'Level', 'class' => 'text-center'],
            'facility' => ['searchable' => true, 'class' => 'text-center'],
            'status_name' => ['searchable' => false, 'title' => 'Status', 'class' => 'text-center']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'schoolsdatatable_' . time();
    }
}
