<?php
if(!estConnecte()){

?>
<div id="contenu">

    <div class="col-md-6 col-md-offset-3">

        <form method="POST" action="index.php?uc=connexion&action=valideConnexion" class="form-horizontal">

            <div class="form-group">
                <label for="nom" class="sr-only">Login*</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                    <input class="form-control" id="login" type="text" name="login" size="30" maxlength="45" placeholder="Login" required>
                </div>
            </div>

            <div class="form-group">
                <label for="mdp" class="sr-only">Mot de passe*</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                    <input class="form-control" id="mdp" type="password" name="mdp" size="30" maxlength="45" placeholder="Mot de passe" required>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" value="Valider" name="valider" class="btn btn-success col-md-2">
                <div class="col-md-8"></div>
                <input type="reset" value="Annuler" name="annuler" class="btn btn-danger col-md-2">
            </div>

        </form>

    </div>

</div>

<?php
}
else
{
    ?>
    <div id="contenu">
        <div class="alert alert-warning text-center"><i class="glyphicon glyphicon-chevron-up"></i>&nbsp;Choisissez une action dans la barre ci-dessus&nbsp;<i class="glyphicon glyphicon-chevron-up"></i></div>
    </div>
    <?php
}
?>