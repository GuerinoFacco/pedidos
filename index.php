<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema de pedidos - NPA</title>

    <!-- Meta #5bb9d3 -->
    <link rel="shortcut icon" href="assets/images/favicon.svg" />

    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/main.min.css" />
  </head>

  <body class="login-bg">
    <!-- Container start -->
    <div class="container p-0">
      <!-- Row start -->
      <div class="row g-0">
        <div class="col-xl-6 col-lg-12"></div>
        <div class="col-xl-6 col-lg-12">
          <!-- Row start -->
          <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-sm-4 col-12">
              <form action="autenticacaousuario.php" class="my-5" method="post">
                <div class="bg-white p-5 rounded-4">
                  <div class="login-form">
                      <img src="assets/images/logo-npa.svg" class="img-fluid login-logo" alt="Admin Dashboard" />
                    <h2 class="mt-4 mb-4">Pedidos de vendas</h2>
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input name="email" type="text" class="form-control" placeholder="Digite seu email" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <div class="input-group">
                        <input name="senha" type="password" class="form-control" placeholder="Digite sua senha" />
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                      <div class="form-check m-0">
                        <input class="form-check-input" type="checkbox" value="" id="rememberPassword" />
                        <label class="form-check-label" for="rememberPassword">Lembrar</label>
                      </div>
                    </div>
                    <div class="d-grid py-3 mt-3 gap-3">
                      <input class="btn btn-lg btn-primary" type="submit" />
                      <!--<a href="index.html" class="btn btn-lg btn-primary">
                        Entrar
                      </a>-->
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- Row end -->
        </div>
      </div>
      <!-- Row end -->
    </div>
    <!-- Container end -->
  </body>

</html>