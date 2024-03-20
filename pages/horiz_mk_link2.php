<?php

function mk_link2 ($year,$season,$filename1,$filename2,$color) {

                                                     { $zref  = "&nbsp;"; } 
     if (file_exists("../$year/$filename1"))         { $zref  = "<a href=../$year/$filename1         target='' style='text-decoration:none;'> <img src=../check.jpg border=0> </a>"; } 
     if (file_exists("../$year/$season/$filename1")) { $zref  = "<a href=../$year/$season/$filename1 target='' style='text-decoration:none;'> <img src=../check.jpg border=0> </a>"; } 

                                                     { $zref2 = "&nbsp;"; } 
     if (file_exists("../$year/$filename2"))         { $zref2 = "<a href=../$year/$filename2         target='' style='text-decoration:none;'> <img src=../check.jpg border=0> </a>"; } 
     if (file_exists("../$year/$season/$filename2")) { $zref2 = "<a href=../$year/$season/$filename2 target='' style='text-decoration:none;'> <img src=../check.jpg border=0> </a>"; } 

     if( $zref2 != "&nbsp;" ) { $zref = "$zref &nbsp;/&nbsp; $zref2"; }

     $content = <<<EOF
     <td align=center bgcolor = $color >
     $zref
    </td>
EOF;
echo $content;
return; }

?>
