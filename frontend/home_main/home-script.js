const mouse_move = event => {
    const { currentTarget: target} = event;

    const rect = target.getBoundingClientRect(),
                x = event.clientX - rect.left,
                y = event.clientY - rect.top;

                target.style.setProperty("--mouse-x", `${x}px`);
                target.style.setProperty("--mouse-y", `${y}px`);
}

for(const feature of document.querySelectorAll(".features")){
    feature.onmousemove = event => mouse_move(event);
}

const feature_para = document.querySelectorAll(".features p");
window.onresize = () => {
    let height = feature_para[0].getBoundingClientRect().height;
    for(let i = 0; i < feature_para.length; i++){
        feature_para[i].style.height = "fit-content";
        let feature_height = feature_para[i].getBoundingClientRect().height;
        if (feature_height > height) height = feature_height;
    }
    setTimeout(() => {
        for(let i = 0; i < feature_para.length; i++){
            feature_para[i].style.height = `${height}px`;
        }
    }, 500);
}