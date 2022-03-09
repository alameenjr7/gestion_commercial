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
                        </a>Review
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin')}}">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Review</li>
                    </ul>
                    <p class="float-right"> Total Reviews : {{$productReview->count()}}</p>
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
                            <h2><strong>Review</strong> List</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>S. N.</th>
                                            <th>User</th>
                                            <th>Product</th>
                                            <th>Rate</th>
                                            <th>Review</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S. N.</th>
                                            <th>User</th>
                                            <th>Product</th>
                                            <th>Rate</th>
                                            <th>Review</th>
                                            <th>Reason</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($productReview as $item)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <td class="text-center">
                                                @php
                                                    $user=App\Models\User::where('id',$item->user_id)->first();
                                                @endphp
                                                <img src="{{$user->photo}}" alt="user photo" style="border-radius: 50%; max-height: 50px; max-width: 50px; " class="profile">
                                            </td>
                                            <td>
                                                @php
                                                    $product=\App\Models\Product::where('id',$item->product_id)->first();
                                                @endphp
                                                {{$product->title}}
                                            </td>
                                            <td class="text-center">
                                                @for ($i=0; $i<5; $i++)
                                                    @if ($item->rate>$i)
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    @else
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    @endif
                                                @endfor
                                            </td>
                                            <td>{!! $item->review !!}</td>
                                            <td>{{$item->reason}}</td>

                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$item->id}}"
                                                    data-toggle="switchbutton" {{$item->status=='accept' ? 'checked' : ''}}
                                                    data-onlabel="accept" data-offlabel="reject" data-size="sm"
                                                    data-onstyle="success" data-offstyle="danger"
                                                >
                                            </td>
                                            <td>
                                                <div class="hover-action row">
                                                    {{-- <a class="mr-2 ml-2 btn btn-warning" href="{{route('review.show', $item->id)}}"><i class="fa fa-archive"></i></a> --}}
                                                    <form  action="{{route('review.destroy', $item->id)}}" method="post"  class="mr-2 ml-2">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" data-type="confirm" data-id="{{$item->id}}" class="dltBtn btn btn-danger js-sweetalert mr-2 ml-2" title="Delete">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
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
        // alert(id);
        $.ajax({
            url:"{{route('review.status')}}",
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
