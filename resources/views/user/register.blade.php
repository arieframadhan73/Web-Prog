@extends('layouts.master')

@section('title')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <form class="card col-sm-10" action="{{URL('/register')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-header text-center">
                    <h4 class="display-4">Register</h4>
                    <p class="card-subtitle">User</p>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="col-sm-8 mr-auto">
                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                                    <div class="invalid-feedback">
                                        <small>{{$errors->first('name')}}</small>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your id with anyone else.</small>
                                    <div class="invalid-feedback">
                                        <small>{{$errors->first('email')}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword1" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" id="exampleInputPassword1" placeholder="Password">
                                    <div class="invalid-feedback">
                                        <small>{{$errors->first('password')}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputPassword1" class="col-sm-4 col-form-label">Re-Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-4 col-form-label">Gender</label>
                                <div class="col-sm-8">
                                    <select class="form-control {{$errors->has('gender')?'is-invalid':''}}" name="gender" id="exampleFormControlSelect1">
                                        <option selected value disabled>Choose one</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <small>{{$errors->first('gender')}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail1" class="col-sm-4 col-form-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone" class="form-control {{$errors->has('phone')?'is-invalid':''}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter phone number">
                                    <div class="invalid-feedback">
                                        <small>{{$errors->first('phone')}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlTextarea1" class="col-sm-4 col-form-label">Address</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control {{$errors->has('address')?'is-invalid':''}}" name="address" id="exampleFormControlTextarea1" rows="3" placeholder="Address"></textarea>
                                    <div class="invalid-feedback">
                                        <small>{{$errors->first('address')}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 ml-auto">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">
                                    <img src="{{URL::TO('/assets/user.png')}}" class="img-thumbnail rounded mx-auto d-block" alt="...">
                                </label>
                                <input type="file" name="picture" class="form-control-file" id="exampleFormControlFile1" required>
                                <div class="invalid-feedback">
                                    <small>{{$errors->first('picture')}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <a href="{{URL('/tukang/register')}}" class="text-center d-block nav-link">Register as Tukang</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')

@endsection