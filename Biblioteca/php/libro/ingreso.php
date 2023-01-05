<?php 
    include('../../util/conexion.php');
     $ins = mysqli_query($con, "INSERT INTO libros (libCodigo , libNombre, libNumPag, libAutor, libEditorial, libArea) 
    VALUES('$_POST[codigo]', '$_POST[nombre]', '$_POST[cantidadPg]', '$_POST[autor]', '$_POST[editorial]', '$_POST[arNom]')")
    or die("Problemas en el select ".mysqli_error($con));
    if(isset($ins)){
        echo "<script>
        location.href='../../index.html';
        alert('Los datos se guardaron correctamente');
            </script>";
    }else{
        echo "<script>
        location.href='../../index.html';
        alert('Los datos no se guardaron');
            </script>";
    }

?>