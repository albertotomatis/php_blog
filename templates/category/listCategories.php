<div class="page-body" style="margin-bottom: 25px;">
    <div class="container-xl">

        <!-- Torna alla dashboard -->
        <h2><a href="index.php?route=post/dashboard" class="btn btn-blue w-30">
                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="15 6 9 12 15 18" />
                </svg> Torna alla dashboard</a></h2>

        <!-- categorie -->
        <h2 style="margin-top: 10px;">Categorie</h2>
        <h3 style="margin-bottom: 20px;margin-top: 10px;"><a href="index.php?route=category/add" class="btn btn-sm btn-teal w-30">Add a new category</a></h3>

        <!-- tabella categorie -->
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr style="font-weight: 500;">
                    <th scope="col">Categoria</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Elimina</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td style="font-weight: 500;"><?= htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td> 
                            <a class="btn btn-sm btn-orange w-20" href="index.php?route=category/edit&id=<?= $category->id ?>">Modifica</a>
                        </td>
                        <td>
                            <form action="index.php?route=category/delete" method="POST">
                                <input type="hidden" name="id" value="<?= $category->id ?>">
                                <input type="submit" value="Elimina" class="btn btn-sm btn-red w-20">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>

    </div>
</div>