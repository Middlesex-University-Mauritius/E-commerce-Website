<!-- Footer section with default links -->

<?php

function footer()
{
  echo <<<DEV
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col">
            <h4>Company</h4>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Our Services</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Payment Methods</h4>
            <ul>
              <li><a href="#">Mastercard</a></li>
              <li><a href="#">PayPal</a></li>
              <li><a href="#">Visa</a></li>
              <li><a href="#">American Express</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Categories</h4>
            <ul>
              <li><a href="#">Live Music</a></li>
              <li><a href="#">Concerts</a></li>
              <li><a href="#">Films</a></li>
              <li><a href="#">Music Festivals</a></li>
              <li><a href="#">Comedy shows</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>Follow Us</h4>
            <div class="social-links">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  DEV;
}
