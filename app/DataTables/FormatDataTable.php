<?php

namespace App\DataTables;

use App\Models\Format;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FormatDataTable extends DataTable
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
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Format $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Format $model)
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
            ->setTableId('format-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->select()
            ->initComplete("function () {
                                    this.api().columns().every(function () {
                                        var column = this;
                                        var input = document.createElement(\"input\");
                                        $(input).appendTo($(column.footer()).empty())
                                        .on('change', function () {
                                                column.search($(this).val(), false, false, true).draw();
                                            });
                                    });
                           }")
            ->serverSide()
            ->dom('B<"top"i>rt<"bottom"flp><"clear">')
            ->orderBy(1, 'asc')
            ->buttons(
                Button::make('create')->editor('editor'),
                Button::make('edit')->editor('editor'),
                Button::make('remove')->editor('editor'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            )
            ->editor(
                Editor::make()
                    ->fields([
                        Fields\Text::make('name')
                    ])
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::checkbox(),
            Column::make('id'),
            Column::make('name'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Format_' . date('YmdHis');
    }
}
