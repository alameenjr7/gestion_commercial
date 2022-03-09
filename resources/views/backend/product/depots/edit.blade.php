@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a> Modifier un Articles</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Articles</li>
                        <li class="breadcrumb-item active">Modifier Article</li>
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
                        <form action="{{route('depots.update',$depots->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="clearfix row">
                                <div class="row col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Designation <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Designation" name="nom"
                                                value="{{$depots->nom}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Reference <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Ex: PTH03C7" name="reference"
                                                value="{{$depots->reference}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Stock <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="eg: 1000" name="stock"
                                                value="{{$depots->stock}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Fournisseurs </label>
                                            <select name="fournisseur_id" class="form-control show-tick">
                                                <option value="">-- Choisir un Fournisseur --</option>
                                                @foreach (\App\Models\Fournisseur::get() as $fournisseur)
                                                    <option value="{{$fournisseur->id}}" {{$fournisseur->id==$depots->fournisseur_id ? 'selected' : ''}}>{{ucfirst($fournisseur->nom_complet)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="row col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Price <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="eg: 1000" name="price"
                                                value="{{$depots->price}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Statut </label>
                                        <select name="statut" class="form-control show-tick">
                                            <option value="">-- Statut --</option>
                                            <option value="activer" {{$depots->statut=='activer' ? 'selected' : '' }}>Active</option>
                                            <option value="desactiver" {{$depots->statut=='desactiver' ? 'selected' : '' }}>Desactiver</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Photo </label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i>Choisir
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$depots->photo}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px; max-height:100px;"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-3">
                                <button type="submit" class="ml-2 btn btn-primary">Mettre a jour</button>
                                <button type="button" onclick="window.history.back();" class="btn btn-outline-secondary">Annuler</button>
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

<script>
    $(document).ready(function() {
            $('#description,#summary,#return_cancellation,#additional_info').summernote();
        });
</script>

@endsection

