  <!-- footer -->
  <footer class="bg-primaryDark text-white mt-auto">
    <div class="flex flex-col items-start justify-around px-6 md:px-16 md:flex-row">

    	<div class="flex flex-col w-full items-center space-y-4 py-4 justify-start border-dark border-b-2 md:border-none md:w-1/2">

    		<div id="btn-acordion" class="relative flex justify-start items-center md:cursor-default cursor-pointer">
    			<div class="text-xl font-irish">Contactos</div>
    			<i class="fas fa-chevron-up ml-4 md:hidden"></i>
    		</div>

    		<div class="hidden md:block left-0 right-0 flex flex-col w-full md:w-1/2 space-y-2">

		    	<a class="flex px-6 items-center justify-between hover:bg-cta hover:rounded-full hover:text-dark" href="<?php echo URLROOT . '/' . $data['controller'] . '/about' ?>" >
						<img src="<?php echo URLROOT; ?>/img/autor1.png" alt="imagen logo" class=" h-12">
						<p>Ilustrador</p>
					</a>

					<a class="flex px-6 items-center justify-between hover:bg-cta hover:rounded-full hover:text-dark" href="<?php echo URLROOT . '/' . $data['controller'] . '/about' ?>" >
						<img src="<?php echo URLROOT; ?>/img/autor2.png" alt="imagen logo" class=" h-12">
						<p>Escritor</p>
					</a>

    		</div>

    	</div>

    	<div class="flex flex-col w-full items-center space-y-4 py-4 justify-start md:w-1/2 ">
    		<div id="btn-acordion" class="relative flex justify-start items-center md:cursor-default cursor-pointer">
    			<div class="text-xl font-irish">Informacion de la tienda</div>
    			<i class="fas fa-chevron-up ml-4 md:hidden"></i>
    		</div>

    		<div class="hidden md:block left-0 right-0 flex flex-col w-full md:w-1/2 space-y-2">
		    	<a class="flex p-2 items-center justify-between hover:border-cta hover:border-b-2 " href="<?php echo URLROOT . '/' . $data['controller'] . '/aviso' ?>" ><p>Aviso Legal</p>	</a>
					<a class="flex p-2 items-center justify-between hover:border-cta hover:border-b-2 " href="<?php echo URLROOT . '/' . $data['controller'] . '/terminos' ?>" >	<p>Téminos y Condiciones</p></a>
    		</div>

    		<a href="<?php echo URLROOT . '/' . $data['controller'] . '/index' ?>"  class="w-full md:border-none text-center text-xl font-light"><?php echo APPNAME . '  &copy;  ' .  date("Y")?></a>

    	</div>

    </div>
  </footer>

	<script src="<?php echo URLROOT; ?>/js/main.js"></script>
</body>
</html>