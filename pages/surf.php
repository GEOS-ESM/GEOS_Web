<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/surf_verification.button" );
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
include( "mk_link5.php" );

// **********************************************************************************
// ***************                    Page Variables                      ***********
// **********************************************************************************

unregister_globals();

$PARAM = array_merge($_GET, $_POST);
$expid        = urlencode($PARAM['expid']);
$year         = urlencode($PARAM['year']);
$season       = urlencode($PARAM['season']);
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
Surface/2-D Diagnostics
</font> </H1>
<br>
<br>
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
        window.location  = "surf.php?" 
                         + "&expid=$expid"
                         + "&year="         + (form.year.options[year].value)
                         + "&verification=" + (form.verification.options[verification].value)
                         + "&closeness="    + (form.closeness.options[closeness].value)
                         + "&season="       + (form.season.options[season].value); }
</script>
EOF;
echo $content;

//  print "<br>";
//  print "YEAR: <b> $year </b> <br>";
//  print "SEASON: <u> $season </u> <br>";
//  print "COMPARISON: $verification <br>";
//  print "CLOSENESS: $closeness <br>";
//  print "<br>";

// **********************************************************************************
// Create HEADING Table
// **********************************************************************************

$content = <<<EOF
<center>
<table cellspacing=1 cellpadding=3 border=2 bordercolor=#497fbf width=60%>
<font color=darkblue>
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
// ***************   Note: For use in mk_link1/2 in subsequent code:      ***********
// ***************         Use $cmpexp       for generic  hdiag plots     ***********
// ***************         Use $verification for specific named plots     ***********
// **********************************************************************************

if( $verification == "none" ) { $cmpexp = ""; }
else                          { $cmpexp = "${verification}_"; }
if( $verification == "none" ) { $cmplab = ""; }
else                          { $cmplab = " &nbsp;&nbsp;vs &nbsp;&nbsp;${verification}"; }
if( $verification == "none" ) { $verification = ""; }

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
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
   <br>

EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}TS.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","TS.SURFACE_0",$verification,$closeness,"Skin Temperature${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","tskin_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","tskin",$verification,$closeness,"Skin Temperature (Land)${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","sst_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","sst",${verification},$closeness,"Skin Temperature (Ocean)${cmplab}","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","NETHEATG_z_OAfluxes.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","NETHEATG_OAfluxes.${seasonUC}.gif","Net Surface Heat Flux vs WHOI","blue");

      mk_link1 ("$year","$seasonUC","hflux_z_LAND_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","hflux","LAND_${verification}",$closeness,"Sensible Heat Flux (Land)${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hflux_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","hflux",${verification},$closeness,"Sensible Heat Flux (Ocean)${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","eflux_z_LAND_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","eflux","LAND_${verification}",$closeness,"Latent Heat Flux (Land)${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","eflux_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","eflux",${verification},$closeness,"Latent Heat Flux (Ocean)${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","taux_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","taux",${verification},$closeness,"Taux (Eastward Surface Stress)${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","tauy_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","tauy",${verification},$closeness,"Tauy (Northward Surface Stress)${cmplab}","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link5 ("$year","$seasonUC","albedo","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","albedo","SOLAR",${verification},$closeness,"Surface Albedo${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","albnf","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","albnf","SOLAR",${verification},$closeness,"Surface Albedo for Near-Infrared Diffuse Beam${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","albnr","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","albnr","SOLAR",${verification},$closeness,"Surface Albedo for Near-Infrared Direct Beam${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","albvf","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","albvf","SOLAR",${verification},$closeness,"Surface Albedo for Visible Diffuse Beam${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","albvr","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","albvr","SOLAR",${verification},$closeness,"Surface Albedo for Visible Direct Beam${cmplab}","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_CM.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_CM.SURFACE_0.${seasonUC}.gif","Surface Exchange Coefficient for Momentum","blue");

      mk_link1 ("$year","$seasonUC","hdiag_CN.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_CN.SURFACE_0.${seasonUC}.gif","Surface Neutral Drag Coefficient","blue");

      mk_link1 ("$year","$seasonUC","hdiag_CQ.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_CQ.SURFACE_0.${seasonUC}.gif","Surface Exchange Coefficient for Moisture","blue");

      mk_link1 ("$year","$seasonUC","hdiag_CT.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_CT.SURFACE_0.${seasonUC}.gif","Surface Exchange Coefficient for Heat","blue");

      mk_link1 ("$year","$seasonUC","hdiag_RI.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_RI.SURFACE_0.${seasonUC}.gif","Surface Bulk Richardson Number","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}Z0.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","Z0.SURFACE_0",$verification,$closeness,"Surface Roughness${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}Z0H.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","Z0H.SURFACE_0",$verification,$closeness,"Surface Roughness for Heat${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}EMIS.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","EMIS.SURFACE_0",$verification,$closeness,"Surface Emissivity${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}LAI.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","LAI.SURFACE_0",$verification,$closeness,"Leaf Area Index${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}GRN.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","GRN.SURFACE_0",$verification,$closeness,"Greeness${cmplab}","blue");

$content = <<<EOF
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}DMDTDYN.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","DMDTDYN.DYN_0",$verification,$closeness,"Dynamics Surface Pressure Tendency${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}DMDT.PHYSICS_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","DMDT.PHYSICS_0",$verification,$closeness,"Physics &nbsp; &nbsp; Surface Pressure Tendency${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}DMDTANA.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","DMDTANA.DYN_0",$verification,$closeness,"Analysis &nbsp; Surface Pressure Tendency${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}DPSDT_CON.AGCM_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","DPSDT_CON.AGCM_0",$verification,$closeness,"Constraint &nbsp; Surface Pressure Tendency${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}DMDTDYNANA.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","DMDTDYNANA.DYN_0",$verification,$closeness,"DYN+ANA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Surface Pressure Tendency${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}DMDTDYNANAPHY.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","DMDTDYNANAPHY.DYN_0",$verification,$closeness,"DYN+ANA+PHY Surface Pressure Tendency${cmplab}","blue");

$content = <<<EOF
</ul>
</td>
 <td align=left>
 <ul>
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp
 <br>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}T2M.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","T2M.SURFACE_0",$verification,$closeness,"2-meter Temperature${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}Q2M.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","Q2M.SURFACE_0",$verification,$closeness,"2-meter Specific Humidity${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}WET1.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","WET1.SURFACE_0",$verification,$closeness,"Surface Soil Wetness${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_QS.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","QS.SURFACE_0",$verification,$closeness,"Surface Specific Humidity${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}SNOMAS.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","SNOMAS.SURFACE_0",$verification,$closeness,"Snow Mass${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}TSLAND.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","TSLAND.SURFACE_0",$verification,$closeness,"Total Snow Storage over Land${cmplab}","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","tb_z_MERGIR.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","tb","MERGIR",$closeness,"IR Brightness Temperature vs MERGIR","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

//    mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}CLDTT.SOLAR_z.${seasonUC}.gif","(z)","darkred");
//    mk_link4 ("$year","$seasonUC","hdiag","CLDTT.SOLAR_0",$verification,$closeness,"Total 2-D Cloud Fraction${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","cldtt","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","cldtt","SOLAR",${verification},$closeness,"Total 2-D Cloud Fraction${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","cldlo","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","cldlo","SOLAR",${verification},$closeness,"Low-Level Cloud Fraction${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","cldmd","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","cldmd","SOLAR",${verification},$closeness,"Mid-Level Cloud Fraction${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","cldhi","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","cldhi","SOLAR",${verification},$closeness,"High-Level Cloud Fraction${cmplab}","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

//    mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}TAUHI.SOLAR_z.${seasonUC}.gif","(z)","darkred");
//    mk_link4 ("$year","$seasonUC","hdiag","TAUHI.SOLAR_0",$verification,$closeness,"High-Level Optical Thickness${cmplab}","blue");

//    mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}TAUMD.SOLAR_z.${seasonUC}.gif","(z)","darkred");
//    mk_link4 ("$year","$seasonUC","hdiag","TAUMD.SOLAR_0",$verification,$closeness,"Mid-Level Optical Thickness${cmplab}","blue");

//    mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}TAULO.SOLAR_z.${seasonUC}.gif","(z)","darkred");
//    mk_link4 ("$year","$seasonUC","hdiag","TAULO.SOLAR_0",$verification,$closeness,"Low-Level Optical Thickness${cmplab}","blue");

//    mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}TAUTT.SOLAR_z.${seasonUC}.gif","(z)","darkred");
//    mk_link4 ("$year","$seasonUC","hdiag","TAUTT.SOLAR_0",$verification,$closeness,"Total 2-D Optical Thickness${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","tauhi","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","tauhi","SOLAR",${verification},$closeness,"High-Level Optical Thickness${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","taumd","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","taumd","SOLAR",${verification},$closeness,"Mid-Level Optical Thickness${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","taulo","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","taulo","SOLAR",${verification},$closeness,"Low-Level Optical Thickness${cmplab}","blue");

      mk_link5 ("$year","$seasonUC","tautt","SOLAR",${verification},$closeness,"(z)","darkred");
      mk_link5 ("$year","$seasonUC","tautt","SOLAR",${verification},$closeness,"Total 2-D Optical Thickness${cmplab}","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

//    mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}SLP.DYN_z.${seasonUC}.gif","(z)","darkred");
//    mk_link4 ("$year","$seasonUC","hdiag","SLP.DYN_0",$verification,$closeness,"Sea-Level Pressure${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}THAT.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","THAT.SURFACE_0",$verification,$closeness,"Effective Surface Skin Temperature${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}QHAT.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","QHAT.SURFACE_0",$verification,$closeness,"Effective Surface Specific Humidity${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}ZPBL.TURBULENCE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","ZPBL.TURBULENCE_0",$verification,$closeness,"Planetary Boundary Layer Height${cmplab}","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}TROPP_BLENDED.AGCM_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","TROPP_BLENDED.AGCM_0",$verification,$closeness,"Tropopause Pressure${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}TROPQ.AGCM_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","TROPQ.AGCM_0",$verification,$closeness,"Tropopause Specific Humidity${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}TROPT.AGCM_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","TROPT.AGCM_0",$verification,$closeness,"Tropopause Temperature${cmplab}","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","speed_z_${verification}.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","speed",${verification},$closeness,"Surface Wind Speed${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}US.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","US.DYN_0",$verification,$closeness,"Surface Eastward Wind${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}VS.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","VS.DYN_0",$verification,$closeness,"Surface Northward Wind${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}GUST.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","GUST.DYN_0",$verification,$closeness,"Gustiness${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}VENT.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","VENT.DYN_0",$verification,$closeness,"Ventilation${cmplab}","blue");

$content = <<<EOF
</ul>
 <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_${cmpexp}EVAP.SURFACE_z.${seasonUC}.gif","(z)","darkred");
      mk_link4 ("$year","$seasonUC","hdiag","EVAP.SURACE_0",$verification,$closeness,"Surface Evaporation${cmplab}","blue");

      mk_link1 ("$year","$seasonUC","emp_z_COADS.${seasonUC}.gif","(z)","darkred");
      mk_link3 ("$year","$seasonUC","emp","COADS",$closeness,"Evap-Precip vs COADS","blue");

$content = <<<EOF
   <br>
   </ul>
   </td>
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

?>
