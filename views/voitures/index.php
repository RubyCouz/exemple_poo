<div class="container">
    <h1>Accueil</h1>

    <?php
    foreach ($voitures as $voiture) {
        ?>
        <p>
            <a href="/voitures/getOneCar/<?= $voiture->id ?>"> <?= $voiture->id ?></a>

        </p>
        <?php
    }
    ?>
</div>
