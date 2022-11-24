

    <?php


    // $email = ($_POST['email']);
    // $password = clean($_POST['password']);

    // echo $email;
    // echo $password;



    //Start session
    session_start();
     
    //Include database connection details
    require_once('connection.php');
     
    //Array to store validation errors
    $errmsg_arr = array();
     
    //Validation error flag
    $errflag = false;
     
    //Function to sanitize values received from the form. Prevents SQL injection
    // function clean($str) {
    // $str = @trim($str);
    // if(get_magic_quotes_gpc()) {
    // $str = stripslashes($str);
    // }
    // return mysqli_real_escape_string($str);
    // }
     
    //Sanitize the POST values
    $email = ($_POST['email']);
    $password = ($_POST['password']);

    // echo $email;
    // echo $password;
     
    //Input Validations
    if($email == '') {
    $errmsg_arr[] = 'email missing';
    $errflag = true;
    }
    if($password == '') {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
    }
     
    //If there are input validations, redirect back to the login form
    if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
    }
	 
    //Create query
    $qry="SELECT * FROM member WHERE email='$email' AND password='$password'";
    $result=mysqli_query($connection,$qry);
     
    //Check whether the query was successful or not
    if($result) {
    if(mysqli_num_rows($result) > 0) {
    //Login Successful
    session_regenerate_id();
    $member = mysqli_fetch_assoc($result);
    $_SESSION['SESS_MEMBER_ID'] = $member['member_id'];
    $_SESSION['SESS_FIRST_NAME'] = $member['email'];
    $_SESSION['SESS_LAST_NAME'] = $member['password'];
    session_write_close();
    header("location: home.php");
    exit();
    }else {
    //Login failed
    $errmsg_arr[] = 'Your Email or Password Incorrect';
    $errflag = true;
    if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
    }
    }
    }else {
    die("Query failed");
    }
    ?>