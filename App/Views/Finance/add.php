
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
                    <h1 class="h3 mb-0 text-gray-800">Add new <?php if(!empty($this->stringVars)){ echo $this->stringVars;} ?></h1>
                </div>
                <!-- Content Row -->
                <div class="row">

                    <div class="col-4">
                    </div>
                    <div class="col-4">

                        <form  class="user"  action="/myFinanceApp/Finance/Add/<?php
                        if(!empty($this->stringVars)){ echo $this->stringVars;} ?>" method="post">
                            <div class="form-group">
                                <label for="finance_description">Description</label>
                                <input type="text" class="form-control form-control-user" id="finance_description" name="finance_description" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control form-control-user" style="padding: .4rem 1rem;" id="category_id" name="category_id" required>
                                    <option value="" selected>Select...</option>
                                    <?php
                                    foreach ($this->vars['categories'] as $row){
                                        echo  "<option value='".$row['id']."'>".$row['name']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="finance_date">Date</label>
                                <input type="date" class="form-control form-control-user" id="finance_date" name="finance_date" required>
                            </div>
                            <div class="form-group">
                                <label for="finance_value">Value</label>
                                <input type="number" min="0.01" step="0.01" class="form-control form-control-user" id="finance_value" name="finance_value" required>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-user btn-block" type="submit" name="submit">Add!</button>
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