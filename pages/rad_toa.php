<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/rad_toa_verification.button" );
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
TOA Radiative Fluxes
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
        var verification = form.verification.selectedIndex ;
        var closeness    = form.closeness.selectedIndex ;
        window.location  = "rad_toa.php?"
                         + "&expid=$expid"
                         + "&year="         + (form.year.options[year].value)
                         + "&verification=" + (form.verification.options[verification].value)
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
set_verification( $verification );
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

// **********************************************************************************
// ***************                     Page Contents                      ***********
// **********************************************************************************

$content = <<<EOF
<br>
<center>
<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9>
<tr>
   <td align=left>
          <ul>
<br>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","olr_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","olr",${verification},$closeness,"Outgoing Longwave Radiation (All-Sky)","blue");

      mk_link1 ("$year","$seasonUC","olrc_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","olrc",${verification},$closeness,"Outgoing Longwave Radiation (Clear-Sky)","blue");

      mk_link1 ("$year","$seasonUC","olrcf_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","olrcf",${verification},$closeness,"TOA Longwave Radiation Cloud Forcing","blue");

      mk_link1 ("$year","$seasonUC","olrc_cc5_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","olrc_cc5",${verification},$closeness,"Outgoing Longwave Radiation (Clear-Sky, Cloud-Cleared<5%)","blue");

      mk_link1 ("$year","$seasonUC","olrcf_cc5_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","olrcf_cc5",${verification},$closeness,"TOA Longwave Radiation Cloud Forcing (Cloud-Cleared<5%)","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","osr_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","osr",${verification},$closeness,"Net TOA Shortwave Radiation (All-Sky)","blue");

      mk_link1 ("$year","$seasonUC","osrc_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","osrc",${verification},$closeness,"Net TOA Shortwave Radiation (Clear-Sky)","blue");

      mk_link1 ("$year","$seasonUC","osrcf_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","osrcf",${verification},$closeness,"Net TOA Shortwave Radiation Cloud Forcing","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","radswt_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","radswt",${verification},$closeness,"Incoming Shortwave Radiation","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","nettoa_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","nettoa",${verification},$closeness,"NET TOA Radiation All Sky","blue");

      mk_link1 ("$year","$seasonUC","nettoac_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","nettoac",${verification},$closeness,"NET TOA Radiation Clear Sky","blue");

      mk_link1 ("$year","$seasonUC","toacf_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","toacf",${verification},$closeness,"NET TOA Radiation Cloud Forcing","blue");

      mk_link1 ("$year","$seasonUC","nettoac_cc5_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","nettoac_cc5",${verification},$closeness,"NET TOA Radiation Clear Sky &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Cloud-Cleared<5%)","blue");

      mk_link1 ("$year","$seasonUC","toacf_cc5_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","toacf_cc5",${verification},$closeness,"NET TOA Radiation Cloud Forcing (Cloud-Cleared<5%)","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","tb_z_MERGIR.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","tb","MERGIR",$closeness,"IR Brightness Temperature vs MERGIR","blue");

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

</form>
EOF;

// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************
echo $content;
return; 

?>

</center>
