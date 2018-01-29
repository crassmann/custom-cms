<form class="form-signin" method="post" action="" id="needs-validation" novalidate>
  <?php
  if (isset($args['error'])) {
    echo "<div class='alert alert-danger' role='alert'>";
    foreach ($args['error'] as $key => $value) {
      echo $value."</br>";
    }
    echo "</div>";
  }
  ?>
  <h2 class="form-signin-heading">Please sign in</h2>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
  <!-- <div class="checkbox">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div> -->
  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';

  window.addEventListener('load', function() {
    var form = document.getElementById('needs-validation');
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  }, false);
})();
</script>
