@extends('backend.layouts.master')

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
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
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
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Reference</th>
                                        {{-- <th>Image</th> --}}
                                        <th>Designation</th>
                                        <th>Prix Unitaire</th>
                                        <th>Quantite</th>
                                        {{-- <th>Remise(%)</th> --}}
                                        <th style="width: 80px;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                        <tr>
                                            <td>
                                                {{$item->model->reference}}
                                            </td>
                                            {{-- <td style="text-align: center">
                                                <img src="{{asset($item->model->photo)}}" alt="Article" style="height: 60px; width: 60px;">
                                            </td> --}}
                                            <td>
                                                {{$item->name}}
                                            </td>
                                            <td>{{$item->price}} FCFA</td>
                                            <td>
                                                {{$item->qty}}
                                            </td>
                                            {{-- <td>
                                                {{$item->model->discount}} %
                                            </td> --}}
                                            <td>{{$item->subtotal()}} FCFA</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="row clearfix">
                            <div class="col-md-6">
                            </div>
                            
                            <div class="col-md-6 text-right">
                                <p class="m-b-0"><b>Sous Total:</b> {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} FCFA</p>
                                {{-- @if (\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'])
                                    <p class="m-b-0">Frais de livraison: {{\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge']}} FCFA</p>
                                @endif --}}
                                @if (\Illuminate\Support\Facades\Session::has('coupon'))
                                    <p class="m-b-0">Coupon: {{\Illuminate\Support\Facades\Session::get('coupon')['value']}} FCFA</p>
                                @endif
                                @if (\Illuminate\Support\Facades\Session::has('coupon'))
                                    <h3 class="m-b-0 m-t-10"> {{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value']}} FCFA</h3>
                                @elseif (\Illuminate\Support\Facades\Session::has('checkout'))
                                    <h3 class="m-b-0 m-t-10"> {{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}} FCFA</h3>
                                @else
                                    <h3 class="m-b-0 m-t-10">{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}} FCFA</h3>
                                @endif
                                {{-- <h1>{{auth('admin')->user()::get('checkout')['sub_total']}}</h1> --}}
                            </div>                                    
                            <div class="hidden-print col-md-12 text-right">
                                <hr>
                                <a class="btn btn-primary" href="{{route('checkout.store')}}">Confirmation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</div>

@endsection