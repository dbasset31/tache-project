<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="{{ asset("/vendor/js/jquery/jquery.js") }}"></script>
        <script src="{{ asset("/vendor/js/bootstrap/bootstrap.bundle.min.js") }}"></script>
        <script src="{{asset('vendor/js/modal.js')}}"></script>
        @yield('scripts')
        <link href="{{ asset("/vendor/css/bootstrap/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ asset("/vendor/fa/css/fontawesome.css") }}" rel="stylesheet">
        <link href="{{ asset("/vendor/fa/css/all.css")}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/vendor/css/base.css')}}">
        <title>Tâche Project - @yield('title')</title>
    </head>
    <body>
        <div class="d-flex flex-row">
            <div class="p-3 flex-column">
                <div class="mt-2 mb-2" id="message-icon">
                    <i class="fa-2x fa-regular fa-comment"></i>
                </div>
                <div class="mt-2 mb-2" id="personnel-icon">
                    <i class="fa-2x fa-solid fa-user"></i>
                </div>
                <div class="mt-2 mb-2" id="folder-icon">
                    <i class="fa-2x fa-solid fa-folder"></i>
                </div>
                <div class="mt-2 mb-2" id="score-icon">
                    <i class="fa-2x fa-regular fa-clock"></i>
                </div>
            </div>
            <div class="w-100">
                @yield('page')
            </div>
        </div>
        <div id="error" class="alert alert-danger" role="alert"></div>
        <div id="success" class="alert alert-success" role="alert"></div>
        <div id="modal"></div>
    </body>
</html>

