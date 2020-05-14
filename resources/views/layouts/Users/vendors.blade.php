@extends('layouts.admin')


@section('content')
         <div class="container-fluid" id="container-wrapper">

<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Vendors</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add Vendors</button>
                </div>


          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Vendors</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                     <div class="col-md-6 float-l">
                     <div class="form-group">
                     <label>First Name </label>
                     <input type="text" class="form-control"id="first_name" placeholder="Enter Your First Name">
                      </div>
                      </div>
                      <div class="col-md-6 float-l">
                      <div class="form-group">
                    <label>Last Name </label>
                    <input type="text" class="form-control"id="last_name" placeholder="Enter Your Last Name">
                      </div>
                      </div>


                   <div class="col-md-6 float-l">
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" class="form-control" id="email"  placeholder="Enter Email Address">
                  </div>
                </div>

                <div class="col-md-6 float-l">
                  <div class="form-group">
                  <label>Mobile Number</label>
                  <input type="text" class="form-control" id="mobile" placeholder="Enter Number">
                  </div>
                </div>

                            <!--radiobutton -->
                        <div class="col-md-6 float-l">
                            <div id="gender-group" class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                       <label>Gender</label><br>
                                       <input type="radio" name="gender" value="male"> Male
                                       <input type="radio" name="gender" value="female"> Female
                                       <input type="radio" name="gender" value="other"> Other
                                       @if ($errors->has('gender'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('gender') }}</strong>
                                                    </span>
                                      @endif
                          </div>
                      </div>


                    <div class="col-md-6 float-l">
                              <div class="form-group">
                                <label for="language">Languages known</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="arabic" value="arabic"> Arabic
                                        </label>
                                        <label>
                                            <input type="checkbox" name="english" value="english"> English
                                        </label>
                                 @error('language')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                  </div>
                            </div>


                <div class="col-md-6 float-l">
                  <div class="form-group">
                            <label>Services</label>
                                <select name="type" id="service_provider" class="form-control @error('Selected type') is-invalid @enderror" onchange="showfields()">
                                    <option value="Selected">Select</option>
                                    <option value="Corporate service provider">Corporate service provider</option>
                                    <option value="Individual service provider">Individual service provider</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                  </div>


                            <div class="col-md-6 float-l">
                        <div class="form-group">
                          <label>Category</label>
                                <select id="category" class="form-control">
                                    <option selected value="Please Select">Category</option>
                                    <option value="car">Cars</option>
                                    <option value="truck">Trucks</option>
                                    <option value="motor">Motorcycles</option>
                                    <option value="boat">Boats</option>
                                </select>
                                </div>
                      </div>

                             <div class="col-md-6 float-l">
                                <label for="experience">Experience</label><br>
                                    {!! Form::selectYear('year', 0, 20) !!}
                                    <label for="experience"> Years </label>
                                    {!! Form::selectRange('number', 0, 12); !!}
                                    <label for="experience"> Months</label>
                                    {{-- <input id="experience" type="text" class="form-control " name="Experience"> --}}
                            </div>

                    </form>
                    </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" onclick="store()" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
          </div>
           <!-- Modal -->
<div class="table-responsive">
<table class="table align-items-center table-flush" id="tbl_id">
<thead class="thead-light">
<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Profile</th>
            <th>Gender</th>
          <th width="280px">Action
  </th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>

</div>
</div>
</div>
         <script src="{{ asset('vendor/jquery/jquery.min.js') }}"> </script>
         <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

         <script>
             window.addEventListener ?
                 window.addEventListener("load",onLoad(),false) :
                 window.attachEvent && window.attachEvent("onload",onLoad());



             function onLoad() {
                 console.log("ON LOAD  tbl_id")
                 getResult();

             }

             function getResult() {

                 $.ajax({
                     url: '/api/v1/getuser/3',
                     type: 'GET',
                     data: null,
                     success: function(response){
                         console.log("CREATE CREATE REPOSNE == "+ JSON.stringify(response));
                         var trHTML = '';

                         $.each(response, function (i, item) {
                             var img = (response[i].image == null) ? '{{ URL::asset('/img/boy.png') }}' : response[i].image;
                             trHTML += '<tr><td>' + response[i].first_name +
                                 '</td><td>' + response[i].last_name  + '</td>' +
                                 '</td><td>' + response[i].email  + '</td>' +
                                 '</td><td><img src="' + img + '" class="square" width="60" height="50" /></td>' +
                                 '</td><td>' + response[i].gender  + '</td></tr>';

                         });
                         $('#tbl_id').append(trHTML);
                     },
                     fail: function (error) {
                         console.log(error);
                     }
                 });
             };
         </script>
@endsection
