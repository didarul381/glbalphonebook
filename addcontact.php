     <?php
    include_once __dir__.'/includes/hedder.php';

  if(empty($_SESSION['uID'])){
      header('location:sinin.php');
      die("You are not login");
  }
   
     $uID = $_SESSION['uID'];
  $link = mysqli_connect('localhost','root','','phonebook');
 echo '<pre>';
print_r($_POST);

  if(!empty($_POST)){
      $name = $_POST['name']; 
      $phone = $_POST['phone']; 
      
      $query = "INSERT INTO pb_contact(c_name,c_phone,u_id)VALUES('$name','$phone','$uID')";
     $res = mysqli_query($link,$query);
      if($res){
          header('location:index.php');
      }else{
          echo "faild.".mysqli_error($link);
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
                <td>Phone:</td>
                <td><input type="text" name="phone"></td>
            </tr>
             <tr>
                <td><input type="submit" name="" value="Add contact"></td>
            </tr>
                
        </table>
        <p><a href="logout.php">Logout</a></p>
    </form>
  <?php include_once __dir__.'/includes/footer.php' ?>
