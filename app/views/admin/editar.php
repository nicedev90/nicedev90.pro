<?php require APPROOT . '/views/' . $data['controller'] . '/partials/header.php'; ?>
<?php require APPROOT . '/views/' . $data['controller'] . '/partials/navbar.php'; ?>


	<div class="flex flex-col md:flex-row w-full p-2 md:px-16 my-2 mx-auto ">
		<?php if (isset($data['chapter'])) : ?>
		<form action="<?php echo URLROOT . '/' . $data['controller'] . '/editar/' . $data['project_name'] . '/' . str_replace(' ','_',$data['chapter']->titulo) ?>" class="flex flex-col bg-white mx-auto w-full md:w-3/4 shadow rounded-lg"  method="post" enctype="multipart/form-data">

			<div class="flex justify-between items-center p-4 border-b md:px-6">
				<h2 class="text-dark text-2xl font-bold text-center w-1/2">
					Editar Capitulo
				</h2>

				<a href="<?php echo URLROOT . '/' . $data['controller'] . '/panel' ?>" class="w-fit bg-ctaDark tracking-wider font-bold text-white rounded-xl hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 p-3">
					<i class="fas fa-arrow-left mr-4 px"></i> Volver a la lista
				<a>
			</div>


			<div class="flex flex-col w-full p-3">

				<input type="hidden" name="comic_id" value="<?= $data['comic']->id ?>">
				<input type="hidden" name="cap_num" value="<?= $data['chapter']->cap_num ?>">

				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex flex-col text-dark md:px-3 md:w-full">
						<label for="titulo" class="md:w-full font-bold">Numero </label>
						<input type="text" readonly name="titulo" class="p-2 border border-dark outline-none rounded md:w-full" value="<?= $data['chapter']->titulo ?>">
					</div>
					<div class="flex flex-col text-dark md:px-3 md:w-full">
						<label for="subtitulo" class="md:w-full font-bold">Titulo</label>
						<input type="text" name="subtitulo" class="p-2 border border-dark outline-none rounded md:w-full" value="<?= utf8_encode($data['chapter']->subtitulo) ?>">
					</div>
				</div>
				
				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex flex-col text-dark md:px-3 md:w-full">
						<label for="autor" class="md:w-full font-bold">Autor(es)</label>
						<input type="text" name="autor" class="p-2 border border-dark outline-none rounded md:w-full" value="<?= utf8_encode($data['chapter']->autor) ?>">
					</div>
				</div>
				
				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="paginas" class="md:w-full font-bold">Paginas</label>
						<input type="text" name="paginas" class="p-2 border border-dark outline-none rounded md:w-full" value="<?= utf8_encode($data['chapter']->paginas) ?>">
					</div>

					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="formato" class="md:w-full font-bold">Formato</label>
						<select name="formato" id="formato" class="p-2 border border-dark rounded outline-none">
							<option selected value="<?= utf8_encode($data['chapter']->formato) ?>"><?= utf8_encode($data['chapter']->formato) ?></option>
							<option value="Digital A5">Digital A5</option>
							<option value="Letter A4"> Letter A4</option>
							<option value="Digital A4">Digital A4</option>
						</select>
					</div>

					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="precio" class="md:w-full font-bold">Precio</label>
						<input type="number" step="any" min="0"  name="precio" class="p-2 border border-dark outline-none rounded md:w-full" value="<?= utf8_encode($data['chapter']->precio) ?>">
					</div>

					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="estado" class="md:w-full font-bold">Estado</label>
						<select name="estado" id="estado" class="p-2 border border-dark rounded outline-none">
							<option selected value="<?= utf8_encode($data['chapter']->estado) ?>"><?= utf8_encode($data['chapter']->estado) ?></option>
							<option value="programado">Programado</option>
							<option value="publicado">Publicado</option>
						</select>
					</div>
				</div>

				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex text-dark flex-col md:px-3 md:w-full">
        		<input type="hidden" name="imagen_actual" value="<?= $data['chapter']->portada ?>">
        		<img src="<?= URLROOT . '/' . $data['chapter']->portada ?>" alt="<?= $data['chapter']->subtitulo ?>">
					</div>
				</div>

				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex text-dark flex-col md:px-3 md:w-full">
		        <label for="imagen" class="font-bold">Portada (opcional)</label>
		        <input type="file" id="imagen" name="imagen">
		        <span>Seleccionar una imagen si quieres cambiar la actual.</span>
					</div>
				</div>

				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="sinopsis" class="md:w-full font-bold">Sinopsis </label>
						<textarea name="sinopsis" id="sinopsis" class="p-1 h-44 outline-none border border-dark rounded"><?= utf8_encode($data['chapter']->sinopsis) ?></textarea>
					</div>
				</div>

				<div class="flex flex-col items-center pt-5 space-y-4 text-white text-lg font-bold md:flex-row md:justify-around md:space-y-0">
					<button type="submit" name="update" class="w-full text-center text-2xl bg-ctaDark tracking-wider font-bold text-white rounded-xl hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 p-3 md:w-96">Actualizar Capitulo</button>
				</div>

				<div class="flex justify-between md:px-5 pt-16 items-center mx-auto">
					<input type="hidden" name="chapter_id" value="<?= $data['chapter']->id ?>">
					<button name="delete" class="w-full text-center bg-ctaDark tracking-wider font-bold text-white rounded-xl hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 p-3 "><i class="fas fa-trash mr-4 px"></i> Eliminar Capitulo</button>
				</div>

			</div>
		</form>

		<?php else : ?>
		<form action="<?php echo URLROOT . '/' . $data['controller'] . '/editar/' . $data['project_name'] ?>" class="flex flex-col bg-white mx-auto w-full md:w-3/4 shadow rounded-lg" method="post" enctype="multipart/form-data">

			<div class="flex justify-between items-center p-4 border-b md:px-6">
				<h2 class="text-dark text-2xl font-bold text-center w-1/2">
					Editar Proyecto
				</h2>

				<a href="<?php echo URLROOT . '/' . $data['controller'] . '/panel' ?>" class="w-fit bg-ctaDark tracking-wider font-bold text-white rounded-xl hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 p-3">
					<i class="fas fa-arrow-left mr-4 px"></i> Volver a la lista
				<a>
			</div>

			<div class="flex flex-col w-full p-3 space-y-4">

				<input type="hidden" name="comic_id" value="<?= $data['comic']->id ?>">

				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex flex-col text-dark md:px-3 md:w-full">
						<label for="nombre" class="md:w-full font-bold">Nombre </label>
						<input type="text" name="nombre" class="p-2 border border-dark outline-none rounded md:w-full" value="<?= $data['comic']->nombre ?>">
					</div>
					<div class="flex flex-col text-dark md:px-3 md:w-full">
						<label for="genero" class="md:w-full font-bold">Genero</label>
						<input type="text" name="genero" class="p-2 border border-dark outline-none rounded md:w-full" value="<?= utf8_encode($data['comic']->genero) ?>">
					</div>
				</div>
				
				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex flex-col text-dark md:px-3 md:w-full">
						<label for="autor" class="md:w-full font-bold">Autor(es)</label>
						<input type="text" name="autor" class="p-2 border border-dark outline-none rounded md:w-full" value="<?= utf8_encode($data['comic']->autor) ?>">
					</div>
				</div>
				
				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="estado" class="md:w-full font-bold">Estado</label>
						<input type="text" name="estado" class="p-2 border border-dark outline-none rounded md:w-full" value="<?= utf8_encode($data['comic']->estado) ?>">
					</div>
					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="formato" class="md:w-full font-bold">Formato</label>
						<select name="formato" id="formato" class="p-2 border border-dark rounded outline-none">
							<option selected value="<?= utf8_encode($data['comic']->formato) ?>"><?= utf8_encode($data['comic']->formato) ?></option>
							<option value="Digital A5">Digital A5</option>
							<option value="Letter A4"> Letter A4</option>
							<option value="Digital A4">Digital A4</option>
						</select>
					</div>
				</div>

				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex text-dark flex-col md:px-3 md:w-full">
        		<input type="hidden" name="imagen_actual" value="<?= $data['comic']->portada ?>">
        		<img src="<?= URLROOT . '/' . $data['comic']->portada ?>" alt="<?= $data['comic']->nombre ?>">
					</div>
				</div>

				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex text-dark flex-col md:px-3 md:w-full">
		        <label for="imagen" class="font-bold">Portada (opcional)</label>
		        <input type="file" id="imagen" name="imagen">
		        <span>Seleccionar una imagen si quieres cambiar la actual.</span>
					</div>
				</div>

				<div class="flex flex-col space-y-2 py-2 md:flex-row md:space-y-0">
					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="descripcion" class="md:w-full font-bold">Descripcion </label>
						<textarea name="descripcion" id="descripcion" class="p-1 h-64 outline-none border border-dark rounded"><?= utf8_encode($data['comic']->descripcion) ?></textarea>
					</div>
				</div>

				<div class="flex flex-col items-center pt-5 space-y-4 text-white text-lg font-bold md:flex-row md:justify-around md:space-y-0">
					<button type="submit" class="w-full text-center text-2xl bg-ctaDark tracking-wider font-bold text-white rounded-xl hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 p-3 md:w-96">Actualizar</button>
				</div>

			</div>
		</form>

		<?php endif; ?>

	</div>


<?php require APPROOT . '/views/' . $data['controller'] . '/partials/footer.php'; ?>