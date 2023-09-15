	<nav class="relative sticky top-0 z-50   w-full bg-neutralDark">

	<div class="md:w-78 md:px-10 mx-auto flex justify-between items-center py-2 font-lexend text-cta bg-white drop-shadow-md">
		<div class="flex items-center w-1/3 md:w-1/4 h-12 ">
			<a href="<?php echo URLROOT . '/' . $data['controller'] . '/index'?>" class="px-2 md:px-0 text-2xl md:text-4xl text-dark  font-semibold text-center"> niceDev90 	</a>
	  </div>

	  <div class="hidden md:flex w-1/2 items-center justify-between text-xl ">
	  	
	    <li class="list-none">
	      <a class="p-2 <?= ($data['page'] == 'index') ? 'border-b-4 border-dark' : 'hover:border-b-4 hover:border-dark'; ?> " href="<?php echo URLROOT . '/' . $data['controller'] . '/index'?>"> Home</a>
	    </li>
	
	    <li class="list-none">
	      <a class="p-2 <?= ($data['page'] == 'blog') ? 'border-b-4 border-dark' : 'hover:border-b-4 hover:border-dark'; ?>  " href="https://blog.nicedev90.pro">Blog </a>
	    </li>
	
	    <li class="list-none ">
	      <a class="p-2 <?= ($data['page'] == 'about') ? 'border-b-4 border-dark' : 'hover:border-b-4 hover:border-dark'; ?> " href="<?php echo URLROOT . '/' . $data['controller'] . '/about' ?>">About Me</a>
	    </li>

			<a href="<?php echo URLROOT . '/' . $data['controller'] . '/login' ?>" class="rounded-full  text-xl px-6 py-2 md:w-max w-3/4  transition-all duration-500 bg-ctaLight text-white hover:bg-ctaDark"> Contacto </a>
	  </div>

	  <div class="md:hidden">
	  	<a href="<?php echo URLROOT . '/' . $data['controller'] . '/login' ?>" class="rounded-full  text-lg px-6 py-2 w-max  transition-all duration-500 bg-cta text-white"> Contacto </a>
	  </div>

	 	<!-- mobile mobile-menu button -->
	  <button id="mobile-btn" class="md:hidden block mobile-menu focus:outline-none mr-2">
	    <span class="mobile-menu-top bg-ctaDark"></span>
	    <span class="mobile-menu-middle bg-ctaDark"></span>
	    <span class="mobile-menu-bottom bg-ctaDark"></span>
	  </button>
	</div>

	<!-- END MOBILE MENU -->
	</nav>

		<div class="md:hidden">
			<div id="mobile-menu" class="hidden absolute top-16 z-50 flex-col items-center left-0 right-0 text-white bg-ctaLight text-lexend text-xl  divide-neutral divide-y">
		    <a href="<?php echo URLROOT . '/' . $data['controller'] . '/index'?>" class=" w-full text-center py-3  hover:bg-ctaDark">Home</a>
		    <a href="https://blog.nicedev90.pro" class=" w-full text-center py-3  hover:bg-ctaDark">Blog</a>
		    <a href="<?php echo URLROOT . '/' . $data['controller'] . '/about' ?>" class="w-full text-center py-3  hover:bg-ctaDark">About Me</a>

		  </div>
		</div>



