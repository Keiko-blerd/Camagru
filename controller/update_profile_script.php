 <?php
   require_once ('../../model/config/database.php');
   
   if(isset($_POST['username']))
   {   
        $ID = $_SESSION['userid'];
        $user_email = $_SESSION['usermail'];
       if (empty($_POST['user_name']))
       {
           echo"<script>alert('you cant leave this field empty!')</script>";
           return ;
       }
       $user_name = $_POST['user_name'];

       $sql = "UPDATE $db.user set user_username = '$user_name' WHERE userid = '$ID'";
       $statement = $conn->prepare($sql);
       $statement->execute(array($user_name)); 
       if ($statement->execute())
       {
           $message = "Hi there, your username on Camagru has been updated!";
           mail($user_email, "Profile details changed", $message, "From :info@camagru.co.za");
           echo"<script>alert('username changed!')</script>";
           return ;

           header('location:/camagru/');
       }
   }

   if(isset($_POST['email']))
   {

    if(empty($_POST['user_email']))
    {
        echo"<script>alert('you cant leave this field empty!')</script>";
        return ;
    }
     $user_email = $_POST['user_email'];

    $sql = ("SELECT * FROM $db.user WHERE user_email = ?");
       $statement = $conn->prepare($sql);
       $statement->execute(array($user_email)); 
       $res = $statement->fetch();

       if (!empty($res)){
         echo "<script>alert('This email is already registered!, try another one')</script>";
         return ;

       }

       $user_email = $_POST['user_email'];

       $sql = "UPDATE $db.user set user_email = '$user_email' WHERE userid = '$ID'";
       $statement = $conn->prepare($sql);
       $statement->execute(array($user_email)); 

       if ($statement->execute())
       {
           $message = "Hi there, your email details on Camagru have been updated!";
           mail($user_email, "Profile details changed", $message, "From :info@camagru.co.za");
           echo"<script>alert('Email Updated')</script>";
           return ;

           header('location:/camagru/');
       }
    }

    if (isset($_POST['password']))
    {

    if (empty($_POST['password']))
    {  
        echo"<script>alert('you cant leave this field empty!')</script>";
        return;
    } 
            
    if(strlen($_POST['user_password']) >= 8 && $_POST['user_password']=== $_POST['re_password'])
    {
        $user_password = password_hash($_POST['user_password'],PASSWORD_BCRYPT); 
        $sql = "UPDATE $db.user set user_password ='$user_password' WHERE userid = '$ID'";
        $statement = $conn->prepare($sql); 
        if($statement->execute())
        {
         $message = "Hi there, your password on Camagru has been updated!";
            
         mail($user_email, "Profile details changed", $message, "From :info@camagru.co.za");
        echo"<script>alert('password changed!')</script>";
        return ;

        header('location:/camagru/');
        }
    }
    else 
    {
        echo"<script>alert('passwords dont match or is less tha 8 characters!')</script>";
        return;
    }
  }

 ?>

