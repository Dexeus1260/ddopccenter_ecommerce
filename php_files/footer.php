  <!-- ...::: Strat Footer Section - Footer Dark :::... -->
  <footer class="footer-section footer-section-style-2 section-top-gap-120">
        <div class="box-wrapper">
            <div class="footer-wrapper section-fluid-270">
                <div class="container-fluid">
                    <!-- Start Footer Top  -->
                    <div class="footer-top">
                        <div class="footer-top-left">
                            <div class="footer-contact-items">
                                <a class="icon-left"><img class="icon-svg" src="assets/images/icons/icon-ios-call-dark.svg" alt="">09563682517</a>
                                <a class="icon-left" href="mailto:demo@example.com"><img class="icon-svg" src="assets/images/icons/icon-mail-open-dark.svg" alt="">dexterjoshuac@gmail.com</a>
                            </div>
                        </div>
                        <div class="footer-top-right">
                            <div class="footer-social">
                                <a href="https://www.facebook.com/gmlordn1" target="_blank" rel="noopener"><img class="icon-svg" src="assets/images/icons/icon-facebook-f-dark.svg" alt=""></a>
                                <a href="https://github.com/Dexeus1260" target="_blank" rel="noopener"><img class="icon-svg" src="assets/images/icons/GitHub-Mark-32px.png" alt="" width="22" height="22"> </a>
                                <a href="https://www.youtube.com/channel/UCbp78VJIDSwXEQ84BBVdanQ/" target="_blank" rel="noopener"><img class="icon-svg" src="assets/images/icons/104445_video_youtube_icon.png" alt="" width="25" height="25"></a>
                                <a href="https://dexeustech.blogspot.com/" target="_blank" rel="noopener"><img class="icon-svg" src="assets/images/icons/icons8-blogger-60.png" alt="" width="30" height="30"></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Footer Top  -->

                 
                </div>
            </div>
        </div>
    </footer>
    <!-- ...::: End Footer Section Section - Footer Dark :::... -->

    <!-- Scroll To button -->
    <div id="scroll-to-top" class="scroll-to-top"><span class="material-icons-outlined">expand_less</span></div>

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor -->
    <!-- <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script> -->
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/jquery.nice-select.js"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script>

    <!-- Minify Version -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script> -->
    <!-- <script src="assets/js/plugins/plugins.min.js"></script> -->

    <!--Main JS (Common Activation Codes)-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/cart.js"></script>
    
    <!-- <script src="assets/js/main.min.js"></script> -->

    <!-- <script>

        window.addEventListener("load", function() {
            var bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
        bannerNode.parentNode.removeChild(bannerNode);
        });

    </script> -->
    <script src="./assets/js/PureSnow.js"></script>
    <script>
  // Array to store our Snowflake objects
  var snowflakes = [];

  // Global variables to store our browser's window size
  var browserWidth;
  var browserHeight;

  // Specify the number of snowflakes you want visible
  var numberOfSnowflakes = 50;

  // Flag to reset the position of the snowflakes
  var resetPosition = false;

  // Handle accessibility
  var enableAnimations = false;
  var reduceMotionQuery = matchMedia("(prefers-reduced-motion)");

  // Handle animation accessibility preferences 
  function setAccessibilityState() {
    if (reduceMotionQuery.matches) {
      enableAnimations = false;
    } else { 
      enableAnimations = true;
    }
  }
  setAccessibilityState();

  reduceMotionQuery.addListener(setAccessibilityState);

  //
  // It all starts here...
  //
  function setup() {
    if (enableAnimations) {
      window.addEventListener("DOMContentLoaded", generateSnowflakes, false);
      window.addEventListener("resize", setResetFlag, false);
    }
  }
  setup();

  //
  // Constructor for our Snowflake object
  //
  function Snowflake(element, speed, xPos, yPos) {
    // set initial snowflake properties
    this.element = element;
    this.speed = speed;
    this.xPos = xPos;
    this.yPos = yPos;
    this.scale = 1;

    // declare variables used for snowflake's motion
    this.counter = 0;
    this.sign = Math.random() < 0.5 ? 1 : -1;

    // setting an initial opacity and size for our snowflake
    this.element.style.opacity = (.1 + Math.random()) / 1;
  }

  //
  // The function responsible for actually moving our snowflake
  //
  Snowflake.prototype.update = function () {
    // using some trigonometry to determine our x and y position
    this.counter += this.speed / 10000;
    this.xPos += this.sign * this.speed * Math.cos(this.counter) / 40;
    this.yPos += Math.sin(this.counter) / 40 + this.speed / 30;
    this.scale = .5 + Math.abs(10 * Math.cos(this.counter) / 20);

    // setting our snowflake's position
    setTransform(Math.round(this.xPos), Math.round(this.yPos), this.scale, this.element);

    // if snowflake goes below the browser window, move it back to the top
    if (this.yPos > browserHeight) {
      this.yPos = -50;
    }
  }

  //
  // A performant way to set your snowflake's position and size
  //
  function setTransform(xPos, yPos, scale, el) {
    el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0) scale(${scale}, ${scale})`;
  }

  //
  // The function responsible for creating the snowflake
  //
  function generateSnowflakes() {

    // get our snowflake element from the DOM and store it
    var originalSnowflake = document.querySelector(".snowflake");

    // access our snowflake element's parent container
    var snowflakeContainer = originalSnowflake.parentNode;
    snowflakeContainer.style.display = "block";

    // get our browser's size
    browserWidth = document.documentElement.clientWidth;
    browserHeight = document.documentElement.clientHeight;

    // create each individual snowflake
    for (var i = 0; i < numberOfSnowflakes; i++) {

      // clone our original snowflake and add it to snowflakeContainer
      var snowflakeClone = originalSnowflake.cloneNode(true);
      snowflakeContainer.appendChild(snowflakeClone);

      // set our snowflake's initial position and related properties
      var initialXPos = getPosition(50, browserWidth);
      var initialYPos = getPosition(50, browserHeight);
      var speed = 5 + Math.random() * 40;

      // create our Snowflake object
      var snowflakeObject = new Snowflake(snowflakeClone,
        speed,
        initialXPos,
        initialYPos);
      snowflakes.push(snowflakeObject);
    }

    // remove the original snowflake because we no longer need it visible
    snowflakeContainer.removeChild(originalSnowflake);

    moveSnowflakes();
  }

  //
  // Responsible for moving each snowflake by calling its update function
  //
  function moveSnowflakes() {

    if (enableAnimations) {
      for (var i = 0; i < snowflakes.length; i++) {
        var snowflake = snowflakes[i];
        snowflake.update();
      }      
    }

    // Reset the position of all the snowflakes to a new value
    if (resetPosition) {
      browserWidth = document.documentElement.clientWidth;
      browserHeight = document.documentElement.clientHeight;

      for (var i = 0; i < snowflakes.length; i++) {
        var snowflake = snowflakes[i];

        snowflake.xPos = getPosition(50, browserWidth);
        snowflake.yPos = getPosition(50, browserHeight);
      }

      resetPosition = false;
    }

    requestAnimationFrame(moveSnowflakes);
  }

  //
  // This function returns a number between (maximum - offset) and (maximum + offset)
  //
  function getPosition(offset, size) {
    return Math.round(-1 * offset + Math.random() * (size + 2 * offset));
  }

  //
  // Trigger a reset of all the snowflakes' positions
  //
  function setResetFlag(e) {
    resetPosition = true;
  }
</script>

</body>

</html>