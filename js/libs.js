function getapi_key(){
    const fs = require('fs');
    const content = fs.readFileSync('/media/mohamed/54B633F1B633D26A/Web development/password-manager/db.json', 'utf8');
    var data = JSON.parse(content)
    var getAPI_key = data['API_KEY'];
    return getAPI_key;
}

