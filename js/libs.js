function validate_username(){
    let invalids = ['!','&','*','(',')','\\','/','<','>']
    let username = document.getElementById('Name').value

    for(let filter of invalids){
        if(username.includes(filter)){
            return false;
        }
    }
    return username;
}

function validate_password(){
    let pass = document.getElementById('Password');
    if(pass.value.length >= 10) return pass.value;
    if(pass.value === '') return false;
    return null;
}

function signup() {
    let get_username = validate_username();
    let get_email = document.getElementById('Email').value;
    let get_password = validate_password();

    if(get_username === false){
        document.getElementById('err').style.color = 'red';
        document.getElementById('err').textContent = 'Username must contains letters and numbers only';
        return;
    }

    else if(!get_email){ 
        document.getElementById('err').style.color = 'red';
        document.getElementById('err').textContent = 'invalid email';
        return;
    }

    else if(get_password === null || get_password === false){ 
        document.getElementById('err').style.color = 'red';
        document.getElementById('err').textContent = 'Password must contains greathan or equal to 10 characters';
        return;
    }

    else {
        const formData = new URLSearchParams();
        formData.append('Name', get_username);
        formData.append('Email', get_email);
        formData.append('Password', get_password);
        fetch('http://localhost:3000/API/signup.php',{
            method:'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:formData
        }).then(response => response.json())
        .then(result => {
            if(result.Status === 200){
                document.getElementById('err').style.color = 'green';
                document.getElementById('err').textContent = 'Login successfull';
                setTimeout(() => window.location.reload(),2000);
            }
        }).catch(err => {
            document.getElementById('err').textContent = err.message;
        })
    }
}
