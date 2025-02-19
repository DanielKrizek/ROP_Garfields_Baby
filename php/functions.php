<?php
function check_login($conn)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    die;
}

function login($conn, $username, $password)
{
    $query = "select * from users where username = '$username' limit 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if (password_verify($password, $user_data['password'])) {
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['username'] = $user_data['username'];
            echo "<script>alert('Přihlášení proběhlo úspěšně');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
            die;
        }
    }
    echo "<script>alert('Neplatné uživatelské jméno nebo heslo');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    return;
}

function signup($conn, $username, $password)
{
    $query = "select * from users where username = '$username' limit 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<script>alert('Uživatelské jméno je již zabráno');</script>";
        echo "<script>window.location.href = window.location.href;</script>";
        return;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "insert into users (username, password) values ('$username', '$hashed_password')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registrace proběhla úspěšně');</script>";
        echo "<script>window.location.href = window.location.href;</script>";
        return;
    }
    return "Signup failed";
}
