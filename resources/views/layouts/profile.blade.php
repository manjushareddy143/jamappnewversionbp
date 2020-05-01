@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="img/logo/logo.png" rel="icon">
    <title>JAM - Profile</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.css" rel="stylesheet">

</head>
<body class="bg-gradient-login">
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
              <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="login-form">
                        <div class="text-center">
                            <form>
                                <div class="form-group">
                                    <div class="float-left">

                                        <a class="btn btn-success" href= "/addUser"> Back</a>

                                    </div>

                                    <div class="container">
                                        <img src="logo.png" class="rounded-circle" alt="Cinque Terre" width="304" height="236">
                                        <label>sam duo</label>
                                    </div>

                                    <div class="form-group">
                                        <label for="servicecategories">Service Categories</label>
                                        <select class="form-control" id="servicecategories">
                                            <option>Select</option>
                                            <option>AC service</option>
                                            <option>Plumbing</option>
                                            <option>Cleaning</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="servicesubcategories">Service sub Categories</label>
                                        <select class="form-control" id="servicesubcategories">
                                            <option>Select</option>
                                            <option>AC service</option>
                                            <option>Plumbing</option>
                                            <option>Cleaning</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Document Upload</label>
                                        <input type="file" class="form-control" id="docupload">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
