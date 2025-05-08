<main>
    <section class="section-container">
        <article class="film-container">
            <div class="title-container">
                <h2>La próxima película de Marvel</h2>
            </div>
            <div class="image-container">
                <img class="img" src="<?= $poster_url ?>" alt="Poster de <?= $title ?>" />
            </div>
            <div class="footer-image-container">
                <h2><?= $title ?> <?= $untilMessage ?> </h2>
                <p>Fecha de estreno : <?= $release_date ?> </p>
            </div>
        </article>

        <article class="film-container">
            <div class="title-container">
                <h2>La siguiente es : </h2>
            </div>
            <div class="image-container">
                <img class="img" src="<?= $following_production["poster_url"] ?>" alt="Poster de <?= $following_production["title"] ?>" />
            </div>
            <div class="footer-image-container">
                <h2> <?= $following_production["title"] ?> </h2>
                <p>Fecha de estreno : <?= $following_production["release_date"] ?> </p>
            </div>
        </article>
    </section>
</main>