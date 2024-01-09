<?php
$conn = mysqli_connect("localhost", "root", "", "blog");
if (!$conn) {
    echo "connection error " . mysqli_connect_error();
}



function store_category($cat)
{
    global $conn;
    $sql = "INSERT INTO categories (name) VALUES ('$cat')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {
        return true;
    }
    return false;
}


function check_find_cat($id)
{
    global $conn;
    $sql = "SELECT * FROM categories WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    }
    return false;
}
function delete_cat($id)
{
    global $conn;
    $sql = "DELETE FROM categories WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {
        return true;
    }
    return false;
}

function get_all($table)
{
    global $conn;
    $sql = "SELECT * FROM $table";
    $data = [];
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}

/*

$data = [
    "column name" => "values",
    "column name" => "values"
]
*/
function dbInsert($table, $data)
{
    global $conn;
    $names = implode(",", array_keys($data));
    $values = "'" . implode("','", array_values($data)) . "'";

    $sql = "INSERT INTO $table ($names) VALUES ($values) ;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {
        return true;
    }
    return false;
}

/*
 $data = [
    "tables" =>["users","posts","comments","categories"],
    "columns" => ["name","email","password","created_at"]
    ]
*/
function selectData($data, $where = "")
{
    global $conn;
    $tables = implode(",", $data["tables"]);
    $columns = implode(",", $data["columns"]);
    $sql = "SELECT $columns FROM $tables $where";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $selected[] = $row;
        }
        return $selected;
    }
    return false;
}

function if_exists($table , $where =""){
    global $conn;
    $sql = "SELECT * FROM $table  $where";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        return true;
    }
    return false;
}


function deleteItem($table,$id){
    global $conn;
    $sql = "DELETE FROM $table WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {
        return true;
    }
    return false;
}


function dbUpdate($table, $columns, $where){
    global $conn;
    $sql = "UPDATE $table SET $columns WHERE $where";
    $result = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {
        
        return true;
    }
    return false;
}


function views_counter($p_id){
    global $conn;
    $sql = "select * from post_views where pv_post_id = '$p_id'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_fetch_assoc($result);
    
    
    if($count){
        $pv = $count["pv_number"] + 1;
        $sql = "update post_views set pv_number = '$pv' where pv_post_id = '$p_id'";
    }else{
        $sql = "insert into post_views(pv_post_id) values('$p_id')";
    }
    $result = mysqli_query($conn, $sql);
    
    
}

function post_views($id){
    global $conn;
    $sql = "select * from post_views where pv_post_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_fetch_assoc($result);
    return $count["pv_number"];
}