const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"

window.onload =  function(){
    const header = document.getElementById("header");
    let iterations = 0;

    const interval = setInterval(() => {
        header.innerText = header.innerText.split("").map((letter, index) => {
        if(index < iterations){
            return header.dataset.value[index];
        }
        return letters[Math.floor(Math.random()*26)]}).join("");
    
        if(iterations >= header.innerText.length) clearInterval(interval);
        
        iterations += 1/5;
    }, 30);
}

// Work around
const faqs = document.getElementsByClassName("expandable-items");
for(let i = 0; i < faqs.length; i++){
    faqs[i].querySelector("p").style.fontSize = "0em";
}

function expand_faq(event){
    let p = event.target.querySelector("p").style;
    let h2 = event.target.querySelector("h2").style;

    if(p.fontSize == "0em"){
        p.fontSize = "1.25em";
        
        h2.backgroundColor = "white";
        h2.color = "black";
    }
    else{
        p.fontSize = "0em";
        
        h2.backgroundColor = "black";
        h2.color = "white";
    }
}

document.addEventListener('contextmenu', (e) => e.preventDefault());

function ctrlShiftKey(e, keyCode) {
  return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
}

document.onkeydown = (e) => {
  // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
  if (
    event.keyCode === 123 ||
    ctrlShiftKey(e, 'I') ||
    ctrlShiftKey(e, 'J') ||
    ctrlShiftKey(e, 'C') ||
    (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
  )
    return false;
};