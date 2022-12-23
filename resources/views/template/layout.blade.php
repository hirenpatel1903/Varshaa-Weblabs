<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Translator</title>

        @include('template.header')
        <style>
            .headerClass{
                width: auto;
                height: 100px;
            }
        </style>
        @yield('css')
    </head>
    <header>
        <div class="headerClass"></div>
    </header>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @yield('content')
        <footer>
            @include('template.footer')

            @yield('js')
        </footer>
    </body>
</html>
