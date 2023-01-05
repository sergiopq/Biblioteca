<?php 
    include('../../util/conexion.php');
    if(isset($_POST['identificacion'])) {
        $identificacion = $_POST['identificacion'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $estado = $_POST['estado'];

        $registros = mysqli_query($con, "SELECT * FROM usuarios WHERE usuDocumento ='$identificacion'");
        if($reg = mysqli_fetch_array($registros)){
            $upda = mysqli_query($con, "UPDATE usuarios SET usuNombre='$nombre', usuDireccion='$direccion', 
            usuTelefono='$telefono', usuCorreo='$correo', usuEstado='$estado'
            WHERE usuDocumento ='$identificacion'")
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