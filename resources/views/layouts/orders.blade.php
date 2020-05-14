@extends('layouts.admin')


@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Orders Management</h6>
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            id="user_btn"><i class="fa fa-plus" aria-hidden="true"></i> Add Customer</button> --}}
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush" id="tbl_id">
                            <thead class="thead-light">
                            <tr>
                                <th>Booking User</th>
                                <th>Service</th>
                                <th>Category</th>
                                <th>Booking Date</th>
                                <th>Time</th>
{{--                                <th>End</th>--}}
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
            var retrievedObject = localStorage.getItem('userObject');
            console.log(retrievedObject)
            var obj = JSON.parse(retrievedObject);
            getResult(obj.id);

        }

        function getResult(id) {

            $.ajax({
                url: '/api/v1/booking/provider?id='+id,
                type: 'GET',
                data: null,
                success: function(response){
                    console.log("CREATE CREATE REPOSNE == "+ JSON.stringify(response));
                    var trHTML = '';

                    $.each(response, function (i, item) {
                        trHTML += '<tr><td>' + response[i].order_user.first_name +
                            '</td><td>' + response[i].service  + '</td>' +
                            '</td><td>' + response[i].category  + '</td>' +
                            '</td><td>' + response[i].booking_date  + '</td>' +
                            '</td><td>' + response[i].start_time + " to " +  response[i].end_time + '</td></tr>';

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
