@php

    $date = date('Y-m-d H:i:s');
        $time = \Carbon\Carbon::parse($date);
        $endTime = $time->addMinutes(2);
        $nbOnline = Illuminate\Support\Facades\DB::table('users')->where('date_activite', '>=', $date)
                                            ->where('date_activite', '<=', $endTime)
                                            ->where('companies.user_id', '=', Auth::user()->id)
                                            ->join('companies', 'users.id', 'companies.user_id')
                                            ->count();
        $nbTotal = Illuminate\Support\Facades\DB::table('users')->where('companie_id', Auth::user()->companie->id);
        $nbTotal = $nbTotal->count();
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset("/vendor/js/jquery/jquery.js") }}"></script>
    <script src="{{ asset("/vendor/js/jquery/jquery-ui.min.js") }}"></script>
    <script src="{{ asset("/vendor/js/bootstrap/bootstrap.bundle.min.js") }}"></script>
    <script src="{{asset('vendor/js/modal.js')}}"></script>
    <script src="{{asset('vendor/js/base.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/8p21jerx1wzoww973mfhhm9inyne23jh224fsuebabblhizq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    @yield('scripts')
    <link href="{{ asset("/vendor/css/bootstrap/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/vendor/css/jquery-ui.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/vendor/fa/css/fontawesome.css") }}" rel="stylesheet">
    <link href="{{ asset("/vendor/fa/css/all.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/vendor/css/base.css')}}">
    <title>Tâche Project - @yield('title')</title>
</head>
<body>
<div class="d-flex flex-row">
    <div class="p-3 flex-column">
        <div class="mt-2 mb-2" id="home-icon">
            <i class="fa-2x fa-solid fa-house"></i>
        </div>
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
        <div class="mt-2 mb-2" id="logout-icon">
            <i class="fa-2x fa-solid fa-right-from-bracket"></i>
        </div>
    </div>
    <div class="w-100">
        <div class="d-flex justify-content-center">
            <div class="flex-column w-100">
                <div class="d-flex flex-row mt-2 mb-4 justify-content-between align-items-center">
                    <div>
                        <img id="business-logo" src="{{ Auth::user()->companie->logo }}" alt="business-logo">
                    </div>
                    <div>
                        {{ Auth::user()->companie->name }}
                    </div>
                    <div class="d-flex align-items-center">
                        {{ $nbOnline }}
                        <span class="ms-1 me-1">/</span>
                        {{ $nbTotal }}
                    </div>
                </div>
                @yield('page')
            </div>
        </div>
    </div>
</div>
<div id="error" class="alert alert-danger" role="alert">
    @if($errors->any())
        <script>
            $('#error').show();
        </script>
        @foreach($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    @endif
</div>
<div id="success" class="alert alert-success" role="alert"></div>
<div id="modal"></div>
</body>
</html>

