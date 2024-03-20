<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/aerosol_verification.button" );
include( "../buttons/aerosol_math.button" );
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
$region       = urlencode($PARAM['region']);
$math         = urlencode($PARAM['math']);
$verification = urlencode($PARAM['verification']);
$closeness    = urlencode($PARAM['closeness']);

include("globals.php");

$seasonUC = strtoupper($season);
$seasonLC = strtolower($season);
$verificationUC = strtoupper($verification);
$verificationLC = strtolower($verification);
$verificationLC = $verification;

    $verbose =  "0";
if( $verbose == "1" ) {
  print "<br>";
  print "<br>";
  print "Year:  <b> $year </b> <br>";
  print "Season: <b> $season </b> <br>";
  print "Field: <b> $field </b> <br>";
  print "Verification: <b> $verification </b> <br>";
  print "Filename: <b> $filename </b> <br>";
}

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
Aerosol 2D-Fields
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
        var math         = form.math.selectedIndex ;
        var verification = form.verification.selectedIndex ;
        var closeness    = form.closeness.selectedIndex ;
        window.location  = "aerosols_2d.php?" 
                         + "&expid=$expid"
                         + "&verification=" + (form.verification.options[verification].value)
                         + "&closeness="    + (form.closeness.options[closeness].value)
                         + "&math="         + (form.math.options[math].value)
                         + "&year="         + (form.year.options[year].value)
                         + "&season="       + (form.season.options[season].value); }
</script>
EOF;
echo $content;

// **********************************************************************************
// Create HEADING Table
// **********************************************************************************

$content = <<<EOF
<center>
<table cellspacing=1 cellpadding=3 border=2 bordercolor=#497fbf width=65%>
<font color=darkblue>
EOF;
echo $content;

// First Row:  Headings
// --------------------
$content = <<<EOF
<tr>
   <th align=center bgcolor = #edf6ff> Year </th>
   <th align=center bgcolor = #edf6ff> Season </th>
   <th align=center bgcolor = #edf6ff> <font color=darkblue>Comparison </font> &nbsp; / &nbsp; <font color=green>Closeness </font> </th>
   <th align=center bgcolor = #edf6ff> Type </th>
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

// set MATH Button
// -----------------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_math( $math );
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



                               $mathflag = "${math}_";
      if($math == "LINEAR" ) { $mathflag = ""        ; }

// **********************************************************************************
// ***************                         Total                          ***********
// **********************************************************************************

$content = <<<EOF
<center>
<br>
<H3 align=center >
<font> Total </font> </H3>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf >
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "TOTEXTTAU"  , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "TOTSCATAU"  , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "TOTANGSTR"  , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr>
</table>
EOF;
echo $content;


// **********************************************************************************
// ***************                     Dust Contents                      ***********
// **********************************************************************************

$content = <<<EOF
<center>
<br>
<H3 align=center >
<font> Dust </font> </H3>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf >
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "TDUST"      , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; } 
      mk_link ("$year","$season", "TTAUDU"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUFLUXU"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUFLUXV"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUANGSTR"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "DUSMASS"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSMASS25"  , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUCMASS"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUCMASS25"  , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSCAT25"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "DUEXTTAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUEXTTFM"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSCATAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSCATFM"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUEXTT25"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "DUEM001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUEM002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUEM003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUEM004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUEM005"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "DUSD001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSD002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSD003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSD004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSD005"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "DUWT001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUWT002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUWT003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUWT004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUWT005"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "DUDP001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUDP002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUDP003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUDP004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUDP005"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "DUSV001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSV002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSV003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSV004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DUSV005"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr>
</table>

EOF;
echo $content;

// **********************************************************************************
// ***************                     SALT Contents                      ***********
// **********************************************************************************

$content = <<<EOF
<center>
<br>
<H3 align=center >
<font> Salt </font> </H3>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf >
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "TSALT"      , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; } 
      mk_link ("$year","$season", "TTAUSS"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSFLUXU"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSFLUXV"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSANGSTR"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SSSMASS"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSMASS25"  , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSCMASS"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSCMASS25"  , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSCAT25"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SSEXTTAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSEXTTFM"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSCATAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSCATFM"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSEXTT25"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SSEM001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSEM002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSEM003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSEM004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSEM005"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SSSD001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSD002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSD003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSD004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSD005"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SSWT001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSWT002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSWT003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSWT004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSWT005"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SSDP001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSDP002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSDP003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSDP004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSDP005"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SSSV001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSV002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSV003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSV004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SSSV005"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr>
</table>

EOF;
echo $content;

// **********************************************************************************
// ***************                   SULFATE Contents                     ***********
// **********************************************************************************

$content = <<<EOF
<center>
<br>
<H3 align=center >
<font> Sulfates </font> </H3>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf >
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "TSO4"       , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; } 
      mk_link ("$year","$season", "TTAUSO"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUFLUXU"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUFLUXV"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUANGSTR"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SO2SMASS"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SO2CMASS"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SO4SMASS"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SO4CMASS"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUPMSA"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SO2EMAN"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SO4EMAN"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SO2EMBB"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SO2EMVE"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SO2EMVN"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SUEXTTAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUSCATAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUPSO4AQ"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUPSO4G"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUPSO4WT"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SUEM001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUEM002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUEM003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUEM004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DMSSMASS"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SUWT001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUWT002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUWT003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUWT004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "DMSCMASS"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SUDP001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUDP002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUDP003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUDP004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUPSO2"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "SUSV001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUSV002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUSV003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "SUSV004"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr>
</table>

EOF;
echo $content;

// **********************************************************************************
// ***************                     Black Carbon                       ***********
// **********************************************************************************

$content = <<<EOF
<center>
<br>
<H3 align=center >
<font> Black Carbon </font> </H3>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf >
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "TBC"        , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; } 
      mk_link ("$year","$season", "TTAUBC"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCFLUXU"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCFLUXV"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCANGSTR"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "BCSMASS"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCCMASS"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCEMBB"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCEMBF"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCEMAN"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "BCEXTTAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCSCATAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCHYPHIL"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCDP001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCDP002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "BCEM001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCEM002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCWT001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCWT002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "BCSV001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BCSV002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr>
</table>

EOF;
echo $content;

// **********************************************************************************
// ***************                     Brown Carbon                       ***********
// **********************************************************************************

$content = <<<EOF
<center>
<br>
<H3 align=center >
<font> Brown Carbon </font> </H3>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf >
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "TBR"        , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; } 
      mk_link ("$year","$season", "TTAUBR"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BRFLUXU"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BRFLUXV"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BRANGSTR"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "BRSMASS"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BRCMASS"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BREMBB"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BREMBF"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BREMAN"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "BREXTTAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BRSCATAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BRHYPHIL"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BRDP001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BRDP002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "BREM001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BREM002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BRWT001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BRWT002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "BRSV001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "BRSV002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr>
</table>

EOF;
echo $content;

// **********************************************************************************
// ***************                   Organic Carbon                       ***********
// **********************************************************************************

$content = <<<EOF
<center>
<br>
<H3 align=center >
<font> Organic Carbon </font> </H3>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf >
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "TOC"        , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; } 
      mk_link ("$year","$season", "TTAUOC"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCFLUXU"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCFLUXV"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCANGSTR"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "OCSMASS"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCCMASS"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCEMBB"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCEMBF"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCEMAN"     , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "OCEXTTAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCSCATAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCHYPHIL"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCDP001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCDP002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "OCEM001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCEM002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCWT001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCWT002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "OCSV001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "OCSV002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr>
</table>

EOF;
echo $content;

// **********************************************************************************
// ***************                   NITRATE Contents                     ***********
// **********************************************************************************

$content = <<<EOF
<center>
<br>
<H3 align=center >
<font> Nitrates </font> </H3>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf >
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; } 
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NIFLUXU"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NIFLUXV"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NIANGSTR"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "NH3SMASS"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NH3CMASS"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NH4SMASS"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NH4CMASS"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "HNO3SMASS"  , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "HNO3CMASS"  , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NICMASS"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NICMASS25"  , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "NISV001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NISV002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NISV003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "NIEXTTAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NISCATAU"   , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "NH3EM"      , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NH3DP"      , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NH3SV"      , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NH3WT"      , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "NH4SD"      , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NH4DP"      , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NH4SV"      , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NH4WT"      , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "NIWT001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NIWT002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NIWT003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "NIDP001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NIDP002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NIDP003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr> <tr>
EOF;
echo $content;

$k = "0";

      mk_link ("$year","$season", "NISV001"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NISV002"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", "NISV003"    , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }
      mk_link ("$year","$season", ""           , "$mathflag" , "$verificationLC" , "$closeness" , "$k");  $k = $k + 1; if( $k == 2 ) { $k = 0; }

$content = <<<EOF
</tr>
</table>

EOF;
echo $content;

// **********************************************************************************
// **********************************************************************************

$content = <<<EOF
</tr>
</table>

<br> <br>
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

function mk_link ($year,$season,$field,$mathflag,$verification,$closeness,$color) {

     if($color == "0"    ) { $color  = "";        }
     if($color == "1"    ) { $color  = "#dddddd"; }

                           { $fieldz = "(z)";     }
     if($field == ""     ) { $fieldz = "";        }
 
     if( $closeness == "none" ) { $filename = "${field}_${mathflag}${verification}.$season.gif";                        $fcolor = "blue" ; }
     else                       { $filename = "${field}_${mathflag}${closeness}_closeness_${verification}.$season.gif"; $fcolor = "green"; }

//                                                  { $filename  = "${field}_$mathflag$verification.$season.gif"; } 
                                                    { $filenamez = "${field}_z_$mathflag$verification.$season.gif"; } 

                                                     { $zrefz = "<font color=grey> $fieldz </font>"; } 
                                                     { $zref  = "<font color=grey> $field  </font>"; } 

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];

     if (file_exists("$exppath/$year/$filenamez"))         { $zrefz = "<a href=$expurl/$year/$filenamez         target=''> <font color=darkred> (z) </font> </a>"; } 
     if (file_exists("$exppath/$year/$season/$filenamez")) { $zrefz = "<a href=$expurl/$year/$season/$filenamez target=''> <font color=darkred> (z) </font> </a>"; } 

     if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''>         <font color=${fcolor}> $field </a>"; } 
     if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''> <font color=${fcolor}> $field </a>"; } 

     $content = <<<EOF
     <td align=right bgcolor="$color" width=120 >
     $zref $zrefz
    </td>
EOF;
echo $content;

return; }

?>
