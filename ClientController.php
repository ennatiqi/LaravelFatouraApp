<?php

namespace App\Http\Controllers;
use App\Models\client;
use App\Models\User;
use App\Models\invoices;
use App\sections;
use Illuminate\Http\Request;
use DB;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = client::all();
        return view('clients.clients', compact('client'));
    }
    
    public function parameter()
    {
        $user = User::all();
        return view('clients.parameter', compact('user'));
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_client(Request $request)
    {

        $validator = \Validator::make($request->all(),[
            'type' => 'required',
            'first_name' => 'required',
            'last_name' =>'required',
            'company_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'addresse'=>'required',
    ]);

    if(!$validator->passes()){
        return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
    }else{
         $client = client::create([
          'type'=> $request->type,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'addresse'=> $request->addresse,
           
        ]);

    }
        
    if(!$client){
        return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
    }else{
        return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
    }
       
    }

    public function addclients()
    {

        return view('clients.add_clients');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validator = \Validator::make($request->all(),[
        
            'first_name' => 'required',
            'last_name' =>'required',
            'company_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'type' => 'required',
    ]);

    if(!$validator->passes()){
        return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
    }else{
         $client = client::create([
          
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
           
        ]);

         
    }
        

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit_client(Request $request)
    {
        $id=$request->id;
        $client =client::find($id);
        return view('clients.edit_client', compact('client'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */

        function update(Request $request,$id){
           
            $validator = \Validator::make($request->all(),[
                'first_name'=>'required',
                'last_name'=>'required',
                 'email'=> 'required|email',
                 'addresse'=>'required',
                 'phone'=>'required',
                 'company_name'=>'required',
            ]);
        
            if(!$validator->passes()){
                return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
            }else{
                $client = client::findOrFail($id);
                 $client->update([
                      'first_name'=>$request->first_name,
                      'last_name'=>$request->last_name,
                       'email'=>$request->email,
                       'addresse'=>$request->addresse,
                       'phone'=>$request->phone,
                       'company_name'=>$request->company_name,
                 ]);
        
                 if(!$client){
                     return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
                 }else{
                    return redirect('/clients');

                 }
            }
        }/* return view('clients.clients'); */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
     
    
       
        DB::delete('delete from clients where id = ? ',[$id]);
        return redirect('/clients');

        }



    
    
}
