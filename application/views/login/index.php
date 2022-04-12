
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="ui-resources/images/favicon.png" type="image/x-icon" />
    <title>Helen Of Troy</title>

    <!-- Custom fonts for this template-->
    <link href="ui-resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="ui-resources/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-8 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                          <?php if ($this->session->flashdata('msg') != '') { ?>
                              <div class="alert alert-warning col-lg-12 text-center">
                                  <?= $this->session->flashdata('msg', 300); ?>
                              </div>
                          <?php } ?>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                      <img src="ui-resources/images/hot-logo.png" width="150" />
                                        <h1 class="h4 text-gray-900 mb-4 mt-3">
                                          Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="login/doLogin">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" required>
                                        </div>

                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">



                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="ui-resources/vendor/jquery/jquery.min.js"></script>
    <script src="ui-resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="ui-resources/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="ui-resources/js/sb-admin-2.min.js"></script>

</body>

</html>
