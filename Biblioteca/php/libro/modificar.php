
<?php 
    include('../../util/conexion.php');
    if(isset($_POST['codigo'])) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $cantidadPg = $_POST['cantidadPg'];
        $autor = $_POST['autor'];
        $editorial = $_POST['editorial'];
        $arNom = $_POST['arNom'];
        
        $registros = mysqli_query($con, "SELECT * FROM libros WHERE libCodigo =$codigo");
        if($reg = mysqli_fetch_array($registros)){
            $upda = mysqli_query($con, "UPDATE libros SET libNombre='$nombre', libNumPag=$cantidadPg, 
            libAutor='$autor', libEditorial='$editorial', libArea='$arNom' WHERE libCodigo =$codigo") 
            or die("Problemas en el select ".mysqli_error($con));
            echo "<script>
            location.href='../../index.html';
            alert('Se modifico con exito');
            </script>";
        }else{
            echo "<script>
            alert('El registro no pudo ser modificado');
            location.href='../../index.html';
            </script>";
        }
    }
?>