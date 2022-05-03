document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.modal');
  var instances = M.Modal.init(elems);
});

window.onload = getUsers;

async function getUsers(){
  let res = await fetch('http://localhost/mavi/read.php', {
      method:'GET',
      headers:
      {
          'Content-Type': 'application/json'
      }
  });

  let json = await res.json();

  console.log(json);

  let tabla = document.getElementById('user-table');
  tabla.innerHTML = '';
  json.map( function(user){
      let row = '';
      row += "<tr>";
      row += "<td>" + user['nombres'] + "</td>";
      row += "<td>" + user['apellido_paterno'] + "</td>";
      row += "<td>" + user['apellido_materno'] + "</td>";
      row += "<td>" + user['domicilio'] + "</td>";
      row += "<td>" + user['correo_electronico'] + "</td>";
      row += "<td><button class='btn waves-effect waves-light btn-small red darken-3' onclick='deleteUser("+user['id']+")'>Eliminar</button></td>";
      row += `<td><button data-target='modal1' class='modal-trigger btn waves-effect waves-light btn-small purple darken-3' onclick='fillEditModal(${JSON.stringify(user)})'>Editar</button></td>`;
      row += "</tr>";
      tabla.innerHTML += row;
  });
}

function fillEditModal(data){
  console.log(data);
  document.getElementById('e_nombres').value = data.nombres;
  document.getElementById('e_apellido_paterno').value = data.apellido_paterno;
  document.getElementById('e_apellido_materno').value = data.apellido_materno;
  document.getElementById('e_domicilio').value = data.domicilio;
  document.getElementById('e_correo_electronico').value = data.correo_electronico;
  document.getElementById('e_id').value = data.id;
}

async function deleteUser(id){
  let data = {id}

  let res = await fetch('http://localhost/mavi/delete.php', {
      method: 'POST',
      body: JSON.stringify(data),
      headers: {
          'Content-Type': 'application/json'
      }
  }); 
  let json = await res.json();
  
  if(json.err === false){
      getUsers();
  }

  else{
      alert('Error al eliminar usuario');
  }
}


async function createUser(evt) {
  evt.preventDefault();
  document.querySelector('.error-msj').innerHTML = '';
  let data = {
      nombre: document.getElementById('nombres').value,
      apellido_paterno: document.getElementById('apellido_paterno').value,
      apellido_materno: document.getElementById('apellido_materno').value,
      domicilio: document.getElementById('domicilio').value,
      correo_electronico: document.getElementById('correo_electronico').value,
  }

  if(data.nombre.length > 0 && data.apellido_paterno.length > 0  && data.apellido_materno.length > 0  && data.domicilio.length > 0 && data.correo_electronico.length > 0 ){
    let res = await fetch('http://localhost/mavi/create.php', {
      method: 'POST',
      body: JSON.stringify(data),
      headers: {
          'Content-Type': 'application/json'
      }
    }); 
    let json = await res.json();
    if(json.err === false){
        getUsers();
        evt.target.reset();
    }

    else{
        alert('Error al crear usuario');
    }
    console.log(json);
  }

  else{
    document.querySelector('.error-msj').innerHTML = 'Por favor llenar todos los campos';
  }
}

async function updateUser(evt){
  evt.preventDefault();
  console.log('updating user');
  let data = {
      id: document.getElementById('e_id').value,
      nombre: document.getElementById('e_nombres').value,
      apellido_paterno: document.getElementById('e_apellido_paterno').value,
      apellido_materno: document.getElementById('e_apellido_materno').value,
      domicilio: document.getElementById('e_domicilio').value,
      correo_electronico: document.getElementById('e_correo_electronico').value,
  }

  let res = await fetch('http://localhost/mavi/update.php', {
      method: 'POST',
      body: JSON.stringify(data),
      headers: {
          'Content-Type': 'application/json'
      }
  });

  console.log(res);

  let json = await res.json();
  if(json.err === false){
      getUsers();
      evt.target.reset();
  }

  else{
      alert('Error al editar usuario');
  }
  console.log(json);
}