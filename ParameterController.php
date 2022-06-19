<?php

namespace App\Http\Controllers;
use App\Models\invoices;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function parameter()
    {
        $invoices = invoices::all();
        return view('parameter', compact('invoices'));
    }

}
