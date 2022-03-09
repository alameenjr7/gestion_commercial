@extends('backend.layouts.master')

@section('content')

<div class="checkout_area section_padding_100">
    <div class="container">
        <form action="{{route('checkout3.store')}}" method="post">
            @csrf

            <div class="row">
                <div class="col-12">
                    <div class="clearfix checkout_details_area">
                        <div class="payment_method">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <!-- Single Payment Method -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="five">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_five" aria-expanded="false"
                                                aria-controls="collapse_five"><i
                                                    class="icofont-cash-on-delivery-alt"></i> {{__('messages.cod')}}
                                            </a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_five" class="panel-collapse collapse show"
                                        role="tabpanel" aria-labelledby="five">
                                        <div class="panel-body">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" required name="payment_method" value="cod" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">{{__('messages.cod')}}</label>
                                            </div>
                                            <p>{{__('messages.pleaseSend')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Payment Method -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="five">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_five1" aria-expanded="false"
                                                aria-controls="collapse_five1"><i
                                                    class="icofont-paypal-alt"></i> {{__('messages.payWith')}} PayPal
                                            </a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_five1" class="panel-collapse collapse"
                                        role="tabpanel" aria-labelledby="five">
                                        <div class="panel-body">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" required name="payment_method" value="paypal" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">{{__('messages.payWith')}}
                                                    PayPal</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Payment Method -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="five">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_five2" aria-expanded="false"
                                                aria-controls="collapse_five2"><i
                                                    class="fa fa-money"></i> {{__('messages.payWith')}} Razor
                                            </a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_five2" class="panel-collapse collapse"
                                        role="tabpanel" aria-labelledby="five">
                                        <div class="panel-body">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" required name="payment_method" value="razor" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">{{__('messages.payWith')}}
                                                    Razor</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Payment Method -->
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="five">
                                        <h6 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapse_five3" aria-expanded="false"
                                                aria-controls="collapse_five3"><i
                                                    class="fa fa-money"></i> {{__('messages.payWith')}} Orange Money
                                            </a>
                                        </h6>
                                    </div>
                                    <div aria-expanded="false" id="collapse_five3" class="panel-collapse collapse "
                                        role="tabpanel" aria-labelledby="five">
                                        <div class="panel-body">
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" required name="payment_method" value="om" class="custom-control-input" id="customCheck5">
                                                <label class="custom-control-label" for="customCheck5">{{__('messages.payWith')}}
                                                    Orange Money</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="checkout_pagination d-flex justify-content-end mt-30">
                        <a onclick="window.history.back();" class="mt-2 ml-2 btn btn-primary">{{__('messages.goback')}}</a>
                        <button type="submit" class="mt-2 ml-2 btn btn-primary">{{__('messages.finalStep')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection