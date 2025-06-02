import { validate_username,validate_email } from "./libs.js";
import { get_api_key } from "./api_key.js";

function signup() {    
    const apiKey = get_api_key();
    validate_email(apiKey).then(msg => {
        console.log(msg);
    })
}


document.getElementById('signup-btn').addEventListener('click',signup)