<?php



$path = URL::to('/') . '/profile';

$value = '<a href=' . $path . '>Friend Request</a>';


$final = str_replace("LINK", $value, $content);



?>


<?php echo $final;?>


