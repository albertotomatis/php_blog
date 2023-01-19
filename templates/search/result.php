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

                                                <?php if ($user) : ?>
                                        <!-- modifica ed elimina -->
                                        <div class="d-flex font-weight: 400;">
                                            <!-- modifica -->
                                            <?php if ($user->id === $post->authorid || $user->hasPermission(Author::POST_PERMISSIONS['EDIT_POST'])) : ?>
                                                <a href="index.php?route=post/edit&id=<?= $post->id; ?>" class="card-btn">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/pencil -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                                                    </svg>
                                                    Modifica</a>
                                            <?php endif; ?>
                                            <!-- elimina -->
                                            <?php if ($user->id === $post->authorid || $user->hasPermission(Author::POST_PERMISSIONS['DELETE_POST'])) : ?>
                                              <form action="index.php?route=post/delete" method="POST" class="card-btn">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/trash -->
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <line x1="4" y1="7" x2="20" y2="7" />
                                                        <line x1="10" y1="11" x2="10" y2="17" />
                                                        <line x1="14" y1="11" x2="14" y2="17" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                <input type="hidden" name="id" value="<?= $post->id ?>">
                                                <input type="submit" value="Elimina" style="border: none; background: #fff;">
                                                </form> 
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>



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