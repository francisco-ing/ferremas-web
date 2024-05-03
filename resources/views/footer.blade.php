<!-- Footer -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <!-- Logo o Nombre de la empresa -->
            <a href="#" class="text-xl font-semibold">Ferremas</a>

            <!-- Enlaces de navegación -->
            <ul class="flex space-x-6 mt-4 md:mt-0">
                <li><a href="/laravel/ferremas/public/" class="hover:text-gray-300">Inicio</a></li>
                <li><a href="contact" class="hover:text-gray-300">Contacto</a></li>
            </ul>
        </div>

        <!-- Derechos de autor -->
        <p class="text-center mt-8">&copy; 2024 Ferremas. Todos los derechos reservados.</p>
    </div>
</footer>

<style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
        }
    </style>

</body>
</html>
@yield('footer')