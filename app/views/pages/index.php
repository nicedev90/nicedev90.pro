<?php require APPROOT . '/views/' . $data['controller'] . '/partials/header.php'; ?>
<?php require APPROOT . '/views/' . $data['controller'] . '/partials/navbar.php'; ?>



 <!-- poster="<?php echo URLROOT ?>/img/logo.png" -->



	<div class=" md:w-78 w-full px-10 bg-white mx-auto ">
		<div class="w-full bg-white ">



<div class="input-group">
	<h2>What's your email?</h2>
	<span >Enter the email address you like to use to sign in.</span>
	<input type="password" placeholder="Enter password">
</div>




<div class="item1 flex flex-col space-y-4 w-1/3 p-6 bg-white rounded-xl drop-shadow-lg font-urban">
<div class="item2 flex justify-end">
<i class="item5 fas fa-xmark"></i>
</div>
<div class=" font-dmsans">
	Lorem ipsum dolor sit amet consectetur adipisicing elit. Id voluptatum ad maxime reprehenderit odio exercitationem eius dolorum quae animi esse, quibusdam alias voluptas magni excepturi optio voluptatibus inventore? Temporibus, reprehenderit?
</div>
<div class="item3">
<h1 class="item6 px-4 py-2 text-2xl font-semibold text-cta">Save post fot later?</h1>

<p class="item7 p-4 font-pathway">Save this post to library to publish later.</p>
</div>

<div class="item4 justify-end space-x-8 flex p-2 w-fit w-full">
<button class="item8 bg-ctaLight hover:bg-cta w-fit px-4 py-2 text-lg rounded-lg font-bold text-white">Save Post</button>

<button class="item9 bg-ctaLight hover:bg-cta w-fit px-4 py-2 text-lg rounded-lg font-bold text-white">Cancel</button>
</div>
</div>






<div class="_video">
	<video id="player" controls controlslist="nofullscreen nodownload">
		<!-- <source src="<?php echo URLROOT ?>/img/mixed1.mp4" type="video/mp4"> -->
		<source src="<?php echo URLROOT ?>/img/mixed1.mp4" type="video/mp4">
	</video>
</div>



<form>
	<div class="input-group" autocomplete="off">
		<label>Email </label>
		<input type="text" placeholder="Email address" >
	</div>

	<div class="input-group">
		<label>Password</label>
		<input type="password" placeholder="Enter password" >
	</div>

	<div class="input-group">
		<button>Login</button>
	</div>
</form>


	<?php foreach($data['comics'] as $comic): ?>


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
	<?php endforeach; ?>

		</div>
	</div>




<?php require APPROOT . '/views/' . $data['controller'] . '/partials/footer.php'; ?>