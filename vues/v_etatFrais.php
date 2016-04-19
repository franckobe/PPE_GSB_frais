
    <div class="row"><div class="col-md-12 ">
        <h3>Fiche de frais du mois <?php echo $numMois . "-" . $numAnnee ?> :</h3>
        <p>
            Etat : <?php echo "<span class='bold'>".$libEtat."</span>" ?> depuis le <?php echo $dateModif ?> <br> Montant validé
            : <?php echo /*$montantValide*/ "<span class='bold'>".$pdo->getMontantValide($idVisiteur, $mois)." €</span>";?>


        </p>
        <table class="table table-bordered">
            <legend>Eléments forfaitisés</legend>
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
                    ?>
                    <td class="qteForfait"><?php echo $quantite ?> </td>
                    <?php
                }
                ?>
            </tr>
        </table>
        <?php
        if($lesFraisHorsForfait == null)
        {
            echo "<div class='alert alert-warning'>Il n'y a aucun frais hors forfait pour la fiche en cours !</div>";
        }
        else
        {
        ?>
        <table class="table table-bordered">
            <legend>Descriptif des éléments hors forfait - <?php echo "<span class='bold'>".$pdo->getNbTotJustificatifs($idVisiteur, $mois)."</span>" ?> justificatifs reçus -</legend>
            <tr>
                <th>Date</th>
                <th>Libellé</th>
                <th>Montant</th>
                <th>Statut</th>
            </tr>
            <?php
            foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                $date = $unFraisHorsForfait['date'];
                $libelle = $unFraisHorsForfait['libelle'];
                $montant = $unFraisHorsForfait['montant'];
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
                    <td class="<?php echo $class?> bold"><?php echo $libelleStatutFraisHorsForfait ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
        }
        ?>
    </div>
</div>














