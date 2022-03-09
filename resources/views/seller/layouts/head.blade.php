<title>CCSS Gest. Comm|| Tableau de Bord</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="{{get_setting('meta_description')}}">
<meta name="author" content="Baba Al Ameen JR. NGOM">
{{-- <meta name="csrf-token" content="{{csrf_token()}}" /> --}}

<link rel="icon" href="{{asset(get_setting('favicon'))}}" type="image/x-icon">
<!-- VENDOR CSS -->
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"> --}}
<link rel="stylesheet" href="{{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('backend/assets/vendor/morrisjs/morris.min.css')}}" />

<link rel="stylesheet" href="{{asset('backend/assets/vendor/switch-button-bootstrap/css/bootstrap-switch-button.css')}}">

<link rel="stylesheet" href="{{asset('backend/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('backend/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('backend/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('backend/assets/vendor/sweetalert/sweetalert.min.css')}}" />

{{--summernote--}}
<link rel="stylesheet" href="{{asset('backend/assets/vendor/summernote/summernote.css')}}">

{{-- <link rel="stylesheet" href="{{asset('frontend/assets/styles/style.css')}}"> --}}
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('backend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/color_skins.css')}}">

{{-- <link rel="stylesheet" href="{{asset('backend/assets/style.css')}}"> --}}
<link rel="stylesheet" href="{{asset('backend/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">

{{-- calendar --}}
<link rel="stylesheet" href="{{asset('backend/assets/vendor/fullcalendar/fullcalendar.min.css')}}">


<!-- MAIN inbox CSS -->
<link rel="stylesheet" href="{{asset('backend/assets/css/inbox.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/blog.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/toastr.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/notyf.min.css')}}">



<link rel="stylesheet" href="{{asset('backend/assets/css/selectize.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/selectize.bootstrap4.css')}}">

@yield('styles')


