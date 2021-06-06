<?php


function createdb(){
     
   
     // on local db
    //$servername = "localhost";
   // $username = "root";
    //$password = "";
   // $dbname = "league";
   
    
    
    
    
    // on remote db
    $servername = "remotemysql.com";
    $username = "2Fsu3w9UT2";
    $password = "z0b0UN3Kzn";
    $dbname = "2Fsu3w9UT2";
    

    //create conection

    $con = mysqli_connect($servername, $username, $password);

    //check connection

    if(!$con){
        die("Connection failed:" .mysqli_connect_error());
    }

    //create database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "CREATE TABLE IF NOT EXISTS teams(
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            team_name VARCHAR(25) NOT NULL,
            `matches_played` int(10) DEFAULT '0' NULL,
            `won` int(10) DEFAULT '0' NULL,
            `drawn` int(10) DEFAULT '0' NULL,
            `lost` int(10) DEFAULT '0' NULL,
            `goals_for` int(100) DEFAULT '0' NULL,
            `goals_against` int(100) DEFAULT '0' NULL,
            `goal_difference` int(100) DEFAULT '0' NULL,
            `points` int(100) DEFAULT '0' NULL,
            `last_match` varchar(10) DEFAULT '0' NULL
            
        );
        
        ";
        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot create table";
        }

    }else{
        echo "error while connecting to the database" .mysqli_error($con);
    }
}