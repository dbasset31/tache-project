<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset("/vendor/js/jquery/jquery.js") }}"></script>
    <script src="{{ asset("/vendor/js/bootstrap/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("/vendor/js/register.js") }}"></script>
    <script src="{{ asset("/vendor/js/form.js") }}"></script>
    <link href="{{ asset("/vendor/css/bootstrap/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/vendor/fa/css/fontawesome.css") }}" rel="stylesheet">
    <link href="{{ asset("/vendor/fa/css/all.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/vendor/css/base.css')}}">
    <title>Tâche Project - Inscription</title>
</head>
<body>
<div id="form">
    <form id="register" method="POST" action="{{ route('saveRegister') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h2>Inscription</h2>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row justify-content-center align-items-center">
                    <div id="etape">
                        <input type="radio" checked onclick="return false;" id="etapeBusinessRegister"> <input type="radio" onclick="return false;" id="etapePersonneRegister"> <input onclick="return false;" type="radio" id="etapeaccountRegister">
                    </div>
                </div>

                <div id="BusinessRegister">
                    <div class="d-flex flex-column mb-4">

                        <label for="businessName">Nom de l'entreprise :</label>
                        <input type="text" requis="true" class="form-control" id="businessName" name="businessName" value="{{ old('businessName') }}">

                        <label class="mt-3" for="telBusiness">Numéro de Téléphone de l'entreprise :</label>
                        <input type="tel" requis="true" class="form-control" id="telBusiness" name="telBusiness" placeholder="0102030405" value="{{ old('telBusiness') }}">

                        <label class="mt-3" for="package_id">Nombre de salarié :</label>
                        <div class="d-flex flex-row">
                            <select class="form-control w-25" name="package_id" id="package_id">
                                @foreach($packages as $package)
                                    <option id="package_{{ $package->id }}" @if( old('package_id') == $package->id ) selected @endif price="{{ number_format($package->price,2,',','') }} €" value="{{ $package->id }}">
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
                        <input class="d-none" type="file" name="businessLogo" id="logoBusinessUpload">
                        <div class="d-flex flex-column">
                            <div id="business-logo">

                            </div>
                            <label id="btn_logo_upload" class="btn btn-secondary" for="logoBusinessUpload">Choisir un logo</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success mt-2" onclick="nextStep('BusinessRegister','PersonneRegister')" type="button" >Suivant</button>
                    </div>
                </div>
                <div id="PersonneRegister">
                    <div class="d-flex flex-column mb-4">
                        <label class="mt-3" for="civilite_id">Civilitée :</label>
                        <div class="d-flex flex-row">
                            <select class="form-control w-25" name="civilite_id" id="civilite_id">
                                @foreach($civilities as $civility)
                                    <option @if( old('civilite_id') == $civility->id ) selected @endif id="civility_{{ $civility->id }}" value="{{ $civility->id }}">
                                        {{ $civility->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-row mt-3">
                            <div class="d-flex flex-column">
                                <label for="lastName">Nom :</label>
                                <input type="text" requis="true" class="form-control" id="lastName" name="lastName" value="{{ old('lastName') }}">
                            </div>
                            <div class="d-flex flex-column ms-5">
                                <label for="firstName">Prénom :</label>
                                <input type="text" requis="true" class="form-control" id="firstName" name="firstName" value="{{ old('firstName') }}">
                            </div>
                        </div>

                        <label class="mt-3" for="qualite">Qualité :</label>
                        <input type="text" class="form-control" id="qualite" name="qualite" value="{{ old('qualite') }}">

                        <label class="mt-3" for="telDirect">Numéro de ligne directe :</label>
                        <input type="tel" class="form-control" id="telDirect" name="telDirect" placeholder="0102030405" value="{{ old('telDirect') }}">

                        <label class="mt-3" for="color">Couleur :</label>
                        <input type="color" class="form-control" id="color" name="color" value="{{ old('color') }}">

                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-danger mt-2 me-4" onclick="prevStep('BusinessRegister','PersonneRegister')" type="button" >Précédent</button>
                        <button class="btn btn-success mt-2" onclick="nextStep('PersonneRegister','accountRegister')" type="button" >Suivant</button>
                    </div>
                </div>
                <div id="accountRegister">
                    <div class="d-flex flex-column mb-4">
                        <label for="email">Email :</label>
                        <input type="email" requis="true" class="form-control" id="email" name="email" placeholder="exemple@exemple.fr" value="{{ old('email') }}">
                        <label class="mt-3" for="password">Mot de passe :</label>
                        <div class="d-flex flex-row">
                            <input type="password" requis="true" class="form-control" id="password" name="password" placeholder="Mot de passe">
                            <button type="button" class="btn" id="showPassword"><i class="fa-regular fa-eye"></i></button>
                        </div>
                        <label class="mt-3" for="passwordConf">Confirmation du mot de passe :</label>
                        <div class="d-flex flex-row">
                            <input type="password" requis="true" class="form-control" id="passwordConf" name="passwordConf" placeholder="Mot de passe">
                            <button type="button" class="btn" id="showPasswordConf"><i class="fa-regular fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-danger mt-2 me-4" onclick="prevStep('PersonneRegister','accountRegister')" type="button" >Précédent</button>
                        <button class="btn btn-success mt-2" type="button" onclick="validateForm('register')" >Valider</button>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('login') }}">Déjà inscris ? Se connecter</a>
                </div>
            </div>
        </div>
    </form>
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
</body>
</html>
