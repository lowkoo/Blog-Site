<?php

require('database.php');

function search_result($search) {
    global $connection;
    $query = "SELECT * FROM post WHERE p_topic LIKE CONCAT('%', :search, '%')
                OR p_content LIKE CONCAT('%', :search, '%')";
    $statement = $connection->prepare($query);
    $statement->bindValue(':search', $search);
    $statement->execute();
    $search_result = $statement->fetchAll();
    $statement->closeCursor();
    return $search_result;
}
function row_count($search) {
    global $connection;
    $query = "SELECT * FROM post WHERE p_topic LIKE CONCAT('%', :search, '%')
                OR p_content LIKE CONCAT('%', :search, '%')";
    $statement = $connection->prepare($query);
    $statement->bindValue(':search', $search);
    $statement->execute();
    $row_count = $statement->rowCount();
    $statement->closeCursor();
    return $row_count;
}

function single_search_result($p_id) {
    global $connection;
    $query = 'SELECT * FROM post WHERE p_id = :p_id ORDER BY p_id DESC' ;
    $statement = $connection->prepare($query);
    $statement->bindValue(':p_id', $p_id);
    $statement->execute();
    $single_search_result = $statement->fetch();
    $statement->closeCursor();
    return $single_search_result;
}
function inserting_uploads($user_id, $title, $content, $date_post, $p_url){
    global $connection;
    $query = 'INSERT INTO post(user_id, p_topic, p_content, p_date,  p_url)
                VALUES(:user_id, :title, :content, :date_post, :p_url)';
    $statement = $connection->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':content', $content);
    $statement->bindValue(':date_post', $date_post);
    $statement->bindValue(':p_url', $p_url);
    $statement->execute();
    $statement->closeCursor();

}
function inserting_signup_info($full_name, $username, $pass_word, $con_password){
    global $connection;
    $query = 'INSERT INTO signup(full_name, username, pass_word, confirm_password)
                VALUES(:full_name, :username, :pass_word, :con_password)';
    $statement = $connection->prepare($query);
    $statement->bindValue(':full_name', $full_name);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':pass_word', $pass_word);
    $statement->bindValue(':con_password', $con_password);
    $statement->execute();
    $statement->closeCursor();

}




function get_user_details_from_db($user){
    global $connection;
    $query = 'SELECT * FROM signup WHERE username = :user';
    $statement = $connection->prepare($query);
    $statement->bindValue(':user', $user);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
}

function row_count_users_from_db($user){
    global $connection;
    $query = 'SELECT * FROM signup WHERE username = :user';
    $statement = $connection->prepare($query);
    $statement->bindValue(':user', $user);
    $statement->execute();
    $row_count = $statement->rowCount();
    $statement->closeCursor();
    return $row_count;
}
// function inserting_login_info($user, $pass){
//     global $connection;
//     $query = 'INSERT INTO log_in(user_name, pass_word)
//                 VALUES(:user, :pass)';
//     $statement = $connection->prepare($query);
//     $statement->bindValue(':user', $user);
//     $statement->bindValue(':pass', $pass);
//     $statement->execute();
//     $statement->closeCursor();
//     }

function editing($p_id, $p_topic, $p_content, $p_date){
    global $connection;
    $query = 'UPDATE post SET p_topic = :p_topic, p_content = :p_content, p_date = :p_date
                WHERE p_id = :p_id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':p_id', $p_id);
    $statement->bindValue(':p_topic', $p_topic);
    $statement->bindValue(':p_content', $p_content);
    $statement->bindValue(':p_date', $p_date);
    $statement->execute();
    $statement->closeCursor();

}

function single_post_to_edit($p_id){
    global $connection;
    $query = 'SELECT * FROM post WHERE p_id = :p_id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':p_id', $p_id);
    $statement->execute();
    $single_post_to_edit = $statement->fetch();
    $statement->closeCursor();
    return $single_post_to_edit;
}

function post_by_user_id($user_id){
   global $connection;
   $query = 'SELECT * FROM post WHERE user_id = :user_id';
   $statement = $connection->prepare($query);
   $statement->bindValue(':user_id', $user_id);
   $statement->execute();
   $post_by_user_id = $statement->fetchAll();
   $statement->closeCursor();
   return $post_by_user_id;
}
function inserting_profile_picture($na_me){
    global $connection;
    $query = 'INSERT INTO post(profile_picture)
                VALUES(:na_me)';
    $statement = $connection->prepare($query);
    $statement->bindValue(':na_me', $na_me);
    $statement->execute();
    $statement->closeCursor();
}
function selecting_profile_picture($user_id){
    global $connection;
    $query = 'SELECT * FROM post WHERE p_id = :user_id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $selecting_profile_picture = $statement->fetch();
    $statement->closeCursor();
    return $selecting_profile_picture;
}

