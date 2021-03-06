@extends('layouts.master')

@section('title')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <form class="card col-lg-6" action="{{URL('/tukang/login')}}" method="post">
                {{csrf_field()}}
                <div class="card-header text-center">
                    <h4 class="display-4">Login</h4>
                    <p class="card-subtitle">User</p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No KTP</label>
                        <input type="text" name="no_ktp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Number KTP">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')

@endsection