<?php 


    // var_dump('<pre>',get_defined_vars());die;

    session_start();
    // Database connection parameters
    include '../config/dbconnection.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // die($_SERVER['REQUEST_METHOD']);
        
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $type     = $_POST['type'];
        $id = uniqid();
        $characterIndex = 0;  // Change this to the index of the character you want
        $subid = $username . $id[$characterIndex];


        $sql  = "INSERT INTO users (username, password, usertype,uniqid) VALUES (?, ?, ?, ?)";
        $sql2 = "INSERT INTO tblPersonalData(uniqid,username) VALUES (?, ?)"; 

        $stmt = $conn->prepare($sql);
        $stmt2 = $conn->prepare($sql2);

        if ($stmt && $stmt2) {
            // Bind parameters for the first prepared statement
            $stmt->bind_param("ssss", $username, $password, $type, $subid);
            
            // Execute the first statement
            $result = $stmt->execute();
        
            // Bind parameters for the second prepared statement
            $stmt2->bind_param("ss", $subid, $username);
        
            // Execute the second statement
            $result2 = $stmt2->execute();
        
            // Check for errors
            if ($result && $result2) {
                $response = [
                    'status'  => 'success',
                    'message' => 'Records inserted successfully.'
                ];
                echo json_encode($response);
            } else {
                echo "Error: " . $stmt->error . "\n" . $stmt2->error;
            }
        
            // Close the statements
            $stmt->close();
            $stmt2->close();
        } else {
            echo "Error: " . $conn->error;
        }
        

        
    }