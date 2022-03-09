@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a> Ajouter Clients</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Clients</li>
                        <li class="breadcrumb-item active">Ajouter un clients</li>
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
                        <form action="{{route('client.store')}}" method="post">
                            @csrf
                            <div class="clearfix row">
                                <div class="mt-3 row col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-md-6">
                                        {{-- <input type="hidden" name="reference"> --}}
                                        <div class="form-group">
                                            <label for="">Prenom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Ousmane" name="prenom"
                                                value="{{old('prenom')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="DIOP" name="nom"
                                                value="{{old('nom')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 row col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Adresse <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Lib" name="adresse"
                                                value="{{old('adresse')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Telephone <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="772050626" name="telephone"
                                                value="{{old('telephone')}}">
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
                                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px; max-height:100px;"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for=""> </label>
                                    <select name="statut" class="form-control show-tick">
                                        <option value="activer" {{old('statut')=='activer' ? 'selected' : '' }}>Activer
                                        </option>
                                        <option value="desactiver" {{old('statut')=='desactiver' ? 'selected' : '' }}>
                                            Desactiver
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Note </label>
                                        <textarea id="description" class="form-control" placeholder="Write some text..."
                                            name="note">{{old('note')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="py-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" onclick="window.history.back();"  class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- <div class="clearfix row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <div class="clearfix row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Title" name="title"
                                            value="{{old('title')}}">
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
                                            <input id="thumbnail" class="form-control" type="text" name="photo">
                                        </div>
                                        <div id="holder" style="margin-top:15px; max-height:100px;"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Description </label>
                                        <textarea id="description" class="form-control" placeholder="Write some text..."
                                            name="description">{{old('description')}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for="">Condition </label>
                                    <select name="condition" class="form-control show-tick">
                                        <option value="">-- Condition --</option>
                                        <option value="client" {{old('condition')=='client' ? 'selected' : '' }}>client
                                        </option>
                                        <option value="promo" {{old('condition')=='promo' ? 'selected' : '' }}>Promote
                                        </option>
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for=""> </label>
                                    <select name="status" class="form-control show-tick">
                                        <option value="">-- Status --</option>
                                        <option value="active" {{old('status')=='active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{old('status')=='inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
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
            // document.getElementById("open1").style.display = "block";
        } else {
            document.getElementById("open").style.display = "none";
            // document.getElementById("open1").style.display = "none";
        }
    }
</script>
@endsection
