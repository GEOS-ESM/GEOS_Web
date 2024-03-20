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
Residual Time Series Statistics: Radiance Obs <br>
</font> </H1>

</center>

<script language="javascript">
<!--
function leapto(form)
     {  var region     = form.region.selectedIndex ;
        var type       = form.type.selectedIndex   ;
        var comps      = form.comps.selectedIndex   ;
        var season     = form.season.selectedIndex ;
        var instrument = form.instrument.selectedIndex ;
        window.location = (form.instrument.options[instrument].value) 
                                            + "_" + (form.type.options[type].value) 
                                            + "_" + (form.comps.options[comps].value) 
                                            + "_" + (form.region.options[region].value) 
                                            + "_" + (form.season.options[season].value) + ".gif" }
//-->
</script>

<script language="javascript">
<!--
function getval(form)
     {  var region     = form.region.selectedIndex ;
        var type       = form.type.selectedIndex   ;
        var season     = form.season.selectedIndex ;
        var instrument = form.instrument.selectedIndex ;
     }
//-->
</script>

<form name="myform">
                                                                                                                                   
Select Statistics <br>
<select name="type" onChange="getval(this.form)">
   <option selected value="TSMEAN" > Mean Bias                       </option>
   <option          value="TSRMS"  > Root Mean Square Bias           </option>
</select>

<p> Select Case <br>
<select name="comps" onChange="getval(this.form)">
<option selected value="self"> Self </option>
<option          value="omf">  OmF  </option>
<option          value="oma">  OmA  </option>
</select>
</p>

<p> Select Region <br>
<select name="region" onChange="getval(this.form)">
   <option selected value="all"> Global                           </option>
   <option          value="nh" > Northern Hemisphere ExtraTropics </option>
   <option          value="sh" > Southern Hemisphere ExtraTropics </option>
   <option          value="tr" > Tropics                          </option>
   <option          value="nam"> North America                    </option>
   <option          value="eur"> Europe                           </option>
   <option          value="asi"> Asia                             </option>
   <option          value="aus"> Australia                        </option>
   <option          value="afr"> Africa                           </option>
</select>
</p>

<p>
Select Platform/Instrument <br>
<select name="instrument" onChange="getval(this.form)">
   <option selected value="goss08"> Platform/Instrument              </option>
   <option          value="goes08"> GOES-08                          </option>
   <option          value="goes09"> GOES-09                          </option>
   <option          value="goes10"> GOES-10                          </option>
   <option          value="goes11"> GOES-11                          </option>
   <option          value="goes12"> GOES-12                          </option>
   <option          value="hirs2n14"> NOAA-14 HIRS/2                 </option>
   <option          value="msun14">   NOAA-14 MSU                    </option>
   <option          value="amsuan15"> NOAA-15 AMSU-A                 </option>
   <option          value="amsubn15"> NOAA-15 AMSU-B                 </option>
   <option          value="hirs3n16"> NOAA-16 HIRS/3                 </option>
   <option          value="amsuan16"> NOAA-16 AMSU-A                 </option>
   <option          value="amsubn16"> NOAA-16 AMSU-B                 </option>
   <option          value="hirs3n17"> NOAA-17 HIRS/3                 </option>
   <option          value="amsuan17"> NOAA-17 AMSU-A                 </option>
   <option          value="amsubn17"> NOAA-17 AMSU-B                 </option>
   <option          value="hirs4n18"> NOAA-18 HIRS/4                 </option>
   <option          value="airsaqa">  AQUA AIRS                      </option>
   <option          value="amsuaaqa"> AQUA EOS_AMSUA                 </option>
   <option          value="hsbaqa"> AQUA HSB                         </option>
</select>
</p>

<p>
Select Month <br>
<select name="season" onChange="getval(this.form)">
<option selected value="jan"> January   </option>
<option          value="feb"> February  </option>
<option          value="mar"> March     </option>
<option          value="apr"> April     </option>
<option          value="may"> May       </option>
<option          value="jun"> June      </option>
<option          value="jul"> July      </option>
<option          value="aug"> August    </option>
<option          value="sep"> September </option>
<option          value="oct"> October   </option>
<option          value="nov"> November  </option>
<option          value="dec"> December  </option>
</select>
</p>

Now, submit your request <br>
<select name="submit" onChange="leapto(this.form)">
<option selected value="Submit"> Submit </option>
<option          value="Submit"> Submit </option>
</select>

</form>

<!-- td bgcolor=aliceblue><font color=darkblue face=helvetica><b>

</b>
</font>
</td -->


<br>
     <li> <a href="../index.php"> <b><font color=darkred>Home</font></a> (<?php include( "../expid" ); ?>) </b> </li>
    </ul>
                                                                                                  
<?php
                                                                                                  
// Render any master page footer tags, if necessary.
//$page->renderPageFooters();
                                                                                                  
?>
