<!DOCTYPE html>
<html dir="ltr" lang="en">
        
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <meta http-equiv="refresh" content="1"> -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('style/src/assets/images/favicon.png') }}">
    <title>SiLVue-FEP</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style/src/assets/extra-libs/c3/c3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/src/assets/libs/chartist/dist/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style/src/dist/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/src/dist/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('style/src/assets/extra-libs/sweet-alert/dist/sweetalert2.css') }}">
    
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('style/src/assets/extra-libs/morris-chart/morris.css') }}">

    <!-- google font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> -->

    <!-- Custom Font --><!-- 
    <link rel="stylesheet" href="{{ asset('style/src/dist/css/fonts.css') }}"> -->

    <!-- Data Tables -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('style/src/assets/libs/datatables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css')}}"/> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('style/src/assets/libs/datatables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css')}}"/>
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('style/src/assets/libs/datatables/DataTables-1.10.24/css/jquery.dataTables.min.css')}}"/> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('style/src/assets/libs/datatables/Select-1.3.2/css/select.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('style/src/assets/libs/datatables/Select-1.3.2/css/select.dataTables.min.css')}}"/>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('style/src/assets/libs/datatables/AutoFill-2.3.4/css/autoFill.bootstrap4.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('style/src/assets/libs/datatables/Buttons-1.6.1/css/buttons.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('style/src/assets/libs/datatables/FixedHeader-3.1.6/css/fixedHeader.bootstrap4.min.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('style/src/assets/libs/datatables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css')}}"/>

    
    <link rel="stylesheet" href="{{ asset('style/src/dist/css/style_toogle.css') }}">
    
    <link rel="stylesheet"
	href="https://code.jquery.com/qunit/qunit-2.12.0.css">
	<script src="https://code.jquery.com/qunit/qunit-2.13.0.js"></script>
    
    <!-- <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" /> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    [endif]-->
</head>