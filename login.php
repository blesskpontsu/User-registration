<?php
$title = 'NaXum | Login';
include 'partials/header.php';
include 'partials/nav.php';
?>

<div class="container">
    <div class="row d-flex align-items-center justify-content-center vh-100">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form>
                        <h1 class="card-title text-center">Login Here</h1>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Register</button>
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
