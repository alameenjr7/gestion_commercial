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
                        </a>Fournisseurs :
                        <a class="btn btn-sm btn-outline-secondary" href="{{route('fournisseurs.create')}}">
                            <i class="icon-plus"></i> Creer un Fournisseur
                        </a>
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin')}}">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item">Fournisseur</li>
                    </ul>
                    <p class="float-right"> Total Fournisseurs : {{$fournisseurs->count()}}</p>
                </div> 
            </div>
        </div>
        
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Fournisseurs<small>Voici la liste de tous les fournisseurs!</small> </h2>                            
                    </div>
                    <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom Complet</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Adresse</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nom Complet</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Adresse</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($fournisseurs as $fournisseur)
                                    <tr>
                                        <td>{{$fournisseur->id}}</td>
                                        <td>{{$fournisseur->nom_complet}}</td>
                                        <td>{{$fournisseur->email}}</td>
                                        <td>{{$fournisseur->telephone}}</td>
                                        <td>{{$fournisseur->adresse}}</td>
                                        <td>
                                            <input type="checkbox" name="toogle" value="{{$fournisseur->id}}"
                                                data-toggle="switchbutton" {{$fournisseur->status=='activer' ? 'checked' :
                                            ''}}
                                            data-onlabel="Activer" data-offlabel="Desactiver" data-size="sm"
                                            data-onstyle="success" data-offstyle="danger">
                                        </td>
                                        <td>
                                            <a href="{{route('fournisseurs.edit', $fournisseur->id)}}" data-toggle="tooltip"
                                                title="edit" class="float-left btn btn-sm btn-outline-warning"
                                                data-placement="bottom"><i class="icon-note"></i>
                                            </a>
                                            <form class="float-left ml-1"
                                                action="{{route('fournisseurs.destroy', $fournisseur->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="" data-toggle="tooltip" title="delete"
                                                    data-id="{{$fournisseur->id}}"
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

@endsection

@section('scripts')


<script>
    $('input[name=toogle]').change(function(){
        var mode = $(this).prop('checked');
        var id=$(this).val();
        // alert(id);
        $.ajax({
            url:"{{route('fournisseurs.status')}}",
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
