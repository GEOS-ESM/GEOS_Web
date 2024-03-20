<?php
// **********************************************************************************
// ***************                   Main Page Header                     ***********
// **********************************************************************************

unregister_globals();
$PARAM = array_merge($_GET, $_POST);
$sort = urlencode($PARAM['sort']);
$list = urlencode($PARAM['list']);

if($sort == "") { $sort = "ALL"; }
if($list == "") { $list = "extranet_list"; }

$content = <<<EOF

<title>
GMAO Shared Model Development
</title>
<meta http-equiv="refresh" content="300">

<H1 align=center >
<font color=darkred>
GMAO GEOS-5 Shared Model Development
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
</tt>

<center>
<B> <a href="index.php?list=extranet_cli_list">  <font size=5 color=darkblue>  Climate  </font> </a> &nbsp; &nbsp; </B>
<B> <a href="index.php?list=extranet_rep_list">  <font size=5 color=darkblue>  Replay   </font> </a> &nbsp; &nbsp; </B>
<B> <a href="index.php?list=extranet_ana_list">  <font size=5 color=darkblue>  Analysis </font> </a> &nbsp; &nbsp; </B>
<B> <a href="index.php"                       >  <font size=5 color=red     >  (All)    </font> </a> &nbsp; &nbsp; </B>


<table cellspacing=1 cellpadding=08 border=12 bordercolor=#2d73b9>
<tr>
   <th align=center                  > ExpID   </th>
   <th align=center                  > UsrID   </th>
   <th align=center bgcolor = #dddddd> Rslv    </th>
   <th align=center                  > Date    </th>
   <th align=center bgcolor = #dddddd> Control </th>
   <th align=center                  > Description / Changes from Control </th>
</tr>

<br><br>

EOF;
echo $content;

sortlist ($sort,$list);

$content = <<<EOF

</table>
</center>


<br><br>
<a href="../index.php"> <b><font color=darkred>Home</font></a> (GMAO Shared Model Development) </b>


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

function sortlist ($sort,$list) {
     if( $sort=="ALL" ) { $dummy = system ( "cat        $list"); }
     else               { $dummy = system ( "grep $sort $list"); }
return; }

?>
