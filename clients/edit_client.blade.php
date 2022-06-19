@extends('admin') 
@section('contente')



<div class="page-content">
    <div class="container-fluid">

        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">update client</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Wizard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
       
    
        <div class="row">


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    
                    <form class="form-horizontal" method="GET" action="{{ url('update_client') }}/{{ $client->id }}" id="update_client">
                    
                               
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="progress-basicpill-firstname-input">First name*</label>
                                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="inputName" placeholder="Name" value="{{ $client->first_name }}" name="first_name">
                                                        <span class="text-danger error-text first_name_error"></span>
                                                </div>
                                            </div>
                                          
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="progress-basicpill-lastname-input">Last name*</label>
                                                    <input type="text"class="form-control @error('last_name') is-invalid @enderror" id="inputName" placeholder="Name" value="{{ $client->last_name }}" name="last_name">
                                                        <span class="text-danger error-text last_name_error"></span>                                                </div>
                                            </div>
                                          
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="progress-basicpill-phoneno-input">Phone*</label>
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="inputName" placeholder="Name" value="{{ $client->phone }}" name="phone">
                                                        <span class="text-danger error-text phone_error"></span>                                           
                                                         </div>
                                          
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="progress-basicpill-email-input">Company name*</label>
                                                    <input type="text"class="form-control @error('company_name') is-invalid @enderror" id="inputName" placeholder="Name" value="{{ $client->company_name }}" name="company_name">
                                                        <span class="text-danger error-text company_name_error"></span>                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basicpill-address-input">Email*</label>
                                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="inputName" placeholder="Name" value="{{ $client->email }}" name="email">
                                                        <span class="text-danger error-text email_error"></span>                                                                
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basicpill-address-input">Type*</label> 
                                                        <select name="type" class="form-control select2"  value="{{ $client->type }}" onclick="console.log($(this).val())"
                                                            onchange="console.log('change is firing')">
                                                            <!--placeholder-->
                                                            <option value="Individual"> Individual</option>
                                                            <option value="Business"> Business</option>
                                                        </select>    
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basicpill-address-input">Address*</label>
                                                        <textarea  name="addresse" class="form-control @error('addresse') is-invalid @enderror" rows="5">{{$client->addresse }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <a  href="/clients" class="btn btn-primary waves-effect waves-light me-1">
                                                        back
                                            </a>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        update client
                                            </button>
                                               
</form>
                    </div>
                </div>
            </div>
        </div>
     

    </div>
   
</div>




@endsection

