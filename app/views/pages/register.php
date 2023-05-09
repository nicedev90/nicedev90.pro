<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/main.css">
  <title> <?php echo APPNAME; ?> - Registrarse </title>
</head>
<body>

  <div id="login_wrapper" class="flex flex-col min-h-screen">
    
    <div id="bg_video" class="hidden md:block mx-auto">
      <video src="<?= URLROOT ?>/img/bg_video_1.mp4" className="absolute z-10 w-auto min-w-full min-h-full max-w-none object-cover" type="video/mp4" autoplay muted loop>
      </video>
    </div>

    <!-- flex form section -->
    <section id="form_login" class="flex flex-col items-center">
      
      <div class="flex absolute w-11/12 rounded-2xl bg-white px-8 py-6 mx-auto top-5 md:left-20 md:top-44 shadow-lg border-primary border-4 shadow-primary md:w-1/3">
        <!-- form login -->
        <form class="flex flex-col" action="<?php echo URLROOT; ?>/pages/register" method="post">
          
          <div class="mb-10 space-y-2 ">
            <a class="flex items-center justify-around mx-6" href="<?php echo URLROOT ?>">
              <img class="w-16 h-16" src="<?php echo URLROOT; ?>/img/logo-login.png" alt="">
              <img class="w-36" src="<?php echo URLROOT; ?>/img/logo-letra.png" alt="">
            </a>

            <h5 class="w-full text-dark text-2xl text-center font-bold text-primaryDark">CREAR CUENTA</h5>

            <?php showAlert(); ?>
          </div>

          <div id="nombre-group" class="relative flex flex-col mb-6 space-y-1">
            <label for="nombre" class="text-primaryDark text-lg font-bold">Nombre</label>
            <div class="flex border-primaryDark border-b-2 items-center p-2">
              <input id="nombre" type="text" name="nombre" class="w-full text-sm focus:outline-none" placeholder="Ingrese su nombre" required>
            </div>
          </div>

          <div id="user-group" class="relative flex flex-col mb-6 space-y-1">
            <label for="email" class="text-primaryDark text-lg font-bold">Email</label>
            <div class="flex border-primaryDark border-b-2 items-center p-2">
              <input id="email" type="email" name="email" class="w-full text-sm focus:outline-none" placeholder="Ingrese su email" required>
            </div>
          </div>

          <div id="telefono-group" class="relative flex flex-col mb-6 space-y-1">
            <label for="telefono" class="text-primaryDark text-lg font-bold">Telefono</label>
            <div class="flex border-primaryDark border-b-2 items-center p-2">
              <input id="telefono" type="text" name="telefono" class="w-full text-sm focus:outline-none" placeholder="Ingrese su telefono" required>
            </div>
          </div>

          <div id="pass-group" class="relative flex flex-col mb-10 space-y-1">
            <label for="password" class="text-primaryDark text-lg font-bold">Contraseña</label>        
            <div class="flex border-primaryDark border-b-2 items-center p-2">
              <input id="password" type="password" name="password" class="w-full text-sm focus:outline-none" placeholder="Ingrese su contraseña" required>
            </div>
          </div>

          <div class="flex flex-col space-y-4 items-center mb-6 mx-auto">
            <button type="submit" class="w-44 px-6 py-3 rounded-full font-bold text-white bg-primary hover:bg-primaryDark">REGISTRARME</button>
            <a href="<?php echo URLROOT . '/pages/login' ?>" class="w-44 px-6 py-3 text-center cursor-pointer hover:rounded-full font-bold text-primary hover:text-white hover:bg-primaryDark">INICIAR SESION</a>
          </div>
    
        </form> 
        
        <div class="w-1/2 md:w-1/3"></div>
        <div class="w-1/2 absolute top-24 -right-5 md:top-10 md:right-0">
          <img src="<?php echo URLROOT; ?>/img/login-side.png" alt="imagen logo">
        </div> 

      </div>
    </section>


    <!-- footer -->
    <footer class="bg-primaryDark mt-auto">
      <div class="flex justify-center space-x-2 py-1 text-center text-white text-sm">
        <a href="<?php echo URLROOT; ?>"><?= 'Diseñado por @nicedev90 &copy;  ' . date('Y') ?></a>
      </div>
    </footer>
  </div>

</body>
</html>