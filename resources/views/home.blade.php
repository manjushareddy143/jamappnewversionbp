@extends('layouts.app')

@section('content')
<li class="nav-item">

</li>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))

                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as SuperAdmin! see  <a href="/index">List</a>
                    Master Services <a href="/create">Master Services</a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
