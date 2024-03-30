<?php
require_once('../../includes/header.php');

?>
<link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
<?php require_once('navbarMed.php')?>

    <div class="login content-wrap" id="addMed">
        <div class="login-image">
            <h2>Welcome Admin</h2>
        </div>
        <div class="login-box">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <div class="slider"></div>
                <li class="nav-item">
                    <a class="nav-link active" id="expiredTab" data-bs-toggle="tab" data-bs-target="#expired-nav" type="button" role="tab" aria-controls="expired-nav" aria-selected="true">Expired Medicine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="stockTab" data-bs-toggle="tab" data-bs-target="#stock-nav" type="button" role="tab" aria-controls="stock-nav" aria-selected="false">Out of Stock Medicine</a>
                </li>
            </ul>
            <div class="tab-content" id="nav-tabContent" style="margin-top:15px;">
                <div class="tab-pane fade show active" id="expired-nav" role="tabpanel" aria-labelledby="expiredTab">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Medicine Name</th>
                                <th scope="col"> Lot </th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Expiration Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once('expiredSearch.php');
                            foreach (array_values($results) as $medicine) {
                                # code...
                            ?>
                                <tr>
                                    <td><?php echo $medicine["ID"] ?></td>
                                    <td><?php echo $medicine["medName"] ?></td>
                                    <td><?php echo $medicine["Lot"] ?></td>
                                    <td><?php echo $medicine["quantity"] ?></td>
                                    <td><?php echo $medicine["expirationDate"] ?></td>
                                    <td> <a href="deleteExpired.php?Lot=<?php echo $medicine["Lot"] ?>">Delete</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade show" id="stock-nav" role="tabpanel" aria-labelledby="stockTab">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Medicine Name</th>
                                <th scope="col">In Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once('outStockSearch.php');
                            foreach (array_values($results) as $medicine) {
                                # code...
                            ?>
                                <tr>
                                    <td><?php echo $medicine["ID"] ?></td>
                                    <td><?php echo $medicine["medName"] ?></td>
                                    <td><?php echo $medicine["inStock"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>



        </div>
    </div>

    <?php
    require_once('../../includes/footer.php');
    ?>