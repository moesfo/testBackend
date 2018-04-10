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
    <h1>Profile</h1>
  </div>
  <div class="panel-body">
    @if($user)
    <form action="{{action('UserController@updateUser')}}" method="POST">
      {{csrf_field()}}

      <input type="hidden" name="id_user" value="{{$user->id_user}}">

      <div class="form-group">
        <label for="name" class="control-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
      </div>
      <div class="form-group">
        <label for="email" class="control-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
      </div>
      <div class="form-group">
        <label for="phone" class="control-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
      </div>

      <div class="form-group">
        <label for="pass" class="control-label">Password</label>
        <input type="password" name="password" class="form-control" value="{{$user->password}}" required>
      </div>
      <div class="form-group">
        <label for="pass" class="control-label">Confirm Password</label>
        <input type="confirm_pass" name="confirm_pass" class="form-control" required>
      </div>

      <input type="hidden" name="role" value="{{$user->role}}">

      <div class="form-group">
        <button type="submit" class="btn btn-default">
          <i class="fa fa-undo"></i> Update
        </button>
      </div>
    </form>
    @endif
  </div>
</div>
@endsection
