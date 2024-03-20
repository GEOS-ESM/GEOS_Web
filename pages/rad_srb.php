<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/radiation_verification.button" );
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
//set_verification( $verification ) ;

$content = <<<EOF
</form>
</center>

<script language="javascript">
<!--
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var season       = form.season.selectedIndex ;
        window.location  = "rad_srb.php?" 
                         + "&expid=$expid"
                         + "&year="         + (form.year.options[year].value)
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

<B> Comparisons with SRB </B>
<br><br>

<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9>
<tr>
   <td align=left>
   <ul>
   <br>
EOF;
echo $content;

$content = <<<EOF
  </ul>
   <ul>
<li> <B> Surface LW </B> </li>
EOF;
echo $content;

      mk_link1 ("../$year/lwgup_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/lwgup_SRB.${seasonUC}.gif","Upward Longwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("../$year/lwgupc_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/lwgupc_SRB.${seasonUC}.gif","Upward Longwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("../$year/lwgupcf_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/lwgupcf_SRB.${seasonUC}.gif","Upward Longwave Radiation at Surface (Cloud Forcing)","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("../$year/lwgdwn_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/lwgdwn_SRB.${seasonUC}.gif","Downward Longwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("../$year/lwgdwnc_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/lwgdwnc_SRB.${seasonUC}.gif","Downward Longwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("../$year/lwgdwncf_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/lwgdwncf_SRB.${seasonUC}.gif","Downward Longwave Radiation at Surface (Cloud Forcing)","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("../$year/lwgnet_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/lwgnet_SRB.${seasonUC}.gif","Net Longwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("../$year/lwgnetc_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/lwgnetc_SRB.${seasonUC}.gif","Net Longwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("../$year/lwgnetcf_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/lwgnetcf_SRB.${seasonUC}.gif","Net Longwave Radiation at Surface (Cloud Forcing)","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

$content = <<<EOF
<li> <B> Top of Atmosphere (TOA) </B> </li>
EOF;
echo $content;

      mk_link1 ("../$year/olr_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/olr_SRB.${seasonUC}.gif","Outgoing Longwave Radiation (All-Sky)","blue");

      mk_link1 ("../$year/olrc_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/olrc_SRB.${seasonUC}.gif","Outgoing Longwave Radiation (Clear-Sky)","blue");

      mk_link1 ("../$year/olrcf_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/olrcf_SRB.${seasonUC}.gif","TOA Longwave Radiation Cloud Forcing","blue");

$content = <<<EOF
</ul>
</td>
EOF;
echo $content;

$content = <<<EOF
 <td align=left> 
 <ul>
 <br>
</ul>
 <ul>
<li> <B> Surface SW </B> </li>
EOF;
echo $content;

      mk_link1 ("../$year/swgup_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/swgup_SRB.${seasonUC}.gif","Upward Shortwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("../$year/swgupc_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/swgupc_SRB.${seasonUC}.gif","Upward Shortwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("../$year/swgupcf_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/swgupcf_SRB.${seasonUC}.gif","Upward Shortwave Radiation at Surface (Cloud Forcing)","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("../$year/swgdwn_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/swgdwn_SRB.${seasonUC}.gif","Downward Shortwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("../$year/swgdwnc_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/swgdwnc_SRB.${seasonUC}.gif","Downward Shortwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("../$year/swgdwncf_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/swgdwncf_SRB.${seasonUC}.gif","Downward Shortwave Radiation at Surface (Cloud Forcing)","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("../$year/swgnet_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/swgnet_SRB.${seasonUC}.gif","Net Shortwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("../$year/swgnetc_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/swgnetc_SRB.${seasonUC}.gif","Net Shortwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("../$year/swgnetcf_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/swgnetcf_SRB.${seasonUC}.gif","Net Shortwave Radiation at Surface (Cloud Forcing)","blue");

$content = <<<EOF
</ul>
 <ul>
<li> <B> Top of Atmosphere (TOA) </B> </li>
EOF;

echo $content;

      mk_link1 ("../$year/radswt_z_SRB.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("../$year/radswt_SRB.${seasonUC}.gif","Incoming Shortwave Radiation","blue");

$content = <<<EOF
<br>
<br>
        </ul>
   <ul> </ul> </td>
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

function mk_link0 ($filename,$text,$color) {
     if (file_exists($filename)) { $zref = "<a href=$filename target=''> <font color=$color> $text </font> </a>"; }
     else                        { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     $content = <<<EOF
     <li> $zref </li>
EOF;
echo $content;
return; }

function mk_link1 ($filename,$text,$color) {
     if (file_exists($filename)) { $zref = "<a href=$filename target=''> <font color=$color> $text </font> </a>"; }
     else                        { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     $content = <<<EOF
     <li> $zref
EOF;
echo $content;
return; }

function mk_link2 ($filename,$text,$color) {
     if (file_exists($filename)) { $zref = "<a href=$filename target=''> <font color=$color> $text </font> </a>"; }
     else                        { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     $content = <<<EOF
     $zref </li>
EOF;
echo $content;
return; }

?>

</center>
