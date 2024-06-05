<?php 
    include("..\PhpHandler\DBconnect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User list</title>
    <link rel="stylesheet" href="adminCss\adminstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>

</head>
<body>
<?php include("AdminSideNav.php"); ?>
    <div id="wrapper">
        <div id="content-wrapper">
            <?php include("AdminNav.php"); ?>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i> Users
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Loyalty Badge/s</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ret = "SELECT * FROM emberusers";
                                $stmt = $conn->prepare($ret);
                                $stmt->execute();
                                $res = $stmt->get_result();
                                $cnt = 1;
                                while ($row = $res->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row->user_id?></td>
                                        <td><?php echo $row->username; ?></td>
                                        <td><?php echo $row->email; ?></td>
                                        <td><?php echo $row->contact; ?></td>
                                        <td><?php echo $row->loyalty_badge?></td>
                                    </tr>
                                <?php $cnt++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    <?php
                    date_default_timezone_set("Asia/Manila");
                    echo "Generated : " . date("h:i:sa");
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>