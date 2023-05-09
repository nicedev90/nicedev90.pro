<?php require APPROOT . '/views/' . $data['controller'] . '/partials/header.php'; ?>
<?php require APPROOT . '/views/' . $data['controller'] . '/partials/navbar.php'; ?>


<?php if (isset($data['paidChapters'])) : ?>

	<div class="flex flex-col md:flex-row w-full md:px-16 px-2 py-4">

		<div class="w-full bg-neutral flex flex-col">
			<div class="flex px-2 items-center pt-4">
				<div class="flex justify-center space-x-8 items-center w-full bg-primaryDark text-2xl">
					<p class="tracking-wider font-bold text-white p-2"> Biblioteca <p>
				</div>
			</div>

			<div class="grid md:grid-cols-3 gap-2 px-2 my-4 mx-auto ">
			<?php foreach($data['paidChapters'] as $chapter): ?>

				<div class="flex flex-col bg-neutralDark py-4 px-2 mt-2 space-y-4 ">

					<div class="flex justify-between px-4 items-center">
						<div class="text-2xl md:text-xl font-bold  text-center text-white"><?= $chapter->titulo ?></div>
					</div>

					<div class="flex justify-between items-center">
						<div class="w-full text-center rounded px-2">
							<img src="<?= URLROOT . '/' . $chapter->portada ?>" alt="<?= $chapter->subtitulo ?>" alt="imagen logo" class="object-content">	
						</div>
					</div>

					<div class="flex justify-between  px-2 items-center">
						<a href="<?php echo URLROOT . '/' . $data['controller'] . '/' .  $data['page'] . '/' .  str_replace(" ","_",$data['comic']->nombre) . '/' . str_replace(" ","_",$chapter->titulo) ?>" class="w-full text-xl p-2 text-center font-bold tracking-wider rounded text-white bg-ctaDark hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 ">
							Leer <i class="fas fa-chevron-right ml-4"></i>
						</a>
					</div>

				</div>

			<?php endforeach; ?>
			</div>

		</div>
	</div>


<?php endif; ?>



<?php if (isset($data['chapter'])) : ?>

	<div class="flex md:p-4 md:w-[900px] w-screen mx-auto">

		<div class="relative flex w-full overflow-hidden bg-neutralLight md:h-[1400px] h-[760px] ">

			<button id="prev" class="z-20 absolute self-center h-max rounded-lg p-3 text-dark bg-cta opacity-20 hover:opacity-90 text-4xl font-bold">
		  	<i class="fas fa-chevron-left ml-2"></i>
		  </button>

  		<?php $total = $data['chapter']->paginas; ?>
			<?php for ($i = 1; $i < $total+1; $i++) : ?>
				<div class="slide absolute">
					<div class="flex flex-col items-center">
						
				  	<div class="flex flex-col md:flex-row w-full p-4 justify-between text-xl">
							<button class="w-full mx-auto md:w-1/2 p-2 rounded-xl bg-cta text-dark font-bold"><?php echo $data['chapter']->titulo . ' :  Pag. ' . $i . ' de ' . $total ?></button>
						</div>  
						
					  <img src="<?php echo URLROOT . '/img/files/capitulo_' . $data['chapter']->cap_num . '/' . $i . '.png' ?>" alt="<?php echo utf8_encode($data['chapter']->subtitulo) ?>" class="object-cover md:w-[900px]">

					  <div class="flex flex-col md:flex-row w-full p-4 justify-between text-xl">
							<a href="<?php echo URLROOT . '/' . $data['controller'] . '/' .  $data['page']  . '/' . $data['project_name'] ?> " class="w-full md:w-1/2 p-2 rounded-xl bg-cta text-dark font-bold mx-auto"><i class="fas fa-arrow-left mr-4 px"></i> Volver a la Biblioteca</a >
						</div>  

				  </div>
				</div>
			<?php endfor; ?>

			<button id="next" class="z-20 right-0 absolute self-center rounded-lg p-3 text-dark bg-cta opacity-20 hover:opacity-90 text-4xl font-bold">
				<i class="fas fa-chevron-right ml-2"></i>
			</button>

		</div>

	</div>

<?php endif; ?>

<script src="<?php echo URLROOT; ?>/js/carousel.js"></script>

<?php require APPROOT . '/views/' . $data['controller'] . '/partials/footer.php'; ?>