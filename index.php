<?php include_once __dir__.'/includes/hedder.php';


  if(empty($_SESSION['uID'])){
      header('location:sinin.php');
      die("You are not login");
  }
    
     $uID = $_SESSION['uID'];
    $link = mysqli_connect('localhost','root','','phonebook');
 
?>
    

    <table id="customers">
        <tr>
            <th>SL NO</th>
            <th>Name</th>
            <th>Phone</th>
            <th> Action</th>
        </tr>
        
     
   
  <?php
      
 $query= "SELECT * FROM pb_contact WHERE u_id='$uID'";
 $res = mysqli_query($link,$query);
        $sl=1;
 $data = mysqli_fetch_all($res,MYSQLI_ASSOC);
   
  foreach($data as $d){ ?>
      
      <tr>
            <td><?php echo $sl++ ?></td>
            <td><?php echo $d['c_name'] ?></td>
            <td><?php echo $d['c_phone']?></td>
            <td>
            <a href="editcontact.php?id=<?php echo $d['c_id'] ?>">Edit</a> | 
            <a onclick ="return confirm('Are you sure to delete?')"href="deletecontact.php?id=<?php echo $d['c_id']?>">Delete</a>

            </td>
        </tr>

    
      
  <?php }

?>
       
        
        
    </table>
    <p><a href="addcontact.php">Add Contact</a></p>
    <p><a href="logout.php">Logout</a></p>
    
    <?php include_once __dir__.'/includes/footer.php' ?>

    
