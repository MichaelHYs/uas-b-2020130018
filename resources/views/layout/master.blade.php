<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'ItemDB') | ItemDB</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('css_after')
</head>

<body>
    {{-- Top Navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark bg-success">
        <a class="navbar-brand" href="/">
            <i class="fa fa-film fa-fw" aria-hidden="true"></i>
            <span class="menu-collapsed">ItemDB</span>
        </a>
    </nav>
    {{-- Top Navbar END --}}
    <div class="row" id="body-row">
        {{-- Sidebar --}}
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            {{-- Menu List --}}
            <ul class="list-group">
                {{-- Separator with title --}}
                <li
                    class="list-group-item sidebar-separator-title
 text-white d-flex align-items-center menu-collapsed bg-danger">
                    <small>MAIN MENU</small>
                </li>
                {{-- Separator END --}}
                <a href="{{ route('main.index') }}" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-film fa-fw mr-3"></span>
                        <span class="menu-collapsed">Home</span>
                    </div>
                </a>
                <a href="{{ route('items.index') }}" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-film fa-fw mr-3"></span>
                        <span class="menu-collapsed">Items</span>
                    </div>
                </a>
                <a href="{{ route('orders.index') }}" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-film fa-fw mr-3"></span>
                        <span class="menu-collapsed">Orders</span>
                    </div>
                </a>
            </ul>
            {{-- Menu List END --}}
        </div>
        {{-- Sidebar END --}}
        {{-- Content --}}
        <div class="col p-4">
            @yield('content')
            <footer class="bg-dark py-4 text-white mt-4">
                <div class="container text-center">
                    <small class="text-center">
                        Made by Michael Hansel Yapsie | NPM : 2020130018 | Copyright ?? {{ date('Y') }} STMIK LIKMI
                    </small>
                </div>
            </footer>
        </div>
        {{-- Content ENDss --}}
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js_after')
</body>

</html>
