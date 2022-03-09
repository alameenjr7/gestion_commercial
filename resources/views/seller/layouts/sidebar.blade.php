<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{asset(auth('seller')->user()->photo)}}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Bonjour,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                    <strong>{{ucfirst(auth('seller')->user()->full_name)}}</strong>
                    <span>
                        @if (auth('seller')->user()->is_verified)
                            <i class="fa fa-check-circle text-success" data-toggle="tooltip" title="Verified" data-placement="bottom"></i>
                        @else
                            <i class="fa fa-user-times text-danger" data-toggle="tooltip" title="Unverified" data-placement="bottom"></i>
                        @endif
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="{{route('seller.profile')}}"><i class="icon-user"></i>My Profile</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">

                        <i class="icon-power"></i>Logout</a>
                        </a>
                    </li>
                </ul>
            </div>
            <hr>
            <ul class="row list-unstyled">
                <li class="col-2">
                    <small>Ventes</small>
                    @php
                        $added = auth('seller')->user()->id;
                    @endphp
                    <h6>{{App\Models\Order::where(['condition'=>'delivered','user_role'=>'seller'.$added])->where('created_at','>',now()->subDays(1)->endOfDay())->count()}}</h6>
                </li>
                <li class="col-3">
                    <small>Facture</small>
                    <h6>
                        {{
                            App\Models\Order::where(['condition'=>'pending','user_role'=>'seller'.$added])->where('created_at','>',now()->subDays(1)->endOfDay())->count()
                            +
                            App\Models\Order::where(['condition'=>'processing','user_role'=>'seller'.$added])->where('created_at','>',now()->subDays(1)->endOfDay())->count()
                        }}
                    </h6>
                </li>
                <li class="col-7">
                    <small>Revenu</small>
                    <h6>{{App\Models\Order::where(['payment_status'=>'paid','user_role'=>'seller'.$added])->where('created_at','>',now()->subDays(1)->endOfDay())->sum('total_amount')}} <strong>F</strong></h6>
                </li>
            </ul>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="active"><a href="{{route('seller')}}"><i class="icon-speedometer"></i> <span>Tableau de Bord</span></a>

                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-briefcase"></i> <span>Gestion des Articles</span></a>
                            <ul>
                                <li><a href="{{route('seller-product.index')}}">Liste des articles</a></li>
                                <li><a href="{{route('seller-product.create')}}">Ajouter Article</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-briefcase"></i> <span>Gestion des Ventes</span></a>
                            <ul>
                                <li><a href="{{route('vendeur-order.index')}}">Liste des Factures</a></li>
                                <li><a href="{{route('vendeur.order.vente')}}">Facturer un client</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="Chat">
                <form>
                    <div class="input-group m-b-20">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
                <ul class="right_chat list-unstyled">
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('backend/assets/images/xs/avatar4.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Chris Fox</span>
                                    <span class="message">Designer, Blogger</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('backend/assets/images/xs/avatar5.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Joge Lucky</span>
                                    <span class="message">Java Developer</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="offline">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('backend/assets/images/xs/avatar2.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Isabella</span>
                                    <span class="message">CEO, Thememakker</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="offline">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('backend/assets/images/xs/avatar1.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Folisise Chosielie</span>
                                    <span class="message">Art director, Movie Cut</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{asset('backend/assets/images/xs/avatar3.jpg')}}" alt="">
                                <div class="media-body">
                                    <span class="name">Alexander</span>
                                    <span class="message">Writter, Mag Editor</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="setting">
                <h6>Choose Skin</h6>
                <ul class="choose-skin list-unstyled">
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="cyan" class="active">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="blush">
                        <div class="blush"></div>
                        <span>Blush</span>
                    </li>
                </ul>
                <hr>
                <h6>General Settings</h6>
                <ul class="setting-list list-unstyled">
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Report Panel Usag</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>Email Redirect</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>Notifications</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Auto Updates</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Offline</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Location Permission</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="question">
                <form>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
