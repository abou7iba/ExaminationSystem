document.addEventListener('contextmenu',function (e){
    e.preventDefault();
});

document.onkeydown = function (e){
    if(event.keycode == 123) {
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keycode == "I".charCodeAt(0)){
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keycode == "C".charCodeAt(0)){
        return false;
    }
    if(e.ctrlKey && e.shiftKey && e.keycode == "J".charCodeAt(0)){
        return false;
    }
    if(e.ctrlKey && e.keycode == "U".charCodeAt(0)){
        return false;
    }
};