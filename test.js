
function validate_username(){
    let invalids = ['!','&','*','(',')','\\','/','<','>']
    let username = 'fucking!'
    let is_present = true;

    for(let filter of invalids){
        if(username.includes(filter)){
            is_present = false;
            break
        } else {
            is_present = true;
            break
        }
    }

    if(is_present === true) return username;
    else return null;
}

console.log(validate_username())