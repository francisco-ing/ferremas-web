<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <!-- Selector de moneda -->
    <div class="relative mr-4">
        <select class="bg-gray-800 text-white text-lg px-4 py-2 rounded-lg focus:outline-none">
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
            <div class="px-4 pb-6">
                <h3 class="mb-2 text-xs font-medium uppercase text-gray-500">
                    Categorias
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                    <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Maderas</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Herramientas</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-gray-50 hover:bg-gray-600"
                            href="#link1">
                            <span class="select-none">Dildos</span>
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
