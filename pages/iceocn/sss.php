<!DOCTYPE html>

<html>
  <head>
    <?php 
       include "globals.php";
       $obsplotdir=$obsdir."/levitus/pics";
    ?>
    <title> GMAO Experiment: <?php echo $expid ?></title>
    <link style="text/css" href="main.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <a href="../../pages/iceocn/index.php?expid=<?php echo $expid ?>"> &#x21E7 Up</a> | 
      <a href="../../pages/iceocn/sst.php?expid=<?php echo $expid ?>"> &#x21E6 Prev</a> | 
      <span class="page-title"><?php echo $expid ?>: Sea Surface Salinity</span> |
      <a href="../../pages/iceocn/precip.php?expid=<?php echo $expid ?>">Next &#x21E8</a> | 
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
	  <a href="<?php echo $plotdir ?>/sss_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sss_am.png" alt="SSS">
	  </a>
	  <a href="<?php echo $plotdir ?>/sss-obs_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sss-obs_am.png" alt="SSS-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/sss_lev_am.png" target="_blanc">Levitus SSS, ANN</a></p>
      </figure>

      <figure id="DJF">
	<figcaption>December-January-February</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/sss_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sss_djf.png" alt="SSS december-january-february">
	  </a>
	  <a href="<?php echo $plotdir ?>/sss-obs_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sss-obs_djf.png" alt="SSS-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/sss_lev_djf.png" target="_blanc">Levitus SSS, DJF</a></p>
      </figure>

      <figure id="JJA">
	<figcaption>June-July-August</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/sss_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sss_jja.png" alt="SSS june-july-august">
	  </a>
	  <a href="<?php echo $plotdir ?>/sss-obs_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sss-obs_jja.png" alt="SSS-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/sss_lev_jja.png" target="_blanc">Levitus SSS, JJA</a></p>
      </figure>
    </div>

  </body>
</html>
