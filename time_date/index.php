<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $time = time();
        $add = 1;
        $add_2 = $add.' month';
        $new_time = strtotime($add_2,$time);
        $date = date("d-m-Y", $new_time);
        $date_new = strtoupper(date("F", $new_time));
        echo $date."<br>";
        echo $date_new."<br>";
    ?>
</body>
</html>