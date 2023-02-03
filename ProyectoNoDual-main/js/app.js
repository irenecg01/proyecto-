
document.querySelector("aside.menu-offcanvas button").addEventListener(
    "click", function(){
        document.querySelector("aside.menu-offcanvas").classList.toggle("on")
    }
)

function openModal(dialogo){
    document.querySelector(dialogo).classList.toggle("show");
}

var enlacesDataDialog = document.querySelectorAll("[data-dialog]")

enlacesDataDialog.forEach( function(el){
    el.addEventListener("click", function(){
        openModal(this.dataset.dialog)
    })
})

let el = document.querySelector("#login [data-dialog]")
el.addEventListener("click",function(){
    let nombre = document.querySelector("input[name=nombre]").value
    document.querySelector("a.menu_usuario").innerText = nombre
})

function pararVideo(){
    document.querySelector("video").playbackRate = 3
}


let template = document.querySelector("#plantilla-pelicula")
let animes = document.querySelector("section#peliculas div")

fetch('https://6372ba75348e947299fbfcdb.mockapi.io/api/v0/animes')
    .then( (result) => {
        if(result.ok)
            return result.json()
    })
    .then((output) => {
        
        output.forEach( function(pelicula){

            console.log(pelicula)

            let el = template.content.cloneNode(true);
            el.querySelector("img").setAttribute("src", pelicula.image)
            el.querySelector("h4").textContent = pelicula.title
            el.querySelector("p.autor").textContent = pelicula.autor
            el.querySelector("p.desc").textContent = pelicula.desc
            animes.appendChild(el)

        })
        
}).catch(err => console.error(err))

let cerrar = document.querySelectorAll(".close")[0];
let abrir = document.querySelectorAll(".cta")[0];
let modal = document.querySelectorAll(".modal")[0];
let modalC = document.querySelectorAll(".modal-container")[0];


abrir.addEventListener("click", function(e){
    e.preventDefault();
    modalC.style.opacity= "1";
    modalC.style.visibility= "visible";
    modal.classList.toggle("modal-close");
})

cerrar.addEventListener("click", function(){
    modal.classList.toggle("modal-close");
   
    setTimeout(function(){
        modalC.style.opacity= "0";
        modalC.style.visibility= "hidden";
    },600)
})

window.addEventListener("click", function(e){
    if(e.target == modalC) {
        modal.classList.toggle("modal-close");
   
    setTimeout(function(){
        modalC.style.opacity= "0";
        modalC.style.visibility= "hidden";
    },900)
    }
})