<div class=" w-full bg-neutralDark">	
	<!-- footer -->
  <footer class="md:w-78 md:px-10 mx-auto flex flex-col text-dark mt-auto bg-white md:border-t md:border-dark ">
  	<div class="flex flex-col-reverse items-start justify-around md:flex-row">

  		<!-- author section visible only mobile -->
		  <div class="md:hidden p-2 flex w-full justify-around text-center text-sm text-dark border-t border-cta font-lexend">
		  	<div class="w-1/3 flex items-center">
					<a href="<?php echo URLROOT . '/' . $data['controller'] . '/index'?>" class=" text-2xl text-dark  font-semibold text-center"> niceDev90 	</a>
			  </div>
	    	<div class="flex flex-col justify-center items-center">
	    		<span>Derechos Reservados &nbsp; </span>
		    	<a href="https://nicedev90.pro">	 &copy;nicedev90 - Web Designer</a> 
	    	</div>
	    </div>


  		<!-- col izq  -->
  		<div class="p-2 flex justify-around items-center w-full md:w-1/2 md:border-r border-cta border-t md:border-t-0 ">
  			<h2 class="text-2xl font-bold font-lexend ">Contacto</h2>
 				<div class="flex flex-col space-y-2 font-lexend">
 					<p>	<i class="fas fa-phone mr-2 "></i> +51 992-819-526</p>
    			<p>	<i class="fas fa-envelope mr-2 "></i> contacto@nicedev90.pro </p>
 				</div>
  		</div>

  		<!-- col der -->
  		<div class="hidden py-4 px-2  md:flex justify-around items-center w-full md:w-1/2  text-dark ">
  		  <!-- author section only visible on desktop -->
		  	<a href="<?php echo URLROOT . '/' . $data['controller'] . '/index'?>" class="text-4xl text-dark  font-semibold text-center"> niceDev90 	</a>

	    	<div class="flex flex-col justify-center items-center font-lexend">
	    		<span>Derechos Reservados &nbsp; </span>
		    	<a href="https://nicedev90.pro">	 &copy; nicedev90 - Full Stack Developer</a> 
	    	</div>
  		  
  		</div>

  		
    </div>


  	
  </footer>

</div>



	<script src="<?php echo URLROOT; ?>/js/main.js"></script>
</body>
</html>