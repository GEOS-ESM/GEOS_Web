<?php

// **********************************************************************************
// ***************              Include Dynamic Buttons                   ***********
// **********************************************************************************

include( "../buttons/year.button" );
include( "../buttons/season.button" );
include( "../buttons/corners.button" );
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
$corners      = urlencode($PARAM['corners']);

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
3CH Error Analysis
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
        var corners      = form.corners.selectedIndex ;
        window.location  = "3CH_Error_Analysis.php?"
                         + "&expid=$expid"
                         + "&year="    + (form.year.options[year].value)
                         + "&season="  + (form.season.options[season].value)
                         + "&corners=" + (form.corners.options[corners].value); }

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
   <th align=center bgcolor = #edf6ff> Year   </th>
   <th align=center bgcolor = #edf6ff> Season </th>
   <th align=center bgcolor = #edf6ff> Fixed Corners </th>
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

// set Corners Button
// ------------------
$content = <<<EOF
<th>
EOF;
echo $content;
set_corners( $corners );
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
if( $verbose == "1" )
{ print "<br>";
  print "<br>";
  print "YEAR: $year <br>";
  print "SEASON: $season <br>";
  print "CORNERS: $corners <br>"; }

// **********************************************************************************

$content = <<<EOF
<H1 align=center > <font color=darkblue> Combined 3CH and MSE Difference Plots </font> </H1>
EOF;
echo $content;
Combined_3CH_MSE_Difference_Template ($year,$season,$corners);

// **********************************************************************************

$content = <<<EOF
<H1 align=center > <font color=darkblue> Zonal Mean  MSE Difference Plots </font> </H1>
EOF;
echo $content;
MSE_Difference_Template ($year,$season,$corners);

// **********************************************************************************

$content = <<<EOF
<H1 align=center > <font color=darkblue> Field Profiles and Vertical Cross-Sections</font> </H1>
EOF;
echo $content;
Three_Cornered_Hat_Field_Template ($year,$season,$corners);

// **********************************************************************************

$content = <<<EOF
<H1 align=center > <font color=darkblue> Corner Cross-Sections and Differences</font> </H1>
EOF;
echo $content;
Three_Cornered_Hat_Corner_Template ($year,$season,$corners);

// **********************************************************************************

$content = <<<EOF
<H1 align=center > <font color=darkblue> Mean Fields </font> </H1>
EOF;
echo $content;
Three_Cornered_Hat_Error_Template ($year,$season,$corners,""    );

// **********************************************************************************

$content = <<<EOF
<H1 align=center > <font color=darkblue> Difference Fields </font> </H1>
EOF;
echo $content;
Three_Cornered_Hat_Error_Template ($year,$season,$corners,"diff");


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

// =====================================================================================
// =====================================================================================

function MSE_Difference_Template ($year,$season,$corners) {

 $all_fields = array( U , V , T , Q , H , P );


// Construct FIELD and Zonal Columns 
// ---------------------------------
$content = <<<EOF
<center>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=35%>
<tr>
   <th align=center                  > Field           </th> 
   <th align=center bgcolor = #dddddd> Corner1 / Corner2 </th>
EOF;
echo $content;


 $all_levels = array(    1000 , 975 , 950 , 925 , 900 , 
                                875 , 850 , 825 , 800 , 
                                775 , 750 , 725 , 700 , 
                                650 , 600 , 550 , 500 , 
                                450 , 400 , 350 , 300 , 
                                250 , 200 , 150 , 100 , 
                                 70 ,  50 ,  30 ,  20 , 
                                 10 ,   7 ,   5 ,   3 , 2 , 1 );

// Construct Pressure Columns 
// --------------------------
           $color = "";
foreach( $all_levels as $level )
  {
    $flag  = "false";
    foreach( $all_fields as $field ) 
      {   $file = "MSE-1_Diff${level}_${field}_${corners}.${year}_${season}.gif"; 
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; } 
      }
       if( $flag == "true" ) 
       { 
$content = <<<EOF
   <th align=center bgcolor = ${color}> ${level} mb </th> 
EOF;
echo $content; 
       if( "$color" == "#dddddd" )  { $color = "";        }
           else                     { $color = "#dddddd"; } 
       } 
  }

$content = <<<EOF
</tr>
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
EOF;
echo $content;

 $all_levels = array( z, 1000 , 975 , 950 , 925 , 900 , 
                                875 , 850 , 825 , 800 , 
                                775 , 750 , 725 , 700 , 
                                650 , 600 , 550 , 500 , 
                                450 , 400 , 350 , 300 , 
                                250 , 200 , 150 , 100 , 
                                 70 ,  50 ,  30 ,  20 , 
                                 10 ,   7 ,   5 ,   3 , 2 , 1 );

     mk_MSE_horizontal_entry ("PS",         "P",$all_levels,$year,$season,$corners);
     mk_MSE_horizontal_entry ("U-Wind",     "U",$all_levels,$year,$season,$corners);
     mk_MSE_horizontal_entry ("V-Wind",     "V",$all_levels,$year,$season,$corners);
     mk_MSE_horizontal_entry ("Height",     "H",$all_levels,$year,$season,$corners);
     mk_MSE_horizontal_entry ("Temperature","T",$all_levels,$year,$season,$corners);
     mk_MSE_horizontal_entry ("Spec.Humid.","Q",$all_levels,$year,$season,$corners);

$content = <<<EOF
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
</table>
<br>
<br>
EOF;
echo $content;
return; }

// =====================================================================================

  function mk_MSE_horizontal_entry ($label,$field,$levels,$year,$season,$corners) {

$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> $label </font> </th> 
EOF;
echo $content;

 $all_fields = array( U , V , T , Q , H , P );

                                 $color = "#dddddd";

    mk_MSE_link_z ($year,$season,${field},${corners},$color); 
    if( "$color" == "#dddddd" ) { $color = "";        }
    else                        { $color = "#dddddd"; }

foreach( $levels as $level ) 
    {
    $flag  = "false";
    foreach( $all_fields as $name ) {
      $file = "XMSE-1_Diff_${level}-hPa_Horizontal_${name}_${corners}.${year}_${season}.gif"; 
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; } 
//     print "FILE: $file  FLAG: $flag <br>";
                                     }
    if( $flag == "true" ) { 
    mk_MSE_link ($year,$season,"MSE-1_Diff_${level}-hPa_Horizontal_${field}_${corners}",$color); 
    if( "$color" == "#dddddd" ) { $color = "";        }
    else                        { $color = "#dddddd"; } 
                          }
    }

return; }

// =====================================================================================

function mk_MSE_link_z ($year,$season,$field,$corners,$color) {

   $check = "../check.jpg";

   $file1 = "MSE-1_Diffz_${field}_${corners}.${year}_${season}.gif";
   $file2 = "MSE-2_Diffz_${field}_${corners}.${year}_${season}.gif";

    $verbose  = 0;
if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "NAME: <b> $name </b> <br>";
   print "FILENAME1: <b> $file1 </b> <br>";
   print "FILENAME2: <b> $file2 </b> <br>"; }

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];

                                               { $zref = "&nbsp;"; }
   if (file_exists("$exppath/$year/$file1"))         { $zref = "<a href=$expurl/$year/$file1 target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$file1")) { $zref = "<a href=$expurl/$year/$season/$file1 target=''><img src=$check border=0> </a>"; }

                                               { $yref = "&nbsp;"; }
   if (file_exists("$exppath/$year/$file2"))         { $yref = "<a href=$expurl/$year/$file2 target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$file2")) { $yref = "<a href=$expurl/$year/$season/$file2 target=''><img src=$check border=0> </a>"; }

   if( $yref!= "&nbsp;" ) { $zref = "$zref &nbsp;/&nbsp; $yref"; }

   $content = <<<EOF
   <td align=center bgcolor = $color >
   $zref
  </td>
EOF;
echo $content;
return; }

// =====================================================================================

function mk_MSE_link ($year,$season,$name,$color) {

   $check = "../check.jpg";

   $filename = "${name}.${year}_${season}.gif";

    $verbose  = 0;
if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "NAME: <b> $name </b> <br>";
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

function Combined_3CH_MSE_Difference_Template ($year,$season,$corners) {

 $all_fields = array( U , V , T , Q , H , P );


// Construct FIELD and Zonal Columns 
// ---------------------------------
$content = <<<EOF
<center>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=35%>
<tr>
   <th align=center                  > Field           </th> 
   <th align=center bgcolor = #dddddd> Zonal X-Section </th>
EOF;
echo $content;

 $all_levels = array(    1000 , 975 , 950 , 925 , 900 , 
                                875 , 850 , 825 , 800 , 
                                775 , 750 , 725 , 700 , 
                                650 , 600 , 550 , 500 , 
                                450 , 400 , 350 , 300 , 
                                250 , 200 , 150 , 100 , 
                                 70 ,  50 ,  30 ,  20 , 
                                 10 ,   7 ,   5 ,   3 , 2 , 1 );

$exppath=$GLOBALS["exppath"];
$expurl=$GLOBALS["expurl"];

// Construct Pressure Columns 
// --------------------------
           $color = "";
foreach( $all_levels as $level ) {

    $flag  = "false";
    foreach( $all_fields as $field ) {

      $file = "3CH_MSE_Combined_Diff${level}_${field}.${corners}.${year}_${season}.gif"; 

       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; } }

       if( $flag == "true" ) { 
$content = <<<EOF
   <th align=center bgcolor = ${color}> ${level} mb </th> 
EOF;
echo $content; 

if( "$color" == "#dddddd" ) { $color = "";        }
    else                    { $color = "#dddddd"; } } }


$content = <<<EOF
</tr>
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
EOF;
echo $content;

     mk_3CH_MSE_horizontal_entry ("PS",         "P",$year,$season,$corners);
     mk_3CH_MSE_horizontal_entry ("U-Wind",     "U",$year,$season,$corners);
     mk_3CH_MSE_horizontal_entry ("V-Wind",     "V",$year,$season,$corners);
     mk_3CH_MSE_horizontal_entry ("Height",     "H",$year,$season,$corners);
     mk_3CH_MSE_horizontal_entry ("Temperature","T",$year,$season,$corners);
     mk_3CH_MSE_horizontal_entry ("Spec.Humid.","Q",$year,$season,$corners);

     mk_3CH_MSE_horizontal_entry2 ("3CH Triplet Combinations","3CH_Vertical_Cross-Section_XY_Differences_with_Fixed_Corners_${corners}.${year}_${season}.gif",$year,$season);

$content = <<<EOF
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
</table>
<br>
<br>
EOF;
echo $content;
return; }

// =====================================================================================

  function mk_3CH_MSE_horizontal_entry ($label,$field,$year,$season,$corners) {

$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> $label </font> </th> 
EOF;
echo $content;
                                  $color = "#dddddd";
    mk_3CH_MSE_link_field ($year,$season,${field},${corners},$color); 
    if( "$color" == "#dddddd" ) { $color = "";        }
    else                        { $color = "#dddddd"; }

return; }

// =====================================================================================

  function mk_3CH_MSE_horizontal_entry2 ($label,$file,$year,$season) {

$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> $label </font> </th> 
EOF;
echo $content;
                                  $color = "#dddddd";
    mk_3CH_MSE_link_file ($year,$season,$file,$color); 
    if( "$color" == "#dddddd" ) { $color = "";        }
    else                        { $color = "#dddddd"; }

return; }

// =====================================================================================

// =====================================================================================

function mk_3CH_MSE_link_field ($year,$season,$field,$corners,$color) {

   $check = "../check.jpg";

   $file = "3CH_MSE_Combined_Diffz_${field}_${corners}.${year}_${season}.gif";

                                              { $zref = "&nbsp;"; }
   if (file_exists("$exppath/$year/$file"))         { $zref = "<a href=$expurl/$year/$file target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$file")) { $zref = "<a href=$expurl/$year/$season/$file target=''><img src=$check border=0> </a>"; }

   $content = <<<EOF
   <td align=center bgcolor = $color >
   $zref
  </td>
EOF;
echo $content;
return; }

// =====================================================================================

function mk_3CH_MSE_link_file ($year,$season,$file,$color) {

   $check = "../check.jpg";

   $exppath=$GLOBALS["exppath"];
   $expurl=$GLOBALS["expurl"];
                                              { $zref = "&nbsp;"; }
   if (file_exists("$exppath/$year/$file"))         { $zref = "<a href=$expurl/$year/$file target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$file")) { $zref = "<a href=$expurl/$year/$season/$file target=''><img src=$check border=0> </a>"; }

   $content = <<<EOF
   <td align=center bgcolor = $color >
   $zref
  </td>
EOF;
echo $content;
return; }

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

function mk_single_link ($year,$season,$filename,$text,$color) {

     $exppath=$GLOBALS["exppath"];
     $expurl=$GLOBALS["expurl"];
                                                    { $zref = "<font color=#808080> <u> $text </u> </font>"; }
     if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''> <font color=$color> $text </font> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''> <font color=$color> $text </font> </a>"; }

     $content = <<<EOF
<H1 align=center >
<font color=darkred>
     <li> $zref </li>
</font>
</H1>
EOF;
echo $content;
return; }


function Three_Cornered_Hat_Corner_Template ($year,$season,$corners) {

$content = <<<EOF
<center>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=20%>
<tr>
   <th align=center                  > Corner                   </th> 
   <th align=center bgcolor = #dddddd> Cross-Section            </th>
   <th align=center                  > Cross-Section Difference </th>
EOF;
echo $content;

$content = <<<EOF
</tr>
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
EOF;
echo $content;

     mk_corner_entry ("Corner A","A",$year,$season,$corners);
     mk_corner_entry ("Corner B","B",$year,$season,$corners);
     mk_corner_entry ("Corner X","X",$year,$season,$corners);
     mk_corner_entry ("Corner Y","Y",$year,$season,$corners);

$content = <<<EOF
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
</table>
<br>
<br>
EOF;
echo $content;
return; }

function mk_corner_entry ($label,$corner,$year,$season,$corners) {

$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> $label </font> </th> 
EOF;
echo $content;

 $catagories = array( Estimate , Difference );

                                 $color = "#dddddd";

 foreach( $catagories as $cat )
 {  
    if( $cat == Estimate   ) { $filename = "3CH_Vertical_Cross-Section_for_Corner_${corner}_with_Fixed_Corners"             ; }
    if( $cat == Difference ) { $filename = "3CH_Vertical_Cross-Section_Differences_for_Corner_${corner}_with_Fixed_Corners" ; }

    mk_corner_link ($year,$season,$filename,$corners,$color); 
    if( "$color" == "#dddddd" ) { $color = "";        }
    else                        { $color = "#dddddd"; }
 }

return; }

function mk_corner_link ($year,$season,$name,$corners,$color) {

   $check = "../check.jpg";

   $filename = "${name}_${corners}.${year}_${season}.gif";

    $verbose  = 0;
if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "NAME: <b> $name </b> <br>";
   print "SHEname: <b> $SHEname </b> <br>"; 
   print "TROname: <b> $TROname </b> <br>"; 
   print "NHEname: <b> $NHEname </b> <br>"; }

   $exppath=$GLOBALS["exppath"];
   $expurl=$GLOBALS["expurl"];

                                                   { $zref = "&nbsp;"; }
   if (file_exists("$exppath/$year/$filename"))          { $zref = "<a href=$expurl/$year/$filename target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$filename"))  { $zref = "<a href=$expurl/$year/$season/$filename target=''><img src=$check border=0> </a>"; }

   $content = <<<EOF
   <td align=center bgcolor = $color >
   $zref
  </td>
EOF;
echo $content;
return; }

// =====================================================================================


function Three_Cornered_Hat_Field_Template ($year,$season,$corners) {

$content = <<<EOF
<center>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=35%>
<tr>
   <th align=center                  > Field              </th> 
   <th align=center bgcolor = #dddddd> Corner Profile Estimates (SHE,TRO,NHE)     </th>
   <th align=center                  > Corner Profile Differences (SHE,TRO,NHE)   </th>
   <th align=center bgcolor = #dddddd> Corner Zonal Cross-Section Differencess    </th>
   <th align=center                  > Y-X Profiles (SHE,TRO,NHE)                 </th>
   <th align=center bgcolor = #dddddd> Y-X Differences                            </th>
   <th align=center                  > Triplet Profiles                           </th>
EOF;
echo $content;

$content = <<<EOF
</tr>
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
EOF;
echo $content;

     mk_field_entry ("U-Wind",     "U",$year,$season,$corners);
     mk_field_entry ("V-Wind",     "V",$year,$season,$corners);
     mk_field_entry ("Height",     "H",$year,$season,$corners);
     mk_field_entry ("Temperature","T",$year,$season,$corners);
     mk_field_entry ("Spec.Humid.","Q",$year,$season,$corners);

$content = <<<EOF
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
</table>
<br>
<br>
EOF;
echo $content;
return; }



function mk_field_entry ($label,$field,$year,$season,$corners) {

$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> $label </font> </th> 
EOF;
echo $content;

 $catagories = array( Estimate , Difference , VCross , XY_Prof , XY_Diff, Triplets );

                                 $color = "#dddddd";

 foreach( $catagories as $cat )
 {  
    if( $cat == Estimate   ) { $filename = "3CH_${field}_Corner_Profiles"            ; }
    if( $cat == Difference ) { $filename = "3CH_${field}_Corner_Difference_Profiles" ; } 
    if( $cat == VCross     ) { $filename = "3CH_Vertical_Cross-Section_Differences_for_Field_${field}" ; } 
    if( $cat == XY_Prof    ) { $filename = "3CH_${field}_XY2_Difference_Profiles" ; } 
    if( $cat == XY_Diff    ) { $filename = "3CH_${field}_XY_Difference_Profiles" ; } 
    if( $cat == Triplets   ) { $filename = "3CH_Profile_${field}_abxy_Corners" ; } 

    mk_field_link ($year,$season,$filename,$corners,$color); 
    if( "$color" == "#dddddd" ) { $color = "";        }
    else                        { $color = "#dddddd"; }
 }

return; }

function mk_field_link ($year,$season,$name,$corners,$color) {

   $check = "../check.jpg";

   $SHEname = "${name}_Lats_-90_-30_Fixed_Corners_${corners}.${year}_${season}.gif";
   $TROname = "${name}_Lats_-30_30_Fixed_Corners_${corners}.${year}_${season}.gif";
   $NHEname = "${name}_Lats_30_90_Fixed_Corners_${corners}.${year}_${season}.gif";

   $XYzname = "${name}_Fixed_Corners_${corners}.${year}_${season}.gif";
   $VCross  = "${name}_with_Fixed_Corners_${corners}.${year}_${season}.gif";
   $TRIPLET = "${name}_${corners}.${year}_${season}.gif";

    $verbose  = 0;
if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "NAME: <b> $name </b> <br>";
   print "SHEname: <b> $SHEname </b> <br>"; 
   print "TROname: <b> $TROname </b> <br>"; 
   print "NHEname: <b> $NHEname </b> <br>"; }

   $exppath=$GLOBALS["exppath"];
   $expurl=$GLOBALS["expurl"];

                                                 { $SHE = "&nbsp;"; }
   if (file_exists("$exppath/$year/$SHEname"))         { $SHE = "<a href=$expurl/$year/$SHEname target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$SHEname")) { $SHE = "<a href=$expurl/$year/$season/$SHEname target=''><img src=$check border=0> </a>"; }

                                                 { $TRO = "&nbsp;"; }
   if (file_exists("$exppath/$year/$TROname"))         { $TRO = "<a href=$expurl/$year/$TROname target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$TROname")) { $TRO = "<a href=$expurl/$year/$season/$TROname target=''><img src=$check border=0> </a>"; }

                                                 { $NHE = "&nbsp;"; }
   if (file_exists("$exppath/$year/$NHEname"))         { $NHE = "<a href=$expurl/$year/$NHEname target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$NHEname")) { $NHE = "<a href=$expurl/$year/$season/$NHEname target=''><img src=$check border=0> </a>"; }

                                                 { $XYz = "&nbsp;"; }
   if (file_exists("$exppath/$year/$XYzname"))         { $XYz = "<a href=$expurl/$year/$XYzname target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$XYzname")) { $XYz = "<a href=$expurl/$year/$season/$XYzname target=''><img src=$check border=0> </a>"; }

                                                 { $VCX = "&nbsp;"; }
   if (file_exists("$exppath/$year/$VCross"))          { $VCX = "<a href=$expurl/$year/$VCross target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$VCross"))  { $VCX = "<a href=$expurl/$year/$season/$VCross target=''><img src=$check border=0> </a>"; }

                                                 { $TRX = "&nbsp;"; }
   if (file_exists("$exppath/$year/$TRIPLET"))         { $TRX = "<a href=$expurl/$year/$TRIPLET target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$TRIPLET")) { $TRX = "<a href=$expurl/$year/$season/$TRIPLET target=''><img src=$check border=0> </a>"; }


                                               if( $SHE != "&nbsp;" ) { $zref = "$SHE"; }
                                               if( $TRO != "&nbsp;" ) { $zref = "$zref &nbsp;/&nbsp; $TRO"; }
                                               if( $NHE != "&nbsp;" ) { $zref = "$zref &nbsp;/&nbsp; $NHE"; }

                                               if( $XYz != "&nbsp;" ) { $zref = "$XYz"; }
                                               if( $VCX != "&nbsp;" ) { $zref = "$VCX"; }
                                               if( $TRX != "&nbsp;" ) { $zref = "$TRX"; }
   $content = <<<EOF
   <td align=center bgcolor = $color >
   $zref
  </td>
EOF;
echo $content;
return; }

// =====================================================================================
function Three_Cornered_Hat_Error_Template ($year,$season,$corners,$diff) {

 $all_fields = array( U , V , T , Q , H , P );

 $all_levels = array( 1000 , 975 , 950 , 925 , 900 , 
                             875 , 850 , 825 , 800 , 
                             775 , 750 , 725 , 700 , 
                             650 , 600 , 550 , 500 , 
                             450 , 400 , 350 , 300 , 
                             250 , 200 , 150 , 100 , 
                              70 ,  50 ,  30 ,  20 , 
                              10 ,   7 ,   5 ,   3 , 2 , 1 );


$content = <<<EOF
<center>
<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>
<tr>
   <th align=center                  > Field           </th> 
   <th align=center bgcolor = #dddddd> Profiles ab/xy  </th>
   <th align=center                  > Zonal X-Section </th>
EOF;
echo $content;

$exppath=$GLOBALS["exppath"];
$expurl=$GLOBALS["expurl"];

           $color = "#dddddd";
foreach( $all_levels as $level ) {

    $flag  = "false";
    foreach( $all_fields as $field ) {

      $file = "3CH_${level}-hPa_Horizontal_${field}_Corners_${corners}.${year}_${season}.gif"; 

       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; } }

       if( $flag == "true" ) { 
$content = <<<EOF
   <th align=center bgcolor = ${color}> ${level} mb </th> 
EOF;
echo $content; 

if( "$color" == "#dddddd" ) { $color = "";        }
    else                    { $color = "#dddddd"; } } }


$content = <<<EOF
</tr>
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
EOF;
echo $content;

     mk_horizontal_entry ("PS",         "P",$all_levels,$year,$season,$corners,$diff);
     mk_horizontal_entry ("U-Wind",     "U",$all_levels,$year,$season,$corners,$diff);
     mk_horizontal_entry ("V-Wind",     "V",$all_levels,$year,$season,$corners,$diff);
     mk_horizontal_entry ("Height",     "H",$all_levels,$year,$season,$corners,$diff);
     mk_horizontal_entry ("Temperature","T",$all_levels,$year,$season,$corners,$diff);
     mk_horizontal_entry ("Spec.Humid.","Q",$all_levels,$year,$season,$corners,$diff);

$content = <<<EOF
<tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr> <tr> </tr>
</table>
<br>
<br>
EOF;
echo $content;
return; }

// =====================================================================================

  function mk_horizontal_entry ($label,$field,$levels,$year,$season,$corners,$diff) {

$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> $label </font> </th> 
EOF;
echo $content;

if( $diff != "" ) { $field = "${field}_Diff"; }

 $all_fields = array( U , V , T , Q , H , P );

                                 $color = "#dddddd";

    mk_link_z ($year,$season,"3CH_Profile_${field}","xy","${corners}",$color); 
    if( "$color" == "#dddddd" ) { $color = "";        }
    else                        { $color = "#dddddd"; }

    mk_link ($year,$season,"3CH_Zonal_Std.Dev_${field}_Corners_${corners}",$color); 
    if( "$color" == "#dddddd" ) { $color = "";        }
    else                        { $color = "#dddddd"; } 

foreach( $levels as $level ) 
    {
    $flag  = "false";
    foreach( $all_fields as $name ) {
      $file = "3CH_${level}-hPa_Horizontal_${name}_Corners_${corners}.${year}_${season}.gif"; 
       if (file_exists("$exppath/$year/$file"))         { $flag = "true"; }
       if (file_exists("$exppath/$year/$season/$file")) { $flag = "true"; } 
//     print "FILE: $file  FLAG: $flag <br>";
                                     }
    if( $flag == "true" ) { 
    mk_link ($year,$season,"3CH_${level}-hPa_Horizontal_${field}_Corners_${corners}",$color); 
    if( "$color" == "#dddddd" ) { $color = "";        }
    else                        { $color = "#dddddd"; } 
                          }
    }

return; }

// =====================================================================================

function mk_link_z ($year,$season,$name,$base,$corners,$color) {

   $check = "../check.jpg";

   $fileab = "${name}_Corners_${corners}.${year}_${season}.gif";
   $filexy = "${name}_${base}_Corners_${corners}.${year}_${season}.gif";

    $verbose  = 0;
if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "NAME: <b> $name </b> <br>";
   print "FILENAME: <b> $fileab </b> <br>"; }

   $exppath=$GLOBALS["exppath"];
   $expurl=$GLOBALS["expurl"];

                                                { $zref = "&nbsp;"; }
   if (file_exists("$exppath/$year/$fileab"))         { $zref = "<a href=$expurl/$year/$fileab target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$fileab")) { $zref = "<a href=$expurl/$year/$season/$fileab target=''><img src=$check border=0> </a>"; }

                                                { $yref = "&nbsp;"; }
   if (file_exists("$exppath/$year/$filexy"))         { $yref = "<a href=$expurl/$year/$filexy target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("$exppath/$year/$season/$filexy")) { $yref = "<a href=$expurl/$year/$season/$filexy target=''><img src=$check border=0> </a>"; }

   if( $yref!= "&nbsp;" ) { $zref = "$zref &nbsp;/&nbsp; $yref"; }

   $content = <<<EOF
   <td align=center bgcolor = $color >
   $zref
  </td>
EOF;
echo $content;
return; }

// =====================================================================================

function mk_link ($year,$season,$name,$color) {

   $check = "../check.jpg";

   $filename = "${name}.${year}_${season}.gif";

    $verbose  = 0;
if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "NAME: <b> $name </b> <br>";
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

