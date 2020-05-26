@extends('layouts.admin')
@section('content')

    <body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->

        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User Details</h1>
{{--                        <div class="custom-buttons">--}}
{{--                            <button type="button" class="btn btn-primary mb-1">Create</button>--}}
{{--                            <button type="button" class="btn btn-secondary mb-1">Back</button>--}}
{{--                        </div>--}}
                    </div>
                    <div class="row sectionrow">
                        <div class="col-lg-12">
                            <!-- Horizontal Form -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <form method="post">
                                    <div class="login-form create-user user-details-container">
                                        <div class="col-md-3 float-l">
                                            <div class="profile-container" style="width: 200px !important;">
                                                <img src="https://staging.jam-app.com/images/profiles/1365577202.jpg">
                                                <div class="sidebar-user-info">
             <div class="first_name"><?php $first_name = (isset($_POST["first_name"])) ? $_POST["first_name"] : null; ?></div>
  <div class="email"><i class="fas fa-fw fa-envelope"></i> <?php $email = (isset($_POST["email"])) ? $_POST["email"] : null; ?></div>
                                                    <div class="phone"><i class="fas fa-fw fa-phone"></i> +91 1234567890</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 float-l">
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Id</label>
                                                    <span>#123456</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <span>Admin</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Organization Name</label>
                                                    <span>Savitriya Technologies</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <span>Male</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Languages</label>
                                                    <span>Arabic, English</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Organization Email</label>
                                                    <span>organization@gmail.com</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <span>Lorem Ipsum</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Providing Services</label>
                                                    <span>Lorem Ipsum</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Organization Contact</label>
                                                    <span>+91 1234567890</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Providing Services subcategories</label>
                                                    <span>Lorem Ipsum</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Residence country</label>
                                                    <span>India</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 float-l spe-padding">
                                                <div class="form-group">
                                                    <label>Identity Proof Detail</label>
                                                    <span>Lorem Ipsum</span>
                                                    <div class="user-documents-container">
                                                        <div class="document-block">
                                                            <img src="https://staging.jam-app.com/images/profiles/1365577202.jpg">
                                                            <span>Parn Card</span>
                                                        </div>
                                                        <div class="document-block">
                                                            <img src="https://staging.jam-app.com/images/profiles/1365577202.jpg">
                                                            <span>Passport</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 float-l">
                                                <div class="form-group">
                                                    <label>Address</label>
{{--                                                    <div class="custom-buttons">--}}

{{--                                                        <button type="button" class="btn btn-primary mb-1">Create</button>--}}
{{--                                                        <button type="button" class="btn btn-secondary mb-1">Back</button>--}}
{{--                                                    </div>--}}
                                                    <div class="addresscontainer">

                                                            <div class="addressdiv">
                                                                <div class="col-md-4 float-l paddingleft0 addressblock">
                                                                    <label>Home</label>
                                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas luctus condimentum velit, </span>
                                                                </div>
                                                                <div class="col-md-4 float-l paddingleft0 addressblock">
                                                                    <label>Office</label>
                                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas luctus condimentum velit, </span>
                                                                </div>
                                                                <div class="col-md-4 float-l paddingleft0 addressblock">
                                                                    <label>Farmhouse</label>
                                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas luctus condimentum velit, </span>
                                                                </div>
                                                                <div class="col-md-4 float-l paddingleft0 addressblock">
                                                                    <label>Factory</label>
                                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas luctus condimentum velit, </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---Container Fluid-->


                </div>
            </div>
        </div>
        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


   
    <script type="text/javascript">


    $( document ).ready(function() {
    // console.log( "ready!" );
    // alert('hello');
    });

        $(document).on('click', '.tree label', function(e) {
            $(this).next('ul').fadeToggle();
            e.stopPropagation();
        });

        $(document).on('change', '.tree input[type=checkbox]', function(e) {
            $(this).siblings('ul').find("input[type='checkbox']").prop('checked', this.checked);
            $(this).parentsUntil('.tree').children("input[type='checkbox']").prop('checked', this.checked);
            e.stopPropagation();
        });

        window.addEventListener ?
            window.addEventListener("load",onLoad(),false) :
            window.attachEvent && window.attachEvent("onload",onLoad());
        var user_id;
        function onLoad() {
            user_id = getUrlParameter('id');
            console.log(user_id);
            // alert(user_id);
            viewDetail(user_id);
        }


        function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
        };

        function viewDetail(userId) { 
            // alert('hello');
                $.ajax({
                type: "GET",
                url: '/api/v1/getuserbyid/' + userId,
                data: null,
                success: function(data){
                    alert('success');
                    console.log(data);  

                     'id='+user_id,
                     'first_name='+first_name,
                     'last_name='+last_name,
                     'email='+email,



                    // $.each(response, function (i, item) {
                    //     trHTML += '<tr><td>' + response[i].first_name +
                    //         '</td><td>' + response[i].last_name + '</td>' +
                    //         '</td><td>' + response[i].email + '</td>' +
                    //         '</td><td><img src="' + img + '" class="square" width="60" height="50" /></td>' +
                    //         '</td><td>' + response[i].gender + '</td>' +
                    //         '</a>' + '</td></tr>';
                    // });

                    // $('#tbl_id').append(trHTML);

            
        }
            });
        };

    </script>

</body>


    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>

    @endsection

