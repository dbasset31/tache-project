<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset("/vendor/js/jquery/jquery.js") }}"></script>
    <script src="{{ asset("/vendor/js/bootstrap/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("/vendor/js/register.js") }}"></script>
    <link href="{{ asset("/vendor/css/bootstrap/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/vendor/fa/css/fontawesome.css") }}" rel="stylesheet">
    <link href="{{ asset("/vendor/fa/css/all.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/vendor/css/base.css')}}">
    <title>Tâche Project - Inscription</title>
</head>
<body>
<div id="form">
    <form method="POST" action="">
        <div class="card">
            <div class="card-header">
                <h2>Inscription</h2>
            </div>
            <div class="card-body">
                <div id="BusinessRegister">
                    <div class="d-flex flex-column mb-4">

                        <label for="businessName">Nom de l'entreprise :</label>
                        <input type="text" class="form-control" id="businessName" name="businessName">

                        <label class="mt-3" for="telBusiness">Numéro de Téléphone de l'entreprise :</label>
                        <input type="tel" class="form-control" id="telBusiness" name="telBusiness" placeholder="0102030405">

                        <label class="mt-3" for="password">Nombre de salarié :</label>
                        <div class="d-flex flex-row">
                            <select class="form-control w-25" name="package_id" id="package_id">
                                @foreach($packages as $package)
                                    <option id="package_{{ $package->id }}" price="{{ number_format($package->price,2,',','') }} €" value="{{ $package->id }}">
                                        {{ $package->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="pricePackage">
                                <div class="d-flex ms-5">
                                    <label> Montant :</label>
                                    <span class="ms-1">0,00 €</span>
                                </div>
                            </div>
                        </div>
                        <label class="mt-3">Logo de l'entreprise</label>
                        <input class="d-none" type="file" id="logoBusinessUpload">
                        <div class="d-flex flex-column">
                            <div id="business-logo">

                            </div>
                            <label id="btn_logo_upload" class="btn btn-secondary" for="logoBusinessUpload">Choisir un logo</label>
                        </div>


                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success mt-2" type="button" >Suivant</button>
                    </div>
                </div>
                <div id="accountRegister">
                    <div class="d-flex flex-column mb-4">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="exemple@exemple.fr">
                        <label class="mt-3" for="password">Mot de passe :</label>
                        <div class="d-flex flex-row">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                            <button type="button" class="btn" id="showPassword"><i class="fa-regular fa-eye"></i></button>
                        </div>
                        <label class="mt-3" for="passwordConf">Confirmation du mot de passe :</label>
                        <div class="d-flex flex-row">
                            <input type="password" class="form-control" id="passwordConf" name="passwordConf" placeholder="Mot de passe">
                            <button type="button" class="btn" id="showPasswordConf"><i class="fa-regular fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success mt-2" type="submit" >Valider</button>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('login') }}">Déjà inscris ? Se connecter</a>
                </div>
                <ul>
                    <li>Information de l'entreprise
                        <ul>
                            </li>
                            <li>nom entreprise</li>
                            <li>téléphone entreprise</li>
                            <li>nb salarié</li>
                            <li>logo entreprise</li>

                        </ul>
                    </li>
                    <li>Information de la personne :
                        <ul>
                            <li>civilité</li>
                            <li>nom</li>
                            <li>prenom</li>
                            <li>qualité</li>
                            <li>ligne direct</li>
                        </ul>
                    </li>
                    <li> Information du compte
                        <ul>Email</ul>
                        <ul>Password</ul>
                        <ul>PasswordConf</ul>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>
</body>
</html>
