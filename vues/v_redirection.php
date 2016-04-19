<div id="contenu">
<?php
    if($type == 'vis')
    {
        ?>
        <div class="alert alert-success text-center">Connexion réussie !</div>
        <div class="text-center">
            <a class="btn btn-warning btn-lg bold" href="index.php?uc=gererFrais&action=saisirFrais">
                <i class="glyphicon glyphicon-chevron-right"></i>&nbsp;Accéder à mon espace visiteur&nbsp;<i class="glyphicon glyphicon-chevron-left"></i>
            </a>
        </div>


        <?php
    }
    if($type == 'com')
    {
        ?>
        <div class="alert alert-success text-center">Connexion réussie !</div>
        <div class="text-center">
            <a class="btn btn-warning btn-lg bold" href="index.php?uc=validerFrais&action=selectionVis">
                <i class="glyphicon glyphicon-chevron-right"></i>&nbsp;Accéder à mon espace comptable&nbsp;<i class="glyphicon glyphicon-chevron-left"></i>
            </a>
        </div>


        <?php
    }
?>
</div>
