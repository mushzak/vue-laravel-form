<?php


namespace App\Http\Controllers;
use App\DbConfig;

class DbStorage
{
    public static function action($data){
        $config = DbConfig::first();
        if($config){
            $servername = $config->host;
            $username =  $config->user;
            $password =  $config->password;
            $dbname =  $config->database;
            $name = $data['name']; $phone = $data['phone'] ; $text = $data['text'];
            $table =  $config->table;
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = " INSERT INTO $table (name, phone, text) VALUES ( '$name' , '$phone' , '$text' ) ";
            if ($conn->query($sql) === TRUE) {
                return true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }else{
            return false;
        }
    }
}
