<?php


$path = URL::to('/') . '/activate/' . $activate;

$value = '<a href=' . $path . '>' . $path . '</a>';


$final = str_replace("LINK", $value, $content);

$finals = str_replace("NAME", $first_name, $final);

?>


<?php echo $finals; ?>