<?php include($_SERVER['DOCUMENT_ROOT'] . '/myFinanceApp/App/Views/Layouts/Default/header.php'); ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register!</h1>
                                </div>

    <form  class="user"  action="/myFinanceApp/User/Add" method="post">

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control form-control-user" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_again">Re-type Password</label>
            <input type="password" class="form-control form-control-user" id="password_again" name="password_again" required>
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">Create account!</button>
        </div>

        <div class="alert <?php if(!empty($this->vars['validation'])){ echo $this->vars['validation']['color_class'];}?>" role="alert"><?php if (!empty($this->vars['validation'])){ echo $this->vars['validation']['errors']; } ?></div>

    </form><hr>
    <div class="text-center">
        <a class="small" href="/myFinanceApp/Home/Login">Sign In!</a>
    </div>  </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/myFinanceApp/App/Views/Layouts/Default/footer.php'); ?>
