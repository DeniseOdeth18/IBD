
const URL = "http://localhost:80/api";

async function getAllEmployees() {

    return resp = await fetch( URL + "/read.php",{
        method: 'GET',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        } 
    });
}

async function insertEmployee( name, email, age, designation){

    const DATA = {
        "name": name,
        "email": "juan email", 
        "age": 22,
        "designation": "prueba designation"
    }

    return resp = await fetch( URL + "/create.php",{
        method: 'POST',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: JSON.stringify( DATA )
    });


}