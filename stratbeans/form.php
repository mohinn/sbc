<?php


    $errors = [];
    $data = [];
   

    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required.';
    }

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required.';
    }
    
    if (empty($_POST['skill'])) {
        $errors['skill'] = 'Skills are required.';
    }

    if (!empty($errors)) {
        $data['success'] = false;
        $data['errors'] = $errors;
    } else {
       
        
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "sbc";

        $conn = mysqli_connect($server, $username, $password, $database);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $skills = json_encode($_POST['skill']);

        $sql = "INSERT INTO users(name, email, skills) VALUES('$name', '$email', '$skills')";
        $query = mysqli_query($conn, $sql);
        
            $data['success'] = true;
            $data['message'] =  "Success!";
      
        
    }
    
    echo json_encode($data);