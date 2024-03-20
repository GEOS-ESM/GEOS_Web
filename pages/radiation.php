<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/radz_verification.button" );
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
// ***************               Page Header and Buttons                  ***********
// **********************************************************************************

$content = <<<EOF

 <title>
$expid
</title>

<H1 align=center >
<font color=darkred>
EXPID: &nbsp; <a href="../index.php" style="text-decoration: none"> <font color=darkred> $expid </font> </a> <br>
Radiation
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
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
EOF;
echo $content;

// set VERIFICATION Button
// -----------------------
set_verification( $verification ) ;

$content = <<<EOF
</form>
</center>

<script language="javascript">
<!--
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var season       = form.season.selectedIndex ;
        var verification = form.verification.selectedIndex ;
        window.location  = "radiation.php?" 
                         + "&expid=$expid"
                         + "&year="         + (form.year.options[year].value)
                         + "&verification=" + (form.verification.options[verification].value)
                         + "&season="       + (form.season.options[season].value); }
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

EOF;
echo $content;

// **********************************************************************************
// ***************                       SRB Page                         ***********
// **********************************************************************************
$content = <<<EOF

<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9>
<tr>
   <td align=left> 
   <ul>
   <br>
EOF;
echo $content;

      mk_link ("$year","$seasonUC","toa_radz_${verification}.${seasonUC}.gif","TOA Zonal Mean Summary","blue");

$content = <<<EOF
   </ul>
    <ul>
EOF;
echo $content;

      mk_link ("$year","$seasonUC","radz.${seasonUC}.gif","Shortwave & Longwave Radiative Heating","blue");
      mk_link ("$year","$seasonUC","radz2.${seasonUC}.gif","Net Radiative Heating","blue");
      mk_link ("$year","$seasonUC","ozone.${seasonUC}.gif","Ozone","blue");

$content = <<<EOF
   </ul>
    <ul>

     <li> <a href="../pages/rad_toa.php?&year=$year&expid=$expid&season=$seasonUC&verification=CERES_EBAF-4&closeness=none"> <b> TOA &nbsp; &nbsp; &nbsp; Radiative Fluxes</b> </a> </li>
     <li> <a href="../pages/rad_surf.php?&year=$year&expid=$expid&season=$seasonUC&verification=SRB&closeness=none"> <b> Surface Radiative Fluxes</b> </a> </li>
     <li> <a href="../pages/rad_aerosol.php?&year=$year&expid=$expid&season=$seasonUC&cmpexp=none&closeness=none"> <b> Aerosol Radiative Forcing </b> </a> </li>

   </ul>

</td>
</tr>
</table>

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
