const URL = "http://localhost:8888/api/administrador";

async function getAllAdministrador() {

    return resp = await fetch( URL + "/read.php",{
        method: 'GET',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        } 
    });
}

 async function insertAdministrador( usuario, password ){ //->aki ta
 
    const DATA = {
        "usuario": usuario,
        "password": "holi"
       
    }

    return resp = await fetch( URL + "/create.php",{
        method: 'POST',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: JSON.stringify( DATA )
    });


    

}