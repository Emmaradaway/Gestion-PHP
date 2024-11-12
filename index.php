<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio Médico</title>
    <link rel="stylesheet" href="./css/style .css">
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
        <!-- Presentacion -->
        <div class="content">
            <h1 id="typewriter-text">
                "La calidad en cada ajuste, la confianza en cada entrega. ¡Estamos aquí para poner tu camino en marcha!"
            </h1>
            <div class="buttons">
                <button id="openModalBtn_2">Agregar cliente</button>
                <button id="openModalBtn_3">Agregar carro</button>
                <button id="openModalBtn">Agregar servicio</button>

            </div>
        </div>

        <!-- Modal para agregar clientes -->
        <div id="modal_cliente" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Datos del cliente</h2>
                <form method="post" class="form-modal" id="form_agregar_cliente">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" maxlength="50" required>
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" maxlength="12" pattern="[0-9]{10}" required>
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" maxlength="100" required>
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" maxlength="50" required>

                    <button type="submit" class="guardar">Continuar</button>
                </form>
            </div>
            <script src="./js/open_modal_agregar_cliente.js"></script>
        </div>

        <!-- Modal para agregar carro -->
        <div id="modal_carro" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Datos del carro</h2>
                <form method="post" class="form-modal" id="form_carro">
                    <label for="placas">Placas:</label>
                    <input type="text" id="placas" name="placas" maxlength="10" required>

                    <!-- Campo de Año -->
                    <label for="anio">Año:</label>
                    <input type="number" id="year " name="year" min="1900" max="2099" step="1" required>

                    <!-- Campo de Modelo -->
                    <label for="modelo">Modelo:</label>
                    <input type="text" id="modelo" name="modelo" maxlength="20" required>

                    <!-- Campo de Marca -->
                    <label for="marca">Marca:</label>
                    <input type="text" id="marca" name="marca" maxlength="20" required>

                    <!-- Campo de Color -->
                    <label for="color">Color:</label>
                    <input type="text" id="color" name="color" maxlength="20">
                    <?php
                    include "./php/option_cliente.php";
                    ?>
                    <button type="submit" class="guardar" id="enviarhora">Continuar</button>
                </form>
            </div>
            <script src="js/open_modal_agregar_carro.js"></script>
        </div>

        <!-- Modal para agregar servicios -->

        <div id="modal_servicio" class="modal">
            <div class="modal-content">
                <span class="cerrar">&times;</span>
                <h2>Datos del servicio</h2>
                <form class="form-modal" id="form_servicio">
                    <?php 
                    include "php/option_cliente.php";
                    include "php/option_mecanico.php";
                    include "php/option_carro.php";
                    ?>
                <label for="fecha_ingreso">Fecha de ingreso:</label>
                <input type="date" name="f-i" >
                <label for="servicio">Servico:</label>
                <input type="text" name="servicio">
                    <button type="submit" class="guardar" id="abrir_info_medica">Continuar</button>
                </form>
            </div>
            <script src="js/open_modal_agregar_servicio.js"></script>
        </div>
    </main>

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