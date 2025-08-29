<header>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</header>
<?php




if (isset($_POST['accion'])) {
  switch ($_POST['accion']) {
      //casos de registros
    case 'editar_user':
      editar_registro();
      break;
    case 'ruleta';
      ruleta();
      break;
    case 'editar_admin':
      editar_registro2();
      break;
    case 'nuevo_user':
      nuevo_registro();
      break;

    case 'acceso_user';
      acceso_user();
      break;
  }
}


function editar_registro()
{

  include("bd.php");

  $op1 = $_POST['op1'];
  $op2 = $_POST['op2'];
  $op3 = $_POST['op3'];
  $id = $_POST['id'];

  try {
    $conn = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE personas SET 
    Deseo1 ='" . $op1 . "',
    Deseo2 ='" . $op2 . "',
    Deseo3 ='" . $op3 . "'
    WHERE ID='" . $id . "'";
    $conn->exec($sql);
    $last_id1 = $conn->lastInsertId();
    /*
    echo $sql;
    echo 'ultimo anime insertado ' . $last_id1;
    echo "<br>";
    */
  } catch (PDOException $e) {
    $conn = null;
    echo $e;
  }


  echo '<script>
  Swal.fire({
      title: "Opciones Guardadas!",
      icon: "success",
      confirmButtonText: "OK",
    })

    .then((value) => {
      switch (value) {
        default:
          setTimeout(function() {
            window.location.href = "index.php";
          }, 100);
          break;
      }
    });
</script>';
  //echo '<script src="script.js"></script>';
  //header('Location: ../views/user.php');
}


function editar_registro2()
{

  include("bd.php");

  $op1 = $_POST['op1'];
  $op2 = $_POST['op2'];
  $op3 = $_POST['op3'];
  $id = $_POST['id'];

  try {
    $conn = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE personas SET 
    Deseo1 ='" . $op1 . "',
    Deseo2 ='" . $op2 . "',
    Deseo3 ='" . $op3 . "'
    WHERE id='" . $id . "'";
    $conn->exec($sql);
    $last_id1 = $conn->lastInsertId();
    /*
    echo $sql;
    echo 'ultimo anime insertado ' . $last_id1;
    echo "<br>";
    */
  } catch (PDOException $e) {
    $conn = null;
    echo $e;
  }


  echo '<script>
  Swal.fire({
      title: "Opciones Guardadas!",
      icon: "success",
      confirmButtonText: "OK",
    })

    .then((value) => {
      switch (value) {
        default:
          setTimeout(function() {
            window.location.href = "admin.php";
          }, 100);
          break;
      }
    });
</script>';
  //echo '<script src="script.js"></script>';
  //header('Location: ../views/user.php');
}

function ruleta()
{

  include("bd.php");

  // creamos una tabla para almacenar los datos
  // Comprobar si la conexión se ha establecido correctamente
  if (!$conexion) {
    die("La conexión ha fallado: " . mysqli_connect_error());
  }

  // Preparar la consulta para seleccionar los usuarios
  $sql = "SELECT * FROM personas";
  $result = mysqli_query($conexion, $sql);

  // Comprobar si hay resultados
  if (mysqli_num_rows($result) > 0) {

    // Array para guardar los usuarios
    $usuarios = array();

    // Recorrer los resultados y guardarlos en un array
    while ($row = mysqli_fetch_assoc($result)) {
      $usuarios[] = $row;
    }

    // Mezclar el array para que los usuarios no tengan el mismo amigo secreto
    shuffle($usuarios);

    // Recorrer el array mezclado y asignar el amigo secreto
    for ($i = 0; $i < count($usuarios); $i++) {
      // Si es el último usuario, asignar el primero
      if ($i == count($usuarios) - 1) {
        $amigo_secreto = $usuarios[0]['Nombre_Personas'];
      }
      // Si no, asignar el siguiente
      else {
        $amigo_secreto = $usuarios[$i + 1]['Nombre_Personas'];
      }

      // Actualizar el usuario con su amigo secreto
      $sql = "UPDATE personas SET AmigoSecreto='" . $amigo_secreto . "' WHERE ID=" . $usuarios[$i]['ID'];
      $result = mysqli_query($conexion, $sql);
    }

    echo "Amigos secretos asignados correctamente";
  } else {
    echo "No hay usuarios en la base de datos";
  }

  // Cerrar la conexión con la base de datos
  mysqli_close($conexion);

  echo '<script>
  Swal.fire({
      title: "Ruleta Realizada",
      icon: "success",
      confirmButtonText: "OK",
    })

    .then((value) => {
      switch (value) {
        default:
          setTimeout(function() {
            window.location.href = "admin.php";
          }, 100);
          break;
      }
    });
</script>';
}


function nuevo_registro()
{
  include("bd.php");

  $nombre = $_POST['nombre'];
  $rut = $_POST['rut'];

  echo $nombre;
  echo $rut;

  try {
    $conn = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO personas (`Nombre_Personas`, `Rut`,Pass,rol)
    VALUES ( '" . $nombre . "','" . $rut . "',0,1)";
    $conn->exec($sql);
    $last_id2 = $conn->lastInsertId();

    echo $sql;
    echo 'ultimo anime insertado ' . $last_id2;
    echo "<br>";
  } catch (PDOException $e) {
    $conn = null;
  }

  try {
    $conn = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE personas SET Pass=LEFT(Rut,4);";
    $conn->exec($sql);
    $last_id3 = $conn->lastInsertId();

    echo $sql;
    echo 'ultimo anime insertado ' . $last_id3;
    echo "<br>";
  } catch (PDOException $e) {
    $conn = null;
  }
  
  echo '<script>
  Swal.fire({
      title: "Usuario Creado!",
      icon: "success",
      confirmButtonText: "OK",
    })

    .then((value) => {
      switch (value) {
        default:
          setTimeout(function() {
            window.location.href = "admin.php";
          }, 100);
          break;
      }
    });
</script>';

  //echo '<script src="script.js"></script>';
  //header('Location: ../views/user.php');¨

}

function acceso_user()
{
  $nombre = $_POST['nombre'];
  $password = $_POST['password'];
  session_start();
  $_SESSION['Nombre'] = $nombre;
  $pass = $password;

  include("bd.php");
  $resultado = mysqli_query($conexion, "SELECT * FROM personas WHERE Nombre_Personas='$nombre' AND Pass='$pass'");
  //echo "SELECT * FROM personas WHERE Nombre='$nombre' AND Pass='$pass'";
  $filas = mysqli_fetch_array($resultado);


  if (mysqli_num_rows($resultado) == 1) {
    if ($filas['rol'] == 1) { //user
      header('Location: index.php');
    } else if ($filas['rol'] == 2) { //admin
      header('Location: admin.php');
    } else {
      session_destroy();
    }
  } else {
    echo '<script>
  Swal.fire({
      title: "Usuario o Contraseña Incorrectos!",
      icon: "error",
      confirmButtonText: "OK",
    })

    .then((value) => {
      switch (value) {
        default:
          setTimeout(function() {
            window.location.href = "login.php";
          }, 100);
          break;
      }
    });
</script>';
  }
}
?>