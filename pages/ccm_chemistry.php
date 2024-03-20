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

$seasonUC = strtoupper($season);
$seasonLC = strtolower($season);

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

$content = <<<EOF

<a href="../pages/chem_boxplots.php?&year=$year&expid=$expid"> <b> Boxplots</b> </a><br>
<a href="../pages/chem_climatologies.php?&year=$year&expid=$expid"> <b> Climatologies</b> </a><br>
<a href="../pages/chem_profiles.php?&year=$year&expid=$expid"> <b> Profiles</b> </a><br>
<a href="../pages/chem_seasonal_cycles.php?&year=$year&expid=$expid"> <b> Seasonal Cycles</b> </a><br>
<a href="../pages/chem_time_series.php?&year=$year&expid=$expid"> <b> Time Series</b> </a><br>
<a href="../pages/chem_zonal_means.php?&year=$year&expid=$expid"> <b> Zonal Means</b> </a>
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

?>
