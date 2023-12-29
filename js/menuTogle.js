var menuu=document.querySelector('.menuu');
var linksMenu=document.querySelector('.linksMenu');
var container=document.querySelector('.container');
var navlink=document.querySelector('.navlink');
menuu.addEventListener("click", () => {
    menuu.classList.toggle("active");
    linksMenu.classList.toggle("active")
    container.classList.toggle("active")
})
// navlink.addEventListener("click", () => {
//     menuu.classList.remove("active");
//     linksMenu.classList.remove("active")
// })
document.querySelectorAll('.navlink').forEach(n =>n.addEventListener("click", () =>{
    menuu.classList.remove("active");
    linksMenu.classList.remove("active");
    container.classList.remove("active");

}))