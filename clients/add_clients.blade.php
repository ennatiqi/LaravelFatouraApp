@extends('admin') 
@section('contente')



<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Form Wizard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Form Wizard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('add_client') }}" id="add_client" method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="progress-basicpill-firstname-input">First name*</label>
                                                    <input id="first_name" type="text"  class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>
                                                     <span class="text-danger error-text first_name_error"></span>
                                                </div>
                                            </div>
                                          
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="progress-basicpill-lastname-input">Last name*</label>
                                                    <input id="last_name" type="text"  class="form-control @error('last_name') is-invalid @enderror" name="last_name"  value="{{ old('last_name') }}">
                                                </div>
                                            </div>
                                          
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="progress-basicpill-phoneno-input">Phone*</label>
                                                    <input id="phone" type="text"  class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                                </div>
                                          
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="progress-basicpill-email-input">Company name*</label>
                                                    <input id="company_name" type="text"  class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}">
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basicpill-address-input">Email*</label>
                                                        <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required="">
                                                                
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="basicpill-address-input">Type*</label> 
                                                        <select name="type" class="form-control select2" onclick="console.log($(this).val())"
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
                                                        <textarea id="addresse" type="text"  class="form-control @error('addresse') is-invalid @enderror" value="{{ old('addresse') }}" name="addresse"  rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <a  href="/clients" class="btn btn-primary waves-effect waves-light me-1">
                                                        back
                                            </a>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Add client
                                            </button>
                                           
                                </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->



@endsection

