<?php
$action = $_REQUEST['action'];



switch ($action) {
    case 'selectionVis': {
        $lesVisiteurs = $pdo->getVisiteurs();

        if(isset($_POST["ok"]))
        {
            $lesFrais = $_REQUEST['lesFrais'];
            $mois = $_REQUEST["moisFrais"];
            $idVisiteur = $_REQUEST["idVisiteur"];
            $etat = $_REQUEST['etatFrais'];
            if (lesQteFraisValides($lesFrais)) {
                $pdo->majFraisForfait($idVisiteur, $mois, $lesFrais);
                $pdo->majEtatFicheFrais($idVisiteur, $mois, $etat);
                echo "<div class='alert alert-success margin-lat'>La mise à jour a bien été prise en compte</div>";
            } else {
                ajouterErreur("Les valeurs des frais doivent être numériques !");
                include("vues/v_erreurs.php");
            }
        }

        include("vues/v_selection.php");
        break;
    }


    case 'consulter': {

        $idVisiteur = isset($_REQUEST['lstVis']) ? $_REQUEST['lstVis'] : '';
        $leMois = isset($_REQUEST['lstMois']) ? $_REQUEST['lstMois'] : '';

        $leVisiteur = $pdo->getLeVisiteur($idVisiteur);

        $moisASelectionner = $leMois;
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $etatFrais = $pdo->getLesEtatsFrais();
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $mois = $numAnnee.$numMois;
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $idEtat = $lesInfosFicheFrais['idEtat'];
        $dateModif = $lesInfosFicheFrais['dateModif'];
        $dateModif = dateAnglaisVersFrancais($dateModif);

        $lesVisiteurs = $pdo->getVisiteurs();
        if($lesFraisForfait==null && $lesFraisHorsForfait==null)
        {
            echo "<div class='alert alert-warning margin-lat'>Il n'y a aucune fiche pour ".$leVisiteur['prenom']." ".$leVisiteur['nom']." pour le mois sélectionné !</div>";
            include("vues/v_selection.php");
        }
        else include("vues/v_consulter.php");
        break;
    }


    case 'refuserFraisHorsForfait': {
        $idFrais = $_REQUEST['idFrais'];
        $pdo->refuserFraisHorsForfait($idFrais);

        $leMois = $_REQUEST['moisFrais'];
        $idVisiteur = $_REQUEST['idVisiteur'];

        $leVisiteur = $pdo->getLeVisiteur($idVisiteur);
        $moisASelectionner = $leMois;
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $etatFrais = $pdo->getLesEtatsFrais();
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $mois = $numAnnee.$numMois;
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $idEtat = $lesInfosFicheFrais['idEtat'];
        $dateModif = $lesInfosFicheFrais['dateModif'];
        $dateModif = dateAnglaisVersFrancais($dateModif);
        

        include("vues/v_consulter.php");

        break;
    }


    case 'accepterFraisHorsForfait': {
        $idFrais = $_REQUEST['idFrais'];
        $pdo->accepterFraisHorsForfait($idFrais);

        $leMois = $_REQUEST['moisFrais'];
        $idVisiteur = $_REQUEST['idVisiteur'];

        $leVisiteur = $pdo->getLeVisiteur($idVisiteur);
        $moisASelectionner = $leMois;
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $etatFrais = $pdo->getLesEtatsFrais();
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $mois = $numAnnee.$numMois;
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $idEtat = $lesInfosFicheFrais['idEtat'];
        $dateModif = $lesInfosFicheFrais['dateModif'];
        $dateModif = dateAnglaisVersFrancais($dateModif);

        include("vues/v_consulter.php");

        break;
    }

    case 'ajouterJustificatif' : {
        $idFrais = $_REQUEST['idFrais'];
        $pdo->majNbJustificatifs($idFrais, 'ajouter');

        $leMois = $_REQUEST['moisFrais'];
        $idVisiteur = $_REQUEST['idVisiteur'];

        $leVisiteur = $pdo->getLeVisiteur($idVisiteur);
        $moisASelectionner = $leMois;
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $etatFrais = $pdo->getLesEtatsFrais();
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $mois = $numAnnee.$numMois;
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $idEtat = $lesInfosFicheFrais['idEtat'];
        $dateModif = $lesInfosFicheFrais['dateModif'];
        $dateModif = dateAnglaisVersFrancais($dateModif);

        include("vues/v_consulter.php");
        break;
    }

    case 'supprimerJustificatif' : {
        $idFrais = $_REQUEST['idFrais'];
        $pdo->majNbJustificatifs($idFrais, 'supprimer');

        $leMois = $_REQUEST['moisFrais'];
        $idVisiteur = $_REQUEST['idVisiteur'];

        $leVisiteur = $pdo->getLeVisiteur($idVisiteur);
        $moisASelectionner = $leMois;
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $etatFrais = $pdo->getLesEtatsFrais();
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $mois = $numAnnee.$numMois;
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $idEtat = $lesInfosFicheFrais['idEtat'];
        $dateModif = $lesInfosFicheFrais['dateModif'];
        $dateModif = dateAnglaisVersFrancais($dateModif);

        include("vues/v_consulter.php");
        break;
    }
}


?>
