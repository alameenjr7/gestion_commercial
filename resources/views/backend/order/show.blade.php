@extends('backend.layouts.master')

@section('content')


    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                    class="fa fa-arrow-left"></i></a> Order</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Views</li>
                            <li class="breadcrumb-item active">Order view</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Color Pickers -->
            <div class="clearfix row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped ">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width:60px;">#</th>
                                            <th>Client/Reference</th>
                                            <th>Date</th>
                                            <th>Type Paiement</th>
                                            <th>Conditions</th>
                                            <th>Statut</th>
                                            <th>Montant</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $order->order_number }}</td>
                                            @php
                                                $client = \App\Models\Client::where('id',$order->client_id)->get()->first();
                                            @endphp
                                            @if($client)
                                                <td>{{$client->prenom}} {{$client->nom}}</td>
                                                <td>{{$order->getDateFact()}}</td>
                                            @else
                                                <td>{{$order->reference}}</td>
                                                <td>{{$order->getDateFact()}}</td>
                                            @endif
                                            <td>{{ $order->payment_method == 'cod' ? 'Paiement à la Caisse' : $order->payment_method }}</td>
                                                @if ($order->condition=='pending')
                                                    <td>
                                                        <span class="badge badge-info">{{ucfirst($order->condition=="pending" ? "En Attente" : $order->condition)}}</span>
                                                    </td>
                                                @elseif ($order->condition=='processing')
                                                    <td>
                                                        <span class="badge badge-warning">{{ucfirst($order->condition=="processing" ? "En Traitement" : $order->condition)}}</span>
                                                    </td>
                                                @elseif ($order->condition=='delivered')
                                                    <td>
                                                        <span class="badge badge-primary">{{ucfirst($order->condition=="delivered" ? "Livraison" : $order->condition)}}</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge badge-danger">{{ucfirst($order->condition=="cancelled" ? "Annulation" : $order->condition)}}</span>
                                                    </td>
                                                @endif
                                                @if ($order->payment_status=='paid')
                                                    <td>
                                                        <span class="badge badge-success">{{ucfirst($order->payment_status=="paid" ? "Payé" : $order->payment_status)}}</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge badge-danger">{{ucfirst($order->payment_status=="unpaid" ? "Non Payé" : $order->payment_status)}}</span>
                                                    </td>
                                                @endif
                                            <td>{{ $order->total_amount }} FCAF</td>
                                            <td style="text-align: center;">
                                                <div class="row">
                                                    <a href="{{ route('order.facture',$order->id) }}"
                                                        data-target="#userID{{ $order->id }}" data-toggle="tooltip"
                                                        title="View facture"
                                                        class="float-left ml-1 btn btn-sm btn-outline-secondary"
                                                        data-placement="bottom"><i class="icon-eye"></i>
                                                    </a>
                                                    <a href="{{route('order.pdf',$order->id)}}" title="Download facture"
                                                        class="float-left ml-1 btn btn-sm btn-outline-warning"
                                                        data-placement="bottom">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="table-responsive">
                                <table class="table mt-4 table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Reference</th>
                                            {{-- <th>Image Article</th> --}}
                                            <th>Designation</th>
                                            <th>Prix</th>
                                            <th>Quantite</th>
                                            {{-- <th>Remise(%)</th> --}}
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($order->products as $item)
                                            <tr>
                                                <td>{{ $item->reference }}</td>
                                                {{-- <td>
                                                    <img src="{{ asset($item->photo) }}" style="width:60px; height:60px">
                                                </td> --}}
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->price }} FCFA</td>
                                                <td>{{ $item->pivot->quantity }}</td>
                                                {{-- <td>{{ $item->discount }} %</td> --}}
                                                <td>{{ $item->price * $item->pivot->quantity }} FCFA</td>
                                            </tr>
                                        @empty
                                            <td colspan="6" class="text-center">Pas d'Article</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">

                            </div>
                            <div class="border col-12 col-lg-5">
                                <div class="cart-total-area mb-30">
                                    <div class="table-responsive">
                                        <table class="table mb-3" style="width: 150%; height:150%">
                                            <tbody>
                                                <tr>
                                                    <td>Sous-Total:</td>
                                                    <td>{{ $order->sub_total }} <strong>FCFA</strong></td>
                                                </tr>
                                                @if ($order->delivery_charge > 0)
                                                    <tr>
                                                        <td>Frais de livraison:</td>
                                                        <td>{{ $order->delivery_charge }} <strong>FCFA</strong></td>
                                                    </tr>
                                                @endif
                                                @if ($order->coupon > 0)
                                                    <tr>
                                                        <td>Coupon:</td>
                                                        <td>{{ $order->coupon }} <strong>FCFA</strong></td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td>Total:</td>
                                                    <td>{{ $order->sub_total }} <strong>FCFA</strong></td>
                                                </tr>
                                            </tbody>
                                            <tbody>

                                                <form action="{{ route('order.status') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                    <tr>
                                                        <td><strong>Statut:</strong></td>
                                                        <td style="width: 50%">
                                                            <select name="condition" class="form-control" id="">
                                                                <option value="pending"
                                                                    {{ $order->condition == 'delivered' || $order->condition == 'cancelled' ? 'disabled' : '' }}
                                                                    {{ $order->condition == 'pending' ? 'selected' : '' }}>En Attente
                                                                </option>
                                                                <option value="processing"
                                                                    {{ $order->condition == 'delivered' || $order->condition == 'cancelled' ? 'disabled' : '' }}
                                                                    {{ $order->condition == 'processing' ? 'selected' : '' }}>En Traitement
                                                                </option>
                                                                <option value="delivered"
                                                                    {{ $order->condition == 'cancelled' ? 'disabled' : '' }}
                                                                    {{ $order->condition == 'delivered' ? 'selected' : '' }}>Livraison
                                                                </option>
                                                                <option value="cancelled"
                                                                    {{ $order->condition == 'delivered' ? 'disabled' : '' }}
                                                                    {{ $order->condition == 'cancelled' ? 'selected' : '' }}>Annulation
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <button class="mt-2 btn btn-sm btn-success float-right">Valider</button>
                                                        </td>
                                                    </tr>
                                                </form>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
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

    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>

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
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal("Bien! Facture supprime avec succes!", {
                            icon: "success"
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        });
    </script>
@endsection
