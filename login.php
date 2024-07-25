<?php
require "partials/__header.php";

if (isset($_SESSION['loggedIn'])){
    header('location:index.php');
    exit;
}
if (isset($_SESSION['alert']) && $_SESSION['alert']=='invalidPassword'){
    echo '<div class="container p-0 mt-5"><div class="container p-0"><div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> The passwords you entered is not correct.
                            <a href="login.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                            </div></div></div>';
    unset($_SESSION['alert']);
}
if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'emailnotfound') {
    echo '<div class="container p-0 mt-5"><div class="container p-0"><div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> The Email you entered is not registered with us, Sign up.
                        <a href="signup.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                        </div></div></div>';
    unset($_SESSION['alert']);
}
if (isset($_SESSION['alert']) and $_SESSION['alert'] == 'somethingwentwrong') {
    echo '<div class="container p-0 mt-5"><div class="container p-0"><div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error |</strong> Something went wrong, Please try again later.
                        <a href="signup.php"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></a>
                        </div></div></div>';
    unset($_SESSION['alert']);
}
?>

<div style="" class="conatiner  d-flex justify-content-center align-items-center" id="mainContainer">
    <div class="container shadow p-5 rounded-4 mx-5">
        <h2 class="fw-semibold mb-4 text-center">USER LOGIN</h2>
        <form method="post" action="partials/__handleLogin.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    required maxlength="255">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required aria-describedby="passwordRequirements" maxlength="255">
                <div id="passwordRequirements" class="form-text">Password must contain 8 or more characters that are
                    of at least one number, and one uppercase and lowercase letter.</div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary fs-6 px-4">Login</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.title ="iForum | Login"
</script>

<?php
require "partials/__footer.php";
?>

