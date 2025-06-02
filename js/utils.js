import { validate_username,validate_email } from "./libs.js";
import { get_api_key } from "./api_key.js";

document.getElementById('signup-btn').addEventListener('click',() => {
    console.log(get_api_key());
    
})