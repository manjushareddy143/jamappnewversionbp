@extends('layouts.admin')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Create User</h1>
      <div class="custom-buttons">
         <button type="button" class="btn btn-primary mb-1">Create</button>
         <button type="button" class="btn btn-secondary mb-1">Back</button>
      </div>
   </div>
   <div class="row sectionrow">
      <div class="col-lg-12">
         <!-- Horizontal Form -->
         <div class="card mb-4">
            <div class="card-body">
               <div class="login-form create-user">
                  <form>
                     <div class="row">
                     <div class="col-md-6 float-l">
                        <div class="form-group">
                           <label>First Name</label>
                           <input type="text" class="form-control" id="first_name" placeholder="Enter First Name">
                        </div>
                     </div>
                     <div class="col-md-6 float-l">
                        <div class="form-group">
                           <label>Last Name</label>
                           <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name">
                        </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="col-md-6 float-l">
                        <div class="form-group">
                           <label>Email Address</label>
                           <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address">
                        </div>
                     </div>
                     <div class="col-md-6 float-l">
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="col-md-6 float-l">
                        <div class="form-group">
                           <label>Confirm Password</label>
                           <input type="password" class="form-control" id="exampleInputPasswordRepeat" placeholder="Repeat Password">
                        </div>
                     </div>
                     <div class="col-md-6 float-l">
                        <div class="form-group">
                           <label>Contact</label>
                           <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number">
                        </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="col-md-6 float-l">
                        <div class="form-group">
                           <label for="exampleFormControlSelect1">Type</label>
                           <select class="form-control" id="exampleFormControlSelect1">
                              <option>Individual Service Provider1</option>
                              <option>Individual Service Provider2</option>
                              <option>Individual Service Provider3</option>
                              <option>Individual Service Provider4</option>
                              <option>Individual Service Provider5</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6 float-l">
                        <div class="form-group register-rc-button">
                           <label>Gender</label>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="gender" name="female" class="custom-control-input" value="female">
                              <label class="custom-control-label" for="customRadio3">Female</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="gender" name="male" class="custom-control-input" value="male">
                              <label class="custom-control-label" for="customRadio4">Male</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="gender" name="other" class="custom-control-input" value="other">
                              <label class="custom-control-label" for="customRadio4">Other</label>
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="col-md-6 float-l">
                        <div class="form-group register-rc-button">
                           <label>Languages Known</label>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox"  class="custom-control-input" id="languages" name="arabic" value="arabic">
                              <label class="custom-control-label" for="customCheck2">Arabic</label>
                           </div>
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="languages" name="english" value="english">
                              <label class="custom-control-label" for="customCheck3">English</label>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 float-l">
                        <div class="form-group">
                           <label>Timing</label>
                           <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter First Name">
                        </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="col-md-6 float-l">
                        <div class="form-group">
                           <label>Experience</label>
                           <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Enter First Name">
                        </div>
                     </div>
                     <div class="col-md-6 float-l">
                        <div class="form-group">
                           <label>Multi Dropdown Checkbox</label>
                           <ul class="tree">
                              <li class="has">
                                 <input type="checkbox" name="domain[]" value="Agricultural Sciences">
                                 <label>Agricultural Sciences <span class="total">(3)</span></label>
                                 <ul>
                                    <li class="">
                                       <input type="checkbox" name="subdomain[]" value="Agriculture, Dairy &amp; Animal Science">
                                       <label>Agriculture, Dairy &amp; Animal Science </label>
                                    </li>
                                    <li class="">
                                       <input type="checkbox" name="subdomain[]" value="Agricultural Engineering">
                                       <label>Agricultural Engineering </label>
                                    </li>
                                    <li class="">
                                       <input type="checkbox" name="subdomain[]" value="Agricultural Economics &amp; Policy">
                                       <label>Agricultural Economics &amp; Policy </label>
                                    </li>
                                 </ul>
                              </li>
                              <li class="has">
                                 <input type="checkbox" name="domain[]" value="Chemical Sciences">
                                 <label>Chemical Sciences <span class="total">(3)</span></label>
                                 <ul>
                                    <li class="">
                                       <input type="checkbox" name="subdomain[]" value="Chemistry, Applied">
                                       <label>Chemistry, Applied </label>
                                    </li>
                                    <li class="">
                                       <input type="checkbox" name="subdomain[]" value="Chemistry, Multidisciplinary">
                                       <label>Chemistry, Multidisciplinary </label>
                                    </li>
                                    <li class="">
                                       <input type="checkbox" name="subdomain[]" value="Chemistry, Analytical">
                                       <label>Chemistry, Analytical </label>
                                    </li>
                                 </ul>
                              </li>
                           </ul>
                        </div>
                     </div>
                     </div>

                     <div class="col-md-12 float-l">
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   
   
</div>
<!---Container Fluid-->

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<script type="text/javascript">
   $(document).on('click', '.tree label', function(e) {
   $(this).next('ul').fadeToggle();
   e.stopPropagation();
   });
   
   $(document).on('change', '.tree input[type=checkbox]', function(e) {
   $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
   $(this).parentsUntil('.tree').children("input[type='checkbox']").prop('checked', this.checked);
   e.stopPropagation();
   });
   
   
</script>
@endsection

