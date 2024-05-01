<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     @vite('resources/js/app.js')
     @vite('resources/css/app.css')
    <title>Inicio</title>
</head>
<body class="bg-gray-100">
<header>
  
    
    <style>
    ul.breadcrumb li+li::before {
        content: "\276F";
        padding-left: 8px;
        padding-right: 4px;
        color: inherit;
    }

    ul.breadcrumb li span {
        opacity: 60%;
    }

    #sidebar {
        -webkit-transition: all 300ms cubic-bezier(0, 0.77, 0.58, 1);
        transition: all 300ms cubic-bezier(0, 0.77, 0.58, 1);
    }

    #sidebar.show {
        transform: translateX(0);
    }

    #sidebar ul li a.active {
        background: #1f2937;
        background-color: #1f2937;
    }
</style>

<nav id="navbar" class="fixed top-0 z-40 flex w-full justify-between items-center bg-gray-700 px-4 sm:px-8">
    <!-- Logo y menú hamburguesa -->
    <div class="flex items-center">
        <!-- Botón de menú hamburguesa -->
        <button id="btnSidebarToggler" type="button" class="py-4 text-2xl text-white hover:text-gray-200">
            <svg id="navClosed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
          <!-- Logo como imagen -->
          <a href="">
            <img src="{!! asset('images/Ferremas.png') !!}" alt="Ferremas" width="85px">
        </a>
    </div>

    <!-- Espacio flexible para centrar -->
    <div class="flex-grow"></div>

    <div class="w-[250px] lg:pe-2">
    <div class="relative flex w-full flex-wrap items-stretch">
        <input
            type="search"
            class="relative m-0 -me-0.5 block w-[1px] min-w-0 flex-auto rounded-s border border-solid border-secondary-500 bg-transparent bg-clip-padding px-2 py-1 text-sm font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-gray-700 focus:shadow-inset focus:outline-none dark:border-white/10 dark:bg-body-dark dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill"
            placeholder="Buscar en Ferremas"
            aria-label="Search"
            aria-describedby="button-addon3" />
        
        <!-- Botón de búsqueda -->
        <button
            class="relative z-[2] rounded-e border-2 border-secondary px-4 pb-[4px] pt-1 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-accent-300 hover:bg-primary-50/50 hover:text-primary-accent-300 focus:border-primary-600 focus:bg-primary-50/50 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 motion-reduce:transition-none dark:text-primary-500 dark:hover:bg-blue-950 dark:focus:bg-blue-950"
            type="button"
            id="button-addon3"
            data-twe-ripple-init>
            <img src="{!! asset('images/buscar.png') !!}" width="25px" alt="Buscar">
        </button>
    </div>
</div>


    <!-- Selector de moneda -->
    <div class="relative mr-4">
        <select class="bg-gray-800 text-white text-lg px-4 py-1.5 rounded-lg focus:outline-none">
            <option value="USD">CLP</option>
            <option value="EUR">USD</option>
            <option value="GBP">EUR</option>
        </select>
    </div>
    

    <!-- Elementos a la derecha -->
    <div class="flex items-center">
        <!-- Iniciar Sesión -->
        <a href="#" class="text-white mr-4">Iniciar Sesión</a>
        <!-- Carrito -->
        <a href="" class="text-white">
            <img src="{!! asset('images/carrito.png') !!}" width="30px" alt="">
        </a>
    </div>
</nav>



<!-- Sidebar start-->
<div id="containerSidebar" class="z-40">
    <div class="navbar-menu relative z-40">
        <nav id="sidebar"
            class="fixed left-0 bottom-0 flex w-3/4 -translate-x-full flex-col overflow-y-auto bg-gray-700 pt-6 pb-8 sm:max-w-xs lg:w-80">
            <!-- one category / navigation group -->

            <!-- Herramientas manuales -->
            <div class="px-4 pb-6">
                <h3 class="mb-4 text-xs font-medium uppercase text-gray-500">
                    Herramientas
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                    <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Martillos</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Desatornilladores</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Llaves</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Herramientas Eléctricas</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Taladros</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Sierras</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Lijadoras</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Materiales Basicos -->

            <div class="px-4 pb-6">
                <h3 class="mb-4 text-xs font-medium uppercase text-gray-500">
                    Materiales Basicos
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                    <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Cemento</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Arena</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Ladrillos</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Acabados</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Pinturas</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Barnices</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Cerámicos</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Equipos de seguridad -->

            <div class="px-4 pb-6">
                <h3 class="mb-4 text-xs font-medium uppercase text-gray-500">
                    Equipo de Seguridad
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                    <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Cascos</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Guantes</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Lentes de seguridad</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Otros</span>
                        </a>
                    </li>
                </ul>
            </div>
<!-- Sidebar end -->

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", () => {
        const navbar = document.getElementById("navbar");
        const sidebar = document.getElementById("sidebar");
        const btnSidebarToggler = document.getElementById("btnSidebarToggler");
        const navClosed = document.getElementById("navClosed");
        const navOpen = document.getElementById("navOpen");

        btnSidebarToggler.addEventListener("click", (e) => {
            e.preventDefault();
            sidebar.classList.toggle("show");
            navClosed.classList.toggle("hidden");
            navOpen.classList.toggle("hidden");
        });

        sidebar.style.top = parseInt(navbar.clientHeight) - 1 + "px";
    });
</script>
</header>
