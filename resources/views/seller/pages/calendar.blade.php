
@extends('seller.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Calendar</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('seller')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item active">Calendar</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
