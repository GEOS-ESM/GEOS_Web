<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/set_cmpexp.button" );
include( "../buttons/closeness.button" );
include( "../buttons/set_exps.php" );
include( "../buttons/set_item.php" );

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

include( "unregister_globals.php" );
include( "mk_link1.php" );
include( "mk_link2.php" );
include( "mk_link3.php" );
include( "mk_link4.php" );

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
$cmpexp       = urlencode($PARAM['cmpexp']);
$closeness    = urlencode($PARAM['closeness']);

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
Aerosol Radiative Forcing
</font> </H1>
EOF;
echo $content;

// **********************************************************************************
// Create LEAPTO Function
// **********************************************************************************

$content = <<<EOF
<form name="myform">
<script language="javascript">
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var season       = form.season.selectedIndex ;
        var cmpexp       = form.cmpexp.selectedIndex ;
        var closeness    = form.closeness.selectedIndex ;
        window.location  = "rad_aerosol.php?"
                         + "&expid=$expid"
                         + "&year="         + (form.year.options[year].value)
                         + "&cmpexp="       + (form.cmpexp.options[cmpexp].value)
                         + "&closeness="    + (form.closeness.options[closeness].value)
                         + "&season="       + (form.season.options[season].value); }
</script>
EOF;
echo $content;

// **********************************************************************************
// Create HEADING Table
// **********************************************************************************

$content = <<<EOF
<center>
<table cellspacing=1 cellpadding=3 border=2 bordercolor=#497fbf width=60%>
<font color=darkblue>
<br>
EOF;
echo $content;

// First Row:  Headings
// --------------------
$content = <<<EOF
<tr>
   <th align=center bgcolor = #edf6ff> Year                 </th>
   <th align=center bgcolor = #edf6ff> Season               </th>
   <th align=center bgcolor = #edf6ff> <font color=darkblue> Comparison </font> &nbsp; / &nbsp; <font color=darkgreen> Closeness </font> </th>
</tr>
</font>
EOF;
echo $content;

// Second Row:  Buttons
// --------------------
$content = <<<EOF
<tr>
EOF;
echo $content;

// set YEAR Button
// ---------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_year( $year );
$content = <<<EOF
</th>
EOF;
echo $content;

// set SEASON Button
// -----------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_season( $season );
$content = <<<EOF
</th>
EOF;
echo $content;

// set VERIFICATION Button
// -----------------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_cmpexp( $cmpexp );
$content = <<<EOF
EOF;
echo $content;

// set CLOSENESS Button
// -----------------------
$content = <<<EOF
&nbsp; &nbsp;
EOF;
echo $content;
set_closeness( $closeness );
$content = <<<EOF
</th>
EOF;
echo $content;

$content = <<<EOF
</tr>
</table>
</center>
<br>
EOF;
echo $content;

if( $cmpexp == "none" ) { $cmpexp = ""; }

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

<B> Aerosol Radiative Forcing (w/Aerosol - w/o Aerosol)</B>
<br><br>

<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9>
<tr>
   <td align=left> 
   <ul>
EOF;
echo $content;

$content = <<<EOF
   <br>
<li> <B> Aerosols LW</B> </li>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}OLRCAF.IRRAD_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","OLRCAF.IRRAD_0",${cmpexp},$closeness,"TOA Clear-Sky Longwave Radiation Aerosol Forcing","blue");
      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}LWGNETCAF.IRRAD_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","LWGNETCAF.IRRAD_0",${cmpexp},$closeness,"Net &nbsp; Clear-Sky Longwave Radiation at Surface (Aerosol Forcing)","blue");

$content = <<<EOF
  </ul>
   <ul>
<li> <B> Aerosols SW</B> </li>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}SWTNETCAF.SOLAR_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","SWTNETCAF.SOLAR_0",${cmpexp},$closeness,"TOA Net Downward Shortwave Radiation (Aerosol Forcing, Clear)","blue");
      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}SWTNETAF.SOLAR_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","SWTNETAF.SOLAR_0",${cmpexp},$closeness,"TOA Net Downward Shortwave Radiation (Aerosol Forcing, All-Sky)","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}SWGNETCAF.SOLAR_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","SWGNETCAF.SOLAR_0",${cmpexp},$closeness,"Net Shortwave Radiation at Surface (Aerosol Forcing, Clear)","blue");
      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}SWGNETAF.SOLAR_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","SWGNETAF.SOLAR_0",${cmpexp},$closeness,"Net Shortwave Radiation at Surface (Aerosol Forcing, All-Sky)","blue");

$content = <<<EOF
        </ul>
</td>
</tr>
</table>

<br> <br>
 <li> <b>
     <a href="../pages/radiation.php?&year=$year&expid=$expid&season=$seasonUC&verification=CERES_EBAF"> <font color=darkblue> Radiation </font> </a>
        &nbsp;&nbsp;&nbsp;
     <a href="../index.php"> <font color=darkred>Home</font></a> (Experiment <?php include( "../expid" ); ?>)
</b> </li>

EOF;

// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************
echo $content;
return; 

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

function zk_link1 ($year,$season,$filename,$text,$color) {

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];

                                                    { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''> <font color=$color> $text </font> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''> <font color=$color> $text </font> </a>"; }

     $content = <<<EOF
     <li> $zref
EOF;
echo $content;
return; }

function zk_link2 ($year,$season,$filename,$text,$color) {

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];
                                                    { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''> <font color=$color> $text </font> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''> <font color=$color> $text </font> </a>"; }

     $content = <<<EOF
     $zref </li>
EOF;
echo $content;
return; }

?>

</center>
