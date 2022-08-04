<div class="body">
    <hr>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    {{-- <th>Image</th> --}}
                    <th>Description</th>
                    <th>Prix Unitaire</th>
                    <th>Quantite</th>
                    <th style="width: 80px;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                    <tr>
                        <td>
                            <i class="icon-trash cart_delete" style="text-align: center;" data-id="{{$item->rowId}}"></i>
                        </td>
                        {{-- <td style="text-align: center">
                            <img src="{{asset($item->model->photo)}}" alt="Article" style="height: 60px; width: 60px;">
                        </td> --}}
                        <td>
                            <a href="{{route('product.detail',$item->model->slug)}}">{{$item->name}}</a>
                        </td>
                        <td>{{$item->price}} FCFA</td>
                        <td>
                            <div class="quantity">
                                <input type="number" data-id="{{$item->rowId}}" class="qty-text" id="qty-input-{{$item->rowId}}" step="1" min="1" max="10" name="quantity" value="{{$item->qty}}">
                                <input type="hidden" data-id="{{$item->rowId}}" data-product-quantity="{{$item->model->stock}}" id="update-cart-{{$item->rowId}}">
                            </div>
                        </td>
                        <td>{{$item->subtotal()}} FCFA</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row clearfix">
        <div class="col-md-6">
            <div class="cart-apply-coupon mb-30">
                <h6>Le client a un coupon?</h6>
                <p>Entrez le code coupon du client et &amp; obtenez des reductions impressionnantes</p>
                <!-- Form -->
                <div class="coupon-form">
                    <form action="{{route('coupon.add')}}" id="coupon-form" method="post">
                        @csrf
                        <input type="text" class="form-control" name="code" placeholder="Entrer le code coupon">
                        <button type="submit" class="coupon-btn btn btn-primary">Appliquer le coupon</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 text-right">
            <p class="m-b-0"><b>Sous Total:</b> {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} FCFA</p>
            @if (\Illuminate\Support\Facades\Session::has('coupon'))
                <p class="m-b-0">Coupon: {{\Illuminate\Support\Facades\Session::get('coupon')['value']}} FCFA</p>
            @endif
            @if (\Illuminate\Support\Facades\Session::has('coupon'))
                <h3 class="m-b-0 m-t-10"> {{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value']}} FCFA</h3>
            @endif
        </div>                                    
        <div class="hidden-print col-md-12 text-right">
            <hr>
            <a class="btn btn-primary" href="{{route('checkout1')}}">Passer a la caisse</a>
        </div>
    </div>
</div>