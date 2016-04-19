<div class="alert alert-danger margin-lat">
    <ul>
        <?php
        foreach ($_REQUEST['erreurs'] as $erreur) {
            echo "<li>$erreur</li>";
        }
        ?>
    </ul>
</div>
