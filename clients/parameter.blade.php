@extends('admin')
@section('contente')


<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">My Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">parameter</a></li>
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
                                <div class="card-body" >
                                    <div style="display:flex;margin-bottom:20px; margin-right:20px;">
                                        <img class="img-thumbnail rounded-circle avatar-xl admin_picture" src="{{ Auth::user()->vector }}" alt="200x200">       
                                    <div>
                                        
                                    <h4 class="card-title">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                                    <p class="card-title-desc">en ligne</p>
                                    <input type="file" name="admin_image" id="admin_image" style="opacity: 0;height:1px;display:none">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Change picture</b></a>
        
                                                                           
                               </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                <a class="nav-link mb-2" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Edit profile</a>
                <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Edit password</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                <div class="tab-pane fade active show" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                       <h1>profile</h1>
                    </div>
                    <div class="tab-pane fade  " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="row">
                        
                    <form class="form-horizontal" method="POST" action="{{ route('adminUpdateInfo') }}" id="AdminInfoForm">
                   
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="card-title "style="margin-bottom:40px;">Edit profile</h1>
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                              
                                
                                                        <label for="validationCustom01" class="form-label">First name</label>
                                                        
                                                        <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::user()->first_name }}" name="first_name">
                                                        <span class="text-danger error-text name_error"></span>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="validationCustom02" class="form-label">Last name</label>
                                                        <input type="text" class="form-control" name="last_name" id="validationCustom02" placeholder="Last name" value="{{ Auth::user()->last_name }}" required="">
                                                        <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="email" value="{{ Auth::user()->email }}" name="email" class="form-control"  placeholder="Type something">
                                            </div>
                                            <div class="mb-3">
                                                <label>Number</label>
                                                <div>
                                                    <input data-parsley-type="number" value="{{ Auth::user()->phone }}" name="phone" type="text" class="form-control"  placeholder="Enter only numbers">
                                                </div>
                                            </div>
                                         
                                            <div class="mb-3">
                                                <label>Address</label>
                                                <div>
                                                    <input  type="text" value="{{ Auth::user()->address }}" name="address" class="form-control"  placeholder="Enter alphanumeric value">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label>description</label>
                                                <div>
                                                    <textarea  name="description" class="form-control" rows="5">{{ Auth::user()->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
 
                                       
                                    </div>
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->
        
                    </form>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row">
                    <form class="form-horizontal" action="{{ route('adminChangePassword') }}" method="POST" id="changePasswordAdminForm">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="card-title "style="margin-bottom:40px;">Edit profile</h1>
                                        <div class="row">
                                        <div class="mb-3">
                                                <label>Old password</label>
                                                <input type="password" class="form-control" id="inputName" placeholder="Enter current password" name="oldpassword">
                              <span class="text-danger error-text oldpassword_error"></span>
                                            </div>
                                                <div class="col-md-6">
                                                
                                                    <div class="mb-3">
                                                        <label for="validationCustom01" class="form-label">New password</label>
                                                        <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                              <span class="text-danger error-text newpassword_error"></span>                                       
                                               <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="validationCustom02" class="form-label">Confirme password </label>
                                                        <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                              <span class="text-danger error-text cnewpassword_error"></span>
                                                                                      <div class="valid-feedback">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                           
                                          
                                            
                                            <div class="mb-0">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary waves-effect">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                      
                                           
                                        
                                    </div>
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->
        
                    </form>
                    </div>
                    </div>
                        
                    
                    
                </div>
            </div>
        </div>
    </div>
                                </div>
                            </div>
                        </div>
                   
                        
                    </div> <!-- container-fluid -->
                </div>
               
              
            @endsection






  




