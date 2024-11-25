@extends('Admin.dashboard.dashboard')

@section('content')
    <div x-data="serviciosAlpine()" x-init="cargarServicios()">

        <div class="flex justify-between items-center my-8 ">
            <h2 class="text-2xl font-bold text-black dark:text-white">Servicios</h2>

            <div x-effect="if (!modalIsOpen) { limpiarCampos(); }"></div>

            <div>

                <button @click="modalIsOpen = true" type="button"
                    class="cursor-pointer whitespace-nowrap rounded-none bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Nuevo
                    Servicio
                </button>
                <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
                    @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false"
                    class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
                    role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">

                    <div x-show="modalIsOpen"
                        x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                        x-transition:enter-start="scale-0" x-transition:enter-end="scale-100"
                        class="flex max-w-xl flex-col gap-4 overflow-hidden rounded-none border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">

                        <div
                            class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                            <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                                <span x-text="modoEdicion ? 'Editar Servicio' : 'Datos del Servicio'"></span>
                            </h3>
                            <button @click="modalIsOpen = false" aria-label="close modal">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                    stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="px-4 py-8">

                            <div class="flex gap-8 my-4">
                                <div class="flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                                    <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Nombre del Servicio</label>
                                    <input id="textInputDefault" type="text" x-model="nombre"
                                        class="w-full rounded-none border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline 
                                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700
                                 dark:bg-neutral-900/50 dark:focus-visible:outline-white" />
                                    <span class=" text-sm text-red-500" x-text="errorNombre"></span>
                                </div>

                                <div class="flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                                    <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Descripcion del
                                        Servicio</label>
                                    <input id="textInputDefault" type="text" x-model="descripcion"
                                        class="w-full rounded-none border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline 
                                focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700
                                 dark:bg-neutral-900/50 dark:focus-visible:outline-white" />

                                </div>
                            </div>

                            <div class="flex gap-8 my-4">
                                <div class="flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                                    <label for="textInputDefault" class="w-fit pl-0.5 text-sm">Precio del Servicio</label>
                                    <input id="textInputDefault" type="number" x-model="precio"
                                        class="w-full rounded-none border border-neutral-300 bg-neutral-50 px-2 py-2 text-sm focus-visible:outline 
                            focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700
                             dark:bg-neutral-900/50 dark:focus-visible:outline-white" />
                                    <span class=" text-sm text-red-500"  x-text="errorPrecio"></span>
                                </div>

                                <div
                                    class="relative flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                                    <label for="os" class="w-fit pl-0.5 text-sm">Estado del Servicio</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="absolute pointer-events-none right-4 top-8 h-5 w-5">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <select id="os" x-model="estadoSelect"
                                        class="w-full appearance-none rounded-none border border-neutral-300 bg-neutral-50 px-4 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white">

                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>

                                </div>
                            </div>



                        </div>
                        <div
                            class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                            <button @click="modalIsOpen = false" type="button"
                                class="cursor-pointer whitespace-nowrap rounded-none px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 
                        focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0
                         dark:text-neutral-300 dark:focus-visible:outline-white">Cancelar</button>
                            <button @click="modoEdicion ? actualizarServicio() : guardarServicio()" type="button"
                                class="cursor-pointer whitespace-nowrap rounded-none bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition
                         hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 
                         active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">
                                <span x-text="modoEdicion ? 'Actualizar' : 'Guardar'"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">


            <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
                <thead
                    class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                    <tr>
                        <th scope="col" class="p-4">ID</th>
                        <th scope="col" class="p-4">Servicio</th>
                        <th scope="col" class="p-4">Descripcion</th>
                        <th scope="col" class="p-4">Precio</th>
                        <th scope="col" class="p-4">Estado</th>
                        <th scope="col" class="p-4">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">

                    <template x-for="servicio in servicios" :key="servicio.id">
                        <tr>
                            <td class="p-4">
                                <span class="text-neutral-900 dark:text-white" x-text="servicio.id"> </span>
                            </td>
                            <td class="p-4" x-text="servicio.nombre"></td>
                            <td class="p-4" x-text="servicio.descripcion"></td>
                            <td class="p-4" x-text="servicio.precio"></td>
                            <td class="p-4">
                                <span :class="servicio.estado === 'activo' ? 'text-green-500' : 'text-red-500'"
                                    class="inline-flex overflow-hidden rounded-md  px-1 py-0.5 text-xs font-medium">
                                    <span x-text="servicio.estado"></span>
                                </span>
                            </td>
                            <td class="p-4">
                                <button type="button" @click="editarServicio(servicio.id)"
                                    class=" cursor-pointer whitespace-nowrap rounded-md bg-transparent p-0.5 font-semibold text-blue-500 outline-black hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-blue-500 dark:outline-white">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button type="button" @click="eliminarServicio(servicio.id)"
                                    class=" ml-3 cursor-pointer whitespace-nowrap rounded-md bg-transparent p-0.5 font-semibold text-red-500 outline-black hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 active:opacity-100 active:outline-offset-0 dark:text-red-500 dark:outline-white">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <div class="flex justify-end  my-4 px-4">
                <nav class="isolate inline-flex rounded-md shadow-sm" aria-label="Pagination">

                    <button @click="cambiarPagina(1)" :disabled="currentPage === 1"
                        :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-neutral-50'"
                        class="relative inline-flex items-center rounded-l-lg px-3 py-2 text-sm font-medium border border-neutral-300 bg-white text-gray-700 dark:bg-neutral-800 dark:border-neutral-600 dark:text-neutral-200">
                        <span class="sr-only">Primera</span>
                        <i class="fas fa-angle-double-left"></i>
                    </button>

                    <template x-for="page in getPaginationRange()" :key="page">
                        <button @click="cambiarPagina(page)"
                            :class="currentPage === page ? 'bg-blue-600 text-white border-blue-600' :
                                'bg-white text-gray-700 hover:bg-neutral-50 dark:bg-neutral-800 dark:text-neutral-200 dark:hover:bg-neutral-700'"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium border border-neutral-300 dark:border-neutral-600">
                            <span x-text="page"></span>
                        </button>
                    </template>

                    <button @click="cambiarPagina(totalPages)" :disabled="currentPage === totalPages"
                        :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-neutral-50'"
                        class="relative inline-flex items-center rounded-r-lg px-3 py-2 text-sm font-medium border border-neutral-300 bg-white text-gray-700 dark:bg-neutral-800 dark:border-neutral-600 dark:text-neutral-200">
                        <span class="sr-only">Última</span>
                        <i class="fas fa-angle-double-right"></i>
                    </button>
                </nav>
            </div>


        </div>

    </div>


    <script src="{{ asset('js/admin/servicios/servicios.js') }}"></script>
@endsection
