<?php

function mk_link5 ($year,$season,$export,$gc,$verification,$closeness,$text,$color) {

$verbose = 0;

$exppath=$GLOBALS["exppath"];
$expurl=$GLOBALS["expurl"];

if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "EXPORT: <b> $export </b> <br>";
   print "GCs: <b> $gc </b> <br>";
   print "VERIFICATION: <b> $verification </b> <br>";
   print "CLOSENESS: <b> $closeness </b> <br>"; 
   print "TEXT: <b> $text </b> <br>"; }

     if( $closeness == "none" & $verification == "" ) 

                                {   

                                 if( $text == "(z)" ) { $level = "z"; }
                                 else                 { $level = "0"; }
                                 if( $verbose != 0) {print "LEVEL: <b> $level </b> <br>";}

                                    $fcolor = "blue";
                                      $name = strtoupper($export);
                                        $gc = strtoupper($gc);
                                  $filename = "hdiag_${name}.${gc}_${level}.${season}.gif"; }

     else if( $closeness == "none" )
                                {   
                                  if( $text == "(z)" ) { $level = "_z"; }
                                  else                 { $level = "";   }
                                  if( $verbose != 0) {print "LEVEL: <b> $level </b> <br>";}

                                    $fcolor = "blue";
                                        $gc = strtoupper($gc);
                                  $filename = "${export}${level}_${verification}.${season}.gif";
                                }

     else                       {   
                                 if( $text == "(z)" ) { $level = "_z";
                                                       $fcolor = "blue";
                                                           $gc = strtoupper($gc);
                                                     $filename = "${export}${level}_${verification}.${season}.gif"; }
                                 else { $fcolor   = "darkgreen";
                                        $filename = "${export}_${closeness}_closeness_${verification}.${season}.gif"; }
                                 }

if( $text == "(z)" ) { $fcolor = "$color"; }
if( $verbose != 0) {print "FILENAME: <b> $filename </b> <br>";}

                                                    { $zref =                                               "<font color=#808080> <u> $text </u> </font>     "; }
     if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''>         <font color=$fcolor>     $text      </font> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''> <font color=$fcolor>     $text      </font> </a>"; }

if( $text != "(z)" ) {
$content = <<<EOF
$zref </li>
EOF;
}
else {
$content = <<<EOF
<li> $zref
EOF;
}
echo $content;
return; }

?>
