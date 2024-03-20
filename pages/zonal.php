<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/zonal_verification.button" );
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
// ***************                Page Base and Buttons                   ***********
// **********************************************************************************

$content = <<<EOF

 <title>
$expid
</title>

<H1 align=center >
<font color=darkred>
EXPID: &nbsp; <a href="../index.php" style="text-decoration: none"> <font color=darkred> $expid </font> </a> <br>
Zonal Mean Prognostics
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
&nbsp; &nbsp; &nbsp;
EOF;
echo $content;

// set Verification Button
// -----------------------
set_verification( $verification );
$content = <<<EOF
&nbsp; &nbsp; &nbsp;
EOF;
echo $content;

$content = <<<EOF
</form>
</center>

<script language="javascript">
<!--
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var season       = form.season.selectedIndex ;
        var verification = form.verification.selectedIndex ;
        window.location  = "zonal.php?"
                         + "&expid=$expid"
                         + "&year="   + (form.year.options[year].value)
                         + "&season=" + (form.season.options[season].value)
                         + "&verification=" + (form.verification.options[verification].value); }
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
   <li> <b>Zonal Mean Vertical Cross-Sections</b> </li>
  </ul>
   <ul>
   <ul>
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verification}_uwnd.${seasonUC}.gif","Zonal &nbsp &nbsp &nbsp &nbsp U-Wind &nbsp &nbsp (1000-0.02 mb)","blue");
      mk_link ("$year","$seasonUC","zonal_${verification}_vwnd.${seasonUC}.gif","Meridional V-Wind &nbsp;&nbsp;&nbsp;&nbsp (1000-0.02 mb)","blue");
      mk_link ("$year","$seasonUC","zonal_${verification}_tmpu.${seasonUC}.gif","Temperature &nbsp &nbsp;&nbsp &nbsp &nbsp &nbsp &nbsp (1000-0.02 mb)","blue");
      mk_link ("$year","$seasonUC","zonal_${verification}_rh.${seasonUC}.gif","Relative Humidity &nbsp;&nbsp &nbsp &nbsp (1000-5 &nbsp;&nbsp &nbsp mb)","blue");
      mk_link ("$year","$seasonUC","zonal_${verification}_str.${seasonUC}.gif","Meridional Streamfunction","blue");
      mk_link ("$year","$seasonUC","zonal_${verification}_res.${seasonUC}.gif","Residual Circulation","blue");

$content = <<<EOF
<br>
EOF;
echo $content;

      mk_link ("$year","$seasonUC","QBO_${verification}.gif","Quasi-Biennial Oscillation","blue");
      mk_link ("$year","$seasonUC","VORTEX_${verification}.gif","Antarctic Vortex Breakup","blue");
      mk_link ("$year","$seasonUC","zonal_${verification}_str_res.${seasonUC}.gif","Meridional Streamfunction & Residual Circulation","blue");
      mk_link ("$year","$seasonUC","zonal.log_qv.${seasonUC}.gif","Stratospheric & Mesospheric Water Vapor","blue");

$content = <<<EOF
<br>
EOF;
echo $content;

      mk_link ("$year","$seasonUC","WSTAR_Turn_Around_Lats.${seasonUC}.gif","WSTAR Turn Around Lats (TALATS)","blue");
      mk_link ("$year","$seasonUC","WSTAR_Profile_using_Averaged_TALATS.${seasonUC}.gif","WSTAR Profile using Averaged TALATS","blue");
      mk_link ("$year","$seasonUC","WSTAR_Profile_using_Individual_TALATS.${seasonUC}.gif","WSTAR Profile using Individual TALATS","blue");
      mk_link ("$year","$seasonUC","WSTAR_Profile_using_Level-Dependent_TALATS.${seasonUC}.gif","WSTAR Profile using Level-Dependent TALATS","blue");
      mk_link ("$year","$seasonUC","EP_Flux_${expid}.${seasonUC}.gif","Eliassen-Palm Flux Divergence: $expid (EXPID)","blue");
      mk_link ("$year","$seasonUC","EP_Flux_${verification}.${seasonUC}.gif","Eliassen-Palm Flux Divergence: ${verification} (CMPID)","blue");
      mk_link ("$year","$seasonUC","EP_Flux_diff_${expid}-${verification}.${seasonUC}.gif","Eliassen-Palm Flux Divergence: Difference (EXPID-CMPID)","blue");
      mk_link ("$year","$seasonUC","EP_Flux_diff_${verification}-${expid}.${seasonUC}.gif","Eliassen-Palm Flux Divergence: Difference (CMPID-EXPID)","blue");

$content = <<<EOF
  </ul>
  </ul>
   <ul>
<li> <b>Zonal Mean Vertical Profiles</b> </li>
  </ul>
   <ul>
   <ul>
EOF;
echo $content;

      mk_link ("$year","$seasonUC","line_U_z.${seasonUC}.gif"  ,"Zonal Mean U-Wind"           ,"blue");
      mk_link ("$year","$seasonUC","line_V_z.${seasonUC}.gif"  ,"Zonal Mean V-Wind"           ,"blue");
      mk_link ("$year","$seasonUC","line_T_z.${seasonUC}.gif"  ,"Zonal Mean Temperature"      ,"blue");
      mk_link ("$year","$seasonUC","line_Q_z.${seasonUC}.gif"  ,"Zonal Mean Specific Humidity","blue");
      mk_link ("$year","$seasonUC","line_RH2_z.${seasonUC}.gif","Zonal Mean Relative Humidity","blue");

$content = <<<EOF
  </ul>
  </ul>
   <ul>
<li> <b>Zonal Mean Latitudinal Profiles</b> </li>
  </ul>
   <ul>
   <ul>
EOF;
echo $content;

      mk_link ("$year","$seasonUC","line_U_lats.${seasonUC}.gif"  ,"U-Wind (200-mb & 850-mb)","blue");
      mk_link ("$year","$seasonUC","line_V_lats.${seasonUC}.gif"  ,"V-Wind (200-mb & 850-mb)","blue");
      mk_link ("$year","$seasonUC","line_T_lats.${seasonUC}.gif"  ,"Temperature (100-mb & 850-mb)","blue");
      mk_link ("$year","$seasonUC","line_Q_lats.${seasonUC}.gif"  ,"Specific Humidity (500-mb & 925-mb)","blue");
      mk_link ("$year","$seasonUC","line_RH2_lats.${seasonUC}.gif","Relative Humidity (500-mb & 925-mb)","blue");
      mk_link ("$year","$seasonUC","line_ZLE_lats.${seasonUC}.gif","Heights (300-mb & 850-mb)","blue");
      mk_link ("$year","$seasonUC","line_SLP_lats.${seasonUC}.gif","Sea-Level Pressure","blue");

$content = <<<EOF
     </ul>
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

function mk_link ($year,$season,$filename,$text,$color) {
     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];
                                                    { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     if (file_exists("$exppath/$year/$filename")){ 
       $zref = "<a href=$expurl/$year/$filename target=''> <font color=$color> $text </font> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename")){ 
       $zref = "<a href=$expurl/$year/$season/$filename target=''> <font color=$color> $text </font> </a>"; }

     $content = <<<EOF
     <li> $zref </li>
EOF;
echo $content;
return; }

?>
