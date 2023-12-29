let opencard = document.querySelector("#opencard");
let closeShopping = document.querySelector('.closeShopping');
let body = document.querySelector('body');

opencard.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})






















