<?php
include "config.php";
session_start();

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);

  $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['formMessage'] = "<span style='color:green;'>Thank you! Your message has been sent.</span>";
  } else {
    $_SESSION['formMessage'] = "<span style='color:red;'>Error: " . $conn->error . "</span>";
  }

  // Redirect to same page to prevent resubmission
  header("Location: " . $_SERVER['PHP_SELF'] . "#contact");
  exit();
}

// Show message and unset
$formMessage = "";
if (isset($_SESSION['formMessage'])) {
  $formMessage = $_SESSION['formMessage'];
  unset($_SESSION['formMessage']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coffee Haven</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Pacifico&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* Hero Section Background (soft cozy) */
    .hero {
      background: url('https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;
      color: white;
      text-align: center;
      padding: 140px 20px;
      position: relative;
    }

    .hero::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
    }

    .hero h1,
    .hero p,
    .hero a {
      position: relative;
      z-index: 2;
    }

    .hero h1 {
      font-family: 'Pacifico', cursive;
      font-size: 3rem;
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 1.2rem;
      max-width: 650px;
      margin: 0 auto 20px auto;
    }

    .cta-btn {
      background: #b5651d;
      color: white;
      padding: 12px 25px;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      z-index: 2;
    }

    .cta-btn:hover {
      background: #8b4513;
    }

    /* Footer Styling */
    footer {
      background: #2f2f2f;
      color: white;
      padding: 40px 20px;
      text-align: center;
      margin-top: 50px;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 30px;
      margin-bottom: 30px;
    }

    .footer-grid h4 {
      margin-bottom: 10px;
      font-size: 1.2rem;
      color: #f4d19b;
    }

    .socials a {
      margin: 0 10px;
      color: white;
      font-size: 1.5rem;
      transition: color 0.3s ease;
    }

    .socials a:hover {
      color: #f4d19b;
    }

    .menu {
      padding: 60px 20px;
      text-align: center;
    }

    .menu-items {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .menu-item {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: transform 0.3s;
    }

    .menu-item:hover {
      transform: scale(1.05);
    }

    .menu-item img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .card-top {
      position: relative;
    }

    .price {
      position: absolute;
      top: 10px;
      right: 10px;
      background: #b5651d;
      color: white;
      padding: 5px 10px;
      border-radius: 6px;
      font-size: 0.9rem;
    }

    .details {
      list-style: none;
      padding: 0;
      margin: 10px 0;
    }

    .details li {
      font-size: 0.9rem;
      color: #555;
    }
  </style>
</head>

<body>

  <header>
    <div class="logo">☕ Tea & Coffee House</div>
    <nav>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#order">Order Now</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero" id="home">
    <h1>Welcome to Nowrin's Coffee & Tea Adda</h1>
    <p>"Warmth, comfort, and smiles in every cup.<br>Where every sip feels like sunshine.<br>Happiness poured fresh,
      every day.”</p>
    <a href="#menu" class="cta-btn">Check Out Our Flavors – View Menu</a>
  </section>

  <!-- Menu Section -->
  <section class="menu" id="menu">
    <h2>Our Menu</h2>
    <div class="menu-items">

      <!-- Espresso -->
      <div class="menu-item">
        <div class="card-top">
          <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80"
            alt="Espresso">
          <span class="price">$2.50</span>
        </div>
        <h3>Espresso</h3>
        <ul class="details">
          <li>Intensity: Strong</li>
          <li>Origin: Colombia</li>
        </ul>
        <button class="order-btn" data-item="Espresso" data-price="2.50">Order Now</button>
      </div>

      <!-- Cappuccino -->
      <div class="menu-item">
        <div class="card-top">
          <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=800&q=80"
            alt="Cappuccino">
          <span class="price">$3.00</span>
        </div>
        <h3>Cappuccino</h3>
        <ul class="details">
          <li>Intensity: Medium</li>
          <li>Origin: Brazil</li>
        </ul>
        <button class="order-btn" data-item="Cappuccino" data-price="3.00">Order Now</button>
      </div>

      <!-- Latte -->
      <div class="menu-item">
        <div class="card-top">
          <img src="https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=800&q=80"
            alt="Latte">
          <span class="price">$3.50</span>
        </div>
        <h3>Latte</h3>
        <ul class="details">
          <li>Intensity: Mild</li>
          <li>Origin: Guatemala</li>
        </ul>
        <button class="order-btn" data-item="Latte" data-price="3.50">Order Now</button>
      </div>

      <!-- Mocha -->
      <div class="menu-item">
        <div class="card-top">
          <img src="https://images.unsplash.com/photo-1512568400610-62da28bc8a13?auto=format&fit=crop&w=800&q=80"
            alt="Mocha">
          <span class="price">$3.75</span>
        </div>
        <h3>Mocha</h3>
        <ul class="details">
          <li>Intensity: Medium</li>
          <li>Origin: Peru</li>
        </ul>
        <button class="order-btn" data-item="Mocha" data-price="3.75">Order Now</button>
      </div>

      <!-- Hot Chocolate -->
      <div class="menu-item">
        <div class="card-top">
          <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=800&q=80"
            alt="Hot Chocolate">
          <span class="price">$3.60</span>
        </div>
        <h3>Hot Chocolate</h3>
        <ul class="details">
          <li>Rich & Creamy</li>
          <li>Origin: Belgium</li>
        </ul>
        <button class="order-btn" data-item="Hot Chocolate" data-price="3.60">Order Now</button>
      </div>

      <!-- Iced Coffee -->
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/iced coffee.jpeg" alt="Iced Coffee">
          <span class="price">$3.10</span>
        </div>
        <h3>Iced Coffee</h3>
        <ul class="details">
          <li>Intensity: Smooth</li>
          <li>Origin: Colombia</li>
        </ul>
      </div>
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Copycat Starbucks Affogate.jpeg" alt="Iced Coffee">
          <span class="price">$3.10</span>
        </div>
        <h3>Copycat Starbucks Affogate</h3>
        <ul class="details">
          <li>Intensity: Smooth</li>
          <li>Origin: Colombia</li>
        </ul>
      </div>
      <!-- Green Tea -->
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Green tea.jpeg" alt="Green Tea">
          <span class="price">$2.00</span>
        </div>
        <h3>Green Tea</h3>
        <ul class="details">
          <li>Light & Refreshing</li>
          <li>Origin: Japan</li>
        </ul>
      </div>
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Green Mangoes juice.jpeg" alt="Green Tea">
          <span class="price">$2.00</span>
        </div>
        <h3>Green Mangoes juice </h3>
        <ul class="details">
          <li>Light & Refreshing</li>
          <li>Origin:Bangladesh</li>
        </ul>
      </div>

      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Strawberry Pineapple Juice.jpeg" alt="Green Tea">
          <span class="price">$2.00</span>
        </div>
        <h3>Strawberry Pineapple Juice</h3>
        <ul class="details">
          <li>Light & Refreshing</li>
          <li>Origin:Malayshia </li>
        </ul>
      </div>


      <!-- Green Tea -->
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Mango juice.jpeg" alt="Green Tea">
          <span class="price">$2.00</span>
        </div>
        <h3>Mango Juice</h3>
        <ul class="details">
          <li>Light & Refreshing</li>
          <li>Origin: Japan</li>
        </ul>
      </div>
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Pinertest.jpeg" alt="Green Tea">
          <span class="price">$2.00</span>
        </div>
        <h3>Pinertest</h3>
        <ul class="details">
          <li>Light & Refreshing</li>
          <li>Origin: Japan</li>
        </ul>
      </div>
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Salted Caramel.jpeg" alt="Green Tea">
          <span class="price">$2.00</span>
        </div>
        <h3>Salted Caramel</h3>
        <ul class="details">
          <li>Light & Refreshing</li>
          <li>Origin: Japan</li>
        </ul>
      </div>
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Pineapple & Berry Smoothie.png " alt="Green Tea">
          <span class="price">$2.00</span>
        </div>
        <h3>Iced Caramel</h3>
        <ul class="details">
          <li>Light & Refreshing</li>
          <li>Origin: Japan</li>
        </ul>
      </div>
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Spices Green tea.jpeg " alt="Green Tea">
          <span class="price">$2.00</span>
        </div>
        <h3>Spices Green tea</h3>
        <ul class="details">
          <li>Light & Refreshing</li>
          <li>Origin: Japan</li>
        </ul>
      </div>
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Sugar-Free Caramel.jpeg " alt="Green Tea">
          <span class="price">$2.00</span>
        </div>
        <h3>Sugar-Free Caramel</h3>
        <ul class="details">
          <li>Light & Refreshing</li>
          <li>Origin: Japan</li>
        </ul>
      </div>
      <!-- Masala Chai -->
      <div class="menu-item">
        <div class="card-top">
          <img src="https://images.unsplash.com/photo-1470337458703-46ad1756a187?auto=format&fit=crop&w=800&q=80"
            alt="Masala Chai">
          <span class="price">$2.25</span>
        </div>
        <h3>Masala Chai</h3>
        <ul class="details">
          <li>Strong & Spicy</li>
          <li>Origin: India</li>
        </ul>
      </div>

      <!-- Herbal Tea -->
      <div class="menu-item">
        <div class="card-top">
          <img src="https://images.unsplash.com/photo-1542382257-80dedb725088?auto=format&fit=crop&w=800&q=80"
            alt="Herbal Tea">
          <span class="price">$2.75</span>
        </div>
        <h3>Herbal Tea</h3>
        <ul class="details">
          <li>Mild & Refreshing</li>
          <li>Origin: Morocco</li>
        </ul>
      </div>

      <!-- Lemon Tea -->
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/lemon Tea.jpeg" alt=" Lemon Tea">
          <span class="price">$2.40</span>
        </div>
        <h3>Lemon Tea</h3>
        <ul class="details">
          <li>Refreshing Citrus</li>
          <li>Origin: Sri Lanka</li>
        </ul>
      </div>
      <!-- Lemon Tea -->
      <div class="menu-item">
        <div class="card-top">
          <img src="  Images/Honey Lemon tea.jpeg" alt=" Lemon Tea">
          <span class="price">$3.00</span>
        </div>
        <h3> Honey Lemon Tea</h3>
        <ul class="details">
          <li>Refreshing Citrus</li>
          <li>Origin: South korea </li>
        </ul>
      </div>

      <!-- Matcha Latte -->
      <div class="menu-item">
        <div class="card-top">
          <img src="https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?auto=format&fit=crop&w=800&q=80"
            alt="Matcha Latte">
          <span class="price">$3.80</span>
        </div>
        <h3>Matcha Latte</h3>
        <ul class="details">
          <li>Light & Creamy</li>
          <li>Origin: Japan</li>
        </ul>
      </div>

      <!-- Soft Drink - Lemonade -->
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Lemonda.jpeg" alt="Lemonade">
          <span class="price">$2.95</span>
        </div>
        <h3>Lemonade</h3>
        <ul class="details">
          <li>Freshly Squeezed</li>
          <li>Summer Special</li>
        </ul>
      </div>

      <!-- Soft Drink - Strawberry Smoothie -->
      <div class="menu-item">
        <div class="card-top">
          <img src="Images/Strawberry Smoothie.jpeg" alt="Strawberry Smoothie">
          <span class="price">$4.20</span>
        </div>
        <h3>Strawberry Smoothie</h3>
        <ul class="details">
          <li>Sweet & Fruity</li>
          <li>Fresh Strawberries</li>
        </ul>
      </div>

      <!-- Soft Drink - Mojito -->
      <div class="menu-item">
        <div class="card-top">
          <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=800&q=80"
            alt="Mojito">
          <span class="price">$3.90</span>
        </div>
        <h3>Mojito</h3>
        <ul class="details">
          <li>Minty Fresh</li>
          <li>Classic Mocktail</li>
        </ul>
      </div>

    </div>
  </section>

  <!-- Order Section -->
  <section class="order" id="order">
    <h2>Place Your Order</h2>
    <form id="orderForm" method="post" action="order.php">
      <input type="text" name="name" placeholder="Your Name" required><br><br>
      <input type="email" name="email" placeholder="Your Email" required><br><br>
      <input type="text" name="item" id="itemInput" placeholder="Item Name" required readonly><br><br>
      <input type="number" name="quantity" placeholder="Quantity" min="1" required><br><br>
      <input type="text" name="discount" placeholder="Discount Code"><br><br>
      <button type="submit" name="submit">Submit Order</button>
    </form>
    <p id="orderMessage"></p>
  </section>

  <!-- About Section -->
  <section class="about"
    style="background: linear-gradient(135deg, #fdfbfb, #ebedee); padding:50px 20px; text-align:center;">
    <h2 style="font-size:2.5rem; margin-bottom:20px; color:#3c2f2f;">☕ About Us</h2>
    <p style="max-width:800px; margin:0 auto; font-size:1.1rem; line-height:1.8; color:#444;">
      Welcome to <strong>“Nowrin's Coffee & Tea Adda”</strong>, exquisite flavors, freshly brewed, served with a smile.
      We craft our coffee, tea, and drinks with love, passion, and the finest ingredients. Our mission is to create a
      cozy spot
      where happiness is served in every cup. Whether it’s a strong espresso to kickstart your morning or a soothing tea
      to relax in the evening — we’ve got you covered.
    </p>
  </section>

  <!-- Contact Section -->
  <section class="contact" id="contact">
    <h2>Contact Us</h2>
    <form id="contactForm" action="" method="post">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" placeholder="Your Message" required></textarea>
      <button type="submit" name="submit">Send</button>
    </form>
    <p id="formMessage" style="margin-top:10px;font-weight:bold;">
      <?php echo $formMessage; ?>
    </p>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-grid">
      <div>
        <h4>Opening Hours</h4>
        <p>Mon - Fri: 8 AM - 10 PM</p>
        <p>Sat - Sun: 9 AM - 11 PM</p>
      </div>
      <div>
        <h4>Contact</h4>
        <p>Email: nowrinmaksuda408@gmail.com</p>
        <p>Phone: +880 1976371680</p>
      </div>
      <div>
        <h4>Address</h4>
        <p>231/4 Mohakash Road, Demra</p>
        <p>Dhaka, Bangladesh</p>
      </div>
    </div>
    <div class="socials">
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
    </div>
    <p>&copy; 2025 Coffee Haven. All rights reserved.</p>
  </footer>

  <script>
    const orderButtons = document.querySelectorAll('.order-btn');
    const itemInput = document.getElementById('itemInput');

    orderButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        const itemName = btn.getAttribute('data-item');
        itemInput.value = itemName; // Form এ item set হবে
        document.getElementById('order').scrollIntoView({
          behavior: 'smooth'
        });
      });
    });

    // AJAX submit form 
    document.getElementById('orderForm').addEventListener('submit', function(e) {
      e.preventDefault();
      let formData = new FormData(this);

      fetch('order.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.text())
        .then(data => {
          document.getElementById('orderMessage').innerHTML = data;
          this.reset();
        })
        .catch(err => console.error(err));
    });
  </script>

</body>

</html>