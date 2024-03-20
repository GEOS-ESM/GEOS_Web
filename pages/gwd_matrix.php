<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/set_cmpexp.button" );
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
Gravity Wave Drag Matrix
</font> </H1>

<center>
<form name="myform">

<b>
<font color=darkblue>
&nbsp;
Year
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
Season
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
Comparison <br>
</font>
</b>

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

// set CMPEXP Button
// -----------------
set_cmpexp( $cmpexp );

$content = <<<EOF
</form>
</center>

<script language="javascript">
<!--
function leapto(form)
     {  var year         = form.year.selectedIndex ;
        var season       = form.season.selectedIndex ;
        var cmpexp       = form.cmpexp.selectedIndex ;
        window.location  = "gwd_matrix.php?"
                         + "&expid=$expid"
                         + "&year="         + (form.year.options[year].value)
                         + "&season="       + (form.season.options[season].value)
                         + "&cmpexp="       + (form.cmpexp.options[cmpexp].value); }
//-->
</script>
EOF;
echo $content;

if( $cmpexp == "none" ) { $cmpexp = ""; }
else                    { $cmpexp = "${cmpexp}_"; }

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
   <th align=center                  >  400 mb    </th> 
   <th align=center bgcolor = #dddddd>  300 mb    </th> 
   <th align=center                  >  200 mb    </th> 
   <th align=center bgcolor = #dddddd>  100 mb    </th> 
   <th align=center                  >   50 mb    </th> 
   <th align=center bgcolor = #dddddd>   10 mb    </th> 
   <th align=center                  >    5 mb    </th> 
   <th align=center bgcolor = #dddddd>    2 mb    </th> 
   <th align=center                  >    1 mb    </th> 
   <th align=center bgcolor = #dddddd>  0.4 mb    </th> 
   <th align=center                  >  0.2 mb    </th> 
   <th align=center bgcolor = #dddddd>  0.1 mb    </th> 
   <th align=center                  > 0.04 mb    </th> 
   <th align=center bgcolor = #dddddd> 0.02 mb    </th> 
</tr>

<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>

<tr>
   <th align=center > <font color=darkblue> DUDT (Total) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_z.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_400.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_300.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_200.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_50.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_10.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_5.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_2.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_1.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_.4.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_.2.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_.1.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_.04.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT.GWD_.02.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> DVDT (Total) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_z.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_400.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_300.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_200.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_50.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_10.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_5.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_2.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_1.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_.4.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_.2.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_.1.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_.04.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT.GWD_.02.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> DTDT (Total) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_z.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_400.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_300.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_200.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_50.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_10.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_5.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_2.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_1.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_.4.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_.2.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_.1.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_.04.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","TTMGW.GWD_.02.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>

<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>

<tr>
   <th align=center > <font color=darkblue> DUDT (BKG) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_z.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_400.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_300.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_200.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_50.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_10.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_5.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_2.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_1.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_.4.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_.2.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_.1.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_.04.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_BKG.GWD_.02.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> DVDT (BKG) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_z.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_400.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_300.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_200.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_50.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_10.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_5.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_2.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_1.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_.4.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_.2.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_.1.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_.04.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_BKG.GWD_.02.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> DTDT (BKG) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_z.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_400.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_300.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_200.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_50.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_10.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_5.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_2.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_1.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_.4.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_.2.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_.1.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_.04.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_BKG.GWD_.02.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>

<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>

<tr>
   <th align=center > <font color=darkblue> DUDT (ORO) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_z.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_400.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_300.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_200.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_50.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_10.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_5.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_2.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_1.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_.4.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_.2.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_.1.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_.04.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DUDT_ORO.GWD_.02.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> DVDT (ORO) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_z.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_400.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_300.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_200.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_50.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_10.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_5.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_2.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_1.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_.4.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_.2.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_.1.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_.04.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DVDT_ORO.GWD_.02.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>
 <tr>
   <th align=center > <font color=darkblue> DTDT (ORO) </font> </th> 
EOF;
echo $content;

      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_z.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_400.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_300.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_200.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_100.${seasonUC}.gif"  , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_50.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_10.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_5.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_2.${seasonUC}.gif"    , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_1.${seasonUC}.gif"    , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_.4.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_.2.${seasonUC}.gif"   , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_.1.${seasonUC}.gif"   , "#dddddd");
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_.04.${seasonUC}.gif"  , ""       );
      mk_link ("$year","$seasonUC","$cmpexp","DTDT_ORO.GWD_.02.${seasonUC}.gif"  , "#dddddd");

$content = <<<EOF
</tr>

<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>

</table>

<br> <br>
 <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>

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

function mk_link ($year,$season,$cmpexp,$diag,$color) {

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];

     $filename = "hdiag_${cmpexp}$diag" ;
                                                     { $zref = "&nbsp;"; }
     if (file_exists("$exppath/$year/$filename"))          { $zref = "<a href=$expurl/$year/$filename  target=''>        <img src=../check.jpg border=0> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename"))  { $zref = "<a href=$expurl/$year/$season/$filename  target=''><img src=../check.jpg border=0> </a>"; }

   $zbit   = exec( "echo $diag | cut -d'.' -f2 | grep -o '.$'" );

if($zbit  == "z"){
$filenode1 = exec( "echo $diag | cut -d'.' -f1" );
$filenode2 = exec( "echo $diag | cut -d'.' -f2" );
$filenode3 = exec( "echo $diag | cut -d'.' -f3" );
$filenode4 = exec( "echo $diag | cut -d'.' -f4" );

                      $filename2 = exec( "/bin/ls -1 $exppath/$year/hdiag_${cmpexp}${filenode1}.${filenode2}log*.${filenode3}.${filenode4}" );
     if (file_exists("$filename2"))         { $zref = "<a href=$filename2 target=''>        <img src=../check.jpg border=0> </a>"; }

                      $filename2 = exec( "/bin/ls -1 $exppath/$year/$season/hdiag_${cmpexp}${filenode1}.${filenode2}log*.${filenode3}.${filenode4}" );
     if (file_exists("$filename2"))         { $zref = "<a href=$filename2 target=''><img src=../check.jpg border=0> </a>"; }
}

     $content = <<<EOF
     <td align=center bgcolor = $color >
     $zref
    </td>
EOF;
echo $content;
return; }

?>
