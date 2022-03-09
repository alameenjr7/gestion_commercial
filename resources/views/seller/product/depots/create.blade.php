@extends('seller.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a> Ajouter un Article dans le depot</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Articles dans le depot</li>
                        <li class="breadcrumb-item active">Ajout Article dans le depot</li>
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
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <form action="{{route('depots.store')}}" method="post">
                            @csrf
                            <div class="clearfix row">
                                <div class="mt-3 row col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Designation <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Designation" name="nom"
                                                value="{{old('nom')}}" required>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Reference <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" maxlength="15" placeholder="HP" name="reference"
                                                value="{{old('reference')}}" required>
                                        </div> 
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Stock<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="eg: 129" name="stock"
                                                value="{{old('stock')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Fournisseurs <span class="text-danger">*</span></label>
                                            <select name="fournisseur_id" class="form-control show-tick" required>
                                                <option value="">-- Choisir un Fournisseur --</option>
                                                @foreach (\App\Models\Fournisseur::get() as $fournisseur)
                                                    <option value="{{$fournisseur->id}}">{{ucfirst($fournisseur->nom_complet)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Photo </label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i>Choisir
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo">
                                        </div>
                                        <div id="holder" style="margin-top:15px; max-height:100px;"></div>
                                    </div>
                                </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="">Statuts </label>
                                        <select name="statut" class="form-control show-tick">
                                            <option value="">-- Choisir le Statut --</option>
                                            <option value="activer" {{old('statut')=='activer' ? 'selected' : '' }}>Activer</option>
                                            <option value="desactiver" {{old('statut')=='desactiver' ? 'selected' : '' }}>Desactiver</option>
                                        </select>
                                    </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="ml-2 btn btn-primary">Enregistrer</button>
                                <button type="button" class="btn btn-outline-secondary" onclick="window.history.back();">Annuler</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm, #lfm1').filemanager('image');
</script>

{{-- <script>
    $(document).ready(function() {
            $('#description,#summary,#return_cancellation,#additional_info').summernote();
        });
</script> --}}

{{-- <script>
    $('#cat_id').change(function(){
        var cat_id=$(this).val();
        if(cat_id != null){
            $.ajax({
                url:"/admin/category/"+cat_id+"/child",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    cat_id:cat_id,
                },
                success:function(response){
                    console.log(response);
                    var html_option="<option value=''>--- Choisir un Sous-Categorie ---</option>";
                    if(response.status){
                        $('#child_cat_div').removeClass('d-none');
                        $.each(response.data,function(id,title){

                        console.log(id, title);
                            html_option +="<option value='"+id+"'>"+title+"</option>"
                        });
                    }
                    else {
                        $('#child_cat_div').addClass('d-none');
                    }
                    $('#child_cat_id').html(html_option);
                }
            });
        }
    });
</script> --}}
@endsection
