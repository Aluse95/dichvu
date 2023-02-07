<style>
  /* zalo, phone */
  #button-contact-vr {
    position: fixed;
    bottom: 0;
    z-index: 99999;
  }

  /*phone*/
  #button-contact-vr .button-contact {
    position: relative;
  }

  #button-contact-vr .button-contact .phone-vr {
    position: relative;
    visibility: visible;
    background-color: transparent;
    width: 90px;
    height: 90px;
    cursor: pointer;
    z-index: 11;
    -webkit-backface-visibility: hidden;
    -webkit-transform: translateZ(0);
    transition: visibility .5s;
    left: 0;
    bottom: 0;
    display: block;
  }

  .phone-vr-circle-fill {
    width: 65px;
    height: 65px;
    top: 12px;
    left: 12px;
    position: absolute;
    box-shadow: 0 0 0 0 #c31d1d;
    background-color: rgba(230, 8, 8, 0.7);
    border-radius: 50%;
    border: 2px solid transparent;
    -webkit-animation: phone-vr-circle-fill 2.3s infinite ease-in-out;
    animation: phone-vr-circle-fill 2.3s infinite ease-in-out;
    transition: all .5s;
    -webkit-transform-origin: 50% 50%;
    -ms-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    -webkit-animuiion: zoom 1.3s infinite;
    animation: zoom 1.3s infinite;
  }

  .phone-vr-img-circle {
    background-color: #e60808;
    width: 40px;
    height: 40px;
    line-height: 40px;
    top: 25px;
    left: 25px;
    position: absolute;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    -webkit-animation: phonering-alo-circle-img-anim 1s infinite ease-in-out;
    animation: phone-vr-circle-fill 1s infinite ease-in-out;
  }

  .phone-vr-img-circle a {
    display: block;
    line-height: 37px;
  }

  .phone-vr-img-circle img {
    max-width: 25px;
  }

  @-webkit-keyframes phone-vr-circle-fill {
    0% {
      -webkit-transform: rotate(0) scale(1) skew(1deg);
    }

    10% {
      -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
    }

    20% {
      -webkit-transform: rotate(25deg) scale(1) skew(1deg);
    }

    30% {
      -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
    }

    40% {
      -webkit-transform: rotate(25deg) scale(1) skew(1deg);
    }

    50% {
      -webkit-transform: rotate(0) scale(1) skew(1deg);
    }

    100% {
      -webkit-transform: rotate(0) scale(1) skew(1deg);
    }
  }

  @-webkit-keyframes zoom {
    0% {
      transform: scale(.9)
    }

    70% {
      transform: scale(1);
      box-shadow: 0 0 0 15px transparent
    }

    100% {
      transform: scale(.9);
      box-shadow: 0 0 0 0 transparent
    }
  }

  @keyframes  zoom {
    0% {
      transform: scale(.9)
    }

    70% {
      transform: scale(1);
      box-shadow: 0 0 0 15px transparent
    }

    100% {
      transform: scale(.9);
      box-shadow: 0 0 0 0 transparent
    }
  }

  .phone-bar a {
    position: fixed;
    bottom: 25px;
    left: 30px;
    z-index: -1;
    background: rgb(232, 58, 58);
    color: #fff;
    font-size: 16px;
    padding: 8px 15px 7px 50px;
    border-radius: 100px;
    white-space: nowrap;
  }

  .phone-bar a:hover {
    opacity: 0.8;
    color: #fff;
  }

  @media(max-width: 736px) {
    .phone-bar {
      display: none;
    }
  }

  #zalo-vr .phone-vr-circle-fill {
    box-shadow: 0 0 0 0 #2196F3;
    background-color: rgba(33, 150, 243, 0.7);
  }

  #zalo-vr .phone-vr-img-circle {
    background-color: #2196F3;
  }

  #viber-vr .phone-vr-circle-fill {
    box-shadow: 0 0 0 0 #714497;
    background-color: rgba(113, 68, 151, 0.8);
  }

  #viber-vr .phone-vr-img-circle {
    background-color: #714497;
  }

  #contact-vr .phone-vr-circle-fill {
    box-shadow: 0 0 0 0 #2196F3;
    background-color: rgba(33, 150, 243, 0.7);
  }

  #contact-vr .phone-vr-img-circle {
    background-color: #2196F3;
  }
</style>
<div id="button-contact-vr">
  <!-- contact -->
  <!-- end contact -->

  <!-- viber -->
  <!-- end viber -->
  <?php if(isset($web_information->social->zalo) && $web_information->social->zalo != ''): ?>
    <!-- zalo -->
    <div id="zalo-vr" class="button-contact">
      <div class="phone-vr">
        <div class="phone-vr-circle-fill"></div>
        <div class="phone-vr-img-circle">
          <a target="_blank" href="<?php echo e($web_information->social->zalo); ?>">
            <img src="<?php echo e(asset('images/zalo.png')); ?>" alt="Zalo" width="25" height="25" />
          </a>
        </div>
      </div>
    </div>
    <!-- end zalo -->
  <?php endif; ?>
  <?php if(isset($web_information->social->call_now) && $web_information->social->call_now != ''): ?>
    <!-- Phone -->
    <div id="phone-vr" class="button-contact">
      <div class="phone-vr">
        <div class="phone-vr-circle-fill"></div>
        <div class="phone-vr-img-circle">
          <a href="tel:<?php echo e($web_information->social->call_now); ?>">
            <img src="<?php echo e(asset('images/phone.png')); ?>" alt="Call now" width="25" height="25" />
          </a>
        </div>
      </div>
    </div>
    <div class="phone-bar">
      <a href="tel:<?php echo e($web_information->social->call_now); ?>">
        <span class="text-phone"><?php echo e($web_information->social->call_now); ?></span>
      </a>
    </div>

    <!-- end phone -->
  <?php endif; ?>
</div>



<style>
  /* Button used to open the contact form - fixed at the bottom of the page */
  .open-button {
    background-color: #295EA9;
    color: #FFFFFF;
    padding: 8px 15px;
    border-radius: 5px 5px 0px 0px;
    cursor: pointer;
    position: fixed;
    bottom: 0px;
    right: 10px;
    /* width: 200px; */
    z-index: 99;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 1rem;
  }

  /* The popup form - hidden by default */
  .form-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 10px;
    border: 2px solid #f1f1f1;
    border-radius: 5px 5px 0px 0px;
    z-index: 999;
    padding: 10px;
    background-color: #295EA9;
  }

  /* Add styles to the form container */
  .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
  }

  /* Full-width input fields */
  .form-container input,
  .form-container textarea {
    width: 100%;
    padding: 10px;
    margin: 5px 0 10px 0;
    border: 1px solid #295EA9;
    background: #f1f1f1;
  }

  /* When the inputs get focus, do something */
  .form-container input:focus,
  .form-container textarea:focus {
    background-color: #ddd;
    outline: none;
  }

  /* Add some hover effects to buttons */
  .form-container .btn:hover,
  .open-button:hover {
    opacity: 0.8;
  }

  .form-container .title {
    margin: 10px 0px 20px;
    text-transform: uppercase;
  }

  .form-container .title button {
    padding: 5px 10px 8px 10px;
    line-height: 1;
  }

  .progress-wrap {
    bottom: 60px;
  }

  @media  only screen and (max-width: 768px) {
    .open-button {
      right: 0px;
      width: 100% !important;
      padding: 15px 15px;
    }

    .progress-wrap {
      bottom: 60px;
      right: 10px
    }

    .form-popup {
      left: 5%;
      width: 90%;
      overflow: scroll;
      max-height: 80vh;
      bottom: 20%;
    }

    .form-container {
      max-width: 100%;

    }

    #button-contact-vr {
      z-index: 9;
      bottom: 60px;
    }
  }
</style>
<button class="open-button" onclick="openForm()"> <i class="icon-line-phone px-2"></i> <?php echo app('translator')->get('GỬI YÊU CẦU GỌI LẠI'); ?></button>
<div class="form-popup" id="myForm">
  <form action="<?php echo e(route('frontend.contact.store')); ?>" method="post" class="form-container form_ajax_call mb-0">
    <?php echo csrf_field(); ?>
    <div class="modal-header px-0">
      <p class="modal-title" style="font-size: 20px"><?php echo app('translator')->get('GỬI YÊU CẦU GỌI LẠI'); ?></p>
      <button type="button" class="btn btn-md btn-danger" onclick="closeForm();">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <input type="text" placeholder="* Tên" name="name" autocomplete="off" required>
    <input type="text" placeholder="* Điện thoại" name="phone" autocomplete="off" required>
    <textarea rows="5" type="text" placeholder="Nội dung cần tư vấn" name="content" autocomplete="off"></textarea>
    <input type="hidden" name="is_type" value="call_request">
    <button type="submit" class="btn btn-warning mx-0 mb-1"><?php echo app('translator')->get('GỬI ĐĂNG KÝ'); ?></button>
    <div class="result_message text-bold"></div>
    <div><?php echo app('translator')->get('Commitment to information security'); ?></div>
  </form>
</div>
<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }
</script>
<?php /**PATH /home/fhm/domains/fhmvietnam.vn/public_html/resources/views/frontend/components/sticky/contact.blade.php ENDPATH**/ ?>