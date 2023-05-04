const pwd_display = document.getElementById("password");
const checkbox = document.getElementsByClassName("checkbox");

const copy_btn = document.getElementById("copy-img");
const save_btn = document.getElementById("save-button");

const charset = ["ABCDEFGHIJKLMNOPQRSTUVWXYZ", "0123456789", "!@#$%&", "abcdefghijklmnopqrstuvwxyz",
"कखगघङचछजझञटठडढणतथदधनपफबभमरलळवहशषसअआइईउऊऋॠऌॡएऐओऔ"];
let toggle = [1, 0, 0, 0, 0]

let new_pwd = "*******";

function pwd_maker(size, pwd_charset){    
    new_pwd = "";

    // add 1 character from each charset
    for(let i = 0; i < toggle.length; i++){
        if(toggle[i]){
            new_pwd += charset[i][Math.floor(Math.random()*charset[i].length)];
            size--;
        }
    }
    // make rest of the random password
    for(let i = 0; i < size; i++){
        new_pwd += pwd_charset[Math.floor(Math.random()*pwd_charset.length)];
    }

    // shuffle
    new_pwd = new_pwd.split('').sort(function(){return 0.5-Math.random()}).join('');
}

function hack(text, target, hack_charset, delay = 3){
    let iter = 0;

    const interval = setInterval(() => {
        target.innerText = target.innerText.split("").map((letter, index) => {
            if(index < iter){
                return text[index];
            }
            return hack_charset[Math.floor(Math.random()*hack_charset.length)]}).join("");
        
        if(iter >= text.length) clearInterval(interval);
        
        iter += 1/delay;
    }, 30);
}

function generate_pwd(){
    init_display = password.innerText;

    let pwd_charset = "";
    for(let i = 0; i < toggle.length; i++){
        if(toggle[i]) pwd_charset += charset[i];
    }
    
    pwd_maker(init_display.length, pwd_charset);

    let generate = document.getElementById("generate");
    if(generate.querySelectorAll("p")[0].innerText != "RE"){
        hack("RE", generate.querySelectorAll("p")[0], charset[0], 16);

        generate.querySelector("img").style.scale = 1;
        generate.querySelector("img").style.opacity = 1;

        password.style.pointerEvents = "all";
    }

    copy_btn.style.opacity = 1;
    
    save_btn.style.fontSize = "1.25em";
    save_btn.style.padding = "20px";
    save_btn.style.borderWidth = "1px";

    //variable delay due to changing password size
    hack(new_pwd, pwd_display, pwd_charset, delay = (6 - init_display.length/4));
}

function copy_pwd(redirect){
    navigator.clipboard.writeText(new_pwd);

    document.getElementById("copy-alert").style.scale = "1 1"
    setTimeout(() => {document.getElementById("copy-alert").style.scale = "1 0"}, 2000);

    if(redirect){
        setTimeout(() => {window.location.href = '../pwd_gen/savepass.php'}, 1000);
    }
    localStorage.setItem('superValue', new_pwd);
}

function toggle_charset(event, option){
    //options:
    //0: letters  1: numbers  2:symbols  3:case
    
    //toggle on
    if(event.target.style.opacity == 0.5){
        event.target.style.opacity = 1;
        toggle[option] = 1;
    }
    // toggle off
    else{
        event.target.style.opacity = 0.5;
        toggle[option] = 0;
    }
    
    // if pwd_charset is empty
    if(!toggle.includes(1))
    {
        alert("SELECT ATLEAST ONE OPTION");
        event.target.style.opacity = 1;
        toggle[option] = 1;
    }
}

document.getElementById("password-size-slider").oninput = (event) =>{
    document.getElementById("password-size-label").innerText = event.target.value;
    new_pwd = "";
    for(let i = 0; i < event.target.value; i++){
        new_pwd += "*";
    }
    pwd_display.innerText = new_pwd;

    copy_btn.style.opacity = 0;
    save_btn.style.fontSize = 0;
    save_btn.style.padding = 0;
    save_btn.style.borderWidth = 0;
}

for(let i = 0; i < toggle.length; i++){
    checkbox[i].style.opacity = 0.5;
    if(toggle[i]){
        checkbox[i].style.opacity = 1;
    }
}
