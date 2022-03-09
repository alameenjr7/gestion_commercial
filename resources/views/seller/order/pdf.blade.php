<!DOCTYPE html>
    <html lang="en">
        <head>Order @if ($order)- {{$order->order_number}} @endif</head>

        <body>
            @if ($order)
            <div id="invoice">
                <div class="overflow-auto invoice" id="invoice">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a target="_blank" href="https://lobianijs.com">
                                        <img src="{{asset('frontend/assets/img/core-img/logo.png')}}"
                                            data-holder-rendered="true" />
                                    </a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="https://CCSS.com">
                                            CCSS
                                        </a>
                                    </h2>
                                    <div>Liberte 6 Ext., Dakar, SN</div>
                                    <div>(+221) 772050626</div>
                                    <div>kaaydeals@gmail.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">INVOICE TO:</div>
                                    @php
                                        $client = \App\Models\Client::where('id',$order->client_id)->get()->first();
                                    @endphp
                                    <h2 class="to">{{$client->prenom}} {{$client->nom}}</h2>
                                    <div class="address">{{$client->adresse}}</div>
                                    <div class="email"><a
                                            href="mailto:{{$order->email}}">{{$order->telephone}}</a>
                                    </div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                    <div class="date">Date of Invoice: {{\Carbon\Carbon::parse($order->created_at)->format(' d/m/y')}}</div>
                                    <div class="date">Due Date: {{\Carbon\Carbon::now()->format(' d/m/y')}}</div>
                                </div>
                            </div>
                            <table class="border cellspacing=0 cellpadding=0">
                                <thead class="table-border">
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left">DESCRIPTION</th>
                                        <th class="text-left">TITLE</th>
                                        <th class="text-right">Unit PRICE</th>
                                        <th class="text-right">QUANTITY</th>
                                        <th class="text-right">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->products as $item)
                                        <tr>
                                            <td class="no">{{$loop->iteration}}</td>
                                            <td class="text-left">
                                                <a target="_blank"
                                                    href="#">
                                                    <img src="{{$item->photo}}" alt="" style="width: 60px;heigth:60px;">
                                                </a>
                                            </td>
                                            <td>{{$item->title}}</td>
                                            <td class="unit">{{Helper::currency_converter($item->offer_price)}}</td>
                                            <td class="qty">{{Helper::currency_converter($item->pivot->quantity)}}</td>
                                            <td class="total">{{Helper::currency_converter($item->offer_price * $item->pivot->quantity)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">SUBTOTAL</td>
                                        <td>{{Helper::currency_converter($order->sub_total)}}</td>
                                    </tr>
                                    @if ($order->delivery_charge>0)
                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="2">DELIVERY CHARGE</td>
                                            <td>{{Helper::currency_converter($order->delivery_charge)}}</td>
                                        </tr>
                                    @endif
                                    @if ($order->coupon>0)
                                        <tr>
                                            <td colspan="3"></td>
                                            <td colspan="2">COUPON</td>
                                            <td>{{Helper::currency_converter($order->coupon)}}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">GRAND TOTAL</td>
                                        <td>{{Helper::currency_converter($order->total_amount)}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="thanks">Thank you!</div>
                            <div class="notices">
                                <div>NOTICE:</div>
                                <div class="notice">A finance charge of 1.5% will be made on unpaid
                                    balances after 30 days.</div>
                            </div>
                        </main>
                        <footer>
                            Invoice was created on a computer and is valid without the signature and
                            seal.
                        </footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
            @else
                <h5 class="text-danger">Invalid</h5>
            @endif
        </body>
    </html>
