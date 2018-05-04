<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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

        return $dataTable
            ->editColumn('is_active', function ($query) {
                if ($query->is_active) {
                    return '<span class="label label-success">Aktif</span>';
                } else {
                    return '<span class="label label-danger">Not Aktif</span>';
                }
            })
            ->addColumn('action', 'users.datatables_actions')
            ->escapeColumns(['*']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->addAction(['width' => '80px'])
            ->parameters([
                'dom' => 'Bfrtip',
                'order' => [[0, 'desc']],
                'buttons' => [
                    'create',
                    'export',
                    // 'print',
                    // 'reset',
                    'reload',
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
        $labelActive = '"label label-success"';
        return [
            'name',
            'email',
            [
                "name" => "is_active",
                "title" => "Status",
                "data" => "is_active",
            ],
            [
                "name" => "role_id",
                "title" => "Role",
                "data" => "role.nama",
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'usersdatatable_' . time();
    }

    protected function showActive($u)
    {
        if ($u->is_active) {
            return "<i class='fa fa-check'></i>";
        } else {
            return "<i class='fa fa-times'></i>";
        }
    }
}
