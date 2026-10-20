<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // 1. Mchakato wa SIGN UP (Kusajili)
    if ($action === 'signup') {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
            echo "<script>alert('Tafadhali jaza sehemu zote!'); window.history.back();</script>";
            exit();
        }

        // Angalia kama password na confirm password zinalingana
        if ($password !== $confirmPassword) {
            echo "<script>alert('Nenosiri na uthibitisho wa nenosiri haviendani!'); window.history.back();</script>";
            exit();
        }

        // Kigezo cha Nenosiri Jipya na Imara sana (Angalau herufi 8, kubwa, ndogo, namba, na alama maalum)
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
        if (!preg_match($pattern, $password)) {
            echo "<script>alert('Nenosiri lazima liwe na angalau herufi 8, lina herufi kubwa na ndogo, namba, na alama maalum (mfano: @, #, $, !).'); window.history.back();</script>";
            exit();
        }

        try {
            // Angalia kama Username au Email tayari vimeshatumika
            $checkStmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
            $checkStmt->execute([$username, $email]);

            if ($checkStmt->rowCount() > 0) {
                echo "<script>alert('Username au Email hii tayari imeshasajiliwa!'); window.history.back();</script>";
                exit();
            }

            // Hash Password kwa usalama mkubwa
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Hifadhi Kwenye Database
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword]);

            echo "<script>alert('Usajili umefanikiwa! Sasa unaweza kuingia.'); window.location.href='login.php';</script>";
            exit();

        } catch (PDOException $e) {
            echo "<script>alert('Hitilafu ya Database: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
            exit();
        }
    }

    // 2. Mchakato wa SIGN IN (Kuingia)
    if ($action === 'signin') {
        $usernameOrEmail = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($usernameOrEmail) || empty($password)) {
            echo "<script>alert('Tafadhali jaza sehemu zote!'); window.history.back();</script>";
            exit();
        }

        try {
            // Tafuta mtumiaji kwa Username au Email
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$usernameOrEmail, $usernameOrEmail]);
            $user = $stmt->fetch();

            // Hakiki Password
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                
                echo "<script>alert('Karibu tena, " . htmlspecialchars($user['username']) . "!'); window.location.href='dashboard.php';</script>";
                exit();
            } else {
                echo "<script>alert('Username/Email au Password siyo sahihi!'); window.history.back();</script>";
                exit();
            }
        } catch (PDOException $e) {
            echo "<script>alert('Hitilafu ya Database: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
            exit();
        }
    }
}
?>