@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Inbox</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item active">Inbox</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="mobile-left">
                        <a class="btn btn-primary toggle-email-nav collapsed" data-toggle="collapse" href="#email-nav" role="button" aria-expanded="false" aria-controls="email-nav">
                            <span class="btn-label">
                                <i class="la la-bars"></i>
                            </span>
                            Menu
                        </a>
                    </div>
                    <div class="mail-inbox">
                        <div class="mail-left collapse" id="email-nav">
                            <div class="mail-compose m-b-20">
                                <a href="app-compose.html" class="btn btn-danger btn-block">Compose</a>
                            </div>
                            <div class="mail-side">
                                <ul class="nav">
                                    <li class=""><a href="javascript:void(0);"><i class="icon-envelope"></i>Inbox<span class="float-right badge badge-primary">6</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="icon-cursor"></i>Sent</a></li>
                                    <li><a href="javascript:void(0);"><i class="icon-envelope-open"></i>Draft<span class="float-right badge badge-info">3</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="icon-action-redo"></i>Outbox</a></li>
                                    <li><a href="javascript:void(0);"><i class="icon-star"></i>Starred<span class="float-right badge badge-warning">6</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="icon-trash"></i>Trash<span class="float-right badge badge-danger">9</span></a></li>
                                </ul>
                                {{-- <h3 class="label">Labels <a href="#" class="float-right m-r-10" title="Add New Labels"><i class="icon-plus"></i></a></h3>
                                <ul class="nav">
                                    <li class="">
                                        <a href="javascript:void(0);"><i class="fa fa-circle text-danger"></i>Web Design<span class="float-right badge badge-primary">5</span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-circle text-info"></i>Recharge</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-circle text-dark"></i>Paypal</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-circle text-primary"></i>Family</a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                        <div class="mail-right">
                            <div class="header d-flex align-center">
                                <h2>Inbox</h2>
                                <form class="ml-auto">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Mail" aria-label="Search Mail" aria-describedby="search-mail">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="search-mail"><i class="icon-magnifier"></i></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix mail-action">
                                <div class="pull-left">
                                    <div class="fancy-checkbox d-inline-block">
                                        <label>
                                            <input class="select-all" type="checkbox" name="checkbox">
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{route('messages')}}" class="btn btn-outline-secondary btn-sm hidden-sm">Refresh</a>
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm hidden-sm">Archive</a>
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm">Trash</a>
                                    </div>
                                    {{-- <div class="btn-group">
                                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tags</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);">Tag 1</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Tag 2</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Tag 3</a>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="btn-group">
                                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);">Mark as read</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Mark as unread</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Spam</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="ml-auto pull-right">
                                    <div class="pagination-email d-flex">
                                        <p>1-50/295</p>
                                        <div class="btn-group m-l-20">
                                            <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-angle-left"></i></button>
                                            <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fa fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mail-list">
                                @if (count($messages)>0)
                                    <ul class="list-unstyled">
                                        @foreach ($messages as $message)
                                            <li class="clearfix">
                                                <div class="mail-detail-left">
                                                    <label class="fancy-checkbox">
                                                        <input type="checkbox" name="checkbox" class="checkbox-tick">
                                                        <span></span>
                                                    </label>
                                                    <a href="javascript:void(0);" class="mail-star active"><i class="fa fa-star"></i></a>
                                                </div>
                                                <div class="mail-detail-right">
                                                    <h6 class="sub"><a href="javascript:void(0);{{$message->id}}" class="mail-detail-expand">{{$message->f_name}} {{$message->l_name}}</a> <span class="mb-0 badge badge-default">{{$message->email}}</span></h6>
                                                    <p class="dep"><span class="m-r-10">[{{$message->subject}}]</span>{!! $message->message !!}</p>
                                                    <span class="time">{{\Carbon\Carbon::parse($message->created_at)->format(' d M')}}</span>
                                                </div>
                                                <div class="hover-action">
                                                    <a class="mr-2 btn btn-warning" href="javascript:void(0);"><i class="fa fa-archive"></i></a>
                                                    <button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="mail-detail-full" id="mail-detail-open" style="display: none;">
                                <div class="clearfix mail-action">
                                    <div class="pull-left">
                                        <div class="fancy-checkbox d-inline-block">
                                            <label>
                                                <input class="select-all" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </div>
                                        <div class="btn-group">
                                            <a href="{{route('messages')}}" class="btn btn-outline-secondary btn-sm hidden-sm">Refresh</a>
                                            <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm hidden-sm">Archive</a>
                                            <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm">Trash</a>
                                        </div>
                                        {{-- <div class="btn-group">
                                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tags</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);">Tag 1</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Tag 2</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Tag 3</a>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);">Mark as read</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Mark as unread</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Spam</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="ml-auto pull-right">
                                        <a href="javascript:void(0);" class="mail-back btn btn-outline-secondary btn-sm"><i class="fa fa-close"></i></a>
                                    </div>
                                </div>
                                <div class="detail-header">
                                    <div class="media">
                                        <div class="float-left">
                                            <div class="m-r-20"><img src="{{asset('backend/assets/images/xs/avatar1.jpg')}}" alt=""></div>
                                        </div>
                                        <div class="media-body">
                                            <p class="mb-0"><strong class="text-muted m-r-5">From:</strong><a class="text-default" href="javascript:void(0);">{{$message->email}}</a> <span class="float-right text-sm text-muted">{{$message->created_at}}</span></p>
                                            <p class="mb-0"><strong class="text-muted m-r-5">To:</strong>Me <small class="float-right text-muted"><i class="zmdi zmdi-attachment m-r-5"></i>(2 files, 89.2 KB)</small></p>
                                            <p class="mb-0"><strong class="text-muted m-r-5">CC:</strong><a class="text-default" href="javascript:void(0);">{{$message->email}}</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mail-cnt">
                                    <p>{!! $message->message !!}</p>
                                    <hr>
                                    <strong>Click here to</strong>
                                    <a href="app-compose.html">Reply</a> or
                                    <a href="app-compose.html">Forward</a>
                                </div>
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
<script>
    $(document).ready(function(){
        $(".mail-detail-expand").click(function(){
            // var dataID = $(this).attr('id');
            $("#mail-detail-open").toggle();
            console.log($(this).attr('id'),$(this).data('message'));
        });
        $(".mail-back").click(function(){
            $("#mail-detail-open").toggle();
        });
    });
</script>
@endsection
