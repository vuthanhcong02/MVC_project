
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="public/css/login.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Login</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div id="login-form-wrap">
            <h2>Login</h2>
            <form id="login-form" action="index.php?controller=login&action=loginAction" method="post">
                <p>
                    <input type="text" id="username" name="username" placeholder="Username" required name="username"><i class="validation"><span></span><span></span></i>
                </p>
                <p class="input-password">
                    <input type="password" id="password" name="password" placeholder="Password" required name="password"><i class="validation"><span></span><span></span></i>
                    <i id="toggle-password" class="fa fa-eye hide-icon"></i>
                </p>
                <p class="text-danger d-flex justify-content-start align-content-center">
                    <?php
                    if (isset($_SESSION['loginError'])) {
                        echo $_SESSION['loginError'];
                        unset($_SESSION['loginError']);
                    }                    
                    ?>
                </p>
                <p class="">
                    <input type="submit" id="login" value="Login">
                </p>
            </form>
            <div id="create-account-wrap">
                <p>Not a member? <a href="#">Create Account</a>
                <p>
            </div><!--create-account-wrap-->
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="public/js/login.js"></script>

</body>

</html>