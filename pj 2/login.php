<?php  include 'Partials\_dbconnect.php' ?>
<?php
$sub = FALSE;

$succ= FALSE;
$fail = TRUE;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
        // $sqll = "SELECT * FROM `user` WHERE `Email` = '$email' AND `Password` = '$password'";
        $sqll = "SELECT * FROM `user` WHERE `Email` = '$email'";
        $res = mysqli_query($conn , $sqll);
        $num = mysqli_num_rows($res);
        if(($num == 1) && ($password == $cpassword)){
            while($row = mysqli_fetch_assoc($res)){
                if(password_verify($password , $row['Password'])){
                    $succ= TRUE;
                    session_start();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['Email'] = $email;
                    header("location: welcome.php");
                }else{
                    $fail = FALSE;
                }
            }
        }else{
            $fail = FALSE;
        }
    }


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign-up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php  include 'Partials\_dbconnect.php' ?>
    <?php  include 'Partials\_nav.php' ?>

    <?php
    if($succ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Login suucessful</strong> You are logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';    
        
      
    }
    elseif( !$fail) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error Ocurred</strong> Password or Email do not match!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; 
    }

?>

    <form accept="/PROJECT-1/Signup.php" method="POST">
        <div class="container">
            <h3 class=" my-3">Login Your Account Here!</h3>
            
            <div class="mb-3 col-md-5">
                <label for="exampleInputEmail1" class="form-label ">Email address</label>
                <input type="email" class="form-control" name="email" id="Email1" required aria-describedby="emailHelp">
            </div>
           
            <div class="mb-3 col-md-5">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required id="Password">
            </div>
            <div class="mb-3 col-md-5">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" required name="cpassword" id="cPassword1">
            </div>
    
            <div>
                <button type="sxubmit" class="btn btn-primary">Login</button>

                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>
        <script>
            const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}

const alertTrigger = document.getElementById('liveAlertBtn')
if (alertTrigger) {
  alertTrigger.addEventListener('click', () => {
    appendAlert('Nice, you triggered this alert message!', 'success')
  })
}
        </script>
</body>

</html>