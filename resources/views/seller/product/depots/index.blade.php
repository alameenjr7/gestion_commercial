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
                        </a>Articles : <a class="btn btn-sm btn-outline-secondary" href="{{route('depots.create')}}">
                            <i class="icon-plus"></i> Deposer un Article
                        </a>
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin')}}">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Depot d'Article</li>
                    </ul>
                    <p class="float-right"> Total Articles dans le depot : {{$depots->count()}}</p>
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
                            <h2><strong>Liste des</strong> Articles dans le depot</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Reference</th>
                                            <th>Designation</th>
                                            <th>Photo</th>
                                            <th>Stock Depot</th>
                                            <th>Fournisseur</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Reference</th>
                                            <th>Designation</th>
                                            <th>Photo</th>
                                            <th>Stock Depot</th>
                                            <th>Fournisseur</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($depots as $item)
                                            @php
                                                $photo=explode(',',$item->photo);
                                            @endphp
                                        <tr>
                                            <th hidden>{{$loop->iteration}}</th>
                                            <td>{{$item->reference}}</td>
                                            <td>{{$item->nom}}</td>
                                            <td style="text-align: center">
                                                <img src="{{$photo[0] ==null ? Helper::backDefaultImage() : asset($item->photo)}}" alt="client img" style="height: 60px; width: 60px;">
                                            </td>
                                            <td style="text-align: center">
                                                @if ($item->stock > 75)
                                                    <span class="badge badge-success">
                                                        {{$item->stock}}
                                                    </span>
                                                @elseif ($item->stock >= 20 && $item->stock <= 75)
                                                    <span class="badge badge-warning">
                                                        {{$item->stock}}
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger">
                                                        {{$item->stock}}
                                                    </span>
                                                @endif
                                            </td>
                                            
                                            
                                            <td style="text-align: center">{{\App\Models\Fournisseur::where('id',$item->fournisseur_id)->value('nom_complet')}}</td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$item->id}}"
                                                    data-toggle="switchbutton" {{$item->statut=='activer' ? 'checked' :
                                                ''}}
                                                data-onlabel="Activer" data-offlabel="Desactiver" data-size="sm"
                                                data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td style="text-align: center">
                                                <div class="row">
                                                    <a href="{{route('depots.edit',$item->id)}}" data-toggle="tooltip"
                                                        title="edit" class="float-left ml-1 btn btn-sm btn-outline-warning"
                                                        data-placement="bottom"><i class="icon-note"></i>
                                                    </a>
                                                    <form class="float-left ml-1"
                                                        action="{{route('depots.destroy',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="" data-toggle="tooltip" title="delete"
                                                            data-id="{{$item->id}}"
                                                            class="dltBtn btn btn-sm btn-outline-danger"
                                                            data-placement="bottom"><i class="icon-trash"></i></a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
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
        console.log(id);
        $.ajax({
            url:"{{route('product.status')}}",
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
