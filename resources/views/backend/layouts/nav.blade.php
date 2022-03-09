<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
        </div>

        <div class="navbar-brand">
            <a href="{{route('admin')}}">
                <img src="{{asset(get_setting('logo'))}}" alt="CCSS Logo" class="img-responsive logo">
            </a>    
        </div>

        <div class="navbar-right">
            {{-- <form id="navbar-search" class="navbar-form search-form">
                <input value="" class="form-control" placeholder="Search here..." type="text">
                <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
            </form> --}}

            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{route('order.vente')}}" class="icon-menu d-none d-sm-block " title="Vente"><i class="btn-success fa fa-money"></i></a>
                    </li>
                    <li>
                        <a href="{{route('file-manager')}}" class="icon-menu d-none d-sm-block d-md-none d-lg-block" title="Galerie"><i
                                class="fa fa-folder-open-o"></i></a>
                    </li>
                    <li>
                        <a href="{{route('calendar')}}" class="icon-menu d-none d-sm-block d-md-none d-lg-block" title="Calandrier">
                            <i class="icon-calendar"></i>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="app-chat.html" class="icon-menu d-none d-sm-block"><i class="icon-bubbles"></i></a>
                    </li>
                    <li>
                        <a href="{{route('messages')}}" class="icon-menu d-none d-sm-block"><i class="icon-envelope"></i><span
                                class="notification-dot"></span></a>
                    </li> --}}
                    {{-- <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="notification-dot"></span>
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li class="header"><strong>You have 4 new Notifications</strong></li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-info text-warning"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Campaign <strong>Holiday Sale</strong> is nearly reach
                                                budget limit.</p>
                                            <span class="timestamp">10:00 AM Today</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-like text-success"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Your New Campaign <strong>Holiday Sale</strong> is approved.
                                            </p>
                                            <span class="timestamp">11:30 AM Today</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-pie-chart text-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Website visits from Twitter is 27% higher than last week.
                                            </p>
                                            <span class="timestamp">04:00 PM Today</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-info text-danger"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Error on website analytics configurations</p>
                                            <span class="timestamp">Yesterday</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="footer"><a href="javascript:void(0);" class="more">See all notifications</a></li>
                        </ul>
                    </li> --}}
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" title="Paramettre" data-toggle="dropdown"><i
                                class="icon-equalizer"></i></a>
                        <ul class="dropdown-menu user-menu menu-icon">
                            <li class="menu-heading">PARAMÈTRES DU COMPTE</li>
                            <li><a href="{{route('settings')}}"><i class="icon-note"></i> <span>Réglages</span></a></li>
                            <li><a href="{{route('profile')}}"><i class="icon-equalizer"></i>
                                    <span>Profile</span></a></li>
                            <li class="menu-heading">FACTURATION</li>
                            <li><a href="{{route('payment')}}"><i class="icon-credit-card"></i> <span>Paramètres de paiement</span></a>
                            </li>
                            <li><a href="{{route('smtp')}}"><i class="icon-printer"></i> <span>Paramètres SMTP</span></a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="dropdown currency-dropdown">
                        @php
                            Helper::currency_load();
                            $currency_code=session('currency_code');
                            $currency_symbol=session('currency_symbol');
                            if($currency_symbol==""){
                                $system_default_currency_info=session('system_default_currency_info');
                                $currency_symbol=$system_default_currency_info->symbol;
                                $currency_code=$system_default_currency_info->code;
                            }
                        @endphp
                        <a href="javascript:void(0);" class="dropdown-toggle btn-outline-dark" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">{{$currency_symbol}} {{$currency_code}}</a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                            @foreach (App\Models\Currency::where('status','active')->get() as $currency)
                                <a class="dropdown-item" href="javascript:;" onclick="currency_change('{{$currency['code']}}')">{{$currency->symbol}} {{Illuminate\Support\Str::upper($currency->code)}}</a>
                            @endforeach
                        </div>
                    </li> --}}
                    <li>
                        <a href="{{route('admin.logout')}}" class="icon-menu d-none d-sm-block" title="Deconnection"><i class="icon-login"></i><span
                                class="notification-dot"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

