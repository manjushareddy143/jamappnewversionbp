@extends('layouts.admin')


@section('content')
         <div class="container-fluid" id="container-wrapper">
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Simple Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/login">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
            </ol>
          </div> -->

<div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Vendors Management</h6>
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
           @if ($message = Session::get('success'))

           <div class="alert alert-success">

               <p>{{ $message }}</p>

           </div>

       @endif
<div class="table-responsive">
<table class="table align-items-center table-flush">
<thead class="thead-light">
<tr>

          <!-- <th>id</th> -->
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
          {{--   <th>Roles</th>--}}
          <!-- <th width=10%> Image</th> -->
          <!-- <th>Contact</th> -->
            <th>Profile</th>
          {{-- <th>Type</th> --}}
            <th>Gender</th>
          <!-- <th>Languages Known</th> -->
          {{--   <th>Start_time</th>--}}
          <!-- <th>End_time</th> -->
          <!-- <th>Experience</th> -->
          <th width="280px">Action</th>
</tr>
</thead>
<tbody>
@if (isset($data) && !empty($data))
 <?php $i=0; ?>
@foreach ($data as $key => $user)

<tr>

 <!-- <td>{{ ++$i }}</td> -->
 <td>{{ $user->first_name }}</td>
 <td>{{ $user->last_name }}</td>

 <td>{{ $user->email }}</td>
{{--   <td>--}}
{{--      --}}{{-- @if(!empty($user->getRoleNames()))--}}
{{--        @foreach($user->getRoleNames() as $v)--}}
{{--           <label class="badge badge-success">{{ $v }}</label>--}}
{{--        @endforeach--}}
{{--      @endif --}}
{{--    </td>--}}
{{--     <td><img src="{{ URL::to('/') }}/images/{{ $user->image }}" class="square" width="60" height="50" /></td>--}}
   <td><img src="{{ asset($user->image) }}" class="square" width="60" height="50" /></td>
 <!-- <td>{{ $user->contact }}</td> -->
 {{-- <td>{{ $user->type }}</td> --}}
 <td>{{ $user->gender }}</td>
 <!-- <td>{{ $user->languages_known }}</td> -->
{{--    <td>{{ $user->start_time }}</td>--}}
 <!-- <td>{{ $user->end_time }}</td> -->
 <!-- <td>{{ $user->experience }}</td> -->
 <td>

    <a class="btn btn-info" ><i class="fas fa-eye"></i></a>
{{--        href="{{ route('user.show',$user->id) }}"--}}


    <a class="btn btn-primary" ><i class="fas fa-edit"></i></a>
{{--        href="{{ route('user.edit',$user->id) }}"--}}

{{--        {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}--}}

         <!-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} -->
         <a href="" class="btn btn-danger">
                 <i class="fas fa-trash"></i>
               </a>

     {!! Form::close() !!}

 </td>
</tr>
@endforeach
@endif
</tbody>
</table>
</div>
</div>
@if (isset($data) && !empty($data))
{{-- {!! $data->render() !!} --}}
@endif
</div>
</div>
</div>

@endsection
