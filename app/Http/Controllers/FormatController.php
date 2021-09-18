<?php

namespace App\Http\Controllers;

use App\DataTables\FormatDataTable;
use App\DataTables\FormatDataTableEditor;
use App\Models\Format;
use DataTables\Editor;
use DataTables\Editor\Field;
use Illuminate\Http\Request;


class FormatController extends Controller
{
    public function index(FormatDataTable $dataTable)
    {
        return $dataTable->render('service.format.index');
    }

    public function store(FormatDataTableEditor $editor)
    {
        return $editor->process(request());
    }

}
