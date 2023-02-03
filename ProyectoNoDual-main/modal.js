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