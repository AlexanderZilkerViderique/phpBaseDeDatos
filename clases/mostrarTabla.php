<?php
    require_once 'conexion.php';
    class TablaConsulta {
        private $conexion;

        public function __construct($conexion) {
            $this->conexion = $conexion;
        }
    
        public function mostrarTabla($consulta) {
            // Ejecutar la consulta
            $resultado = $this->conexion->getConnection()->query($consulta);
    
            // Verificar si se encontraron resultados
            if ($resultado->num_rows > 0) {
                // Mostrar los resultados en una tabla HTML con Bootstrap
                echo "<div class='container'>";
                echo "<h2 class='mt-5'>Resultados de la consulta</h2>";
                echo "<div class='table-responsive'>";
                echo "<table class='table table-striped mt-3'>";
                // Mostrar encabezados de columna
                echo "<thead class='thead-dark'>";
                echo "<tr>";
                while ($columna = $resultado->fetch_field()) {
                    echo "<th>" . $columna->name . "</th>";
                }
                echo "</tr>";
                echo "</thead>";
                // Mostrar datos de la consulta
                echo "<tbody>";
                while($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($fila as $valor) {
                        echo "<td>" . $valor . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "0 resultados";
            }
        }
    }
?>