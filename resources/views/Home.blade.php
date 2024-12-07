<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/body.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid d-flex align-items-center"> <!-- Añadido d-flex para usar flexbox -->
            <!-- Texto de bienvenida con nombre dinámico -->
            <span class="navbar-text">
                ¡BIENVENIDO, <strong>XXX-XXX-XXX</strong>!
                <img src="{{ asset('images/musculo.png') }}" alt="Foto de perfil" class="rounded-circle"
                    style="width: 30px; height: 30px; margin-right: 10px; margin-top:-15px;">
            </span>

            <!-- Buscador -->
            <form class="d-flex me-3 search-form" role="search">
                <div class="position-relative">
                    <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                    <i class="bi bi-search search-icon"></i>
                </div>
            </form>

            <!-- Línea vertical -->
            <div class="vr text-white"></div>
            <a href="#" class="nav-link">
                <i class="bi bi-cloud-fill text-white" style="font-size: 1.8rem;"></i>
            </a>

            <!-- Icono de notificación -->
            <a href="#" class="nav-link">
                <i class="bi bi-bell text-white" style="font-size: 1.5rem;"></i>
            </a>

            <!-- Foto de perfil, nombre, correo y estado -->
            <div class="divn d-flex align-items-center "> <!-- Añadido ms-auto para mover a la izquierda -->
                <!-- Foto de la persona -->
                <img src="{{ asset('images/iconoperfil.png') }}" alt="Foto de perfil" class="rounded-circle"
                    style="width: 40px; height: 40px; margin-right: 5vh; ">

                <!-- Nombre y correo -->
                <div class="d-flex flex-column ">
                    <span><strong style="color: white;">Nombredelapers</strong></span>
                    <span
                        style="font-size: 0.8rem; color: rgba(255, 255, 255, 0.5); margin-right:20vh;">correo@ejemplo.com</span>
                </div>

                <!-- Indicador de estado (bolita verde) -->
                <div class="position-relative">
                    <span class="position-absolute translate-middle p-1 bg-success border border-light rounded-circle"
                        style="top: -5px; right: 15vh;"></span>
                </div>

                <!-- Ícono para desplegar menú (flecha hacia abajo) -->
                <a href="#" class="nav-link" style="margin-top: -20px;">
                    <i class="nav-dropdown-icon" style="font-size: 1.5rem;"></i>
                </a>
            </div>
        </div>
    </nav>

    <nav class="menu">
        <div class="menudentro">
            <a href="https://www.example.com">
                <img class="logo" src="{{ asset('images/logoseinco.png') }}" alt="Descripción de la imagen">
            </a>
            <hr class="linea">

            <ul class="list-unstyled">
                <li>
                    <a class="item-link active" href="#">
                        <img src="{{ asset('images/hogar.png') }}" alt="Descripción de la imagen" class="icono">
                        Inicio
                    </a>
                </li>
                <li>
                    <a class="item-link" href="#">
                        <img src="{{ asset('images/proyectos.png') }}" alt="Descripción de la imagen" class="icono">
                        Proyectos
                    </a>
                </li>
                <li>
                    <a class="item-link" href="#">
                        <img src="{{ asset('images/herramientas.png') }}" alt="Descripción de la imagen" class="icono1">
                        Herramientas y Materiales
                    </a>
                </li>
                <li>
                    <a class="item-link" href="#">
                        <img src="{{ asset('images/manodeobra.png') }}" alt="Descripción de la imagen" class="icono">
                        Mano de Obra
                    </a>
                </li>
                <li>
                    <a class="item-link" href="#">
                        <img src="{{ asset('images/reportes.png') }}" alt="Descripción de la imagen" class="icono2">
                        Reportes
                    </a>
                </li>

                <h1 class="Ayuda">Ayuda & Soporte</h1>
                <li>
                    <a class="item-link" href="#">
                        <img src="{{ asset('images/ajuste.png') }}" alt="Descripción de la imagen" class="icono">
                        Ajustes
                    </a>
                </li>
                <li>
                    <a class="item-link" href="#">
                        <img src="{{ asset('images/cerrarse.png') }}" alt="Descripción de la imagen" class="icono2">
                        Cerrar sesión
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="yellow-boxes">
            <div class="box yellow">
                <button class="btncrear">
                    <i class="bi bi-plus"></i>
                    Crear Nuevo Proyecto
                </button>
                <button class="btnsubir">
                    <img src="{{ asset('images/carpeta.png') }}" alt="Descripción de la imagen" class="imagenbo">
                    <h1 class="subir">Subir Excel</h1>
                    <img src="{{ asset('images/Excel.png') }}" alt="Descripción de la imagen" class="iconoexcel">
                    <h1 class="archivos">Archivos.xlsx</h1>
                </button>

            </div>
            <div class="box yellow">gg</div>
        </div>
        <div class="box red">
            <div class="filtros">
                shhs
            </div>
            <div class="buscador">svf</div>

        </div>
        <div class="container2">
            <div class="icon-container">
                <img src="{{ asset('images/iconoperfil.png') }}" alt="Descripción de la imagen" class="iconoperfil">
            </div>
            <div class="datos">
                <span><strong style="color: white;">Nombredelapers</strong></span>
                <span style="font-size: 0.8rem; color: rgba(255, 255, 255, 0.5);">correo@ejemplo.com</span>
            </div>

            <div class="Herramientas">
                <h1 class="tituloherr">Total de Herramientas</h1>
                <div class="containergr">
                    <div class="leftgr">
                        <!-- Contenido del div izquierdo -->
                        <p>Contenido izquierdo</p>
                    </div>
                    <div class="rightgr">
                        <!-- Contenido del div derecho -->
                        <p>Contenido derecho</p>
                    </div>
                </div>

                <div class="pie">usus</div>
            </div>
            <div class="Materiales">
                <h1 class="titulomat">Total de Materiales</h1>
                <div class="containergr">
                    <div class="leftgr">
                        <!-- Contenido del div izquierdo -->
                        <p>Contenido izquierdo</p>
                    </div>
                    <div class="rightgr">
                        <!-- Contenido del div derecho -->
                        <p>Contenido derecho</p>
                    </div>
                </div>
                <div class="pie">usus</div>
            </div>
            <div class="Manodeobra">
                <h1 class="titulomano">Total de Mano de Obra</h1>
                <div class="containergr">
                    <div class="leftgr">
                        <!-- Contenido del div izquierdo -->
                        <p>Contenido izquierdo</p>
                    </div>
                    <div class="rightgr">
                        <!-- Contenido del div derecho -->
                        <p>Contenido derecho</p>
                    </div>
                </div>
                <div class="pie">usus</div>
            </div>
        </div>



</body>

</html>