<?php

if(isset($_GET['PaymentURL']) && !empty($_GET['PaymentURL'])){
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <br>
    <br>

    <form method="post" action="confirm-purchase.php" autocomplete="off" style="max-width: 500px; display: block; margin: auto">
        <h3 class="text-center">Confirm Purchase</h3>
        <br>
        <br>
        <input type="hidden" name="PaymentURL" value="<?= $_GET['PaymentURL'] ?>">
        <div class="row">
            <div class="col-md-10">
                <div class="form-group">
                    <label for="Number">Card Number</label>
                    <input type="text" class="form-control" name="Number" id="Number">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="securityCode">CVV</label>
                    <input type="text" class="form-control" name="securityCode" id="securityCode">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Month">Month</label>
                    <input type="number" class="form-control" name="expiry[Month]" id="Month">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Year">Year</label>
                    <input type="number" class="form-control" name="expiry[Year]" id="Year">
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <?php

} else {
    echo 'error: go to <a href="/">Home</a>';
}