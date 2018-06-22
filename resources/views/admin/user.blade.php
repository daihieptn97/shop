@extends('main.layout')
@section('title')
    Danh sách khách hàng
@endsection
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            @foreach ($user as $element)
                <div class="col-lg-4">
                    <div class="contact-box">
                        <a href="profile.html">
                        <div class="col-sm-4">
                            <div class="text-center">
                                <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ asset('img/a1.jpg') }}">
                                {{-- <div class="m-t-xs font-bold">Graphics designer</div> --}}
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <h3><strong>{{$element->fullname}}</strong></h3>
                            <p><i class="fa fa-map-marker"></i> {{$element->address}}</p>
                            <address>
                                Email : {{$element->email}}<br>
                                Phone : {{$element->phonenumber}}
                            </address>

                        </div>
                        <div class="clearfix"></div>
                            </a>
                    </div>
                </div>
            @endforeach
@endsection