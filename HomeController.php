<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoices;
use db;
use ArielMejiaDev\LarapexCharts\LarapexChart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//=================احصائية نسبة تنفيذ الحالات======================



      $count_all =invoices::count();
      $count_invoices1 = invoices::where('Value_Status', 1)->count();
      $count_invoices2 = invoices::where('Value_Status', 2)->count();
      $count_invoices3 = invoices::where('Value_Status', 3)->count();
      
      

       

            $chartjs = (new LarapexChart)
           
            
            ->setXAxis(['invoices  unpaid', 'invoices paid','invoices  partial'])
            ->setDataset([$count_invoices2,$count_invoices1,$count_invoices3])
            ->setLabels(['invoices  unpaid', 'invoices paid','invoices  partial']);
            

            $chartjs2 = (new LarapexChart)
            ->areaChart()
            ->addData('Physical sales', [40, 93, 15, 72, 93,69, 93, 15, 72, 93,69, 93, 17,57, 29, 42])
            ->addData('Digital sales', [70, 29, 28, 93, 17,57, 29, 52, 93, 17, 93, 42, 72, 93, 72, 93])
            ->setXAxis([70, 29, 28, 93, 17,57, 29, 52, 93, 17, 93, 42, 72, 93, 72, 93]);
           

          
       
           
          
        
            
            $chartjs3 = (new LarapexChart)
            ->barChart()
            ->addData('invoices', [40, 93, 15, 72, 93,69, 93, 15, 72, 93,69, 93, 17,57, 29, 42])
            
            ->setXAxis([70, 29, 28, 93, 17,57, 29, 52, 93, 17, 93, 42, 72, 93, 72, 93]);
        

            $invoices = invoices::all();

            $number = invoices::all()->count();
           /*  $total = invoices::where('client_id',2);sum('Total') */
        return view('home', compact('chartjs','chartjs2','chartjs3','invoices','number'));

    }


}
