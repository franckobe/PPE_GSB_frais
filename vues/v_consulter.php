<div id="contenu">
<?php
    echo "<h3>Fiche de frais du mois ".$numMois."-".$numAnnee." de ".$leVisiteur['prenom']." ".$leVisiteur['nom']." :</h3>";
?>

    <form action="index.php?uc=validerFrais&action=selectionVis" method="post" class='form-horizontal padding-lat'>
        <p>
            Etat : <?php echo "<span class='bold'>".$libEtat."</span>" ?> depuis le <?php echo $dateModif ?> <br> Montant validé
            : <?php
            echo /*$montantValide*/ "<span class='bold'>".$pdo->getMontantValide($idVisiteur, $mois)." €</span>" ?>


        </p>
        <fieldset>
            <legend>Eléments forfaitisés</legend>

        <table class="table table-bordered">
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $libelle = $unFraisForfait['libelle'];
                    ?>
                    <th> <?php echo $libelle ?></th>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $quantite = $unFraisForfait['quantite'];
                    $idFrais = $unFraisForfait['idfrais']
                    ?>
                    <td class="qteForfait"><input class="form-control" name="lesFrais[<?php echo $idFrais ?>]" type="text" value="<?php echo $quantite ?>"/> </td>
                    <?php
                }
                ?>
            </tr>
        </table>
        <legend>Descriptif des éléments hors forfait - <?php echo "<span class='bold'>".$pdo->getNbTotJustificatifs($idVisiteur, $mois)."</span>" ?> justificatifs reçus</legend>
        <?php
        if($lesFraisHorsForfait == null)
        {
            echo "<div class='alert alert-warning'>Il n'y a aucun frais hors forfait pour ce mois !</div>";
        }
        else
        {
        ?>

            <table class="table table-bordered">
                <tr>
                    <th>Date</th>
                    <th>Libellé</th>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th>Action</th>
                    <th>Justificatif</th>
                </tr>
                <?php

                $class = "";

                foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                    $date = $unFraisHorsForfait['date'];
                    $libelle = $unFraisHorsForfait['libelle'];
                    $montant = $unFraisHorsForfait['montant'];
                    $id = $unFraisHorsForfait['id'];
                    $nbJustificatifs = $unFraisHorsForfait['justificatif'];
                    $statut = $unFraisHorsForfait['statut'];
                    $libelleStatutFraisHorsForfait = $pdo->getLibelleStatutFraisHorsForfait($statut)['libelle'];
                    if($statut == "RE") $class = "text-danger";
                    else if($statut == "AC") $class = "text-success";
                    else $class = "text-warning";
                    ?>
                    <tr>
                        <td><?php echo $date ?></td>
                        <td><?php echo $libelle ?></td>
                        <td><?php echo $montant ?></td>
                        <td class="<?php echo $class?> bold"><?php echo $libelleStatutFraisHorsForfait?></td>
                        <td class="text-center">
                            <?php
                                if ($statut==null || $statut=="AT") echo "
                                    <a class='btn btn-success' href=\"index.php?uc=validerFrais&action=accepterFraisHorsForfait&idFrais=$id&libelle=$libelle&moisFrais=$numAnnee$numMois&idVisiteur=$idVisiteur\"
                                         onclick=\"return confirm('Voulez-vous vraiment accepter ce frais?');\">Accepter</a>
                                    <a class='btn btn-danger' href=\"index.php?uc=validerFrais&action=refuserFraisHorsForfait&idFrais=$id&libelle=$libelle&moisFrais=$numAnnee$numMois&idVisiteur=$idVisiteur\"
                                         onclick=\"return confirm('Voulez-vous vraiment refuser ce frais?');\">Refuser</a>";
                                else if ($statut == "RE") echo "
                                    <a class='btn btn-success' href=\"index.php?uc=validerFrais&action=accepterFraisHorsForfait&idFrais=$id&libelle=$libelle&moisFrais=$numAnnee$numMois&idVisiteur=$idVisiteur\"
                                         onclick=\"return confirm('Voulez-vous vraiment accepter ce frais?');\">Accepter</a>";
                                else echo "
                                    <a class='btn btn-danger' href=\"index.php?uc=validerFrais&action=refuserFraisHorsForfait&idFrais=$id&libelle=$libelle&moisFrais=$numAnnee$numMois&idVisiteur=$idVisiteur\"
                                         onclick=\"return confirm('Voulez-vous vraiment refuser ce frais?');\">Refuser</a>
                                         ";
                            ?>
                        </td>
                        <td class="text-center">
                            <?php if ($nbJustificatifs == 0)
                            {
                                echo "
                                    <span class='text-danger bold'>Aucun </span>
                                    <a href=\"index.php?uc=validerFrais&action=ajouterJustificatif&idFrais=$id&moisFrais=$numAnnee$numMois&idVisiteur=$idVisiteur\" title='Ajouter un justificatif' class='text-success'>
                                        &nbsp;&nbsp;<i class='glyphicon glyphicon-plus'></i>
                                    </a>
                                ";
                            }
                            else
                            {
                                echo "
                                    <span class='text-success bold'>Reçu </span>
                                    <a href=\"index.php?uc=validerFrais&action=supprimerJustificatif&idFrais=$id&moisFrais=$numAnnee$numMois&idVisiteur=$idVisiteur\" title='Supprimer un justificatif' class='text-danger'>
                                        &nbsp;&nbsp;<i class='glyphicon glyphicon-minus'></i>
                                    </a>
                                ";
                            }
                            ?>

                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        <?php
        }
        ?>

        <table class="table table-bordered">
            <tr>
                <th>Etat de la fiche du mois</th>
            </tr>
            <tr>
                <td>
                    <select class="form-control" name="etatFrais">
                        <option hidden value="<?php echo $idEtat ?>"><?php echo $libEtat ?></option>
                        <?php foreach($etatFrais as $etatFiche){?>
                            <option value="<?php echo $etatFiche['id'] ?>"><?php echo $etatFiche['libelle'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        </table>

        </fieldset>

        <input type="hidden" value="<?php echo $numAnnee.$numMois ?>" name="moisFrais">
        <input type="hidden" value="<?php echo $idVisiteur ?>" name="idVisiteur">

        <div class="form-group padding-lat">
            <input class="btn btn-success" name="ok" id="ok" type="submit" value="Mettre à jour la fiche"
                   onclick="return confirm('Voulez-vous vraiment valider les modifications de cette fiche ?')"/>
        </div>
    </form>
</div>



