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

$seasonUC = strtoupper($season);
$seasonLC = strtolower($season);

include("globals.php");

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
Tendency Matrix
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
        window.location  = "tendency.php?"
                         + "&expid=$expid"
                         + "&year="         + (form.year.options[year].value)
                         + "&season="       + (form.season.options[season].value)
                         + "&closeness="    + (form.closeness.options[closeness].value)
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

    $verbose =  "0";
if( $verbose == "1" ) {
  print "<br>";
  print "<br>";
  print "YEAR: $year <br>";
  print "SEASON: $season <br>";
  print "CMPEXP: $cmpexp <br>"; }

// =====================================================================================
// =====================================================================================

 $levels = array( 1000 , 975 , 950 , 925 , 900 , 875 , 850 , 825 , 800 , 775 , 750 , 
                   725 , 700 , 650 , 600 , 550 , 500 , 450 , 400 , 350 , 300 , 250 , 
                   200 , 150 , 125 , 100 ,  85 ,  70 ,  60 ,  50 ,  40 ,  30 ,  20 , 
                    15 ,  10 ,   7 ,   5 ,   4 ,   3 ,   2 ,   1 , 0.7 , 0.5 , 0.4 , 
                   0.3 , 0.2 , 0.1 );


// ==================================================================================================
// =====   DYNAMICS:  Construct Level Headings based on scanning ALL Landscape and Portrait Fields
// ==================================================================================================

 $fields = array( "DUDTDYN.DYN",
                  "DVDTDYN.DYN",
                  "DTDTDYN.DYN",
                  "DQVDTDYN.DYN",
                  "OMEGA.DYN" );

$content = <<<EOF
<center>
<br>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>
<tr>
   <th align=center                  > Field                  </th>
   <th align=center bgcolor = #dddddd> Zonal <br>  Linear/Log </th>
EOF;
echo $content;

     $color = "";
// Scan over Levels
// ----------------
foreach( $levels as $level )
 {
    $flag  = "false";
    // Scan over Fields
    // ----------------
    foreach( $fields as $field )
     { if( $cmpexp == "none" ) { $file = "hdiag_${field}_${level}.${season}.gif"; }
       else                    { $file = "hdiag_${cmpexp}_${field}_${level}.${season}.gif"; }
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
     }

       // Create Link if Plot Exists
       // --------------------------
       if( $flag == "true" )
       {
$content = <<<EOF
   <th align=center bgcolor = ${color}> ${level} mb </th>
EOF;
echo $content;
       if( "$color" == "#dddddd" ) { $color = "";        }
       else                        { $color = "#dddddd"; }
       }
 }

$content = <<<EOF
</tr>
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
EOF;
echo $content;

     mk_entry3 ("DuDT Dynamics","DUDTDYN.DYN" ,$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DvDT Dynamics","DVDTDYN.DYN" ,$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DTDT Dynamics","DTDTDYN.DYN" ,$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DqDT Dynamics","DQVDTDYN.DYN",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("OMEGA",        "OMEGA.DYN",   $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);

$content = <<<EOF
</tr>
</table>
<br>
EOF;
echo $content;

// ==================================================================================================
// =====    MOIST:  Construct Level Headings based on scanning ALL Landscape and Portrait Fields
// ==================================================================================================

 $fields = array( "DUDT.MOIST",
                  "DVDT.MOIST",
                  "TIM.PHYSICS",
                  "DQDT.MOIST",
                  "DQLDT.MOIST",
                  "DQIDT.MOIST",
                  "DTDTFRIC.MOIST" );

$content = <<<EOF
<center>
<br>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>
<tr>
   <th align=center                  > Field                  </th>
   <th align=center bgcolor = #dddddd> Zonal <br>  Linear/Log </th>
EOF;
echo $content;

     $color = "";
// Scan over Levels
// ----------------
foreach( $levels as $level )
 {
    $flag  = "false";
    // Scan over Fields
    // ----------------
    foreach( $fields as $field )
     { if( $cmpexp == "none" ) { $file = "hdiag_${field}_${level}.${season}.gif"; }
       else                    { $file = "hdiag_${cmpexp}_${field}_${level}.${season}.gif"; }
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
     }

       // Create Link if Plot Exists
       // --------------------------
       if( $flag == "true" )
       {
$content = <<<EOF
   <th align=center bgcolor = ${color}> ${level} mb </th>
EOF;
echo $content;
       if( "$color" == "#dddddd" ) { $color = "";        }
       else                        { $color = "#dddddd"; }
       }
 }

$content = <<<EOF
</tr>
EOF;
echo $content;

     mk_entry3 ("DuDT Moist", "DUDT.MOIST",    $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DvDT Moist", "DVDT.MOIST",    $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DTDT Moist", "TIM.PHYSICS",   $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DqDT Moist", "DQDT.MOIST",    $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DqlDT Moist","DQLDT.MOIST",   $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DqiDT Moist","DQIDT.MOIST",   $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DTDT FRIC",  "DTDTFRIC.MOIST",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);

$content = <<<EOF
</tr>
</table>
<br>
EOF;
echo $content;

// ==================================================================================================
// =====    TURB:  Construct Level Headings based on scanning ALL Landscape and Portrait Fields
// ==================================================================================================

 $fields = array( "UIT.PHYSICS",
                  "VIT.PHYSICS",
                  "TIT.PHYSICS",
                  "QVIT.PHYSICS" );

$content = <<<EOF
<center>
<br>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>
<tr>
   <th align=center                  > Field                  </th>
   <th align=center bgcolor = #dddddd> Zonal <br>  Linear/Log </th>
EOF;
echo $content;

     $color = "";
// Scan over Levels
// ----------------
foreach( $levels as $level )
 {
    $flag  = "false";
    // Scan over Fields
    // ----------------
    foreach( $fields as $field )
     { if( $cmpexp == "none" ) { $file = "hdiag_${field}_${level}.${season}.gif"; }
       else                    { $file = "hdiag_${cmpexp}_${field}_${level}.${season}.gif"; }
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
     }

       // Create Link if Plot Exists
       // --------------------------
       if( $flag == "true" )
       {
$content = <<<EOF
   <th align=center bgcolor = ${color}> ${level} mb </th>
EOF;
echo $content;
       if( "$color" == "#dddddd" ) { $color = "";        }
       else                        { $color = "#dddddd"; }
       }
 }

$content = <<<EOF
</tr>
EOF;
echo $content;

     mk_entry3 ("DuDT Turbulence", "UIT.PHYSICS",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DvDT Turbulence", "VIT.PHYSICS",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DTDT Turbulence", "TIT.PHYSICS",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DqDT Turbulence","QVIT.PHYSICS",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);

$content = <<<EOF
</tr>
</table>
<br>
EOF;
echo $content;


// ==================================================================================================
// =====   RADIATION:  Construct Level Headings based on scanning ALL Landscape and Portrait Fields
// ==================================================================================================

 $fields = array( "RADSW.RADIATION",
                  "RADLW.RADIATION",
                  "DTDTRAD.RADIATION" );

$content = <<<EOF
<center>
<br>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>
<tr>
   <th align=center                  > Field                  </th>
   <th align=center bgcolor = #dddddd> Zonal <br>  Linear/Log </th>
EOF;
echo $content;

     $color = "";
// Scan over Levels
// ----------------
foreach( $levels as $level )
 {
    $flag  = "false";
    // Scan over Fields
    // ----------------
    foreach( $fields as $field )
     { if( $cmpexp == "none" ) { $file = "hdiag_${field}_${level}.${season}.gif"; }
       else                    { $file = "hdiag_${cmpexp}_${field}_${level}.${season}.gif"; }
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
     }

       // Create Link if Plot Exists
       // --------------------------
       if( $flag == "true" )
       {
$content = <<<EOF
   <th align=center bgcolor = ${color}> ${level} mb </th>
EOF;
echo $content;
       if( "$color" == "#dddddd" ) { $color = "";        }
       else                        { $color = "#dddddd"; }
       }
 }

$content = <<<EOF
</tr>
EOF;
echo $content;

     mk_entry3 ("DTDT Shortwave",   "RADSW.RADIATION",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DTDT Longwave",    "RADLW.RADIATION",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DTDT Short+Long","DTDTRAD.RADIATION",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);

$content = <<<EOF
</tr>
</table>
<br>
EOF;
echo $content;

// ======================================================================================================
// =====  TOTAL PHYSICS:  Construct Level Headings based on scanning ALL Landscape and Portrait Fields
// ======================================================================================================

 $fields = array( "DUDTPHY.MOIST",
                  "DVDTPHY.MOIST",
                  "DTDTPHY.PHYSICS",
                  "DQDTPHY.MOIST" );

$content = <<<EOF
<center>
<br>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>
<tr>
   <th align=center                  > Field                  </th>
   <th align=center bgcolor = #dddddd> Zonal <br>  Linear/Log </th>
EOF;
echo $content;

     $color = "";
// Scan over Levels
// ----------------
foreach( $levels as $level )
 {
    $flag  = "false";
    // Scan over Fields
    // ----------------
    foreach( $fields as $field )
     { if( $cmpexp == "none" ) { $file = "hdiag_${field}_${level}.${season}.gif"; }
       else                    { $file = "hdiag_${cmpexp}_${field}_${level}.${season}.gif"; }
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
     }

       // Create Link if Plot Exists
       // --------------------------
       if( $flag == "true" )
       {
$content = <<<EOF
   <th align=center bgcolor = ${color}> ${level} mb </th>
EOF;
echo $content;
       if( "$color" == "#dddddd" ) { $color = "";        }
       else                        { $color = "#dddddd"; }
       }
 }

$content = <<<EOF
</tr>
EOF;
echo $content;

     mk_entry3 ("DuDT Physics","DUDTPHY.MOIST",  $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DvDT Physics","DVDTPHY.MOIST",  $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DTDT Physics","DTDTPHY.PHYSICS",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DqDT Physics","DQDTPHY.MOIST",  $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);

$content = <<<EOF
</tr>
</table>
<br>
EOF;
echo $content;

// ===========================================================================================================================
// =====  Total AGCM (Dynamics + Physics):  Construct Level Headings based on scanning ALL Landscape and Portrait Fields  ====
// ===========================================================================================================================

 $fields = array( "DUDTTOT.MOIST",
                  "DVDTTOT.MOIST",
                  "DTDTTOT.PHYSICS",
                  "DQDTTOT.MOIST" );

$content = <<<EOF
<center>
<br>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>
<tr>
   <th align=center                  > Field                  </th>
   <th align=center bgcolor = #dddddd> Zonal <br>  Linear/Log </th>
EOF;
echo $content;

     $color = "";
// Scan over Levels
// ----------------
foreach( $levels as $level )
 {
    $flag  = "false";
    // Scan over Fields
    // ----------------
    foreach( $fields as $field )
     { if( $cmpexp == "none" ) { $file = "hdiag_${field}_${level}.${season}.gif"; }
       else                    { $file = "hdiag_${cmpexp}_${field}_${level}.${season}.gif"; }
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
     }

       // Create Link if Plot Exists
       // --------------------------
       if( $flag == "true" )
       {
$content = <<<EOF
   <th align=center bgcolor = ${color}> ${level} mb </th>
EOF;
echo $content;
       if( "$color" == "#dddddd" ) { $color = "";        }
       else                        { $color = "#dddddd"; }
       }
 }

$content = <<<EOF
</tr>
EOF;
echo $content;

     mk_entry3 ("DuDT Total","DUDTTOT.MOIST",  $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DvDT Total","DVDTTOT.MOIST",  $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DTDT Total","DTDTTOT.PHYSICS",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DqDT Total","DQDTTOT.MOIST",  $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);

$content = <<<EOF
</tr>
</table>
<br>
EOF;
echo $content;

// =======================================================================================================
// =====    ANALYSIS: Construct Level Headings based on scanning ALL Landscape and Portrait Fields    ====
// =======================================================================================================

 $fields = array( "DUDT_ANA.AGCM",
                  "DVDT_ANA.AGCM",
                  "DTDT_ANA.AGCM",
                  "DQVDT_ANA.AGCM",
                  "DQVDT_CON.AGCM" );

$content = <<<EOF
<center>
<br>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>
<tr>
   <th align=center                  > Field                  </th>
   <th align=center bgcolor = #dddddd> Zonal <br>  Linear/Log </th>
EOF;
echo $content;

     $color = "";
// Scan over Levels
// ----------------
foreach( $levels as $level )
 {
    $flag  = "false";
    // Scan over Fields
    // ----------------
    foreach( $fields as $field )
     { if( $cmpexp == "none" ) { $file = "hdiag_${field}_${level}.${season}.gif"; }
       else                    { $file = "hdiag_${cmpexp}_${field}_${level}.${season}.gif"; }
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
     }

       // Create Link if Plot Exists
       // --------------------------
       if( $flag == "true" )
       {
$content = <<<EOF
   <th align=center bgcolor = ${color}> ${level} mb </th>
EOF;
echo $content;
       if( "$color" == "#dddddd" ) { $color = "";        }
       else                        { $color = "#dddddd"; }
       }
 }

$content = <<<EOF
</tr>
EOF;
echo $content;

     mk_entry3 ("DuDT Analysis",  "DUDT_ANA.AGCM", $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DvDT Analysis",  "DVDT_ANA.AGCM", $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DTDT Analysis",  "DTDT_ANA.AGCM", $fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DqDT Analysis"  ,"DQVDT_ANA.AGCM",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);
     mk_entry3 ("DqDT Constraint","DQVDT_CON.AGCM",$fields,$levels,$year,$seasonUC,$cmpexp,$closeness);

$content = <<<EOF
</tr>
</table>
<br>
EOF;
echo $content;

// **********************************************************************************
// ***************                   End Page Contents                    ***********
// **********************************************************************************

$content = <<<EOF
<br> <br>
 <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (Experiment $expid) </b> </li>
</ul>
</center>

</form>
EOF;
echo $content;
return; 

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

  function mk_entry3 ($heading,$name,$fields,$levels,$year,$season,$cmpexp,$closeness) {

$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> $heading </font> </th>
EOF;
echo $content;

//  Fill Zonal Mean Link
//  --------------------
    mk_link_3a("$year","$season","${name}","z",$cmpexp, $closeness, "#dddddd");

$color = "";

$exppath=$GLOBALS["exppath"];
$expurl=$GLOBALS["expurl"];

foreach( $levels as $level )
 {
    $flag  = "false";
    // Scan over Fields
    // ----------------
    foreach( $fields as $field )
     { if( $cmpexp == "none" ) { $file = "hdiag_${field}_${level}.${season}.gif"; }
       else                    { $file = "hdiag_${cmpexp}_${field}_${level}.${season}.gif"; }
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
     }

    // Fill Horizontal Level Link
    // --------------------------
    if( $flag == "true" ) 
    { mk_link_3b ("$year","$season","${name}","${level}",$cmpexp,$closeness,$color);
      if( "$color" == "#dddddd" | "$color" == "#d5eae9" ) { $color = "";        }
      else                                                { $color = "#dddddd"; }
    }
 }

return; }


// =====================================================================================
// =====================================================================================

function mk_link_3a ($year,$season,$name,$level,$cmpexp,$closeness,$color) {

     if( $closeness == "none" ) { $check = "../check.jpg";   }
     else                       { $check = "../green_check.jpg"; }


     if( $cmpexp == "none" ) { $cmpexp = ""; }
     else                    { if( $closeness == "none" ) { $cmpexp = "${cmpexp}_"; }
                               else                       { $cmpexp = "${cmpexp}" ; } }


     if( $closeness == "none" ) { $filename  = "hdiag_${cmpexp}${name}_${level}";
                                  $filename1 = "${filename}.$season.gif";
                                  $filename2 = "${filename}30.$season.gif";
                                  $filename3 = "${filename}log30.$season.gif";
                                  $filename4 = "${filename}log10.$season.gif";
                                  $filename5 = "${filename}log.$season.gif";
                                  $filename6 = "${filename}log0.1.$season.gif"; }

     else                       { $filename  = "hdiag_${closeness}_${name}_${level}";
                                  $filename1 = "${filename}_closeness_${cmpexp}.$season.gif";
                                  $filename2 = "${filename}30_closeness_${cmpexp}.$season.gif";
                                  $filename3 = "${filename}log30_closeness_${cmpexp}.$season.gif";
                                  $filename4 = "${filename}log10_closeness_${cmpexp}.$season.gif";
                                  $filename5 = "${filename}log_closeness_${cmpexp}.$season.gif";
                                  $filename6 = "${filename}log0.1_closeness_${cmpexp}.$season.gif"; }


    $verbose  = 0;
if( $verbose != 0)
  { print "filename : <b> $filename  </b> <br>";
    print "filename1: <b> $filename1 </b> <br>";
    print "filename2: <b> $filename2 </b> <br>";
    print "filename3: <b> $filename3 </b> <br>";
    print "filename4: <b> $filename4 </b> <br>";
    print "filename5: <b> $filename5 </b> <br>";
    print "filename6: <b> $filename6 </b> <br>"; }

$exppath=$GLOBALS["exppath"];
$expurl=$GLOBALS["expurl"];

                                                     { $zref1 = "&nbsp;"; }
     if (file_exists("$exppath/$year/$filename1"))         { $zref1 = "<a href=$expurl/$year/$filename1         target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename1")) { $zref1 = "<a href=$expurl/$year/$season/$filename1 target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }
     if (file_exists("$exppath/$year/$filename2"))         { $zref1 = "<a href=$expurl/$year/$filename2         target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename2")) { $zref1 = "<a href=$expurl/$year/$season/$filename2 target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }

                                                     { $zref2 = "&nbsp;"; }
     if (file_exists("$exppath/$year/$filename3"))         { $zref2 = "<a href=$expurl/$year/$filename3         target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename3")) { $zref2 = "<a href=$expurl/$year/$season/$filename3 target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }

                                                     { $zref3 = "&nbsp;"; }
     if (file_exists("$exppath/$year/$filename4"))         { $zref3 = "<a href=$expurl/$year/$filename4         target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename4")) { $zref3 = "<a href=$expurl/$year/$season/$filename4 target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }

                                                     { $zref4 = "&nbsp;"; }
     if (file_exists("$exppath/$year/$filename5"))         { $zref4 = "<a href=$expurl/$year/$filename5         target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename5")) { $zref4 = "<a href=$expurl/$year/$season/$filename5 target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }

                                                     { $zref5 = "&nbsp;"; }
     if (file_exists("$exppath/$year/$filename6"))         { $zref5 = "<a href=$expurl/$year/$filename6         target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename6")) { $zref5 = "<a href=$expurl/$year/$season/$filename6 target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }

                      $zref = $zref1 ;
     $plots = array( "zref2", "zref3", "zref4", "zref5" );
      foreach( $plots as $plot )
             { if( ${$plot} != "&nbsp;" )
                                        { if( $zref != "&nbsp;" ) { $zref = "$zref &nbsp;/&nbsp; ${$plot}"; }
                                          else                    { $zref = "${$plot}"; }
                                        }
             }

     $content = <<<EOF
     <td align=center bgcolor = $color >
     $zref
    </td>
EOF;
echo $content;
return; }

// =====================================================================================
// =====================================================================================

function mk_link_3b ($year,$season,$name,$level,$cmpexp,$closeness,$color) {

   if( $closeness == "none" ) { $check = "../check.jpg";   }
   else                       { $check = "../green_check.jpg"; }


   if( $cmpexp == "none" ) { $cmpexp = ""; }
// else                    { $cmpexp = "${cmpexp}_"; }

   if( $closeness == "none" ) { $filename = "hdiag_${cmpexp}_${name}_${level}.${season}.gif"; }
   else                       { $filename = "hdiag_${closeness}_${name}_${level}_closeness_${cmpexp}.${season}.gif"; }

   if( $closeness == "none" & $cmpexp == "" ) { $filename = "hdiag_${name}_${level}.${season}.gif"; }

    $verbose  = 0;
if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "NAME: <b> $name </b> <br>";
   print "LEVEL: <b> $level </b> <br>";
   print "GCs: <b> $gc </b> <br>";
   print "VERIFICATION: <b> $cmpexp </b> <br>";
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

// =====================================================================================


?>
