<?php

namespace app\views;

use app\config;

?>

<footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md">
      <h5 class="text-muted">MVC Master</h5>
      <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
    </div>
    <div class="col-6 col-md">
      <h5>Features</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Cool stuff</a></li>
        <li><a class="text-muted" href="#">Random feature</a></li>
        <li><a class="text-muted" href="#">Team feature</a></li>
        <li><a class="text-muted" href="#">Stuff for developers</a></li>
        <li><a class="text-muted" href="#">Another one</a></li>
        <li><a class="text-muted" href="#">Last time</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Blog</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">#blockchain</a></li>
        <li><a class="text-muted" href="#">#cryptocurrency</a></li>
        <li><a class="text-muted" href="#">#bitcoin</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Social Network</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Instagram</a></li>
        <li><a class="text-muted" href="#">Facebook</a></li>
        <li><a class="text-muted" href="#">Google</a></li>
        <li><a class="text-muted" href="#">Xing</a></li>
        <li><a class="text-muted" href="#">LinkedIn</a></li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>About</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="#">Team</a></li>
        <li><a class="text-muted" href="<?php echo config::ROOT_APP_DIR; ?>impressum">Impressum</a></li>
        <li><a class="text-muted" href="<?php echo config::ROOT_APP_DIR; ?>datenschutz">Datenschutz</a></li>
      </ul>
    </div>
  </div>
</footer>
