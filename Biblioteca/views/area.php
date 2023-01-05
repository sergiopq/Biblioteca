<?php 
    include('../shared/header.php');
    include('../util/conexion.php');
?>
    <body>
        <?php include('../shared/menu.php'); ?>
            <main>
                <?php if(isset($_REQUEST['accion'])) {
                    $accion = $_REQUEST['accion'];
                    if($accion == 'ingresar'){?>
                <form action="../php/area/ingreso.php" class="register" method="POST">
                    <h1>Ingresar Nueva Área</h1>
                    <div class="area">
                        <label>Código Área: &nbsp<input class="new" type="text" name="codigo" required><br></label>
                        <label>Nombre Área: &nbsp<input class="new" type="text" name="nombre" required><br></label>
                        <label>Tiempo máx: &nbsp<input class="new" type="number" name="tiempo" required><br></label>
                        <input class="boton" type="submit" value="Guardar">
                    </div>
                </form>
                    <?php } else if($accion == 'consultar' || $accion == 'modificar' || $accion == 'eliminar'){ ?>
                        <form action="area.php?accion=<?php echo $accion ?>" class="register" method="post">
                            <h1>Consultar Área</h1>
                            <div class="area">
                                    <label>Ingrese el area: &nbsp
                                    <input class="new" name="arNom" required>
                                </label><br>
                                <input class="boton" type="submit" value="Consultar">
                            </div>
                        </form>
                        <?php if($accion == 'consultar'){ ?>
                            <div class="tabla">
                                <table>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Tiempo</th>
                                    </tr>
                                    <?php if($accion == 'consultar' && isset($_REQUEST['arNom'])){
                                        $registros = mysqli_query($con, "SELECT * FROM areas WHERE areCodigo = $_REQUEST[arNom]");
                                        while($reg = mysqli_fetch_array($registros)){
                                            echo "<tr>
                                                    <td>$reg[areCodigo]</td>
                                                    <td>$reg[areNombre]</td>
                                                    <td>$reg[areTiempo]</td>
                                                </tr>";
                                        }
                                    } else {
                                        $registros = mysqli_query($con, "SELECT * FROM areas");
                                        while($reg = mysqli_fetch_array($registros)){
                                            echo "<tr>
                                                    <td>$reg[areCodigo]</td>
                                                    <td>$reg[areNombre]</td>
                                                    <td>$reg[areTiempo]</td>
                                                </tr>";
                                        }
                                    } ?>
                                </table>
                            </div>
                        <?php } else if($accion == 'modificar' && isset($_REQUEST['arNom'])) {
                            $registros = mysqli_query($con, "SELECT * FROM areas WHERE areCodigo = $_REQUEST[arNom]");
                            while($reg = mysqli_fetch_array($registros)){
                                echo "<form action='../php/area/modificar.php' class='register' method='POST'>
                                        <div class='area'>
                                            <input class='new' type='hidden' name='codigo' value='$reg[areCodigo]' required>
                                            <label>Nombre Área: &nbsp<input class='new' type='text' name='nombre' value='$reg[areNombre]' required><br></label>
                                            <label>Tiempo máx: &nbsp<input class='new' type='number' name='tiempo' value='$reg[areTiempo]' required><br></label>
                                            <input class='boton' type='submit' value='Modificar'>
                                        </div>
                                    </form>";
                            }
                        } else if($accion == 'eliminar' && isset($_REQUEST['arNom'])){
                            $registros = mysqli_query($con, "SELECT * FROM areas WHERE areCodigo = $_REQUEST[arNom]");
                                while($reg = mysqli_fetch_array($registros)){
                                    echo "<form action='../php/area/eliminar.php' class='register' method='POST'>
                                            <div class='area'>
                                                <label>Seguro que desea eliminar el registro</label><br>
                                                <input type='hidden' name='codigo' value='$reg[areCodigo]'>
                                                <a href='/punto6/views/area.php?accion=consultar'>Volver</a>
                                                <input class='boton' type='submit' value='Eliminar'>
                                            </div>
                                        </form>";
                                }
                        } ?>
                    <?php } ?>
                <?php } ?>
            </main>
            <footer>
            <p> © Todos los derechos reservados 2022 </p>
            <a href="../mapa.html" class="map">Mapa del sitio</a>
            </footer>
        </div>
    </body>

</html>