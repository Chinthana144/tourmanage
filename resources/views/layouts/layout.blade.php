<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Akagi eXperience</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

    {{-- bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <meta name="csrf-token" content="{{ csrf_token() }}">

     {{-- common styles --}}
     <link rel="stylesheet" href="{{ asset('css/common_style.css') }}">
   </head>
<body>

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    @include('layouts.navbar')


    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>


</body>
</html>
