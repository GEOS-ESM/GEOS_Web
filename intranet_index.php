<?php
// **********************************************************************************
// ***************                   Main Page Header                     ***********
// **********************************************************************************

unregister_globals();
$PARAM = array_merge($_GET, $_POST);
$sort = urlencode($PARAM['sort']);
$list = urlencode($PARAM['list']);
$search  = urlencode($PARAM['search']);

$search  = str_replace( '%7C', '|', $search );
$search  = str_replace( '%22', '', $search );
$search  = str_replace( '+', ' ', $search );

if($sort == "") { $sort = "ALL"; }
if($list == "") { $list = "intranet_list"; }

$link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$mode = exec( "echo $link | cut -d'/' -f2" );
//print "MODE: $mode <br>";

if( $mode == "intranet" )
          { 
          $title = "GMAO Model Development" ;
          $HEAD1 = "GMAO GEOS-5 Model Development" ;
          }
else
          { 
          $title = "GMAO Shared Model Development" ;
          $HEAD1 = "GMAO GEOS-5 Shared Model Development" ;
          }

$content = <<<EOF

<title>
$title
</title>
<meta http-equiv="refresh" content="300">

<!-- This script and CSS are for the sortable table -->
<script type="text/javascript" src="sorttable.js"></script>

<style type="text/css">
table.sortable th:not(.sorttable_sorted):not(.sorttable_sorted_reverse):not(.sorttable_nosort):after { 
    content: " ▴▾"
}
</style>
<!-- End sortable table -->

<H1 align=center >
<font color=darkred>
$HEAD1
</font>
</H1>

The Resolution Code (xnn) for the each experiment is as follows: <br>
<br>
<tt>
                 'b' for ~ 2.00-degree ( 144 x  91)                <br>
                 'c' for ~ 1.00-degree ( 288 x 181)                <br>
                 'd' for ~ 0.50-degree ( 540 x 361 or  576 x 361 ) <br>
                 'e' for ~ 0.25-degree (1080 x 721 or 1152 x 721 ) <br>
<br>
      and   nn = the number of levels
<br>
<br>
</tt>

EOF;
echo $content;

// **********************************************************************************
// ***************                Create Search Device                    ***********
// **********************************************************************************

$content = <<<EOF

<form action="index.php" method="_POST"> 
<input type="text" name="search">
<input type="submit" value="Search">

<font size=4 color=darkblue>
EOF;
echo $content;
if( $search != "" ) {print "&nbsp ";print '"';print "$search";print '"';}
$content = <<<EOF
</font> 
</form> 
EOF;

echo $content;


// **********************************************************************************
// ***************               Create Experiment Table                  ***********
// **********************************************************************************

$content = <<<EOF

<center>
<B> <a href="index.php?list=intranet_cli_list">  <font size=5 color=darkblue>  Climate  </font> </a> &nbsp; &nbsp; </B>
<B> <a href="index.php?list=intranet_rep_list">  <font size=5 color=darkblue>  Replay   </font> </a> &nbsp; &nbsp; </B>
<B> <a href="index.php?list=intranet_ana_list">  <font size=5 color=darkblue>  Analysis </font> </a> &nbsp; &nbsp; </B>
<B> <a href="index.php"                       >  <font size=5 color=red     >  (All)    </font> </a> &nbsp; &nbsp; </B>

<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9 class="sortable">
<thead>
<tr>
   <th align=center                         > ExpID   </th>
   <th align=center                         > UsrID   </th>
   <th align=center bgcolor = #dddddd       > Rslv    </th>
   <th align=center                         > Date    </th>
   <th align=center bgcolor = #dddddd       > Control </th>
   <th align=center class="sorttable_nosort"> Description / Changes from Control </th>
</tr>
</thead>

<br><br>

EOF;
echo $content;

sortlist ($sort,$list,$search,$mode);

$content = <<<EOF

</table>
</center>


<br><br>
<a href="../index.php"> <b><font color=darkred>Home</font></a> (GMAO Model Development) </b>


<p>
<br><br>
Web_Page Design: Lawrence L. Takacs<br>
Email: <a href="mailto:Lawrence.L.Takacs@nasa.gov">Lawrence.L.Takacs@nasa.gov</a>
<p>
EOF;
echo $content;

// **********************************************************************************
// ***************                  Utility Functions                     ***********
// **********************************************************************************

function unregister_globals() {
    if (ini_get('register_globals')) {
        $array = array('_REQUEST', '_FILES');
        foreach ($array as $value) {
            if(isset($GLOBALS[$value])){
                foreach ($GLOBALS[$value] as $key => $var) {
                    if (isset($GLOBALS[$key]) && $var === $GLOBALS[$key]) {
                        //echo 'found '.$key.' = '.$var.' in $'.$value."\n";
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }
return; }

function sortlist ($sort,$list,$search,$mode) {
 if( $mode == "extranet" )

     if( $search == "" )
          {
          if( $sort=="ALL" ) { $dummy = system ( "cat  $list | grep -v private | grep extranet" ); }
          else               { $dummy = system ( "grep $sort $list | grep extranet"); }
          }
     else
          { 
          $dummy = system ( "cat  $list | grep $search | grep extranet");
          }

 else

     if( $search == "" )
          {
          if( $sort=="ALL" ) { $dummy = system ( "cat  $list | grep -v private"); }
          else               { $dummy = system ( "grep $sort $list"); }
          }
     else
          { 
          $dummy = system ( "cat  $list | grep $search");
          }

return; }

?>
