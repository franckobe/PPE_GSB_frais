<table class="table-bordered table text-center">
    <legend>Descriptif des éléments hors forfait</legend>
    <?php
    if($lesFraisHorsForfait == null)
    {
        echo "<div class='alert alert-warning'>Il n'y a aucun frais hors forfait pour la fiche en cours !</div>";
    }
    else
    {
    ?>
        <tr>
            <th>Date</th>
            <th>Libellé</th>
            <th>Montant</th>
            <th>Action</th>
        </tr>

        <?php
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $libelle = $unFraisHorsForfait['libelle'];
            $date = $unFraisHorsForfait['date'];
            $montant = $unFraisHorsForfait['montant'];
            $id = $unFraisHorsForfait['id'];
            ?>
            <tr>
                <td> <?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <td>
                    <a class="btn btn-sm btn-danger" href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>"
                       onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer ce frais</a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<form action="index.php?uc=gererFrais&action=validerCreationFrais" method="post" class="form-horizontal">

    <fieldset>
        <legend>Nouvel élément hors forfait</legend>

        <div class="form-group">
            <label class="control-label col-md-2" for="txtDateHF">Date </label>
            <div class="col-md-6">
                <input class="form-control" type="text" id="txtDateHF" name="dateFrais" size="10" maxlength="10" value=""/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="txtLibelleHF">Libellé </label>
            <div class="col-md-6">
                <input class="form-control" type="text" id="txtLibelleHF" name="libelle" size="70" maxlength="256" value=""/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="txtMontantHF">Montant </label>
            <div class="col-md-6">
                <input class="form-control" type="text" id="txtMontantHF" name="montant" size="10" maxlength="10" value=""/>
            </div>

        </div>

    </fieldset>

    <div class="form-group">
        <div class="col-md-2"></div>
        <input class="btn btn-success col-md-2" id="ajouter" type="submit" value="Ajouter" size="20"/>
        <div class="col-md-2"></div>
        <input class="btn btn-danger col-md-2" id="effacer" type="reset" value="Effacer" size="20"/>
    </div>

</form>
</div>
  

