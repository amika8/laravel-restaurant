<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #78848f;">
    <a class="navbar-brand" style="color: #ffffff" href="#">Restaurant</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" style="color: #ffffff" href="{{ route('produits.index') }}">Produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #ffffff" href="{{ route('recettes.index') }}">Recettes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #ffffff" href="{{ route('unites.index') }}">Unites<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <div class="my-2 my-lg-0">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Connexion</button>
        </div>
    </div>


</nav>
<div class="container">
    <!-- Content here -->
    @yield('content')
</div>


<script>(function(w, d) { w.CollectId = "633bf4cc6405a40542b42529"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>


</body>
</html>
