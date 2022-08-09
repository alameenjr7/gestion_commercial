<!doctype html>
<html lang="fr">

<head>
<title>Facture #{{$order->order_number}}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="{{get_setting('favicon')}}" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendor/font-awesome/css/font-awesome.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('backend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/color_skins.css')}}">
</head>

<body class="theme-cyan">
    <div id="wrapper">
        
		<div class="vertical-align-wrap">
            {{-- <div id="main-content"> --}}
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="card invoice1" id="DataTables_Table_0">                        
                                <div class="body" id="invoice11">
                                    <div class="invoice-top clearfix">
                                        <div class="logo">
                                            <img src="{{asset(App\Models\Setting::value('logo'))}}" alt="user" class="rounded-circle img-fluid">
                                        </div>
                                        <div class="info">
                                            <h6>{{App\Models\Setting::value('title')}}</h6>
                                            <p> 
                                                Email: {{App\Models\Setting::value('email')}} <br>
                                                Tél: (+221) {{App\Models\Setting::value('phone')}}  {{App\Models\Setting::value('fax')}}  <br>
                                                Adresse: {{App\Models\Setting::value('address')}} 
                                            </p>
                                        </div>
                                        <div class="title">
                                            <h4>N° Facture: #{{$order->order_number}}</h4>
                                            <p>
                                                Délivrer: {{$order->getCreatedAt()}}<br>
                                                Paiement Du: {{$order->getUpdatedAt()}} <br>
                                                N° Pièce: 00{{$order->n_piece}}
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
                                                @php
                                                    $client = \App\Models\Client::where('id',$order->client_id)->get()->first();
                                                @endphp
                                                @if ($client)
                                                    {{$client->prenom}} {{$client->nom}}<br>
                                                    {{$client->adresse}} <br>
                                                    (+221) {{ $client->telephone}}
                                                @else
                                                    {{$order->reference}}
                                                @endif
                                            </p>
                                            {{-- <h6>Project Description</h6>
                                            <p>Proin cursus, dui non tincidunt elementum, tortor ex feugiat enim, at elementum enim quam vel purus. Curabitur semper malesuada urna ut suscipit.</p> --}}
                                        </div>   
                                    
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Ref.</th>
                                                    <th>Désignation</th>
                                                    <th>Quantite</th>
                                                    <th>Prix Unitaire</th>
                                                    <th style="width: 80px;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->products as $ventes)
                                                <tr>
                                                    <td>{{$ventes->reference}}</td>
                                                    <td>{{$ventes->title}}</td>
                                                    <td>{{$ventes->pivot->quantity}}</td>
                                                    <td>{{$ventes->price}} FCFA</td>
                                                    <td>{{$ventes->price * $ventes->pivot->quantity}} FCFA</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <h5>Nous apprécions votre clientèle.</h5>
                                            <p>Si vous avez des questions sur ce facture, n'hésitez pas à nous contacter.</p>
                                        </div>
                                        
                                        <div class="col-md-6 text-right">
                                            <p class="m-b-0"><b>Sous-total:</b> {{$order->sub_total}} FCFA</p>
                                            @if ($order->coupon>0)
                                                <p class="m-b-0">Coupon: {{$order->coupon}} FCFA</p>
                                            @endif
                                            @if ($order->delivery_charge>0)
                                                <p class="m-b-0">Livraison: {{$order->delivery_charge}} FCFA</p>
                                            @endif
                                            {{-- <p class="m-b-0">VAT: 12.9%</p>                                         --}}
                                            <h3 class="m-b-0 m-t-10"> {{$order->total_amount}} FCFA</h3>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                                                            
                            <div class="hidden-print col-md-12 text-right">
                                <hr>
                                <a class="btn btn-round btn-primary buttons-print" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Imprimer</span></a>
                                {{-- <button onclick="printDiv();"  id="printInvoice" class="btn btn-outline-success printInvoice"><i class="icon-printer"></i></button> --}}
                                <a class="btn btn-primary" href="{{route('admin')}}">Accueil</a>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>



<script>
    // $('#printInvoice').click(function(){
    //     Popup($('.invoice')[0].otherHTML);
    //     function Popup(data)
    //     {
    //         window.print('.invoice');
    //         return true;
    //     }
    // });
    function printDiv(){
        var divContent = document.all.item("invoice11").innerHTLM;
        var a = window.open('','invoice11','height=500, width=500');
        a.document.write(divContent);
        a.document.close();
        a.print();
    }
    // function printdiv(printpage){
    //     // var divContent = document.getElementById("invoice11").innerHTLM;
    //     var headstr = "<html><head><title></title></head><body>";
    //     var footstr = "</body>";
    //     var newstr = document.all.item(printpage).innerHTLM;
    //     var oldstr = document.body.innerHTLM;
    //     document.body.innerHTLM = headstr + newstr + footstr;
    //     window.print();
    //     document.body.innerHTLM = oldstr;
    //     return false;
    // }
    // $(document).on('click','.printInvoice',function(e){
    //         e.preventDefault();
    //         $('#invoice11').printElement;
    //     });
</script>
	<!-- END WRAPPER -->
</body>
</html>
