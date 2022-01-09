@extends('frontend.default')
@section('content')

@if(session()->get('locale')=='en')
<main class="custom_main">
    <div id="main_content">
        <div class="provider-register-content">
            <div class="provider-register-header">Provider register</div>
            <form action="https://syaanh.com/provider/register" id="provider_registration_form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="2HOTOfa5oScjPIFMo529tO07X1I0tqnorJ8H1qvG">
                <div class="register-nav-tabs">
                    <ul class="nav nav-tabs provider-information provider-half-gradient" role="tablist" style="">
                        <li class="nav-item nav-item-personal nav-item-active">
                            <span><a>1</a><a>.&nbsp;</a><a>Personal information</a></span>
                        </li>
                        <li class="nav-item nav-item-professional">
                            <span><a>2</a><a>.&nbsp;</a><a>Professional information</a></span>
                        </li>
                    </ul>
                </div>
                <div class="register-nav-tabs-320" style="display: none">
                    <ul class="nav nav-tabs provider-information provider-half-gradient" role="tablist" style="">
                        <li class="nav-item-320 nav-item-personal nav-item-active"><a>1.&nbsp;Personal information</a></li>
                        <li class="nav-item-320 nav-item-professional"><a>2.&nbsp;Professional information</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="personal" class="tab-pane fade active show">
                        <div class="provider-personal-content">
                            <div class="provider-register-avatar">
                                <div class="avatar-label">
                                    <img src="https://syaanh.com/web/avatars/no-avatar.png" class="thumb img-responsive" id="thumb">
                                </div>
                                <label class="add-button btn btn-file">
                                <input type="file" name="avatar" id="provider-register-img" title="No file chosen" onchange="readPAURL(this)" required="">
                                <img src="https://syaanh.com/web/icons/add.png" alt="">
                                </label>
                                <a class="edit-avatar-button btn" id="avatar_edit" data-toggle="dropdown">
                                <img src="https://syaanh.com/web/icons/pencil.png" alt="">
                                </a>
                                <div class="dropdown-menu  dropdown-primary avatar-edit-options" aria-labelledby="edit_avatar">
                                    <a class="dropdown-item btn" id="edit-provider-register-img">Edit</a>
                                    <a class="dropdown-item btn" onclick="removeProviderAvatar()">Delete</a>
                                </div>
                            </div>
                            <div class="provider-register-avatar-error-message">
                                <span class="help-block hidden"><strong></strong></span>
                            </div>
                            <div class="form-group input-provider-mobile">
                                <label for="provider_mobile " class="provider-label">Phone</label>
                                <div class="input-provider-country-code">
                                    <span class="country-code" id="provider_country_code" style="color: rgb(74, 74, 74); top: 31px;">+ 974
                                    </span>
                                    <input type="text" name="mobile" id="provider_mobile" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="8" required="" title="Fill out this field" placeholder="Phone">
                                    <span class="help-block hidden">
                                    <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="provider-name-inputs">
                                <div class="form-group col-name-en input-name">
                                    <label for="provider_name_en" class="provider-label"> Name</label>
                                    <input type="text" name="name" class="form-control" id="provider_name_en" placeholder="Service provider name" required="" title="Fill out this field">
                                    <span class="help-block hidden"><strong></strong></span>
                                </div>
                                <div class="form-group  col-name-ar input-name-ar">
                                    <label for="provider_name_ar" class="provider-label provider-register-arabic-name-label">  Name in Arabic</label>
                                    <input type="text" name="name_ar" class="form-control" id="provider_name_ar" required="" title="Fill out this field" placeholder="Service provider name (Arabic)">
                                    <span class="help-block hidden"><strong></strong></span>
                                </div>
                            </div>
                            <div class="form-group input-email">
                                <label for="provider_email" class="provider-label">Email</label>
                                <input type="email" name="email" id="provider_email" class="form-control" required="" title="Fill out this field" placeholder="Email">
                                <span class="help-block hidden"><strong></strong></span>
                            </div>
                            <div class="form-group input-password">
                                <label for="provider_password" class="provider-label">Password</label>
                                <input type="password" name="password" title="Fill out this field" id="provider_password" class="form-control" required="" placeholder="Password">
                                <span class="help-block hidden"><strong></strong></span>
                            </div>
                            <div class="form-group provider-continue-button">
                                <a href="#" class="to-professional">
                                    <div class="provider-continue-butt">
                                        <span>Continue</span>
                                        <img src="https://syaanh.com/web/icons/right_caret.png" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="professional" class="tab-pane fade">
                        <div class="provider-professional-content">
                            <div class="form-group work-type">
                                <label class="select-label">Select your type of work                                </label>
                                <div class="select-buttons">
                                    <div class="btn-group btn-group-toggle btn-group-3">
                                        <label class="btn btn-default btn-company btn-active">
                                        <input type="radio" name="is_company" value="1" checked="">
                                        Company                                        </label>
                                        <label class="btn btn-default  btn-individual btn-not-active">
                                        <input type="radio" name="is_company" value="0">
                                        Individual                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="document-upload">
                                <div class="company-registration-description">
                                    <span>Company* registration means you are working in a company and need to upload company documents.</span>
                                </div>
                                <div class="individual-description document-upload-hide" style="display: none">
                                    <span>Individual* registration means you don't have a company and you need to upload your Personal ID.</span>
                                </div>
                                <div class="form-group input-provider-document">
                                    <label class="upload-document-label company-documents">
                                    Upload a company files* (Maximum 10)</label>
                                    <label class="upload-document-label individual-documents hidden">
                                    Upload personal ID (Maximum 3)</label>
                                    <div class="d-flex provider-documents">
                                        <div id="holder" class="holder-default">
                                            <span class="provider-register-upload-text">
                                                <div class="provider-holder-default-image">
                                                    <img src="https://syaanh.com/web/buttons/Shape.png" id="providerRegisterShape">
                                                </div>
                                                <div class="provider-holder-default-text">Drag files to</div>
                                            </span>
                                            <input type="file" name="document[]" id="providerRegisterDocumentInput" onchange="preview_images(this,appendProviderDocuments,validateFiles);" class="hidden" title="No file chosen" multiple="">
                                        </div>
                                        <div class="provider-documents-content">
                                        </div>
                                    </div>
                                    <div class="hidden provider-documents-mobile">
                                        <input type="file" name="document[]" id="providerRegisterDocumentInputMobile" onchange="preview_images(this,appendProviderDocuments,validateFiles);" class="hidden" multiple="">
                                        <div class="add-image-provider-documents-mobile">
                                            <img src="https://syaanh.com/web/icons/add.png" alt="">
                                        </div>
                                        <div class="provider-documents-content-mobile">
                                        </div>
                                    </div>
                                    <div class="provider-documents-error">
                                        <span class="help-block hidden">
                                        <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group service-provide">
                                <label class="select-label">Select services you provide</label>
                                <div class="input-category">
                                    <span class="help-block hidden">
                                    <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="categories-checkboxes">
                                <div class="category-checkbox-col">
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_1" value="1">
                                        <label class="custom-control-label-provider" for="category_1">Cleaning &amp; Home Maids</label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_2" value="2">
                                        <label class="custom-control-label-provider" for="category_2">
                                        Air Conditioner
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_3" value="3">
                                        <label class="custom-control-label-provider" for="category_3">
                                        Electrical Work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_4" value="4">
                                        <label class="custom-control-label-provider" for="category_4">
                                        Painting &amp; Decor
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_5" value="5">
                                        <label class="custom-control-label-provider" for="category_5">
                                        Carpentry work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_6" value="6">
                                        <label class="custom-control-label-provider" for="category_6">
                                        Agriculture Work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_7" value="7">
                                        <label class="custom-control-label-provider" for="category_7">
                                        Plumbing Work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_8" value="8">
                                        <label class="custom-control-label-provider" for="category_8">
                                        Pest Control
                                        </label>
                                    </div>
                                </div>
                                <div class="category-checkbox-col">
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_9" value="9">
                                        <label class="custom-control-label-provider" for="category_9">
                                        Furniture Transfer
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_10" value="10">
                                        <label class="custom-control-label-provider" for="category_10">
                                        Satellite Technician
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_11" value="11">
                                        <label class="custom-control-label-provider" for="category_11">
                                        Car Transfer
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_51" value="51">
                                        <label class="custom-control-label-provider" for="category_51">
                                        Electronic Devices
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_62" value="62">
                                        <label class="custom-control-label-provider" for="category_62">
                                        Mobiles Maintenance
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_65" value="65">
                                        <label class="custom-control-label-provider" for="category_65">
                                        Aluminum work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_66" value="66">
                                        <label class="custom-control-label-provider" for="category_66">
                                        Blacksmith work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_68" value="68">
                                        <label class="custom-control-label-provider" for="category_68">
                                        Surveillance Cameras
                                        </label>
                                    </div>
                                </div>
                                <div class="category-checkbox-col">
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_69" value="69">
                                        <label class="custom-control-label-provider" for="category_69">
                                        Tank cleaning
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_70" value="70">
                                        <label class="custom-control-label-provider" for="category_70">
                                        Computer maintenance
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_71" value="71">
                                        <label class="custom-control-label-provider" for="category_71">
                                        Swimming Pools
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_73" value="73">
                                        <label class="custom-control-label-provider" for="category_73">
                                        Car services
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_74" value="74">
                                        <label class="custom-control-label-provider" for="category_74">
                                        Furniture &amp; Curtains
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_75" value="75">
                                        <label class="custom-control-label-provider" for="category_75">
                                        Tents
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_76" value="76">
                                        <label class="custom-control-label-provider" for="category_76">
                                        Internet networks
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_77" value="77">
                                        <label class="custom-control-label-provider" for="category_77">
                                        Insulation
                                        </label>
                                    </div>
                                </div>
                                <div class="category-checkbox-col">
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_80" value="80">
                                        <label class="custom-control-label-provider" for="category_80">
                                        Sterilization
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_81" value="81">
                                        <label class="custom-control-label-provider" for="category_81">
                                        Car Sterilization
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group service-area">
                                <label class="select-label">Select areas you cover</label>
                                <div class="input-area">
                                    <span class="help-block hidden">
                                    <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="areas-checkboxes">
                                <div class="area-checkbox-col">
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_1" value="1">
                                        <label class="custom-control-label-provider" for="area_1">Doha</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_2" value="2">
                                        <label class="custom-control-label-provider" for="area_2">Al Ghuwariyah</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_3" value="3">
                                        <label class="custom-control-label-provider" for="area_3">aljamilya</label>
                                    </div>
                                </div>
                                <div class="area-checkbox-col">
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_4" value="4">
                                        <label class="custom-control-label-provider" for="area_4">Al Khor</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_5" value="5">
                                        <label class="custom-control-label-provider" for="area_5">Al Wakrah</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_6" value="6">
                                        <label class="custom-control-label-provider" for="area_6">Al Rayyan</label>
                                    </div>
                                </div>
                                <div class="area-checkbox-col">
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_7" value="7">
                                        <label class="custom-control-label-provider" for="area_7">Madinat ash Shamal</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_8" value="8">
                                        <label class="custom-control-label-provider" for="area_8">Umm Salal</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_9" value="9">
                                        <label class="custom-control-label-provider" for="area_9">Mesaieed</label>
                                    </div>
                                </div>
                                <div class="area-checkbox-col">
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_10" value="10">
                                        <label class="custom-control-label-provider" for="area_10">Al Shahania</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group provider-continue-button">
                                <a href="#" class="to-personal">
                                    <div class="provider-back-butt">
                                        <span>Back</span>
                                    </div>
                                </a>
                                <a href="#" class="to-register">
                                    <div class="provider-continue-butt">
                                        <span>Continue</span>
                                        <img src="https://syaanh.com/web/icons/right_caret.png" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@else
<main class="custom_main">
    <div id="main_content">
        <div class="provider-register-content">
            <div class="provider-register-header">سجل المزود</div>
            <form action="https://syaanh.com/provider/register" id="provider_registration_form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="2HOTOfa5oScjPIFMo529tO07X1I0tqnorJ8H1qvG">
                <div class="register-nav-tabs">
                    <ul class="nav nav-tabs provider-information provider-half-gradient" role="tablist" style="">
                        <li class="nav-item nav-item-personal nav-item-active">
                            <span><a>1</a><a>.&nbsp;</a><a>معلومات شخصية</a></span>
                        </li>
                        <li class="nav-item nav-item-professional">
                            <span><a>2</a><a>.&nbsp;</a><a>معلومات احترافية</a></span>
                        </li>
                    </ul>
                </div>
                <div class="register-nav-tabs-320" style="display: none">
                    <ul class="nav nav-tabs provider-information provider-half-gradient" role="tablist" style="">
                        <li class="nav-item-320 nav-item-personal nav-item-active"><a>1.&nbsp;Personal information</a></li>
                        <li class="nav-item-320 nav-item-professional"><a>2.&nbsp;Professional information</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="personal" class="tab-pane fade active show">
                        <div class="provider-personal-content">
                            <div class="provider-register-avatar">
                                <div class="avatar-label">
                                    <img src="https://syaanh.com/web/avatars/no-avatar.png" class="thumb img-responsive" id="thumb">
                                </div>
                                <label class="add-button btn btn-file">
                                <input type="file" name="avatar" id="provider-register-img" title="No file chosen" onchange="readPAURL(this)" required="">
                                <img src="https://syaanh.com/web/icons/add.png" alt="">
                                </label>
                                <a class="edit-avatar-button btn" id="avatar_edit" data-toggle="dropdown">
                                <img src="https://syaanh.com/web/icons/pencil.png" alt="">
                                </a>
                                <div class="dropdown-menu  dropdown-primary avatar-edit-options" aria-labelledby="edit_avatar">
                                    <a class="dropdown-item btn" id="edit-provider-register-img">Edit</a>
                                    <a class="dropdown-item btn" onclick="removeProviderAvatar()">Delete</a>
                                </div>
                            </div>
                            <div class="provider-register-avatar-error-message">
                                <span class="help-block hidden"><strong></strong></span>
                            </div>
                            <div class="form-group input-provider-mobile">
                                <label for="provider_mobile " class="provider-label">Phone</label>
                                <div class="input-provider-country-code">
                                    <span class="country-code" id="provider_country_code" style="color: rgb(74, 74, 74); top: 31px;">+ 974
                                    </span>
                                    <input type="text" name="mobile" id="provider_mobile" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="8" required="" title="Fill out this field" placeholder="Phone">
                                    <span class="help-block hidden">
                                    <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="provider-name-inputs">
                                <div class="form-group col-name-en input-name">
                                    <label for="provider_name_en" class="provider-label"> Name</label>
                                    <input type="text" name="name" class="form-control" id="provider_name_en" placeholder="Service provider name" required="" title="Fill out this field">
                                    <span class="help-block hidden"><strong></strong></span>
                                </div>
                                <div class="form-group  col-name-ar input-name-ar">
                                    <label for="provider_name_ar" class="provider-label provider-register-arabic-name-label">  Name in Arabic</label>
                                    <input type="text" name="name_ar" class="form-control" id="provider_name_ar" required="" title="Fill out this field" placeholder="Service provider name (Arabic)">
                                    <span class="help-block hidden"><strong></strong></span>
                                </div>
                            </div>
                            <div class="form-group input-email">
                                <label for="provider_email" class="provider-label">Email</label>
                                <input type="email" name="email" id="provider_email" class="form-control" required="" title="Fill out this field" placeholder="Email">
                                <span class="help-block hidden"><strong></strong></span>
                            </div>
                            <div class="form-group input-password">
                                <label for="provider_password" class="provider-label">Password</label>
                                <input type="password" name="password" title="Fill out this field" id="provider_password" class="form-control" required="" placeholder="Password">
                                <span class="help-block hidden"><strong></strong></span>
                            </div>
                            <div class="form-group provider-continue-button">
                                <a href="#" class="to-professional">
                                    <div class="provider-continue-butt">
                                        <span>Continue</span>
                                        <img src="https://syaanh.com/web/icons/right_caret.png" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="professional" class="tab-pane fade">
                        <div class="provider-professional-content">
                            <div class="form-group work-type">
                                <label class="select-label">Select your type of work                                </label>
                                <div class="select-buttons">
                                    <div class="btn-group btn-group-toggle btn-group-3">
                                        <label class="btn btn-default btn-company btn-active">
                                        <input type="radio" name="is_company" value="1" checked="">
                                        Company                                        </label>
                                        <label class="btn btn-default  btn-individual btn-not-active">
                                        <input type="radio" name="is_company" value="0">
                                        Individual                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="document-upload">
                                <div class="company-registration-description">
                                    <span>Company* registration means you are working in a company and need to upload company documents.</span>
                                </div>
                                <div class="individual-description document-upload-hide" style="display: none">
                                    <span>Individual* registration means you don't have a company and you need to upload your Personal ID.</span>
                                </div>
                                <div class="form-group input-provider-document">
                                    <label class="upload-document-label company-documents">
                                    Upload a company files* (Maximum 10)</label>
                                    <label class="upload-document-label individual-documents hidden">
                                    Upload personal ID (Maximum 3)</label>
                                    <div class="d-flex provider-documents">
                                        <div id="holder" class="holder-default">
                                            <span class="provider-register-upload-text">
                                                <div class="provider-holder-default-image">
                                                    <img src="https://syaanh.com/web/buttons/Shape.png" id="providerRegisterShape">
                                                </div>
                                                <div class="provider-holder-default-text">Drag files to</div>
                                            </span>
                                            <input type="file" name="document[]" id="providerRegisterDocumentInput" onchange="preview_images(this,appendProviderDocuments,validateFiles);" class="hidden" title="No file chosen" multiple="">
                                        </div>
                                        <div class="provider-documents-content">
                                        </div>
                                    </div>
                                    <div class="hidden provider-documents-mobile">
                                        <input type="file" name="document[]" id="providerRegisterDocumentInputMobile" onchange="preview_images(this,appendProviderDocuments,validateFiles);" class="hidden" multiple="">
                                        <div class="add-image-provider-documents-mobile">
                                            <img src="https://syaanh.com/web/icons/add.png" alt="">
                                        </div>
                                        <div class="provider-documents-content-mobile">
                                        </div>
                                    </div>
                                    <div class="provider-documents-error">
                                        <span class="help-block hidden">
                                        <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group service-provide">
                                <label class="select-label">Select services you provide</label>
                                <div class="input-category">
                                    <span class="help-block hidden">
                                    <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="categories-checkboxes">
                                <div class="category-checkbox-col">
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_1" value="1">
                                        <label class="custom-control-label-provider" for="category_1">Cleaning &amp; Home Maids</label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_2" value="2">
                                        <label class="custom-control-label-provider" for="category_2">
                                        Air Conditioner
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_3" value="3">
                                        <label class="custom-control-label-provider" for="category_3">
                                        Electrical Work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_4" value="4">
                                        <label class="custom-control-label-provider" for="category_4">
                                        Painting &amp; Decor
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_5" value="5">
                                        <label class="custom-control-label-provider" for="category_5">
                                        Carpentry work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_6" value="6">
                                        <label class="custom-control-label-provider" for="category_6">
                                        Agriculture Work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_7" value="7">
                                        <label class="custom-control-label-provider" for="category_7">
                                        Plumbing Work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_8" value="8">
                                        <label class="custom-control-label-provider" for="category_8">
                                        Pest Control
                                        </label>
                                    </div>
                                </div>
                                <div class="category-checkbox-col">
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_9" value="9">
                                        <label class="custom-control-label-provider" for="category_9">
                                        Furniture Transfer
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_10" value="10">
                                        <label class="custom-control-label-provider" for="category_10">
                                        Satellite Technician
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_11" value="11">
                                        <label class="custom-control-label-provider" for="category_11">
                                        Car Transfer
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_51" value="51">
                                        <label class="custom-control-label-provider" for="category_51">
                                        Electronic Devices
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_62" value="62">
                                        <label class="custom-control-label-provider" for="category_62">
                                        Mobiles Maintenance
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_65" value="65">
                                        <label class="custom-control-label-provider" for="category_65">
                                        Aluminum work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_66" value="66">
                                        <label class="custom-control-label-provider" for="category_66">
                                        Blacksmith work
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_68" value="68">
                                        <label class="custom-control-label-provider" for="category_68">
                                        Surveillance Cameras
                                        </label>
                                    </div>
                                </div>
                                <div class="category-checkbox-col">
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_69" value="69">
                                        <label class="custom-control-label-provider" for="category_69">
                                        Tank cleaning
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_70" value="70">
                                        <label class="custom-control-label-provider" for="category_70">
                                        Computer maintenance
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_71" value="71">
                                        <label class="custom-control-label-provider" for="category_71">
                                        Swimming Pools
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_73" value="73">
                                        <label class="custom-control-label-provider" for="category_73">
                                        Car services
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_74" value="74">
                                        <label class="custom-control-label-provider" for="category_74">
                                        Furniture &amp; Curtains
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_75" value="75">
                                        <label class="custom-control-label-provider" for="category_75">
                                        Tents
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_76" value="76">
                                        <label class="custom-control-label-provider" for="category_76">
                                        Internet networks
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_77" value="77">
                                        <label class="custom-control-label-provider" for="category_77">
                                        Insulation
                                        </label>
                                    </div>
                                </div>
                                <div class="category-checkbox-col">
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_80" value="80">
                                        <label class="custom-control-label-provider" for="category_80">
                                        Sterilization
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox category-checkbox-row">
                                        <input type="checkbox" name="category[]" class="custom-control-input" id="category_81" value="81">
                                        <label class="custom-control-label-provider" for="category_81">
                                        Car Sterilization
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group service-area">
                                <label class="select-label">Select areas you cover</label>
                                <div class="input-area">
                                    <span class="help-block hidden">
                                    <strong></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="areas-checkboxes">
                                <div class="area-checkbox-col">
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_1" value="1">
                                        <label class="custom-control-label-provider" for="area_1">Doha</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_2" value="2">
                                        <label class="custom-control-label-provider" for="area_2">Al Ghuwariyah</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_3" value="3">
                                        <label class="custom-control-label-provider" for="area_3">aljamilya</label>
                                    </div>
                                </div>
                                <div class="area-checkbox-col">
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_4" value="4">
                                        <label class="custom-control-label-provider" for="area_4">Al Khor</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_5" value="5">
                                        <label class="custom-control-label-provider" for="area_5">Al Wakrah</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_6" value="6">
                                        <label class="custom-control-label-provider" for="area_6">Al Rayyan</label>
                                    </div>
                                </div>
                                <div class="area-checkbox-col">
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_7" value="7">
                                        <label class="custom-control-label-provider" for="area_7">Madinat ash Shamal</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_8" value="8">
                                        <label class="custom-control-label-provider" for="area_8">Umm Salal</label>
                                    </div>
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_9" value="9">
                                        <label class="custom-control-label-provider" for="area_9">Mesaieed</label>
                                    </div>
                                </div>
                                <div class="area-checkbox-col">
                                    <div class="custom-control custom-checkbox area-checkbox-row">
                                        <input type="checkbox" name="area[]" class="custom-control-input" id="area_10" value="10">
                                        <label class="custom-control-label-provider" for="area_10">Al Shahania</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group provider-continue-button">
                                <a href="#" class="to-personal">
                                    <div class="provider-back-butt">
                                        <span>Back</span>
                                    </div>
                                </a>
                                <a href="#" class="to-register">
                                    <div class="provider-continue-butt">
                                        <span>Continue</span>
                                        <img src="https://syaanh.com/web/icons/right_caret.png" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endif
<script>
function myFunction(x) {
    if (x.matches) { // If media query matches
        $(document).ready(function() {
            function aaa() {
                var elmnt_1 = document.getElementById("provider_mobile");
                var txt = (elmnt_1.offsetHeight/2)-11  +'px';
                $("#provider_country_code").css('top',txt);
            }
            aaa()
        });
    } else {
        $(document).ready(function() {
            function aaa() {
                var elmnt_1 = document.getElementById("provider_mobile");
                var txt = elmnt_1.offsetHeight-6  +'px';
                $("#provider_country_code").css('top',txt);
            }
            aaa()
        });
    }
}

var x = window.matchMedia("(max-width: 1024px)")
myFunction(x) // Call listener function at run time
</script>
<style>
.home-services-header {
    width: 100%;
    text-align: center;
    color: green;
}
</style>
@endsection