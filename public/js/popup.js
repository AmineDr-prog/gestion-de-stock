function show(){
    let cont = document.querySelector(".cont-create")
    cont.classList.toggle("toggle")
}

let edit = document.querySelectorAll(".btn-edit")

edit.forEach((e)=>{
    e.addEventListener("click",()=>{
        let inp = document.querySelector(".cont-edit")
        inp.classList.toggle("toggle")
        let id = e.parentElement.id
        var currentLocation = window.location.href;
        document.edi.action = `${currentLocation}/${id}`
    })

})

function slide(){
    let sidebar = document.querySelector(".sidebar")
    let content = document.querySelector(".content")
    sidebar.classList.toggle("active")
    content.classList.toggle("slide")
}

let bg =document.querySelectorAll(".bg")
bg.forEach((e=>{

    e.addEventListener("click",()=>{
        if(e.parentElement.className.includes("create")){
            show()
        }
        else{
            let inp = document.querySelector(".cont-edit")
            inp.classList.toggle("toggle")
        }
    })

}))

let acc = document.querySelector(".acc")
let btns = document.querySelectorAll("button")
if(acc.id != "admin"){
    btns.forEach((e)=>{
        if(e.id == "logout"){
            e.setAttribute("enabled","")
        }
        else{
            e.setAttribute("disabled","")
            e.style.background="gray"
            e.style.pointerEvents="none"
        }

    })
}


let menu = document.querySelector(".menu svg")
menu.addEventListener("click",()=>{
    slide()
})
let close = document.querySelector(".close")
close.addEventListener("click",()=>{
    slide()
})

let inps = document.querySelectorAll("input")
inps.forEach((e)=>{
    e.setAttribute("required","")
})


