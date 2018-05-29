<?php 

if(!session_id()) {
    session_start();
}
if(isset($_GET['state'])) {
    $_SESSION['FBRLH_state'] = $_GET['state'];
}
if (!isset($_SESSION['fb_access_token'])) {
        header('Location: fb-login.php');
        exit();
    }

?>

<!doctype html>
<html lang="en">
<head>    
    <title>Facebook Profile</title>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>
<div class="container">
      <div class="row">
      <div class="col-md-3  toppad  pull-right col-md-offset-4 ">
      
       <br>
<p class=" text-info"><?php echo date('M-d-Y').','.date('h:i:a T',time()) ?></p>
      </div>

        <div class="col-xs-14 col-sm-8 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" style="font-size: 24px"><?php echo $_SESSION['userDetails']['first_name'] ?>'s Facebook Profile</h3>
              
            </div>

            <div class="panel-body">
              <div class="row">

                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo $_SESSION['userDetails']['picture']['url'] ?>" > 

                </div>
                

                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>ID  :</td>
                        <td><?php echo $_SESSION['userDetails']['id'] ?></td>
                      </tr>
                      <tr>
                        <td>First Name  :</td>
                        <td><?php echo $_SESSION['userDetails']['first_name'] ?></td>
                      </tr>
                      <tr>
                        <td>Last Name  :</td>
                        <td><?php echo $_SESSION['userDetails']['last_name'] ?></td>
                      </tr>
                         
                   
                         <tr>
                        
                      <tr>
                        <td>Email</td>
                        <td><a href="" ><?php echo $_SESSION['userDetails']['email'] ?></a></td>
                      </tr>
                        
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  <a href="http://localhost:8080/OAuth/fb-login.php" onclick="<?php fb_logout();?>" class="btn btn-primary pull-right">Logout</a>
          
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <br>
                        <span class="center">

                            <p style="text-align:center;color: #95afc0">Done by <a href="https://github.com/kishanthbelic/SSS-Assignment_3.git">Kishanth - IT16062016</a></p>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>

    </body>

    </html>
<?php 

function fb_logout(){
  session_destroy();

}

?>


