<?php
// **********************************************************************************
// ***************                   Main Page Header                     ***********
// **********************************************************************************
?>

<title>
USRID (misc): <?php include( "usrid" ); ?>
</title>

<br>
<H1 align=center >
<font color=darkred>
GMAO Intranet: <?php include( "usrid" ); ?>
</font>
</H1>


<?php

// **********************************************************************************
// ***************                     Page Contents                      ***********
// **********************************************************************************

$content = <<<EOF

<center>
<table cellspacing=10 cellpadding=10 border=10 bordercolor=#2d73b9>
<td> <font color=darkblue> 
EOF;
echo $content;

$files = "FALSE";
$dir = opendir('misc');
while( $filename = readdir($dir) ) {
   if( $filename != "."  &&
       $filename != ".." &&
       $filename != "CVS" ) $files = "TRUE"; }
   if ($files == "TRUE")  $MSfiles = "<li> <a href=pages/index.php?&dir=misc&expid=$expid> <u> Miscellaneous </u> </a>";
   else                   $MSfiles = "<li> <font color=#808080>                            <u> Miscellaneous </u> </font>";

$content = <<<EOF
      $MSfiles </li>
EOF;
echo $content;

$content = <<<EOF
</font> 
</td>
</table>
</center>
EOF;
echo $content;

?>

<p>
<br><br>
Web_Page Design: Lawrence L. Takacs<br>
Email: <a href="mailto:Lawrence.L.Takacs@nasa.gov">Lawrence.L.Takacs@nasa.gov</a>
<p>
