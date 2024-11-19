<header class="bg-white shadow-sm mb-4 p-4">
    <div class="flex justify-between lg:justify-end items-center">
        <button class="lg:hidden text-gray-600 focus:outline-none" id="openSidebar">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <div class="relative">
            <button class="flex items-center space-x-2 focus:outline-none" id="profileButton">
                <svg class="h-8 w-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-gray-700">Admin User</span>
                <svg class="h-4 w-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Menú desplegable -->
            <div class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50"
                id="profileMenu">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mi
                    Perfil</a>
                <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Configuración</a>
                <div class="border-t border-gray-100"></div>
                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Cerrar
                    Sesión</a>
            </div>
        </div>
    </div>
</header>