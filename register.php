<?php

$title = 'NaXum Register';
include 'partials/header.php';
include 'partials/nav.php';
?>

<div class="container">
    <div class="row d-flex align-items-center justify-content-center vh-100">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="app/includes/signup.php">
                        <h1 class="card-title text-center">Register Here</h1>
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname">
                        </div>
                        <div class="mb-3">
                            <label for="email1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit" class="btn btn-primary">Register</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'partials/footer.php';
include 'partials/script.php';
?>