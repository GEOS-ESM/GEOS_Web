<!DOCTYPE html>

<html>
  <head>
    <?php 
       include "globals.php";
       $obsplotdir=$obsdir."/reynolds/pics";
    ?>
    <title> GMAO Experiment: <?php echo $expid ?></title>
    <link style="text/css" href="main.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <a href="../../pages/iceocn/index.php?expid=<?php echo $expid ?>"> &#x21E7 Up</a> | 
      <span class="page-title"><?php echo $expid ?>: Sea Surface Temperature</span> |
      <a href="../../pages/iceocn/sss.php?expid=<?php echo $expid ?>">Next &#x21E8</a> | 
      <div class="dropdown">
	<button>Subplots</button>
	<div class="dropdown-content">
	  <a href="#ANN">Annual Mean</a>
	  <a href="#DJF">December-January-February</a>
	  <a href="#JJA">June-July-August</a>
	  <a href="#GM">Global Mean</a>
	  <a href="#EQ">Equatorial Profile</a>
	  <a href="#AC">Annual Cycle</a>
	  <a href="#HOV">Hovmoler</a>
	</div>
      </div> | 
      <a href="<?php echo $expdir ?>/pages/index.php?dir=plots_ocn&expid=<?php echo $expid ?>">Image sources</a>
    </header>
    
    <div class="plots">
      <figure id="ANN">
	<figcaption>Annual Mean</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/sst_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sst_am.png" alt="SST">
	  </a>
	  <a href="<?php echo $plotdir ?>/sst-obs_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sst-obs_am.png" alt="SST-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/sst_lev_am.png" target="_blanc">Reynolds SST, ANN</a></p>
      </figure>

      <figure id="DJF">
	<figcaption>December-January-February</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/sst_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sst_djf.png" alt="SST december-january-february">
	  </a>
	  <a href="<?php echo $plotdir ?>/sst-obs_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sst-obs_djf.png" alt="SST-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/sst_lev_djf.png" target="_blanc">Reynolds SST, DJF</a></p>
      </figure>

      <figure id="JJA">
	<figcaption>June-July-August</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/sst_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sst_jja.png" alt="SST june-july-august">
	  </a>
	  <a href="<?php echo $plotdir ?>/sst-obs_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sst-obs_jja.png" alt="SST-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/sst_lev_jja.png" target="_blanc">Reynolds SST, JJA</a></p>
      </figure>

      <figure id="GM">
	<figcaption>Global Mean</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/sst_gm.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sst_gm.png" alt="SST global mean" width="100%">
	  </a>
	</div>
      </figure>

      <figure id="EQ">
	<figcaption>Equatorial Pacific Profile</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/sst_eq_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sst_eq_am.png" alt="SST equatorial profile">
	  </a>
	  <a href="<?php echo $plotdir ?>/sst_eq_std.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sst_eq_std.png" alt="SST variance equatorial profile">
	  </a>
	</div>
      </figure>
      
      <figure id="AC">
	<figcaption>Equatorial Pacific Annual Cycle</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/sst_eq_ac.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/sst_eq_ac.png" alt="SST equatorial annual cycle">
	  </a>
	  <a href="<?php echo $obsplotdir?>/sst_lev_eq_ac.png" target="_blanc">
	    <img src="<?php echo $obsplotdir?>/sst_lev_eq_ac.png" alt="Reynolds SST equatorial annual cycle">
	  </a>
	</div>
      </figure>

      <figure id="HOV">
	<figcaption>Equatorial Pacific Time Series</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/hov_tp.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/hov_tp.png" alt="SST equatorial pacific Hovmoller diagram">
	  </a>
	  <a href="<?php echo $plotdir ?>/n3.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/n3.png" alt="Nino3 index">
	  </a>
	</div>
      </figure>
    </div>

  </body>
</html>
