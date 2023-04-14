<?php
$title = 'Register';
include('components/header.php');
?>

<section class="auth py-5">
    <div class="container">
        <h2 class="text-primary text-center mb-4">Register</h2>

        <form action="php/register.php" method="post">
            <div class="mb-3">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name......" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email......" required>
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password......" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="submit">Register</button>
            <p class="mt-3 text-secondary text-center">Sudah punya akun? <a href="login.php" class="text-primary">Login</a></p>
        </form>
    </div>
</section>