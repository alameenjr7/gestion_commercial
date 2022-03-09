@extends('seller.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2>
                        <a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
                            <i class="fa fa-arrow-left"></i>
                        </a>Tableau de Bord
                    </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('seller')}}">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Gestion Commercial</li>
                    </ul>
                </div>
                <div class="text-right col-lg-7 col-md-4 col-sm-12">
                    <div class="text-center inlineblock m-r-15 m-l-15 hidden-sm">
                        <div class="text-left sparkline" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#00c5dc"
                            data-fill-Color="transparent">3,5,1,6,5,4,8,3
                        </div>
                        <span>Taux des ventes</span>
                    </div>
                    <div class="text-center inlineblock m-r-15 m-l-15 hidden-sm">
                        <div class="text-left sparkline" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#f4516c"
                            data-fill-Color="transparent">4,6,3,2,5,6,5,4
                        </div>
                        <span>Taux</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            @include('seller.layouts.notification')
        </div>

        <div class="clearfix row">
            <div class="col-lg-3 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        
                        <h3>{{App\Models\Product::where('status','active')->where('created_at','>',now()->subDays(30)->endOfDay())->count()}} <i class="float-right icon-briefcase"></i></h3>
                        <span>Total Articles: {{App\Models\Product::where('status','active')->count()}}</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                        <div class="progress-bar" data-transitiongoal="89"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        <h3>{{App\Models\User::where('status','active')->where('created_at','>',now()->subDays(30)->endOfDay())->count()}} <i class="float-right icon-user-follow"></i></h3>
                        <span>Nouveaux Clients</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                        <div class="progress-bar" data-transitiongoal="67"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        @php
                            $add_by = auth('seller')->user()->id;
                        @endphp
                        <h3>{{App\Models\Product::where(['status'=>'active','added_by'=>'seller'.$add_by])->sum('price')}} <strong>F</strong><i class="float-right"></i></h3>
                        <span>Total Article Actif</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                        <div class="progress-bar" data-transitiongoal="64"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card overflowhidden">
                    <div class="body">
                        <h3>{{$order_total_week}}<strong> F</strong><i class="float-right"></i></h3>
                        <span>Total Vente</span>
                    </div>
                    <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                        <div class="progress-bar" data-transitiongoal="68"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix row">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Rapport annuel <small>Texte descriptif ici...</small></h2>
                    </div>
                    <div class="body">
                        <div class="clearfix row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <span class="text-muted">Rapport des Ventes</span>
                                <h3 class="text-warning">4516 <strong>F</strong></h3>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <span class="text-muted">Revenu Annuel </span>
                                <h3 class="text-info">6481 <strong>F</strong></h3>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <span class="text-muted">Bénéfice Total</span>
                                <h3 class="text-success">3915 <strong>F</strong></h3>
                            </div>
                        </div>
                        <div id="area_chart" class="graph"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>Analyse des revenus<small>% plus élevé que le mois dernier</small></h2>
                    </div>
                    <div class="body">
                        <div class="text-center sparkline-pie">6,4,8</div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2>Revenu des Ventes</h2>
                    </div>
                    <div class="body">
                        <h6>Globalement <b class="text-success">7,000</b></h6>
                        <div class="sparkline" data-type="line" data-spot-Radius="2" data-highlight-Spot-Color="#445771" data-highlight-Line-Color="#222"
                            data-min-Spot-Color="#445771" data-max-Spot-Color="#445771" data-spot-Color="#445771"
                            data-offset="90" data-width="100%" data-height="95px" data-line-Width="1" data-line-Color="#ffcd55"
                            data-fill-Color="#ffcd55">2,4,3,1,5,7,3,2
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Les Cinq(5) Dernières Factures</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width:60px;">#</th>
                                        <th>Client</th>
                                        <th>Tél/N Pice</th>
                                        <th>Date de la facture</th>
                                        <th>Condition</th>
                                        <th>Statut</th>
                                        <th>Montant</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                    <tr>
                                            <td>{{$order->order_number}}</td>
                                            @php
                                                $client = \App\Models\Client::where('id',$order->client_id)->get()->first();
                                            @endphp
                                            @if ($client)
                                                <td>{{$client->prenom}} {{$client->nom}}</td>
                                                <td>{{$client->telephone}}</td>
                                            @else
                                                <td>{{$order->reference}}</td>
                                                <td>00{{$order->n_piece}}</td>
                                            @endif

                                            <td>{{$order->getDateFact()}}</td>
                                            @if ($order->condition=='pending')
                                                <td><span class="badge badge-info">{{ucfirst($order->condition)}}</span></td>
                                            @elseif ($order->condition=='processing')
                                                <td><span class="badge badge-warning">{{ucfirst($order->condition)}}</span></td>
                                            @elseif ($order->condition=='delivered')
                                                <td><span class="badge badge-primary">{{ucfirst($order->condition)}}</span></td>
                                            @else
                                                <td><span class="badge badge-danger">{{ucfirst($order->condition)}}</span></td>
                                            @endif
                                            @if ($order->payment_status=='paid')
                                                <td><span class="badge badge-success">{{ucfirst($order->payment_status)}}</span></td>
                                            @else
                                                <td><span class="badge badge-danger">{{ucfirst($order->payment_status)}}</span></td>
                                            @endif
                                            <td>{{number_format($order->total_amount,2)}} <strong>F</strong></td>
                                            <td style="text-align: center;">
                                                <div class="row">
                                                    <a href="{{route('vendeur-order.show',$order->id)}}" data-target="#userID{{$order->id}}" data-toggle="tooltip"
                                                        title="view" class="float-left ml-1 btn btn-sm btn-outline-secondary"
                                                        data-placement="bottom"><i class="icon-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                    </tr>
                                    @empty
                                        <td colspan="6" class="text-center">Pas de Factures</td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.dltBtn').click(function(e) {
        var form = $(this).closest('form');
        var dataID = $(this).data('id');
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete)=>{
            if(willDelete){
                form.submit();
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success"
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    });
</script>

<script>
    $(function() {
        "use strict";
        MorrisArea();
    });
    //======
    function MorrisArea() {


        Morris.Area({
            element: 'area_chart',
            data: [{
            period: '2011',
            Sales: 5,
            Revenue: 12,
            Profit: 5
        }, {
            period: '2012',
            Sales: 62,
            Revenue: 10,
            Profit: 5
        }, {
            period: '2013',
            Sales: 20,
            Revenue: 84,
            Profit: 36
        }, {
            period: '2014',
            Sales: 108,
            Revenue: 12,
            Profit: 7
        }, {
            period: '2015',
            Sales: 30,
            Revenue: 95,
            Profit: 19
        }, {
            period: '2016',
            Sales: 25,
            Revenue: 25,
            Profit: 67
        }, {
            period: '2017',
            Sales: 135,
            Revenue: 12,
            Profit: 28
        }
            ],
        lineColors: ['#ffc107', '#17a2b8', '#28a745'],
        xkey: 'year',
        ykeys: ['total'],
        labels: ['Sales', 'Revenue', 'Profit'],
        pointSize: 2,
        lineWidth: 1,
        resize: true,
        fillOpacity: 0.5,
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        hideHover: 'auto'
        });

    }

    $(function() {
        "use strict";
        var mapData = {
                "US": 298,
                "AU": 760,
                "CA": 870,
                "SN": 2000000,
                "GB": 120,
            };

        if( $('#world-map-markers').length > 0 ){
            $('#world-map-markers').vectorMap(
            {
                map: 'world_mill_en',
                backgroundColor: 'transparent',
                borderColor: '#fff',
                borderOpacity: 0.25,
                borderWidth: 0,
                color: '#e6e6e6',
                regionStyle : {
                    initial : {
                    fill : '#ebebeb'
                    }
                },

                markerStyle: {
                    initial: {
                                r: 5,
                                'fill': '#fff',
                                'fill-opacity':1,
                                'stroke': '#000',
                                'stroke-width' : 1,
                                'stroke-opacity': 0.4
                            },
                    },

                markers: [
                    { latLng: [37.09,-95.71], name: 'America' },
                    { latLng: [-25.27, 133.77], name: 'Australia' },
                    { latLng: [56.13,-106.34], name: 'Canada' },
                    { latLng: [14.497401,-14.452362], name: 'Senegal' },
                    { latLng: [55.37,-3.43], name: 'United Kingdom' },
                ],

                series: {
                    regions: [{
                        values: {
                            "US": '#bdf3f5',
                            "AU": '#f9f1d8',
                            "SN": '#40ff00',
                            "GB": '#e0eff5',
                            "CA": '#efebf4',
                        },
                        attribute: 'fill'
                    }]
                },
                hoverOpacity: null,
                normalizeFunction: 'linear',
                zoomOnScroll: false,
                scaleColors: ['#000000', '#000000'],
                selectedColor: '#000000',
                selectedRegions: [],
                enableZoom: false,
                hoverColor: '#fff',
            });
        }
    });
    // progress bars
    $('.progress .progress-bar').progressbar({
        display_text: 'none'
    });

    $('.sparkline-pie').sparkline('html', {
        type: 'pie',
        offset: 90,
        width: '155px',
        height: '155px',
        sliceColors: ['#02b5b2', '#445771', '#ffcd55', '#40ff00', '#0040ff']
    })

    $('.sparkbar').sparkline('html', { type: 'bar' });
</script>
@endsection
