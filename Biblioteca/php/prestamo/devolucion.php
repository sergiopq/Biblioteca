<?php 
    include('../../util/conexion.php');
    if(isset($_POST['fechaDev']) && isset($_POST['usuNom']) && isset($_POST['libNom'])) {
        $sel = mysqli_query($con, "SELECT * FROM prestamos WHERE preUsuario = '$_POST[usuNom]'");
        if($reg = mysqli_fetch_array($sel)){
            $detpPres = $reg['preCodigo'];
            $upda = mysqli_query($con, "UPDATE detalle_prestamo SET dtpFechaDev = '$_POST[fechaDev]' 
            WHERE dtpPrestamo = '$detpPres' AND dtpLibro = '$_POST[libNom]'")
            or die("Problemas en el select ".mysqli_error($con));
            echo "<script>
                alert('Se devolvio el libro')
                location.href='../../index.html';
                </script>";
            if(isset($upda)){
            } else{
            echo "<script>
                location.href='../../views/libro.php?accion=consultar';
                alert('Los datos no se guardaron');
                </script>";
        }
        } else{
            echo "<script>
                location.href='../../views/prestamo.php?accion=prestamo';
                alert('No se encontro el prestamo');
                </script>";
        }
    }
    if(isset($_REQUEST['libro']) && isset($_POST['dato1']) && isset($_POST['dato2']) && isset($_POST['dato3']) && isset($_POST['libNom']) && isset($_POST['cantidad']) && isset($_POST['limite'])) {
        $ins = mysqli_query($con, "INSERT INTO detalle_prestamo (dtpPrestamo, dtpLibro, dtpCantidad, dtpFechaFin) 
        VALUES('$_POST[dato3]', '$_POST[libNom]', '$_POST[cantidad]', '$_POST[limite]')")
        or die("Problemas en el select ".mysqli_error($con));
        if(isset($ins)){
            echo "<script>
                location.href='../../views/prestamo.php?accion=prestamo&dato1=$_POST[dato1]&dato2=$_POST[dato2]&dato3=$_POST[dato3]';
                </script>";
        }else{
            echo "<script>
                location.href='../../views/prestamo.php?accion=prestamo&dato1=$_POST[dato1]&dato2=$_POST[dato2]&dato3=$_POST[dato3]';
                alert('Los datos no se guardaron');
                </script>";
        }
    }

?>