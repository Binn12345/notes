<?php 

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
        
        if ($stmt->execute() && $stmt->get_result()->num_rows === 1 &&  $test ) {


            // $user_data = $result[0];
            // var_dump('<pre>',$query);die;
            $sql = "SELECT * FROM users JOIN tblPersonalData ON tblPersonalData.uniqid = users.uniqid 
                    WHERE users.username = '{$username}'";
            $sql = $conn->prepare($sql);
            $sql->execute();
            $result = $sql->get_result();
            $user_data = $result->fetch_assoc();
            // var_dump('<pre>',$sql);die;
            $_SESSION['user_authenticated'] = true;
            $_SESSION['guest'] = 1;
            $_SESSION['userdata'] = $user_data;
            // $var['temp'] = user_details($username, $password);
            $transkey = password_hash('accessgranted', PASSWORD_BCRYPT);
            header("Location: ../admin/?token='{$transkey}'&username='{$username}'");
            exit;
            
        } else {
            $response = [
                'status'  => 'success',
                'message' => 'Records inserted successfully.'
            ];
            echo json_encode($response);
            header('Location: ../index.php?error=1');
            exit;
        }
    } else {
        header('Location: index.php');
        exit;
    }