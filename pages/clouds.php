<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/clouds_verification.button" );
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
// ***************                Page Base and Buttons                   ***********
// **********************************************************************************

$content = <<<EOF

 <title>
$expid
</title>

<H1 align=center >
<font color=darkred>
EXPID: &nbsp; <a href="../index.php" style="text-decoration: none"> <font color=darkred> $expid </font> </a> <br>
Clouds
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
        window.location  = "clouds.php?" 
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
   <th align=center bgcolor = #edf6ff> Comparison &nbsp; / &nbsp; Closeness </th>
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

<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9>
<tr>
   <td align=left> <ul> </ul>
       <li> <font color=black> <B> 2-D Cloud Fraction vs Verification &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </B> </li>
          <ul>

EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","cldtt_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","cldtt",${verification},${closeness},"Total  2-D Cloud Fraction vs ${verification}","blue");

$content = <<<EOF
<br>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","cldlo_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","cldlo",${verification},$closeness,"Low -Level Cloud Fraction vs ${verification}","blue");

      mk_link1 ("$year","$seasonUC","cldmd_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","cldmd",${verification},$closeness,"Mid -Level Cloud Fraction vs ${verification}","blue");

      mk_link1 ("$year","$seasonUC","cldhi_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","cldhi",${verification},$closeness,"High-Level Cloud Fraction vs ${verification}","blue");


$content = <<<EOF
</ul>
<br>
<li> <font color=black> <B> Cloud Model Diagnostics </B> </li>
<ul>
EOF;
echo $content;

      mk_link ("$year","$seasonUC","hdiag_FCLD.MOIST_z.${seasonUC}.gif","&nbsp; Zonal Mean Cloud Fraction","blue");

      mk_link ("$year","$seasonUC","hdiag_${verification}_FCLD.MOIST_z.${seasonUC}.gif","&nbsp; Zonal Mean Cloud Fraction vs ${verification}","blue");

$content = <<<EOF
<br>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_TAUTT.SOLAR_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_TAUTT.SOLAR_0.${seasonUC}.gif","Total 2-D &nbsp; Optical Thickness","blue");

      mk_link1 ("$year","$seasonUC","hdiag_TAULO.SOLAR_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_TAULO.SOLAR_0.${seasonUC}.gif","Low-Level Optical Thickness","blue");

      mk_link1 ("$year","$seasonUC","hdiag_TAUMD.SOLAR_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_TAUMD.SOLAR_0.${seasonUC}.gif","Mid-Level Optical Thickness","blue");

      mk_link1 ("$year","$seasonUC","hdiag_TAUHI.SOLAR_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_TAUHI.SOLAR_0.${seasonUC}.gif","High-Level Optical Thickness","blue");

$content = <<<EOF
<br>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_CLDTMP.SOLAR_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_CLDTMP.SOLAR_0.${seasonUC}.gif","Cloud Top Temperature","blue");

      mk_link1 ("$year","$seasonUC","hdiag_CLDPRS.SOLAR_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_CLDPRS.SOLAR_0.${seasonUC}.gif","Cloud Top Pressure","blue");

$content = <<<EOF
  </ul>
   <ul> </ul> </td>
</tr>
</table>

<br> <br>
 <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>
</ul>
</center>

</form>
EOF;
// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************
echo $content;
return; 

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

function mk_link  ($year,$season,$filename,$text,$color) {

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
