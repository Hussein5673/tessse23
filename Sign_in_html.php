<?php
session_start(); // Start the session at the beginning
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="Signin">
        <div class="OverlaySignIn">
          <div class="Frame377" style="left: 40px; top: 80px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 64px; display: inline-flex">
            <div class="Frame375" style="flex-direction: column; justify-content: center; align-items: flex-start; gap: 32px; display: flex">
              <div class="SignIn" style="text-align: center; color: #333333; font-size: 32px; font-family: Poppins; font-weight: 500; word-wrap: break-word">Sign in</div>
              <!-- Start of the form -->
          <form action="Signin.php" method="POST">
              <div class="Email" style="height: 87px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 4px; display: flex">
                <div class="Frame243" style="width: 459px; padding-bottom: 3px; padding-right: 306px; justify-content: flex-start; align-items: center; display: inline-flex">
                  <div class="Label" style="color: #666666; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Username or email </div>
                </div>
                <div class="TextField" style="width: 459px; height: 56px; position: relative; border-radius: 12px; overflow: hidden; border: 1px rgba(102, 102, 102, 0.35) solid">
                  <input type="text" id="username" name="username" style="font-size:18px; width: 100%; height: 100%;">
                </div>
              </div>
              <div class="Email" style="height: 87px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 4px; display: flex">
                <div class="Frame243" style="padding-right: 8.86px; justify-content: flex-start; align-items: flex-start; gap: 300.14px; display: inline-flex">
                  <div class="Label" style="color: #666666; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Password</div>
                  <div class="PasswordHideSee" style="width: 73px; align-self: stretch; position: relative">
                    <div class="Icon" style="width: 24px; height: 24px; padding-top: 4.01px; padding-bottom: 3.99px; padding-left: 2.91px; padding-right: 2.90px; left: 0px; top: 3px; position: absolute; justify-content: center; align-items: center; display: inline-flex">
                      <div class="Group1" style="width: 18.19px; height: 16px; position: relative">
                        <div class="Vector" style="width: 17.10px; height: 16px; left: 0px; top: 0px; position: absolute; background: rgba(102, 102, 102, 0.80)"></div>
                        <div class="Vector" style="width: 11.30px; height: 9.23px; left: 6.89px; top: 4.74px; position: absolute; background: rgba(102, 102, 102, 0.80)"></div>
                      </div>
                    </div>
                    <div class="Hide" style="left: 32px; top: 0px; position: absolute; text-align: right; color: rgba(102, 102, 102, 0.80); font-size: 18px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Hide</div>
                  </div>
                </div>
                <div class="TextField" style="width: 459px; height: 56px; position: relative; border-radius: 12px; overflow: hidden; border: 1px rgba(102, 102, 102, 0.35) solid">
                  <input type="text" id="password" name="password" style="font-size:18px; width: 100%; height: 100%;">
                </div>
              </div>
              <div class="Frame374" style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: flex">
                <div class="Button" style="width: 459px; height: 56px; padding-top: 14px; padding-bottom: 15px; opacity: 0.25; background: #111111; border-radius: 32px; overflow: hidden; justify-content: center; align-items: center; display: inline-flex">
                  <button type="submit" style="background: none; border: none; color: white; font-size: 18px; font-family: Poppins; font-weight: 400;">Sign in</button>
                </div>
              </div>
            </form>
            <!-- End of the form -->
                <div class="Frame373" style="justify-content: flex-end; align-items: center; gap: 205px; display: inline-flex">
                  <div class="CheckBox" style="padding-top: 8px; padding-bottom: 8px; padding-right: 8px; justify-content: flex-start; align-items: flex-start; gap: 8px; display: flex">
                    <div class="CheckBox" style="width: 24px; height: 24px; position: relative">
                      <div class="Vector" style="width: 24px; height: 24px; left: 0px; top: 0px; position: absolute"></div>
                      <div class="Vector" style="width: 18px; height: 18px; left: 3px; top: 3px; position: absolute; background: #111111"></div>
                    </div>
                    <div class="IWantToReceiveEmailsAboutTheProductFeatureUpdatesEventsAndMarketingPromotions" style="color: #333333; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Remember me</div>
                  </div>
                  <div class="HaveAnAccountLogin" style="padding: 2px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: flex">
                    <div class="AlreadyHaveAnCcountLogIn" style="text-align: center; color: #333333; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Need help?</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="Frame376" style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: flex">
              <div class="HaveAnAccountLogin" style="padding: 2px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: inline-flex">
                <div class="AlreadyHaveAnCcountLogIn"><span style="color: #666666; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Don’t have an acount? </span><span style="color: #111111; font-size: 16px; font-family: Poppins; font-weight: 500; text-decoration: underline; word-wrap: break-word"><a href="SignUp.html">Sign up</a></span><span style="color: #111111; font-size: 16px; font-family: Poppins; font-weight: 400; text-decoration: underline; word-wrap: break-word">  </span></div>
              </div>
              <div class="ThisPageIsProtectedByGoogleRecaptchaToEnsureYouReNotABotLearnMore" style="width: 379px"><span style="color: #666666; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">This page is protected by Google reCAPTCHA to ensure you're not a bot. </span><span style="color: black; font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Learn more.</span></div>
            </div>
          </div>
          <div class="Icons" style="width: 24px; height: 24px; left: 491px; top: 24px; position: absolute">
            <div class="Vector" style="width: 24px; height: 24px; left: 0px; top: 0px; position: absolute"></div>
            <div class="Vector" style="width: 14px; height: 14px; left: 5px; top: 5px; position: absolute; background: #666666"></div>
          </div>
        </div>
        <img class="StoreIcon1" src="Signup&Signin icons_background/store-icon 1.png" />
    </div>
</body>
</html>
<!--HELLO TEST 2-->