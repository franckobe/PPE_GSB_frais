<?php

echo "<div id='contenu'>";


echo "
<div class='row'>
<form action='index.php?uc=validerFrais&action=rembourser' method='post' class='form-horizontal col-md-offset-3 col-md-6'>
    <select required='required' name='lstVis' class='form-control'>
    <option value='' hidden='hidden'>Selectionner un visiteur</option>";
    foreach ($lesVisiteurs as $row) {
        var_dump($row->id);
        if($row->id == $idVisiteur)
        {
            echo "<option selected value='" . $row->id . "'>" . $row->nom . " " . $row->prenom ."</option>";
;        }
        else
        {
            echo "<option value='" . $row->id . "'>" . $row->nom . " " . $row->prenom ."</option>";
        }

    }
echo "
    </select>

    <br><br>

    <button type='submit' name='visiteurSelectionne' class='btn btn-success col-md-2'>Valider</button>
    <div class=\"col-md-8\"></div>
    <button type='reset' class='btn btn-danger col-md-2'>Annuler</button>
</form>
</div>

    ";


?>