<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/tseries_precip_verification.button" );
include( "../buttons/tseries_tpw_verification.button" );
include( "../buttons/tseries_rad_verification.button" );
include( "../buttons/set_exps.php" );
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
$expid      = urlencode($PARAM['expid']);
$year       = urlencode($PARAM['year']);
$tpw_obs    = urlencode($PARAM['tpw_obs']);
$rad_obs    = urlencode($PARAM['rad_obs']);
$precip_obs = urlencode($PARAM['precip_obs']);

include("globals.php");

// **********************************************************************************
// ***************               Page Header and Buttons                  ***********
// **********************************************************************************

$content = <<<EOF
 <title>
 $expid
</title>

<H1 align=center >
<font color=darkred>
EXPID: &nbsp; <a href="../index.php" style="text-decoration: none"> <font color=darkred> $expid </font> </a> <br>
Time-Series
</font> </H1>

<center>
EOF;
echo $content;

// **********************************************************************************
// ***************                   Leap-To Function                     ***********
// **********************************************************************************

$content = <<<EOF
<form name="myform">

<script language="javascript">
<!--
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var tpw_obs      = form.tpw_obs.selectedIndex ;
        var rad_obs      = form.rad_obs.selectedIndex ;
        var precip_obs   = form.precip_obs.selectedIndex ;
        window.location  = "tseries.php?" 
                         + "&expid=$expid"
                         + "&tpw_obs="    + (form.tpw_obs.options[tpw_obs].value)
                         + "&rad_obs="    + (form.rad_obs.options[rad_obs].value)
                         + "&precip_obs=" + (form.precip_obs.options[precip_obs].value)
                         + "&year="       + (form.year.options[year].value); }
//-->
</script>
EOF;
echo $content;

// set YEAR Button
// ---------------
set_year( $year );

// **********************************************************************************
// ***************                     Page Contents                      ***********
// **********************************************************************************

$content = <<<EOF

<center>
<br> <br>

EOF;
echo $content;

// **********************************************************************************
// ***************                       SRB Page                         ***********
// **********************************************************************************
$content = <<<EOF

<table cellspacing=1 cellpadding=8 border=12 bordercolor=#2d73b9>
<tr>
   <td>
      <ul>
<br>
EOF;
echo $content;

      mk_link ("$year","PS_TIME_SERIES"      ,"Surface Pressure"     ,"blue");
      mk_link ("$year","KE_TIME_SERIES"      ,"Kinetic Energy"       ,"blue");
      mk_link ("$year","RAD_TIME_SERIES"     ,"TOA Radiation (Total)","blue");
      mk_link ("$year","RAD_TIME_SERIES_CLIM","TOA Radiation (Clim) ","blue");
      mk_link ("$year","AEROSOL_TIME_SERIES_montage","Aerosols","blue");

$content = <<<EOF
<br>
EOF;
echo $content;

// set VERIFICATION Button
// -----------------------
set_precip_obs( $precip_obs );
      mk_link2 ("$year","PME_TIME_SERIES","${precip_obs}","Precip & Evap (Comparison)","blue");

$content = <<<EOF
<br>
EOF;
echo $content;

// set VERIFICATION Button
// -----------------------
set_tpw_obs( $tpw_obs );
      mk_link2 ("$year","TPW_TIME_SERIES","${tpw_obs}","Total Precipitable Water (Comparison)","blue");

$content = <<<EOF
<br>
EOF;
echo $content;

// set VERIFICATION Button
// -----------------------
set_rad_obs( $rad_obs );
      mk_link2 ("$year","RAD_TIME_SERIES",     "${rad_obs}","TOA Radiation (Total) (Comparison)","blue");
      mk_link2 ("$year","RAD_TIME_SERIES_CLIM","${rad_obs}","TOA Radiation (Clim) (Comparison)","blue");

$content = <<<EOF
<br>
EOF;
echo $content;


$content = <<<EOF
     </ul>
</td>
</tr>
</table>
</form>

<br> <br>
 <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>
</ul>
</center>

<br>

EOF;


// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************
echo $content;
return; 

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

function mk_link ($year,$filename,$text,$color) {

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];
                                                { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     if (file_exists("$exppath/$year/$filename.gif")) { $zref = "<a href=$expurl/$year/$filename.gif target=''> <font color=$color> $text </font> </a>"; }
     $content = <<<EOF
     <li> $zref </li>
EOF;
echo $content;
return; }

function mk_link2 ($year,$filename,$obs,$text,$color) {

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];
                                                     { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     if (file_exists("$exppath/$year/$filename.$obs.gif")) { $zref = "<a href=$expurl/$year/$filename.$obs.gif target=''> <font color=$color> $text </font> </a>"; }
     $content = <<<EOF
     <li> $zref </li>
EOF;
echo $content;
return; }

?>
