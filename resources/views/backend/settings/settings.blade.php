@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2>
                        <a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
                            <i class="fa fa-arrow-left"></i>
                        </a>Update Setting
                    </h2>
                </div>
            </div>
        </div>

        <!-- Color Pickers -->
        <div class="clearfix row">

            <div class="col-md-12">
                @include('backend.layouts.notification')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error->message}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <form action="{{route('settings.update', $setting->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="clearfix row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Title" name="title"
                                            value="{{$setting->title}}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Meta Description </label>
                                        <textarea rows="5" class="form-control" placeholder="Write some text..."
                                            name="meta_description">{{$setting->meta_description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Meta Keywords </label>
                                        <textarea rows="5" class="form-control" placeholder="Write some text..."
                                            name="meta_keywords">{{$setting->meta_keywords}}</textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Logo <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i>Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="logo" value="{{$setting->logo}}">
                                        </div>
                                        <div id="holder" style="margin-top:15px; max-height:100px;">
                                            @if (get_setting('logo'))
                                                <img src="{{asset($setting->logo)}}" alt="logo" style="max-width:100px; border: 1px solid #ddd; padding: 4px 8px; ">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="">Favicon <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm1" data-input="thumbnail1" data-preview="holder1"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i>Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail1" class="form-control" type="text" name="favicon" value="{{$setting->favicon}}">
                                        </div>
                                        <div id="holder1" style="margin-top:15px; max-height:100px;">
                                            @if (get_setting('favicon'))
                                                <img src="{{asset($setting->favicon)}}" alt="favicon" style="max-width:100px; border: 1px solid #ddd; padding: 4px 8px; ">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email<span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" placeholder="Email Address" name="email"
                                                value="{{$setting->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Phone <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="phone" name="phone"
                                                value="{{$setting->phone}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Address" name="address"
                                                value="{{$setting->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Fax <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="Fax" name="fax"
                                                value="{{$setting->fax}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Footer <span class="text-danger">*</span></label>
                                            <input type="text" readonly class="form-control" placeholder="Footer" name="footer"
                                                value="{{$setting->footer}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">FaceBook URL </label>
                                            <input type="text" class="form-control" placeholder="FaceBook URL" name="facebook_url"
                                                value="{{$setting->facebook_url}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Instagram URL </label>
                                            <input type="text" class="form-control" placeholder="Instagram URL" name="instagram_url"
                                                value="{{$setting->instagram_url}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Linkedin URL </label>
                                            <input type="text" class="form-control" placeholder="Linkedin URL" name="linkedin_url"
                                                value="{{$setting->linkedin_url}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Twitter URL </label>
                                            <input type="text" class="form-control" placeholder="Twitter URL" name="twitter_url"
                                                value="{{$setting->twitter_url}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Snapchat URL </label>
                                            <input type="text" class="form-control" placeholder="Snapchat URL" name="snapchat_url"
                                                value="{{$setting->snapchat_url}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Pinterest URL </label>
                                            <input type="text" class="form-control" placeholder="Pinterest URL" name="pinterest_url"
                                                value="{{$setting->pinterest_url}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Youtube URL </label>
                                            <input type="text" class="form-control" placeholder="Youtube URL" name="youtube_url"
                                                value="{{$setting->youtube_url}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">AppStore URL </label>
                                            <input type="text" class="form-control" placeholder="AppStore URL" name="appStore_url"
                                                value="{{$setting->appStore_url}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">PlayStore URL </label>
                                            <input type="text" class="form-control" placeholder="PlayStore URL" name="playStore_url"
                                                value="{{$setting->playStore_url}}">
                                        </div>
                                    </div>
                                </div>
								<div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Map URL</label>
                                        <input type="text" class="form-control" placeholder="Map URL " name="map_url"
                                            value="{{$setting->map_url}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" onclick="window.history.back();"  class="btn btn-outline-secondary">Cancel</button>

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
    $('#lfm1').filemanager('image');
</script>

@endsection
