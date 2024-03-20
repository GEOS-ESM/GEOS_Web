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
Passive Tracers
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
     {  var year        = form.year.selectedIndex ;
        var season      = form.season.selectedIndex ;
        window.location = "ccm_tracers.php?"
                        + "&expid=$expid"
                        + "&year="   + (form.year.options[year].value)
                        + "&season=" + (form.season.options[season].value); }
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

$content = <<<EOF

<center>
<br>

<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>

<tr>
   <th align=center                  > Field      </th> 
   <th align=center bgcolor = #dddddd> Zonal <br>  Linear/Log </th>
   <th align=center                  > 1000 mb </th> 
   <th align=center bgcolor = #dddddd>  850 mb </th> 
   <th align=center                  >  700 mb </th> 
   <th align=center bgcolor = #dddddd>  500 mb </th> 
   <th align=center                  >  300 mb </th> 
   <th align=center bgcolor = #dddddd>  200 mb </th> 
   <th align=center                  >  100 mb </th>
   <th align=center bgcolor = #dddddd>   50 mb </th>
   <th align=center                  >   10 mb </th>
</tr>

EOF;
echo $content;

     $levels = array( "1000", "850", "700", "500", "300", "200", "100", "50", "10");

      mk_entry3 ("Age of Air" , "aoa"   , $levels , $year , $season );
      mk_entry3 ("Age of Air (BL)" , "aoa_bl"   , $levels , $year , $season );
      mk_entry3 ("Age of Air (NH)" , "aoa_nh"   , $levels , $year , $season );
      mk_entry3 ("Age of Air (SH)" , "aoa_sh"   , $levels , $year , $season );
      mk_entry3 ("Beryllium10 (strat)"       , "Be10s"  , $levels , $year , $season );
      mk_entry3 ("Beryllium10"       , "Be10"  , $levels , $year , $season );
      mk_entry3 ("Beryllium7 (strat)"       , "Be7s"  , $levels , $year , $season );
      mk_entry3 ("Beryllium7"       , "Be7"  , $levels , $year , $season );
      mk_entry3 ("Methyl Iodide"  , "CH3I"  , $levels , $year , $season );
      mk_entry3 ("Carbon Monoxide (25 day)"            , "co_25"  , $levels , $year , $season );
      mk_entry3 ("Carbon Monoxide (50 day)"            , "co_50"  , $levels , $year , $season );
      mk_entry3 ("Carbon Monoxide (50 day EA)"            , "co_50_ea"  , $levels , $year , $season );
      mk_entry3 ("Carbon Monoxide (50 day EU)"            , "co_50_eeu"  , $levels , $year , $season );
      mk_entry3 ("Carbon Monoxide (50 day NA)"            , "co_50_na"  , $levels , $year , $season );
      mk_entry3 ("Carbon Monoxide (50 day SA)"            , "co_50_sa"  , $levels , $year , $season );
      mk_entry3 ("Constant Burden (90 day)"       , "e90" , $levels , $year , $season );
      mk_entry3 ("Constant Burden (90 day 40N)"       , "e90n" , $levels , $year , $season );
      mk_entry3 ("Constant Burden (90 day 40S)"       , "e90s" , $levels , $year , $season );
      mk_entry3 ("Northern Hemisphere (5 day)"       , "nh_5" , $levels , $year , $season );
      mk_entry3 ("Northern Hemisphere (50 day)"       , "nh_50" , $levels , $year , $season );
      mk_entry3 ("Lead-210"        , "Pb210"  , $levels , $year , $season );
      mk_entry3 ("Lead-210 (strat)"        , "Pb210s"  , $levels , $year , $season);
      mk_entry3 ("Radon-222"        , "Rn222"  , $levels , $year , $season );
      mk_entry3 ("Sulfur Hexafluoride"        , "sf6"  , $levels , $year , $season );
      mk_entry3 ("Stratospheric Source (25 day)"  , "st80_25"  , $levels , $year , $season );
      mk_entry3 ("Stratospheric Ozone (with chem loss)"  , "stO3"  , $levels , $year , $season );

$content = <<<EOF
</tr>
</table>
EOF;
echo $content;


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

function mk_entry3 ($heading,$plot,$levels,$year,$season) {

$closeness = "none";
$cmpexp = "none";

$content = <<<EOF
<tr>
   <th align=center > <font color=darkblue> $heading </font> </th>
EOF;
echo $content;

mk_link_3a("$year","$season","${plot}_z",$cmpexp, $closeness, "#dddddd");

$color = "";
foreach( $levels as $level ) {
    mk_link_3b ("$year","$season","${plot}_${level}",$cmpexp,$closeness,$color);
    if( "$color" == "#dddddd" | "$color" == "#d5eae9" ) { $color = ""; }
    else                                                { $color = "#dddddd"; } }

return; 
}

// =====================================================================================

function mk_link_3a ($year,$season,$filename,$cmpexp,$closeness,$color) {

     if( $closeness == "none" ) { $check = "../check.jpg";   }
     else                       { $check = "../green_check.jpg"; }


     if( $cmpexp == "none" ) { $cmpexp = ""; }
     else                    { if( $closeness == "none" ) { $cmpexp = "${cmpexp}_"; }
                               else                       { $cmpexp = "${cmpexp}" ; } } 


     if( $closeness == "none" ) { $filename  = "${cmpexp}${filename}"; 
                                  $filename1 = "${filename}.$season.jpg";}

     else                       { $filename  = "${closeness}_${filename}";
                                  $filename1 = "${filename}_closeness_${cmpexp}.$season.jpg";}


    $verbose  = 0;
if( $verbose != 0)
  { print "filename : <b> $filename  </b> <br>";
    print "filename1: <b> $filename1 </b> <br>";}

     { $zref1 = "&nbsp;"; }
     if (file_exists("../$year/$filename1"))         { $zref1 = "<a href=../$year/$filename1         target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }
     if (file_exists("../$year/$season/$filename1")) { $zref1 = "<a href=../$year/$season/$filename1 target='' style='text-decoration:none;'> <img src=$check border=0> </a>"; }

     $zref = $zref1 ;
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

   if( $closeness == "none" ) { $filename = "${name}.jpg"; }
   else                       { $filename = "${closeness}_${name}_closeness_${verification}.${season}.jpg"; }

   if( $closeness == "none" & $verification == "none" ) { $filename = "${name}.jpg"; }

    $verbose  = 0;
if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "FILENAME: <b> $filename </b> <br>"; }

                                                  { $zref = "&nbsp;"; }
   if (file_exists("../$year/$filename"))         { $zref = "<a href=../$year/$filename target=''>        <img src=$check border=0> </a>"; }
   if (file_exists("../$year/$season/$filename")) { $zref = "<a href=../$year/$season/$filename target=''><img src=$check border=0> </a>"; }

   $content = <<<EOF
   <td align=center bgcolor = $color >
   $zref
  </td>
EOF;
echo $content;
return; }

// =====================================================================================

?>
