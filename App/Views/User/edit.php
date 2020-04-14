
<?php include($_SERVER['DOCUMENT_ROOT'] . '/myFinanceApp/App/Views/Layouts/Dashboard/header.php');?>

<!-- Page Wrapper -->
<div id="wrapper">


    <?php include($_SERVER['DOCUMENT_ROOT'] . '/myFinanceApp/App/Views/Layouts/Dashboard/sidebar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <?php include($_SERVER['DOCUMENT_ROOT'] . '/myFinanceApp/App/Views/Layouts/Dashboard/nav.php');?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
                </div>
                <!-- Content Row -->
                <div class="row">

                    <div class="col-4">
                    </div>
                    <div class="col-4">

                    <form  class="user"  action="/myFinanceApp/User/Edit" method="post">
                        <div class="form-group">
                            <label for="password">Current password</label>
                            <input type="password" class="form-control form-control-user" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New password</label>
                            <input type="password" class="form-control form-control-user" id="new_password" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password_again">Re-type new password</label>
                            <input type="password" class="form-control form-control-user" id="new_password_again" name="new_password_again" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">Change Password!</button>
                        </div>

                        <div class="alert <?php if(!empty($this->vars['validation'])){ echo $this->vars['validation']['color_class'];}?>" role="alert"><?php if (!empty($this->vars['validation'])){ echo $this->vars['validation']['errors']; } ?></div>

                    </form>

                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include($_SERVER['DOCUMENT_ROOT'] . '/myFinanceApp/App/Views/Layouts/Dashboard/logoutModal.php');?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/myFinanceApp/App/Views/Layouts/Dashboard/footer.php');?>