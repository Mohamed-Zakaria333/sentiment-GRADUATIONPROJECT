 <!--main content end-->
    <!--footer start-->
    <footer class="site-footer" style="

    margin-top: 35%;
    




    ">
      <div class="text-center" >
        <p>
          &copy; Copyrights <strong>graduation 2019</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{url($Lib_admin_path)}}/jquery/jquery.min.js"></script>

  <script src="{{url($Lib_admin_path)}}/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="{{url($Lib_admin_path)}}/jquery.dcjqaccordion.2.7.js"></script>
  <script src="{{url($Lib_admin_path)}}/jquery.scrollTo.min.js"></script>
  <script src="{{url($Lib_admin_path)}}/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="{{url($Lib_admin_path)}}/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="{{url($Lib_admin_path)}}/common-scripts.js"></script>
  <script type="text/javascript" src="{{url($Lib_admin_path)}}/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="{{url($Lib_admin_path)}}/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="{{url($Lib_admin_path)}}/sparkline-chart.js"></script>
  <script src="{{url($Lib_admin_path)}}/zabuto_calendar.js"></script>

  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
<!-- //======================================================================= -->
<script>
function defaultValue_mail() {
  document.getElementById("input-message").defaultValue = "Dear Customer,Thank you for reaching out to Grindek support desk. We have received your email, and our support team will be in touch with you soon.";
}


</script>
  <script type="text/javascript">
    function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#pro-image').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#file-image").change(function() {
  readURL(this);
});
  </script>
<!-- //========================================================================= -->


<!-- //============================== -->












 

@yield('custom_scripts')

<!-- //========================================================================= -->
</body>

</html>
