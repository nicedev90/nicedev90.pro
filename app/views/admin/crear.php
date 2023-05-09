<?php require APPROOT . '/views/' . $data['controller'] . '/partials/header.php'; ?>
<?php require APPROOT . '/views/' . $data['controller'] . '/partials/navbar.php'; ?>


	<div class="flex flex-col md:flex-row w-full p-2 md:px-16 my-2 mx-auto ">
	
		<form action="<?php echo URLROOT . '/' . $data['controller'] . '/crear' ?>" class="flex flex-col bg-white mx-auto w-full md:w-3/4 shadow rounded-lg"  method="post" enctype="multipart/form-data">
			<div class="flex justify-between py-2 px-3 border-b md:px-6">
				<h2 class="text-dark text-2xl font-bold text-center">
					Crear Capitulo
				</h2>
			</div>

			<div class="flex flex-col w-full p-3 space-y-4">

				<input type="hidden" name="comic_id" value="<?= $data['comic_id'] ?>">
				<input type="hidden" name="cap_num" value="<?= $data['cap_num'] ?>">

				<div class="flex flex-col space-y-2 md:flex-row md:space-y-0">
					<div class="flex flex-col text-dark md:px-3 md:w-full">
						<label for="titulo" class="md:w-full font-bold">Numero </label>
						<input type="text" readonly name="titulo" class="p-2 border border-dark outline-none rounded md:w-full" value="<?= $data['cap_title'] ?>">
					</div>
					<div class="flex flex-col text-dark md:px-3 md:w-full">
						<label for="subtitulo" class="md:w-full font-bold">Titulo</label>
						<input type="text" name="subtitulo" class="p-2 border border-dark outline-none rounded md:w-full" >
					</div>
				</div>
				
				<div class="flex flex-col space-y-2 md:flex-row md:space-y-0">
					<div class="flex flex-col text-dark md:px-3 md:w-full">
						<label for="autor" class="md:w-full font-bold">Autor(es)</label>
						<input type="text" name="autor" class="p-2 border border-dark outline-none rounded md:w-full">
					</div>
				</div>
				
				<div class="flex flex-col space-y-2 md:flex-row md:space-y-0">
					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="paginas" class="md:w-full font-bold">Paginas</label>
						<input type="text" name="paginas" class="p-2 border border-dark outline-none rounded md:w-full" >
					</div>

					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="formato" class="md:w-full font-bold">Formato</label>
						<select name="formato" id="formato" class="p-2 border border-dark rounded outline-none">
							<option value="Digital A5">Digital A5</option>
							<option value="Letter A4"> Letter A4</option>
							<option value="Digital A4">Digital A4</option>
						</select>
					</div>

					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="precio" class="md:w-full font-bold">Precio</label>
						<input type="number" step="any" min="0"  name="precio" class="p-2 border border-dark outline-none rounded md:w-full" >
					</div>

					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="estado" class="md:w-full font-bold">Estado</label>
						<select name="estado" id="estado" class="p-2 border border-dark rounded outline-none">
							<option value="programado">Programado</option>
							<option value="publicado">Publicado</option>
						</select>
					</div>
				</div>


				<div class="flex flex-col space-y-2 md:flex-row md:space-y-0">
					<div class="flex text-dark flex-col md:px-3 md:w-full">
		        <label for="imagen" class="font-bold">Portada (opcional)</label>
		        <input type="file" id="imagen" name="imagen">
		        <span>Seleccionar una imagen si quieres cambiar la actual.</span>
					</div>
				</div>

				<div class="flex flex-col space-y-2 md:flex-row md:space-y-0">
					<div class="flex text-dark flex-col md:px-3 md:w-full">
						<label for="sinopsis" class="md:w-full font-bold">Sinopsis </label>
						<textarea name="sinopsis" id="sinopsis" class="p-1 h-44 outline-none border border-dark rounded"></textarea>
					</div>
				</div>

				<div class="flex flex-col items-center pt-5 space-y-4 text-white text-lg font-bold md:flex-row md:justify-around md:space-y-0">
					<button type="submit" class="w-full text-center text-2xl bg-ctaDark tracking-wider font-bold text-white rounded-xl hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 p-3 md:w-96"> Publicar </button>
				</div>

				<div class="flex justify-between md:px-5 pt-16 items-center mx-auto">
					<a href="<?php echo URLROOT . '/' . $data['controller'] . '/panel' ?>" class="w-full text-center bg-ctaDark tracking-wider font-bold text-white rounded-xl hover:bg-cta hover:text-neutralDark hover:border-dark hover:border-b-4 hover:border-l-4 p-3 md:w-96">
						<i class="fas fa-arrow-left mr-4 px"></i> Volver a la lista
					<a>
				</div>

			</div>
		</form>


	</div>


<?php require APPROOT . '/views/' . $data['controller'] . '/partials/footer.php'; ?>