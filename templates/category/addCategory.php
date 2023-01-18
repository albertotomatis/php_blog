<div class="page-body" style="margin-bottom: 25px;">
     <div class="container-xl">
        <!-- Torna alla dashboard -->
        <h2 style="margin-bottom: 20px;"><a href="index.php?route=post/dashboard" class="btn btn-blue w-30">
                <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <polyline points="15 6 9 12 15 18" />
                </svg> Torna alla dashboard</a></h2>
<form action="" method="post">
    <input type="hidden" name="category" value="">
    <label for="categoryname">Categoria:<br></label>
    <input type="text" name="category[name]" id="categoryname" value="<?= $category->name ?? '' ?>">
    <input type="submit" name="submit" value="Aggiungi" class="btn btn-sm btn-azure w-20">
</form>
</div>
</div>