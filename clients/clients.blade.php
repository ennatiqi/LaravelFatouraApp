@extends('admin')
@section('contente')

@if (session()->has('delete_invoice'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف الفاتورة بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif


    @if (session()->has('Status_Update'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تحديث حالة الدفع بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif

    @if (session()->has('restore_invoice'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم استعادة الفاتورة بنجاح",
                    type: "success"
                })
            }

        </script>
    @endif
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Data Tables</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Data Tables</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                       
        
                        <div class="row">
                            <div class="col-12">
                                
                                <div class="card">
                                    <div class="card-body">
                                    <a href="{{ url('/' . $page='addclients') }}"  class="btn btn-outline-primary waves-effect waves-light" style="margin:20px;"><i
                                class="fas fa-plus"></i> add client</a>
                               
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                <tr>
                                    <th class="border-bottom-0">id</th>
                                    <th class="border-bottom-0">first_name id</th>
                                    <th class="border-bottom-0"> last_name</th>
                                    <th class="border-bottom-0"> type</th>
                                    <th class="border-bottom-0">company_name</th>
                                    <th class="border-bottom-0">email</th>
                                    <th class="border-bottom-0">phone</th>
                                    <th class="border-bottom-0">addresse</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($client as $client)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
            
                                        <td>{{ $i }}</td>
                                        <td>{{ $client->first_name }} </td>
                                        <td>{{ $client->last_name }}</td>
                                        <td>{{ $client->type }}</td>
                                        <td>{{ $client->company_name }}</td>
                                       
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->addresse }}</td>
                                      
                                    

                                        
                                        <td>
                                       
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="true">Success <i class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 42px);">
                                                <form action="{{ route('edit_client') }}" method="get">
                                                <input name="id" type="hidden" value="{{ $client->id }}">
                                               
                                                <button class="dropdown-item"
                                                          id="edit_client"> <i class="mdi mdi-grease-pencil me-2"></i>
                                                            edit client</button>
                                                </form>  
                                                <a class="dropdown-item" href="delete/{{ $client->id }}" data-invoice_id="{{ $client->id }}"
                                                            data-toggle="modal" data-target="#delete_invoice"><i
                                                                class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;delete client</a>
                                                 
                                                   
                                                  
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                   
                        
                    </div> <!-- container-fluid -->
                </div>
             
              
            @endsection












