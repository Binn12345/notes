<?php 

    session_start();

    include '../config/dbconnection.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
        // var_dump('<pre>', $stmt,$stmt2,$_POST);die;
        if ($stmt && $stmt2) {

            $bool = checkExists($_POST,$conn);

            if($bool == true) {

                error_response($_POST['username']);

            } else {

                response($stmt,$stmt2,$username,$password,$type,$subid);

            }
            
        } else {
            echo "Error: " . $conn->error;
        }
           
    }

    function checkExists($params,$conn)
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s", $params['username']);
        $stmt->execute();

        $result = $stmt->get_result()->num_rows == 1;
       
        return $result;
    }

    function error_response($username="")
    {
        $response = [
            'status'  => 'error',
            'message' => $username.' already taken.'
        ];
        echo json_encode($response);
    }

    function response($stmt,$stmt2,$username,$password,$type,$subid)
    {
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

    }