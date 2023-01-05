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
                        <form action="../php/usuario/ingreso.php" class="register" method="POST">
                            <h1>Ingresar Nuevo Usuario</h1>
                            <div class="area">
                                <label>Identificación: &nbsp<input class="new" type="text" name="identificacion" required><br></label>
                                <label>Nombre: &nbsp<input class="new" type="text" name="nombre" required><br></label>
                                <label>Dirección: &nbsp<input class="new" type="text" name="direccion" required><br></label>
                                <label>Telefono: &nbsp<input class="new" type="text" name="telefono" required><br></label>
                                <label>Correo: &nbsp<input class="new" type="text" name="correo" required><br></label>
                                <label>Estado: &nbsp
                                    <select class="new" name="estado">
                                        <option disabled selected >Seleccione</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Sancionado">Sancionado</option>
                                    </select>
                                </label><br>
                                <input class="boton" type="submit" value="Guardar">
                            </div>
                        </form>
                    <?php } else if($accion == 'consultar' || $accion == 'modificar' || $accion == 'eliminar'){ ?>
                        <form action="usuario.php?accion=<?php echo $accion ?>" class="register" method="post">
                            <h1>Consultar Usuario</h1>
                            <div class="area">
                                <label>Ingrese el documento: &nbsp
                                    <input class="new" name="usuNom" required>
                                <br>
                                <input class="boton" type="submit" value="Consultar">
                            </div>
                        </form>
                        <?php if($accion == 'consultar'){ ?>
                            <div class="tabla">
                                <table>
                                    <tr>
                                        <th>Identificación</th>
                                        <th>Nombre</th>
                                        <th>Dirección</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Estado</th>
                                    </tr>
                                    <?php if($accion == 'consultar' && isset($_REQUEST['usuNom'])){
                                        $registros = mysqli_query($con, "SELECT * FROM usuarios WHERE usuDocumento = $_REQUEST[usuNom]");
                                        while($reg = mysqli_fetch_array($registros)){
                                            echo "<tr>
                                                    <td>$reg[usuDocumento]</td>
                                                    <td>$reg[usuNombre]</td>
                                                    <td>$reg[usuDireccion]</td>
                                                    <td>$reg[usuTelefono]</td>
                                                    <td>$reg[usuCorreo]</td>
                                                    <td>$reg[usuEstado]</td>
                                                </tr>";
                                        }
                                    } else {
                                        $registros = mysqli_query($con, "SELECT * FROM usuarios");
                                        while($reg = mysqli_fetch_array($registros)){
                                            echo "<tr>
                                                    <td>$reg[usuDocumento]</td>
                                                    <td>$reg[usuNombre]</td>
                                                    <td>$reg[usuDireccion]</td>
                                                    <td>$reg[usuTelefono]</td>
                                                    <td>$reg[usuCorreo]</td>
                                                    <td>$reg[usuEstado]</td>
                                                </tr>";
                                        }
                                    } ?>
                                </table>
                            </div>
                        <?php } else if($accion == 'modificar' && isset($_REQUEST['usuNom'])) {
                            $registros = mysqli_query($con, "SELECT * FROM usuarios WHERE usuDocumento = $_REQUEST[usuNom]");
                            if($reg = mysqli_fetch_array($registros)){
                                $estado = array('Activo', 'Sancionado'); ?>
                                <form action='../php/usuario/modificar.php' class='register' method='POST'>
                                    <div class='area'>
                                        <input class="new" type="hidden" name="identificacion" value="<?php echo $reg['usuDocumento'] ?>"
                                        <label>Nombre Usuario: &nbsp<input class="new" type="text" name="nombre" value="<?php echo $reg['usuNombre'] ?>" required><br></label>
                                        <label>Dirección Usuario: &nbsp<input class="new" type="text" name="direccion" value="<?php echo $reg['usuDireccion'] ?>" required><br></label>
                                        <label>Telefono Usuario: &nbsp<input class="new" type="text" name="telefono" value="<?php echo $reg['usuTelefono'] ?>" required><br></label>
                                        <label>Correo Usuario: &nbsp<input class="new" type="text" name="correo" value="<?php echo $reg['usuCorreo'] ?>" required><br></label>
                                        <label>Estado Usuario: &nbsp
                                            <select class="new" name="estado">
                                                <?php
                                                    for ($i=0; $i < count($estado); $i++) { 
                                                        if($estado[$i] == $reg['usuEstado']) {
                                                            echo "<option value='$estado[$i]' selected>$estado[$i]</option>";
                                                        } else {
                                                            echo "<option value='$estado[$i]'>$estado[$i]</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </label><br>
                                        <input class='boton' type='submit' value='Guardar'>
                                    </div>
                                </form>
                            <?php }
                        } else if($accion == 'eliminar' && isset($_REQUEST['usuNom'])){
                            $registros = mysqli_query($con, "SELECT * FROM usuarios WHERE usuDocumento = $_REQUEST[usuNom]");
                                while($reg = mysqli_fetch_array($registros)){
                                    echo "<form action='../php/usuario/eliminar.php' class='register' method='POST'>
                                            <div class='area'>
                                                <label>Seguro que desea eliminar el usuario</label><br>
                                                <input type='hidden' name='identificaion' value='$reg[usuDocumento]'>
                                                <a href='/punto6/views/usuario.php?accion=consultar'>Volver</a>
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
            <a href="../mapa.html"  class="map">Mapa del sitio</a>
            </footer>
        </div>
    </body>

</html>
