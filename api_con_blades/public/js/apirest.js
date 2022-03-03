const url = '/laravel_pruebas-MLS535/api_con_blades/public/api/musician';

document.addEventListener('DOMContentLoaded',() => {
    getMusicos()
})

async function getMusicos() {
    try {
        const res = await fetch(url);
        const datos = await res.json();
        document.getElementById('principal').innerHTML = imprimirMusicos(datos);
    } catch (error) {
        console.log(error);
    }
}

function imprimirMusicos(datos) {
    let columnas =
        `<thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Consultar</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>`
    datos.forEach(musico => {
        columnas +=
            `<tr>
        <td>${musico.id}</td>
        <td>${musico.nombre}</td>
        <td>${musico.descripcion}</td>
        <td><button class="btn btn-info" onclick="consultarMusico(${musico.id})">Consultar</buttons></td>
        <td><button class="btn btn-secondary" onclick="formEditMusico(${musico.id})">Editar</buttons></td>
        <td><button class="btn btn-danger" onclick="eliminarMusico(${musico.id})">Eliminar</buttons></td>
      </tr>`
    })
    return columnas + '</tbody>';
}

async function consultarMusico(musico) {
    try {
        const res = await fetch(`${url}/${musico}`);
        const datos = await res.json();
        let txt = "";
        //TODO CAMBIAR EL VALOR DE MUSICIAN
        let m = datos.musician;
        txt +=
            `<div class="card">
      <div class="card-body">
        <h5 class="card-title">${m.nombre}</h5>
        <div class="card-text">Descripción: ${m.descripcion}</div>
        <div class="card-text">Tipo de músico: ${m.categoria}</div>
        <div class="card-text">Salario: ${m.salario}</div>
        <div class="card-text">Nivel de experiencia: ${m.experiencia}</div>
        <div class="card-text">Empezó a tocar en: ${m.fecha}</div><br>
        <td><button class="btn btn-secondary mx-2" onclick="formEditMusico(${m.id})">Editar</buttons></td>
        <td><button class="btn btn-danger mx-2" onclick="eliminarMusico(${m.id})">Eliminar</buttons></td>
      </div>
    </div>`;
        document.getElementById('consulta').innerHTML = txt;
    } catch (error) {
        console.log(error);
    }
}

async function nuevoMusico() {
    try {
        await fetch(url, {
            method: 'POST',
            body: JSON.stringify({
                nombre: document.getElementById("nombre").value,
                categoria: document.getElementById("categoria").value,
                salario: document.getElementById("salario").value,
                experiencia: document.getElementById("experiencia").value,
                descripcion: document.getElementById("descripcion").value,
                fecha: document.getElementById("fecha").value,
            }),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        location.reload();
    } catch(error) {
        console.log(error);
    }
}

async function editarMusico(musico) {
    try {
        await fetch(`${url}/${musico}`, {
            method: 'PUT',
            body: JSON.stringify({
                nombre: document.getElementById("nombreedit").value,
                categoria: document.getElementById("categoriaedit").value,
                salario: document.getElementById("salarioedit").value,
                experiencia: document.getElementById("experienciaedit").value,
                descripcion: document.getElementById("descripcionedit").value,
                fecha: document.getElementById("fechaedit").value,
            }),
            headers: {
                'Content-Type': 'application/json'
            }
        });
        location.reload();
    } catch(error) {
        console.log(error);
    }
}

async function formEditMusico(musico) {
    try {
        const res = await fetch(`${url}/${musico}`);
        const datos = await res.json();
        //TODO CAMBIAR EL VALOR DE MUSICIAN
        let m = datos.musician;
        let nombre = m.nombre;
        let categoria = m.categoria;
        let salario = m.salario;
        let experiencia = m.experiencia;
        let descripcion = m.descripcion;
        let fecha = m.fecha;

        document.getElementById("nombreedit").value = nombre;
        document.getElementById("categoriaedit").value = categoria;
        document.getElementById("salarioedit").value = salario;
        document.getElementById("experienciaedit").value = experiencia;
        document.getElementById("descripcionedit").value = descripcion;
        document.getElementById("fechaedit").value = fecha;

        document.getElementById("edita").addEventListener("click", function () {
            editarMusico(m.id);
        });
    }
    catch (error) {
        console.log(error);
    }
}

async function eliminarMusico(musico) {
    try {
        await fetch(`${url}/${musico}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
        });
        location.reload();
    } catch(error) {
        console.log(error);
    }
}
