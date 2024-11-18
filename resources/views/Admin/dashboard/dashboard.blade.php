<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen relative lg:flex">
        <!-- Overlay para móvil -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-gray-900 opacity-50 z-20 hidden lg:hidden"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed lg:static bg-gradient-to-b from-blue-800 to-blue-900 text-white w-72 min-h-screen flex-shrink-0 transition-all duration-300 shadow-xl z-30 transform lg:transform-none">
            <div class="p-6 border-b border-blue-700">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-shield-alt text-2xl"></i>
                    <h2 class="text-2xl font-bold">Admin Panel</h2>
                </div>
            </div>
            <nav class="mt-6 px-4">
                <div class="space-y-3">
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-home text-lg w-6"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-users text-lg w-6"></i>
                        <span>Usuarios</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-shopping-cart text-lg w-6"></i>
                        <span>Productos</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-chart-bar text-lg w-6"></i>
                        <span>Estadísticas</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-cog text-lg w-6"></i>
                        <span>Configuración</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <div class="flex-1 flex flex-col min-h-screen transition-all duration-300">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex justify-between items-center px-6 py-4">
                    <!-- Botón toggle sidebar -->
                    <button id="toggle-sidebar" class="p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <i class="fas fa-bars text-gray-600 text-xl"></i>
                    </button>

                    <!-- Menú de usuario -->
                    <div class="flex items-center space-x-4">
                        <!-- Notificaciones -->
                        <button class="p-2 rounded-lg hover:bg-gray-100 relative">
                            <i class="far fa-bell text-gray-600 text-xl"></i>
                            <span class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">3</span>
                        </button>
                        <!-- Mensajes -->
                        <button class="p-2 rounded-lg hover:bg-gray-100 relative">
                            <i class="far fa-envelope text-gray-600 text-xl"></i>
                            <span class="absolute top-0 right-0 bg-blue-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">5</span>
                        </button>
                        <!-- Usuario -->
                        <div class="relative">
                            <button id="user-menu" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100">
                                <img src="https://ui-avatars.com/api/?name=Admin+User" alt="Usuario" class="w-10 h-10 rounded-full border-2 border-blue-500">
                                <div class="text-left hidden sm:block">
                                    <div class="text-sm font-semibold text-gray-700">Admin User</div>
                                    <div class="text-xs text-gray-500">admin@ejemplo.com</div>
                                </div>
                                <i class="fas fa-chevron-down text-gray-600 ml-2"></i>
                            </button>
                            <!-- Menú desplegable -->
                            <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 border border-gray-200">
                                <a href="#" class="flex items-center space-x-3 px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user w-5"></i>
                                    <span>Mi Perfil</span>
                                </a>
                                <a href="#" class="flex items-center space-x-3 px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog w-5"></i>
                                    <span>Configuración</span>
                                </a>
                                <hr class="my-2 border-gray-200">
                                <a href="#" class="flex items-center space-x-3 px-4 py-2 text-red-600 hover:bg-red-50">
                                    <i class="fas fa-sign-out-alt w-5"></i>
                                    <span>Cerrar Sesión</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Contenido del dashboard -->
            <main class="flex-1 p-6 bg-gray-50">
                <div class="max-w-7xl mx-auto">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>
                    
                    <!-- Tarjetas de estadísticas -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Usuarios Totales</p>
                                    <h3 class="text-2xl font-bold text-gray-800">2,451</h3>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-lg">
                                    <i class="fas fa-users text-blue-500 text-xl"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Ventas del Mes</p>
                                    <h3 class="text-2xl font-bold text-gray-800">$12,345</h3>
                                </div>
                                <div class="bg-green-100 p-3 rounded-lg">
                                    <i class="fas fa-dollar-sign text-green-500 text-xl"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Productos Activos</p>
                                    <h3 class="text-2xl font-bold text-gray-800">845</h3>
                                </div>
                                <div class="bg-purple-100 p-3 rounded-lg">
                                    <i class="fas fa-box text-purple-500 text-xl"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Pedidos Pendientes</p>
                                    <h3 class="text-2xl font-bold text-gray-800">12</h3>
                                </div>
                                <div class="bg-yellow-100 p-3 rounded-lg">
                                    <i class="fas fa-clock text-yellow-500 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Verificar si es móvil
            function isMobile() {
                return window.innerWidth < 1024;
            }
    
            // Toggle sidebar
            $('#toggle-sidebar').click(function() {
                if (isMobile()) {
                    // Comportamiento para móvil
                    $('#sidebar').toggleClass('-translate-x-full translate-x-0');
                    $('#sidebar-overlay').toggleClass('hidden');
                } else {
                    // Comportamiento para desktop
                    $('#sidebar').toggleClass('-translate-x-full');
                    $('.flex-1').toggleClass('lg:ml-0 lg:ml-72');
                }
                $('#toggle-sidebar i').toggleClass('fa-bars fa-times');
            });
    
            // Cerrar sidebar al hacer click en el overlay (solo móvil)
            $('#sidebar-overlay').click(function() {
                $('#sidebar').removeClass('translate-x-0').addClass('-translate-x-full');
                $('#sidebar-overlay').addClass('hidden');
                $('#toggle-sidebar i').addClass('fa-bars').removeClass('fa-times');
            });
    
            // Manejar resize de la ventana
            $(window).resize(function() {
                if (!isMobile()) {
                    $('#sidebar').removeClass('-translate-x-full translate-x-0');
                    $('#sidebar-overlay').addClass('hidden');
                    $('.flex-1').removeClass('lg:ml-0');
                } else {
                    $('#sidebar').addClass('-translate-x-full');
                    $('.flex-1').removeClass('lg:ml-72');
                }
            });
    
            // Configuración inicial
            if (isMobile()) {
                $('#sidebar').addClass('-translate-x-full');
            }
    
            // Toggle dropdown menu
            $('#user-menu').click(function(e) {
                e.stopPropagation();
                $('#dropdown-menu').toggleClass('hidden');
            });
    
            // Cerrar dropdown al hacer click fuera
            $(document).click(function() {
                $('#dropdown-menu').addClass('hidden');
            });
        });
    </script>
</body>
</html>