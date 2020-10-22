<?php include "template/head.php" ?>

<title> Login Page </title>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <?php if ($this->session->flashdata("message")) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php print_r ($this->session->flashdata("message")); ?>
                    </div>
                <?php endif; ?>
                <div class="panel-heading">
                    <h3 class="panel-title">Please Log In</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="<?php return base_url("auth/login") ?>" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>