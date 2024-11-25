window.serviciosAlpine = function () {
    return {
        servicios: [],
        nombre: "",
        descripcion: "",
        precio: "",
        estado: "",
        estadoSelect: "activo",
        modalIsOpen: false,
        currentPage: 1,
        totalPages: 1,
        modoEdicion: false,
        servicioId: null,

        cargarServicios() {
            axios
                .post(
                    "/servicios/listar",
                    {
                        estado: this.estado,
                        page: this.currentPage,
                    },
                    {
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content,
                            "Content-Type": "application/json",
                        },
                    }
                )
                .then((response) => {
                    this.servicios = response.data.data;
                    this.totalPages = response.data.last_page;
                })
                .catch((error) => {
                    console.error("Error al cargar los servicios:", error);
                });
        },

        cambiarPagina(page) {
            if (page >= 1 && page <= this.totalPages) {
                this.currentPage = page;
                this.cargarServicios();
            }
        },

        eliminarServicio(id) {
            axios
                .delete(`/servicios/${id}`, {
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content,
                    },
                })
                .then((response) => {
                    this.cargarServicios();
                })
                .catch((error) => {
                    console.error("Error al eliminar el servicio:", error);
                });
        },

        guardarServicio() {
            const mensajeError = this.validarCampos();
            if (mensajeError) {
                return;
            }
            axios
                .post(
                    "/servicios",
                    {
                        nombre: this.nombre,
                        descripcion: this.descripcion,
                        precio: this.precio,
                        estado: this.estadoSelect,
                    },
                    {
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]'
                            ).content,
                        },
                    }
                )
                .then((response) => {
                    console.log("Servicio guardado correctamente", response);
                    this.cargarServicios();
                    this.modalIsOpen = false;
                })
                .catch((error) => {
                    console.error("Error al guardar el servicio:", error);
                });
        },

        editarServicio(id) {
            this.modalIsOpen = true;
            axios
                .get(`/servicios/${id}`)
                .then((response) => {
                    this.modoEdicion = true;
                    this.nombre = response.data.nombre;
                    this.descripcion = response.data.descripcion;
                    this.precio = response.data.precio;
                    this.estadoSelect = response.data.estado;
                    this.servicioId = response.data.id;
                })
                .catch((error) => {
                    console.error("Error al obtener el servicio:", error);
                });
        },

        actualizarServicio() {
            const mensajeError = this.validarCampos();
            if (mensajeError) {
                return;
            }
            axios
                .put(`/servicios/${this.servicioId}`, {
                    nombre: this.nombre,
                    descripcion: this.descripcion,
                    precio: this.precio,
                    estado: this.estadoSelect,
                })
                .then((response) => {
                    this.cargarServicios();
                    this.modalIsOpen = false;
                    this.limpiarCampos();
                })
                .catch((error) => {
                    console.error("Error al actualizar el servicio:", error);
                });
        },

        limpiarCampos() {
            this.nombre = "";
            this.descripcion = "";
            this.precio = "";
            this.estadoSelect = "activo";
            this.modoEdicion = false;
            this.servicioId = null;
            this.errorNombre = "";
            this.errorPrecio = "";
        },

        getPaginationRange() {
            let start = Math.max(1, this.currentPage - 2);
            let end = Math.min(this.totalPages, start + 4);

            if (end === this.totalPages) {
                start = Math.max(1, end - 4);
            }

            return Array.from({ length: end - start + 1 }, (_, i) => start + i);
        },

        validarCampos() {
            this.errorNombre = "";
            this.errorPrecio = "";

            if (this.nombre === "") {
                this.errorNombre = "El nombre  es requerido";
            }

            if (this.precio === "") {
                this.errorPrecio = "El precio  es requerido";
            }
        },

        
    };
};
