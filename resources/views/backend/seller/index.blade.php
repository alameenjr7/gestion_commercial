@extends('backend.layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a>Sellers : <a class="btn btn-sm btn-outline-secondary"
                            href="{{route('seller.create')}}"><i class="icon-plus"></i> Create Seller</a> </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Seller</li>
                        {{-- <li class="breadcrumb-item active">Add users</li> --}}
                    </ul>
                    <p class="float-right"> Total Sellers : {{$sellers->count()}}</p>
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
                            <h2><strong>Seller</strong> List</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>S. N.</th>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Is Verified</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S. N.</th>
                                            <th>Photo</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Is Verified</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($sellers as $item)
                                        <tr>
                                            <th>{{$loop->iteration}}</th>
                                            <td style="text-align: center">
                                                <img src="{{$item->photo ==null ? Helper::userDefaultImage() : asset($item->photo)}}" alt="seller img" style="border-radius: 50%; height: 60px; width: 60px;" class="profile">
                                            </td>
                                            <td>{{$item->full_name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td style="text-align: center;">
                                                <input type="checkbox" name="verified" value="{{$item->id}}"
                                                    data-toggle="switchbutton" {{$item->is_verified ? 'checked' :
                                                ''}}
                                                data-onlabel="Yes" data-offlabel="No" data-size="sm"
                                                data-onstyle="success" data-offstyle="danger">
                                            </td>

                                            <td style="text-align: center;">
                                                <input type="checkbox" name="toogle" value="{{$item->id}}"
                                                    data-toggle="switchbutton" {{$item->status=='active' ? 'checked' :
                                                ''}}
                                                data-onlabel="active" data-offlabel="inactive" data-size="sm"
                                                data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#userID{{$item->id}}" data-toggle="tooltip"
                                                        title="view" class="float-left ml-1 btn btn-sm btn-outline-secondary"
                                                        data-placement="bottom"><i class="icon-eye"></i>
                                                    </a>
                                                    <a href="{{route('seller.edit', $item->id)}}" data-toggle="tooltip"
                                                        title="edit" class="float-left ml-1 btn btn-sm btn-outline-warning"
                                                        data-placement="bottom"><i class="icon-note"></i>
                                                    </a>
                                                    <form class="ml-1 "
                                                        action="{{route('seller.destroy', $item->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="" data-toggle="tooltip" title="delete"
                                                            data-id="{{$item->id}}"
                                                            class="dltBtn btn btn-sm btn-outline-danger"
                                                            data-placement="bottom"><i class="icon-trash"></i></a>
                                                    </form>
                                                </div>
                                            </td>
                                            {{-- modal --}}
                                            <!-- Modal -->
                                            <div class="modal fade" id="userID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    @php
                                                        $seller=\App\Models\Seller::where('id',$item->id)->first();
                                                    @endphp
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            {{-- <h5 class="modal-title" id="exampleModalLongTitle">{{$user->full_name}}</h5> --}}
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="text-center">
                                                            <img src="{{$seller->photo !=null ? asset($seller->photo) : Helper::userDefaultImage()}}" style="height: 70px; width: 70px; border-radius: 50%; margin: 2% 0" alt="">

                                                            <div class="text-center">
                                                                <p><strong>{{$seller->username}}</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>Full Name:</strong>
                                                                    <p>{{$seller->full_name}}</p>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <strong>Email:</strong>
                                                                    <p>{{$seller->email}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>Phone N.:</strong>
                                                                    <p>{{$seller->phone}}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>Address:</strong>
                                                                    <p>{{$seller->address}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>Date of Birth:</strong>
                                                                    <p>{{$seller->date_of_birth}}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>Country:</strong>
                                                                    <p>{{$seller->country}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>City:</strong>
                                                                    <p>{{$seller->city}}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>State:</strong>
                                                                    <p>{{$seller->state}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>Is Verified:</strong>
                                                                    @if($seller->is_verified=='1')
                                                                        <p class="badge badge-success">{{$seller->is_verified}}</p>
                                                                    @else
                                                                        <p class="badge badge-danger">{{$seller->is_verified}}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>Status:</strong>
                                                                    @if ($seller->status=='active')
                                                                        <p class="badge badge-success">{{$seller->status}}</p>
                                                                    @else
                                                                        <p class="badge badge-danger">{{$seller->status}}</p>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Save Change</button>
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
{
<script>
    $('input[name=toogle]').change(function(){
        var mode = $(this).prop('checked');
        var id=$(this).val();
        // alert(id);
        $.ajax({
            url:"{{route('seller.status')}}",
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

<script>
    $('input[name=verified]').change(function(){
        var mode = $(this).prop('checked');
        var id=$(this).val();
        // alert(id);
        $.ajax({
            url:"{{route('seller.verified')}}",
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

@endsection
