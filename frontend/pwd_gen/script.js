const pwd_display = document.getElementById("password");
const copy_btn = document.getElementById("copy_img");
const charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

function pwd_maker(size){    
    let new_pwd = "";
    for(let i = 0; i < size; i++){
        new_pwd += charset[Math.floor(Math.random()*charset.length)]
    }
    return new_pwd;
}

function hack(text, target, letters, delay = 3){
    let iter = 0;
    console.log(delay);

    const interval = setInterval(() => {
        target.innerText = target.innerText.split("").map((letter, index) => {
            if(index < iter){
                return text[index];
            }
            return letters[Math.floor(Math.random()*26)]}).join("");
        
        if(iter >= text.length) clearInterval(interval);
        
        iter += 1/delay;
    }, 30);
}

function generate_pwd(){
    init_display = password.innerText;
    let new_pwd = pwd_maker(init_display.length);

    let generate = document.getElementById("generate");
    if(generate.querySelectorAll("p")[0].innerText != "RE"){
        hack("RE", generate.querySelectorAll("p")[0], charset, 16);

        generate.querySelector("img").style.scale = 1;
        generate.querySelector("img").style.opacity = 1;

        password.style.pointerEvents = "all";
        copy_btn.style.opacity = 1;
    }
    
    //variable delay due to changing password size
    hack(new_pwd, pwd_display, charset, delay = (6 - init_display.length/4));
}

function copy_pwd(){
    let text = document.getElementById("password");

    console.log(text.innerText);
    navigator.clipboard.writeText(text.innerText);

    document.getElementById("copy-alert").style.scale = "1 1"
    setTimeout(() => {document.getElementById("copy-alert").style.scale = "1 0"}, 2000);
}

function expand_settings(){
    const settings_container = document.getElementsByClassName("settings-container")[0];

    if(settings_container.style.position == "relative"){
        settings_container.style.transition = "none";
        settings_container.style.position = "absolute";
        settings_container.style.scale = "1 0";
    }
    else{
        settings_container.style.transition = "all 200ms ease-in";
        settings_container.style.position = "relative";
        settings_container.style.scale = "1 1";
    }
}

document.getElementById("password-size-slider").oninput = (event) =>{
    document.getElementById("password-size-label").innerText = event.target.value;
    let pwd = "";
    for(let i = 0; i < event.target.value; i++){
        pwd += "*";
    }
    pwd_display.innerText = pwd;
}