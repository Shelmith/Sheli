<footer class="footer"><p>Copyright, RMS 2017</p></footer>
<script type="text/javascript"></script>
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/global/scripts/app.min.js"></script>
      <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="../assets/apps/scripts/calendar.min.js" type="text/javascript"></script>
    <!-- Metis Menu Js -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="../assets/js/custom-scripts.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
		  function setHeight() {
		    windowHeight = $(window).innerHeight();
		    $('.page-wrapper').css('min-height', windowHeight);
		  };
		  setHeight();
		  
		  $(window).resize(function() {
		    setHeight();
		  });
		});
    </script>
    <script type="text/javascript">  
    $(function(){
     $('.checkbox').on('change',function(){
        $('#form').submit();
        });
    });
</script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii"
    });
</script> 
<script type="text/javascript">
    $(document).ready(function() {
 
  $('.method').on('click', function() {
    $('.method').removeClass('blue-border');
    $(this).addClass('blue-border');
  });
 
});

    var $cardInput = $('.input-fields input');
 
$('.next-btn').on('click', function(e) {
 
  $cardInput.removeClass('warning');
 
  $cardInput.each(function() {    
     var $this = $(this);
     if (!$this.val()) {
       $this.addClass('warning');
     }
  })
});
</script>
    <script src="../assets/js/canvasjs.min.js"></script>
   
</body>

</html>
