<?php
/* Template Name: Aout Us Page */

$myvals = get_post_meta(get_the_ID());

// print_r($myvals);

foreach ($myvals as $key => $val) {
    

    ${$key} = $val[0] ?
     unserialize($val[0]) :
      $val[0];

    // echo $key .' - '. $val[0].'<br>';
    echo $val[0];
}

