<?php
$my_img = imagecreate( 200, 80 );
$background = imagecolorallocate( $my_img, rand(0,55), 0, rand(100,155) );
$text_colour = imagecolorallocate( $my_img, rand(200,255), rand(200,255), 0 );
$line_colour = imagecolorallocate( $my_img, 128, 255, 0 );
imagestring( $my_img, 4, 2, 2, "Ticket Number:".rand(1000,1550), $text_colour );
imagesetthickness ( $my_img, 5 );
imageline( $my_img, 20, 25, 105, 45, $line_colour );
imageline( $my_img, 30, 35, 165, 45, $line_colour );
imageline( $my_img, 20, 45, 105, 45, $line_colour );

header( "Content-type: image/png" );
imagepng( $my_img );
imagecolordeallocate( $line_color );
imagecolordeallocate( $text_color );
imagecolordeallocate( $background );
imagedestroy( $my_img );
?>