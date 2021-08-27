<?php 

// // Create a directory Iterator 
// $directory = new DirectoryIterator(dirname(__FILE__)); 

// // Loop runs while directory is valid 
// while ($directory->valid()) { 

//     // Check the file is not directory 
//     if (!$directory->isDir()) { 

//         // Display the filename 
//         echo $directory->getFilename() . "<br>"; 
        
//     } 

//     // Move to the next element 
//     $directory->next(); 
// } 

?>

<form action="" method="post">
    <button type="submit" name="submit">Compress</button>
</form>

<?php 
    function compress($source, $destination, $quality) 
    {
        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }

    $source_img = 'source.jpg';
    $destination_img = 'source.jpg';

    if(isset($_POST['submit']))
    {
        $d = compress($source_img, $destination_img, 10);
    }

?>
