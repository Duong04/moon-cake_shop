let eye = document.querySelector('.eye');
let icon = document.querySelector('.eye i');
let psw = document.querySelector('#psw');

eye.onclick = function(){
    if(psw.type === 'password') {
        psw.type = 'text';
        icon.className = 'fa-solid fa-eye';
    }else if (psw.type === 'text') {
        psw.type = 'password';
        icon.className = 'fa-solid fa-eye-slash';
    }
}