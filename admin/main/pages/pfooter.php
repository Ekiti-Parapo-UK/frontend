<?php include_once('password_changer.php'); ?>
<script src="../lib/jquery/jquery.js"></script>
<script src="../lib/jquery-ui/jquery-ui.js"></script>
<script src="../lib/bootstrap/js/bootstrap.js"></script>
<script src="../lib/jquery-toggles/toggles.js"></script>

<script src="../lib/wysihtml5x/wysihtml5x.js"></script>
<script src="../lib/wysihtml5x/wysihtml5x-toolbar.js"></script>

<!--New-->
<script src="../lib/select2/select2.js"></script>
<script src="../lib/datatables/jquery.dataTables.js"></script>
<script src="../lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<!--New-->

<!--<script src="../lib/morrisjs/morris.js"></script>
<script src="../lib/raphael/raphael.js"></script>

<script src="../lib/flot/jquery.flot.js"></script>
<script src="../lib/flot/jquery.flot.resize.js"></script>
<script src="../lib/flot-spline/jquery.flot.spline.js"></script>

<script src="../lib/jquery-knob/jquery.knob.js"></script>-->

<script src="../lib/summernote/summernote.js"></script>
<script src="../lib/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.all.js"></script>

<script src="../js/quirk.js"></script>
<script src="../js/dashboard.jss"></script>

<script>
$(document).ready(function(){

  'use strict';

  //select
  $('#select1, #select2, #select3, #countryselect1').select2();
  $("#select4").select2({ maximumSelectionLength: 2 });
  $("#select5").select2({ minimumResultsForSearch: Infinity });
  $("#select6").select2({ tags: true });

  // HTML5 WYSIWYG Editor
  $('#text11').wysihtml5({
    toolbar: {
      fa: true
    }
  });


  // Summernote
  $('#text11...').summernote({
    height: 200
  });
  
  

});
</script>



</body>
</html>
<?php $_SESSION['msg'] = "";
