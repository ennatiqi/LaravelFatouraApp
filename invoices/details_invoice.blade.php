@extends('admin')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل فاتورة
@stop
@section('contente')
    <!-- breadcrumb -->
    <div class="page-content">
                    <div class="container-fluid">
    
    <!-- breadcrumb -->




    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if (session()->has('Add'))
   
      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <i class="mdi mdi-check-all me-2"></i>
                                                The attachment has been successfully add
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
   
    @endif



    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


  
    <!-- row opened -->
    <div class="row row-sm">
    <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Custom Tabs</h4>
                                        <p class="card-title-desc">Example of custom tabs</p>
        
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                    <span class="d-none d-sm-block">Invoice information</span> 
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-bs-toggle="tab" href="#profile1" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                    <span class="d-none d-sm-block">Payment statuses</span> 
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab" aria-selected="false">
                                                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                                    <span class="d-none d-sm-block">attachments</span>   
                                                </a>
                                            </li>
                                           
                                        </ul>
        
                                        <!-- Tab panes -->
                                        <div class="tab-content p-3 text-muted">
                                            <div class="tab-pane active" id="home1" role="tabpanel">
                                       
                                            <div class="table-responsive mt-15">

                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">invoice number</th>
                                                            <td>{{ $invoices->invoice_number }}</td>
                                                            <th scope="row">Release Date</th>
                                                            <td>{{ $invoices->invoice_Date }}</td>
                                                            <th scope="row">due date</th>
                                                            <td>{{ $invoices->Due_date }}</td>
                                                            <th scope="row">client</th>
                                                            <td>{{$invoices->client->first_name}}</td>
                                                        </tr>

                                                        <tr>
                                                          
                                                            <th scope="row">collection amount</th>
                                                            <td>{{ $invoices->Amount_collection }}</td>
                                                            <th scope="row">Commission amount</th>
                                                            <td>{{ $invoices->Amount_Commission }}</td>
                                                            <th scope="row">Discount</th>
                                                            <td>{{ $invoices->Discount }}</td>
                                                        </tr>


                                                        <tr>
                                                            <th scope="row">tax rate</th>
                                                            <td>{{ $invoices->Rate_VAT }}</td>
                                                            <th scope="row"> tax value</th>
                                                            <td>{{ $invoices->Value_VAT }}</td>
                                                            <th scope="row">total with tax</th>
                                                            <td>{{ $invoices->Total }}</td>
                                                            <th scope="row">current status</th>
                                                            <td>
                                                                            @if ($invoices->Value_Status == 1)
                                                                <span class="text-success">{{ $invoices->Status }}</span>
                                                            @elseif($invoices->Value_Status == 2)
                                                                <span class="text-danger">{{ $invoices->Status }}</span>
                                                            @else
                                                               <span class="text-warning">{{ $invoices->Status }}</span>
                                                            @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">notes</th>
                                                            <td>{{ $invoices->note }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                    
                                            </div>
                                            <div class="tab-pane" id="profile1" role="tabpanel">
                                           
                                            <div class="table-responsive mt-15">

                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                        <tr class="text-dark">
                                                            <th>#</th>
                                                            <th> Invoice number</th>
                                                         
                                                            <th>client</th>
                                                            <th> status</th>
                                                            <th> due date </th>
                                                            <th>Notes</th>
                                                            <th>Added date </th>
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 0; ?>
                                                        @foreach ($details as $x)
                                                            <?php $i++; ?>
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $x->invoice_number }}</td>
                                                              
                                                                <td>{{$invoices->client->first_name}}</td>
                                                                <td>
                                                                            @if ($x->Value_Status == 1)
                                                                <span class="text-success">{{ $x->Status }}</span>
                                                            @elseif($x->Value_Status == 2)
                                                                <span class="text-danger">{{ $x->Status }}</span>
                                                            @else
                                                               <span class="text-warning">{{ $x->Status }}</span>
                                                            @endif
                                                            </td>
                                                                <td>{{ $x->Payment_Date }}</td>
                                                                <td>{{ $x->note }}</td>
                                                                <td>{{ $x->created_at }}</td>
                                                               
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>


                                            </div>

                                            </div>
                                        
                                            </div>
                                            <div class="tab-pane" id="messages1" role="tabpanel">
                                            
                                           
                                            <!--المرفقات-->
                                            <div class="card card-statistics">
                                               
                                                    <div class="card-body">
                                                        <p class="text-danger">* Attachment Format pdf, jpeg ,.jpg , png </p>
                                                        <h5 class="card-title">add attachments</h5>
                                                        <form method="post" action="{{ url('/InvoiceAttachments') }}"
                                                            enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile"
                                                                    name="file_name" required>
                                                                <input type="hidden" id="customFile" name="invoice_number"
                                                                    value="{{ $invoices->invoice_number }}">
                                                                <input type="hidden" id="invoice_id" name="invoice_id"
                                                                    value="{{ $invoices->id }}">
                                                                <label class="custom-file-label" for="customFile">
                                                                Select the attachment</label>
                                                            </div><br><br>
                                                            <button type="submit" class="btn btn-primary btn-sm "
                                                                name="uploadedFile">submet</button>
                                                        </form>
                                                    </div>
                                                
                                                <br>

                                                <div class="table-responsive mt-15">
                                                    <table class="table center-aligned-table mb-0 table table-hover"
                                                        style="text-align:center">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th scope="col">#</th>
                                                                <th scope="col"> File name</th>
                                                                <th scope="col">added</th>
                                                                <th scope="col">Added date</th>
                                                                <th scope="col">Processes</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                            @foreach ($attachments as $attachment)
                                                                <?php $i++; ?>
                                                                <tr>
                                                                    <td>{{ $i }}</td>
                                                                    <td>{{ $attachment->file_name }}</td>
                                                                    <td>{{ $attachment->Created_by }}</td>
                                                                    <td>{{ $attachment->created_at }}</td>
                                                                    <td colspan="2">

                                                                        <a class="btn btn-outline-success btn-sm"
                                                                            href="{{ url('View_file') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i class="fas fa-eye"></i>&nbsp;
                                                                            an offer</a>

                                                                        <a class="btn btn-outline-info btn-sm"
                                                                            href="{{ url('download') }}/{{ $invoices->invoice_number }}/{{ $attachment->file_name }}"
                                                                            role="button"><i
                                                                                class="fas fa-download"></i>&nbsp;
                                                                                Download</a>

                                                                      
                                                                            <button class="btn btn-outline-danger btn-sm"
                                                                                data-toggle="modal"
                                                                                data-file_name="{{ $attachment->file_name }}"
                                                                                data-invoice_number="{{ $attachment->invoice_number }}"
                                                                                data-id_file="{{ $attachment->id }}"
                                                                                data-target="#delete_file">حذف</button>
                                                                       

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        </tbody>
                                                    </table>

                                                </div>
                                          

                                        </div>
                                        </div>

                                            </div>
                                      
        
                                    </div>
                                </div>
                            </div>
      
    </div>
    <!-- /row -->

    <!-- delete -->
    
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

    <script>
        $('#delete_file').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id_file = button.data('id_file')
            var file_name = button.data('file_name')
            var invoice_number = button.data('invoice_number')
            var modal = $(this)

            modal.find('.modal-body #id_file').val(id_file);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #invoice_number').val(invoice_number);
        })

    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

    </script>

@endsection
