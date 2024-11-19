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
  
        @include('Admin.dashboard.slidebar')

        <div class="lg:ml-64 p-4">

            @include('Admin.dashboard.header')  

            <div class="content-sections">
                <div id="dashboard-section" class="content-section">
                    @include($contenido) 
                </div>      
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#openSidebar').click(function() {
                $('#sidebar').removeClass('-translate-x-full');
            });

            $('#closeSidebar').click(function() {
                $('#sidebar').addClass('-translate-x-full');
            });
            $('#profileButton').click(function(e) {
                e.stopPropagation();
                $('#profileMenu').toggleClass('hidden');
            });

            $(document).click(function(e) {
                if (!$(e.target).closest('#profileMenu, #profileButton').length) {
                    $('#profileMenu').addClass('hidden');
                }
            });

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
