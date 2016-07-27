function form_submit() {
    // Check if file input is empty
    if(document.getElementById("file_input").files.length == 0){
        alert("File input is empty!");
        return false;
    }
    
    // display loader
    setLoaderScreen("visible");
    
    // Return true to submit the form
    return true;
}

function notify(text){
    alert(text);
    // hide loader
    setLoaderScreen("hidden");
}

function render_picture(filename){
    document.getElementById("target_picture").setAttribute("src","./uploads/"+filename);
    // hide loader
    setLoaderScreen("hidden");
}

function setLoaderScreen(classname){
    document.getElementById("loader_wrapper").className = classname;
}