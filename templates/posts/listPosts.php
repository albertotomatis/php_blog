   <div class="page-body" style="margin-bottom: 25px;">
     <div class="container-xl">
       <!-- Cerca -->
       <h2 style="margin-bottom: 10px;">Cerca per titolo</h2>
       <form action="" method="post" style="margin-bottom: 25px;">
         <div class="input-group mb-2 w-20">
           <input type="text" name="search" class="form-control " placeholder="Search for…">
           <input class="btn btn-blue" type="submit">
         </div>
       </form>
       <!-- Categorie -->
       <h2 style="margin-bottom: 10px;">Categorie</h2>
       <a href="index.php?route=post/list" class="btn btn-blue w-30" style="margin: 5px;">tutte</a>
       <?php foreach ($categories as $category) : ?>
         <a href="index.php?route=post/list&category=<?= $category->id ?>" class="btn btn-blue w-20" style="margin: 5px;"><?= $category->name ?></a>
       <?php endforeach; ?>
       <!-- Post -->
       <h2 style="margin-top: 25px;">Post</h2>
       <div class="row row-cards">
         <?php if ($posts) : ?>
           <?php foreach ($posts as $post) : ?>
             <div class="col-md-6 col-xl-4">
               <div class="row row-cards">
                 <div class="col-12">
                   <div class="card">
                     <div class="card-img-top img-responsive img-responsive-16by9" style="background-image: url(<?= $post->image ?>)"></div>
                     <div class="card-body">
                       <h3 class="card-title"><?= $post->title ?></h3>
                       <a href="index.php?route=post/singlepost&id=<?= $post->id; ?>" class="btn btn-azure w-100">Leggi</a>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           <?php endforeach; ?>
         <?php else : ?>
           <h4>Non ci sono post da mostrare</h4>
         <?php endif; ?>
       </div>
       <!-- Mostra la paginazione solo se ci sono più di 6 post -->
       <?php if ($totalPosts > 6) : ?>
         <!-- paginazione  -->
         <p style="margin-top: 20px; font-weight: 500;">Select page:
           <?php
            $numPages = ceil($totalPosts / 6);
            for ($i = 1; $i <= $numPages; $i++) :
              if ($i == $currentPage) :
            ?>
               <a href="index.php?route=post/list&page=<?= $i - 1 ?><?= !empty($categoryId) ? '&category=' . $categoryId : '' ?>"></a>
             <?php else : ?>
               <a href="index.php?route=post/list&page=<?= $i ?><?= !empty($categoryId) ? '&category=' . $categoryId : '' ?>"><?= $i ?></a>
             <?php endif; ?>
           <?php endfor; ?>
         </p>
       <?php endif; ?>
       <br>
     </div>
   </div>
   <br>