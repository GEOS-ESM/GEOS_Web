<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/moist_precip_verification.button" );
include( "../buttons/moist_tpw_verification.button" );
include( "../buttons/closeness.button" );
include( "../buttons/moist_region.button" );
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
$tpw_obs      = urlencode($PARAM['tpw_obs']);
$precip_obs   = urlencode($PARAM['precip_obs']);
$closeness    = urlencode($PARAM['closeness']);

include("globals.php");
include( "mk_link1.php" );
include( "mk_link2.php" );
include( "mk_link3.php" );

$seasonUC = strtoupper($season);
$seasonLC = strtolower($season);

// **********************************************************************************
// ***************                   Leap-To Function                     ***********
// **********************************************************************************

$content = <<<EOF
<form>
<script language="javascript">
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var season       = form.season.selectedIndex ;
        var tpw_obs      = form.tpw_obs.selectedIndex ;
        var precip_obs   = form.precip_obs.selectedIndex ;
        var region       = form.region.selectedIndex ;
        var closeness    = form.closeness.selectedIndex ;
        window.location  = "moist.php?" 
                         + "&expid=$expid"
                         + "&tpw_obs="    + (form.tpw_obs.options[tpw_obs].value)
                         + "&precip_obs=" + (form.precip_obs.options[precip_obs].value)
                         + "&year="       + (form.year.options[year].value)
                         + "&region="     + (form.region.options[region].value)
                         + "&closeness="  + (form.closeness.options[closeness].value)
                         + "&season="     + (form.season.options[season].value); }
</script>
EOF;
echo $content;

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
Moist Processes
</font> </H1>
EOF;
echo $content;

// **********************************************************************************
// Create HEADING Table
// **********************************************************************************

$content = <<<EOF
<center>
<table cellspacing=1 cellpadding=3 border=2 bordercolor=#497fbf width=45%>
<font color=darkblue>
<br>
EOF;
echo $content;

// First Row:  Headings
// --------------------
$content = <<<EOF
<tr>
   <th align=center bgcolor = #edf6ff> Year      </th>
   <th align=center bgcolor = #edf6ff> Season    </th>
   <th align=center bgcolor = #edf6ff> <font color=darkgreen> Closeness </font> </th>
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

// set CLOSENESS Button
// -----------------------
$content = <<<EOF
<th>
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

if($region == "_GLOBAL") { $region = ""; }

$content = <<<EOF

<center>
<br>

<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9>
<tr>
   <td align=left> 
   <ul>
   <br>
EOF;
echo $content;

// set VERIFICATION Button
// -----------------------
set_precip_obs( $precip_obs ) ;
$content = <<<EOF
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
EOF;
echo $content;

// set REGION Button
// -----------------
set_region( $region ) ;
$content = <<<EOF
<br>
<br>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","precip_z${region}_${precip_obs}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","precip${region}",${precip_obs},${closeness},"Total &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp;Precipitation &nbsp; vs &nbsp; ${precip_obs}","blue");
      mk_link1 ("$year","$seasonUC","precipcn_z${region}_${precip_obs}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","precipcn${region}",${precip_obs},${closeness},"Convective &nbsp; Precipitation &nbsp; vs &nbsp; ${precip_obs}","blue");
      mk_link1 ("$year","$seasonUC","precipls_z${region}_${precip_obs}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","precipls${region}",${precip_obs},${closeness},"Large-Scale &nbsp;Precipitation &nbsp; vs &nbsp; ${precip_obs}","blue");
      mk_link1 ("$year","$seasonUC","precipz${region}_${precip_obs}.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","precip2.${seasonUC}.gif","Convective vs Large-Scale Precipitation","blue");

$content = <<<EOF
<br>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_z_${precip_obs}_EVAP.SURFACE_0.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_${precip_obs}_EVAP.SURFACE_0.${seasonUC}.gif","Surface Evaporation &nbsp; vs &nbsp; ${precip_obs}","blue");
      mk_link1 ("$year","$seasonUC","emp_z_COADS.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","emp","COADS",${closeness},"Evap-Precip vs COADS","blue");

$content = <<<EOF
<br>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_z_${precip_obs}_DQVDTANAINT.DYN_0.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_${precip_obs}_DQVDTANAINT.DYN_0.${seasonUC}.gif","Analysis Moisture Increment (VINT) &nbsp; vs &nbsp; ${precip_obs}","blue");
      mk_link1 ("$year","$seasonUC","hdiag_z_${precip_obs}_DMDTANA.DYN_0.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_${precip_obs}_DMDTANA.DYN_0.${seasonUC}.gif","Analysis Surface Pressure Increment &nbsp; vs &nbsp; ${precip_obs}","blue");

$content = <<<EOF
<br>
<br>
EOF;
echo $content;

// set VERIFICATION Button
// -----------------------
set_tpw_obs( $tpw_obs ) ;
$content = <<<EOF
<br>
<br>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","tpw_z_${tpw_obs}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","tpw",${tpw_obs},${closeness},"Total Precipitable Water &nbsp; vs &nbsp; ${tpw_obs}","blue");

      mk_link1 ("$year","$seasonUC","lwp_z_${tpw_obs}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","lwp",${tpw_obs},${closeness},"Liquid Water Path &nbsp; vs &nbsp; ${tpw_obs}","blue");

$content = <<<EOF
<br>
  </ul>
   <ul>
      <li> <a href="../pages/moist_matrix.php?&year=$year&expid=$expid&season=$seasonUC&cmpexp=none&closeness=none"> <b> Horizontal Matrix </b> </a> </li>
  </ul>
   <ul>
EOF;
echo $content;

$content = <<<EOF
  </ul> 
</td>
</tr>
</table>

<br> <br>
 <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>
</center>

</form>
EOF;
// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************
echo $content;
return; 

?>
