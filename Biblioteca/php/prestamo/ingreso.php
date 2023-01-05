<?php 
    include('../../util/conexion.php');
    if(isset($_POST['codigo']) && isset($_POST['fecha']) && isset($_POST['usuNom'])) {
        $ins = mysqli_query($con, "INSERT INTO prestamos (preCodigo , preUsuario, preFecha) 
        VALUES('$_POST[codigo]', '$_POST[usuNom]', '$_POST[fecha]')")
        or die("Problemas en el select ".mysqli_error($con));
        echo "<script>
        location.href='../../views/prestamo.php?accion=prestamo&dato1=$_POST[fecha]&dato2=$_POST[usuNom]&dato3=$_POST[codigo]';
        alert('Los datos se guardaron correctamente');
            </script>";
        if(isset($ins)){
        }else{
            echo "<script>
            alert('Los datos no se guardaron');
                location.href='../../views/prestamo.php?accion=prestamo';
                </script>";
        }
    }
    if(isset($_REQUEST['libro']) && isset($_POST['dato1']) && isset($_POST['dato2']) && isset($_POST['dato3']) && isset($_POST['libNom']) && isset($_POST['cantidad']) && isset($_POST['limite'])) {
        $ins = mysqli_query($con, "INSERT INTO detalle_prestamo (dtpPrestamo, dtpLibro, dtpCantidad, dtpFechaFin) 
        VALUES('$_POST[dato3]', '$_POST[libNom]', '$_POST[cantidad]', '$_POST[limite]')")
        or die("Problemas en el select ".mysqli_error($con));
            echo "<script>
            alert('Los datos se guardaron correctamente');
            location.href='../../index.html';
                </script>";
        if (isset($ins)){

        }
        else{
            echo "<script>
            alert('Los datos no se guardaron');
                location.href='../../views/prestamo.php?accion=prestamo&dato1=$_POST[dato1]&dato2=$_POST[dato2]&dato3=$_POST[dato3]';
                </script>";
        }
    }

?>