@extends('backend.layouts.master')

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a> File Manager</h2>
                    <ul class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li> --}}
                        <li class="breadcrumb-item">File Manager</li>
                        <li class="breadcrumb-item active">Files</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clearfix row">
            <iframe 
                src="/laravel-filemanager"
                style="width: 100%; height: 700px; overflow: hidden; border: none;">
            </iframe>
        </div>
    </div>
</div>
@endsection
