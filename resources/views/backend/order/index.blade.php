@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
                            <i class="fa fa-arrow-left"></i>
                        </a>Users
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Order</li>
                        {{-- <li class="breadcrumb-item active">Add users</li> --}}
                    </ul>
                    <p class="float-right"> Total Orders : {{$orders->count()}}</p>
                </div>
            </div>
        </div>

        <div class="block-header">
            <div class="row">
                <div class="col-lg-12">
                    @include('backend.layouts.notification')
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Order</strong> List</h2>
                        </div>
                        <div class="body">
                            {{-- <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                --}}
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead class="">
                                            <tr>
                                                <th style="width:60px;">#Ref.</th>
                                                <th>Client</th>
                                                <th>Tel/N Piece</th>
                                                <th>Date de la Facture</th>
                                                <th>Vendeur</th>
                                                <th>Conditions</th>
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
                                                @php
                                                    $vendeur = \App\Models\Seller::where(['id'=>$order->user_id,'role'=>$order->user_role])->get()->first();
                                                    $vendeurs = \App\Models\Admin::where(['id'=>$order->user_id,'role'=>$order->user_role])->get()->first();
                                                @endphp
                                                @if ($vendeur)
                                                    <td>{{$vendeur->full_name}}</td>
                                                @else
                                                    <td>{{$vendeurs->full_name}}</td>
                                                @endif
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
                                                <td>{{$order->total_amount}} FCFA</td>
                                                <td style="text-align: center;">
                                                    <div class="row">
                                                        <a href="{{route('order.show',$order->id)}}"
                                                            data-target="#userID{{$order->id}}" data-toggle="tooltip"
                                                            title="view"
                                                            class="float-left ml-1 btn btn-sm btn-outline-warning"
                                                            data-placement="bottom"><i class="icon-eye"></i>
                                                        </a>
                                                        <form class="float-left ml-1"
                                                            action="{{route('order.destroy',$order->id)}}"
                                                            method="post">
                                                            @csrf
                                                            @method('order.delete')
                                                            <a href="" data-toggle="tooltip" title="delete"
                                                                data-id="{{$order->id}}"
                                                                class="dltBtn btn btn-sm btn-outline-danger"
                                                                data-placement="bottom"><i class="icon-trash"></i></a>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <td colspan="9" class="text-center">Pas de factures</td>
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
</div>

@endsection

@section('scripts')

<script>
    $('input[name=toogle]').change(function(){
        var mode = $(this).prop('checked');
        var id=$(this).val();
        // alert(id);
        $.ajax({
            url:"{{route('user.status')}}",
            type:"POST",
            data:{
                _token:'{{csrf_token()}}',
                mode:mode,
                id:id,
            },
            success:function(response){
                if(response.status){
                    toastr.success(response.msg);
                }
                else{
                    toastr.error('Please try again!')
                }
            }
        })
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

@endsection
