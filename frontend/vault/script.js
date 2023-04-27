// Copy password
const copy_btn = document.getElementById("copy-img");

function copy_pwd(event){
    let text = event.target.querySelectorAll("p")[1].innerText;

    navigator.clipboard.writeText(text);

    document.getElementById("copy-alert").style.scale = "1 1"
    setTimeout(() => {document.getElementById("copy-alert").style.scale = "1 0"}, 2000);
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
const tags = ["SBI", "Saraswat", "ICICI", "Facebook", "Instagram", "Twitter", "LinkedIn", "GitHub", "Email", "5Paise"];
const passwords = ["SGVBUNLMFBDP", "C0A68E39P", "09539390", "R2VV83Z1T&%KT4", "O8%71l", "%tkq!#", "KWQA3OQ04", "BN!%NJVXCNK@IQJ", "76627621", "%5qL"];

let search_tags = tags;
let search_passwords = passwords;

let div_list = [];

const entrybox = document.getElementById("entrybox");

function display(){
    document.getElementById("search-error").style.opacity = 0;
    for(let i = 0; i < div_list.length; i++){
        entrybox.removeChild(div_list[i]);
    }
    div_list = [];

    for(let i = 0; i < search_passwords.length; i++){
        div_list.push(document.createElement("div"));
        div_list[i].classList.add("entry");
        
        div_list[i].innerHTML = `<p>${search_tags[i]}</p> <p>${search_passwords[i]}</p>`;

        div_list[i].addEventListener("click", (event) => {copy_pwd(event)});
        div_list[i].style.cursor = "pointer";
    
        entrybox.appendChild(div_list[i]);
        setTimeout(() => {
            observer.observe(div_list[i]);
        }, 200*i)
    }

    if(!div_list.length){
        document.getElementById("search-error").style.opacity = 1;
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

// Integration Logic
window.onload = () => {
    // Retrieve passwords on window load
    display();
}