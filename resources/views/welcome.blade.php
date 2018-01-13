@extends('layouts.master')

@section('title')
    FindTukang
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container text-center">
                        <h1 class="display-4">Find Tukang</h1>
                        <p class="lead">with us, make your work easier and simpler</p>
                        <form class="form-inline col" action="{{URL('/tukang/search')}}" method="get">
                            {{csrf_field()}}
                            <input class="form-control mr-sm-2 col" name="search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-info my-2 my-sm-0" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <br>
                <div class="card-deck">
                    @foreach($tukangs as $tukang)
                        <div class="card col-md-4">
                            <div class="card-header">
                                <p class="text-center">{{$tukang->city}}</p>
                            </div>
                            <img class="card-img-top" src="{{URL('/tukang/image/'.$tukang->picture)}}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-title text-center">{{$tukang->name}}</p>
                                <hr>
                                <div class="d-flex">
                                    @if($tukang->status == 'Available')
                                        <p class="card-subtitle mr-auto text-success">Available</p>
                                        <p class="card-subtitle ml-auto text-muted">Booked</p>
                                    @else
                                        <p class="card-subtitle mr-auto text-muted">Available</p>
                                        <p class="card-subtitle ml-auto text-warning">Booked</p>
                                    @endif
                                </div>
                            </div>
                            @if(Auth::guard('web')->check())
                                <div class="card-footer">
                                    <form action="{{URL('/booking/'.$tukang->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('put')}}
                                        @if($tukang->status == 'Booked')
                                            <button type="submit" class="btn btn-block btn-secondary" disabled>Booking</button>
                                        @else
                                            <button type="submit" class="btn btn-block btn-primary">Booking</button>
                                        @endif
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <ul class="pagination">
                    {{$tukangs->render()}}
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection