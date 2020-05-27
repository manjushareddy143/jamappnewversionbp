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
                                                    <div class="first_name" id="first_name">jaydip</div>
                                                    <div class="last_name" id="last_name">jaydip</div>
                         <div class="email" id="email"><i class="fas fa-fw fa-envelope"></i>jd112@savitriya.com</div>
                                                    <div class="phone" id="contact"><i class="fas fa-fw fa-phone"></i> +91 1234567890</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 float-l">
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Id</label>
                                                    <span id="vendorId">#123456</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <span id="role">Admin</span>
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
                                                    <span id="gender">Male</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>Languages</label>
                                                    <span id="languages">Arabic, English</span>
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
                                                    <span id="resident_country">India</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 float-l spe-padding">
                                                <div class="form-group">
                                                    <label>Identity Proof Detail</label>
                                                    <span>Lorem Ipsum</span>
                                                    <div class="user-documents-container">
                                                        <div class="document-block">
                                             <img src="https://staging.jam-app.com/images/profiles/1365577202.jpg" id="doc_name">
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
                                                                    <span id="address_line1">Lorem ipsum</span>
                                                                    <span id="address_line2">Lorem ipsum</span>
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
            viewDetail();
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

        function viewDetail() {
            $.ajax({
                url: '/api/v1/getuserbyid/' + user_id,
                type: 'GET',
                data: null,
                success: function (response) {
                    console.log(response);
                    $('#vendorId').text(response['id']);
                    $('#first_name').text(response['first_name']);
                    $('#last_name').text(response['last_name']);
                    $('#gender').text(response['gender']);
                    $('#languages').text(response['languages']);
                    $('#role').text(response['type']);
                    $('#contact').text(response['contact']);
                    $('#email').text(response['email']);
                    $('#address_line1').text(response['address_line1']);
                    $('#address_line2').text(response['address_line2']);
                    $('#doc_name').text(response['doc_name']);
                    $('#resident_country').text(response['resident_country']);

                    
                    

                    if(response['org_id'] == null) {
                        // hide Organisation details
                    }

                    var services = response['services'];
                    for(var i = 0; i < services.length; i++) {
                        console.log(services[i].service);
                    }
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }

    </script>

</body>


    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>

    @endsection

