<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CodeIgniter Login with Username/Password Example</title>
    <style>
        body {
            background-color: #f5f5f5; /* Light gray background color */
            color: #333; /* Text color */
        }
        .form-control {
            background-color: #fff; /* White input background color */
            border-color: #ccc; /* Light gray border color */
            color: #333; /* Input text color */
        }
        .btn-success {
            background-color: #28a745; /* Success button background color */
            border-color: #28a745; /* Success button border color */
            color: #fff; /* Button text color */
        }
        .btn-success:hover {
            background-color: #1e7e34; /* Success button background color on hover */
            border-color: #1e7e34; /* Success button border color on hover */
        }
        .alert-warning {
            background-color: #f0ad4e; /* Warning alert background color */
            border-color: #eea236; /* Warning alert border color */
            color: #fff; /* Alert text color */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Login</h2>
                <?php if(session()->getFlashdata('msg')): ?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>/signin/loginAuth" method="post">
                  <div class="form-group mb-3">
                      <input type="text" name="username" placeholder="Username" value="<?= set_value('username') ?>" class="form-control" required>
                  </div>
                  <div class="form-group mb-3">
                      <input type="password" name="password" placeholder="Password" class="form-control" required>
                  </div>
                  <div class="d-grid">
                      <button type="submit" class="btn btn-success">Login</button>
                  </div>
              </form>
            </div>
        </div>
    </div>
</body>
</html>
