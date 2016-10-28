/* 
 * ----------------------------------------------------
 * Helper to validate the inputs and display the loader
 * ----------------------------------------------------
 */

var form_submit = function() {
    // Check if file input is empty
    if(document.getElementById("file_input").files.length == 0){
        alert("File input is empty!");
        return false;
    }
    
    // display loader
    setLoaderScreen("visible");
    
    // Return true to submit the form
    return true;
};

/* 
 * -----------------------------------
 * Callback from the upload controller
 * -----------------------------------
 */

// General callback with an alert message
var notify = function(text) {
    alert(text);
    // hide loader
    setLoaderScreen("hidden");
}

// Successfull callback with the filename of the uploaded image
var render_picture = function(filename){
    // Append the picture to the document
    document.getElementById("target_picture").setAttribute("src","./uploads/"+filename);
    // hide loader
    setLoaderScreen("hidden");
}

/* 
 * ------------------------------------
 * Helper function to toggle the loader
 * ------------------------------------
 */

function setLoaderScreen(classname){
    document.getElementById("loader_wrapper").className = classname;
}