<?php 
    $formdata = explode('&', $_POST['data']);
    parse_str($_POST['data'], $values);

    // connecting to database

    $server = 'localhost' ;
    $username = 'jamdorothy';
    $password = 'password';
    $dbname = 'signup';


    $connection = mysqli_connect($server,$username,$password,$dbname);

    if (!$connection){
    	echo "problem connecting";
    }
    else {
    	echo "connected successfully";
    }

    $encryptedPassword = password_hash($values['password'],PASSWORD_DEFAULT);


    $sql = "Insert into userinfo (firstname,surname,email,password,username,gender)
    		VALUES('"
    		.$values['firstname'] . "', '"   
    		.$values['surname']   . "', '"
    		.$values['email']     . "', '"    
    		.$encryptedPassword   . "', '"
    		.$values['username']  . "', '"
    		.$values['gender']    . "');";

    $query = mysqli_query($connection, $sql);
    if ($query){
        echo "row 1 inserted";
    }
    else {
        echo "mysql_query error - couldn't insert to the signup table";
    }


?>