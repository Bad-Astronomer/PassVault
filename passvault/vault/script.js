// Copy password
const copy_btn = document.getElementById("copy-img");

function handle_password_click(event){
    if(edit){
        // edit password window
        let tag = event.target.querySelectorAll("p")[0].innerText;
        let pwd = event.target.querySelectorAll("p")[1].innerText;
        localStorage.setItem('webname', tag);
        localStorage.setItem('webpass', pwd);
        window.location.href = "editpass.php";
    }
    else{
        let text = event.target.querySelectorAll("p")[1].innerText;

        navigator.clipboard.writeText(text);

        document.getElementById("copy-alert").style.scale = "1 1"
        setTimeout(() => {document.getElementById("copy-alert").style.scale = "1 0"}, 2000);
    }
}

// Animate on scroll
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add("show");
        }
        else{
            entry.target.classList.remove("show");
        }
    })
})

// Display Logic

let search_tags = tags;
let search_passwords = passwords;

let div_list = [];

const entrybox = document.getElementById("entrybox");

function display(delay = 20){
    document.getElementById("search-error").style.opacity = 0;
    for(let i = 0; i < div_list.length; i++){
        entrybox.removeChild(div_list[i]);
    }
    div_list = [];

    for(let i = 0; i < search_passwords.length; i++){
        div_list.push(document.createElement("div"));
        div_list[i].classList.add("entry");
        
        div_list[i].innerHTML = `<div><p>${search_tags[i]}</p> <p>${search_passwords[i]}</p></div>`;
        
        if(edit){
            div_list[i].innerHTML += '<img src="./assets/edit.svg" alt="">';
        }
        else{
            div_list[i].innerHTML += '<img src="./assets/copy.svg" alt="">';
        }

        div_list[i].addEventListener("click", (event) => {handle_password_click(event)});
        div_list[i].style.cursor = "pointer";
    
        entrybox.appendChild(div_list[i]);
        setTimeout(() => {
            observer.observe(div_list[i]);
        }, delay*i)
    }

    if(!div_list.length){
        document.getElementById("search-error").style.opacity = 1;
    }
    else{
        div_list[div_list.length -1].style.marginBottom = 0;
    }
}

// Search Logic
const search = document.getElementById("search-password");
let search_string = "";

search.oninput = (event) => {
    if(event.data){
        search_string += event.data;
    }
    else{
        search_string = search_string.slice(0, -1);
    }
    
    if(search_string){
        search_password(search_string);
    }
    else{
        search_passwords = passwords;
        search_tags = tags;
    }

    display();
}

function search_password(string){
    search_tags = [];
    search_passwords = [];

    for(let i = 0; i < passwords.length; i++){
        if(tags[i].toLowerCase().includes(string.toLowerCase())){
            search_tags.push(tags[i]);
            search_passwords.push(passwords[i]);
        }
    }
}

// edit vault logic

let edit = 0; // var to check edit toggle

function hack(text, target, delay = 2){
    let iter = 0;
    let hack_charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    const interval = setInterval(() => {
        target.textContent = target.textContent.split("").map((letter, index) => {
            if(index < iter){
                return text[index];
            }
            return hack_charset[Math.floor(Math.random()*hack_charset.length)]}).join("");
        
        if(iter >= text.length) clearInterval(interval);
        
        iter += 1/delay;
    }, 30);
}

function edit_password(event){
    let add_btn = document.getElementById("add-password");
    let edit_btn = document.getElementById("edit-password");

    edit_btn.classList.toggle("edit-expand");
    add_btn.classList.toggle("add-shrink");
    
    edit = edit ^ 1;

    if(edit){
        hack("EDIT MODE ON ", edit_btn);
        display();
    }
    else{
        hack("EDIT PASSWORD", edit_btn);
        display();
    }
}

// Integration Logic
window.onload = () => {
    // Retrieve passwords on window load
    display(200);
}