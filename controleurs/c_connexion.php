<?php
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch ($action) {
    case 'demandeConnexion': {
        include("vues/v_connexion.php");
        break;
    }
    case 'valideConnexion': {
        $login = isset($_REQUEST['login']) ? $_REQUEST['login'] : "";
        $mdp = isset($_REQUEST['mdp']) ? $_REQUEST['mdp'] : "";
        $visiteur = $pdo->getInfosVisiteur($login, $mdp);
        if (!is_array($visiteur)) {
            ajouterErreur("Login ou mot de passe incorrect !");
            include("vues/v_erreurs.php");
            include("vues/v_connexion.php");
        } else {
            $id = $visiteur['id'];
            $nom = $visiteur['nom'];
            $prenom = $visiteur['prenom'];
            $type = $visiteur['type'];
            connecter($id, $nom, $prenom, $type);
            $estDeconnecte = false;
            include "vues/v_redirection.php";
        }
        break;
    }
    case 'deconnexion': {
        deconnecter();
        include ("vues/v_deconnexion.php");
        echo "<script>document.location.replace(\"index.php\");</script>";
    }
    break;
    default : {
        include("vues/v_connexion.php");
        break;
    }
}
?>