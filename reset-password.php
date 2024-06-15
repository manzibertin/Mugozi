<?php
require 'config.php';

if (!isset($_GET['forgotcode'])) {
    header("location:index.php");
}
class ResetVerify extends Database {
  public function verify($useraccount, $forgotcode){
    if (!empty($useraccount) && !empty($forgotcode)) {
      $query = "SELECT forgot_code FROM account_holders WHERE account_id = '$useraccount'";
      $query = $this->con->prepare($query);
      $query->execute();
   
      $verify = $query->fetch(PDO::FETCH_ASSOC);
   
      if ($verify['forgot_code'] !== $forgotcode) {
         header("location:index");
      }
   }
  }
}

$useraccount = $_GET['usercode'];
$forgotcode = $_GET['forgotcode'];

$verifyparameter = new ResetVerify();
$verifyparameter->verify($useraccount, $forgotcode);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>AFIA FOOD LTD - Reset-Password</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/logo2.png' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Reset Password</h4>
              </div>
              <div class="card-body">
                <p class="text-muted">Enter Your New Password</p>
                <form action="#" class="reset-password">
                  <input type="hidden" name="useraccount" value="<?php echo $useraccount ?>">
                  <input type="hidden" name="forgotcode" value="<?php echo $forgotcode ?>">
                  <div class="alert alert-danger text-center error-text" role="alert" style="display: none"></div>
                  <div class="form-group">
                    <label for="password-confirm">Confirm Code</label>
                    <input type="text" class="form-control" name="code" tabindex="2">
                  </div>
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                      name="password" tabindex="2">
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="confirm-password"
                      tabindex="2">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/bundles/sweetalert/sweetalert.min.js"></script>
  <script src="ajax/js/reset-password.js"></script>
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>

<?php
require 'management/inc/alert.php';
?>

</html>