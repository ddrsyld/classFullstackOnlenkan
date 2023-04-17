<?php include('components/header.php') ?>

<section class="py-5">
    <div class="container">
        <h2 class="text-primary text-center mb-4">Register</h2>

        <form action="php/register.php" method="post">
            <div class="mb-3">
                <label for="email">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
            </div>      
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
            </div>      
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
                <button type="submit" class="btn btn-primary w-100" name="submit">Register</button>
                <p class="mt-3 text-secondary text-center">Already have a account? <a href="register.php" class="text-primary"> Login!</a></p>
        </form>
    </div>
</section>

