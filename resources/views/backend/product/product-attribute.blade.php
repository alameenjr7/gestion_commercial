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
                        </a>Products
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin')}}">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Product Attribute</li>
                    </ul>
                    <p class="float-right"> Total Products Attributes : {{\App\Models\ProductAttributes::count()}}</p>
                </div>
            </div>
        </div>

        <div class="block-header">
            <div class="row">
                <div class="col-lg-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include('backend.layouts.notification')
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>{{ucfirst($product->title)}}</strong></h2>
                            <div class="row">
                                <div class="col-md-9">
                                    <form action="{{route('product.attribute',$product->id)}}" method="post">
                                        @csrf
                                        <div id="product_attribute" class="content" data-mfield-options='{"section":".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" id="btnAdd-1" class="my-2 btn btn-sm btn-primary"><i class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="mt-3 row group">
                                                <div class="col-md-3">
                                                    <label for="">Size</label>
                                                    {{-- <input class="form-control form-control-sm" name="size[]" placeholder="ex. S" type="text"> --}}
                                                    <select name="size[]" class="form-control form-control-sm show-tick">
                                                        <option value="">-- Role --</option>
                                                        <option value="S" {{old('size[]')=='S' ? 'selected' : '' }}>Small
                                                        </option>
                                                        <option value="M" {{old('size[]')=='M' ? 'selected' : '' }}>Medium
                                                        </option>
                                                        <option value="L" {{old('size[]')=='L' ? 'selected' : '' }}>Large
                                                        </option>
                                                        <option value="XL" {{old('size[]')=='XL' ? 'selected' : '' }}>Extra-large
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Original Price</label>
                                                    <input class="form-control form-control-sm" name="original_price[]" placeholder="ex. $200" step="any" type="number">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Offer Price</label>
                                                    <input class="form-control form-control-sm" name="offer_price[]" placeholder="ex. $578.00" step="any" type="number">
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">Stock</label>
                                                    <input class="form-control form-control-sm" name="stock[]" placeholder="ex. 57" type="number">
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="mt-4 btn btn-sm btn-group-sm btn-danger btnRemove"><i class="icon-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="mt-3 btn btn-sm btn-info">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <div class="block-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                    <thead>
                                                        <tr>
                                                            <th>Size</th>
                                                            <th>Original</th>
                                                            <th>Offer</th>
                                                            <th>Stock</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Size</th>
                                                            <th>Original</th>
                                                            <th>Offer</th>
                                                            <th>Stock</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @if (count($productattribute)>0)

                                                            @foreach ($productattribute as $item)
                                                                <tr>
                                                                    <td>{{$item->size}}</td>
                                                                    <td>$ {{number_format($item->original_price,2)}}</td>
                                                                    <td>$ {{number_format($item->offer_price,2)}}</td>
                                                                    <td>{{$item->stock}}</td>
                                                                    <td style="text-align: center">
                                                                        <form class="float-left ml-1" action="{{route('product.attribute.destroy',$item->id)}}" method="post">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <a href="" data-toggle="tooltip" title="delete"
                                                                                data-id="{{$item->id}}"
                                                                                class="dltBtn btn btn-sm btn-outline-danger"
                                                                                data-placement="bottom"><i class="icon-trash"></i></a>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
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
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('backend/assets/js/jquery.multifield.min.js')}}"></script>
<script>
    $('#product_attribute').multifield();
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- <script>
    $('input[name=toogle]').change(function(){
        var mode = $(this).prop('checked');
        var id=$(this).val();
        // alert(id);
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
                    alert(response.msg);
                }
                else{
                    alert('Please try again!')
                }
            }
        })
    });
</script> --}}
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
