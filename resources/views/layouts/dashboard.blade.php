<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty($title) ? $title : __('app.dashboard') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  >
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">

    @yield('page-css')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script type='text/javascript'>
        /* <![CDATA[ */
        var page_data = {!! pageJsonData() !!};
        /* ]]> */
    </script>

</head>
<body>
@php
$pendingJobCount = \App\Job::pending()->count();
$approvedJobCount = \App\Job::approved()->count();
$blockedJobCount = \App\Job::blocked()->count();
$user = Auth::user();
@endphp

     @if($user->is_admin())
     @include('layouts.admin');
     @else
      @include('layouts.user');
     @endif

    <!-- Scripts -->
    @yield('page-js')
    <script src="{{ asset('assets/js/admin.js') }}" defer></script>

</body>
</html>
