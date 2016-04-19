<div id="contenu">
    <h2 class="text-uppercase text-center">Renseigner ma fiche de frais du mois <?php echo $numMois . "-" . $numAnnee ?></h2>

    <form method="POST" action="index.php?uc=gererFrais&action=validerMajFraisForfait" class="form-horizontal">

        <fieldset>
            <legend>Nouvel élement forfaitisé</legend>
            <?php
            foreach ($lesFraisForfait as $unFrais) {
                $idFrais = $unFrais['idfrais'];
                $libelle = $unFrais['libelle'];
                $quantite = $unFrais['quantite'];
                ?>
                <div class="form-group">
                    <label class="control-label col-md-2" for="idFrais"><?php echo $libelle ?></label>
                    <div class="col-md-6">
                        <input class="form-control" type="text" id="idFrais" name="lesFrais[<?php echo $idFrais ?>]" size="10" maxlength="5" value="<?php echo $quantite ?>">
                    </div>
                </div>
                <?php
            }
            ?>
        </fieldset>

        <div class="form-group">
            <div class="col-md-2"></div>
            <input type="submit" value="Valider" name="valider" class="btn btn-success col-md-2">
            <div class="col-md-2"></div>
            <input type="reset" value="Annuler" name="annuler" class="btn btn-danger col-md-2">
        </div>

    </form>
  