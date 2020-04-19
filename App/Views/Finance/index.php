
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
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                  </div>

                <!-- Content Row -->
                <div class="row">


                    <?php
                    if(!empty($this->vars['balance'])){
                        foreach ($this->vars['balance'] as $key => $value) { ?>

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Balance (<?php echo str_replace("_", " ", $key) ?>)
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $value; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php } } ?>

                </div>


                <!-- Content Row -->
                <div class="row">

                    <!-- Content Column -->
                    <div class="col-lg-12 mb-4">

                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Summary this month</h6>
                            </div>
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <th>Date</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($this->vars['all_data'] as $row) {
                                                if($row['type'] === 'Incomes'){
                                                    $color_type = 'bg-success text-white';
                                                } else {
                                                    $color_type = 'bg-danger text-white';
                                                }
                                                echo "<tr class='".$color_type."'>";
                                                echo "<td>".$row['date']."</td>";
                                                echo "<td>".$row['category']."</td>";
                                                echo "<td>".$row['description']."</td>";
                                                echo "<td>".$row['value']."</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include($_SERVER['DOCUMENT_ROOT'] . '/myFinanceApp/App/Views/Layouts/Dashboard/logoutModal.php');?>
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/myFinanceApp/App/Views/Layouts/Dashboard/footer.php');?>