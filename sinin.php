<?php
include_once './includes/hedder.php';

$link = mysqli_connect('localhost','root','','phonebook');

if(!empty($_POST)){
    $email = $_POST['email']; 
    $password = $_POST['pass']; 
    $query = "SELECT * FROM pb_user WHERE u_email='$email'";
    $res = mysqli_query($link , $query );
    $data = mysqli_fetch_assoc($res); //when we want one data
    if($data){

        if( $password == $data['u_password']){
            $_SESSION['uID'] = $data['u_id'];
            $_SESSION['uEmail'] = $data['u_email'];
            $_SESSION['time'] = time();

            header('location:index.php');
        }else{
            echo "invalid password";
        }
    }else{
        echo "user dosen't exit.please sing up.";
    }
}

?>

<form action="" method="post">
    <table>

        <tr>
            <td>Email:</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="pass"></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="" value="Login"></td>
        </tr>

    </table>
    <p>Don't have an account? <a href="sinup.php">sin up</a></p>
</form>
<?php include_once './includes/footer.php' ?>

