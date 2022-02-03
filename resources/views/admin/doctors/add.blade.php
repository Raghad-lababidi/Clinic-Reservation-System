@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Doctor') }}</div>

                <div class="card-body">
                    <form action="{{route('store-doctor')}}" method="POST">
                        @csrf
                      <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
                      </div>
                      <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" class="form-control" placeholder="Enter password" id="password" name="password">
                      </div>
                     
                      <!-- <div class="form-group">
                        <label for="code">Doctor Code :</label>
                        <input type="text" class="form-control" placeholder="Enter code" id="code" name="code">
                      </div> -->
                      
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
