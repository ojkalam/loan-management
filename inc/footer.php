	        </div>
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">Brack Bank</a> &copy; 2018
            </span>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>

<!-- end of scroller container -->
  </div>
<script src="assets/js/jquery-3.1.0.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/Chart.min.js"></script>
  <script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/chart.js"></script>
  <!-- DataTables JavaScript -->
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/js/dataTables.responsive.js"></script>
  <script>
      $(document).ready(function() {
          $('#example').DataTable({
            responsive: true
        });

      } );


  </script>
</body>
</html>
<?php
ob_end_flush();
?>