<?php 

function getLibros(){
        include('../../util/conexion.php');
        $idUsuario = $_POST['usuario'];
        $selpres = mysqli_query($con, "SELECT * FROM prestamos
         INNER JOIN detalle_prestamo ON detalle_prestamo.dtpPrestamo = Prestamos.preCodigo
         WHERE preUsuario = '$idUsuario'");
        $libros = "<option value='0'>Elige el Libro</option>";

        while($reg = mysqli_fetch_array($selpres)){
            if($reg['dtpFechaDev'] == null){
                $seldtp = mysqli_query($con, "SELECT * FROM libros WHERE libCodigo = '$reg[dtpLibro]'");
                while($lib = mysqli_fetch_array($seldtp)){
                    $libros .= "<option value='$lib[libCodigo]'>$lib[libNombre]</option>";
                }
            }
        }
        return $libros;
    }
    echo getLibros();
?>