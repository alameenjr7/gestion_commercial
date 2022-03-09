@extends('backend.layouts.master')

@section('content')

<div id="main-content" class="profilepage_2 blog-page">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> User Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix row">
            <div class="col-lg-4 col-md-12">
                <div class="card profile-header">
                    <div class="body">
                        <div class="profile-image"> <img src="{{asset(auth('admin')->user()->photo)}}" class="rounded-circle" alt="" style="border-radius: 100%; height: 200px; width: 200px;" > </div>
                        <div>
                            @php
                                $full_names=explode(' ', auth('admin')->user()->full_name)
                            @endphp
                            <h4 class="m-b-0"><strong>{{$first_name = $full_names[0]}}</strong> {{$last_name = $full_names[1]}}</h4>
                            <span>{{auth('admin')->user()->address}}, d.c.</span>
                        </div>
                        <div class="m-t-15">
                            <button class="btn btn-primary">Follow</button>
                            <button class="btn btn-outline-secondary">Message</button>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h2>Info</h2>
                    </div>
                    <div class="body">
                        <small class="text-muted">Email address: </small>
                        <p>{{auth('admin')->user()->email}}</p>
                        <hr>
                        <small class="text-muted">Mobile: </small>
                        <p>+ {{auth('admin')->user()->phone}}</p>
                        <hr>
                        <small class="text-muted">Social: </small>
                        <p><i class="fa fa-twitter m-r-5"></i> {{get_setting('twitter_url')}}</p>
                        <p><i class="fa fa-facebook m-r-5"></i>  {{get_setting('facebook_url')}}</p>
                        <p><i class="fa fa-youtube m-r-5"></i> {{get_setting('youtube_url')}}</p>
                        <p><i class="fa fa-instagram m-r-5"></i> {{get_setting('instagram_url')}}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs-new">
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Settings">Update</a></li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content padding-0">

                    <div class="tab-pane" id="Settings">

                        <div class="card">
                            <div class="body">
                                <h6>Edit Information :</h6>
                                <form action="{{route('profile.update',auth('admin')->user()->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="clearfix row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="full_name" placeholder="Full Name" value="{{auth('admin')->user()->full_name}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{auth('admin')->user()->email}}">
                                            </div>

                                            <div class="form-group">
                                                <input type="number" class="form-control" name="phone" placeholder="Phone" value="{{auth('admin')->user()->phone}}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="address" placeholder="Address" value="{{auth('admin')->user()->address}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Photo </label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i>Choose
                                                        </a>
                                                    </span>
                                                    <input id="thumbnail" class="form-control" type="text" name="photo" value="{{auth('admin')->user()->photo}}">
                                                </div>
                                                <div id="holder" style="margin-top:15px; max-height:100px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button> &nbsp;&nbsp;
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-3 col-md-12">
                <div class="clearfix text-center row">
                    <div class="col-12">
                        <div class="card">
                            <div class="body">
                                <input type="text" class="knob" value="22" data-width="70" data-height="70" data-thickness="0.1" data-fgColor="#49c5b6">
                                <h6>Events</h6>
                                <span>12 of this month</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="body">
                                <input type="text" class="knob" value="78" data-width="70" data-height="70" data-thickness="0.1" data-fgColor="#2196f3">
                                <h6>Birthday</h6>
                                <span>4 of this month</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="body">
                                <input type="text" class="knob" value="66" data-width="70" data-height="70" data-thickness="0.1" data-fgColor="#f44336">
                                <h6>Conferences</h6>
                                <span>8 of this month</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="body">
                                <input type="text" class="knob" value="50" data-width="70" data-height="70" data-thickness="0.1" data-fgColor="#4caf50">
                                <h6>Seminars</h6>
                                <span>2 of this month</span>
                            </div>
                        </div>
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
    $(function () {
        $('.knob').knob({
            draw: function () {
                // "tron" case
                if (this.$.data('skin') == 'tron') {

                    var a = this.angle(this.cv)  // Angle
                        , sa = this.startAngle          // Previous start angle
                        , sat = this.startAngle         // Start angle
                        , ea                            // Previous end angle
                        , eat = sat + a                 // End angle
                        , r = true;

                    this.g.lineWidth = this.lineWidth;

                    this.o.cursor
                        && (sat = eat - 0.3)
                        && (eat = eat + 0.3);

                    if (this.o.displayPrevious) {
                        ea = this.startAngle + this.angle(this.value);
                        this.o.cursor
                            && (sa = ea - 0.3)
                            && (ea = ea + 0.3);
                        this.g.beginPath();
                        this.g.strokeStyle = this.previousColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                        this.g.stroke();
                    }

                    this.g.beginPath();
                    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                    this.g.stroke();

                    this.g.lineWidth = 2;
                    this.g.beginPath();
                    this.g.strokeStyle = this.o.fgColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                    this.g.stroke();

                    return false;
                }
            }
        });
    });
    </script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endsection
