    <?php
    include_once './includes/hedder.php';

  $link = mysqli_connect('localhost','root','','phonebook');
  if(!empty($_POST)){
      $name = $_POST['name']; 
      $email = $_POST['email']; 
      $password = $_POST['pass']; 
      $conpassword = $_POST['conpass']; 
      
            if($password == $conpassword ){
      $query = "INSERT INTO pb_user(u_name,u_email,u_password) VALUES('$name','$email','$password')";
        $res = mysqli_query($link,$query);
                
                if($res){
                  header('location:sinin.php');
                }else{
                    echo "Registation.".mysqli_error($link);
                }
            }else{
                echo "password doesn't match.";
            }
  }

?>

    <form action="" method="post">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>FbEmail:</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>FbPassword:</td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="conpass"></td>
            </tr>
               <tr>
                <td></td>
                <td><input type="submit" name="" value="Create account"></td>
            </tr>
                
        </table>
        <p>Do have an account? <a href="sinin.php">sin in</a></p>
    </form>
  <?php include_once './includes/footer.php' ?>
