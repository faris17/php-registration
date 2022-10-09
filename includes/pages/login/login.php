<?php

$title = 'User login';

?>

<div class="col-md-6 mt-5" style="margin:0 auto">
    <div class="card">
        <div class="card-body">
            <h1 class='text-center mt-5'><?php echo $title; ?></h1>
            <?php
            include_once 'loginProses.php';
            ?>
            <form class="m-5" method="post" action="?page=login">
                <div class="mb-3 row">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control" id="inputPassword">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary form-control" name="submitLogin" value="login">Login</button>
            </form>
        </div>

    </div>
</div>