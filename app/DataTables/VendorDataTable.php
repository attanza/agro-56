<?php

namespace App\DataTables;

use App\Models\Vendor;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class VendorDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'vendors.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Vendor $model)
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
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
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
        return [
            'nama',
            // 'alamat',
            'telpon',
            // 'npwp',
            // 'siup',
            // 'tdp',
            [
                "name" => "jenis_saprotan",
                "title" => "Saprotan",
                "data" => "jenis.nama",
            ],
            'harga',
            [
                "name" => "nama_penganggung_jawab",
                "title" => "Penanggung Jawab",
                "data" => "nama_penganggung_jawab"
            ],
            // 'posisi_penanggung_jawab',
            // 'alamat_penanggung_jawab',
            [
                "name" => "no_telpon_penanggung_jawab",
                "title" => "Telpon Penanggung Jawab",
                "data" => "no_telpon_penanggung_jawab"
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
        return 'vendorsdatatable_' . time();
    }
}