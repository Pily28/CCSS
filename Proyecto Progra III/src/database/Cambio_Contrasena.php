<?php
session_start();
include("ConexionBD.php");
$ObtenerBD = new ConectarBD();
$ObtenerConexion = $ObtenerBD->conex();

if (isset($_POST["recuperar"])) {
  $email = $_POST["email"];

  // Generar una nueva contraseña aleatoria
  $nueva_contrasena = generar_contrasena_aleatoria(); // Implementa esta función según tus necesidades

  // Actualizar la contraseña en la base de datos y enviarla por correo
  $sql = "UPDATE usuarios SET password = '$nueva_contrasena' WHERE email = '$email'";
  if ($conn->query($sql) === TRUE) {
      enviar_correo($email, $nueva_contrasena); // Implementa esta función según tus necesidades
      echo "La contraseña se ha reiniciado y se ha enviado al correo proporcionado.";
  } else {
      echo "Error al reiniciar la contraseña: ";
  }
}

mysqli_close($ObtenerConexion);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <title>Hospital CIMA</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Hospital CIMA, Salud, Ambulacia privada"
    />
    <meta name="keywords" content="salud, citas, Citas en linea" />
   <!-- Favicon -->
  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/logo.png" />
  <!-- Stylesheets -->
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/Inicio.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>
  <body>
  
    <!-- Header -->
    <header class="fixed-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
        <a href="#" class="logo"><img src="../img/logo2.jpg"></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-content"
            aria-controls="navbar-content"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse justify-content-center"
            id="navbar-content"
          >
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./index.html"
               style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;" >Inicio</a
                >
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle active"
                  href="#"
                  id="navbarDropdownMenuLink"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;"  >
                  Trámites
                </a>
                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <li>
                    <a class="dropdown-item" href="database/Registro.php"  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;" >Registros</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="database/LoginColaboradores.php"  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;" >Área Administrativa</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="database/LoginUsuarios.php"  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;" >Login Usuarios</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active"
                  aria-current="page"
                  href="./contacto.html"
                  style="color: lightseagreen; font-size: 15px; font-family: 'Trebuchet MS',sans-serif;" >Contacto</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>



<!--Contenido-->
     <section class="recuperar-clave">
    </h1>Recuperar contraseña</h1>
    <form method="post" action="procesar_recuperar.php">
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" required><br>

        <input type="submit" name="recuperar" value="Recuperar contraseña">
    </form>
    </section>

    <!-- Footer -->
    <footer class="pt-4 pt-md-4 border-top">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-3">
            <img class="mb-2" src="../img/caduceo.png" alt="caduceo" />
          </div>
          <div class="col-6 col-md-3">
            <h5>Localización</h5>
            <ul class="list-unstyled text-small">
              <li > <a class="text-muted" href="../Sede.Belen.html"color: white; font-size: 20px;">Belen</a></li>
              <l><a class="text-muted" href="../Sede-Escazu.html" style="color: white; font-size: 20px;">Escazu</a></li>
              <li><a class="text-muted" href="../Sede-SanPedro.html" style="color: white; font-size: 20px;">San Pedro</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3">
            <h5>Redes Sociales</h5>
            <div  class="text-small">
              <i class="bi bi-instagram">Instagram</i>
              <i class="bi bi-facebook">Facebook</i>
              <i class="bi bi-youtube">Youtube</i>
            </div>
          </div>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- JavaScript -->
    <script src="js/modernizr-3.11.2.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <script src="../js/Inicio.js"></script>
  </body>
</html>