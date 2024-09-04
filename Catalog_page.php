<html> 
  <head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="Catalog_page.css">
    <title>Game Vault - Catalog page</title>
  </head>
  <body data-new-gr-c-s-check-loaded="14.1190.0" data-gr-ext-installed="">

 <!-- Using PHP for backend here -->
 <?php
    // Defining a constant for the currency sign
    define("CURRENCY", "€");

    // Include the database name, username, password, and server details
    include 'username_database_password_server.php';

    // Establish the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    // Check connection
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // SQL query to select data
    $sql = "SELECT * FROM game_title"; // The IDs for each game in the database.
    $stmt = sqlsrv_query($conn, $sql); // Execute the query

    // Initialize an empty array for the game names and prices.
    $games = [];

    // Check if the query was successful and fetch the data
    if ($stmt) {
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $games[$row['ID']] = [
                'title' => $row['Game_Title'],  // Store the title in the inner associative array
                'image_path' => $row['image_path'], // Store the image path in the inner associative array
                'price' => $row['price']   // Store the price in the inner associative array
            ];
        }
    } else {
        echo "No games found.";
    }

    // Close the connection
    sqlsrv_close($conn);  
?>

    <div style="
        width: 100%;
        height: 1200px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        display: inline-flex;
      ">
      <div style="width: 100%; height: 1200px; position: relative">
        <div style="
            width: 100%;
            height: 1200px;
            left: 0px;
            top: 0px;
            position: absolute;
            background: #210e0e;

            overflow: hidden;
          ">
          <img style="
              width: 100%;
              height: 1200px;
              left: 0px;
              top: 0px;
              position: absolute;
            " src="Catalog_images/unsplash_SIhcZYEwMB0.png">
          <div class="content"  style="
              width: 100%;
              height: 500px;
              left: 28px;
              top: 368px;
              position: absolute;
              flex-direction: column;
              justify-content: flex-start;
              align-items: flex-start;
              gap: 78px;
              display: inline-flex;
            ">
            <div style="
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    margin-left: 100px;
">

    <!-- Card 1 -->
<div style="
    width: 300px;
    background: #004080;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    padding: 12px;
    position: relative;
">
    <div style="
        width: 100%;
        height: 300px;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    ">
        <form method="POST" action="add_to_cart.php" style="
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
        ">
            <input type="hidden" name="game_name" value="ELDEN RING">
            <button type="submit" name="add_to_cart" style="
                background: none;
                border: none;
                padding: 0;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            ">
                <img style="width: 100%; height: 100%; object-fit: cover;" src="Catalog_images/image 6.png" alt="ELDEN RING">
            </button>
        </form>
    </div>
    <div style="
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 12px;
    ">
        <div style="
            color: white;
            font-size: 16px;
            font-family: Actor;
            font-weight: 400;
            line-height: 20px;
        ">
            € 69.99
        </div>
        <div style="
            color: white;
            font-size: 20px;
            font-family: Actor;
            font-weight: 400;
            line-height: 26px;
        ">
            ELDEN RING
        </div>
        <div style="
            display: flex;
            gap: 8px;
            color: white;
            font-size: 12px;
            font-family: Actor;
            font-weight: 400;
            text-transform: uppercase;
        ">
            <div style="opacity: 0.4;">Pre-order</div>
            <div style="
                width: 2px;
                height: 2px;
                background: white;
                border-radius: 50%;
                opacity: 0.4;
            "></div>
            <div style="opacity: 0.4;">PS5</div>
        </div>
    </div>
</div>

<!-- Card 2 -->
<div style="
    width: 300px;
    background: #004080;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    padding: 12px;
    position: relative;
">
    <div style="
        width: 100%;
        height: 300px;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    ">
        <form method="POST" action="add_to_cart.php" style="
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
        ">
            <input type="hidden" name="game_name" value="Project Zero 20th Anniversary Celebration DLC">
            <button type="submit" name="add_to_cart" style="
                background: none;
                border: none;
                padding: 0;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            ">
                <img style="width: 100%; height: 100%; object-fit: cover;" src="Catalog_images/image 6 (1).png" alt="Project Zero 20th Anniversary Celebration DLC">
            </button>
        </form>
    </div>
    <div style="
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 12px;
    ">
        <div style="
            color: white;
            font-size: 16px;
            font-family: Actor;
            font-weight: 400;
            line-height: 20px;
        ">
            € 69.99
        </div>
        <div style="
            color: white;
            font-size: 20px;
            font-family: Actor;
            font-weight: 400;
            line-height: 26px;
        ">
            Project Zero 20th Anniversary Celebration DLC
        </div>
        <div style="
            display: flex;
            gap: 8px;
            color: white;
            font-size: 12px;
            font-family: Actor;
            font-weight: 400;
            text-transform: uppercase;
        ">
            <div style="opacity: 0.4;">Game bundle</div>
            <div style="
                width: 2px;
                height: 2px;
                background: white;
                border-radius: 50%;
                opacity: 0.4;
            "></div>
            <div style="opacity: 0.4;">PS5</div>
        </div>
    </div>
</div>

<!-- Card 3 -->
<div style="
    width: 300px;
    background: #004080;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    padding: 12px;
    position: relative;
">
    <div style="
        width: 100%;
        height: 300px;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    ">
        <form method="POST" action="add_to_cart.php" style="
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
        ">
            <input type="hidden" name="game_name" value="Tiny Tina's Wonderlands: Chaotic Edition">
            <button type="submit" name="add_to_cart" style="
                background: none;
                border: none;
                padding: 0;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            ">
                <img style="width: 100%; height: 100%; object-fit: cover;" src="Catalog_images/image 6 (2).png" alt="Tiny Tina's Wonderlands: Chaotic Edition">
            </button>
        </form>
    </div>
    <div style="
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 12px;
    ">
        <div style="
            color: white;
            font-size: 16px;
            font-family: Actor;
            font-weight: 400;
            line-height: 20px;
        ">
            € 89.99
        </div>
        <div style="
            color: white;
            font-size: 20px;
            font-family: Actor;
            font-weight: 400;
            line-height: 26px;
        ">
            Tiny Tina's Wonderlands: Chaotic Edition
        </div>
        <div style="
            display: flex;
            gap: 8px;
            color: white;
            font-size: 12px;
            font-family: Actor;
            font-weight: 400;
            text-transform: uppercase;
        ">
            <div style="opacity: 0.4;">Pre-order</div>
            <div style="
                width: 2px;
                height: 2px;
                background: white;
                border-radius: 50%;
                opacity: 0.4;
            "></div>
            <div style="opacity: 0.4;">PS5</div>
        </div>
    </div>
</div>

<!-- Card 4 -->
<div style="
    width: 300px;
    background: #004080;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    padding: 12px;
    position: relative;
">
    <div style="
        width: 100%;
        height: 300px;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    ">
        <form method="POST" action="add_to_cart.php" style="
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
        ">
            <input type="hidden" name="game_name" value="Riders Republic™ Gold Edition">
            <button type="submit" name="add_to_cart" style="
                background: none;
                border: none;
                padding: 0;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            ">
                <img style="width: 100%; height: 100%; object-fit: cover;" src="Catalog_images/image 6 (3).png" alt="Riders Republic™ Gold Edition">
            </button>
        </form>
    </div>
    <div style="
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 12px;
    ">
        <div style="
            color: white;
            font-size: 16px;
            font-family: Actor;
            font-weight: 400;
            line-height: 20px;
        ">
            € 99.99
        </div>
        <div style="
            color: white;
            font-size: 20px;
            font-family: Actor;
            font-weight: 400;
            line-height: 26px;
        ">
            Riders Republic™ Gold Edition
        </div>
        <div style="
            display: flex;
            gap: 8px;
            color: white;
            font-size: 12px;
            font-family: Actor;
            font-weight: 400;
            text-transform: uppercase;
        ">
            <div style="opacity: 0.4;">Game bundle</div>
            <div style="
                width: 2px;
                height: 2px;
                background: white;
                border-radius: 50%;
                opacity: 0.4;
            "></div>
            <div style="opacity: 0.4;">PS5</div>
            <div style="
                width: 2px;
                height: 2px;
                background: white;
                border-radius: 50%;
                opacity: 0.4;
            "></div>
            <div style="opacity: 0.4;">PS4</div>
        </div>
    </div>
</div>

<!-- Card 5 -->
<div style="
    width: 300px;
    background: #004080;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    padding: 12px;
    position: relative;
">
    <div style="
        width: 100%;
        height: 300px;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    ">
        <form method="POST" action="add_to_cart.php" style="
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
        ">
            <input type="hidden" name="game_name" value="FootBall™ 2022">
            <button type="submit" name="add_to_cart" style="
                background: none;
                border: none;
                padding: 0;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            ">
                <img style="width: 100%; height: 100%; object-fit: cover;" src="Catalog_images/image 6 (4).png" alt="FootBall™ 2022">
            </button>
        </form>
    </div>
    <div style="
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 12px;
    ">
        <div style="
            color: white;
            font-size: 16px;
            font-family: Actor;
            font-weight: 400;
            line-height: 20px;
        ">
            € 59.99
        </div>
        <div style="
            color: white;
            font-size: 20px;
            font-family: Actor;
            font-weight: 400;
            line-height: 26px;
        ">
            FootBall™ 2022
        </div>
        <div style="
            display: flex;
            gap: 8px;
            color: white;
            font-size: 12px;
            font-family: Actor;
            font-weight: 400;
            text-transform: uppercase;
        ">
            <div style="opacity: 0.4;">Pre-order</div>
            <div style="
                width: 2px;
                height: 2px;
                background: white;
                border-radius: 50%;
                opacity: 0.4;
            "></div>
            <div style="opacity: 0.4;">PS5</div>
        </div>
    </div>
</div>

</div>

            
            
            </div>
          </div>
          <div style="
              width: 100%;
              height: 91px;
              left: 0px;
              top: 0px;
              position: absolute;
              background: #004080;
            ">
            <div style="
                left: 224px;
                top: 35px;
                position: absolute;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 8px;
                display: inline-flex;
              ">
              <div class="friendspage button" style="
                  padding: 12px;
                  background: white;
                  border-radius: 8px;
                  justify-content: flex-start;
                  align-items: flex-start;
                  gap: 10px;
                  display: flex;
                ">
                <a href="friendspage.php" style="text-decoration: none">
                  <div style="
                      color: #91969b;
                      font-size: 16px;
                      font-family: Actor;
                      font-weight: 400;
                      line-height: 16px;
                      word-wrap: break-word;
                    ">
                    Friends
                  </div>
                </a>
              </div>
              <div class="cart page button"  style="
                  padding: 12px;
                  background: white;
                  border-radius: 8px;
                  justify-content: flex-start;
                  align-items: flex-start;
                  gap: 10px;
                  display: flex;
                ">
                <a href="cart_page.php" style="text-decoration: none">
                  <div style="
                      color: #91969b;
                      font-size: 16px;
                      font-family: Actor;
                      font-weight: 400;
                      line-height: 16px;
                      word-wrap: break-word;
                    ">
                    View Cart
                  </div>
                </a>
              </div>
              <div style="
                  padding: 12px;
                  background: white;
                  border-radius: 8px;
                  justify-content: flex-start;
                  align-items: flex-start;
                  gap: 10px;
                  display: flex;
                ">
                <a class="profile button"href="profile_page.php" style="text-decoration: none">
                  <div style="
                      color: #91969b;
                      font-size: 16px;
                      font-family: Actor;
                      font-weight: 400;
                      line-height: 16px;
                      word-wrap: break-word;
                    ">
                    My Profile
                  </div>
                </a>
              </div>
              <div style="
                  padding: 12px;
                  background: white;
                  border-radius: 8px;
                  justify-content: flex-start;
                  align-items: flex-start;
                  gap: 10px;
                  display: flex;
                ">
              <a class="home page button"href="index.php" style="text-decoration: none">
                <div style="
                    color: #91969b;
                    font-size: 16px;
                    font-family: Actor;
                    font-weight: 400;
                    line-height: 16px;
                    word-wrap: break-word;
                  ">
                Home Page
                </div>
              </a></div><a href="index.php" style="text-decoration: none">
              </a><div style="
                  padding: 12px;
                  background: white;
                  border-radius: 8px;
                  justify-content: flex-start;
                  align-items: flex-start;
                  gap: 10px;
                  display: flex;
                "><a href="index.php" style="text-decoration: none">
              </a><a href="subscription.php" style="text-decoration: none">
                <div style="
                    color: #91969b;
                    font-size: 16px;
                    font-family: Actor;
                    font-weight: 400;
                    line-height: 16px;
                    word-wrap: break-word;
                  ">
                  My Subscriptions
                </div>
                </a>
              </div>
              
            </div>
            </div>
  <div class="Searchbox">
    <div class="Search">
        <div class="Icon">
            <img src="Icons/Icon.png" alt="Icon Image">
        </div>
    </div>
    <input type="text" class="SearchInput" placeholder="Search">
</div>
            <a href="index.php" style="text-decoration: none">
              <img style="
                  width: 101px;
                  height: 91px;
                  left: 0px;
                  top: 0px;
                  position: absolute;
                  border-radius: 0px;
                " src="Catalog_images/store-icon 1.png">
            </a>
            
          <div style="
              width: 1304px;
              height: 224px;
              left: 52px;
              top: 900px;
              position: absolute;
            ">
            <div style="
                width: 24px;
                height: 24px;
                left: 0px;
                top: 196px;
                position: absolute;
              ">
              <div style="
                  width: 24px;
                  height: 24px;
                  left: 0px;
                  top: 0px;
                  position: absolute;
                "></div>
              <div style="
                  width: 18px;
                  height: 18px;
                  left: 3px;
                  top: 3px;
                  position: absolute;
                  border: 2px white solid;
                "></div>
              <div style="
                  width: 12.59px;
                  height: 12.59px;
                  left: 4.65px;
                  top: 4.6px;
                  position: absolute;
                  border: 2px white solid;
                "></div>
              <div style="
                  width: 6.67px;
                  height: 5.91px;
                  left: 13.62px;
                  top: 13.18px;
                  position: absolute;
                  border: 2px white solid;
                "></div>
            </div>
            <div style="
                left: 704px;
                top: 0px;
                position: absolute;
                color: white;
                font-size: 16px;
                font-family: Actor;
                font-weight: 400;
                line-height: 32px;
                word-wrap: break-word;
              ">
              Support <br>Privacy and Cookies <br>Website Terms of Use
              <br>Sitemap <br>GameVault Studios <br>Legal <br>About GVE
            </div>
            <div style="
                left: 934px;
                top: 0px;
                position: absolute;
                color: white;
                font-size: 16px;
                font-family: Actor;
                font-weight: 400;
                line-height: 32px;
                word-wrap: break-word;
              ">
              GVN Terms of Service <br>Software Usage Terms <br>GV Store
              Cancellation Policy <br>Health Warnings <br>About Ratings
            </div>
            <div style="
                left: 1215px;
                top: 0px;
                position: absolute;
                color: white;
                font-size: 16px;
                font-family: Actor;
                font-weight: 400;
                line-height: 32px;
                word-wrap: break-word;
              ">
              Facebook <br>Twitter <br>YouTube <br>Instagram <br>Android
              App <br>iOS App
            </div>
            <div style="
                left: 36px;
                top: 200px;
                position: absolute;
                color: white;
                font-size: 16px;
                font-family: Actor;
                font-weight: 400;
                line-height: 16px;
                word-wrap: break-word;
              ">
              Country/Region: Ireland
            </div>
            <div style="
                width: 16px;
                height: 16px;
                padding-left: 3.33px;
                padding-right: 3.33px;
                padding-top: 5.33px;
                padding-bottom: 5.33px;
                left: 229px;
                top: 216px;
                position: absolute;
                transform: rotate(-90deg);
                transform-origin: 0 0;
                justify-content: center;
                align-items: center;
                display: inline-flex;
              ">
              <div style="
                  width: 5.33px;
                  height: 9.33px;
                  transform: rotate(90deg);
                  transform-origin: 0 0;
                  background: white;
                "></div>
            </div>
            <div style="
                width: 83.34px;
                height: 64px;
                left: 0px;
                top: 0px;
                position: absolute;
                background: white;
              "></div>
            <img style="
                width: 167px;
                height: 160px;
                left: 0px;
                top: 0px;
                position: absolute;
                border-radius: 0px;
              " src="Catalog_images/store-icon 1 (1).png">
          </div>
          <div style="
              width: 983px;
              height: 55px;
              left: 212px;
              top: 163px;
              position: absolute;
              text-align: center;
              color: #f1f5f8;
              font-size: 48px;
              font-family: Advent Pro;
              font-weight: 400;
              word-wrap: break-word;
            ">
            Discover your next adventure in the vault—where every game is a
            treasure waiting to be unlocked!
          </div>
        </div>
        
          
        </div>
      </div>
    </div>
  
  <grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</body></html>
