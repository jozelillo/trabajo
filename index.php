<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body background="img/fondoindex.jpg" alt="fondo">
    <header>
        <nav>
            <ul>
                <li><img src="img/logo.jpg" alt="logo"></li>
                <li><a href="index.php">INICIO</a></li>
                <li><a href="php/socios.php">SOCIOS</a></li>
                <li><a href="php/productos.php">PRODUCTOS</a></li>
                <li><a href="php/servicios.php">SERVICIOS</a></li>
                <li><a href="php/testimonios.php">TESTIMONIOS</a></li>
                <li><a href="php/noticias.php">NOTICIAS</a></li>
                <li><a href="php/citas.php">CITAS</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="todo">
            <h1> CLUB DEPORTIVO SAN ANTONIO</h1>

            <?php
            if(isset($_COOKIE['nomus'])){
                echo "Bienvenido $_COOKIE[nomus]";
            }
            else{
                if(!isset($_POST['enviar'])){
                    echo " <section id="form">
                    <h3>INICIO DE SESION</h3>
                <form>
                    <div id='l1'>
                        <label form='nomus'>Nombre de usuario:</label>
                        <input type='text' name='nomus'></input>
                    </div>
                    <div id='l2'>
                        <label form='contraseña'>Contraseña:</label>
                        <input type='text' name='contraseña'></input>
                    </div>
            <button>
                <a href='index.html'>ENVIAR</a>
            </button>
                </form>
            </section>";
                }
                else
                {
                    echo "Bienvenido $_POST[nomus]";
                    setcookie('nomus',$_POST['nomus'],time()+3600,'/');
                    setcookie('contraseña',$_POST['contraseña',time()+3600,'/']);
                }
            }
            ?>

           

        <section id="noticias">
            <h2>Ultimas Noticias</h2>
            <div class ="php">
          <?php
            $conexion = new mysqli ('localhost','root','','club');
            $sentencia = $conexion->prepare("SELECT imagen, titulo, contenido, id FROM noticia WHERE fecha_publicacion <= NOW() ORDER BY fecha_publicacion DESC  LIMIT 0,3 ");
            $sentencia->bind_result ($foto, $titulo, $contenido,$id);
            $sentencia->execute();
            $sentencia->store_result();
            while($sentencia->fetch()){

        $recorte=substr($contenido,0,50);
        $recorte.="...";
        
        echo "<div class = 'noticiaindex'> <h1> $titulo </h1> <img src='$foto' class = 'fotonot'> <br><br>$recorte <a class='enlace' href = 'php/noticia_completa.php?id=$id'>Ver noticia completa </a></div><br>";
    }
    $conexion->close();
          ?>
          </div>
        </section>
        <section id="testimonios">
            <h2>Testimonios</h2>
           
        <?php
            $conexion = new mysqli ('localhost','root','','club');
            $sentencia = $conexion->prepare("SELECT contenido, autor FROM testimonio ORDER BY rand() LIMIT 0,1");
            $sentencia->bind_result ($contenido, $autor);
            $sentencia->execute();
            $sentencia->store_result();
            while($sentencia->fetch()){
        echo "<div class = 'testimonioindex'>$autor: $contenido  </div> ";
    }
    $conexion->close();
    ?><br><br>
        </section>
        <h2> Instalaciones</h2>
         <div class = "testimonioindex">
         <p> Disfruta de las mejores instalaciones, fruto del esfuerzo de todos los socios que durante años han apostado por nuestro Club</p>
        
                <button class = "landingbutton">
                    <a href="php\landingpage.html">VER</a>
                </button>
</div>
        <section id="form">
            <form>
                <div id="l1">
                    <label form="nom">Nombre:</label>
                    <input type="text" name="nom"></input>
                </div>
                <div id="l2">
                    <label form="gmail">Gmail:</label>
                    <input type="text" name="gmail"></input>
                </div>
                <div id="l3">
                    <label form="tlf">Teléfono:</label>
                    <input type="text" name="tlf"></input>
                </div>
                <p> Mensaje:</p>
                <textarea rows="5" cols="90"></textarea>
        <button>
            <a href="index.html">ENVIAR</a>
        </button>
            </form>
        </section>
    </div>
    </main>
</body>
</html>