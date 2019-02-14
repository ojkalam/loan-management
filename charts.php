<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>
          <h3 class="page-heading mb-4">Charts</h3>
          <div class="row">
            <div class="col-lg-6 col-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Line chart</h5>
                  <canvas id="lineChart" style="height:250px"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Bar chart</h5>
                  <canvas id="barChart" style="height:230px"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Area chart</h5>
                  <canvas id="areaChart" style="height:250px"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Doughnut chart</h5>
                  <canvas id="doughnutChart" style="height:250px"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Pie chart</h5>
                  <canvas id="pieChart" style="height:250px"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-12 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Scatter chart</h5>
                  <canvas id="scatterChart" style="height:250px"></canvas>
                </div>
              </div>
            </div>
          </div>
<?php
include_once "inc/footer.php";
?>