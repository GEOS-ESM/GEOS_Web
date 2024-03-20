<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
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
GMAO Experiment $expid
</title>

<H1 align=center >
<font color=darkred>
GMAO Experiment $expid <br>
Energetics
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
</form>
</center>

<script language="javascript">
<!--
function leapto(form)
     {  var year        = form.year.selectedIndex ;
        var season      = form.season.selectedIndex ;
        window.location = "energy.php?"
                        + "&expid=$expid"
                        + "&year="   + (form.year.options[year].value)
                        + "&season=" + (form.season.options[season].value); }
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
EOF;
echo $content;

      mk_link0 ("$year/KE_TIME_SERIES.gif","KE Time Series","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_KEGEN.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEGEN.DYN_0.${seasonUC}.gif","Omega*Alpha ","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEGEN1.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEGEN1.DYN_0.${seasonUC}.gif","Energy Generation from KE &nbsp;&nbsp;Equation","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEGEN2.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEGEN2.DYN_0.${seasonUC}.gif","Energy Generation from CpT Equation","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEGENNET.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEGENNET.DYN_0.${seasonUC}.gif","Net Energy Generation (KE+CpT) Across Dynamics","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_KEGEND1.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEGEND1.DYN_0.${seasonUC}.gif","Energy Generation from KE &nbsp;&nbsp;Equation vs Omega*Alpha","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEGEND2.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEGEND2.DYN_0.${seasonUC}.gif","Energy Generation from CpT Equation vs Omega*Alpha","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_KEDYN.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEDYN.DYN_0.${seasonUC}.gif","KE Tendency due to Dynamics","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEPHY.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEPHY.DYN_0.${seasonUC}.gif","KE Tendency due to Physics","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEANA.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEANA.DYN_0.${seasonUC}.gif","KE Tendency due to Analysis","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_TEDYN.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_TEDYN.DYN_0.${seasonUC}.gif","TE Tendency due to Dynamics","blue");

      mk_link1 ("$year","$seasonUC","hdiag_TEPHY.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_TEPHY.DYN_0.${seasonUC}.gif","TE Tendency due to Physics","blue");

      mk_link1 ("$year","$seasonUC","hdiag_TEANA.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_TEANA.DYN_0.${seasonUC}.gif","TE Tendency due to Analysis","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_KEPG.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEPG.DYN_0.${seasonUC}.gif","KE Tendency due to Pressure Gradient &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Across CDCORE","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEADV.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEADV.DYN_0.${seasonUC}.gif","KE Tendency due to Inertial Terms &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Across CDCORE","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEDP.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEDP.DYN_0.${seasonUC}.gif","KE Tendency due to Pressure Adjustments &nbsp;Across CDCORE","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEHOT.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEHOT.DYN_0.${seasonUC}.gif","KE Tendency due to Higher-Order Terms &nbsp; Across CDCORE","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_KETEDYN.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KETEDYN.DYN_0.${seasonUC}.gif","KE+TE Tendency due to Dynamics","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KETEDYN2.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KETEDYN2.DYN_0.${seasonUC}.gif","-(OmegaAlpha+CONVPHI+CONVKE) from Dynamics","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KETEDYN3.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KETEDYN3.DYN_0.${seasonUC}.gif","Spurious Kinetic Energy Tendency due to Dynamics","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEREMAP.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEREMAP.DYN_0.${seasonUC}.gif","Spurious Kinetic Energy Tendency due to Vertical Remapping","blue");

      mk_link1 ("$year","$seasonUC","hdiag_DKERESIN.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_DKERESIN.DYN_0.${seasonUC}.gif","Residual Error in Kinetic Energy Tendency Inertial Terms","blue");

      mk_link1 ("$year","$seasonUC","hdiag_DKERESPG.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_DKERESPG.DYN_0.${seasonUC}.gif","Residual Error in Kinetic Energy Tendency Pressure-Gradient Terms","blue");

      mk_link1 ("$year","$seasonUC","hdiag_TEFIXER.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_TEFIXER.DYN_0.${seasonUC}.gif","Added CpTv for Forced TE Conservation","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_KETEPHY.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KETEPHY.DYN_0.${seasonUC}.gif","KE+TE Tendency due to Physics","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KETEANA.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KETEANA.DYN_0.${seasonUC}.gif","KE+TE Tendency due to Analysis","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_DKEDT.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_DKEDT.DYN_0.${seasonUC}.gif","Total KE Tendency due to Dynamics+Physics+Analysis","blue");

      mk_link1 ("$year","$seasonUC","hdiag_DTEDT.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_DTEDT.DYN_0.${seasonUC}.gif","Total TE Tendency due to Dynamics+Physics+Analysis","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_DKETEDT.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_DKETEDT.DYN_0.${seasonUC}.gif","Total KE+TE Tendency due to Dynamics+Physics+Analysis","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_KEGWD.GWD_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEGWD.GWD_0.${seasonUC}.gif","KE Across GWD   ","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEORO.GWD_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEORO.GWD_0.${seasonUC}.gif","KE Across GWD (ORO)   ","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEBKG.GWD_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEBKG.GWD_0.${seasonUC}.gif","KE Across GWD (BKG)   ","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KERAY.GWD_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KERAY.GWD_0.${seasonUC}.gif","KE Across Rayleigh Friction","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KETRB.TURBULENCE_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KETRB.TURBULENCE_0.${seasonUC}.gif","KE Across Turbulence","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KESRF.TURBULENCE_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KESRF.TURBULENCE_0.${seasonUC}.gif","KE Across Turbulence (SRF)","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEINT.TURBULENCE_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEINT.TURBULENCE_0.${seasonUC}.gif","KE Across Turbulence (INT)","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KETOP.TURBULENCE_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KETOP.TURBULENCE_0.${seasonUC}.gif","KE Across Turbulence (TOP)","blue");

      mk_link1 ("$year","$seasonUC","hdiag_KEMST.MOIST_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_KEMST.MOIST_0.${seasonUC}.gif","KE Across Moist Processes","blue");

$content = <<<EOF
  </ul>
   <ul>
EOF;
echo $content;

      mk_link1 ("$year","$seasonUC","hdiag_CONVKE.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_CONVKE.DYN_0.${seasonUC}.gif","CONV(KE)   ","blue");

      mk_link1 ("$year","$seasonUC","hdiag_CONVPHI.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_CONVPHI.DYN_0.${seasonUC}.gif","CONV(PHI) ","blue");

      mk_link1 ("$year","$seasonUC","hdiag_CONVCPT.DYN_z.${seasonUC}.gif","(z)","darkred");
      mk_link2 ("$year","$seasonUC","hdiag_CONVCPT.DYN_0.${seasonUC}.gif","CONV(CPT) ","blue");

$content = <<<EOF
  </ul>
EOF;
echo $content;

$content = <<<EOF


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

function mk_link1 ($year,$season,$filename,$text,$color) {

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

function mk_link2 ($year,$season,$filename,$text,$color) {

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
