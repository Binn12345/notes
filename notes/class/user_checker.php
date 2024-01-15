<?php

    class access_poke{

        public function __construct($params = "") {
            // echo '<pre>', print_r($params, true) ?: 'undefined index', '</pre>';
        }

        static function __deploy($params = ""){
            // var_dump('<pre>',$params['user_authenticated']);die;
            if (!isset($params['user_authenticated']) || $params['user_authenticated'] !== true) {
                // User is not authenticated; redirect to the login page
                header('Location: /..');
                exit;
            }
            
        }

        static function __type($params = "") {

            $types = [
                '1' => 'Superadmin',
                '4' => 'User',
            ];
        
            echo $types[$params] ?? 'Unknown';
        }
        
    }
 