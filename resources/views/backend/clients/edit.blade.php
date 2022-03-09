@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a> Edit clients</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">clients</li>
                        <li class="breadcrumb-item active">Edit clients</li>
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
                        <form action="{{route('client.update',$client->id)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="clearfix row">
                                <div class="mt-3 row col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Prenom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Ousmane" name="prenom"
                                                value="{{$client->prenom}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="DIOP" name="nom"
                                                value="{{$client->nom}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 row col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Adresse <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Lib" name="adresse"
                                                value="{{$client->adresse}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Telephone <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="772050626" name="telephone"
                                                value="{{$client->telephone}}">
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
                                                    <i class="fa fa-picture-o"></i>Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$client->photo}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px; max-height:100px;"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for="">Statut </label>
                                    <select name="status" class="form-control show-tick">
                                        <option value="activer" {{$client->statut=='activer' ? 'selected' : '' }}>Activer
                                        </option>
                                        <option value="desactiver" {{$client->statut=='desactiver' ? 'selected' : '' }}>
                                            Desactiver
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12 py-3">
                                    <div class="form-group">
                                        <label for="">Note </label>
                                        <textarea id="description" class="form-control" placeholder="Write some text..."
                                            name="note">{{$client->note}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="py-3">
                                <button type="submit" class="btn btn-primary">Mettre a jour</button>
                                <button type="button" onclick="window.history.back();"  class="btn btn-outline-secondary">Annuler</button>
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
    $('#lfm').filemanager('image');
</script>

<script>
    $(document).ready(function() {
            $('#description').summernote();
        });
</script>

<script>
    function yesnoCheck(that) {
        if (that.value == "promo") {
            document.getElementById("open").style.display = "block";
        } else {
            document.getElementById("open").style.display = "none";
        }
    }
</script>
@endsection
