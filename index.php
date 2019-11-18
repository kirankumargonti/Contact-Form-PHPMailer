<?php
  include('./includes/contact.php');
?>
<!doctype html>
<html lang="en">
<head>
  <title>Get in Touch-form</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!--Custom-Css------>
  <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
  <!--================Contact-Get in touch form===========================-->
  <section id="contact">
      <div class="row">
        <div class="col-12">
          <div class="get-in-touch-container">
            <h1 class="get-in-touch-title">Get in Touch</h1>
            <!---Success Message-->
            <p class="text-success" style="font-size:16px; letter-spacing:0.3px;"><?= $result_success; ?></p>
            <!--==========form=============-->
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" name="contact-form">
              <div class="form-row">
                <!--full-name-->
                <div class="form-group col-md-6">
                  <label for="fullName">Full Name</label>
                  <input class="form-control" type="text" name="fullName" value="<?= $full_Name ?>">
                  <span class="text-danger" style="font-size:12px; letter-spacing:0.3px;"><?= $full_Name_error ?></span>
                </div>
                <!--Email-->
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" name="email" placeholder="example@gmail.com"
                    value="<?= $email ?>">
                  <span class="text-danger" style="font-size:12px; letter-spacing:0.3px;"><?= $email_error ?></span>
                </div>
              </div>
              <div class="form-row">
                <!--phoneNumber-->
                <div class="form-group col-md-6">
                  <label for="phoneNumber">Phone Number</label>
                  <input class="form-control" name="phoneNumber" type="tel" maxlength="10"
                    onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?= $phoneNumber ?>">
                </div>
                <!--Message-->
                <div class="form-group col-md-6">
                  <label for="message">Message</label>
                  <textarea name="message" cols="28" rows="1" placeholder="Hey Dude! Do You Wanna Work With Us"
                    style="border-radius: 4px;"><?= $msg ?></textarea><br>
                  <span class="text-danger" style="font-size:12px; letter-spacing:0.3px;"><?= $msg_error ?></span>
                </div>
              </div>
              <!--button-->
              <button class="btn btn-md btn-dark btn-block" type="submit" name="form-submit"
                style="margin-bottom: 10px;">Hire
                Me!</button>
              <!---Error Message-->
              <p class="text-danger" style="font-size:16px; letter-spacing:0.3px;"><?= $result_error; ?></p>
            </form>
          </div>
        </div>
      </div>
  </section>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>