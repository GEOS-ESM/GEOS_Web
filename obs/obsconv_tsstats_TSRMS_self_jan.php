<?php

//---------------------------------------------------------------------------
//
// Copyright (c) 2002, Halcyon Systems, inc. All rights reserved.
//
// Author: M. McNamara, K. Kauper
// Date:   15 Jan 2002
//
//---------------------------------------------------------------------------


// Create the Web Title
//---------------------
?>
 <title>
GMAO <?php include( "../expid" ); ?>
</title>

<?php
// Create the master page object
//------------------------------
?>

<H1 align=center > 
<font color=darkred>
GMAO <?php include( "../expid" ); ?> <br>
Residual Time Series Statistics <br>
</font> </H1>

<center>

<script language="javascript">
<!--
function leapto(form)
     {  var type   = form.type.selectedIndex   ;
        var comps  = form.comps.selectedIndex ;
        var season = form.season.selectedIndex ;
        window.location = "obsconv_tsstats" + "_" + (form.type.options[type].value) 
                                            + "_" + (form.comps.options[comps].value) 
                                            + "_" + (form.season.options[season].value) + ".php" }
//-->
</script>

<center>
<form name="myform">
                                                                                                                                   
<select name="type" onChange="leapto(this.form)">
   <option          value="TSMEAN" > Mean                            </option>
   <option selected value="TSRMS"  > Root Mean Square                </option>
</select>

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                             
<select name="comps" onChange="leapto(this.form)">
<option selected value="self"> Self </option>
<option          value="omf">  OmF  </option>
<option          value="oma">  OmA  </option>
</select>

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

<select name="season" onChange="leapto(this.form)">
<option selected value="jan"> January </option>
<option          value="feb"> February</option>
<option          value="mar"> March   </option>
<option          value="apr"> April   </option>
<option          value="may"> May     </option>
<option          value="jun"> June    </option>
<option          value="jul"> July    </option>
<option          value="aug"> August  </option>
<option          value="sep"> September</option>
<option          value="oct"> October </option>
<option          value="nov"> November</option>
<option          value="dec"> December</option>
</select>
                                                                                                                                   
</form>
</center>


<!-- td bgcolor=aliceblue><font color=darkblue face=helvetica><b>

</b>
</font>
</td -->

<br>

<!--
**************************************************************************************
****                                                                              ****
****                  Create Blank Field/Level Matrix                             ****
****                                                                              ****
****                                                                              ****
**************************************************************************************
-->

<H3 align=center > 
<font color=darkred>
Conventional Observing Network <br>
</font> </H3>

<table cellspacing=1 cellpadding=8 border=12 bordercolor=#497fbf width=85%>

<tr>
   <th align=center                  > Field      </th>
   <th align=center bgcolor = #dddddd> Global </th>
   <th align=center                  > NH     </th>
   <th align=center bgcolor = #dddddd> SH     </th>
   <th align=center                  > TR     </th>
   <th align=center bgcolor = #dddddd> NA     </th>
   <th align=center                  > EU     </th>
   <th align=center bgcolor = #dddddd> AU     </th>
   <th align=center                  > AS     </th>
   <th align=center bgcolor = #dddddd> AF     </th>
</tr>


<tr>
   <th align=center > <font color=darkblue> U-Raob </font> </th> 
   <td align=center bgcolor = #dddddd> <a href=" uwndraob_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uwndraob_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uwndraob_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uwndraob_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uwndraob_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uwndraob_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uwndraob_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uwndraob_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uwndraob_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> V-Raob </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vwndraob_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vwndraob_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vwndraob_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vwndraob_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vwndraob_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vwndraob_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vwndraob_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vwndraob_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vwndraob_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>


<tr>
   <th align=center > <font color=darkblue> Tv-Raob </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vtmpraob_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vtmpraob_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vtmpraob_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vtmpraob_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vtmpraob_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vtmpraob_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vtmpraob_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vtmpraob_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vtmpraob_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> Q-Raob </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" qraob_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" qraob_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" qraob_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" qraob_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" qraob_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" qraob_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" qraob_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" qraob_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" qraob_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> T aircft MDCARS </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" tacmdcars_TSRMS_self_all_JAN_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacmdcars_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacmdcars_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacmdcars_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacmdcars_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacmdcars_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacmdcars_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacmdcars_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacmdcars_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> U aircft MDCARS </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" uacmdcars_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacmdcars_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacmdcars_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacmdcars_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacmdcars_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacmdcars_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacmdcars_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacmdcars_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacmdcars_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> V aircft MDCARS </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vacmdcars_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacmdcars_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacmdcars_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacmdcars_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacmdcars_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacmdcars_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacmdcars_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacmdcars_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacmdcars_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> T aircft SDAR </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" tacsdar_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacsdar_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacsdar_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacsdar_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacsdar_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacsdar_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacsdar_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacsdar_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacsdar_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> U aircft SDAR </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" uacsdar_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacsdar_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacsdar_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacsdar_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacsdar_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacsdar_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacsdar_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacsdar_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacsdar_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> V aircft SDAR </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vacsdar_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacsdar_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacsdar_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacsdar_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacsdar_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacsdar_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacsdar_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacsdar_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacsdar_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> T aircft A/PIREP </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" tacairep_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacairep_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacairep_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacairep_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacairep_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacairep_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacairep_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tacairep_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tacairep_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> U aircft A/PIREP </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" uacairep_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacairep_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacairep_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacairep_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacairep_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacairep_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacairep_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uacairep_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uacairep_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> V aircft A/PIREP </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vacairep_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacairep_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacairep_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacairep_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacairep_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacairep_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacairep_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vacairep_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vacairep_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> U Profile </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" uwndprof_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uwndprof_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uwndprof_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uwndprof_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uwndprof_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uwndprof_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uwndprof_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" uwndprof_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" uwndprof_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> V Profile </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vwndprof_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vwndprof_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vwndprof_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vwndprof_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vwndprof_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vwndprof_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vwndprof_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vwndprof_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vwndprof_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>
                                                                                                                                                             
<tr>
   <th align=center > <font color=darkblue> Dropsond Temperatures </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" tdropsnd_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tdropsnd_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tdropsnd_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tdropsnd_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tdropsnd_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tdropsnd_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tdropsnd_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" tdropsnd_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" tdropsnd_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>
                                                                                                                                                             
<tr>
   <th align=center > <font color=darkblue> Dropsond U wind </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" udropsnd_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" udropsnd_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" udropsnd_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" udropsnd_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" udropsnd_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" udropsnd_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" udropsnd_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" udropsnd_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" udropsnd_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> Dropsond V wind </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vdropsnd_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vdropsnd_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vdropsnd_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vdropsnd_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vdropsnd_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vdropsnd_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vdropsnd_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vdropsnd_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vdropsnd_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> Pibal U wind </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" upibal_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" upibal_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" upibal_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" upibal_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" upibal_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" upibal_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" upibal_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" upibal_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" upibal_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> Pibal V wind </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vpibal_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vpibal_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vpibal_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vpibal_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vpibal_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vpibal_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vpibal_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vpibal_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vpibal_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> Pilot U wind </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" upilotvec_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" upilotvec_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" upilotvec_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" upilotvec_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" upilotvec_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" upilotvec_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" upilotvec_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" upilotvec_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" upilotvec_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> Pilot V wind </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vpilotvec_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vpilotvec_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vpilotvec_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vpilotvec_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vpilotvec_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vpilotvec_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vpilotvec_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vpilotvec_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vpilotvec_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>


<tr>
   <th align=center > <font color=darkblue> U Cloud Dft GMS-5 </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgms_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgms_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgms_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgms_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgms_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgms_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgms_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgms_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgms_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>
                                                                                                                                                             
<tr>
   <th align=center > <font color=darkblue> V Cloud Dft GMS-5 </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgms_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgms_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgms_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgms_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgms_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgms_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgms_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgms_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgms_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> U Cloud Dft METEOSAT </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" ucdtmsat_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtmsat_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtmsat_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtmsat_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtmsat_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtmsat_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtmsat_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtmsat_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtmsat_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> V Cloud Dft METEOSAT </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vcdtmsat_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtmsat_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtmsat_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtmsat_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtmsat_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtmsat_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtmsat_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtmsat_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtmsat_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> U NEXRAD </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" unexrad_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" unexrad_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" unexrad_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" unexrad_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" unexrad_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" unexrad_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" unexrad_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" unexrad_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" unexrad_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> V NEXRAD </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vnexrad_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vnexrad_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vnexrad_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vnexrad_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vnexrad_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vnexrad_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vnexrad_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vnexrad_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vnexrad_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> U Cloud Dft GOES-8/10-IR </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgoesir_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgoesir_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgoesir_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgoesir_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgoesir_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgoesir_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgoesir_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgoesir_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgoesir_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>
                                                                                                                                                             
<tr>
   <th align=center > <font color=darkblue> V Cloud Dft GOES-8/10-IR </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgoesir_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgoesir_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgoesir_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgoesir_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgoesir_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgoesir_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgoesir_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgoesir_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgoesir_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> U Cloud Dft GOES-8/10-WV </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgoeswv_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgoeswv_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgoeswv_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgoeswv_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgoeswv_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgoeswv_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgoeswv_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" ucdtgoeswv_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" ucdtgoeswv_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>

<tr>
   <th align=center > <font color=darkblue> U Cloud Dft GOES-8/10-WV </font> </th>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgoeswv_TSRMS_self_all_jan.gif"    target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgoeswv_TSRMS_self_nh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgoeswv_TSRMS_self_sh_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgoeswv_TSRMS_self_tr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgoeswv_TSRMS_self_nam_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgoeswv_TSRMS_self_eur_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgoeswv_TSRMS_self_aus_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center                  > <a href=" vcdtgoeswv_TSRMS_self_asi_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
   <td align=center bgcolor = #dddddd> <a href=" vcdtgoeswv_TSRMS_self_afr_jan.gif" target=""> <img src=../check.jpg border=0></a> </td>
</tr>


</table>

<br>
     <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (<?php include( "../expid" ); ?>) </b> </li>
    </ul>
                                                                                                  
<?php
                                                                                                  
// Render any master page footer tags, if necessary.
//$page->renderPageFooters();
                                                                                                  
?>
