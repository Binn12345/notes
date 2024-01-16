<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    class MyClass {
        // Properties (variables)
        public $name;
        public $age;
    
        // Constructor method
        public function __construct() {
            // $this->name = $name;
            // $this->age = $age;
        }
    
        // Methods (functions)
        public function greet() {
            echo "Hello, my name is {$this->name} and I am {$this->age} years old.";
        }

        public function user_info($username,$conn) {
            
            $sql = "SELECT * FROM users 
                    JOIN tblPersonalData  ON tblPersonalData.uniqid = users.uniqid
                    where users.username = $username";
            // $sql .= " AND tblPersonalData.
            // die($sql);
            $sql = $conn->prepare($sql);
            if (!$sql) {
                die("Error in SQL query: " . $conn->error);
            }
            $sql->execute();
            $result = $sql->get_result();
            $user_data = $result->fetch_assoc();

            return $user_data;

        }


    }


