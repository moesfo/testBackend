@extends('layouts.app')

@section('content')
<div class="container">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <h1>List of users</h1>
    @if(Auth::user()->role == 1)
    <a class="btn btn-default" href="user">
      <i class="fa fa-user"></i> Create user
    </a>
    @endif
    <hr>

    <div class="table-responsive">
      @if($data)
        <table class="table">
          <thead>
            <tr>
              <td>Name</td>
              <td>Email</td>
              <td>Phone</td>
              <td>Role</td>
              <td>State</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $row)
              <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->role}}</td>
                <td>{{$row->state}}</td>
                @if(Auth::user()->role == 1)
                <td>
                  <a class="btn btn-default" href="edit/{{$row->id_user}}">
                    <i class="fa fa-edit"></i> Edit user
                  </a>

                  <a class="btn btn-default" href="delete/{{$row->id_user}}">
                    <i class="fa fa-trash-alt"></i> Delete user
                  </a>
                </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
</div>
@endsection
