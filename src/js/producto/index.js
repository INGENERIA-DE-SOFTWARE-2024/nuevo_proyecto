import { Dropdown } from "bootstrap";
import { Toast, validarFormulario } from "../funciones"
import Swal from "sweetalert2";

const formulario = document.getElementById('formProducto')
const tablaProducto = document.getElementById('tablaProducto')


const guardar = async (e) => {
    e.preventDefault()

    if(!validarFormulario(formulario)){
        Swal.fire({
            title: "Campos vacíos",
            text: "Debe llenar todos los campos",
            icon: "info"
        })
        return
    }

    try {
        const body = new FormData(formulario)
        const url = "/NUEVO_PROYECTO/API/producto/guardar"
        const config = {
            method: 'POST',
            body
        }

        const respuesta =await fetch(url, config);
        const data = await respuesta.json();

        console.log(data);
        const { codigo, mensaje, detalle } = data;
        let icon = 'info'
        if(codigo == 1){
            icon = 'success'
            formulario.reset();
        }else{
            icon = 'error'
            console.log(detalle);
        }

        Toast.fire({
            icon: icon,
            title: mensaje
        })
    } catch (error) {
        console.log(error);
    }
}


formulario.addEventListener('submit', guardar)