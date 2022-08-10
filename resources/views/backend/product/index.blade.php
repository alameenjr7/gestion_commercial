@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>
                        <a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth">
                            <i class="fa fa-arrow-left"></i>
                        </a>Articles : <a class="btn btn-sm btn-outline-secondary" href="{{route('product.create')}}">
                            <i class="icon-plus"></i> Creer un Article
                        </a>
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin')}}">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Article</li>
                    </ul>
                    <p class="float-right"> Total Articles : {{$products->count()}}</p>
                </div>
            </div>
        </div>

        <div class="block-header">
            <div class="row">
                <div class="col-lg-12">
                    @include('backend.layouts.notification')
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Liste des</strong> Articles</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Référence</th>
                                            <th>Désignation</th>
                                            {{-- <th>Photo</th> --}}
                                            <th>Prix de vente</th>
                                            <th>Prix d'achat</th>
                                            <th>Famille</th>
                                            <th>Stock Magazin</th>
                                            {{-- <th>Stock Depot</th> --}}
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Référence</th>
                                            <th>Désignation</th>
                                            {{-- <th>Photo</th> --}}
                                            <th>Prix de vente</th>
                                            <th>Prix d'achat</th>
                                            <th>Famille</th>
                                            <th>Stock Magazin</th>
                                            {{-- <th>Stock Depot</th> --}}
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($products as $item)
                                            @php
                                                $photo=explode(',',$item->photo);
                                            @endphp
                                        <tr>
                                            <th hidden>{{$loop->iteration}}</th>
                                            <td>{{$item->reference}}</td>
                                            <td>{{$item->title}}</td>
                                            {{-- <td style="text-align: center">
                                                <img src="{{$photo[0] ==null ? Helper::backDefaultImage() : asset($item->photo)}}" alt="client img" style="height: 60px; width: 60px;">
                                            </td>  --}}
                                            <td>{{Helper::currency_converter($item->price)}}</td>
                                            <td>{{Helper::currency_converter($item->buying_price)}}</td>
                                            <td style="text-align: center">{{\App\Models\Category::where('id',$item->cat_id)->value('reference')}}</td>
                                            <td style="text-align: center">
                                                @if ($item->stock > 75)
                                                    <span class="badge badge-success">
                                                        {{$item->stock}}
                                                    </span>
                                                @elseif ($item->stock >= 20 && $item->stock <= 75)
                                                    <span class="badge badge-warning">
                                                        {{$item->stock}}
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger">
                                                        {{$item->stock}}
                                                    </span>
                                                @endif
                                            </td>
                                            @php
                                                $stock_dep = App\Models\Depot::where('reference',$item->reference)->get()->first();
                                                // dd($stock_dep);
                                            @endphp
                                            {{-- <td style="text-align: center">
                                                @if ($stock_dep)
                                                    @if ($stock_dep->stock > 75)
                                                        <span class="badge badge-success">
                                                            {{$stock_dep->stock}}
                                                        </span>
                                                    @elseif ($stock_dep->stock >= 20 && $stock_dep->stock <= 75)
                                                        <span class="badge badge-warning">
                                                            {{$stock_dep->stock}}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-danger">
                                                            {{$stock_dep->stock}}
                                                        </span>
                                                    @endif
                                                @else
                                                <span class="badge badge-danger">
                                                    0
                                                </span>
                                                @endif
                                            </td> --}}
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$item->id}}"
                                                    data-toggle="switchbutton" {{$item->status=='active' ? 'checked' :
                                                ''}}
                                                data-onlabel="Activer" data-offlabel="Desactiver" data-size="sm"
                                                data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td style="text-align: center">
                                                <div class="row ">
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#productID{{$item->id}}" data-toggle="tooltip"
                                                        title="view" class="float-left ml-1 btn btn-sm btn-outline-info"
                                                        data-placement="bottom"><i class="icon-eye"></i>
                                                    </a>
                                                    
                                                    <a href="{{route('product.edit',$item->id)}}" data-toggle="tooltip"
                                                        title="edit" class="float-left ml-1 btn btn-sm btn-outline-warning"
                                                        data-placement="bottom"><i class="icon-note"></i>
                                                    </a>
                                                    <form class="float-left ml-1"
                                                        action="{{route('product.destroy',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="" data-toggle="tooltip" title="delete"
                                                            data-id="{{$item->id}}"
                                                            class="dltBtn btn btn-sm btn-outline-danger "
                                                            data-placement="bottom"><i class="icon-trash"></i></a>
                                                    </form>
                                                </div>
                                            </td>
                                            {{-- modal --}}
                                            <!-- Modal -->
                                            <div class="modal fade" id="productID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    @php
                                                        $product=\App\Models\Product::where('id',$item->id)->first();
                                                    @endphp
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title" id="exampleModalLongTitle">{{ucfirst($product->title)}} {{$product->reference}}</h2>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>Description:</strong>
                                                                    <p>{!! html_entity_decode($product->description) !!}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="col-md-6">
                                                                        <strong>Type:</strong>
                                                                        <p>{!! html_entity_decode($product->type) !!}</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Prix d'achat:</strong>
                                                                    <p>{{$product->buying_price}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Prix de vente:</strong>
                                                                    <p>{{$product->price}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Rabais:</strong>
                                                                    <p>{{$product->offer_price}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Marque:</strong>
                                                                    <p>{{\App\Models\Brand::where('id',$product->brand_id)->value('title')}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Catégorie:</strong>
                                                                    <p>{{\App\Models\Category::where('id',$product->cat_id)->value('title')}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Sous-Catégorie:</strong>
                                                                    <p>{{\App\Models\Category::where('id',$product->child_cat_id)->value('title')}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Pourcentage:</strong>
                                                                    @if ($product->discount>=70 && $product->discount=100)
                                                                        <p class="badge badge-success">{{$product->discount}}</p>
                                                                    @elseif ($product->discount>20 && $product->stock<70)
                                                                        <p class="badge badge-warning">{{$product->discount}}</p>
                                                                    @else
                                                                        <p class="badge badge-danger">{{$product->discount}}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Taille:</strong>
                                                                    @if ($product->size=='S')
                                                                        <p class="badge badge-success">{{$product->size}}</p>
                                                                    @elseif ($product->size=='M')
                                                                        <p class="badge badge-warning">{{$product->size}}</p>
                                                                    @elseif ($product->size=='L')
                                                                        <p class="badge badge-primary">{{$product->size}}</p>
                                                                    @else
                                                                        <p class="badge badge-secondary">{{$product->size}}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Vendeur:</strong>
                                                                    <p class="badge badge-info">{{\App\Models\User::where('id',$product->vendor_id)->value('full_name')}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Condition:</strong>
                                                                    @if ($product->conditions=='vendre')
                                                                        <p class="badge badge-success">{{$product->conditions}}</p>
                                                                    @else
                                                                        <p class="badge badge-info">{{$product->conditions}}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Statut:</strong>
                                                                    @if ($product->status=='active')
                                                                        <p class="badge badge-success">{{$product->status}}</p>
                                                                    @else
                                                                        <p class="badge badge-danger">{{$product->status}}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Stock:</strong>
                                                                    @if ($product->stock>=100)
                                                                        <p class="badge badge-success">{{$product->stock}}</p>
                                                                    @elseif ($product->stock<=100 && $product->stock>=30)
                                                                        <p class="badge badge-warning">{{$product->stock}}</p>
                                                                    @else
                                                                        <p class="badge badge-danger">{{$product->stock}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                            {{-- <button type="button" class="btn btn-primary" data-dismiss="modal">Update</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    $('input[name=toogle]').change(function(){
        var mode = $(this).prop('checked');
        var id=$(this).val();
        console.log(id);
        $.ajax({
            url:"{{route('product.status')}}",
            type:"POST",
            data:{
                _token:'{{csrf_token()}}',
                mode:mode,
                id:id,
            },
            success:function(response){
                if(response.status){
                    toastr.success(response.msg);
                }
                else{
                    toastr.error('Please try again!')
                }
            }
        })
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.dltBtn').click(function(e) {
        var form = $(this).closest('form');
        var dataID = $(this).data('id');
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete)=>{
            if(willDelete){
                form.submit();
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success"
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    });
</script>

@endsection
