@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a> Update About Us</h2>
                </div>
            </div>
        </div>

        <!-- Color Pickers -->
        <div class="clearfix row">

            <div class="col-md-12">
                @include('backend.layouts.notification')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <form action="{{route('about.update')}}" method="post">
                            @csrf
                            @method('put')
                            <div class="clearfix row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Heading <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Heading" name="heading"
                                            value="{{$about->heading}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Content <span class="text-danger">*</span></label>
                                        <textarea rows="5" class="form-control" placeholder="Write some text..."
                                            name="content">{{$about->content}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Images <span class="text-danger">* (min: 4 images)</span></label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i>Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" min="4" type="text" name="image" value="{{$about->image}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px; max-height:100px;">
                                            <img src="{{asset($about->image)}}" alt="logo" style="max-width:100px; border: 1px solid #ddd; padding: 4px 8px; ">
                                        </div>
                                    </div>
                                </div>


                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Year's Of Experience<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="Year's Of Experience" name="exp_years"
                                                value="{{$about->exp_years}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Happy Customer <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="Happy Customer" name="happy_customer"
                                                value="{{$about->happy_customer}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Team Advisor <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="Team Advisor " name="team_advisor"
                                                value="{{$about->team_advisor}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Return Customer <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="Return Customer " name="return_customer"
                                                value="{{$about->return_customer}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Secure Payment Gateway <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Secure Payment Gateway " name="secure_payment_Gat"
                                                value="{{$about->secure_payment_Gat}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Quality Products<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Quality Products " name="quality_products"
                                                value="{{$about->quality_products}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Fast Delivery<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Fast Delivery " name="fast_delivery"
                                                value="{{$about->fast_delivery}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cash On Delivery<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Cash On Delivery " name="cashOn_delivery"
                                                value="{{$about->cashOn_delivery}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Free Delivery <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Free Delivery" name="free_delivery"
                                                value="{{$about->free_delivery}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Customer Support <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Customer Support" name="customer_support"
                                                value="{{$about->customer_support}}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" onclick="window.history.back();"  class="btn btn-outline-secondary">Cancel</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>

@endsection
