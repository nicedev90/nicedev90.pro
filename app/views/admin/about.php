<?php require APPROOT . '/views/' . $data['controller'] . '/partials/header.php'; ?>
<?php require APPROOT . '/views/' . $data['controller'] . '/partials/navbar.php'; ?>

	<div class="grid md:grid-cols-3 gap-4  p-2 md:px-16 my-2 mx-auto ">
	<?php foreach($data['authors'] as $author): ?>

		<div class="bg-neutral px-2 py-4 md:p-4 md:rounded-none rounded-lg space-y-4">

			<div class="flex justify-between px-2 md:px-5 items-center">
				<div class="text-2xl md:text-xl font-bold  text-white"><?= $author->nombre ?></div>
			</div>

			<div class="flex justify-between px-2 md:px-5 items-center">
				<div class="w-full text-center font-bold tracking-wider rounded text-ctaLight bg-dark p-2"><?= $author->funcion ?></div>
			</div>

			<div class="flex justify-between px-2 md:px-5 items-center">
				<p class="text-white"><?= utf8_encode($author->presentacion) ?></p>
			</div>

		</div>

	<?php endforeach; ?>
	</div>


<?php require APPROOT . '/views/' . $data['controller'] . '/partials/footer.php'; ?>