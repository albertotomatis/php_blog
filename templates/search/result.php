<div class="page-body">
    <div class="container-xl">
        <div class="page-body">
            <div class="container-xl">
                <h1 class="blog" style="margin-bottom: 10px;">Result</h1>
                <div class="row row-cards" style="margin-top: 10px;">
                    <?php if ($posts == true) : ?>
                        <?php foreach ($posts as $post) : ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="row row-cards">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-img-top img-responsive img-responsive-16by9" style="background-image: url(<?= $post->image ?>)"></div>
                                            <div class="card-body">
                                                <h3 class="card-title"><?= $post->title ?></h3>
                                                <a href="index.php?route=post/singlepost&id=<?= $post->id; ?>" class="btn btn-azure w-100">
                                                    Leggi di +
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- Se NON ci sono ricette nel database -->
                    <?php if ($posts == false) : ?>
                        <h3>Nessuna corrispondenza trovata</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>