<!-- Validación de formulario con JQuery Validate -->
    <script language="javascript" type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#formulario_anhadir_articulo").validate({
                rules: {
                    nombre: {
                        required: true,
                        minlength: 1,
                        maxlength: 200
                    },
                    imagen: {
                        required: true,
                        accept: "image/*"
                    },
                    existencias: {
                        required: true,
                        minlength: 1,
                        maxlength: 6,
                        number: true
                    },
                    precio: {
                        required: true,
                        minlength: 1,
                        maxlength: 6,
                        number: true
                    },
                    descripcion: {
                        required: true,
                        minlength: 1,
                        maxlength: 1000
                    },
                    subfamilia: {
                        required: true,
                        minlength: 1,
                        maxlength: 11,
                        number: true
                    }
                },
                messages: {
                    nombre: {
                        required: "Debe introducir el nombre del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    imagen: {
                        required: "Debe seleccionar una imagen del artículo.",
                        accept: "El archivo debe ser una imagen."
                    },
                    existencias: {
                        required: "Debe introducir el número de existencias del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres."),
                        number: "El valor introducido debe ser un número."
                    },
                    precio: {
                        required: "Debe introducir el precio del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres."),
                        number: "El valor introducido debe ser un número."
                    },
                    descripcion: {
                        required: "Debe introducir la descripción del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    subfamilia: {
                        required: "  Debe seleccionar una subfamilia.",
                        minlength: jQuery.validator.format(" Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format(" No introduzcas más de {0} caracteres.")
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#formulario_modificar_articulo").validate({
                rules: {
                    id: {
                    },
                    nombre: {
                        required: true,
                        minlength: 1,
                        maxlength: 200
                    },
                    imagen: {
                        required: true,
                        accept: "image/*"
                    },
                    existencias: {
                        required: true,
                        minlength: 1,
                        maxlength: 6,
                        number: true
                    },
                    precio: {
                        required: true,
                        minlength: 1,
                        maxlength: 6,
                        number: true
                    },
                    descripcion: {
                        required: true,
                        minlength: 1,
                        maxlength: 1000
                    },
                    subfamilia: {
                        required: true,
                        minlength: 1,
                        maxlength: 11,
                        number: true
                    }
                },
                messages: {
                    nombre: {
                        required: "Debe introducir el nombre del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    imagen: {
                        required: "Debe seleccionar una imagen del artículo.",
                        accept: "El archivo debe ser una imagen."
                    },
                    existencias: {
                        required: "Debe introducir el número de existencias del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres."),
                        number: "El valor introducido debe ser un número."
                    },
                    precio: {
                        required: "Debe introducir el precio del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres."),
                        number: "El valor introducido debe ser un número."
                    },
                    descripcion: {
                        required: "Debe introducir la descripción del artículo.",
                        minlength: jQuery.validator.format("Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format("No introduzcas más de {0} caracteres.")
                    },
                    subfamilia: {
                        required: "Debe seleccionar una subfamilia.",
                        minlength: jQuery.validator.format(" Introduce al menos {0} caracter."),
                        maxlength: jQuery.validator.format(" No introduzcas más de {0} caracteres.")
                    }
                }
            });
        });
    </script>