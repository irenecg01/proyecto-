//console.log(mascotas)

var template = document.querySelector("template#mascotas")
var contenedor = document.querySelector(".mascotas")
var filtros = document.querySelectorAll("select")

var filtroTipo = document.querySelector("select#tipo")
var optionTipo = document.querySelector("template#optionTipo")

var filtroRaza= document.querySelector("select#raza")
var optionRaza = document.querySelector("template#optionRaza")

tipos.forEach( function(t){ // t = perro,gato... 
  let nuevotipo = optionTipo.content.cloneNode(true)
  nuevotipo.querySelector("option").value = t
  if(t == tipo) nuevotipo.querySelector("option").setAttribute("selected",true)
  nuevotipo.querySelector("option").innerText = t
  filtroTipo.appendChild(nuevotipo)
})


if(tipo) {
  razas.forEach( function(r){ // t = perro,gato... 
    let nuevoraza = optionRaza.content.cloneNode(true)
    nuevoraza.querySelector("option").value = r
    if(r == raza) nuevoRaza.querySelector("option").setAttribute("selected",true)
    nuevoraza.querySelector("option").innerText = r
    filtroRaza.appendChild(nuevoraza)
  })
}


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
  //peticion 

  modal_container.classList.add('show');  
}


close.addEventListener('click', () => {
  modal_container.classList.remove('show');
});




