<?php
    require_once 'config/config.php';
    require_once 'src/autoload.php';
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<br>
<br>
<br>
<br>

<form method="post" action="available_methods_to_pay.php" autocomplete="off" style="max-width: 500px; display: block; margin: auto">
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" id="price" placeholder="enter price here">
    </div>
    <div class="form-group">
        <label for="currency">Currency</label>
        <select name="currency" id="currency" class="form-control" required>
            <option value="">choose currency</option>
            <?php
            $currencies = require 'includes/currencies.php';
            foreach ($currencies as $key => $currency) :
                echo '<option value="' . $key . '">' . $currency . '</option>';
            endforeach;
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!--
    saudi arabia
    oman
    qatar
    Kuwaiti
    Bahrain
    United Arab Emirates
    usa
-->