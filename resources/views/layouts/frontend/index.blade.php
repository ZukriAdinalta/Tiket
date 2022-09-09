<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href=" {{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <title>Tiket Aja</title>
  @livewireStyles
</head>

<body>

  @include('layouts.frontend.navbar')

  @yield('contents')
  @include('layouts.frontend.footer')


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>

  @livewireScripts
</body>

</html>