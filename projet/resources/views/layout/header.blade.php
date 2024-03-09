<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('Frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ url('Frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('Frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ url('Frontend/css/style.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body class="w-full ">
