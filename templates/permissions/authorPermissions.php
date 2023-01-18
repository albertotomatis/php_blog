<div class="page-body" style="margin-bottom: 25px;">
	<div class="container-xl">
		<!-- Torna alla dashboard -->
		<h2 style="margin-bottom: 20px;"><a href="index.php?route=post/dashboard" class="btn btn-blue w-30">
				<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
					<path stroke="none" d="M0 0h24v24H0z" fill="none" />
					<polyline points="15 6 9 12 15 18" />
				</svg> Torna alla dashboard</a></h2>
		<!-- modifica permessi -->
		<h2>Modifica i permessi di <span style="color: #0c50ab; text-transform: uppercase;"><?= $author->name ?></span></h2>
		<form action="" method="post">
			<h3>Post - Permessi</h3>
			<?php foreach ($postsPermissions as $name => $value) : ?>
				<div>
					<input name="postsPermissions[]" type="checkbox" value="<?= $value ?>" <?php if ($author->hasPermission($value)) echo 'checked'; ?> />
					<label><?= ucwords(strtolower(str_replace('_', ' ', $name))) ?>
				</div>
			<?php endforeach; ?>
			<br>
			<h3>Categorie - Permessi</h3>
			<?php foreach ($categoriesPermissions as $name => $value) : ?>
				<div>
					<input name="categoriesPermissions[]" type="checkbox" value="<?= $value ?>" <?php if ($author->hasPermission($value)) echo 'checked'; ?> />
					<label><?= ucwords(strtolower(str_replace('_', ' ', $name))) ?>
				</div>
			<?php endforeach; ?>
			<br>
			<h3>Autori - Permessi</h3>
			<?php foreach ($userPermissions as $name => $value) : ?>
				<div>
					<input name="userPermissions[]" type="checkbox" value="<?= $value ?>" <?php if ($author->hasPermission($value)) echo 'checked'; ?> />
					<label><?= ucwords(strtolower(str_replace('_', ' ', $name))) ?>
				</div>
			<?php endforeach; ?>
			<br>
			<input type="submit" value="Submit" class="btn btn-azure w-20" />
		</form>

	</div>
</div>