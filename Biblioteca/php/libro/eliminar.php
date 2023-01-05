<?php 
    include('../../util/conexion.php');
    if(isset($_POST['codigo'])) {
        $codigo = $_POST['codigo'];

        $registros = mysqli_query($con, "SELECT * FROM libros WHERE libCodigo ='$codigo'");
        if($reg = mysqli_fetch_array($registros)){
            $upda = mysqli_query($con, "DELETE FROM libros WHERE libCodigo ='$codigo'")
            or die("Problemas en el select ".mysqli_error($con));
            echo "<script>
            location.href='../../views/libro.php?accion=consultar';
            alert('El registro fue eliminado exitosamente');
            </script>";
        }else{
            echo "<script>
            alert('El registro no pudo ser eliminado');
            location.href='../../views/libro.php?accion=eliminar&libNom=$codigo';
            </script>";
        }
    }
?>