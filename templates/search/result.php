<div class="page-body">
    <div class="container-xl">
        <div class="page-body">
            <div class="container-xl">
                <!-- utente loggato -->
                <?php if ($user) : ?>
                    <!-- Torna alla dashboard -->
                    <h2><a href="index.php?route=post/dashboard" class="btn btn-blue w-30">
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="15 6 9 12 15 18" />
                            </svg> Torna alla dashboard</a></h2>
                    <!-- utente non loggato -->
                <?php else : ?>
                    <h2><a href="index.php?route=post/list" class="btn btn-blue w-30">
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="15 6 9 12 15 18" />
                            </svg> Torna al blog</a></h2>
                <?php endif; ?>

                <h1 class="blog" style="margin-bottom: 10px; margin-top: 25px;">Result</h1>
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
                    <!-- Se NON ci sono post nel database -->
                    <?php if ($posts == false) : ?>
                        <h3>Nessuna corrispondenza trovata</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>