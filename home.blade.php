@extends('admin')
@section('contente')


                <div class="page-content">
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">our</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2"> Total invoices</p>
                                                <h4 class="mb-2">{{ number_format(\App\Models\invoices::sum('Total'), 2) }}</h4>
                                                {{ \App\Models\invoices::count() }}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-shopping-cart-2-line font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                            
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">invoices unpaid </p>
                                                <h4 class="mb-2">{{ number_format(\App\Models\invoices::where('Value_Status', 2)->sum('Total'), 2) }}</h4>
                                                {{ \App\Models\invoices::where('Value_Status', 2)->count() }}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-usd font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">invoices paid</p>
                                                <h4 class="mb-2">{{ number_format(\App\Models\invoices::where('Value_Status', 1)->sum('Total'), 2) }}</h4>
                                                 {{ \App\Models\invoices::where('Value_Status', 1)->count() }}
                                            </div>
                                            <div class="avatar-sm">
                                                
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-user-3-line font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">invoices partial </p>
                                                <h4 class="mb-2">  {{ number_format(\App\Models\invoices::where('Value_Status', 3)->sum('Total'), 2) }}</h4>
                                                {{ \App\Models\invoices::where('Value_Status', 3)->count() }}
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-btc font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                      
                        <div style="margin-bottom:20px;">
                            <div class="progress">
                         {{ $progress = number_format(\App\Models\invoices::where('Value_Status', 1)->sum('Total'), 1)}}
                          @php
                          
                        
                       
                          $i =intval($progress)*100/20;
                    $j=intval($progress);

                          if( $j<=5){
                              $type='bg-success';
                          } 
                          else if($j<=10){
                            $type='bg-info';
                          }   
                          else if($j<=15){
                            $type='bg-warning';
                          }   
                          else{
                            $type='bg-danger';
                          }      
                                        
                         @endphp
                                <div class="progress-bar {{$type}}" role="progressbar" aria-valuenow="{$progress}" aria-valuemin="0" aria-valuemax="20000" style="width: {{$i}}%"></div>
                            </div>
                        </div>
                   
                        <div class="row">
                            <div class="col-xl-6">
    
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="float-end d-none d-md-inline-block">
                                            <div class="dropdown card-header-dropdown">
                                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Export</a>
                                                    <a class="dropdown-item" href="#">Import</a>
                                                    <a class="dropdown-item" href="#">Download Report</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <h4 class="card-title mb-4">Email Sent</h4>

                                        <div class="text-center pt-3">
                                            <div class="row">
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="d-inline-flex">
                                                        <h5 class="me-2">25,117</h5>
                                                        <div class="text-success font-size-12">
                                                            <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                                        </div>
                                                    </div>
                                                    <p class="text-muted text-truncate mb-0">Marketplace</p>
                                                </div><!-- end col -->
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="d-inline-flex">
                                                        <h5 class="me-2">$34,856</h5>
                                                        <div class="text-success font-size-12">
                                                            <i class="mdi mdi-menu-up font-size-14"> </i>1.2 %
                                                        </div>
                                                    </div>
                                                    <p class="text-muted text-truncate mb-0">Last Week</p>
                                                </div><!-- end col -->
                                                <div class="col-sm-4">
                                                    <div class="d-inline-flex">
                                                        <h5 class="me-2">$18,225</h5>
                                                        <div class="text-success font-size-12">
                                                            <i class="mdi mdi-menu-up font-size-14"> </i>1.7 %
                                                        </div>
                                                    </div>
                                                    <p class="text-muted text-truncate mb-0">Last Month</p>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                        </div>
                                    </div>
                                    <div class="card-body py-0 px-2">
                                    {!! $chartjs2->container() !!}
                                    </div>
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body pb-0">
                                        <div class="float-end d-none d-md-inline-block">
                                            <div class="dropdown">
                                                <a class="text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">This Years<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Today</a>
                                                    <a class="dropdown-item" href="#">Last Week</a>
                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                    <a class="dropdown-item" href="#">This Year</a>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title mb-4">Revenue</h4>

                                        <div class="text-center pt-3">
                                            <div class="row">
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div>
                                                        <h5>{{ \App\Models\invoices::count() }}</h5>
                                                        <p class="text-muted text-truncate mb-0">invoices</p>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div>
                                                        <h5>{{ number_format(\App\Models\invoices::sum('Total'), 2) }}</h5>
                                                        <p class="text-muted text-truncate mb-0">invoices total</p>
                                                    </div>
                                                </div><!-- end col -->
                                                
                                            </div><!-- end row -->
                                        </div>
                                    </div>
                                    <div class="card-body py-0 px-2">
                                    {!! $chartjs3->container() !!}
                                    </div>
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
    
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
    
                                        <h4 class="card-title mb-4">Latest Transactions</h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                                <thead class="table-light">
                                                    
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Status</th>
                                                        <th>Age</th>
                                                        <th>Start date</th>
                                                        <th style="width: 120px;">Salary</th>
                                                    </tr>
                                                </thead><!-- end thead -->
                                                <tbody>
                                                @foreach ($invoices as $invoice)
                                                    <tr>
                                                        <td><h6 class="mb-0">{{$invoice->client->first_name}}</h6></td>
                                                        <td>{{$invoice->client->last_name}}</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                        {{$number}}
                                                        </td>
                                                        <td>
                                                        {{$invoice->Total}}
                                                        </td>
                                                        <td>{{$invoice->Total}}</td>
                                                    </tr>

                                                     <!-- end -->
                                                @endforeach
                                                     <!-- end -->
                                                </tbody><!-- end tbody -->
                                            </table> <!-- end table -->
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <select class="form-select shadow-none form-select-sm">
                                                <option selected>Apr</option>
                                                <option value="1">Mar</option>
                                                <option value="2">Feb</option>
                                                <option value="3">Jan</option>
                                            </select>
                                        </div>
                                        <h4 class="card-title mb-4">Monthly Earnings</h4>
                                        
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="text-center mt-4">
                                                    <h5>{{ number_format(\App\Models\invoices::where('Value_Status', 2)->sum('Total'), 2) }}</h5>
                                                    <p class="mb-2 text-truncate">invoices  unpaid</p>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-4">
                                                <div class="text-center mt-4">
                                                    <h5>{{ number_format(\App\Models\invoices::where('Value_Status', 1)->sum('Total'), 1) }}</h5>
                                                    <p class="mb-2 text-truncate">invoices paid</p>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-4">
                                                <div class="text-center mt-4">
                                                    <h5>{{ number_format(\App\Models\invoices::where('Value_Status', 3)->sum('Total'), 3) }}</h5>
                                                    <p class="mb-2 text-truncate">invoices  partial</p>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <div class="mt-4">
                                           
                                        {!! $chartjs->container() !!}
                                        
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div>
                    
                </div>
                <!-- End Page-content -->
                @section('js')
                <script src="{{ $chartjs->cdn() }}"></script>
                {{ $chartjs->script() }}
                <script src="{{ $chartjs2->cdn() }}"></script>
                {{ $chartjs2->script() }}
                <script src="{{ $chartjs3->cdn() }}"></script>
                {{ $chartjs3->script() }}
                @endsection
            @endsection












