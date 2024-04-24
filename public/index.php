<?php
    require_once '../clases/estudiante.php';
    require_once '../clases/conexion.php';
    require_once '../clases/mostrarTabla.php';

    // Incluir el encabezado
    include '../templates/header.php';

    // Incluir el formulario
    include '../templates/form.php';

    $conexion = new Conexion();
    $conexion->conectar();
    $conn = $conexion->getConnection();

    // Verificar si se han enviado datos por el método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Recoger los datos del formulario
        $ci = $_POST["ci"];
        $nombre = $_POST["nombre"];
        $fecha_nac = $_POST["fecha_nac"];
        $direccion = $_POST["direccion"];

        // Crear un objeto Estudiante con los datos recibidos
        $estudiante = new Estudiante($ci, $nombre, $fecha_nac, $direccion);
        // Insertar datos del estudiante en la base de datos
        $sql = "INSERT INTO tbl_alumno (ci, nombre, fecha_nac, direccion) VALUES ('" . $estudiante->getCI() . "', '" . $estudiante->getNombre() . "', '$fecha_nac', '$direccion')";

        if ($conn->query($sql) === TRUE) {
            //echo "Datos insertados correctamente en la base de datos <br>";
        } else {
            echo "Error al insertar datos: <br>" . $conn->error;
        }
    }

    $tablaConsulta = new TablaConsulta($conexion);
    $consulta = "SELECT * FROM tbl_alumno";
    $tablaConsulta->mostrarTabla($consulta);

    // Cerrar la conexión
    $conn->close();

    // Incluir el pie de página
    include '../templates/footer.php';
?>
