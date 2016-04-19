<?php

echo "<div id='contenu'>";

$interval = new DateInterval('P1M');
$moisEnCours = new DateTime();
$moisPrecedent = new DateTime();

echo "
<form action='index.php?uc=validerFrais&action=consulter' method='post' class='form-horizontal col-md-offset-3 col-md-6'>
    <select required='required' name='lstVis' class='form-control'>
    <option value='' hidden='hidden'>Selectionner un visiteur</option>";
    foreach ($lesVisiteurs as $row) {
        echo "<option value='" . $row->id . "''>" . $row->nom . " " . $row->prenom . "</option>";
    }
echo "
    </select>

    <br><br>

    <select required='required' name='lstMois' class='form-control'>
        <option value='".$moisPrecedent->sub($interval)->format('Ym')."'>".$moisPrecedent->format('F Y')."</option>
        <option value='".$moisEnCours->format('Ym')."'>".$moisEnCours->format('F Y')."</option>
    </select>

    <br><br>

    <button type='submit' class='btn btn-success col-md-2'>Valider</button>
    <div class=\"col-md-8\"></div>
    <button type='reset' class='btn btn-danger col-md-2'>Annuler</button>
</form>


    ";


?>