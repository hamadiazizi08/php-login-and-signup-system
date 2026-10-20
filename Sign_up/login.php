<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Custom CSS -->
     <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 m-0">

    <div class="card p-4 p-sm-5 text-white glass-card" style="width: 420px;">
        <h3 class="text-center mb-4 fw-bold" style="color: #ff8c00; text-shadow: 0 0 10px rgba(255, 69, 0, 0.4);">Login</h3>

        <form action="process.php" method="POST">
            <!-- Kitambulisho cha Mchakato wa Login -->
            <input type="hidden" name="action" value="signin">

            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fire-icon-box px-3"><i class="fa-solid fa-user fa-lg" style="color: #ff4500;"></i></span>
                <input type="text" name="username" class="form-control bg-transparent py-2" placeholder="Username au Email" required>
            </div>

            <div class="input-group mb-2">
                <span class="input-group-text bg-transparent fire-icon-box px-3"><i class="fa-solid fa-lock fa-lg" style="color: #ff4500;"></i></span>
                <input type="password" name="password" class="form-control bg-transparent py-2" placeholder="Password" required>
            </div>

            <!-- Forgot Password Link -->
            <div class="d-flex justify-content-end mb-4">
                <a href="forgot_password.php" class="small text-decoration-none" style="color: #ff8c00;">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-info w-100 fw-bold py-3 rounded-pill shadow mb-3">Sign In</button>
            
            <!-- Sign Up Link for new users -->
            <div class="text-center small">
                <span class="text-muted">Don't have an account?</span> <a href="signup.php" style="color: #ff8c00; text-decoration: none; font-weight: 600;">Sign Up</a>
            </div>
        </form>
    </div>

</body>
</html>