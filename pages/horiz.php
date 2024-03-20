<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/horiz_verification.button" );
include( "../buttons/closeness.button" );
include( "../buttons/horiz_type.button" );
include( "../buttons/set_exps.php" );
include( "../buttons/set_item.php" );

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

include( "unregister_globals.php" );
include( "horiz_mk_link1.php" );
include( "horiz_mk_link2.php" );
include( "horiz_mk_link3.php" );

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
Horizontal Mean Prognostics Fields
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
        var type         = form.type.selectedIndex ;
        window.location  = "horiz.php?" 
                         + "&expid=$expid"
                         + "&verification=" + (form.verification.options[verification].value)
                         + "&closeness="    + (form.closeness.options[closeness].value)
                         + "&type="         + (form.type.options[type].value)
                         + "&year="         + (form.year.options[year].value)
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
   <th align=center bgcolor = #edf6ff> <font color=darkred> Comparison </font> <img src=../check.jpg border=0> &nbsp; / &nbsp; <font color=darkgreen> Closeness </font> <img src=../green_check.jpg border=0> </th>
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

// set TYPE Button
// ---------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_type( $type );
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

if($type == "_MEAN") { $type = ""; }

$content = <<<EOF

<center>
<br>

<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>

<tr>
   <th align=center                  > Field                  </th>
   <th align=center bgcolor = #dddddd> Zonal <br>  Linear/Log </th>
EOF;
echo $content;

// =====================================================================================
// =====         Construct Level Headings based on scanning ALL Fields
// =====================================================================================

 $fields = array( "slp", "uwnd", "vwnd", "hght", "hghte", "tmpu", "sphu", "rh", "ql", "qi", "omega", "chi", "psi" );

 $levels = array( 1000 , 975 , 950 , 925 , 900 , 875 , 850 , 825 , 800 , 775 , 750 ,
                   725 , 700 , 650 , 600 , 550 , 500 , 450 , 400 , 350 , 300 , 250 ,
                   200 , 150 , 125 , 100 ,  85 ,  70 ,  60 ,  50 ,  40 ,  30 ,  20 ,
                    15 ,  10 ,   7 ,   5 ,   4 ,   3 ,   2 ,   1 , 0.7 , 0.5 , 0.4 ,
                   0.3 , 0.2 , 0.1 );

           $color = "";
foreach( $levels as $level )
 {
    $flag  = "false";
    foreach( $fields as $field )
     { $file = "horiz_${verificationLC}_${field}_${level}.${season}.gif";
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
     }

       if( $flag == "true" )
       {
    // print "FILE: $file  FLAG: $flag  COLOR: $color <br>";
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

      mk_entry3 ("Sea-Level Pressure" , "slp"   , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("Zonal U-Wind"       , "uwnd"  , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("Meridional V-Wind"  , "vwnd"  , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("Heights"            , "hght"  , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("Eddy Heights"       , "hghte" , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("Temperature"        , "tmpu"  , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("Specific Humidity"  , "sphu"  , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("Relative Humidity"  , "rh"    , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("Q-Liquid"           , "ql"    , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("Q-Ice"              , "qi"    , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("Omega"              , "omega" , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("CHI"                , "chi"   , $levels , $year , $season , ${verificationLC} , $closeness);
      mk_entry3 ("PSI"                , "psi"   , $levels , $year , $season , ${verificationLC} , $closeness);

$content = <<<EOF
</tr>
</table>
EOF;
echo $content;


// =====================================================================================
// =====         Construct Level Headings based on scanning O3 Fields
// =====================================================================================

 $O3_fields = array( "o3" );
 $O3_levels = array( "70", "50", "40", "30", "10", "7", "5", "4", "3", "1", ".7", ".5", ".4", ".3", ".1" );

   $content = <<<EOF
   <br>
   <table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>

<tr>
   <th align=center                  > Field                  </th>
   <th align=center bgcolor = #dddddd> Zonal <br>  Linear/Log </th>
EOF;
echo $content;

           $color = "";
foreach( $O3_levels as $level )
 {
    $flag  = "false";
    foreach( $O3_fields as $field )
     { $file = "horiz_${verificationLC}_${field}_${level}.${season}.gif";
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
     }

    // print "FILE: $file  FLAG: $flag <br>";
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

      mk_entry3 ("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ozone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" , "o3" , $O3_levels , $year , $season , ${verificationLC} , $closeness);


$content = <<<EOF
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

// =====================================================================================

  function mk_entry3 ($heading,$plot,$levels,$year,$season,$cmpexp,$closeness) {

  if( $plot == "o3" ) { $fields = array( "o3" ); }
  else                { $fields = array( "slp", "uwnd", "vwnd", "hght", "hghte", "tmpu", "sphu", "rh", "ql", "qi", "omega", "chi", "psi" ); }

$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> $heading </font> </th>
EOF;
echo $content;

    mk_link_3a("$year","$season","${plot}_z",$cmpexp, $closeness, "#dddddd");

$color = "";
$exppath=$GLOBALS["exppath"];

foreach( $levels as $level )
 {
    $flag  = "false";
    foreach( $fields as $field )
     { $file = "horiz_${cmpexp}_${field}_${level}.${season}.gif";
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; }
     }
    // print "LEVEL: $level  PLOT: $plot  FLAG: $flag <br>";

    if( $flag == "true" ) {
                                                     $color0 = $color;
    if( ( ${plot} == "uwnd"  & ${level} == 200 ) |
        ( ${plot} == "hghte" & ${level} == 300 ) ) { $color = "#d5eae9"; }
    mk_link_3b ("$year","$season","${plot}_${level}",$cmpexp,$closeness,$color);
    if( "$color0" == "#dddddd" ) { $color = "";        }
    else                         { $color = "#dddddd"; } 
    }
 }

return; }

// =====================================================================================

function mk_link_3a ($year,$season,$filename,$cmpexp,$closeness,$color) {

     if( $closeness == "none" ) { $check = "../check.jpg";   }
     else                       { $check = "../green_check.jpg"; }


     if( $cmpexp == "none" ) { $cmpexp = ""; }
     else                    { if( $closeness == "none" ) { $cmpexp = "${cmpexp}_"; }
                               else                       { $cmpexp = "${cmpexp}" ; } } 


     if( $closeness == "none" ) { $filename  = "horiz_${cmpexp}${filename}";
                                  $filename1 = "${filename}.$season.gif";
                                  $filename2 = "${filename}30.$season.gif";
                                  $filename3 = "${filename}log30.$season.gif";
                                  $filename4 = "${filename}log10.$season.gif";
                                  $filename5 = "${filename}log.$season.gif";
                                  $filename6 = "${filename}log0.1.$season.gif"; }

     else                       { $filename  = "horiz_${closeness}_${filename}";
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

function mk_link_3b ($year,$season,$name,$verification,$closeness,$color) {

   if( $closeness == "none" ) { $check = "../check.jpg";   }
   else                       { $check = "../green_check.jpg"; }

   if( $closeness == "none" ) { $filename = "horiz_${verification}_${name}.${season}.gif"; }
   else                       { $filename = "horiz_${closeness}_${name}_closeness_${verification}.${season}.gif"; }

   if( $closeness == "none" & $verification == "none" ) { $filename = "horiz_${name}.${season}.gif"; }

    $verbose  = 0;
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

// =====================================================================================

// =====================================================================================

?>
