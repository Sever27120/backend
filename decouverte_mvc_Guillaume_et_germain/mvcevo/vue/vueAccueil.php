<!-- 
La méthode ob_start est une méthode de mise en tampon. Ce tampon est récupéré 
dans $contenu après la fin de la boucle grâce à ob_get_clean(). LE rendu est alors 
déclenché avec l'appel du gabarit qui reprend les valeurs de $titre et de $contenu -->



<?php $titre = "Mon Blog"; ?>


<?php foreach ($billets as $billet) : ?>
    <article>
        <header>
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h1 class="titreBillet"><?php echo $billet['titre'] ?></h1>
            </a>
            <time><?php echo $billet['date'] ?><time>

        </header>

        <p><?php echo $billet['contenu'] ?></p>

    </article>
    <hr />

<?php endforeach; ?> 
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>