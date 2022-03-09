@extends('seller.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a> Ajouter le client</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('seller')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Client</li>
                        <li class="breadcrumb-item active">Ajout le client</li>
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
                        <form action="{{route('vendeur.checkout1.store')}}" method="post">
                            @csrf
                            <div class="clearfix row">
                                
                                <div class="row col-lg-12 col-md-12 col-sm-12">
                                    @php
                                        $name = explode(' ',$client->full_name)
                                    @endphp
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Prenom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Moussa" name="prenom"
                                                value="{{$name[1]}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nom <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="DIAGNE" name="nom"
                                                value="{{$name[0]}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Adresse <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Dakar" name="adresse"
                                                value="{{$client->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Telephone <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="772050626" name="telephone"
                                                value="{{$client->phone}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Note </label>
                                        <textarea id="description" class="form-control" placeholder="Write some text..."
                                            name="note">{{$client->note}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="sub_total" value="{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())}}">
                            <input type="hidden" name="total_amount" value="{{(float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal())}}">

                            <div class="py-3">
                                <button type="button" onclick="window.history.back();"  class="btn btn-outline-secondary">Annuler</button>
                                <button type="submit" class="btn btn-primary">Continuer</button>
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

<script>
    $(document).ready(function() {
            $('#description').summernote();
        });
</script>
@endsection