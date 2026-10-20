<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100 m-0 py-4">

    <div class="card p-4 p-sm-5 text-white glass-card" style="width: 420px;">
        <h3 class="text-center mb-4 fw-bold" style="color: #ff8c00; text-shadow: 0 0 10px rgba(255, 69, 0, 0.4);">Sign Up</h3>

        <form action="process.php" method="POST">
            <!-- Kitambulisho cha Mchakato wa Sign Up -->
            <input type="hidden" name="action" value="signup">

            <!-- Username -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fire-icon-box px-3"><i class="fa-solid fa-user fa-lg" style="color: #ff4500;"></i></span>
                <input type="text" name="username" class="form-control bg-transparent py-2" placeholder="Username" required>
            </div>

            <!-- Email -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fire-icon-box px-3"><i class="fa-solid fa-envelope fa-lg" style="color: #ff4500;"></i></span>
                <input type="email" name="email" class="form-control bg-transparent py-2" placeholder="Email" required>
            </div>

            <!-- Password -->
            <div class="input-group mb-1">
                <span class="input-group-text bg-transparent fire-icon-box px-3"><i class="fa-solid fa-lock fa-lg" style="color: #ff4500;"></i></span>
                <input type="password" name="password" class="form-control bg-transparent py-2" placeholder="Password" required>
            </div>
            <div class="form-text text-muted small mb-3" style="font-size: 11px;">
                * Angalau herufi 8, herufi kubwa & ndogo, namba na alama maalum (fano: @#$!).
            </div>

            <!-- Confirm Password -->
            <div class="input-group mb-3">
                <span class="input-group-text bg-transparent fire-icon-box px-3"><i class="fa-solid fa-shield-halved fa-lg" style="color: #ff4500;"></i></span>
                <input type="password" name="confirm_password" class="form-control bg-transparent py-2" placeholder="Confirm Password" required>
            </div>

            <!-- Terms & Conditions Checkbox -->
            <div class="form-check mb-4 text-start">
                <input class="form-check-input custom-checkbox" type="checkbox" name="terms" id="terms" required>
                <label class="form-check-label small text-muted ms-1" for="terms">
                    I agree to the <a href="#" style="color: #ff8c00; text-decoration: none;">Terms & Conditions</a>
                </label>
            </div>

            <button type="submit" class="btn btn-info w-100 fw-bold py-3 rounded-pill shadow mb-3">Sign Up</button>
            
            <div class="text-center small">
                <span class="text-muted">Already have an account?</span> <a href="login.php" style="color: #ff8c00; text-decoration: none; font-weight: 600;">Sign In</a>
            </div>
        </form>
    </div>

</body>
</html>