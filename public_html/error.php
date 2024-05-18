<?php
session_start();
if (!isset($_SESSION['error'])) {
    echo "<h1> YOU SHOULD NOT BE HERE </h1>";
    header('location:index.php');
}

require_once('includes/header.php');
?>
<link rel="stylesheet" href="assets/css/style.css">;
</head>
<script>
    function clearAndGo() {
        // Unset $_SESSION['error'] and $_SESSION['errorMsg']
        <?php echo "unset(\$_SESSION['error']); unset(\$_SESSION['errorMsg']);" ?>

        // Navigate back in history
        history.back();
    }
</script>

<body>
    <div class="content-wrap">
        <h1>You have encounter an error :^|</h1>
        <script>
            console.log(<?php echo $_SESSION['errorMsg'] ?>)
        </script>

        <button class='btn btn-primary' onclick='clearAndGo()'>Go Back</button>

    </div>




    <?php require_once('includes/footer.php');
    ?>