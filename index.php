<?php
$title = 'NaXum Home';
include 'partials/header.php';
include 'partials/nav.php';
?>

<div class="container">
    <div class="text-center">
        <img class="d-block mx-auto" src="resources/images/logo.png" alt="Dummy logo" width="120">
        <h2>Registration Form</h2>
        <p class="lead">Please fill out the form to get yourself registered</p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Registration Address</h4>
            <form novalidate action="app/includes/signup.php" method="post">
                <div class="mt-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input id="name" class="form-control" name="name" type="text" placeholder="John Doe" required>
                    <div class="invalid-feedback">
                        Enter a valid name
                    </div>
                </div>
                <div class="mt-3">
                    <label for="birthDate" class="form-label">Date of birth</label>
                    <input id="dob" class="form-control" name="dob" type="date" required>
                    <div class="invalid-feedback">
                        Date of birth is required
                    </div>
                </div>
                <div class="mt-3">
                    <label for="address" class="form-label">Address</label>
                    <input id="address" class="form-control" name="address" type="text" placeholder="123 Mountain View" required>
                    <div class="invalid-feedback">
                        Enter a valid address
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="country" class="form-label">Country</label>
                        <input id="country" class="form-control" name="country" type="text" placeholder="Philippines" required>
                        <div class="invalid-feedback">
                            Enter a valid Country
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="state" class="form-label">Sate</label>
                        <input id="state" class="form-control" name="state" type="text" placeholder="Zambales" required>
                        <div class="invalid-feedback">
                            Enter a valid state
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="zip" class="form-label">Zip</label>
                        <input id="zip" class="form-control" name="zip" type="text" placeholder="0900" required>
                        <div class="invalid-feedback">
                            Enter a valid zip
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="image" class="form-label">Profile Image</label>
                        <input id="image" class="form-control" name="profile" type="file" required>
                        <div class="invalid-feedback">
                            Enter a valid name
                        </div>
                    </div>
                    <hr class="my-4">
                    <h4 class="my-3">Payment Information</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_type" value="credit" id="credit" checked required>
                        <label for="credit">Credit Card</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_type" value="debit" id="debit" required>
                        <label for="debit">Debit Card</label>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="card_name" class="form-label">Name on card</label>
                            <input id="card_name" class="form-control" name="card_name" type="text" placeholder="John Smith" required>
                            <div class="invalid-feedback">
                                Enter a valid Name
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="card_number" class="form-label">Credit card number</label>
                            <input id="card_number" class="form-control" name="card_number" type="text" required>
                            <div class="invalid-feedback">
                                Enter a valid card Number
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="expiration" class="form-label">Expiration</label>
                            <input id="expiration" class="form-control" name="expiration" type="text" required>
                        </div>
                        <div class="col-md-3">
                            <label for="cvv" class="form-label">CVV</label>
                            <input id="cvv" class="form-control" name="cvv" type="text" required>
                        </div>
                    </div>
                    <hr class="my-3">
                    <button type="submit" name="submit" class=" mb-3 btn btn-primary btn-block">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'partials/footer.php';
include 'partials/script.php';
