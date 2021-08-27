<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>DELETE FILE</h1>
    <form action="" method="post">
        <button type="submit" name="submit">Delete</button>
    </form>

    <?php
        $file = "1.pdf";
        if(isset($_POST['submit']))
        {
            if(unlink("../file/".$file))
            {
                echo "Done";
            }
            else
            {
                echo "bhakk";
            }
        }
    ?>
</body>
</html>