import { Dropdown } from "bootstrap";
import { Toast, validarFormulario } from "../funciones"
import Swal from "sweetalert2";

const formulario = document.getElementById('formProducto')
const tabla = document.getElementById('tablaProducto')
const btnGuardar = document.getElementById('btnGuardar')

const guardar = async (e) => {
    e.preventDefault()

    
    if (!validarFormulario(formulario, ['pro_id'])) {
        Swal.fire({
            title: "Campos vacios",
            text: "Debe llenar todos los campos",
            icon: "info"
        })
        return
    }
    
    try {
        const body = new FormData(formulario)
        const url = "/nuevo_proyecto/API/producto/guardar"
        const config = {
            method : 'POST',
            body
        }

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje, detalle } = data;
        let icon = 'info'
        if (codigo == 1) {
            icon = 'success'
             formulario.reset();
              buscar();
         } else {
             icon = 'error'
             console.log(detalle);
         }

         Toast.fire({
             icon: icon,
             title: mensaje
         })
    } catch (error) {
        console.log(error)
    }
}

const buscar = async () => {
    try {
        const url = "/nuevo_proyecto/API/producto/buscar"
        const config = {
            method: 'GET',
        }

        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { codigo, mensaje, detalle, datos } = data;
        tabla.tBodies[0].innerHTML = ''
        const fragment = document.createDocumentFragment();
        console.log(datos);
        if (codigo == 1) {
            let counter = 1;
            datos.forEach(producto => {
                const tr = document.createElement('tr');
                const td1 = document.createElement('td');
                const td2 = document.createElement('td');
                const td3 = document.createElement('td');
                const td4 = document.createElement('td');
                const td5 = document.createElement('td');

                const buttonModificar = document.createElement('button');
                const buttonEliminar = document.createElement('button');
                td1.innerText = counter
                td2.innerText = producto.pro_nombre
                td3.innerText = producto.pro_precio

                buttonModificar.classList.add('btn', 'btn-warning')
                buttonEliminar.classList.add('btn', 'btn-danger')
                buttonModificar.innerText = 'Modificar'
                buttonEliminar.innerText = 'Eliminar'

                buttonModificar.addEventListener('click', () => traerDatos(producto))
                buttonEliminar.addEventListener('click', () => eliminar(producto))

                td4.appendChild(buttonModificar)
                td5.appendChild(buttonEliminar)

                counter++

                tr.appendChild(td1)
                tr.appendChild(td2)
                tr.appendChild(td3)
                tr.appendChild(td4)
                tr.appendChild(td5)

                fragment.appendChild(tr)
            })
        } else {
            const tr = document.createElement('tr');
            const td = document.createElement('td');
            td.innerText = "No hay productos"
            td.colSpan = 4

            tr.appendChild(td)
            fragment.appendChild(tr)
        }

        tabla.tBodies[0].appendChild(fragment)

    } catch (error) {
        console.log(error);
    }
}
buscar();



formulario.addEventListener('submit', guardar)