<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="{{ asset("/vendor/js/jquery/jquery.js") }}"></script>
        <script src="{{ asset("/vendor/js/bootstrap/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("/vendor/js/login.js") }}"></script>
        <link href="{{ asset("/vendor/css/bootstrap/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ asset("/vendor/fa/css/fontawesome.css") }}" rel="stylesheet">
        <link href="{{ asset("/vendor/fa/css/all.css")}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/vendor/css/base.css')}}">
        <title>Tâche Project - Connexion</title>
    </head>
    <body>
        <div id="form">
            <form method="POST" action="{{ route('tryConnect') }}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h2>Connexion</h2>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-column mb-4">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="exemple@exemple.fr">
                            <label class="mt-3" for="password">Mot de passe :</label>
                            <div class="d-flex flex-row">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                                <button type="button" class="btn" id="showPassword"><i class="fa-regular fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <label for="stayConnect">Rester connecté : </label>
                            <input class="ms-2" type="checkbox" id="stayConnect" name="stayConnect" value="1">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success mt-2" type="submit" >Valider</button>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="">Mot de passe oublié</a>
                            <a href="{{ route('register') }}">Nouveau ? S'inscrire</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
