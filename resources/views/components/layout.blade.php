<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'Presto.it'  }}</title>
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  crossorigin="anonymous" ">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

    <x-navBar/>
    <div class="min-vh-100">


        {{ $slot }}

    </div>


    <x-footer/>

@livewireScripts
</body>
</html>
