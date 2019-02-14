<?php
  include_once "inc/header.php";
  include_once "inc/sidebar.php";
?>
          <h3 class="page-heading mb-4">Forms</h3>
          <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Basic form elements</h5>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control p-input" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea">Example textarea</label>
                      <textarea class="form-control p-input" id="exampleTextarea" rows="5" placeholder="Let us type some loremm ipsum...."></textarea>
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <label>
                          <input type="checkbox" class="form-check-input">
                          Check me out
                        </label>
                      </div>
                      <div class="form-check disabled">
                        <label>
                          <input type="checkbox" disabled class="form-check-input">
                          Disabled Checkbox
                        </label>
                      </div>
                      <div class="form-radio">
                        <label>
                          <input name="sample" value="" type="radio">
                          Radio option 1
                        </label>
                      </div>
                      <div class="form-radio">
                        <label>
                          <input name="sample" value="" type="radio">
                          Radio option 2
                        </label>
                      </div>
                      <div class="form-radio disabled">
                        <label>
                          <input name="sample" value="" type="radio" disabled>
                          Disabled Radio option
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php
include_once "inc/footer.php";
?>