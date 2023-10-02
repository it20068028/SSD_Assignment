<?php
session_start();

if (isset($_POST['login'])) {

    include_once 'config.php';

    // Check if there is a previous login attempt
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 1;
    } else {
        $_SESSION['login_attempts']++;
    }

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['psw']);
    $_SESSION['u_pwd'] = $pwd;

    if (empty($email) || empty($pwd)) {

        $message = "Input fields!";
        echo "<script type='text/javascript'>alert('$message');
			   window.location.href='../loginp.php';</script>";
    } else {

        $sql = "SELECT * FROM customers WHERE email='$email' OR user_name='$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {

            $message = "Invalid user name or password!";
            echo "<script type='text/javascript'>alert('$message');
			       window.location.href='../loginp.php';</script>";
        } else {

            if ($row = mysqli_fetch_assoc($result)) {

                $hashedPwdCheck = password_verify($pwd, $row['cus_pwd']);
                if ($hashedPwdCheck == false) {
                    $message = "Invalid password!";

                    // Check if login attempts exceed a limit 
                    if ($_SESSION['login_attempts'] >= 3) {
                        $message = "Too many failed login attempts. Please try again later.";
                        unset($_SESSION['login_attempts']); // Reset login attempts
                    }

                    echo "<script type='text/javascript'>alert('$message');
						   window.location.href='../loginp.php';</script>";
                } elseif ($hashedPwdCheck == true) {
                    // Successful login, reset login attempts
                    unset($_SESSION['login_attempts']);

                    $_SESSION['u_id'] = $row['customer_id'];
                    $_SESSION['u_first'] = $row['first_name'];
                    $_SESSION['u_last'] = $row['last_name'];
                    $_SESSION['u_email'] = $row['email'];
                    $_SESSION['u_name'] = $row['user_name'];

                    if ($row['is_admin'] == 1) {
                        // User is an admin, provide admin privileges
                        $message = "Successfully login as admin!";
                        echo "<script type='text/javascript'>alert('$message');
                               window.location.href='../admin.customer.php';</script>";
                    } else {
                        // User is not an admin, provide regular user privileges
                        $message = "Successfully login!";
                        echo "<script type='text/javascript'>alert('$message');
                               window.location.href='../index.php';</script>";
                    }
                }
            }
        }
    }
} else {

    header("Location: ../loginp.php?login=error");
    exit();
}
?>
