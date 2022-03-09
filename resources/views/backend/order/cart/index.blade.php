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
                    @include('backend.layouts._cart-list')
                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@section('scripts')

    <script>
        $(document).on('click','.coupon-btn',function(e){
            e.preventDefault();
            var code=$('input[name=code]').val();
            $('.coupon-btn').html('<i class="fas fa-spinner fa-spin"></i> Applying...');
            $('#coupon-form').submit();
        });
    </script>

    <script>
        $(document).on('click','.cart_delete',function(e){
            e.preventDefault();
            var cart_id = $(this).data('id');

            var token = "{{csrf_token()}}";
            var path = "{{route('cart.delete')}}";

            $.ajax({
                url:path,
                type:"POST",
                dataType:"JSON",
                data:{
                    cart_id:cart_id,
                    _token:token,
                },
                success:function(data){
                    console.log(data);
                    $('body #header-ajax').html(data['header']);
                    $('body #cart_counter').html(data['cart_count']);
                    if(data['status']){
                        swal({
                            title: "Good job !",
                            text: data['message'],
                            icon: "success",
                            button: "OK !",
                        });
                    }
                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    </script>

    <script>
        $(document).on('click','.qty-text',function(){
            var id=$(this).data('id');
            // alert(id)

            var spinner=$(this),input=spinner.closest("div.quantity").find('input[type="number"]');
            // alert(input.val())

            if(input.val()==1){
                return false;
            }
            if(input.val()!=1){
                var newVal=parseFloat(input.val());
                $('#qty-input'+id).val(newVal);
            }

            var productQuantity=$("#update-cart-"+id).data('product-quantity');
            update_cart(id,productQuantity);
        });
        function update_cart(id,productQuantity) {
            var rowId=id;
            var product_qty=$('#qty-input-'+rowId).val();
            var token="{{csrf_token()}}";
            var path="{{route('cart.update')}}";

            $.ajax({
                url:path,
                type:"POST",
                data:{
                    _token:token,
                    product_qty:product_qty,
                    rowId:rowId,
                    productQuantity:productQuantity,
                },
                success:function (data){
                    console.log(data);
                    if(data['status']){
                        $('body #header-ajax').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #cart_list').html(data['cart_list']);
                        // swal({
                        //     title: "Good job !",
                        //     text: data['message'],
                        //     icon: "success",
                        //     button: "OK !",
                        // });
                        alert(data['message']);
                    }
                    else{
                        alert(data['message']);
                    }
                }
            });
        }
    </script>

@endsection