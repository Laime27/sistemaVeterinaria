<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="min-h-screen bg-gray-100">
        <!-- Sidebar móvil y escritorio -->
        <div class="sidebar bg-white shadow-lg fixed top-0 left-0 bottom-0 lg:w-64 w-3/4 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-50" id="sidebar">
            <div class="p-4 border-b">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold">Panel Admin</h2>
                    <button class="lg:hidden text-gray-600 focus:outline-none" id="closeSidebar">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <nav class="mt-4">
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Usuarios
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                    <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Reportes
                </a>
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="lg:ml-64 p-4">
            <!-- Header -->
            <header class="bg-white shadow-sm mb-4 p-4">
                <div class="flex justify-between items-center">
                    <button class="lg:hidden text-gray-600 focus:outline-none" id="openSidebar">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <div class="flex items-center">
                        <span class="text-gray-700">Admin User</span>
                    </div>
                </div>
            </header>

            <!-- Cards de estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-gray-500 text-sm font-medium">Total Usuarios</h3>
                    <p class="text-2xl font-semibold mt-2">1,234</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-gray-500 text-sm font-medium">Ventas Mensuales</h3>
                    <p class="text-2xl font-semibold mt-2">$45,678</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-gray-500 text-sm font-medium">Nuevos Clientes</h3>
                    <p class="text-2xl font-semibold mt-2">89</p>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-gray-500 text-sm font-medium">Tasa de Conversión</h3>
                    <p class="text-2xl font-semibold mt-2">2.4%</p>
                </div>
            </div>

            <!-- Tabla de contenido -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-semibold mb-4">Últimas Actividades</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acción</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Juan Pérez</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Inicio de sesión</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024-02-20</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">María García</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Actualización de perfil</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024-02-19</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // Manejo del sidebar móvil
        $('#openSidebar').click(function() {
            $('#sidebar').removeClass('-translate-x-full');
        });

        $('#closeSidebar').click(function() {
            $('#sidebar').addClass('-translate-x-full');
        });

        // Cerrar sidebar al hacer clic fuera en dispositivos móviles
        $(document).click(function(event) {
            if (!$(event.target).closest('#sidebar, #openSidebar').length) {
                if (!$('#sidebar').hasClass('-translate-x-full') && $(window).width() < 1024) {
                    $('#sidebar').addClass('-translate-x-full');
                }
            }
        });
    });
    </script>
</body>
</html>