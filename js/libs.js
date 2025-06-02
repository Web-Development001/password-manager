export function validate_username(){
    let invalids = '!&*().\\/<>'
    let username = document.getElementById('Name')

    for(let filter of invalids){
        if(username.value.includes(filter)) return false;
        else return true;
    }
}

export function validate_email(key){
    let email = document.getElementById('Email').value;
    return fetch('https://api.zerobounce.net/v2/validate?api_key='+key+'&email='+email)
        .then(response => response.json())
        .then(result => {
            if(result.status == 'valid') return true;
            else return false;
        }).catch(err => {
            return err.message;
        });
}
