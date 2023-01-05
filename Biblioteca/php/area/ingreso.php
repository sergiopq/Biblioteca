<?php 
    include('../../util/conexion.php');
     $ins = mysqli_query($con, "INSERT INTO areas (areCodigo, areNombre, areTiempo) 
    VALUES('$_POST[codigo]', '$_POST[nombre]', '$_POST[tiempo]')")
    or die("Problemas en el select ".mysqli_error($con));
    if(isset($ins)){
        echo "<script>
        location.href='../../index.html';
        alert('Los datos se guardaron correctamente');
            </script>";
    }else{
        echo "<script>
            location.href='../../views/area.php?accion=ingresar';
            alert('Los datos no se guardaron');
            </script>";
    }

?>