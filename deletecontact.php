 <?php session_start();
  if(empty($_SESSION['uID'])){
      header('location:sinin.php');
      die("You are not login");
  }
    
  $link = mysqli_connect('localhost','root','','phonebook');
 
  if(!empty($_GET)){
      
      $cId = $_GET['id'];
      
      $query = "DELETE FROM pb_contact WHERE c_id ='$cId'";
      $res = mysqli_query($link,$query);
      if($res){
          header('location:index.php');
      }else{
          echo 'Faild to delete.'.mysqli_error($link);
      }
      
  }

  ?>