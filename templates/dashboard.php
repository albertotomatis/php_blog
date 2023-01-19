<div class="page-body" style="margin-bottom: 25px;">
    <div class="container-xl">
        <h1>Hello <?= $user->name ?></h1>
        <a href="index.php?route=author/password" style="margin: 5px;">Modifica Password</a>
        <br><br>
        <ul style="list-style:none;display:flex;flex-direction:row;">
            <?php if ($user->id && $user->hasPermission(Author::POST_PERMISSIONS['ADD_POST'])) : ?>
                <li><a class="btn btn-blue w-20" style="margin: 5px;" href="index.php?route=post/add">Nuovo post</a></li>
                <li><a  class="btn btn-blue w-20" style="margin: 5px;"href="index.php?route=post/yourposts">I tuoi post</a></li>
            <?php endif; ?>
            <?php if ($user->id && $user->hasPermission(Author::CATEGORIES_PERMISSIONS['ADD_CATEGORIES'])) : ?>
                <li><a class="btn btn-blue w-20" style="margin: 5px;" href="index.php?route=category/list">Categorie</a></li>
            <?php endif; ?>
            <?php if ($user->id && $user->hasPermission(Author::USER_MANAGE['EDIT_USER_ACCESS'])) : ?>
                <li><a class="btn btn-blue w-20" style="margin: 5px;" href="index.php?route=author/list">Gestisci autori e post</a></li>
            <?php endif; ?>
        </ul>
         </div>
       </div>
      