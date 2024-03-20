<?php

function mk_link3 ($year,$season,$name,$verification,$closeness,$color) {

     if( $closeness == "none" ) { $check = "../check.jpg";   }
     else                       { $check = "../green_check.jpg"; }

     if( $closeness == "none" ) { $filename1 = "horiz_${verification}_${name}.${season}.gif";
                                  $filename2 = "horiz_${verification}_${name}log.${season}.gif"; }
     else                       { $filename1 = "horiz_${closeness}_${name}_closeness_${verification}.${season}.gif";
                                  $filename2 = "horiz_${closeness}_${name}log_closeness_${verification}.${season}.gif"; }

                                                     { $zref  = "&nbsp;"; } 
                                                     { $zref2 = "&nbsp;"; } 
     if (file_exists("../$year/$filename1"))         { $zref  = "<a href=../$year/$filename1 target=''>        <img src=$check border=0> </a>"; } 
     if (file_exists("../$year/$filename2"))         { $zref2 = "<a href=../$year/$filename2 target=''>        <img src=$check border=0> </a>"; } 
     if (file_exists("../$year/$season/$filename1")) { $zref  = "<a href=../$year/$season/$filename1 target=''><img src=$check border=0> </a>"; } 
     if (file_exists("../$year/$season/$filename2")) { $zref2 = "<a href=../$year/$season/$filename2 target=''><img src=$check border=0> </a>"; } 

     if( $zref2 != "&nbsp;" ) { $zref = "$zref &nbsp;/&nbsp; $zref2"; }
     $content = <<<EOF
     <td align=center bgcolor = $color >
     $zref
    </td>
EOF;
echo $content;
return; }

?>
