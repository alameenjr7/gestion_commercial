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
                        </a>Clients :
                        <a class="btn btn-sm btn-outline-secondary" href="{{route('client.create')}}">
                            <i class="icon-plus"></i> Creer un Client
                        </a>
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin')}}">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Client</li>
                    </ul>
                    <p class="float-right"> Total clients : {{$clients->count()}}</p>
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
                            <h2>Liste des <strong>Clients</strong></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Reference</th>
                                            <th>Prenom</th>
                                            <th>NOM</th>
                                            <th>Photo</th>
                                            <th>Adresse</th>
                                            <th>Telephone</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Reference</th>
                                            <th>Prenom</th>
                                            <th>NOM</th>
                                            <th>Photo</th>
                                            <th>Adresse</th>
                                            <th>Telephone</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($clients as $item)
                                        <tr>
                                            <th hidden>{{$loop->iteration}}</th>
                                            <td>{{$item->reference}}</td>
                                            <td>{{$item->prenom}}</td>
                                            <td>{{$item->nom}}</td>
                                            <td style="text-align: center">
                                                <img src="{{$item->photo ==null ? Helper::backDefaultImage() : asset($item->photo)}}" alt="client img"
                                                style="height: 60px; width: 60px;">
                                            </td>
                                            <td>{{$item->adresse}}</td>
                                            <td>{{$item->telephone}}</td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$item->id}}"
                                                    data-toggle="switchbutton" {{$item->statut=='activer' ? 'checked' :
                                                ''}}
                                                data-onlabel="Activer" data-offlabel="Desactiver" data-size="sm"
                                                data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <a href="{{route('client.edit', $item->id)}}" data-toggle="tooltip"
                                                    title="edit" class="float-left btn btn-sm btn-outline-warning"
                                                    data-placement="bottom"><i class="icon-note"></i>
                                                </a>
                                                <form class="float-left ml-1"
                                                    action="{{route('client.destroy', $item->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" data-toggle="tooltip" title="delete"
                                                        data-id="{{$item->id}}"
                                                        class="dltBtn btn btn-sm btn-outline-danger"
                                                        data-placement="bottom"><i class="icon-trash"></i></a>
                                                </form>
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
        // alert(id);
        $.ajax({
            url:"{{route('client.status')}}",
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
