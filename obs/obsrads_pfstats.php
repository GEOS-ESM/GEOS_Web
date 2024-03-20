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
Residual Radiance Statistics <br>
</font> </H1>

</center>

<script language="javascript">
<!--
function leapto(form)
     {  var region     = form.region.selectedIndex ;
        var type       = form.type.selectedIndex   ;
        var comps      = form.comps.selectedIndex ;
        var season     = form.season.selectedIndex ;
        var instrument = form.instrument.selectedIndex ;
        var channel    = form.channel.selectedIndex ;
        window.location = (form.instrument.options[instrument].value) 
                                            + "_" + (form.type.options[type].value) 
                                            + "_" + (form.comps.options[comps].value) 
                                            + "_" + (form.channel.options[channel].value) 
                                            + "_" + (form.season.options[season].value) + ".gif" }
//-->
</script>

<script language="javascript">
<!--
function getval(form)
     {  var region     = form.region.selectedIndex ;
        var type       = form.type.selectedIndex   ;
        var comps      = form.comps.selectedIndex   ;
        var season     = form.season.selectedIndex ;
        var instrument = form.instrument.selectedIndex ;
        var channel    = form.channel.selectedIndex ;
     }
//-->
</script>

<form name="myform">
                                                                                                                                   
Select Statistics <br>
<select name="type" onChange="getval(this.form)">
   <option selected value="BMEAN" > Mean Bias                       </option>
   <option          value="BRMS"  > Root Mean Square Bias           </option>
   <option          value="SRMS"  > Root Mean Square Deviation      </option>
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
   <option selected value="GLO"> Global                           </option>
   <option          value="NHE"> Northern Hemisphere ExtraTropics </option>
   <option          value="SHE"> Southern Hemisphere ExtraTropics </option>
   <option          value="TRO"> Tropics                          </option>
   <option          value="NWQ"> North-West Quadrant              </option>
   <option          value="NEQ"> North-East Quadrant              </option>
   <option          value="SWQ"> South-West Quadrant              </option>
   <option          value="SEQ"> South-East Quadrant              </option>
   <option          value="NAM"> North America                    </option>
   <option          value="EUR"> Europe                           </option>
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
   <option          value="amsuan18"> NOAA-18 AMSU-A                 </option>
   <option          value="amsubn18"> NOAA-18 AMSU-B                 </option>
   <option          value="hirs4n18"> NOAA-18 HIRS/4                 </option>
   <option          value="airsaqa">  AQUA AIRS                      </option>
   <option          value="amsuaaqa"> AQUA EOS_AMSUA                 </option>
   <option          value="hsbaqa"> AQUA HSB                         </option>
</select>
</p>

<p>
Select Channel <br>
<select name="channel" onChange="getval(this.form)">
<option selected value="1"> 1 </option>
<option          value="2"> 2 </option>
<option          value="3"> 3 </option>
<option          value="4"> 4 </option>
<option          value="5"> 5 </option>
<option          value="6"> 6 </option>
<option          value="7"> 7 </option>
<option          value="8"> 8 </option>
<option          value="9"> 9 </option>
<option          value="10"> 10 </option>
<option          value="11"> 11 </option>
<option          value="12"> 12 </option>
<option          value="13"> 13 </option>
<option          value="14"> 14 </option>
<option          value="15"> 15 </option>
<option          value="16"> 16 </option>
<option          value="17"> 17 </option>
<option          value="18"> 18 </option>
<option          value="19"> 19 </option>
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
