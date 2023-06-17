
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="public/css/register.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <h2 class="card-title text-center">Register</h2>
                    <div class="card-body py-md-4">
                        <form action="index.php?controller=register&action=registerAction" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                <?php if (isset($_SESSION['errorUsername'])) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['errorUsername']; ?>
                                    </div>
                                    <?php unset($_SESSION['errorUsername']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                                <?php if (isset($_SESSION['errorEmail'])) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['errorEmail']; ?>
                                    </div>
                                    <?php unset($_SESSION['errorEmail']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
                                <span class="password-toggle" onclick="togglePasswordVisibility('password')">
                                    <i class="bi bi-eye"></i>
                                </span>
                               
                            </div>
                            <?php if (isset($_SESSION['errorPassword'])) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['errorPassword']; ?>
                                    </div>
                                    <?php unset($_SESSION['errorPassword']); ?>
                                <?php endif; ?>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirm-password" placeholder="Confirm Password" id="confirm-password" required>
                                <span class="password-toggle" onclick="togglePasswordVisibility('confirm-password')">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                            <?php if (isset($_SESSION['errorConfirmPassword'])) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['errorConfirmPassword']; ?>
                                    </div>
                                    <?php unset($_SESSION['errorConfirmPassword']); ?>
                                <?php endif; ?>
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <a href="index.php?controller=login&action=login">Login</a>
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="public/js/register.js"></script>
</body>

</html>