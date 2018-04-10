@extends('layouts.app')

@section('content')
<div class="col-sm-offset-3 col-sm-6">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

  <div class="panel-title">
    <h1>Create Users</h1>
  </div>
  <div class="panel-body">

    <form action="{{action('UserController@created')}}" method="POST">
      {{csrf_field()}}

      <div class="form-group">
        <label for="name" class="control-label">Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="email" class="control-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="phone" class="control-label">Phone</label>
        <input type="text" name="phone" class="form-control" >
      </div>

      <div class="form-group">
        <label for="pass" class="control-label">Password</label>
        <input type="password" name="pass" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="pass" class="control-label">Confirm Password</label>
        <input type="confirm_pass" name="confirm_pass" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="role" class="control-label">Role</label>
        <select class="form-control" id="role" name="role" required>
          <option value="1">Admin</option>
          <option value="2">Agent</option>
          <option value="3">Customer</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-default">
          <i class="fa fa-plus"></i> Create user
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
