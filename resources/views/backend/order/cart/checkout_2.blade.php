@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">                        
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Table Filter</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
                        <li class="breadcrumb-item">Table</li>
                        <li class="breadcrumb-item active">Table Filter</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Zone de Livraison</h2>
                    </div>
                    <form action="{{route('checkout2.store')}}" method="POST">
                        @csrf
                        <div class="body">
                            <button type="button" class="btn mb-1 btn-simple btn-sm btn-default btn-filter" data-target="all">Todos</button>
                                <button type="button" class="btn mb-1 btn-simple btn-sm btn-success btn-filter" data-target="zone-1">Approved</button>
                                <button type="button" class="btn mb-1 btn-simple btn-sm btn-warning btn-filter" data-target="zone-2">Suspended</button>
                                <button type="button" class="btn mb-1 btn-simple btn-sm btn-info btn-filter" data-target="zone-3">Pending</button>
                                <button type="button" class="btn mb-1 btn-simple btn-sm btn-danger btn-filter" data-target="zone-4">Blocked</button>
                            <div class="table-responsive m-t-20">
                                <table class="table table-filter table-hover m-b-0">                                
                                    <tbody>
                                        @if (count($shippings)>0)
                                            @foreach ($shippings as $key=>$item)
                                                <tr data-status="{{$item->delivery_address}}">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$item->delivery_time}}</td>
                                                    <td width="250px">
                                                        @if ($item->delivery_charge/100 > 80)
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: {{$item->delivery_charge/100}}%;"></div>
                                                            </div>
                                                        @elseif ($item->delivery_charge/100 > 60 && $item->delivery_charge/100 >= 80)
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: {{$item->delivery_charge/100}}%;"></div>
                                                            </div>
                                                        @elseif ($item->delivery_charge/100 >= 30 && $item->delivery_charge/100 <= 60)
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar l-blue" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: {{$item->delivery_charge/100}}%;"></div>
                                                            </div>
                                                        @else
                                                            <div class="progress progress-xs">
                                                                <div class="progress-bar l-coral" role="progressbar" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100" style="width: {{$item->delivery_charge/100}}%;"></div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    @if ($item->delivery_address == 'zone-1')
                                                        <td><span class="badge badge-success">Zone 1</span></td>
                                                    @elseif ($item->delivery_address == 'zone-2')
                                                        <td><span class="badge badge-warning">Zone 2</span></td>
                                                    @elseif ($item->delivery_address == 'zone-3')
                                                        <td><span class="badge badge-info">Zone 3</span></td>
                                                    @else
                                                        <td><span class="badge badge-danger">Zone 4</span></td>
                                                    @endif
                                                    <td>
                                                        <div class="custom-control custom-radio mb-3" style="text-align: center;">
                                                            <input type="radio" id="customRadio{{$key}}" name="delivery_charge"
                                                                value="{{$item->delivery_charge}}" class="custom-control-input"
                                                            >
                                                            <label class="custom-control-label"
                                                                for="customRadio{{$key}}">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td hidden>
                                                        <input type="hidden" value="cod" name="payment_method">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <input type="text" name="sub_total" value="{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())}}">
                        <input type="text" name="total_amount" value="{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())}}">
                        <div class="py-3 float-right mr-3">
                            <button type="button" onclick="window.history.back();"  class="btn btn-outline-secondary">Annuler</button>
                            <button type="submit" class="btn btn-primary">Continuer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.star').on('click', function () {
            $(this).toggleClass('star-checked');
        });

        $('.ckbox label').on('click', function () {
            $(this).parents('tr').toggleClass('selected');
        });

        $('.btn-filter').on('click', function () {
            var $target = $(this).data('target');
            if ($target != 'all') {
                $('.table tr').css('display', 'none');
                $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
            } else {
                $('.table tr').css('display', 'none').fadeIn('slow');
            }
        });
    });
</script>
@endsection
