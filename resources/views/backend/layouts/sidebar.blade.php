<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{asset(auth('admin')->user()->photo)}}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Bienvenue,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ucfirst(auth('admin')->user()->full_name)}}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="{{route('profile')}}"><i class="icon-user"></i>Mon Profil</a></li>
                    <li><a href="{{route('messages')}}"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="{{route('settings')}}"><i class="icon-settings"></i>Réglages</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('admin.logout') }}">

                        <i class="icon-power"></i>Se Déconnecter</a>
                    </li>
                </ul>
            </div>
            <hr>
            <ul class="row list-unstyled">
                <li class="col-2">
                    <small>Ventes</small>
                    <h6>{{App\Models\Order::where('condition','delivered')->where('created_at','>',now()->subDays(1)->endOfDay())->count()}}</h6>
                </li>
                <li class="col-3">
                    <small>Factures</small>
                    <h6>{{
                        App\Models\Order::where(['condition'=>'pending'])->where('created_at','>',now()->subDays(1)->endOfDay())->count()
                        +
                        App\Models\Order::where(['condition'=>'processing'])->where('created_at','>',now()->subDays(1)->endOfDay())->count()
                        }}
                    </h6>
                </li>
                <li class="col-7">
                    <small>Revenu</small>
                    <h6>{{App\Models\Order::where('payment_status','paid')->where('created_at','>',now()->subDays(1)->endOfDay())->sum('total_amount')}} <strong>F</strong></h6>
                </li>
            </ul>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
            {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li> --}}
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="active"><a href="{{route('admin')}}"><i class="icon-speedometer"></i> <span>Tableau de Bord</span></a>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-picture"></i> <span>Gestion Client</span></a>
                            <ul>
                                <li><a href="{{route('client.index')}}">Tous les clients</a></li>
                                <li><a href="{{route('client.create')}}">Ajouter Client</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-grid"></i> <span>Gestion des Categories</span></a>
                            <ul>
                                <li><a href="{{route('category.index')}}">Liste des Categories</a></li>
                                <li><a href="{{route('category.create')}}">Ajout Categorie</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-handbag"></i> <span>Gestion des Marques</span></a>
                            <ul>
                                <li><a href="{{route('brand.index')}}">Liste des Marques</a></li>
                                <li><a href="{{route('brand.create')}}">Ajout Marques</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-star"></i> <span>Gestion Fournisseurs</span></a>
                            <ul>
                                <li><a href="{{route('fournisseurs.index')}}">Fournisseurs</a></li>
                                <li><a href="{{route('fournisseurs.create')}}">Ajout Fournisseurs</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-briefcase"></i> <span>Gestion des Articles</span></a>
                            <ul>
                                <li><a href="{{route('product.index')}}">Liste des Articles</a></li>
                                <li><a href="{{route('product.create')}}">Ajout Articles</a></li>
                            </ul>
                        </li>
                        {{-- <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-directions"></i> <span>Shipping Managements</span></a>
                            <ul>
                                <li><a href="{{route('shipping.index')}}">Shipping's</a></li>
                                <li><a href="{{route('shipping.create')}}">Add Shipping</a></li>
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="fa fa-money"></i> <span>Currency Managements</span></a>
                            <ul>
                                <li><a href="{{route('currency.index')}}">Currencies</a></li>
                                <li><a href="{{route('currency.create')}}">Add Currency</a></li>
                            </ul>
                        </li> --}}
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-layers"></i> <span>Gestion des Ventes</span></a>
                            <ul>
                                <li><a href="{{route('order.vente')}}">Facturer un client</a></li>
                                <li><a href="{{route('order.index')}}">Liste des Factures</a></li>
                            </ul>
                        </li>
                        {{-- <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-star"></i> <span>Review Management</span></a>
                            <ul>
                                <li><a href="{{route('review.index')}}">All Reviews</a></li>
                                <li><a href="{{route('review.create')}}">Add Review</a></li>
                            </ul>
                        </li> --}}
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-check"></i> <span>Gestion Stock Depot</span></a>
                            <ul>
                                <li><a href="{{route('depots.index')}}">Liste depots</a></li>
                                <li><a href="{{route('depots.create')}}">Ajout dans le depot</a></li>
                                {{-- <li><a href="{{route('coupon.index')}}">All Coupons</a></li>
                                <li><a href="{{route('coupon.create')}}">Add Coupon</a></li> --}}
                            </ul>
                        </li>
                        <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-users"></i> <span>Gestion des Vendeurs</span></a>
                            <ul>
                                <li><a href="{{route('seller.index')}}">Liste des Vendeurs</a></li>
                                {{-- <li><a href="{{route('post-tag.create')}}">Add Post Tag</a></li> --}}
                            </ul>
                        </li>
                        {{-- <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-user"></i> <span>Gestion Utilisateurs</span></a>
                            <ul>
                                <li><a href="{{route('user.index')}}">Utilisateurs</a></li>
                                <li><a href="{{route('user.create')}}">Add User</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-tag"></i> <span>Post Tag</span></a>
                            <ul>
                                <li><a href="{{route('post-tag.index')}}">All Post Tags</a></li>
                                <li><a href="{{route('post-tag.create')}}">Add Post Tag</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-paper-clip"></i> <span>Post Management</span></a>
                            <ul>
                                <li><a href="{{route('post.index')}}">All Post Managements</a></li>
                                <li><a href="{{route('post.create')}}">Add Post Management</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-vector"></i> <span>Post Category</span></a>
                            <ul>
                                <li><a href="{{route('post-category.index')}}">All Post Categories</a></li>
                                <li><a href="{{route('post-category.create')}}">Add Post Category</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li class="desactive">
                            <a href="javascript:void(0);" class="has-arrow"><i class="icon-bubbles"></i> <span>Comment Management</span></a>
                            <ul>
                                <li><a href="{{route('comment.index')}}">All Comments</a></li>
                                <li><a href="{{route('comment.create')}}">Add Comment</a></li>
                            </ul>
                        </li> --}}
                        <li class="desactive"><a href="{{route('about.index')}}"><i class="icon-user-following"></i> <span>A Propos</span></a>
                    </ul>
                </nav>
            </div>

                {{-- <div class="tab-pane active" id="menu">
                    <nav id="left-sidebar-nav" class="sidebar-nav">
                        <ul id="main-setting" class="metismenu">
                            <li class="desactive">
                                <a href="javascript:void(0);" class="has-arrow"><i class="icon-settings"></i> <span>General Settings</span></a>
                                <ul>
                                    <li><a href="{{route('settings')}}">Settings</a></li>
                                    <li><a href="{{route('payment')}}">Payment Settings</a></li>
                                    <li><a href="{{route('smtp')}}">SMTP Settings</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div> --}}

        </div>
    </div>
</div>
