<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>{{ config('app.name') }} | @yield('title')</title>

  @include('layouts.parts.css_script')
</head>
<body class="hold-transition login-page">
@yield('content')

<!-- /.login-box -->

@include('layouts.parts.js_script')
</body>
</html>
