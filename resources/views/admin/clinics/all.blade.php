@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Clinics') }}</div>

                <div class="card-body">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Price</th>
                            <th>View Time</th>                   
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($clinics as $clinic)
                          <tr>
                            <td>{{$clinic->id}}</td>
                            <td>{{$clinic->name}}</td>
                             <td>{{$clinic->phone}}</td>
                              <td>{{$clinic->price}}</td>
                               <td>{{$clinic->view_time}}</td>

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
