<?php
require 'db.php';
include 'navbar.php';

?>

<!-- Contact Section -->
<div class="w3-center" id="contact">
  <h3 class="w3-center">CONTACT</h3>
  <p class="w3-center w3-large">Lets get in touch. Send us a message:</p>
  <div style="margin-top:48px" class="w3-center">
    <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-center"></i> KICT, IIUM</p>
    <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-center"></i> Phone: 03-6196 5601</p>
    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-center"> </i> Email: kict@iium.edu.my</p>
    <br>
    <form action="/action_page.php" class="w3-center" style ="width:40%" target="_blank">
      <p><input class="w3-input w3-border" type="text" placeholder="Name" required name="Name" ></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Subject" required name="Subject"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"></p>
      <p>
        <button class="w3-button w3-black w3-center" type="submit">
          <i class="fa fa-paper-plane w3-center"></i> SEND MESSAGE
        </button>
      </p>
    </form>
  </div>
  <!-- Footer -->
  <footer class="w3-center w3-teal w3-padding-32">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
</footer>