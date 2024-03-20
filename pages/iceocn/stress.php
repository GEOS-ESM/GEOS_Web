<!DOCTYPE html>

<html>
  <head>
    <?php 
       include "globals.php";
       $obsplotdir=$obsdir."/qscat/pics";
    ?>
    <title> GMAO Experiment: <?php echo $expid ?></title>
    <link style="text/css" href="main.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <a href="../../pages/iceocn/index.php?expid=<?php echo $expid ?>"> &#x21E7 Up</a> | 
      <a href="../../pages/iceocn/precip.php?expid=<?php echo $expid ?>"> &#x21E6 Prev</a> | 
      <span class="page-title"><?php echo $expid ?>: Wind Stress</span> |
      <a href="../../pages/iceocn/temp-salt.php?expid=<?php echo $expid ?>">Next &#x21E8</a> | 
      <div class="dropdown">
	<button>Subplots</button>
	<div class="dropdown-content">
	  <a href="#ANN">Annual Mean</a>
	  <a href="#DJF">December-January-February</a>
	  <a href="#JJA">June-July-August</a>
	  <a href="#EQ">Equatorial Profile</a>
	  <a href="#AC">Annual Cycle</a>
	</div>
      </div> | 
      <a href="<?php echo $expdir ?>/pages/index.php?dir=plots_ocn&expid=<?php echo $expid ?>">Image sources</a>
    </header>
    
    <div class="plots">
      <figure id="ANN">
	<figcaption>Annual Mean</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/tau_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/tau_am.png" alt="TAU">
	  </a>
	  <a href="<?php echo $plotdir ?>/tau-obs_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/tau-obs_am.png" alt="TAU-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/tau_am_qscat.png" target="_blanc">QSCAT Stress, ANN</a></p>
      </figure>

      <figure id="DJF">
	<figcaption>December-January-February</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/tau_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/tau_djf.png" alt="TAU december-january-february">
	  </a>
	  <a href="<?php echo $plotdir ?>/tau-obs_djf.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/tau-obs_djf.png" alt="TAU-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/tau_djf_qscat.png" target="_blanc">QSCAT Stress, DJF</a></p>
      </figure>

      <figure id="JJA">
	<figcaption>June-July-August</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/tau_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/tau_jja.png" alt="TAU june-july-august">
	  </a>
	  <a href="<?php echo $plotdir ?>/tau-obs_jja.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/tau-obs_jja.png" alt="TAU-OBS">
	  </a>
	</div>
	<p><a href="<?php echo $obsplotdir?>/tau_jja_qscat.png" target="_blanc">QSCAT Stress, JJA</a></p>
      </figure>

      <figure id="EQ">
	<figcaption>Equatorial Pacific Profile</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/taux_eq_am.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/taux_eq_am.png" alt="TAUX equatorial profile">
	  </a>
	</div>
      </figure>
      
      <figure id="AC">
	<figcaption>Equatorial Pacific Annual Cycle</figcaption>
	<div class="img-container">
	  <a href="<?php echo $plotdir ?>/taux_eq_ac.png" target="_blanc">
	    <img src="<?php echo $plotdir ?>/taux_eq_ac.png" alt="TAUX equatorial annual cycle">
	  </a>
	  <a href="<?php echo $obsplotdir?>/taux_eq_ac_qscat.png" target="_blanc">
	    <img src="<?php echo $obsplotdir?>/taux_eq_ac_qscat.png" alt="TAUX equatorial annual cycle">
	  </a>
	</div>
      </figure>
    </div>

  </body>
</html>
