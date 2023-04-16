const mouse_move = event => {
    const { currentTarget: target} = event;

    const rect = target.getBoundingClientRect(),
                x = event.clientX - rect.left,
                y = event.clientY - rect.top;

                target.style.setProperty("--mouse-x", `${x}px`);
                target.style.setProperty("--mouse-y", `${y}px`);
}

for(const feature of document.querySelectorAll(".features")){
    feature.onmousemove = event => mouse_move(event)
}
