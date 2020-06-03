@extends('layouts.admin')
@section('content')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}

        #image {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #image:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }


        /* Add Animation */
        .modal-content, #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)}
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }

        }

    </style>
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
                        <h1 class="h3 mb-0 text-gray-800">@lang('details.label_header')</h1>
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

                                                    <img id="image" src="/images/profiles/155775427.png" alt="Snow" style="width:100%;max-width:300px">
{{--                                                <img src="/images/profiles/155775427.png" id="image">--}}
                                                {{-- <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    </div> --}}

                                                <div class="sidebar-user-info">
                 <span class="first_name" id="first_name">jaydip</span> <span class="last_name" id="last_name">jaydip</span>
                <div class="email" id="email"><i class="fas fa-fw fa-envelope"></i>jd112@savitriya.com</div>
                  <div class="phone" id="contact"><i class="fas fa-fw fa-phone"></i> +91 1234567890</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 float-l">
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>@lang('details.label_id')</label>
                                                    <span id="vendorId">#123456</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>@lang('details.label_role')</label>
                                                    <span id="role">Admin</span>
                                                </div>
                                            </div>

                                            <div class="col-md-4 float-l organization_field">
                                                <div class="form-group">
                                                    <label>@lang('details.label_oname')</label>
                                                    <span>Savitriya Technologies</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>@lang('details.label_gender')</label>
                                                    <span id="gender">Male</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>@lang('details.label_lang')</label>
                                                    <span id="languages">Arabic, English</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l organization_field">
                                                <div class="form-group">
                                                    <label>@lang('details.label_oemail')</label>
                                                    <span>organization@gmail.com</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>@lang('details.label_type')</label>
                                                    <span>Lorem Ipsum</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>@lang('details.label_pservices')</label>
                                                    <span>Lorem Ipsum</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l organization_field">
                                                <div class="form-group">
                                                    <label>@lang('details.label_ocontact')</label>
                                                    <span>+91 1234567890</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>@lang('details.label_subcat')</label>
                                                    <span>Lorem Ipsum</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>@lang('details.label_country')</label>
                                                    <span id="resident_country">India</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 float-l spe-padding">
                                                <div class="form-group">
                                                    <label>@lang('details.label_proof')</label>
                                                    <span>Lorem Ipsum</span>
                                                    <div class="user-documents-container">
                                                        <div class="document-block">
                                      <img src="https://staging.jam-app.com/images/profiles/1365577202.jpg" id="doc_name1" alt="document1" style="width:100%;max-width:300px" onclick="headerhide()">
                                                            <span>Parn Card</span>
                                                        </div>
                                                        <div class="document-block">
                                        <img src="https://staging.jam-app.com/images/profiles/1365577202.jpg" id="doc_name2" alt="document2" style="width:100%;max-width:300px">
                                                            <span>Passport</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 float-l">
                                                <div class="form-group">
                                                    <label>@lang('details.label_add')</label>
{{--                                                    <div class="custom-buttons">--}}

{{--                                                        <button type="button" class="btn btn-primary mb-1">Create</button>--}}
{{--                                                        <button type="button" class="btn btn-secondary mb-1">Back</button>--}}
{{--                                                    </div>--}}
                                                    <div class="addresscontainer">

                                                            <div class="addressdiv">
                                                                <div class="col-md-4 float-l paddingleft0 addressblock">
                                                                    <label>@lang('details.label_add1')</label>
                                                                    <span id="address_line1">Lorem ipsum</span>
                                                                    <span id="address_line2">Lorem ipsum</span>
                                                                </div>
                                                                <div class="col-md-4 float-l paddingleft0 addressblock">
                                                                    <label>@lang('details.label_add2')</label>
                                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas luctus condimentum velit, </span>
                                                                </div>
                                                                <div class="col-md-4 float-l paddingleft0 addressblock">
                                                                    <label>@lang('details.label_add3')</label>
                                                                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas luctus condimentum velit, </span>
                                                                </div>
                                                                <div class="col-md-4 float-l paddingleft0 addressblock">
                                                                    <label>@lang('details.label_add4')</label>
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
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>

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
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("image");
        var modalImg = document.getElementById("img01");

        // var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            // captionText.innerHTML = this.alt;

        }

        //Document image zoom
        var img = document.getElementById("doc_name1");
        // var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            // captionText.innerHTML = this.alt;
        }

        var img = document.getElementById("doc_name2");
        // var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            // captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

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
                    console.log("res=== "+response);
                    if(response['image'] != null) {
                        $('#image').attr("src", response['image']);
                    }

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
                        $('#organization_name').hide();
                        $("#organization_contact").hide();
                        $("#organization_email").hide();

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

        $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');
		});
});



</script>
{{-- <style>
 .bg-navbar {
    background-color: #04bfac;
    display: none;
    }
</style> --}}
<style>
.organization_field {
/*display: none;*/
}

</style>
</body>


    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>

    @endsection

