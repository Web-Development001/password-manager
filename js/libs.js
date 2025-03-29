function toggle_password(pass_id,eye_id){
    let get_pass = document.getElementById(pass_id);
    let animate_eye = document.getElementById(eye_id);

    if(get_pass.type === "password"){
        get_pass.type = "text";
        animate_eye.style.display = "none";
    } else {
        get_pass.type = "password";
        animate_eye.style.display = "block";
    }
}

function Isempty(get_inp_title_ID,get_inp_passw_ID){
    let get_input_title = document.getElementById(get_inp_title_ID);
    let get_input_passw = document.getElementById(get_inp_passw_ID);
    if(get_input_title.value == "" && get_input_passw.value == "") alert("inputs are missing");
    else if(get_input_title.value == "") alert("Title name missing");
    else if(get_input_passw.value == "") alert("Password is missing");
    else return;
}

function clearText(get_input_id){
    let getinpid = document.getElementById(get_input_id);
    getinpid.value = "";
}

function reaload_page(page_name) {
    window.location.href = page_name;
}