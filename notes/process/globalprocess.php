<?php

    session_start();
    include '../config/dbconnection.php';

    $id       = $_POST['uid']      ?: "";
    $username = $_POST['username'] ?: "";
    $fname    = $_POST['fname']    ?: "";
    $mname    = $_POST['mname']    ?: "";
    $lname    = $_POST['lname']    ?: "";
    $fullname = $lname.', '.$fname.' '.$mname;


    $sql = "UPDATE tblpersonaldata SET fname = '{$fname}' , mname = '{$mname}' , lname = '{$lname}' , fullname = '{$fullname}' WHERE uniqid = '{$id}'";
    // var_dump('<pre>',$_POST);die;
    $result = mysqli_query($conn, $sql);
   
    if ($result) {

        $response = [
            'status'  => 'success',
            'message' => 'Personal data was succefully updated.'
        ];

        echo json_encode($response);
        
    } else {

        $response = [
            'status'  => 'error',
            'message' => "Error updating record: " . mysqli_error($conn)
        ];

        echo json_encode($response);
   
    }


