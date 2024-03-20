<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
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
Taylor Diagrams
</font> </H1>

<center>
<br>

<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9>
<tr>
   <td align=left>
          <ul>
EOF;
echo $content;

      mk_link1 ("$year/taylor_TSKIN_1.gif","Surface Skin Temperature","blue");
      mk_link2 ("$year/taylor_TSKIN_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
 </ul>
  <ul>
EOF;
echo $content;

      mk_link1 ("$year/taylor_SLP_1.gif","Sea-Level Pressure vs NCEP","blue");
      mk_link2 ("$year/taylor_SLP_2.gif","&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
 </ul>
  <ul>
EOF;
echo $content;

      mk_link1 ("$year/taylor_U_850_1.gif","850-mb U-Wind vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_U_850_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_V_850_1.gif","850-mb V-Wind vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_V_850_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_T_850_1.gif","850-mb Temperature vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_T_850_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_QV_850_1.gif","850-mb Specific Humidity vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_QV_850_2.gif","&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
 </ul>
  <ul>
EOF;
echo $content;

      mk_link1 ("$year/taylor_U_500_1.gif","500-mb U-Wind vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_U_500_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_V_500_1.gif","500-mb V-Wind vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_V_500_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_T_500_1.gif","500-mb Temperature vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_T_500_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_QV_500_1.gif","500-mb Specific Humidity vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_QV_500_2.gif","&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
 </ul>
  <ul>
EOF;
echo $content;

      mk_link1 ("$year/taylor_U_200_1.gif","200-mb U-Wind vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_U_200_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_V_200_1.gif","200-mb V-Wind vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_V_200_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_T_200_1.gif","200-mb Temperature vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_T_200_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_QV_200_1.gif","200-mb Specific Humidity vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_QV_200_2.gif","&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
 </ul>
  <ul>
EOF;
echo $content;

      mk_link1 ("$year/taylor_HE_300_1.gif","300-mb Eddy Heights vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_HE_300_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_HE_500_1.gif","500-mb Eddy Heights vs NCEP/ERA40","blue");
      mk_link2 ("$year/taylor_HE_500_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
 </ul>
</td>
 <td align=left>
  <ul>
  <br>
EOF;
echo $content;

      mk_link1 ("$year/taylor_PRECIP_1.gif","Total Precipitation","blue");
      mk_link2 ("$year/taylor_PRECIP_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_TPW_1.gif","Total Precipitable Water","blue");
      mk_link2 ("$year/taylor_TPW_2.gif","&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_LWP_1.gif","Liquid Water Path","blue");
      mk_link2 ("$year/taylor_LWP_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
 </ul>
  <ul>
EOF;
echo $content;

      mk_link1 ("$year/taylor_CLDTT_COADS_1.gif","Total Cloud Fraction vs COADS","blue");
      mk_link2 ("$year/taylor_CLDTT_COADS_2.gif","&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_CLDTT_ISCCP_1.gif","Total Cloud Fraction vs ISCCP","blue");
      mk_link2 ("$year/taylor_CLDTT_ISCCP_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_CLDLO_ISCCP_1.gif","Low   Cloud Fraction vs ISCCP","blue");
      mk_link2 ("$year/taylor_CLDLO_ISCCP_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_CLDMD_ISCCP_1.gif","Mid   Cloud Fraction vs ISCCP","blue");
      mk_link2 ("$year/taylor_CLDMD_ISCCP_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_CLDHI_ISCCP_1.gif","High  Cloud Fraction vs ISCCP","blue");
      mk_link2 ("$year/taylor_CLDHI_ISCCP_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
 </ul>
  <ul>
EOF;
echo $content;

      mk_link1 ("$year/taylor_OLR_1.gif","Outgoing Longwave Radiation (All-Sky)","blue");
      mk_link2 ("$year/taylor_OLR_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_OLRCLR_1.gif","Outgoing Longwave Radiation (Clear-Sky)","blue");
      mk_link2 ("$year/taylor_OLRCLR_2.gif","&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_LWCF_1.gif","Longwave Radiation Cloud Forcing","blue");
      mk_link2 ("$year/taylor_LWCF_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
 </ul>
  <ul>
EOF;
echo $content;

      mk_link1 ("$year/taylor_NSR_1.gif","Net TOA Shortwave Radiation (All-Sky)","blue");
      mk_link2 ("$year/taylor_NSR_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_NSRCLR_1.gif","Net TOA Shortwave Radiation (Clear-Sky)","blue");
      mk_link2 ("$year/taylor_NSRCLR_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_SWCF_1.gif","Net TOA Shortwave Radiation Cloud Forcing","blue");
      mk_link2 ("$year/taylor_SWCF_2.gif","&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
 </ul>
  <ul>
EOF;
echo $content;

      mk_link1 ("$year/taylor_TAUX_1.gif","Eastward Surface Stress","blue");
      mk_link2 ("$year/taylor_TAUX_2.gif","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_TAUY_1.gif","Northward Surface Stress","blue");
      mk_link2 ("$year/taylor_TAUY_2.gif","&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
 </ul>
  <ul>
EOF;
echo $content;

      mk_link1 ("$year/taylor_HFLUX_1.gif","Sensible Heat Flux","blue");
      mk_link2 ("$year/taylor_HFLUX_2.gif","&nbsp;&nbsp (Zoom)","darkred");

      mk_link1 ("$year/taylor_EFLUX_1.gif","Latent &nbsp;&nbsp  Heat Flux","blue");
      mk_link2 ("$year/taylor_EFLUX_2.gif","&nbsp;&nbsp (Zoom)","darkred");

$content = <<<EOF
</ul>

</td>
</tr>
</table>

<br> <br>
 <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>
</ul>
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

function mk_link0 ($filename,$text,$color) {
     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];
     if (file_exists("$exppath/$filename")) { $zref = "<a href=$expurl/$filename target=''> <font color=$color> $text </font> </a>"; }
     else                        { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     $content = <<<EOF
     <li> $zref </li>
EOF;
echo $content;
return; }

function mk_link1 ($filename,$text,$color) {
     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];
     if (file_exists("$exppath/$filename")) { $zref = "<a href=$expurl/$filename target=''> <font color=$color> $text </font> </a>"; }
     else                        { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     $content = <<<EOF
     <li> $zref
EOF;
echo $content;
return; }

function mk_link2 ($filename,$text,$color) {
     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];
     if (file_exists("$exppath/$filename")) { $zref = "<a href=$expurl/$filename target=''> <font color=$color> $text </font> </a>"; }
     else                        { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     $content = <<<EOF
     $zref </li>
EOF;
echo $content;
return; }

?>
