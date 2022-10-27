document.addEventListener('DOMContentLoaded', () => {
    $.ajax({
        url: 'Controller/Controller.php',
        data: {
            tipo: 'mostrar',
        },
        type: 'POST',
        success: function (response) {
            response.forEach(element => {
                const tr = document.createElement('tr');
                const td_nombre = document.createElement('td');
                const td_edad = document.createElement('td');
                const td_telefono = document.createElement('td');
                const td_correo = document.createElement('td');
                const td_marca = document.createElement('td');
                const td_modelo = document.createElement('td');
                const a_eliminar = document.createElement('a');
                const button_editar = document.createElement('button');
                console.log(td_correo);

                td_nombre.textContent = element.nombre;
                td_edad.textContent = element.edad;
                td_telefono.textContent = element.telefono;
                td_correo.textContent = element.correo;
                td_marca.textContent = element.marca;
                td_modelo.textContent = element.modelo;
                a_eliminar.textContent = 'Eliminar';
                a_eliminar.setAttribute('href', 'Controller/Controller.php?id=' + element.id + '&tipo=eliminar');
                button_editar.textContent = 'Editar';
                button_editar.setAttribute('class', 'btn',)
                button_editar.onclick = function (e) {
                    e.preventDefault();

                    $.ajax({
                        url: 'Controller/Controller.php',
                        data: {
                            tipo: 'buscar',
                            id: element.id
                        },
                        type: 'POST',
                        success: function (response) {
                            response.forEach(element => {
                                document.querySelector('#idregistro').value = element.id;
                                document.querySelector('#nombre').value = element.nombre
                                document.querySelector('#edad').value = element.edad
                                document.querySelector('#telefono').value = element.telefono
                                document.querySelector('#correo').value = element.correo
                                document.querySelector('#marca').value = element.marca
                                $.ajax({
                                    url: 'Controller/Controller.php',
                                    data: {
                                        tipo: 'mostrarmodeloselect',
                                        id: element.marca
                                    },
                                    type: 'POST',
                                    success: function(response) {
                                        $('#modelo').empty();
                                        response.forEach(element => {
                                            const options = document.createElement('option');
                                            options.textContent = element.modelo_nombre;
                                            options.value = element.id_modelo;
                                            document.querySelector('#modelo').appendChild(options);
                                        })
                                    }
                                })
                                document.querySelector('#modelo').value = element.modelo
                            });
                        }
                    });
                }


                tr.appendChild(td_nombre);
                tr.appendChild(td_edad);
                tr.appendChild(td_telefono);
                tr.appendChild(td_correo);
                tr.appendChild(td_marca);
                tr.appendChild(td_modelo);
                tr.appendChild(a_eliminar);
                tr.appendChild(button_editar);

                document.querySelector('tbody').appendChild(tr);
            });
        }
    });

    $.ajax({
        url: 'Controller/Controller.php',
        data: {
            tipo: 'mostrarmarca',
        },
        type: 'POST',
        success: function (response) {
            response.forEach(element => {
                const options = document.createElement('option');
                options.textContent = element.marca_nombre;
                options.value = element.id_marca;
                document.querySelector('#marca').appendChild(options);
            })
        }
    });
});

document.querySelector('#marca').addEventListener('change', e => {
    $('#modelo').empty();

    $.ajax({
        url: 'Controller/Controller.php',
        data: {
            tipo: 'mostrarmodelo',
            id: e.target.value
        },
        type: 'POST',
        success: function (response) {
            console.log(response);
            response.forEach(element => {
                const options = document.createElement('option');
                options.textContent = element.modelo_nombre;
                options.value = element.id_modelo;
                document.querySelector('#modelo').appendChild(options);
            })
        }
    });
});

document.querySelector('#formRegister').addEventListener('submit', e => {
    e.preventDefault();

    const formData = new FormData(e.target);
    formData.append("tipo", "register");

    const data = Object.fromEntries(formData);
    console.log(data);

    $.ajax({
        url: 'Controller/Controller.php',
        data: data,
        type: 'POST',
        success: function (response) {
            if (response == 'correcto') {
                document.querySelector('#formRegister').reset();
                location.reload();
            } else {
                alert("error al registrar");
            }
        }
    })
});