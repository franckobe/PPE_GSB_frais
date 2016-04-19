<!-- Division pour le sommaire -->
<div class="navbar navbar-inverse">
    <ul id="sommaire" class="nav navbar-nav col-md-12">
        <?php
        $info='Visiteur médical';
        $url = $_SERVER['REQUEST_URI'];
        if(isset($_SESSION['type']) && $_SESSION['type']=='com') $info='Comptable';
        if(isset($_SESSION['prenom']) && isset($_SESSION['nom']) && isset($_SESSION['type']))
        {
            echo "<li class=\"col-md-4\">";
            echo "<h4 class='text-uppercase'><i class='glyphicon glyphicon-user'></i> ".$_SESSION['prenom'] . "  " . $_SESSION['nom'] . "<span class='text-lowercase text-capitalize'> : " . $info . "</span></h4>";
            echo "</li>";
        }
        else if (isset($_REQUEST['login']) && isset($_REQUEST['mdp'])){
            echo "<li class='col-md-12'><h3 class='text-uppercase col-md-12'>Bienvenue</h3></li>";
        }
        else
        {
            echo "<li class='col-md-12'><h3 class='text-uppercase col-md-12'>Vous devez vous connecter</h3></li>";
        }
        ?>

        <?php
        if (isset($_SESSION['type']) && $_SESSION['type'] == 'vis') {
            echo "
                        <li class='col-md-3'>
                            <a class='btn btn-default btn-lg' href=\"index.php?uc=gererFrais&action=saisirFrais\" title=\"Saisie fiche de frais \">Saisie fiche de frais</a>
                        </li>
                        <li class='col-md-3'>
                            <a class='btn btn-default btn-lg' href=\"index.php?uc=etatFrais&action=selectionnerMois\" title=\"Consultation de mes fiches de frais\">Mes fiches de frais</a>
                        </li>
                        <li class='col-md-2'>
                            <a class='btn btn-danger btn-lg' href=\"index.php?uc=connexion&action=deconnexion\" title=\"Se déconnecter\">Déconnexion</a>
                        </li>
                    ";
        }

        if (isset($_SESSION['type']) && $_SESSION['type'] == 'com') {
            echo "
                        <li class='col-md-3'>
                            <a class='btn btn-default btn-lg' href=\"index.php?uc=validerFrais&action=selectionVis\" title=\"Fiches visiteurs \">Fiches visiteurs</a>
                        </li>
                        <li class='col-md-2'>
                            <a class='btn btn-danger btn-lg' href=\"index.php?uc=connexion&action=deconnexion\" title=\"Se déconnecter\">Déconnexion</a>
                        </li>
                    ";
        }


        ?>

    </ul>

</div>
    