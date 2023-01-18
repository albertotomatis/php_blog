<div class="page-body" style="margin-bottom: 25px;">
    <div class="container-xl">
        <!-- Torna alla dashboard -->
        <h2 style="margin-bottom: 20px;"><a href="index.php?route=post/dashboard" class="btn btn-blue w-30">
                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="15 6 9 12 15 18" />
                </svg> Torna alla dashboard</a></h2>
        <!-- nuovo post -->
        <div class="row row-cards">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color: #0f66c5; font-weight: 500;">Nuovo Post</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <div class="form-label">Immagine</div>
                                <input type="file" class="form-control" name="file" required>
                            </div>

                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Titolo</label>
                                <div class="col">
                                    <input type="text" class="form-control" name="post[title]" id="title">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Testo del post</label>
                                <textarea class="form-control" name="post[testo]" cols="100" rows="5" placeholder="Content..">
                            </textarea>
                            </div>


                            <div class="col">
                                <div class="mb-3">
                                    <div class="form-label">Seleziona Categoria</div>
                                    <div>
                                    <?php foreach ($categories as $category) : ?>
                                                <label class="form-check form-check-inline">
                                                    <?php if ($post && $post->hasCategory($category->id)) : ?>
                                                        <input class="form-check-input" type="checkbox" checked name="category[]" value="<?= $category->id ?>">
                                                    <?php else : ?>
                                                        <input class="form-check-input" type="checkbox" name="category[]" value="<?= $category->id ?>">
                                                    <?php endif; ?>
                                                    <span class="form-check-label"><?= $category->name ?></span>
                                                </label>
                                            <?php endforeach; ?>
                                    </div>


                                    <div class="form-footer">
                                        <input type="submit" class="submit btn btn-azure" name="submit" value="Aggiungi post">
                                    </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<br><br>