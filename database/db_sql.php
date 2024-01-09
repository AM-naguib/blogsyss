<?php

// connection to sql
$conn = mysqli_connect("localhost", "root", "");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// drop database
$sql = "DROP DATABASE IF EXISTS blog";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "erorr in drop database" . mysqli_error($conn);
}
// create database
$sql = "CREATE DATABASE  if not exists blog";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "erorr in create database" . mysqli_error($conn);
}
// connection with database
$conn = mysqli_connect("localhost", "root", "", "blog");
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "erorr in connection" . mysqli_error($conn);
}
// create users table
$sql = "CREATE table if not exists  users (
    id int AUTO_INCREMENT PRIMARY KEY ,
    u_name varchar(100) not null,
   u_username varchar(100) not null UNIQUE,
    u_password varchar(100) not null,
    u_role varchar(20) DEFAULT 0 ,
    u_status varchar(20) DEFAULT 1
    
)";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "erorr in create table" . mysqli_error($conn);
}
// create categories table

$sql = "CREATE table if not exists categories(
    id int AUTO_INCREMENT PRIMARY KEY,
        name varchar(100) UNIQUE
    );";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "erorr in create table categories" . mysqli_error($conn);
}
// create posts table
$sql = "CREATE TABLE if not exists posts (
        id int AUTO_INCREMENT PRIMARY KEY ,
        p_title varchar(255) not null,
        p_content text not null,
        p_status int,
        p_date varchar(50),
        p_keywords text,
        p_category_id int,
        p_user_id int,
        p_approve int DEFAULT 0,
        FOREIGN KEY (p_category_id) REFERENCES categories(id),
        FOREIGN KEY (p_user_id) REFERENCES users(id)
    )";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "erorr in create table posts" . mysqli_error($conn);
}
// create comments table 
$sql = "CREATE table if not exists comments(
	id int PRIMARY KEY AUTO_INCREMENT,
    c_name varchar(100) not null,
    c_content text not null,
    c_post_id int,
    c_approve int DEFAULT 0,
    c_date varchar(50),
    FOREIGN KEY (c_post_id) REFERENCES posts(id)
    
    
);";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "erorr in create table comments " . mysqli_error($conn);
}
// create settings table
$sql = "CREATE TABLE if not exists settings(
    id int AUTO_INCREMENT PRIMARY KEY ,
        site_title varchar(100) not null,
        site_description varchar(200) not null,
        logo varchar(255),
        phone varchar(50),
        email varchar(100),
        fav_icon varchar(255),
        facebook varchar(255),
        youtube varchar(255),
        github varchar(255),
        about_title varchar(255) NOT NULL,
        about_content text NOT NULL
    );
    ";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "erorr in create table settings " . mysqli_error($conn);
}
// create post_views table
$sql = "CREATE TABLE if not exists post_views(
        id int AUTO_INCREMENT PRIMARY KEY,
        pv_number int DEFAULT 1000,
        pv_post_id int,
        FOREIGN KEY (pv_post_id) REFERENCES posts(id)
        
    )";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "erorr in create table post_views " . mysqli_error($conn);
}