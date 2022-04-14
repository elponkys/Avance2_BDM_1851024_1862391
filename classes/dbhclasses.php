<?php
class Dbh{

protected function connect(){
    try{
        $host="localhost";
        $port=3306;
        $socket="";
        $user="root";
        $password="root";
        $dbname="pitufinoticias";
        
        $con = new PDO("mysql:host=$host;dbname=$dbname;",$user,$password)
            or die ('Could not connect to the database server' . mysqli_connect_error());
        
        //$con->close();
        

    }
    catch(PDOException $error){
        die ('Connection failed' . $error->getMessage());

    }
    return $con;
}


}




?>