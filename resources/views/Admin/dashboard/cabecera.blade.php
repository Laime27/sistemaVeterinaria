<div class="sidebar bg-white shadow-lg fixed top-0 left-0 bottom-0 lg:w-64 w-3/4 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-50"
    id="sidebar">
    <div class="p-4 border-b">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold">Panel Admin</h2>
            <button class="lg:hidden text-gray-600 focus:outline-none" id="closeSidebar">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <nav class="mt-4">
        <a href="#" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </a>

        <a href="#" data-section="principal"
            class="loadContent  flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Usuarios
        </a>

        <a href="#" data-section="clientes"
            class="loadContent  flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Clientes
        </a>

    </nav>
</div>


<script>
    $('.loadContent').click(function(e) {
        e.preventDefault();
        const section = $(this).data('section');
        $.ajax({
            url: `/contenido/${section}`,
            method: 'GET',
            success: function(response) {
                $('#dashboard-section').html(
                    response);
            },
            error: function() {
                alert(
                    'Error al cargar el contenido.');
            }
        });
    });
</script>
