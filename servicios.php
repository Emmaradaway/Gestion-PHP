<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio Médico</title>
    <link rel="stylesheet" href="./css/style_tablas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    <h1>Servicios</h1>
<!-- Tabla -->
        <div class="Tabla-medico">
            <div class="btnmedicos">
                <button class="btn-medicos" id="openModalBtn">Agregar</button>
            </div>
            <?php
            include "PHP/tabla_servicios.php";
            ?>
            <script src="./js/delete_servicios.js"></script>
        </div>
<!-- Modal form -->
        <div id="modal_servicio" class="modal">
            <div class="modal-content">
                <span class="cerrar">&times;</span>
                <h2>Datos del servicio</h2>
                <form class="form-modal" id="form_servicio">
                <input type="hidden" name="id" id="id_servicio">
                    <?php 
                    include "php/option_cliente.php";
                    include "php/option_mecanico.php";
                    include "php/option_carro.php";
                    ?>
                <label for="fecha_ingreso">Fecha de ingreso:</label>
                <input type="date" name="f-i"  id="f-i" >
                <label for="servicio">Servico:</label>
                <input type="text" name="servicio" id="servicio">
                <label for="f_s">Fecha de salida:</label>
                <input type="date" name="f_s" id="f_s">
                    <button type="submit" class="guardar" id="abrir_info_medica">Continuar</button>
                </form>
            </div>
            <script src="./js/adm_servicios.js"></script>
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