<?php require APPROOT . '/views/' . $data['controller'] . '/partials/header.php'; ?>
<?php require APPROOT . '/views/' . $data['controller'] . '/partials/navbar.php'; ?>


	<?php foreach($data['comics'] as $comic): ?>

	<div class="flex flex-col md:flex-row p-2 md:px-16 my-2 mx-auto ">

		<div id="col-izq" class="bg-neutral px-2 py-4 md:my-4 md:p-4 md:rounded-none rounded-lg space-y-4 md:space-y-8 md:w-1/2">

			<div class="flex justify-between px-2 md:px-5 items-center">
				<div class="text-4xl md:text-6xl font-bold  text-white"><?= $comic->nombre ?></div>

				<div class="w-1/4 text-center font-bold tracking-wider rounded text-ctaLight bg-dark p-2"><?= $comic->genero ?></div>
			</div>

			<div class="flex justify-between px-2 md:px-5 items-center">
				<button class="text-xl bg-ctaLight tracking-wider font-bold rounded-full text-dark p-2"><?= $comic->estado ?><button>
			</div>

			<div class="flex md:hidden justify-between px-2 md:px-5 items-center">
				<img src="<?= URLROOT . '/' . $comic->portada ?>" alt="<?= utf8_encode($comic->nombre) ?>" alt="imagen logo" class="object-cover w-screen">
			</div>

			<div class="flex justify-between px-2 md:px-5 items-center">
				<p class="text-white"><?= utf8_encode($comic->descripcion) ?></p>
			</div>

			<div class="flex justify-between px-2 md:px-5 items-center">
				<a class="w-full text-center text-2xl bg-ctaDark text-white font-bold rounded-xl hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 p-4" href="<?php echo URLROOT . '/' . $data['controller'] . '/galeria/' . str_replace(" ","_",$comic->nombre) ?>"> 
					Ver los capitulos <i class="fas fa-chevron-right ml-4"></i>
				</a>
			</div>


			<div class="flex justify-between px-2 md:px-5 items-center pt-16">
				<div class="p-1 w-full bg-white text-2xl whitespace-normal text-ellipsis">
					<span class="tracking-wider font-bold text-dark p-2">Ficha Tecnica<span>
				</div>
			</div>

			<div class="flex flex-col px-2 md:px-5 space-y-1">
				<div class="flex bg-white text-dark">
					<div class="w-1/3 flex-col p-3">
						<p>Tíulo Original</p>
					</div>
					<div class="w-2/3 flex-col p-3 font-bold border-neutral border-l-4 ">
						<p><?= $comic->nombre ?></p>
					</div>
				</div>

				<div class="flex bg-white text-dark">
					<div class="w-1/3 flex-col p-3">
						<p>Autores</p>
					</div>
					<div class="w-2/3 flex-col p-3 font-bold border-neutral border-l-4 ">
						<p><?= $comic->autor ?></p>
					</div>
				</div>

				<div class="flex bg-white text-dark">
					<div class="w-1/3 flex-col p-3">
						<p>Formato</p>
					</div>
					<div class="w-2/3 flex-col p-3 font-bold border-neutral border-l-4 ">
						<p><?= explode(' ',$comic->formato)[0] ?></p>
					</div>
				</div>

				<div class="flex bg-white text-dark">
					<div class="w-1/3 flex-col p-3">
						<p>Tamaño</p>
					</div>
					<div class="w-2/3 flex-col p-3 font-bold border-neutral border-l-4 ">
						<p><?= explode(' ',$comic->formato)[1] ?></p>
					</div>
				</div>

			</div>
			
		</div>

		<div id="col-der" class="hidden md:block p-2 md:p-4 md:w-1/2">
			<img src="<?= URLROOT . '/' . $comic->portada ?>" alt="<?= utf8_encode($comic->nombre) ?>" class="object-cover w-screen">
		</div>

	</div>

	<?php endforeach; ?>


<?php require APPROOT . '/views/' . $data['controller'] . '/partials/footer.php'; ?>