<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>
          <h3 class="page-heading mb-4">Bootstrap Tables</h3>
          <div class="row mb-2">
            <div class="col-lg-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Basic Table</h5>
                  <table class="table">
                    <thead>
                      <tr class="">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Striped Table</h5>
                  <table class="table table-striped">
                    <thead>
                      <tr class="">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Hoverable Table</h5>
                  <table class="table table-hover">
                    <thead>
                      <tr class="">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Table with contextual classes</h5>
                  <table class="table">
                    <thead>
                      <tr class="text-primary">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="table-active">
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr class="table-success">
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr class="table-warning">
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                      <tr class="table-danger">
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr class="table-info">
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Advanced Table</h5>
                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead>
                        <tr class="text-primary">
                          <th>No</th>
                          <th>Invoice Subject</th>
                          <th>Client</th>
                          <th>VatNo.</th>
                          <th>Created</th>
                          <th>Status</th>
                          <th>Price</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="">
                          <td>034</td>
                          <td>Designs</td>
                          <td>Client</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-success">Approved</label></td>
                          <td>$349</td>
                          <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td>
                          <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td>
                        </tr>
                        <tr class="">
                          <td>035</td>
                          <td>Designs</td>
                          <td>Client</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-warning">Approved</label></td>
                          <td>$349</td>
                          <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td>
                          <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td>
                        </tr>
                        <tr class="">
                          <td>036</td>
                          <td>Designs</td>
                          <td>Client</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-success">Approved</label></td>
                          <td>$349</td>
                          <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td>
                          <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td>
                        </tr>
                        <tr class="">
                          <td>037</td>
                          <td>Designs</td>
                          <td>Client</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-danger">Rejected</label></td>
                          <td>$349</td>
                          <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td>
                          <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td>
                        </tr>
                        <tr class="">
                          <td>038</td>
                          <td>Designs</td>
                          <td>Client</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-success">Approved</label></td>
                          <td>$349</td>
                          <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td>
                          <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
<?php
include_once "inc/footer.php";
?>