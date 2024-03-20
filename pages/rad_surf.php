<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/rad_surf_verification.button" );
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
Surface Radiative Fluxes
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
        window.location  = "rad_surf.php?"
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

<center>
<br>

EOF;
echo $content;

// **********************************************************************************
// ***************                       SRB Page                         ***********
// **********************************************************************************

$content = <<<EOF

<br>

<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9>
<tr>
   <td align=left> 
<ul> 
<br>
EOF;
echo $content;

$content = <<<EOF
<li> <B> Surface LW </B> </li>
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","lwgup_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgup",${verification},$closeness,"Upward Longwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("$year","$seasonUC","lwgupc_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgupc",${verification},$closeness,"Upward Longwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("$year","$seasonUC","lwgupcf_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgupcf",${verification},$closeness,"Upward Longwave Radiation at Surface (Cloud Forcing)","blue");

      mk_link1 ("$year","$seasonUC","lwgupc_cc5_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgupc_cc5",${verification},$closeness,"Upward Longwave Radiation at Surface (Clear-Sky, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cloud-Cleared<5%)","blue");

      mk_link1 ("$year","$seasonUC","lwgupcf_cc5_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgupcf_cc5",${verification},$closeness,"Upward Longwave Radiation at Surface (Cloud Forcing, Cloud-Cleared<5%)","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","lwgdwn_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgdwn",${verification},$closeness,"Downward Longwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("$year","$seasonUC","lwgdwnc_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgdwnc",${verification},$closeness,"Downward Longwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("$year","$seasonUC","lwgdwncf_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgdwncf",${verification},$closeness,"Downward Longwave Radiation at Surface (Cloud Forcing)","blue");

      mk_link1 ("$year","$seasonUC","lwgdwnc_cc5_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgdwnc_cc5",${verification},$closeness,"Downward Longwave Radiation at Surface (Clear-Sky, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cloud-Cleared<5%)","blue");

      mk_link1 ("$year","$seasonUC","lwgdwncf_cc5_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgdwncf_cc5",${verification},$closeness,"Downward Longwave Radiation at Surface (Cloud Forcing, Cloud-Cleared<5%)","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","lwgnet_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgnet",${verification},$closeness,"Net Longwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("$year","$seasonUC","lwgnetc_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgnetc",${verification},$closeness,"Net Longwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("$year","$seasonUC","lwgnetcf_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgnetcf",${verification},$closeness,"Net Longwave Radiation at Surface (Cloud Forcing)","blue");

      mk_link1 ("$year","$seasonUC","lwgnetc_cc5_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgnetc_cc5",${verification},$closeness,"Net Longwave Radiation at Surface (Clear-Sky, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cloud-Cleared<5%)","blue");

      mk_link1 ("$year","$seasonUC","lwgnetcf_cc5_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwgnetcf_cc5",${verification},$closeness,"Net Longwave Radiation at Surface (Cloud Forcing, Cloud-Cleared<5%)","blue");

$content = <<<EOF
</ul>
<li> <B> Surface Net </B> </li>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","radnetg_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","radnetg",${verification},$closeness,"Net Radiation at Surface (All-Sky)","blue");

      mk_link1 ("$year","$seasonUC","radnetgc_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","radnetgc",${verification},$closeness,"Net Radiation at Surface (Clear-Sky)","blue");

$content = <<<EOF
</ul>
</td>
EOF;
echo $content;


$content = <<<EOF
</ul>
</td>
EOF;
echo $content;

$content = <<<EOF
 <td align=left> 
 <ul>
<br>
<li> <B> Surface SW </B> </li>
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","swgup_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","swgup",${verification},$closeness,"Upward Shortwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("$year","$seasonUC","swgupc_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","swgupc",${verification},$closeness,"Upward Shortwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("$year","$seasonUC","swgupcf_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","swgupcf",${verification},$closeness,"Upward Shortwave Radiation at Surface (Cloud Forcing)","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","swgdwn_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","swgdwn",${verification},$closeness,"Downward Shortwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("$year","$seasonUC","swgdwnc_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","swgdwnc",${verification},$closeness,"Downward Shortwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("$year","$seasonUC","swgdwncf_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","swgdwncf",${verification},$closeness,"Downward Shortwave Radiation at Surface (Cloud Forcing)","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","swgnet_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","swgnet",${verification},$closeness,"Net Shortwave Radiation at Surface (All-Sky)","blue");

      mk_link1 ("$year","$seasonUC","swgnetc_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","swgnetc",${verification},$closeness,"Net Shortwave Radiation at Surface (Clear-Sky)","blue");

      mk_link1 ("$year","$seasonUC","swgnetcf_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","swgnetcf",${verification},$closeness,"Net Shortwave Radiation at Surface (Cloud Forcing)","blue");

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
