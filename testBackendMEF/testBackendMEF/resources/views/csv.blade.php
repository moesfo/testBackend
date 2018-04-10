@extends('layouts.app')

@section('content')
<div class="container">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('doc/import') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        Choose your xls/csv File : <input type="file" name="file" class="form-control">

                        <a class="btn btn-default" href="doc/import">
                        <i class="fa fa-upload"></i>Import
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
