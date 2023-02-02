<?php

require('../model/database.php');
require('../model/search_db.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == null){
    $action = filter_input(INPUT_GET, 'action');
    if ($action == null){
        $action = 'search_data';
    }
}

switch ($action){
    case 'search_data':
        $search = filter_input(INPUT_POST, 'search');
        if ($search == null){
            $message = 'Empty search field';
            include('searchpage.php');
            exit;

        } else {
            $row_count = row_count($search);
            $singular_plural_ending = ($row_count > 1) ? 's' : '';
            if ($row_count === 0){
                $message = 'There is no result that matches your search!';
                include('searchpage.php');
                exit;
            } else {
                $search_result = search_result($search);
                include('search_result_page.php');
                exit;
            }
        }
        break;

    case 'single_search_result':
        $p_id = filter_input(INPUT_GET, 'p_id');
        if ($p_id == null || $p_id == false){
            $message  = 'Invalid product ID';
            include('search_result_page.php');
            exit;
        } else {
            $single_search_result = single_search_result($p_id);
            include('single_post_details.php');
            exit;

        }
        break;
    case 'uploading':
    // $title = $_POST['title'];
    // $content = $_POST['content'];
    // $date_post = $_POST['date_posted'];
    $user_id = filter_input(INPUT_POST, 'user_id');
    $title = filter_input(INPUT_POST, 'title');
    $content = filter_input(INPUT_POST, 'content');
    $date_post = filter_input(INPUT_POST, 'date_posted');
    $files = $_FILES['file'];
    $name = $files['name'];
    $temp_name = $files['tmp_name'];
    
    if($user_id == null || $title == null || $content == null || $date_post == null || $name == null){
        $message = 'please enter something';
        include('uploading_post.php');
        exit;
    }else{
        $destination = '../uploads/' . $name;
        $success = move_uploaded_file($temp_name, $destination);
        $user_id = $_SESSION['user_id'];
        inserting_uploads($user_id, $title, $content, $date_post, $name);
        include('searchpage.php');
        exit;
    }
    case 'signing':
        $full_name = filter_input(INPUT_POST, 'full_name');
        $username = filter_input(INPUT_POST, 'username');
        $pass_word = filter_input(INPUT_POST, 'pass_word');
        $con_password = filter_input(INPUT_POST, 'con_password');
        if($full_name == null || $username == null || $pass_word == null || $con_password == null){
            $message = 'empty fields';
            include('signup.php');
            exit;
        }else if($pass_word != $con_password){
            $message = 'password and confirm password must be same';
            include('signup.php');
        }else{
            $password_hash = password_hash($pass_word, PASSWORD_DEFAULT);
            $inserting_signup_info = inserting_signup_info($full_name, $username, $password_hash, $con_password);
            include('uploading_post.php');
            exit;
        }
        break;
    case 'single_search_result':
        $p_id = filter_input(INPUT_GET, 'p_id', FILTER_VALIDATE_INT);
        if ($p_id == null || $p_id == false){
            $message = 'Invalid post ID';
            include('searchpage.php');
        } else {
            $single_search_result = single_search_result($p_id);
            include('single_post_details.php');
        }
        break;
    case 'login':
        $user = filter_input(INPUT_POST, 'user_name');
        $pass = filter_input(INPUT_POST, 'pass');
        if($user == null || $pass == null){
            $message = 'empty fields';
            include('loginpage.php');
            exit;
        }else if (row_count_users_from_db($user) === 0) {
            $message = 'User doesn\'t exist';
            include('loginpage.php');
            exit;

        }else{
            $user = get_user_details_from_db($user);
            $password_verify = password_verify($pass, $user['pass_word']);
            if ($password_verify != $user['pass_word']){
                $message = 'Invalid password!';
                include('loginpage.php');
                exit;
            } else {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['name'] = $user['full_name'];
                $user_id = $_SESSION['user_id'];
                $post_by_user_id = post_by_user_id($user_id);

                include('dashboard.php');
                    // header(" .?action=signing");
                exit;
            }

            // include('searchpage.php');
        }
        break;
    case 'profile_picture':
        // $_SESSION['user_id'] = $user['user_id'];
        // $_SESSION['profile_picture'] = $['profile_picture'];
        // $single_search_result =  single_search_result($na_me);
        $user = filter_input(INPUT_POST, 'user_name');
        $files = $_FILES['file'];
        $na_me = $files['name'];
        $temp_name = $files['tmp_name'];
        if($na_me == null){
            $message = 'empty field';
            include('profile_picture.php');
        }else{
            $name = explode('.', $na_me);
            $names = end($name);
            $req = array('JPG', 'PNG');
            $na_me = in_array($names, $req);
            if(!isset($na_me)){
                $message = 'unsupported file_format';
                include('profile_picture.php');
            }else{
                $destination = '../uploads/' . $na_me;
                $success = move_uploaded_file($temp_name, $destination);    
                $inserting_proile_picture = inserting_profile_picture($na_me);
                include('searchpage.php');
            }

        }

    break;

    case 'logout':
        $_SESSION = array();
        session_destroy();
        include('searchpage.php');
        exit;
        break;

    case 'edit_post':
        $p_id = filter_input(INPUT_POST, 'p_id', FILTER_VALIDATE_INT);
        if ($p_id == null || $p_id == false){
            $message = 'Invalid post ID!';
        } else {
            $single_post_to_edit =  single_post_to_edit($p_id);
            include('edit_post.php');
        }


        break;

    case 'show_dashboard':
        $user_id = $_SESSION['user_id'];
        $post_by_user_id = post_by_user_id($user_id);
        include('dashboard.php');

        break;

    case 'editing':
       $p_id = filter_input(INPUT_POST, 'p_id', FILTER_VALIDATE_INT);
       $p_topic = filter_input(INPUT_POST, 'p_topic');
       $p_content = filter_input(INPUT_POST, 'p_content'); 
       $p_date = filter_input(INPUT_POST, 'p_date'); 
    //    $file = $_FILES['p_url'];
    //    $p_url = $file['name'];
    //    $temp_n = $file['tmp_name'];
       $all =$p_id . $p_topic . $p_content . $p_date;
       if($all == null){
        $message = 'empty fields';
        include('edit_post.php');
       }
       else{
        // $destination = '../uploads/' . $p_url;
        // $success = move_uploaded_file($temp_n, $destination);
        editing($p_id, $p_topic, $p_content, $p_date);
        $single_post_to_edit =  single_post_to_edit($p_id);
        header("location: .?action=show_dashboard");
        exit;
       }
       break;


}





