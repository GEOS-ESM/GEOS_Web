<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/set_cmpexp.button" );
include( "../buttons/closeness.button" );
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
$cmpexp       = urlencode($PARAM['cmpexp']);
$closeness    = urlencode($PARAM['closeness']);

include("globals.php");

$seasonUC = strtoupper($season);
$seasonLC = strtolower($season);

// **********************************************************************************
// ***************                Page Header and Buttons                 ***********
// **********************************************************************************

$content = <<<EOF

 <title>
 $expid
</title>

<H1 align=center >
<font color=darkred>
EXPID: &nbsp; <a href="../index.php" style="text-decoration: none"> <font color=darkred> $expid </font> </a> <br>
Moist Processes Matrix
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
        var cmpexp       = form.cmpexp.selectedIndex ;
        var closeness    = form.closeness.selectedIndex ;
        window.location  = "moist_matrix.php?"
                         + "&expid=$expid"
                         + "&year="         + (form.year.options[year].value)
                         + "&closeness="    + (form.closeness.options[closeness].value)
                         + "&season="       + (form.season.options[season].value)
                         + "&cmpexp="       + (form.cmpexp.options[cmpexp].value); }
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
   <th align=center bgcolor = #edf6ff> <font color=darkred> Comparison </font> <img src=../check.jpg border=0> &nbsp; / &nbsp; <font color=darkgreen> Closeness </font> <img src=../green_check.jpg border=0> </th>
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
set_cmpexp( $cmpexp );
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

//if( $cmpexp == "none" ) { $cmpexp = ""; }
//else                    { $cmpexp = "${cmpexp}_"; }

    $verbose =  "0";
if( $verbose == "1" ) {
  print "<br>";
  print "<br>";
  print "YEAR: $year <br>";
  print "SEASON: $season <br>";
  print "EXP1: $cmpexp <br>"; }

// **********************************************************************************
// ***************                     Page Contents                      ***********
// **********************************************************************************

$content = <<<EOF
<center>
<br>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>
<tr>
   <th align=center                  > Field      </th> 
   <th align=center bgcolor = #dddddd> Zonal Mean </th>
   <th align=center                  > 1000 mb    </th> 
   <th align=center bgcolor = #dddddd>  975 mb    </th> 
   <th align=center                  >  950 mb    </th> 
   <th align=center bgcolor = #dddddd>  925 mb    </th> 
   <th align=center                  >  900 mb    </th> 
   <th align=center bgcolor = #dddddd>  850 mb    </th> 
   <th align=center                  >  800 mb    </th> 
   <th align=center bgcolor = #dddddd>  750 mb    </th> 
   <th align=center                  >  700 mb    </th> 
   <th align=center bgcolor = #dddddd>  650 mb    </th> 
   <th align=center                  >  600 mb    </th> 
   <th align=center bgcolor = #dddddd>  550 mb    </th> 
   <th align=center                  >  500 mb    </th> 
   <th align=center bgcolor = #dddddd>  450 mb    </th> 
   <th align=center                  >  400 mb    </th>
   <th align=center bgcolor = #dddddd>  350 mb    </th>
   <th align=center                  >  300 mb    </th>
   <th align=center bgcolor = #dddddd>  250 mb    </th>
   <th align=center                  >  200 mb    </th>
   <th align=center bgcolor = #dddddd>  150 mb    </th>
   <th align=center                  >  100 mb    </th>
</tr>

<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>

<tr>
   <th align=center > <font color=darkblue> QL (Liquid)    </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLTOT.AGCM_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> QI (Ice)        </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","QITOT.AGCM_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QITOT.AGCM_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> QL_LS </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","QLLS.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLLS.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> QL_CN </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","QLCN.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QLCN.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> QI_LS </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","QILS.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","QILS.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QILS.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QILS.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QILS.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QILS.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QILS.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QILS.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QILS.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QILS.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QILS.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QILS.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QILS.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QILS.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QILS.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QILS.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QILS.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QILS.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QILS.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QILS.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QILS.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QILS.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> QI_CN </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","QICN.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","QICN.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QICN.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QICN.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QICN.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QICN.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QICN.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QICN.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QICN.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QICN.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QICN.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QICN.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QICN.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QICN.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QICN.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QICN.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QICN.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QICN.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QICN.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QICN.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","QICN.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","QICN.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> CL_LS </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","CLLS.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLLS.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> CL_CN </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","CLCN.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CLCN.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> RL (Liquid)    </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","RL.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","RL.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RL.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RL.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RL.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RL.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RL.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RL.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RL.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RL.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RL.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RL.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RL.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RL.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RL.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RL.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RL.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RL.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RL.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RL.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RL.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RL.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> RI (Ice)        </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","RI.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","RI.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RI.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RI.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RI.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RI.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RI.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RI.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RI.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RI.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RI.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RI.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RI.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RI.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RI.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RI.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RI.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RI.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RI.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RI.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RI.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RI.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> CNV_MF0      </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MF0.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> CNV_MFD      </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFD.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> CNV_MFC      </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","CNV_MFC.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> REV_CN       </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_CN.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> REV_AN       </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_AN.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> REV_LS       </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","REV_LS.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> RSU_CN       </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_CN.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> RSU_AN       </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_AN.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> RSU_LS       </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","RSU_LS.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> FCLD         </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","FCLD.MOIST_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","FCLD.MOIST_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> TAUIR        </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUIR.IRRAD_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> TAUCLI       </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLI.SOLAR_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> TAUCLW       </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","TAUCLW.SOLAR_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> OMEGA        </font> </th> 
EOF;
echo $content;

      mk_link3 ("$year","$seasonUC","OMEGA.DYN_z"   ,$cmpexp,"none"    ,"#dddddd");
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_1000",$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_975" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_950" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_925" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_900" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_850" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_800" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_750" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_700" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_650" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_600" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_550" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_500" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_450" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_400" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_350" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_300" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_250" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_200" ,$cmpexp,$closeness,""       );
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_150" ,$cmpexp,$closeness,"#dddddd");
      mk_link3 ("$year","$seasonUC","OMEGA.DYN_100" ,$cmpexp,$closeness,""       );

$content = <<<EOF
</tr>
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
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

function mk_link3 ($year,$season,$name,$verification,$closeness,$color) {

   if( $closeness == "none" ) { $check = "../check.jpg";   }
   else                       { $check = "../green_check.jpg"; }

   if( $closeness == "none" ) { $filename = "hdiag_${verification}_${name}.${season}.gif"; }
   else                       { $filename = "hdiag_${closeness}_${name}_closeness_${verification}.${season}.gif"; }

   if( $closeness == "none" & $verification == "none" ) { $filename = "hdiag_${name}.${season}.gif"; }

if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "NAME: <b> $name </b> <br>";
   print "GCs: <b> $gc </b> <br>";
   print "VERIFICATION: <b> $verification </b> <br>";
   print "CLOSENESS: <b> $closeness </b> <br>";
   print "FILENAME: <b> $filename </b> <br>"; }

   $exppath=$GLOBALS["exppath"];
   $expurl=$GLOBALS["expurl"];

                                                  { $zref = "&nbsp;"; } 
   if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''>        <img src=$check border=0> </a>"; } 
   if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''><img src=$check border=0> </a>"; } 

   $content = <<<EOF
   <td align=center bgcolor = $color >
   $zref
  </td>
EOF;
echo $content;
return; }

?>
