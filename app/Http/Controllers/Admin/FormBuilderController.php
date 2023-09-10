<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormBuilder;
use Illuminate\Http\Request;
use function PHPUnit\Framework\fileExists;

class FormBuilderController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('Admin.FormBuilder.index')->with('forms', $forms);
    }


}


