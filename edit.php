<?php
if (isset($_COOKIE["email"])){
session_start();
$con = mysqli_connect("sql201.epizy.com", "epiz_23179578", "s5NHbLmxsEpQZ76", "epiz_23179578_letsshare");
@$email = $_COOKIE['email'];  
if($con){
    $sql = "SELECT * FROM registertable WHERE email = '$email'";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($query);
    $imgloc = $row['username'];
    if($row['email']==$email){
        ?>
<html>
    <?php
        if(isset($_POST['update']) && !empty($_POST['fname'])){
            
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $contact = $_POST['contact'];
                    $address = ltrim($_POST['address']);
                    $name = $fname." ".$lname;
                    $sql = "UPDATE registertable SET fname = '$fname' , lname = '$lname' , contact = '$contact',  address='$address' , name='$name' WHERE email = '$email' ";
                    mysqli_query($con,$sql);
                    header("location:profile.php");
        
        }
                    ?>
    <head>
    <style>
        @font-face{
    src : url('fonts/gotham/Gotham-Bold.otf');
    font-family: gothamb;
}
            .img{
    height:140px;
    width:auto;  
    box-shadow: 0 10px 48px 0 rgba(0,0,0,0.3);            
    z-index: 1;
}
        .logo {
            width: 60px;
            height: 60px;
        }

            .card {
                width: 700px;
                height: auto;
                border-radius: 2px 2px 2px 2px;
                border: 1px solid gainsboro;
                padding-top: 60px;
                padding-bottom: 60px;
                padding-left: 30px;
                padding-right: 30px;
                border-radius: 5px;
                font-family: gothamb;
                transition : all 0.2s ease;
                font-size: 20px;
            }
            .card:hover{
                box-shadow: 0 4px 18px 0 rgba(0,0,0,0.3);
            }    
    </style>
       <style>
            <?php include "css/style.css"; ?>
        </style>
        </style><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="icon" type="image/ico" href="images/give.png" />
          <title>Update your profile</title>
    </head>
    <body>
     <center>    
        <div class="row">
                                        <div class="topnav">
<a href="profile.php" style="padding-right:0;"><i class="material-icons" style="font-size:24px;">arrow_back</i></a><a><b style="color:grey;font-family:gotham">Daero</b> <b style="font-family:Josefin">Study Share</b></a>
<a class=nav2 onclick="javascript:window.location='signout.php'" style="cursor:pointer;float:right;">Logout</a>
<a class=nav1 onclick="javascript:window.location='profile.php'" style="cursor:pointer;float:right;">Profile</a>

</div>
            
               
            </div>  
        </center>
        <BR>
        <div class="body">
            
            <center>

                
                <br><br><br>
                <div class="card">
                    <form method="post" action="">                       
                <br> First Name : <input placeholder="First Name" type="text" name='fname' value="<?php echo $row['fname'];?>"><br><br>
                 Last Name : <input placeholder="Last Name" type="text" name='lname' value="<?php echo $row['lname'];?>"><br><br>
                Contact No . : <input placeholder="Contact" type="text" name='contact' maxlength="10" value="<?php echo $row['contact'];?>"><br><br><br>
                       
                        
                        <br><br>
                         <textarea cols=30 rows=10 placeholder="Address" name="address" style="font-family: gothamb;font-size: 15px;outline:none;"><?php echo $row['address']?></textarea>
                        <br><br>
                         
                        
                         <br>
                       
                        
                        <br><br>
                        <input type="submit" style="font-family:gothamb" class="signup" name="update" value="Update">
                    </form>
                   
                </div><BR><BR><BR>
                

        </div></center>
    </body>
</html>

<?php
    }
}
} else {
    session_start();
    $_SESSION['redirect2'] = $_SERVER['REQUEST_URI'];
    header("location:login.php");
}
?>     