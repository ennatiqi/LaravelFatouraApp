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
                                    <a href="{{ url('/' . $page='addinvoices') }}"  class="btn btn-outline-primary waves-effect waves-light" style="margin:20px;"><i
                                class="fas fa-plus"></i> add Invoices</a>
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                <tr>
                                <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">invoice number</th>
                                    <th class="border-bottom-0">Invoice date</th>
                                    <th class="border-bottom-0">due date</th>
                                    <th class="border-bottom-0">client</th>
                                    <th class="border-bottom-0">Discount</th>
                                    <th class="border-bottom-0">tax rate</th>
                                    <th class="border-bottom-0">tax value</th>
                                    <th class="border-bottom-0">Total</th>
                                    <th class="border-bottom-0">status</th>
                                    <th class="border-bottom-0">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($invoices as $invoice)
                                    @php
                                    $i++
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $invoice->invoice_number }} </td>
                                        <td>{{ $invoice->invoice_Date }}</td>
                                        <td>{{ $invoice->Due_date }}</td>
                                       
                                        <td>
                                        <form action="{{ route('InvoicesDetails') }}" method="get">  
                                                            <input name="id" type="hidden" value="{{ $invoice->id }}">   
                                            <button class="btn btn-link waves-effect"  >{{$invoice->client->first_name}}</button>
                                           
                                            </form>
                                        </td>
                                        <td>{{ $invoice->Discount }}</td>
                                        <td>{{ $invoice->Rate_VAT }}</td>
                                        <td>{{ $invoice->Value_VAT }}</td>
                                        <td>{{ $invoice->Total }}</td>
                                        <td>
                                            @if ($invoice->Value_Status == 1)
                                                <span class="text-success">{{ $invoice->Status }}</span>
                                            @elseif($invoice->Value_Status == 2)
                                                <span class="text-danger">{{ $invoice->Status }}</span>
                                            @else
                                                <span class="text-warning">{{ $invoice->Status }}</span>
                                            @endif

                                        </td>

                                        <td>{{ $invoice->note }}</td>
                                        <td>
                                       
                                        <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="true">Success <i class="mdi mdi-chevron-down"></i></button>
                                                <div class="dropdown-menu" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 42px);">
                                                <form action="{{ route('edit_invoice') }}" method="get">
                                                <input name="id" type="hidden" value="{{ $invoice->id }}">
                                                <button class="dropdown-item"
                                                            > <i class="mdi mdi-grease-pencil me-2"></i>تعديل الفاتورة</button>
                                                </form>
                                                            <a class="dropdown-item" href="deleteinvoice/{{ $invoice->id }}" data-invoice_id="{{ $invoice->id }}"
                                                            data-toggle="modal" data-target="#delete_invoice"><i
                                                                class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                                            الفاتورة</a>
                                                    
                                                            <form action="{{ route('Status_show') }}" method="get">  
                                                            <input name="id" type="hidden" value="{{ $invoice->id }}">   
                                                    <button class="dropdown-item"><i class=" text-success fas 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    fa-money-bill"></i>&nbsp;&nbsp;تغير
                                                            حالة
                                                            الدفع</button>
                                                            </form>
                                                    <a class="dropdown-item" href="#" data-invoice_id="{{ $invoice->id }}"
                                                            data-toggle="modal" data-target="#Transfer_invoice"><i
                                                                class="text-warning fas fa-exchange-alt"></i>&nbsp;&nbsp;نقل الي
                                                            الارشيف</a>
                                                          
                                                    <div class="dropdown-divider"></div>
                                                    <form action="{{ route('Print_invoice') }}" method="get">  
                                                            <input name="id" type="hidden" value="{{ $invoice->id }}">   
                                                    <button class="dropdown-item"><i
                                                                class="text-success fas fa-print"></i>&nbsp;&nbsp;Invoice printing
                                                        </button>
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












