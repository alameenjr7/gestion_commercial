@extends('seller.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>
                        <a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
                            <i class="fa fa-arrow-left"></i>
                        </a>Users
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('seller')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Facture</li>
                    </ul>
                    <p class="float-right"> Total Orders : {{\App\Models\Order::count()}}</p>
                </div>
            </div>
        </div>

        <div class="row clearfix">

            <div class="col-lg-12 col-md-12">
                <div class="card invoice1">                        
                    <div class="body">
                        <div class="invoice-top clearfix">
                            <div class="logo">
                                <img src="{{asset(App\Models\Setting::value('logo'))}}" alt="user" class="rounded-circle img-fluid">
                            </div>
                            <div class="info">
                                <h6>{{App\Models\Setting::value('title')}}</h6>
                                <p> 
                                    {{App\Models\Setting::value('email')}} <br>
                                    +{{App\Models\Setting::value('phone')}}  <br>
                                    {{App\Models\Setting::value('address')}} 
                                </p>
                            </div>
                            <div class="title">
                                {{-- <h4>N° Facture: #{{$order->order_number}}</h4> --}}
                                <p>
                                    {{-- Délivrer: {{$order->getCreatedAt()}}<br>
                                    Paiement Du: {{$order->getUpdatedAt()}} --}}
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="invoice-mid clearfix">
  
                            <div class="clientlogo">
                                {{-- <img src="assets/images/sm/avatar2.jpg" alt="user" class="rounded-circle img-fluid"> --}}
                            </div>

                            <div class="info">
                                <h6>Information du Client</h6>
                                <p>
                                    {{-- {{$order->first_name}} {{$order->last_name}}<br>
                                    {{$order->email}} <br> --}}
                                    #{{$order}}
                                </p>
                                {{-- <h6>Project Description</h6>
                                <p>Proin cursus, dui non tincidunt elementum, tortor ex feugiat enim, at elementum enim quam vel purus. Curabitur semper malesuada urna ut suscipit.</p> --}}
                            </div>   
                        
                        </div>
                        
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection