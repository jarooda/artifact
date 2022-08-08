	<link rel="stylesheet" type="text/css" href="css/template.min.css" />
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<script src="js/jquery.parallax.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function(){
    // Declare parallax on layers
    jQuery('.parallax-layer').parallax({
      mouseport: jQuery("#port"),
      yparallax: false
    });
  });
  </script>
	<style type="text/css" media="screen, projection">
    #port {
        margin: 1.5em 0px;
        overflow: hidden;
        position: relative;
        /* width: 800px; */
        height: 260px;
        border-left: 1px solid black;
        border-right: 1px solid black;
        padding: 24px 24px;
    }

    .parallax-layer {
        position: absolute;
    }
    
    /* Horizontal lists of inline-blocks, with image backgrounds as thumbnails */
    /* Tested in Safari 4 | FF 3.5 | Opera 9.6 | IE7 */ 
    .thumbs_index {
        padding: 0 12px;
        /* initial position */
        left: 0;
        /* Put all he thumbs on one line. */
        white-space: nowrap;
    }
    
    .thumbs_index > li {
        display: inline;
        margin-right: 12px;
    }
    
    .img_thumb {
      width: 155px;
        height: 215px;
		-webkit-border-radius:5px;
         -moz-border-radius:5px;
              box-border-radius:5px;
      -webkit-box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
         -moz-box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
              box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
    }
  </style>
<div class="content-slide">
<div class="site_wrap wrap">
<div id="port">
      <!-- List must be spaceless becuse <li>s are display: inline, and any spaces between them show in IE -->
      <ul class="thumbs_index index parallax-layer">
	  <?php
	  $slide_buku = mysql_query("SELECT * FROM buku ORDER BY RAND() LIMIT 0,10");
	  while ($ss = mysql_fetch_array($slide_buku)){
        echo "<li><a class='img_thumb thumb' href=buku.php?id=$ss[buku_kode]";?> style="background: url('<?php echo"img_buku/$ss[gambar]"; ?>'); <?php echo 'background-size: 100%;"></a></li>';
		}
		?>
      </ul>
    </div>
	</div>
</div>