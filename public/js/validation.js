//Declaracion de variables.

const btnEnviar = document.querySelector("#sendButton");
const btnReset = document.querySelector("#resetBtn");
const contactForm = document.querySelector("#contactForm");

//Variables para los campos.

const formName = document.querySelector("#nombre");
const formSurName = document.querySelector("#apellido");
const formEmail = document.querySelector("#email");
const formText = document.querySelector("#message");

//Expresión regular para validacion de email.
const reGex =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

eventListeners();

function eventListeners() {
    //Cuando la aplicacion carga.
    document.addEventListener("DOMContentLoaded", iniciarApp);

    //Campos para el formulario.

    formEmail.addEventListener("blur", validarFormulario);
    formName.addEventListener("blur", validarFormulario);
    formSurName.addEventListener("blur", validarFormulario);
    formText.addEventListener("blur", validarFormulario);

    //Reiniciar formulario
    btnReset.addEventListener("click", resetearFormulario);

    //enviar email

    //contactForm.addEventListener("submit", enviarEmail);
}

/* Funciones */

function iniciarApp() {
    btnEnviar.disabled = true;
    btnEnviar.classList.add("cursor-not-allowed", "opacity-50");
}

//Validar Formulario

function validarFormulario(e) {
    //comprobación de campos de formulario.
    if (e.target.value.length > 0) {
        //Elimina errores
        const error = document.querySelector("p.error");
        if (error) {
            error.remove();
        }
        //removemos clases que no necesitamos si y aplicamos la que si necesitamos.
        e.target.classList.remove("border", "border-red-500");
        e.target.classList.add("border", "border-green-500");
    } else {
        e.target.classList.remove("border", "border-green-500");
        e.target.classList.add("border", "border-red-500");
        mostrarError("Todos los campos son obligatorios");
    }

    //Validacion del email mendiante expresion regular.

    if (e.target.type == "email") {
        if (reGex.test(e.target.value)) {
            //Elimina errores
            const error = document.querySelector("p.error");
            if (error) {
                error.remove();
            }
            //removemos clases que no necesitamos si y aplicamos la que si necesitamos.
            e.target.classList.remove("border", "border-red-500");
            e.target.classList.add("border", "border-green-500");
        } else {
            e.target.classList.remove("border", "border-green-500");
            e.target.classList.add("border", "border-red-500");
            console.log("Entro bien por aqui");
            mostrarError("Email no valido");
        }
    }

    if (
        reGex.test(formEmail.value) &&
        formName.value !== "" &&
        formSurName.value !== "" &&
        formText !== ""
    ) {
        btnEnviar.disabled = false;
        btnEnviar.classList.remove("cursor-not-allowed", "opacity-50");
    }
}

function mostrarError(mensaje) {
    //creamos una elemento HTML
    const mensajeError = document.createElement("p");
    //Le damos un texto
    mensajeError.textContent = mensaje;
    //Le damos estilos.
    mensajeError.classList.add(
        "border",
        "border-red-500",
        "background-red-100",
        "text-red-500",
        "p-3",
        "mt-5",
        "error" //añadimos una clase error que se buscará después en constante errores.
    );

    //Buscamos todos los errores generados.
    //usamos QuerySelectorAll porque QuerySelector no tiene la propiedad Length.
    const errores = document.querySelectorAll(".error");

    //Si hay la longitud de la cadena es igual a 0, ejecutamos el codigo
    //de lo contrario se elimina para no repetir mensajes.
    if (errores.length === 0) {
        contactForm.appendChild(mensajeError);
    }
}

function resetearFormulario() {
    contactForm.reset();
    iniciarApp();
}
