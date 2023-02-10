console.log(mascotas)

var template = document.querySelector("template")
var contenedor = document.querySelector(".mascotas")


mascotas.forEach( function(m,pos){
  let nuevamascota = template.content.cloneNode(true)
  nuevamascota.querySelector("img").src = m.imagen
  nuevamascota.querySelector("h2").innerText = m.nombre
  nuevamascota.querySelector("button").setAttribute("data-pos",pos)
  contenedor.appendChild(nuevamascota)
})

var open = document.querySelectorAll('.open');
console.log(open)
const modal_container = document.getElementById('modal_container');
const close = document.getElementById('close');


open.forEach( function(el){
  el.addEventListener("click", abrir)
} )

function abrir(ev){
  let pos = ev.target.getAttribute("data-pos")
  console.log(pos)
  document.querySelector("#imagen").src = mascotas[pos].imagen
  document.querySelector("#nombre").innerText = mascotas[pos].nombre
  document.querySelector("p.raza").innerText = mascotas[pos].raza

  modal_container.classList.add('show');  
}


close.addEventListener('click', () => {
  modal_container.classList.remove('show');
});

let states = [
  {
   code: 1,
   name: "Perro",
   provinces: [
     {
       code: 3,
       name: 'Husky',
       cities: [
        {
          code: 11,
          name: 'Cachorro'
        },
        {
          code: 07,
          name: 'Adulto'
        },
         {
         code: 08,
         name: 'Anciano'
         }
       ]
     },
     {
       code: 4,
       name: 'Pitbull',
       cities: [
        {
          code: 14,
          name: 'Cachorro'
        },
        {
          code:167,
          name: 'Adulto'
        }
       ]
     },
   ]  
  }, 
  {
   code: 2,
   name: "Gato",
   provinces: [
     {
       code: 1,
       name: 'Britanico',
       cities: [
        {
          code: 10,
          name: 'Cachorro'
        },
        {
          code: 05,
          name: 'Adulto'
        }
       ]
     },
     {
       code: 2,
       name: 'Egipcio',
       cities: [
        {
          code: 14,
          name: 'Cachorro'
        },
        {
          code: 50,
          name: 'Adulto'
        }
       ]
     },
   ]
  }
];

const getSubItem = (code) => {
  if(code) {
    return states.find(item => item.code === code)
  } 
  
  return {}
}

const initMainSelect = () => {
  let selectMain = document.getElementById('state');
  for(let state of states) {
    let el = document.createElement("option");
      el.textContent = state.name;
      el.value = state.code;
      selectMain.appendChild(el);
  }
  
  // onchange event
  selectMain.addEventListener('change', loadProvinces, false);
  function loadProvinces(event) {
    let selectProv = document.getElementById('province');
    let selectCity = document.getElementById('city');
    selectProv.innerHTML = '';
    selectCity.innerHTML = '';
    
    let provicesList = getSubItem(parseInt(event.target.value))
    selectProv.dataset.state = event.target.value;
    if(Object.keys(provicesList).length > 0) {
      for(let item of provicesList.provinces) {
        let el = document.createElement("option");
        el.textContent = item.name;
        el.value = item.code;
        selectProv.appendChild(el);
      }
    }
    
    // onchange event
    selectProv.addEventListener('change', loadCities, false);
    function loadCities(event) {
      let provice = getSubItem(parseInt(event.target.dataset.state))
      const provinces = Object.keys(provice).length > 0 ? provice.provinces : [];
      let province = provinces.find(item => item.code === parseInt(event.target.value))

      if(Object.keys(province).length > 0) {
        selectCity.innerHTML = '';
        for(let item of province.cities) {
          let el = document.createElement("option");
          el.textContent = item.name;
          el.value = item.code;
          selectCity.appendChild(el);
        }
      }
    }
  }
}
initMainSelect();



