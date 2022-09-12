<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php 
    use App\Models\SiteSetting;
    $site   = SiteSetting::first();
    @endphp
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(!empty($site->slogo))                                     
       <link rel="shortcut icon" href="{{asset($site->slogo)}}">
        @endif
        <title>@if(!empty($site->title)){{ $site->title}} @endif</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
         <!-- Scripts -->
         <link rel="stylesheet" href="{{asset('/')}}css/app.css">
         <script src="{{asset('/')}}js/app.js"></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
