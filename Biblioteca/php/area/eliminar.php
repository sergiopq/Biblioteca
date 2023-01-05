<?php 
    include('../../util/conexion.php');
    if(isset($_POST['codigo'])) {
        $codigo = $_POST['codigo'];

        $registros = mysqli_query($con, "SELECT * FROM areas WHERE areCodigo ='$codigo'");
        if($reg = mysqli_fetch_array($registros)){
            $upda = mysqli_query($con, "DELETE FROM areas WHERE areCodigo ='$codigo'")
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