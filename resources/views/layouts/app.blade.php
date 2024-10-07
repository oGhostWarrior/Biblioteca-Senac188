<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

        @extends('adminlte::page')
 
        @section('title', 'Dashboard')
        
        @section('content_header')
            <h1>Biblioteca Digital</h1>
        @stop
        
        @section('content')
            <p>Welcome to this beautiful admin panel.</p>
        @stop
        
        @section('css')
            {{-- Add here extra stylesheets --}}
            {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
        @stop
        
        @section('js')
            <script>
                console.log("Hi, I'm using the Laravel-AdminLTE package!");
            </script>
        @stop

        @if(session('notification'))
            <div class="alert alert-{{ session('notification_type') }}">
                {{ session('notification') }}
            </div>
        @endif

        <!--@if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif-->
    </div>
</body>
</html>
