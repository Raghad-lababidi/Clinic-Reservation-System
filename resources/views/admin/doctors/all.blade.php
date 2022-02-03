@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Doctors') }}</div>

                <div class="card-body">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Password</th>
                            <th>Control</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($doctors as $doctor)
                          <tr>
                            <td>{{$doctor->id}}</td>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->password}}</td>
                            <!-- <td>{{$doctor->code}}</td> -->
                            <td>
                              <a href="/doctors/edit/{{$doctor->id}}" class="btn btn-success">Edit</a>
                              <a href="/doctors/delete/{{$doctor->id}}" class="btn btn-danger">Delete</a>

                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
