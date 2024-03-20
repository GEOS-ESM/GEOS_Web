<!DOCTYPE html>

<html>
  <head>
    <?php 
       include "globals.php";
       $obsplotdir=$obsdir."/gpcp/pics";
    ?>
    <title> GMAO Experiment: <?php echo $expid ?></title>
    <link style="text/css" href="main.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <a href="../../pages/iceocn/index.php?expid=<?php echo $expid ?>"> &#x21E7 Up</a> |
      <a href="../../pages/iceocn/sss.php?expid=<?php echo $expid ?>"> &#x21E6 Prev</a> |
      <span class="page-title"><?php echo $expid ?>: Precipitation</span> |
      <a href="../../pages/iceocn/stress.php?expid=<?php echo $expid ?>">Next &#x21E8</a> |
      <div class="dropdown">
	<button>Subplots</button>
	<div class="dropdown-content">
	  <a href="#ANN">Annual Mean</a>
	  <a href="#DJF">December-January-February</a>
	  <a href="#JJA">June-July-August</a>
	</div>
      </div> | 
      <a href="<?php echo $expdir ?>/pages/index.php?dir=plots_ocn&expid=<?php echo $expid ?>">Image sources</a>
    </header>
    
    <div class="plots">
      <figure id="ANN">
	<figcaption>Annual Mean</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/precip_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/precip_am.png" alt="PRECIP">
	  </a>
	  <a href="<?php echo $plotdir ?>/precip-obs_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/precip-obs_am.png" alt="PRECIP-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/precip_gpcp_am.png" target="_blanc">GPCP Precipitation, ANN</a></p>
      </figure>

      <figure id="DJF">
	<figcaption>December-January-February</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/precip_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/precip_djf.png" alt="PRECIP december-january-february">
	  </a>
	  <a href="<?php echo $plotdir ?>/precip-obs_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/precip-obs_djf.png" alt="PRECIP-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/precip_gpcp_djf.png" target="_blanc">GPCP Precipitation, DJF</a></p>
      </figure>

      <figure id="JJA">
	<figcaption>June-July-August</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/precip_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/precip_jja.png" alt="PRECIP june-july-august">
	  </a>
	  <a href="<?php echo $plotdir ?>/precip-obs_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/precip-obs_jja.png" alt="PRECIP-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/precip_gpcp_jja.png" target="_blanc">GPCP Precipitation, JJA</a></p>
      </figure>
    </div>

  </body>
</html>
