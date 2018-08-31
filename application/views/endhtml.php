<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');?>"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/js/vendor/jquery.min.js');?>"><\/script>')</script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo base_url('assets/js/vendor/holder.min.js');?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.elevatezoom.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/gallery/isotope.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/magnific-popup/magnific-popup.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>     
    <script src="<?php echo base_url('assets/js/jquery.nicescroll.js');?>" type="text/javascript"></script>
    <script type="text/javascript">
        $(window).load(function(){
            var $container = $('.portfolioContainer');
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            $('.portfolioFilter a').click(function(){
                $('.portfolioFilter .current').removeClass('current');
                $(this).addClass('current');

                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            }); 
        });
        $(document).ready(function() {
            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        });
        $('#myModal').modal('show');
        $('#zoom_01').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair",
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 750
       }); 
        //Date picker
        $('#datepicker').datepicker({
          autoclose: true
        });
        $('#datepicker2').datepicker({
          autoclose: true
        });
        //Timepicker
        jQuery('#timepicker').timepicker({showMeridian: false});
        jQuery('#timepicker2').timepicker({showMeridian: false});     
    </script>
  </body>
</html>