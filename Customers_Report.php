<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\invoices;
class Customers_Report extends Controller
{
    public function index(){

      $client = client::all();
      return view('reports.customers_report',compact('client'));
        
    }


    public function Search_customers(Request $request){


// في حالة البحث بدون التاريخ
      
    
       
      $invoices = invoices::select('*')->where('client_id','=',$request->client)->get();
      $client = client::all();
       return view('reports.customers_report',compact('client'))->withDetails($invoices);

    
     

  // في حالة البحث بتاريخ
     
    
  
    
    }
}