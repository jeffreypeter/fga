<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="FGA - Furniture Give Away">
  <meta name="author" content="Jeffrey">
  <meta name="keyword" content="">
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
  <title>FGA | Furniture Give Away</title>

  <!-- Icons -->
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
  @yield('css')
  <!-- Main styles for this application -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <!-- Styles required by this views -->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">  
</head>
<!-- BODY options, add following classes to body to change options
'.header-fixed' - Fixed Header
'.brand-minimized' - Minimized brand (Only symbol)
'.sidebar-fixed' - Fixed Sidebar
'.sidebar-hidden' - Hidden Sidebar
'.sidebar-off-canvas' - Off Canvas Sidebar
'.sidebar-minimized'- Minimized Sidebar (Only icons)
'.sidebar-compact'    - Compact Sidebar
'.aside-menu-fixed' - Fixed Aside Menu
'.aside-menu-hidden'- Hidden Aside Menu
'.aside-menu-off-canvas' - Off Canvas Aside Menu
'.breadcrumb-fixed'- Fixed Breadcrumb
'.footer-fixed'- Fixed footer
-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  @include('panel.navbar')
  
  <div class="app-body">
    @include('panel.sidebar')
    <!-- Main content -->
    <main class="main">

      {{--@include('panel.breadcrumb')--}}

      @yield('content')
      <!-- /.container-fluid -->
    </main>

    @include('panel.asidemenu')

  </div>

  @include('panel.footer')

  @include('panel.scripts')
  @yield('myscript')

</body>
</html>