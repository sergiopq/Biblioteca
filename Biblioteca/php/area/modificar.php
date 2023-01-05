<?php 
    include('../../util/conexion.php');
    if(isset($_POST['codigo'])) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $tiempo = $_POST['tiempo'];

        $registros = mysqli_query($con, "SELECT * FROM areas WHERE areCodigo ='$codigo'");
        if($reg = mysqli_fetch_array($registros)){
            $upda = mysqli_query($con, "UPDATE areas SET areNombre='$nombre', areTiempo='$tiempo' WHERE areCodigo ='$codigo'")
            or die("Problemas en el select ".mysqli_error($con));
            echo "<script>
            location.href='../../index.html';
            alert('El registro fue modificado exitosamente');
            </script>";
        }else{
            echo "<script>
            alert('El registro no pudo ser modificado');
            location.href='../../index.html';
            </script>";
        }
    }
?>