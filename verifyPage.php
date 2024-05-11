<?php
    include("PhpHandler\handler.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <style>
        * {
            background-color: lightgray;

        }

    </style>

    <form method="post">
        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
        <input type="text" name="verification_code" placeholder="Enter Verification Code!" required>

        <input type="submit" name="vSubmit" value="Verify Email">

    </form>
    
</body>
</html>

<?php 


    
?>
