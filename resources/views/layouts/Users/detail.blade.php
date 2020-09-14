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
            /*z-index: 0; !* Sit on top *!*/
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
            color: #959191;
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
                        {{-- <h1 class="h3 mb-0 text-gray-800">User Details</h1> --}}
                       <div class="custom-buttons">

{{--                        <div class="custom-buttons">--}}

{{--                            <button type="button" class="btn btn-primary mb-1">Create</button>--}}
<button type="button" id="btn_verify" class="btn btn-primary" onclick="verify()">Verify</button>
<button type="button" id="back_btn" class="btn btn-secondary mb-1">Back</button>

                       </div>
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
                                                <img id="image" src="https://staging.jam-app.com/img/boy.png" alt="Snow" style="width:100%;max-width:300px">
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
                                                    <span id="role">test</span>
                                                </div>
                                            </div>

                                            <div class="col-md-4 float-l organization_field" id="org_nameDiv">
                                                <div class="form-group">
                                                    <label>@lang('details.label_oname')</label>
                                                    <span id="org_name">Savitriya Technologies</span>
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
                                            <div class="col-md-4 float-l organization_field" id="org_emailDiv">
                                                <div class="form-group">
                                                    <label>@lang('details.label_oemail')</label>
                                                    <span id="org_email">organization@gmail.com</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l">
                                                <div class="form-group">
                                                    <label>@lang('details.label_type')</label>
                                                    <span id="type">++++++++++++</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l" id="serviceDiv">
                                                <div class="form-group">
                                                    <label>@lang('details.label_pservices')</label>
                                                    <span id="services"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l organization_field" id="org_contatDiv">
                                                <div class="form-group">
                                                    <label>@lang('details.label_ocontact')</label>
                                                    <span>+91 1234567890</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l" id="subcateDiv">
                                                <div class="form-group">
                                                    <label>@lang('details.label_subcat')</label>
                                                    <span id="subcategories"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 float-l" id="countryDiv">
                                                <div class="form-group">
                                                    <label>@lang('details.label_country')</label>
                                                    <span id="resident_country">India</span>
                                                </div>
                                            </div>

                                            <div class="col-md-10 float-l spe-padding" id="documentDiv">
                                                <div class="form-group">
                                                    <label>@lang('details.label_proof')</label>
                                                    <!--div class="col-md-1" style="float: right;">
                                                        <button type="button" id="btn_verify" class="btn btn-primary" onclick="verify()">Verify</button>
                                                    </div-->
                                                    <div class="user-documents-container float-l" id="doc">
                                                        {{-- doc html --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 float-l">
                                                <div class="form-group">
                                                    {{-- <label>Address</label> --}}
                                                    <label>@lang('details.label_add')</label>

                                                    <div id="addresslist">


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>

                                    <div class="modal fade" id="popupModel" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                    id="popupTitle">Document Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true" style="color: #04bfac;">X
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="#" class="form-container">
                                                        <div class="form-group">
                                                            <img src="https://staging.jam-app.com/images/profiles/1365577202.jpg"
                                                            id="popup_img" alt="document1" style="width:auto;max-width:-webkit-fill-available">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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


        function docdisplay(id)
        {
            console.log("Image of vendor" + JSON.stringify(docs[id]));
            // idVal = '"#'+ docs[id].id +'"';
            // console.log(idVal);
            $("#doc").click(function(){
                console.log("idVal");
                $('#popupModel').modal();
            });

            $('#popupTitle').text(docs[id].type);
            $('#popup_img').attr("src", docs[id].doc_name);
        }

        var docs;
        function viewDetail() {
            $.ajax({
                    url: '/api/v1/getuserbyid/' + user_id,
                type: 'GET',
                data: null,
                success: function (response) {
                    console.log("res=== "+ JSON.stringify(response));
                    if(response['image'] != null) {
                        $('#image').attr("src", response['image']);
                    }

                    $('#vendorId').text(response['id']);
                    $('#first_name').text(response['first_name']);
                    $('#last_name').text(response['last_name']);
                    $('#gender').text(response['gender']);
                    $('#languages').text(response['languages']);
                    $('#role').text(response['type']['type']);
                    $('#type').text(response['type']['type']);
                    $('#contact').text(response['contact']);
                    $('#email').text(response['email']);




                    if(response['address'] == undefined) {


                    } else {
                        if(response['address'].length == 0) {

                        } else {
                            var  i = 0;
                            var trHTML = '';
                            for(i = 0; i <response['address'].length; i++ ) {

                                var addressline = response['address'][i].address_line1;

                                if(response['address'][i].address_line2 != "") {
                                    addressline += ", " + response['address'][i].address_line2;
                                }

                                if(response['address'][i].landmark != "") {
                                    addressline += ", " + response['address'][i].landmark;
                                }

                                if(response['address'][i].district != "") {
                                    addressline += ", " + response['address'][i].district;
                                }

                                if(response['address'][i].city != "") {
                                    addressline += ", " + response['address'][i].city;
                                }

                                if(response['address'][i].postal_code != "") {
                                    addressline += ", " + response['address'][i].postal_code;
                                }
                                trHTML += '<div class="col-md-6">' +
                                ' <label>' + response['address'][i].name +'</label>'+
                                '<span> ' + addressline +'</span></div><br />';
                            }
                            $('#addresslist').append(trHTML);
                        }
                    }


                    // $('#address_line1').text(response['address']['address_line1']);
                    // $('#address_line2').text(response['address']['address_line2']);
                    // $('#doc_name').text(response['doc_name']);


                    if(response['documents'] == undefined) {
                        $('#documentDiv').hide();
                    } else {

                        if(response['documents'].length == 0) {
                            $('#documentDiv').hide();
                        } else {
                            docs = response['documents'];
                            var trHTML = '';
                            var i;
                            for(i = 0; i < docs.length; i++)
                            {
                                var obj = docs[i];
                                trHTML += '<div class="document-block">'+
                                '<img src="'+ docs[i].doc_name +'"'+
                                ' id="doc" alt="document1" style="width:100%;max-width:300px"'+
                                ' onclick="docdisplay(' + i + ')">' +
                                '<span>' + docs[i].type +'</span></div>';
                                // console.log("DOCS == " + JSON.stringify(docs));
                            }

                            $('#doc').append(trHTML);
                        }

                    }


                    if(response['services'] == undefined) {
                        $('#serviceDiv').hide()
                        $('#subcateDiv').hide()
                    } else {
                        if(response['services'].length == 0) {
                            $('#serviceDiv').hide()
                            $('#subcateDiv').hide()
                        } else {
                            var i = 0;
                            service = response['services'];
                            var serviceName = "";
                            var subCategoriesName = "";
                            for( i=0; i<service.length; i++ ) {

                                // if(servicesString == "-") {
                                //     servicesString =  item.service.name;
                                // } else {
                                //     if(servicesString.indexOf(item.service.name) == -1){
                                //         servicesString += ", " + item.service.name;
                                //     }
                                // }


                                if(serviceName == "") {
                                    serviceName = service[i]['service'].name;
                                } else {
                                    if(serviceName.indexOf(service[i]['service'].name) == -1){
                                        serviceName += ',' +service[i]['service'].name;
                                    }
                                }
                                if(service[i].categories != null) {
                                    // subCategoriesName += "\n - " + service[i].categories.name;
                                    if(subCategoriesName == "") {
                                        subCategoriesName = service[i].categories.name;
                                    } else {
                                        subCategoriesName += ',' +service[i].categories.name;
                                    }
                                }

                                // if(service[i].subcategories == undefined) {

                                // } else {
                                //     if(service[i].subcategories.length == 0) {

                                //     } else {
                                //         var j = 0;
                                //         for(j = 0; j<service[i].subcategories; j++ ) {

                                //         }
                                //     }
                                // }
                            }

                            if(subCategoriesName == "") {
                                $('#subcateDiv').hide()
                            } else  {
                                $('#subcategories').text(subCategoriesName);
                            }

                            $('#services').text(serviceName);

                        }

                    }

                    if(response['organisation'] == null) {
                        $('#org_nameDiv').hide();
                        $('#org_contatDiv').hide();
                        $('#org_emailDiv').hide();
                    } else {

                        $('#org_name').text(response['organisation']['name']);
                        $('#org_contatDiv').hide();
                        $('#org_emailDiv').hide();
                        // $('#org_email').text(response['organisation']['name']);
                        // $('#contact').text(response['organisation']['name']);


                    }


                    if(response['provider'] != null) {
                        $('#resident_country').text(response['provider']['resident_country']);
                        if(response['provider']['verified'] == 1){
                            $('#btn_verify').hide();
                        }
                    } else {
                        $('#resident_country').hide();
                        $('#countryDiv').hide();
                        $('#btn_verify').hide();

                    }

                    if(response['org_id'] == null) {
                        $('#organization_name').hide();
                        $("#organization_contact").hide();
                        $("#organization_email").hide();

                    }
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }

        function verify(){
            console.log("hi docs");
            $.ajax({
                url: '/api/v1/verification/' + user_id,
                type: 'POST',
                data: null,
                success: function (response) {
                    console.log("response ::" + response);
                    if(response == 1) {
                        console.log("SUCCESS");
                        $('#btn_verify').hide();
                    } else {
                        console.log("FAIL");
                        // $('#btn_verify').show();
                    }
                },
                fail: function (error) {
                    console.log(error);
                }
            });
        }

        $("#back_btn").click(function (){
           window.history.back();
        });
        // $(function() {
		// $('.pop').on('click', function() {
		// 	$('.imagepreview').attr('src', $(this).find('img').attr('src'));
		// 	$('#imagemodal').modal('show');
		// });




</script>

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

