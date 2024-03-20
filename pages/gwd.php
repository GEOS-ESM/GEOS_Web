<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/set_item.php" );

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

include( "unregister_globals.php" );

// **********************************************************************************
// ***************                    Page Variables                      ***********
// **********************************************************************************

unregister_globals();

$PARAM = array_merge($_GET, $_POST);
$expid        = urlencode($PARAM['expid']);
$year         = urlencode($PARAM['year']);
$season       = urlencode($PARAM['season']);
$type         = urlencode($PARAM['type'  ]);
$region       = urlencode($PARAM['region']);
$verification = urlencode($PARAM['verification']);

include("globals.php");

$seasonUC = strtoupper($season);
$seasonLC = strtolower($season);

// **********************************************************************************
// ***************                Page Base and Buttons                   ***********
// **********************************************************************************

$content = <<<EOF

 <title>
 $expid
</title>

<H1 align=center >
<font color=darkred>
EXPID: &nbsp; <a href="../index.php" style="text-decoration: none"> <font color=darkred> $expid </font> </a> <br>
Gravity-Wave Drag
</font> </H1>

<center>
<form name="myform">
EOF;
echo $content;

// set YEAR Button
// ---------------
set_year( $year );
$content = <<<EOF
&nbsp; &nbsp; &nbsp;
EOF;
echo $content;

// set SEASON Button
// -----------------
set_season( $season );

$content = <<<EOF
</form>
</center>

<script language="javascript">
<!--
function leapto(form)
     {  var year        = form.year.selectedIndex ;
        var season      = form.season.selectedIndex ;
        window.location = "gwd.php?"
                        + "&expid=$expid"
                        + "&year="   + (form.year.options[year].value)
                        + "&season=" + (form.season.options[season].value); }
//-->
</script>
EOF;
echo $content;

// **********************************************************************************
// ***************                     Page Contents                      ***********
// **********************************************************************************

$content = <<<EOF

<center>
<br>
<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9>
<tr>
   <td align=left>
   <ul> 
   <br>
EOF;
echo $content;

      mk_link ("$year","$seasonUC","gwdudtz_1.${seasonUC}.gif","U-Wind &nbsp; &nbsp; &nbsp; &nbsp; Gravity Wave Drag Tendency (1000-ptop mb)","blue");
      mk_link ("$year","$seasonUC","gwdudtz_2.${seasonUC}.gif","U-Wind &nbsp; &nbsp; &nbsp; &nbsp; Gravity Wave Drag Tendency (1000-10   mb)","blue");
      mk_link ("$year","$seasonUC","gwdvdtz_1.${seasonUC}.gif","V-Wind &nbsp; &nbsp; &nbsp; &nbsp; Gravity Wave Drag Tendency (1000-ptop mb)","blue");
      mk_link ("$year","$seasonUC","gwdtdtz_1.${seasonUC}.gif","Temperature                        Gravity Wave Drag Tendency (1000-ptop mb)","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link ("$year","$seasonUC","gwds1.${seasonUC}.gif","GWD Surface Stress (Magnitude)","blue");
      mk_link ("$year","$seasonUC","gwds2.${seasonUC}.gif","GWD Surface Stress (Vector)","blue");
      mk_link ("$year","$seasonUC","gwds3.${seasonUC}.gif","GWD Standard Deviations","blue");

$content = <<<EOF
  </ul>
   <ul>

     <li> <a href="../pages/gwd_matrix.php?&year=$year&expid=$expid&season=$seasonUC&cmpexp=none"> <b> Horizontal Matrix </b> </a> </li>

   </ul>
   </td>
</tr>
</table>

<br> <br>
 <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>

</center>

EOF;
// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************
echo $content;
return; 

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

function mk_link ($year,$season,$filename,$text,$color) {

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];

                                                    { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''> <font color=$color> $text </font> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''> <font color=$color> $text </font> </a>"; }

     $content = <<<EOF
     <li> $zref </li>
EOF;
echo $content;
return; }

?>
