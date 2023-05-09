<?php require APPROOT . '/views/' . $data['controller'] . '/partials/header.php'; ?>
<?php require APPROOT . '/views/' . $data['controller'] . '/partials/navbar.php'; ?>

	<div class="flex flex-col w-full p-2 md:px-16 my-2 mx-auto space-y-3 ">
		<!-- show projects -->
		<div class="flex px-2 md:px-5 items-center">
			<div class="flex justify-center space-x-8 items-center w-full bg-primaryDark text-2xl">
				<p class="tracking-wider font-bold text-white p-2"> Administrar Proyecto <?php showAlert() ?><p>
			</div>
		</div>

		<div class="flex flex-col px-2 md:px-5 space-y-1">
			<!-- row title projects -->
			<div class="flex bg-ctaDark text-xl text-dark font-bold text-center space-x-2">
				<div class="w-96 p-2">
					<p> Nombre </p>
				</div>

				<div class="w-64 hidden md:block p-2">
					<p> Autor</p>
				</div>

				<div class="w-44 hidden md:block p-2">
					<p> Genero</p>
				</div>

				<div class="w-44 hidden md:block p-2">
					<p>Formato</p>
				</div>

				<div class="w-44 p-2">
					<p>Estado</p>
				</div>

				<div class="w-32 p-2">
					<p> Editar </p>
				</div>
			</div>
			<!-- row register projects -->
			<?php foreach($data['comics'] as $comic): ?>
			<div class="flex bg-white text-center text-dark">
				<div class="w-96 p-2">
					<p><?= $comic->nombre ?></p>
				</div>

				<div class="w-64 hidden md:block p-2 border-neutral border-l-4 ">
					<p><?= $comic->autor ?></p>
				</div>

				<div class="w-44 hidden md:block p-2 border-neutral border-l-4 ">
					<p><?= $comic->genero ?></p>
				</div>

				<div class="w-44 hidden md:block p-2 border-neutral border-l-4 ">
					<p><?= $comic->formato ?></p>
				</div>

				<div class="w-44 p-2 border-neutral border-l-4 ">
					<p><?= $comic->estado ?></p>
				</div>

				<div class="w-32 p-2 border-neutral border-l-4 ">
					<a href="<?php echo URLROOT . '/' . $data['controller'] . '/editar/' . $data['project_name'] ?>" class="w-full px-5 py-2 text-center cursor-pointer mx-auto rounded-full font-bold text-white bg-primary hover:bg-primaryDark"><i class="fas fa-edit"></i></a>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		
		<!-- show chapters -->
		<div class="flex px-2 md:px-5 items-center pt-8">
			<div class="flex md:justify-center space-x-4 items-center w-full bg-primaryDark text-xl md:text-2xl">
				<p class="tracking-wider font-bold text-white p-2"> Lista de Capitulos<p>
				<a href="<?php echo URLROOT . '/' . $data['controller'] . '/crear' ?>" class="w-full p-1 text-xl text-center cursor-pointer mx-auto rounded-full text-neutralLight bg-cta hover:bg-ctaDark hover:text-neutralDark">
					<i class="fas fa-plus"></i> Agregar
				</a>
			</div>
		</div>

		<div class="flex flex-col px-2 md:px-5 space-y-1">
			<!-- row titles chapters -->
			<div class="flex bg-ctaDark text-xl text-dark font-bold text-center space-x-2">
				<div class="w-32 p-2">
					<p> Titulo </p>
				</div>
				<div class="w-96 hidden md:block p-2">
					<p> Subtitulo </p>
				</div>
				<div class="w-64 hidden md:block p-2">
					<p> Autor</p>
				</div>

				<div class="w-44 hidden md:block p-2">
					<p>Formato</p>
				</div>

				<div class="w-44 p-2">
					<p>Estado</p>
				</div>

				<div class="w-32 p-2">
					<p> Editar </p>
				</div>
			</div>
			<!-- row registers chapters -->
			<?php foreach($data['chapters'] as $chapter): ?>
			<div class="flex bg-white text-center text-dark">
				<div class="w-32 p-2">
					<p><?= $chapter->titulo ?></p>
				</div>

				<div class="w-96 hidden md:block p-2 border-neutral border-l-4">
					<p><?= $chapter->subtitulo ?></p>
				</div>
				<div class="w-64 hidden md:block p-2 border-neutral border-l-4 ">
					<p><?= $chapter->autor ?></p>
				</div>

				<div class="w-44 hidden md:block p-2 border-neutral border-l-4 ">
					<p><?= $chapter->formato ?></p>

				</div>

				<div class="w-44 p-2 border-neutral border-l-4 ">
					<p><?= strtoupper($chapter->estado) ?></p>
				</div>

				<div class="w-32 flex space-x-4 p-2 border-neutral border-l-4 ">
					<a href="<?php echo URLROOT . '/' . $data['controller'] . '/editar/' . $data['project_name'] . '/' . str_replace(' ','_',$chapter->titulo) ?>" class=" px-5 py-2 text-center cursor-pointer mx-auto rounded-full font-bold text-white bg-primary hover:bg-primaryDark"><i class="fas fa-edit"></i></a>
				</div>


			</div>
			<?php endforeach; ?>
		</div>


		<div class="flex px-2 md:px-5 items-center pt-8">
			<div class="flex justify-center space-x-8 items-center w-full bg-primaryDark text-xl md:text-2xl">
				<p class="tracking-wider font-bold text-white p-2"> Lista de Usuarios<p>
			</div>
		</div>

		<div class="flex flex-col px-2 md:px-5 space-y-1">

			<div class="flex bg-ctaDark text-xl text-dark font-bold text-center space-x-2">
				<div class="w-96 p-2">
					<p> Nombre </p>
				</div>

				<div class="w-64 p-2">
					<p> Email</p>
				</div>

				<div class="w-44 hidden md:block p-2">
					<p> Telefono</p>
				</div>

				<div class="w-44 hidden md:block p-2">
					<p>Fecha Registro</p>
				</div>

			</div>

			<?php foreach($data['users'] as $user) : ?>
				<div class="flex bg-white text-center text-dark space-x-2">
					<div class="w-96 p-2">
						<p><?= $user->nombre ?></p>
					</div>

					<div class="w-64 p-2 border-neutral border-l-4 ">
						<p><?= $user->email ?></p>
					</div>

					<div class="w-44 hidden md:block p-2 border-neutral border-l-4 ">
						<p><?= $user->telefono ?></p>
					</div>

					<div class="w-44 hidden md:block p-2 border-neutral border-l-4 ">
						<p><?= fixedFecha($user->created_at) ?></p>
					</div>

				</div>
			<?php endforeach; ?>

		</div>

	</div>


<?php require APPROOT . '/views/' . $data['controller'] . '/partials/footer.php'; ?>