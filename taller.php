<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio Médico</title>
    <link rel="stylesheet" href="./css/style_tablas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="js/checkbox.js"></script>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <a href="index.php"><img src="recursos/Logo_meacnicopng.png" alt="Logo de consultorio"></a>
        </div>
        <nav>
            <button class="hamburger" aria-label="Menú">
                &#9776;
            </button>
            <ul class="links">
                <li><a href="index.php">Pagina principal</a></li>
                <li><a href="servicios.php">Servicios</a></li>
                <li><a href="clientes.php">Clientes</a></li>
                <li><a href="carros.php">Carros</a></li>
                <li><a href="notas.php">Notas</a></li>

                <li><a href="taller.php">Administrar taller</a></li>
            </ul>
        </nav>
        <script src="./js/openburger.js"></script>
    </header>
    <div class="line"></div>

    <main>
    <h1>Taller</h1>
    
    <div class="checkbox-container">
    <label>
        <input type="checkbox" name="option" value="1" onclick="showOption(this)">
        <span class="checkbox-custom">Mecanicos</span>
    </label>
    <label>
        <input type="checkbox" name="option" value="2" onclick="showOption(this)">
        <span class="checkbox-custom">Cajeros</span>
    </label>
    <label>
        <input type="checkbox" name="option" value="3" onclick="showOption(this)">
        <span class="checkbox-custom">Formas de pago</span>
    </label>
</div>


    <div  id="option_1" class="option-section" style="display: none;">
    <div class="Tabla-medico">
            <div class="btnmedicos">
                <button class="btn-medicos" id="openModalBtn1">Agregar</button>
            </div>
            <?php
            include "php/tabla_mecanico.php";
            ?>
        </div>
        <div id="modal_mecanico" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Datos del mecanico</h2>
                <form method="post" class="form-modal" id="form_mecanicos">
                <input type="hidden" name="id_mecanico" id="id_mecanico">
           
<label for="nombre_mecanico">Nombre del Mecánico:</label>
<input type="text" id="nombre_mecanico" name="Nombre_mecanico" required>

<label for="telefono">Teléfono:</label>
<input type="tel" id="telefono" name="telefono" required>

<label for="direccion">Dirección:</label>
<input type="text" id="direccion" name="Direccion" required>

<label for="rfc">RFC:</label>
<input type="text" id="rfc" name="RFC" required>

<label for="n_estudios">Nivel de Estudios:</label>
<input type="text" id="n_estudios" name="N_estudios" required>

<label for="curp">CURP:</label>
<input type="text" id="curp" name="CURP" required>

<label for="carrera">Carrera:</label>
<input type="text" id="carrera" name="Carrera" required>

                    <button type="submit" class="guardar">Continuar</button>
                </form>
            </div>
            <script src="js/adm_mecanicos.js"></script>
        </div>
    </div>
       



    <div  id="option_2" class="option-section" style="display: none;">
    <div class="Tabla-medico">
            <div class="btnmedicos">
                <button class="btn-medicos" id="openModalBtn2">Agregar</button>
            </div>
            <?php
            include "PHP/tabla_cajero.php";
            ?>
        </div>
<!-- Modal form -->
     
        <!-- Modal para agregar cajeros -->
        <div id="modal_cajero" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Datos del cajero</h2>
                <form method="post" class="form-modal" id="form_cajero">
                <input type="hidden" name="id_mecanico" id="id_cajero">
                <label for="Nombre_cajero">Nombre:</label>
<input type="text" name="Nombre_cajero" id="Nombre_cajero" required>

<label for="Telefono_cajero">Teléfono:</label>
<input type="tel" name="Telefono_cajero" id="Telefono_cajero" required>

<label for="Correo_cajero">Correo:</label>
<input type="email" name="Correo_cajero" id="Correo_cajero" required>

                    <button type="submit" class="guardar">Continuar</button>
                </form>
            </div>
            <script src="js/adm_cajeros.js"></script>

        </div>



    </div>
       


    <div  id="option_3" class="option-section" style="display: none;">
    <div class="Tabla-medico">
            <div class="btnmedicos">
                <button class="btn-medicos" id="openModalBtn3">Agregar</button>
            </div>
            <?php
            include "php/tabla_pago.php";
            ?>
        </div>
<!-- Modal form -->
     
        <!-- Modal para agregar clientes -->
        <div id="modal_pago" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Datos del cliente</h2>
                <form method="post" class="form-modal" id="form_pago">
                <input type="hidden" name="id_mecanico" id="id_pago">
           <label for="">Descripción:</label>
           <input type="text" name="pago" id="pago">
                    <button type="submit" class="guardar">Continuar</button>
                </form>
            </div>
            <script src="js/adm_pago.js"></script>
        </div>

    </div>

    <!-- Footer -->
    <div class="line"></div>
    <footer id="footer">
        <div class="container">
            <div class="footer-content">
                <div class="contact-info">
                    <p>Contacto:</p>
                    <p>Email: ema63298@gmail.com</p>
                    <p>Teléfono: +1 234 567 89</p>
                </div>
                <div class="footer-social">
                    <a href="https://www.instagram.com/ema.ds3/profilecard/?igsh=M2VkZXUxNWxuajl0" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://github.com/Emmaradaway" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="https://Discordapp.com/users/727192048226009160" aria-label="Discord"><i class="fab fa-discord"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>