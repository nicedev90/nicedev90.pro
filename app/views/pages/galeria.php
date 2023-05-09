<?php require APPROOT . '/views/' . $data['controller'] . '/partials/header.php'; ?>
<?php require APPROOT . '/views/' . $data['controller'] . '/partials/navbar.php'; ?>


<?php if (isset($data['chapters'])) : ?>

	<div class="flex flex-col md:flex-row w-full md:px-16 px-2 py-4">

		<div class="md:w-1/3 flex flex-col bg-neutral ">

			<div class="flex justify-between items-center pt-4">
				<div class="relative">
					<div class="h-12 w-96 bg-white text-2xl skew-y-5 whitespace-normal">
						<button class="tracking-wider font-bold text-dark p-2">Próximos Capitulos<button>
					</div>
				</div>
			</div>

			<div class="flex flex-col justify-between space-y-4 p-2 text-white">

				<?php foreach($data['upcoming'] as $chapter): ?>
					<div class="flex flex-col bg-neutralDark py-4 px-2 md:w-3/4 mt-2 space-y-4 ">

						<div class="flex justify-between px-4 items-center">
							<div class="text-2xl md:text-xl font-bold  text-center  text-white"><?= $chapter->titulo ?></div>
						</div>

						<div class="flex justify-between items-center">
							<div class="w-full text-center rounded px-2">
								<img src="<?= URLROOT . '/' . $chapter->portada ?>" alt="<?= $chapter->subtitulo ?>" class="object-content">
							</div>
						</div>

						<div class="flex justify-between  px-2 items-center">
							<a href="<?php echo URLROOT . '/' . $data['controller'] . '/' .  $data['page'] . '/' .  str_replace(" ","_",$data['comic']->nombre) . '/' . str_replace(" ","_",$chapter->titulo) ?>" class="w-full text-xl p-2 text-center font-bold tracking-wider rounded text-white bg-ctaDark hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 ">
								Leer <i class="fas fa-chevron-right ml-4"></i>
							</a>
						</div>

					</div>

				<?php endforeach; ?>



			<div class="flex flex-col bg-neutralDark w-full md:w-3/4 p-2 mx-auto md:mx-0 justify-between space-y-4 items-center text-white">
				<a href="<?php echo URLROOT; ?>/pages/register" class="w-fit cursor-pointer p-2 text-2xl border-cta border-b-2 hover:text-cta">Registrate</a>
				<p >Para recibir notificaciones de los nuevos lanzamientos</p>
			</div>

			</div>

		</div>


		<div class="md:w-2/3 bg-neutral flex flex-col">

			<div class="flex justify-between items-center pt-4">
				<div class="relative">
					<div class="h-12 w-96 bg-white text-2xl skew-y-5 whitespace-normal">
						<button class="tracking-wider font-bold text-dark p-2">Capítulos Publicados<button>
					</div>
				</div>
			</div>

			<div class="grid md:grid-cols-3 gap-2 px-2 my-4 mx-auto ">
			<?php foreach($data['chapters'] as $chapter): ?>

					<div class="flex flex-col bg-neutralDark py-4 px-2 mt-2 space-y-4 ">

						<div class="flex justify-between px-4 items-center">
							<div class="text-2xl md:text-xl font-bold  text-center text-white"><?= $chapter->titulo ?></div>
						</div>

						<div class="flex justify-between items-center">
							<div class="w-full text-center rounded px-2">
								<img src="<?= URLROOT . '/' . $chapter->portada ?>" alt="<?= $chapter->subtitulo ?>" class="object-content">	
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

	<div class="flex flex-col md:flex-row p-2 md:px-16 my-0 mx-auto ">

		<!-- columna IZQUIERDA -->
		<div id="col-izq" class="bg-neutral md:p-3 py-4 my-4 md:rounded-none rounded-lg space-y-4 md:w-3/5">

			<div class="flex justify-between px-2 md:px-5 items-center">
				<div id="chapter" class="space-x-10 text-4xl md:text-6xl font-bold" data-comic="<?php echo $data['comic']->nombre ?>" data-quant="1">
					<span class="text-white"><?php echo $data['chapter']->titulo ?> </span>
					<span id="price" class="text-4xl text-cta">$ <?php echo $data['chapter']->precio ?></span>
				</div>
			</div>

			<div class="flex justify-between px-2 md:px-5 items-center">
				<div class="w-full text-center text-lg font-bold tracking-wider rounded text-ctaLight bg-dark p-2"><?php echo $data['chapter']->subtitulo ?></div>
			</div>

			<div class="flex md:hidden justify-between p-0 md:px-5 items-center">
				<div class="flex md:w-[700px] w-96 mx-auto">

					<div class="relative flex w-full overflow-hidden bg-neutralLight md:h-[1000px] h-[640px] ">

						<button id="prev-mobile" class="z-20 absolute self-center h-max rounded-lg p-3 text-dark bg-cta opacity-20 hover:opacity-90 text-4xl font-bold">
					  	<i class="fas fa-chevron-left ml-2"></i>
					  </button>

			  		<?php $total_md = FREE_PAGES; ?>
						<?php for ($k = 1; $k < $total_md+1; $k++) : ?>
							<div class="slide-mobile absolute">
								<div class="flex flex-col items-center">
									
							  	<div class="flex flex-col md:flex-row w-full p-4 justify-between text-xl">
										<button class="w-full mx-auto md:w-1/2 p-2 rounded-xl bg-cta text-dark font-bold"><?php echo $data['chapter']->titulo . ' :  Pag. ' . $k . ' de ' . $total_md ?></button>
									</div>  
									
								  <img src="<?php echo URLROOT . '/img/free/capitulo_' . $data['chapter']->cap_num . '/' . $k . '.png' ?>" alt="<?php echo utf8_encode($data['chapter']->subtitulo) ?>" class="object-cover md:w-[700px]">

							  </div>
							</div>
						<?php endfor; ?>

						<button id="next-mobile" class="z-20 right-0 absolute self-center rounded-lg p-3 text-dark bg-cta opacity-20 hover:opacity-90 text-4xl font-bold">
							<i class="fas fa-chevron-right ml-2"></i>
						</button>

					</div>

				</div>
			</div>

			<div class="flex justify-between text-sm px-2 md:px-5 items-center ">
				<p class="text-lg text-white"><?= utf8_encode($data['chapter']->sinopsis) ?></p>
			</div>

			<div class="flex justify-between px-2 md:px-5 items-center">
				<?php if (strtoupper($data['chapter']->estado) == 'PUBLICADO') : ?>
					<p class="text-white">Publicado : <?php echo fixedFecha($data['chapter']->created_at) ?></p>
				<?php endif; ?>
			</div>

			<!-- BEGIN FICHA TECNICA -->
			<div class="flex justify-between px-2 md:px-5 items-center">
				<div class="p-1 w-full bg-white text-2xl whitespace-normal text-ellipsis">
					<span class="tracking-wider font-bold text-dark p-2">Ficha Tecnica<span>
				</div>
			</div>

			<div class="flex flex-col px-2 md:px-5 space-y-1">
				<div class="flex bg-white text-dark">
					<div class="w-1/3 flex-col p-2">
						<p>Tíulo Original</p>
					</div>
					<div class="w-2/3 flex-col p-2 font-bold border-neutral border-l-4 ">
						<p><?php echo str_replace("_"," ",$data['comic']->nombre) ?></p>
					</div>
				</div>

				<div class="flex bg-white text-dark">
					<div class="w-1/3 flex-col p-2">
						<p>Páginas</p>
					</div>
					<div class="w-2/3 flex-col p-2 font-bold border-neutral border-l-4 ">
						<p><?php echo $data['chapter']->paginas ?></p>
					</div>
				</div>

				<div class="flex bg-white text-dark">
					<div class="w-1/3 flex-col p-2">
						<p>Autores</p>
					</div>
					<div class="w-2/3 flex-col p-2 font-bold border-neutral border-l-4 ">
						<p><?php echo $data['chapter']->autor ?></p>
					</div>
				</div>

				<div class="flex bg-white text-dark">
					<div class="w-1/3 flex-col p-2">
						<p>Formato</p>
					</div>
					<div class="w-2/3 flex-col p-2 font-bold border-neutral border-l-4 ">
						<p><?php echo explode(' ', $data['chapter']->formato)[0]  ?></p>
					</div>
				</div>

				<div class="flex bg-white text-dark">
					<div class="w-1/3 flex-col p-2">
						<p>Tamaño</p>
					</div>
					<div class="w-2/3 flex-col p-2 font-bold border-neutral border-l-4 ">
						<p><?php echo explode(' ', $data['chapter']->formato)[1]  ?></p>
					</div>
				</div>

			</div>
			<!-- END FICHA TECNICA -->

			<div class="flex justify-between px-2 md:px-5 items-center">
				<a href="<?php echo URLROOT . '/' . $data['controller'] . '/' .  $data['page'] . '/' . str_replace(" ","_",$data['comic']->nombre) ?> " class="w-3/4 text-center bg-ctaDark tracking-wider font-bold text-white rounded-xl hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 px-5 py-2">
					<i class="fas fa-arrow-left mr-4 px"></i> Volver a la lista
				<a>
			</div>

			<div class="flex justify-between px-2 mt-8 md:px-5 items-center">
				<div id="user_warning" class="hidden w-full flex flex-col space-y-4 p-4 bg-white rounded-xl">
					<div class="flex justify-between items-center ">
						<p>Debes Iniciar Sesion :</p>
						<button id="close_warning" class="text-2xl px-2"><i class="fas fa-circle-xmark"></i></button>
					</div>

					<a href="<?php echo URLROOT ?>/pages/login" class="w-1/2 text-center p-3 cursor-pointer mx-auto rounded-full font-bold text-white bg-primary hover:bg-primaryDark">Iniciar Sesión</a>


					<div class="flex justify-between items-center">
						<p>Si no tienes cuenta puedes Registrarte:</p>
					</div>

					<a href="<?php echo URLROOT ?>/pages/register" class="w-1/2 text-center p-3 cursor-pointer mx-auto rounded-full font-bold text-white bg-primary hover:bg-primaryDark">Registrarme</a>

				</div>
			</div>

			<?php if (strtoupper($data['chapter']->estado) == 'PUBLICADO') : ?>
				<div class="relative flex justify-between px-2 mt-8 md:px-5 items-center">
					<button id="btn_compra" class="w-full text-center text-2xl bg-ctaDark text-white font-bold rounded-xl hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 p-4"> 
						Comprar <i class="fa-brands fa-paypal ml-4"></i> 
					</button>
				</div>
			<?php endif; ?>


			<div class="flex justify-between items-center pt-8">
				<div class="relative">
					<div class="h-12 w-44 bg-white text-2xl skew-y-5 whitespace-normal text-ellipsis">
						<button class="tracking-wider font-bold text-dark p-2">Novedades<button>
					</div>
					<div class="absolute h-12 w-24 bg-white left-40 top-0 skew-x-[35deg] after:skew-y-[35deg]">
					</div>
				</div>
			</div>

			<div class="flex flex-col justify-between space-y-4 items-center text-white">
				<a href="<?php echo URLROOT; ?>/pages/register" class="w-fit cursor-pointer p-2 text-2xl border-cta border-b-2 hover:text-cta">Registrate</a>
				<p >Para recibir notificaciones de los nuevos lanzamientos</p>
			</div>
			
		</div>

		<!-- columna DERECHA -->
		<div id="col-der" class="hidden md:block md:p-4 md:w-full">
			<div class="flex md:w-[700px] w-screen mx-auto">

				<div class="relative flex w-full overflow-hidden bg-neutralLight md:h-[1000px] h-[760px] ">

					<button id="prev" class="z-20 absolute self-center h-max rounded-lg p-3 text-dark bg-cta opacity-20 hover:opacity-90 text-4xl font-bold">
				  	<i class="fas fa-chevron-left ml-2"></i>
				  </button>

		  		<?php $total = FREE_PAGES; ?>
					<?php for ($i = 1; $i < $total+1; $i++) : ?>
						<div class="slide absolute">
							<div class="flex flex-col items-center">
								
						  	<div class="flex flex-col md:flex-row w-full p-4 justify-between text-xl">
									<button class="w-full mx-auto md:w-1/2 p-2 rounded-xl bg-cta text-dark font-bold"><?php echo $data['chapter']->titulo . ' :  Pag. ' . $i . ' de ' . $total ?></button>
								</div>  
								
							  <img src="<?php echo URLROOT . '/img/free/capitulo_' . $data['chapter']->cap_num . '/' . $i . '.png' ?>" alt="imagen logo" class="object-cover md:w-[700px]">

						  </div>
						</div>
					<?php endfor; ?>

					<button id="next" class="z-20 right-0 absolute self-center rounded-lg p-3 text-dark bg-cta opacity-20 hover:opacity-90 text-4xl font-bold">
						<i class="fas fa-chevron-right ml-2"></i>
					</button>

				</div>

			</div>
		</div>

	</div>

<?php endif; ?>


<script src="<?php echo URLROOT; ?>/js/carousel.js"></script>
<script src="<?php echo URLROOT; ?>/js/checker.js"></script>

<?php require APPROOT . '/views/' . $data['controller'] . '/partials/footer.php'; ?>