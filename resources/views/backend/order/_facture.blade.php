<div class="col-lg-12 col-md-12">
    <div class="card invoice1">                        
        <div class="body">
            <hr>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Reference</th>
                            <th>Designation</th>
                            <th>Prix Unitaire</th>
                            <th>Quantite</th>
                            {{-- <th>Remise</th> --}}
                            <th style="width: 80px;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                            <tr>
                                <td>
                                    {{$item->model->reference}}
                                </td>
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
                                <td>
                                    {{$item->subtotal()}} FCFA
                                </td>
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
                    @if (\Illuminate\Support\Facades\Session::has('coupon'))
                        <p class="m-b-0">Coupon: {{\Illuminate\Support\Facades\Session::get('coupon')['value']}} FCFA</p>
                    @endif
                    @if (\Illuminate\Support\Facades\Session::has('coupon'))
                        <h3 class="m-b-0 m-t-10"> {{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value']}} FCFA</h3>
                    @else
                        <h3 class="m-b-0 m-t-10">{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}} FCFA</h3>
                    @endif

                </div> 
                @if (\Illuminate\Support\Facades\Session::has('coupon'))
                    <input type="hidden" name="sub_total" value="{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value']}}"> 
                    <input type="hidden" name="total_amount" value="{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value']}}">  
                @else  
                    <input type="hidden" name="sub_total" value="{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}}"> 
                    <input type="hidden" name="total_amount" value="{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())}}">  
                @endif   
                <input type="hidden" name="payment_method" value="cod"> 
                {{-- <input type="hideen" name="delivery_charge" value="0">                           --}}
                <div class="hidden-print col-md-12 text-right">
                    <hr>
                    <button class="btn btn-primary" type="submit">Confirmation</button>
                </div>
            </div>
        </div>
    </div>
</div>