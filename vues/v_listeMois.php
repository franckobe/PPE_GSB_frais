<div id="contenu">

    <div class="row">
        <form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post" class="form-horizontal col-md-12">
            <fieldset>
                <legend>Mes fiches de frais</legend>

                <p>

                    <label class="control-label" for="lstMois" accesskey="n">Mois : </label>
                    <select id="lstMois" name="lstMois" class="form-control">
                        <?php
                        foreach ($lesMois as $unMois) {
                            $mois = $unMois['mois'];
                            $numAnnee = $unMois['numAnnee'];
                            $numMois = $unMois['numMois'];
                            if ($mois == $moisASelectionner) {
                                ?>
                                <option selected
                                        value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                                <?php
                            } else { ?>
                                <option value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                                <?php
                            }

                        }

                        ?>

                    </select>
                </p>
            </fieldset>
            <div class="piedForm">
                <p>
                    <input class="btn btn-success col-md-2" id="ok" type="submit" value="Valider" size="20"/>
                <div class="col-md-8"></div>
                <input class="btn btn-danger col-md-2" id="annuler" type="reset" value="Effacer" size="20"/>
                </p>
            </div>
        </form>
    </div>