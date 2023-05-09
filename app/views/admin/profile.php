<?php require APPROOT . '/views/' . $data['controller'] . '/partials/header.php'; ?>
<?php require APPROOT . '/views/' . $data['controller'] . '/partials/navbar.php'; ?>

	<div class="flex flex-col w-full p-2 md:px-16 my-2 mx-auto space-y-3 ">

		<div class="flex px-2 md:px-5 items-center ">
			<div class="flex justify-center space-x-8 items-center w-1/2 bg-primaryDark text-2xl">
				<p class="tracking-wider font-bold text-white p-2"> Mi Perfil<p>
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

			<div class="flex bg-white text-center text-dark space-x-2">
				<div class="w-96 p-2">
					<p><?= $data['user']->nombre ?></p>
				</div>

				<div class="w-64 p-2 border-neutral border-l-4 ">
					<p><?= $data['user']->email ?></p>
				</div>

				<div class="w-44 hidden md:block p-2 border-neutral border-l-4 ">
					<p><?= $data['user']->telefono ?></p>
				</div>

				<div class="w-44 hidden md:block p-2 border-neutral border-l-4 ">
					<p><?= fixedFecha($data['user']->created_at) ?></p>
				</div>

			</div>

		</div>

	</div>


<?php require APPROOT . '/views/' . $data['controller'] . '/partials/footer.php'; ?>