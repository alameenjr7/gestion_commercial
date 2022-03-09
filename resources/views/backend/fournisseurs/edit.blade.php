@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a> Modifier Fournisseur</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Fournisseurs</li>
                        <li class="breadcrumb-item active">Modifier Fournisseur</li>
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
                        <form action="{{route('fournisseurs.update',$fournisseurs->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="clearfix row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Nom Complet/Raison Social <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Al Ameen NGOM / SOCIETE TAWFEKH (STF)" name="nom_complet"
                                            value="{{$fournisseurs->nom_complet}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Email </label>
                                        <input type="email" class="form-control" placeholder="stf1@gmail.com" name="email"
                                            value="{{$fournisseurs->email}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Telephone </label>
                                        <input type="number" class="form-control" placeholder="77 205 06 26" name="telephone"
                                            value="{{$fournisseurs->telephone}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Adresse </label>
                                        <input type="text" class="form-control" placeholder="Sandaga El Malick" name="adresse"
                                            value="{{$fournisseurs->adresse}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label for=""> </label>
                                    <select name="status" class="form-control show-tick">
                                        <option value="activer" {{$fournisseurs->activer=='activer' ? 'selected' : '' }}>ACTIVER
                                        </option>
                                        <option value="desactiver" {{$fournisseurs->status=='desactiver' ? 'selected' : '' }}>DESACTIVER
                                        </option>
                                    </select>
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
        </div>
    </div>
</div>

@endsection