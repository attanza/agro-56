<?php

namespace App\DataTables;

use App\Models\Panen;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class PanenDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'panens.datatables_actions')
            ->editColumn('harga', function ($query) {
                return number_format($query->harga);
            })
            ->editColumn('pembayaran', function ($query) {
                return number_format($query->pembayaran);
            })
            ->editColumn('tanggal', function ($query) {
                return $query->tanggal->format('d M Y');
            })
            ->escapeColumns(['*']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Panen $model)
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
        return [
            'nama',
            [
                "name" => "penggarap_id",
                "title" => "Penggarap",
                "data" => "penggarap.nama",
            ],
            [
                "name" => "komoditi_id",
                "title" => "Komoditas",
                "data" => "komoditi.nama",
            ],
            'tanggal',
            'jumlah',
            'harga',
            'pembayaran',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'panensdatatable_' . time();
    }
}
