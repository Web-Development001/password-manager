function getapi_key(){
    const fs = require('fs');
    const content = fs.readFileSync('/media/mohamed/54B633F1B633D26A/Web development/password-manager/db.json', 'utf8');
    var data = JSON.parse(content)
    var getAPI_key = data['API_KEY'];
    return getAPI_key;
}

function signup(username,email,password){
    fetch('http://localhost:3000/API/signup.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            Name: username,
            Email: email,
            Password: password
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // 👈 parse as JSON
    })
    .then(data => {
        console.log('Server response:', data); // use returned JSON
    })
    .catch(error => {
        console.error('Error:', error);
    });
    
}