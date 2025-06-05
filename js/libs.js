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
    if(pass.value.length >= 10) return String(pass.value);
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

    else if(get_username === '' && get_password === '' && get_email === ''){
        document.getElementById('err').style.color = 'red';
        document.getElementById('err').textContent = 'All fields are empty';
        return;
    }

    else {
        const formData = new URLSearchParams();
        formData.append('Name', get_username.trim());
        formData.append('Email', get_email.trim());
        formData.append('Password', get_password.trim());
        fetch('http://localhost:3000/API/signup.php',{
            method:'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body:formData
        }).then(response => response.json())
        .then(result => {
            if(result.status === 200){
                document.getElementById('err').style.color = 'green';
                document.getElementById('err').textContent = 'Signup successfull';
                setTimeout(() => window.location.reload(),2000);
            }
        }).catch(err => {
            document.getElementById('err').textContent = err.message;
        })
    }
}


function login(){
    let username = document.getElementById('Username_login').value.trim();
    let password = document.getElementById('Password_login').value.trim();
    let url = `http://localhost:3000/API/User_info_grabber.php?username=${encodeURIComponent(username)}`;

    fetch(url)
    .then(response => response.json())
    .then(data => {
        if(data['Username'] == username && data['Password'] == password){
            document.getElementById('_err').style.color = 'green';
            document.getElementById('_err').textContent = 'Login successfull';
            setTimeout(() => window.location.href = `http://localhost:3000/dashboard.php?user=${encodeURIComponent(username)}`,2000);
        } 
        else {
            document.getElementById('_err').style.color = 'red';
            document.getElementById('_err').textContent = 'Username or password is incorrect, Try again';
        }
    }).catch(err => document.getElementById('_err').textContent = err.message);
}
