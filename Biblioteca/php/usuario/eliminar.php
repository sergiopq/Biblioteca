<?php 
    include('../../util/conexion.php');
    if(isset($_POST['identificaion'])) {
        $identificaion = $_POST['identificaion'];

        $registros = mysqli_query($con, "SELECT * FROM usuarios WHERE usuDocumento ='$identificaion'");
        if($reg = mysqli_fetch_array($registros)){
            $upda = mysqli_query($con, "DELETE FROM usuarios WHERE usuDocumento  ='$identificaion'")
            or die("Problemas en el select ".mysqli_error($con));
            echo "<script>
            location.href='../../index.html';
            alert('El registro fue eliminado exitosamente');
            </script>";
        }else{
            echo "<script>
            alert('El registro no pudo ser eliminado');
            location.href='../../index.html';
            </script>";
        }
    }
?>