<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\invoices;
use App\Models\user;
use App\sections;
use App\invoices_details;
use App\Notifications\Add_invoice_new;
use Illuminate\Support\Facades\Notification;
use App\invoice_attachments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\client;

use App\Notifications\AddInvoice;
use App\Exports\InvoicesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Events\MyEventClass;
class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $client = Client::all();
        /* $invoices = invoices::join('clients', 'invoices.id', '=', 'clients.id')
        
        ->select('invoices.*', 'clients.first_name', 'clients.last_name')
        
        ->get(); */
        $invoices = invoices::all();
        return view('fatoura.fatoura', compact('invoices'));
    }

  
   
     public function addinvoices()
    {
        $client = client::all();
        return view('fatoura.add_fatoura', compact('client'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function add_invoices(Request $request)
    {

        invoices::create([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => 1,
            'client_id' => $request->client,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => 'unpaid',
            'Value_Status' => 2,
            'note' => $request->note,
        ]);

        $invoice_id = invoices::latest()->first()->id;
         invoices_details::create([
            'id_Invoice' => $invoice_id,
            'invoice_number' => $request->invoice_number,
          
            'client' => $request->client,
            'Status' => ' unpaid',
            'Value_Status' => 2,
            'note' => $request->note,
           
        ]); 

         if ($request->hasFile('pic')) {

            $invoice_id = Invoices::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $invoice_number = $request->invoice_number;

            $attachments = new invoice_attachments();
            $attachments->file_name = $file_name;
            $attachments->invoice_number = $invoice_number;
            $attachments->Created_by = Auth::user()->first_name;
            $attachments->invoice_id = $invoice_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);
        }

 



        
         event(new MyEventClass('hello world')); 

        session()->flash('Add', 'add new invoices sucsses');
        return back();
       
    }


    public function store(Request $request)
    {
        invoices::create([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'client_id' => $request->client,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => ' unpaid',
            'Value_Status' => 2,
            'note' => $request->note,
        ]);

        $invoice_id = invoices::latest()->first()->id;
        invoices_details::create([
            'id_Invoice' => $invoice_id,
            'invoice_number' => $request->invoice_number,
            'product' => $request->product,
            'client' => $request->client,
            'Status' => ' unpaid',
            'Value_Status' => 2,
            'note' => $request->note,
           
        ]);

        if ($request->hasFile('pic')) {

            $invoice_id = Invoices::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $invoice_number = $request->invoice_number;

            $attachments = new invoice_attachments();
            $attachments->file_name = $file_name;
            $attachments->invoice_number = $invoice_number;
            $attachments->Created_by = Auth::user()->name;
            $attachments->invoice_id = $invoice_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);
        }


         $user = User::get();
        $invoices = invoices::latest()->first();
        Notification::send($user, new Add_invoice_new($invoices));
      




        
         event(new MyEventClass('hello world')); 

        session()->flash('Add', 'تم اضافة الفاتورة بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)  
    {
        $id=$request->id;
        $invoices = invoices::where('id', $id)->first();
        $client = client::all();
        return view('invoices.status_update', compact('client','invoices'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit_invoice(Request $request)  
    {
        $id=$request->id;
        $invoices =invoices::find($id);
        $client = client::all();
        return view('fatoura.edit_fatoura', compact('client', 'invoices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function updateinvoices(Request $request)
    {

        $invoices = invoices::findOrFail($request->invoice_id);
        $invoices->update([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
           
            'client_id' => $request->client,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'note' => $request->note,
        ]);

        session()->flash('edit', 'The invoice has been successfully modified');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from invoices where id = ? ',[$id]);
        return redirect('/fatoura');

    }
    public function getproducts($id)
    {
        $products = DB::table("products")->where("section_id", $id)->pluck("Product_name", "id");
        return json_encode($products);
    }


    public function Status_Update($id, Request $request)
    {
        $invoices = invoices::findOrFail($id);

        if ($request->Status === 'paid') {

            $invoices->update([
                'Value_Status' => 1,
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,
            ]);

            invoices_Details::create([
                'id_Invoice' => $request->invoice_id,
                'invoice_number' => $request->invoice_number,
             
                'client' => $request->client,
                'Status' => $request->Status,
                'Value_Status' => 1,
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
                'user'=>1,
            ]);
        }

        else {
            $invoices->update([
                'Value_Status' => 3,
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,
            ]);
            invoices_Details::create([
                'id_Invoice' => $request->invoice_id,
                'invoice_number' => $request->invoice_number,
               
                'client' => $request->client,
                'Status' => $request->Status,
                'Value_Status' => 3,
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
               'user'=>1,
            ]);
        }
        session()->flash('Status_Update');
        return redirect('/fatoura');

    }


     public function Invoice_Paid()
    {
        $client = Client::find(1);
        $invoices = Invoices::where('Value_Status', 1)->get();
        return view('fatoura.payfatoura', compact('invoices','client'));
     
    }

    public function Invoice_unPaid()
    {
        $client = Client::find(1);
        $invoices = Invoices::where('Value_Status',2)->get();
        return view('fatoura.unpaidfatoura', compact('invoices','client'));
    }

    public function Invoice_Partial()
    {
        $client = Client::find(1);
        $invoices = Invoices::where('Value_Status',3)->get();
        return view('fatoura.partrierfatoura', compact('invoices','client'));
    }

    public function Print_invoice(Request $request)
    {
        $id=$request->id;
        $client = Client::find(1);
        $invoices = invoices::where('id', $id)->first();
        return view('invoices.Print_invoice',compact('invoices','client'));
    }

    public function export()
    {

        return Excel::download(new InvoicesExport, 'invoices.xlsx');

    }


    public function MarkAsRead_all (Request $request)
    {

        $userUnreadNotification= auth()->user()->unreadNotifications;

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }


    }


    public function unreadNotifications_count()

    {
        return auth()->user()->unreadNotifications->count();
    }

    public function unreadNotifications()

    {
        foreach (auth()->user()->unreadNotifications as $notification){

return $notification->data['title'];

        }

    }




}
