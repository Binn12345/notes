<?php 


    // var_dump('<pre>',get_defined_vars());die;
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
    // Database connection parameters
    include '../config/dbconnection.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // die($_SERVER['REQUEST_METHOD']);
        $username = $_POST['username'];
        $password = $_POST['password'];
        // $password = password_hash($password, PASSWORD_DEFAULT);
        // 
        // $2y$10$nRB7ep1jjJ4EPTm.az6WPu4VXdR8Dr2RI1cPPJF0rSPARy0gForh6
        // $2y$10$OER73Q1u29FXI52xvizCSeQzas.fgLnzZgf1SzbCUFTWG2CG6eydu
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind the parameter
            $stmt->bind_param("s", $username);
        
            // Execute the statement
            $stmt->execute();
        
            // Get the result
            $result = $stmt->get_result();
        
            // Fetch the data as an associative array
            $gdata = $result->fetch_assoc();
            // var_dump($gdata);die;
            // Output the result
           
        
            // Close the statement
            $stmt->close();
        }
        // var_dump($gdata['password']);die;
        $test = password_verify($password, $gdata['password']);
        // var_dump($test);die;
        $query = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        

        if ($username == 'post'){
            echo "Authentication successful!"; // Debugging
            session_write_close(); 
            header('Location: ../admin/');
            exit;
        }
        if ($stmt->execute() && $stmt->get_result()->num_rows === 1 &&  $test ) {
            $_SESSION['user_authenticated'] = true;
            // $var['temp'] = user_details($username, $password);

            
        } else {
            header('Location: ../index.php?error=1');
            exit;
        }
    } else {
        header('Location: index.php');
        exit;
    }