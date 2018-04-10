@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <a class="btn btn-default" href="profile/{{ Auth::user()->id_user }}">
                    <i class="fa fa-user"></i> My Profile
                    </a>

                    @if(Auth::user()->role == 1)

                    <a class="btn btn-default" href="list/">
                    <i class="fa fa-user-plus"></i> Administrator
                    </a>

                    <a class="btn btn-default" href="user/">
                    <i class="fa fa-user"></i> Create User
                    </a>

                    <a class="btn btn-default" href="importDoc/">
                    <i class="fa fa-upload"></i>Import Users
                    </a>
                    @elseif(Auth::user()->role == 2)

                    <a class="btn btn-default" href="list/">
                    <i class="fa fa-plus"></i> Ver Usuarios
                    </a>

                    @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
