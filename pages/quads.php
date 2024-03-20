<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/quads_verification.button" );
include( "../buttons/quads_type.button" );
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
$verificationUC = strtoupper($verification);
$verificationLC = strtolower($verification);
$verificationLC = $verification;

include("globals.php");

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
Quadratic Fields
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
set_verification( $verificationLC ) ;
$content = <<<EOF
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
EOF;
echo $content;

// set Quadratics Type Button
// --------------------------
set_quads_type( $type );
$content = <<<EOF
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
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
        var type         = form.type.selectedIndex ;
        window.location  = "quads.php?" 
                         + "&expid=$expid"
                         + "&verification=" + (form.verification.options[verification].value)
                         + "&year="         + (form.year.options[year].value)
                         + "&type="         + (form.type.options[type].value)
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

<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>

<tr>
   <th align=center                  > Field                     </th> 
   <th align=center bgcolor = #dddddd> V-INT                     </th>
   <th align=center                  >                           </th> 
   <th align=center bgcolor = #dddddd> Zonal <br> 1000-100 mb    </th> 
   <th align=center                  > Zonal <br> 1000-1 mb      </th> 
   <th align=center bgcolor = #dddddd>                           </th> 
   <th align=center                  > Horz <br> 850 mb          </th> 
   <th align=center bgcolor = #dddddd> Horz <br> 500 mb          </th> 
   <th align=center                  > Horz <br> 200 mb          </th> 
   <th align=center bgcolor = #dddddd> Horz <br>  20 mb          </th> 
</tr>

<tr>
   <th align=center > <font color=darkblue> Variance U-Wind </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_U_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif", ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_U_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_U_1.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_U${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_U${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_U${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_U${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Variance V-Wind </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_V_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif", ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_V_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_V_1.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_V${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_V${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_V${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_V${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Variance Kinetic Energy </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_KE_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif",  ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_KE_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_KE_1.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif",  "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_KE${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_KE${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_KE${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_KE${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Variance Temperature </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_T_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif", ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_T_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_T_1.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_T${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_T${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_T${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_T${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Variance Specific Humidity </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_QV_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_QV_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_QV${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_QV${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_QV${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_QV${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Variance Heights  </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_H_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif", ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_H_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_H_1.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_H${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_H${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_H${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_H${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Variance Omega </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_OMEGA_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Var_OMEGA_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_OMEGA${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_OMEGA${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_OMEGA${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Var_OMEGA${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Covariance (u v) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_U_V_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_U_V_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_U_V_1.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_U_V${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_U_V${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_U_V${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_U_V${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Covariance (v T) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_V_T_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif",   ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_V_T_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_V_T_1.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_V_T${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_V_T${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_V_T${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_V_T${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Covariance (v q) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_V_QV_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif",    ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_V_QV_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif",    ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_V_QV${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_V_QV${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_V_QV${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_V_QV${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Covariance (w T) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_OMEGA_T_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif",       ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_OMEGA_T_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif",       ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif"      , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_OMEGA_T${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_OMEGA_T${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_OMEGA_T${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_OMEGA_T${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> Covariance (w q) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_OMEGA_QV_vint.${seasonUC}.gif", "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif",        ""       );
      mk_link ("$year","$seasonUC","zonal_${verificationLC}_Cov_OMEGA_QV_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","zonal_${verificationLC}___dummy____${seasonUC}.gif",        ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}___dummy____${seasonUC}.gif"       , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_OMEGA_QV${type}_850.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_OMEGA_QV${type}_500.${seasonUC}.gif" , "#dddddd");
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_OMEGA_QV${type}_200.${seasonUC}.gif" , ""       );
      mk_link ("$year","$seasonUC","horiz_${verificationLC}_Cov_OMEGA_QV${type}_20.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
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

function mk_link ($year,$season,$filename,$color) {

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];
                                                    { $zref = "&nbsp;"; }
     if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''>        <img src=../check.jpg border=0> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''><img src=../check.jpg border=0> </a>"; }

     $content = <<<EOF
     <td align=center bgcolor = $color >
     $zref
    </td>
EOF;
echo $content;
return; }

?>
