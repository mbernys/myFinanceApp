<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>myFinanceApp</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="/myFinanceApp/vendor/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

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
                                    <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                                </div>
                                <form class="user" action="/myFinanceApp/Users/Login" method="post">
                                    <div class="form-group">
                                        <label for="password">Login / Email</label>
                                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control form-control-user" id="password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">Login</button>
                                    </div>

                                    <div class="alert <?php if(!empty($this->vars['validation'])){ echo $this->vars['validation']['color_class'];}?>" role="alert"><?php if (!empty($this->vars['validation'])){ echo $this->vars['validation']['errors']; } ?></div>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="../Users/Add">Create account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script src="/myFinanceApp/vendor/js/jquery.min.js"></script>
<script src="/myFinanceApp/vendor/js/bootstrap.bundle.min.js"></script>
<script src="/myFinanceApp/vendor/js/jquery.easing.min.js"></script>
<script src="/myFinanceApp/vendor/js/sb-admin-2.min.js"></script>

</body>
</html>

