@extends('backend.layouts.master')

@section('content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a> Add User</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active">Add User</li>
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
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="clearfix row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Full Name" name="full_name"
                                            value="{{old('full_name')}}">
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Username <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Username" name="username"
                                                value="{{old('username')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" placeholder="Email" name="email"
                                                value="{{old('email')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row col-lg-12 col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Address </label>
                                            <input type="text" class="form-control" placeholder="Address" name="address"
                                                value="{{old('address')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Phone </label>
                                            <input type="number" class="form-control" placeholder="Phone" name="phone"
                                                value="{{old('phone')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" placeholder="Password" name="password"
                                            value="{{old('password')}}">
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

                                <div class="row col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-md-6">
                                        <label for="">Role <span class="text-danger">*</span></label>
                                        <select name="role" class="form-control show-tick">
                                            <option value="">-- Role --</option>
                                            <option value="admin" {{old('role')=='admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="customer" {{old('role')=='customer' ? 'selected' : '' }}>Customer
                                            </option>
                                            <option value="vendor" {{old('role')=='vendor' ? 'selected' : '' }}>Vendor
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Status <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="">-- Status --</option>
                                            <option value="active" {{old('status')=='active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive" {{old('status')=='inactive' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" onclick="window.history.back();  class="btn btn-outline-secondary">Cancel</button>

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
@endsection
