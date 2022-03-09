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
                        </a>Articles : 
                        <a class="btn btn-sm btn-outline-secondary" href="{{route('vendeur.order.vente.simple')}}">
                            <i class="icon-plus"></i> Vente Simple
                        </a>
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('seller')}}">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Article</li>
                        <li class="breadcrumb-item">Facturer & Vente Simple</li>
                    </ul>
                    {{-- <span class="cart_counter float-right">
                        <a id="vente_simple" href="{{route('order.vente.simple')}}" class="mr-5 valider btn btn-info text-right" style="float: right; position: relative;">Vente Simple</a> 
                    </span> --}}
                    
                </div>
            </div>
        </div>
        <hr>
        <form action="{{route('vendeur.checkout1.store')}}" method="post">
            @csrf
            <div class="row clearfix">
                <div class="col-12">
                    <div class="row col-lg-12 col-md-12 col-sm-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Client <span class="text-danger">*</span></label>
                                    <select name="client_id" id="client_id" class="form-control show-tick" required>
                                        <option value="">-- Choisir le client --</option>
                                        @foreach (\App\Models\Client::get() as $client)
                                            <option value="{{$client->id}}">{{ucfirst($client->reference)}} - ({{$client->prenom}} {{$client->nom}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Date <span class="text-danger">*</span></label>
                                    <input type="date" id="date"  step="any" class="form-control" required placeholder="Ex: 10/05/2022" name="date"
                                        value="{{old('date')}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">N° Pièce <span class="text-danger">*</span></label>                              
                                        <input type="number" id="_document"  step="any" class="form-control" readonly required placeholder="Ex: 20" name="n_piece"
                                            value="{{\App\Models\Order::count()+001}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Statut <span class="text-danger">*</span></label>
                                    <input type="select" id="_statut" class="form-control" name="statut"
                                        value="A comptabiliser" readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Date Livraison <span class="text-danger">*</span></label>
                                    <input type="date" id="_dateLiv"  step="any" class="form-control" placeholder="Ex: 20/05/2022" name="dateLive"
                                        value="{{old('dateLive')}}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Référence <span class="text-danger">*</span></label>
                                    <input type="text"  id="_ref" step="any" class="form-control" placeholder="Ex: Musa Diagne" name="reference"
                                        value="{{old('reference')}}">
                                </div>
                            </div>       
                    </div>
                    <button id="valider" class="mr-5 valider btn btn-warning text-right" style="float: right; position: relative;">Valider</button> 
                </div>
            </div>
            <hr>
                <div class="row clearfix" id="ajout_fact">
                    <div class="row col-lg-12 col-md-12 col-sm-12">
                        <div class="row form-group ml-4">
                            <select disabled style="width: 140px;" id="product_id" class="form-control ">
                                <option value="">-- Reference --</option>
                                @foreach (\App\Models\Product::where('status','active')->get() as $article)
                                    <option value="{{$article->id}}">{{ucfirst($article->reference)}}</option>
                                @endforeach
                            </select>
                                <input id="opt" class="form-control ml-2" style="width: 320px; height: 34px;" type="text" placeholder="Designation" readonly>
                                <input id="price" name="price" class="form-control ml-2" style="width: 130px; height: 34px;" type="text" placeholder="P.U. HT" readonly>
                                <input id="qty" class="form-control ml-2" style="width: 100px; height: 34px;" type="number" placeholder="Quantite" readonly>
                                <input id="_remise" class="form-control ml-2" style="width: 100px; height: 34px;" type="text" placeholder="Remise(%)" readonly>
                                <input id="_total" class="form-control ml-2" style="width: 160px; height: 34px;" type="text" placeholder="Total" readonly>
                        </div>
                    </div>
                    <div class="col-12" style="float: right; position: relative;">
                        <button disabled id="add_to_facture" data-price="0" data-quantity="1" data-product-id=""
                            class="mr-5 ml-2 btn btn-success float-right add_to_facture">
                            <i class="fa fa-cart-plus">  Enregistrer</i>
                        </button>
                        <button disabled  onclick="window.location='{{ route('facture.delete')}}'" type="button"  id="_supprimer" class="ml-2 btn btn-danger float-right"><i class="icon-trash">  Supprimer</i></button>
                        <button disabled  id="_nouveau" class="ml-2 btn btn-info float-right _nouveau"><i class="fa fa-plus">  Nouveau</i></button>
                    </div>
                </div>
            <hr>

            <div class="block-header" id="header-ajax">
                @include('backend.order._facture')
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            $('#client_id').selectize({
                sortField: 'text'
            });
        });
        $(document).ready(function () {
            $('#product_id').selectize({
                sortField: 'text'
            });
        });
    </script>

    <script>

        document.getElementById('valider').onclick = function() {
            
            // $('#client_id').selectize()[0].selectize.getValue("id").disable();
            document.getElementById('date').readOnly = true;
            document.getElementById('_document').readOnly = true;
            document.getElementById('_statut').readOnly = true;
            document.getElementById('_dateLiv').readOnly = true;
            document.getElementById('_ref').readOnly = true;
            $("#valider").attr("disabled", "disabled"); 

            $('#product_id').selectize()[0].selectize.enable();
            document.getElementById('product_id').disabled = false;
            document.getElementById('opt').readOnly = false;
            document.getElementById('price').readOnly = false;
            document.getElementById('qty').readOnly = false;
            document.getElementById('_remise').readOnly = true;
            $("#_nouveau").attr("disabled", false);
        }
    </script>

    <script>
        $(document).ready(function(){
            $("#price, #qty").keyup(function(){
                var total = 0;
                var x = Number($("#price").val());
                var y = Number($("#qty").val());
                var total = x*y;
                $('#_total').val(total);
            });
        });
    </script>

    <script>
        $("#product_id").change(function(){
            var product_id=$(this).val();
            // alert(product_id);
            if(product_id != null){

                $.ajax({
                    url:"/seller/seller-product/"+product_id+"/article",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}",
                        product_id:product_id,
                    },
                    success:function(response){
                        console.log(response);
                        $.each(response.data,function(id,title,price){
                            
                            $('#opt').val(response['data'][0]['title']);
                            $('#price').val(response['data'][0]['price']);
                            $('#qty').val('1');
                            $('#_remise').val(response['data'][0]['discount']);
                            $('#_total').val(response['data'][0]['price'] * document.getElementById("qty").value);
                            const data_price = response['data'][0]['price'];
                            const data_id = response['data'][0]['id'];
                            var b = document.getElementById('add_to_facture');
                            b.setAttribute('data-price',data_price);
                            var b1 = document.getElementById('add_to_facture');
                            b1.setAttribute('data-product-id',data_id);
                            // console.log(b1);
                            // console.log();
                        });
                    }
                });
                
                $(".add_to_facture").attr("disabled", false); 
                $("#_supprimer").attr("disabled", false); 
            }
            
        });
    </script>

    <script>
        $(document).on('click','.add_to_facture',function(e){
            e.preventDefault();
            // var product_id=$(this).data('product-id');
            var product_id = document.getElementById("product_id").value;
            const quantity = document.getElementById("qty").value;
            var price = document.getElementById("price").value;
            var product_qty = quantity;
            
            // alert(_price);
            
            var token="{{csrf_token()}}";
            var path="{{route('seller.cart.store')}}";
            
            $.ajax({
                url:path,
                type:"POST",
                dataType:"JSON",
                data:{
                    product_id:product_id,
                    product_qty:product_qty,
                    price:price,
                    _token:token,
                },
                beforeSend:function (){
                    $('#add_to_facture'+product_id).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                },
                complete:function (){
                    $('#add_to_facture'+product_id).html('<i class="fa fa-cart-plus"></i> Enregistrer');
                },
                success:function (data){
                    // console.log(data);
                    $('body #header-ajax').html(data['_facture']);
                    $('body #cart_counter').html(data['cart_count']);
                    if(data['status']){
                        swal({
                            title:"God Job!",
                            text:data['message'],
                            icon:"success",
                            button:"OK!",
                        });
                    }
                    $("#header-ajax").load(location.href+" #header-ajax>*","");
                    $('#opt').val("");
                    $('#price').val("");
                    $('#qty').val("");
                    $('#_remise').val("");
                    $('#_total').val("");
                    // $('#product_id').selectize()[0].selectize.setValue("");
                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    </script>
    <script>
        $(document).on('click','._nouveau',function(e){
            e.preventDefault();
            // $('#product_id').selectize()[0].selectize.setValue("");
        });
    </script>
@endsection





















    {{-- <script>
        $('#cat_id').change(function(){
            var cat_id=$(this).val();
            if(cat_id != null){
                $.ajax({
                    url:"/admin/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}",
                        cat_id:cat_id,
                    },
                    success:function(response){
                        // console.log(response);
                        var html_option="<option value=''>--- Choisir un Sous-Categorie ---</option>";
                        if(response.status){
                            $('#child_cat_div').removeClass('d-none');
                            $.each(response.data,function(id,title){

                            // console.log(id, title);
                                html_option +="<option value='"+id+"'>"+title+"</option>"
                            });
                        }
                        else {
                            $('#child_cat_div').addClass('d-none');
                        }
                        $('#child_cat_id').html(html_option);
                    }
                });
            }
        });
    </script> --}}
