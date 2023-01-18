<div class="page-body">
    <div class="container-xl">
                <!-- Torna ai post -->
                <h2><a href="index.php?route=post/list" class="btn btn-blue w-30">
                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="15 6 9 12 15 18" />
                        </svg> Torna ai post</a></h2>
                <!-- Post singolo -->        
                <div class="row row-cards" style="margin-top: 10px;">
                    <div class="col-8">
                        <div class="row row-cards" style="margin-bottom: 50px;">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-img-top img-responsive img-responsive-16by9" style="background-image: url(<?= $post->image ?>)"></div>
                                    <div class="card-body">
                                        <h2 class="card-title"><?= $post->title ?></h2>
                                        <p><?= $post->testo ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



