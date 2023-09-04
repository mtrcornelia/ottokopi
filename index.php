<?php

$db_name = 'mysql:host=localhost;dbname=ottokopi';
$username = 'root';
$password = '';

$conn = new PDO($db_name, $username, $password);

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $guests = $_POST['guests'];
   $guests = filter_var($guests, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND number = ? AND guests = ?");
   $select_contact->execute([$name, $number, $guests]);

   if($select_contact->rowCount() > 0){
      $message[] = 'message sent already!';
   }else{
      $insert_contact = $conn->prepare("INSERT INTO `contact_form`(name, number, guests) VALUES(?,?,?)");
      $insert_contact->execute([$name, $number, $guests]);
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>OTTOKOPI</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
<link rel="shorctut icon" type="text/css" href="images/t3.ico">
</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<!-- header section starts  -->

<header class="header">

   <section class="flex">

      <a href="#home" class="logo"><img src="images/t3.jpeg" alt=""> Ottokopi.</a>

      <nav class="navbar">
         <a href="#home">home</a>
         <a href="#about">about</a>
         <a href="">menu</a>

         <a href="#gallery">gallery</a>
         <a href="#team">team</a>
         <a href="#contact">contact</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<div class="home-bg">

   <section class="home" id="home">

      <div class="content">
         <h3>Ottokopi.</h3>
         <p>Coffee & Space</br>
            Karena #OttoTempatHumble</br>
            EVERYDAY | 10AM - 12AM</br>
            📍Ottokopi -- Pasar Ambacang No 12, PDG</br>
            📍Ottokopi -- Pasar Baru No 1A, PDG</p>
        <a href="video.php"><i class="fas fa-play"></i></a> 
      </div>

   </section>

</div>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

   <div class="image">
      <img src="images/ot3.jpg" alt="">
   </div>

   <div class="content">
      <h3>About Ottokopi.</h3>
      <p>Perjalanan kami dimulai pada tahun 2020. kami selalu berusaha untuk menyajikan kopi berkualitas. kami tidak mengenal customer itu adalah raja tapi kami mengenal customer itu adalah keluarga. kami sangat ingin menjadikan tempat kami rumah kedua bagi customer kami. Misi kami seluruh wilayah indonesia bisa merasakan kualitas kopi dan juga pelayanan yang kami berikan.</p>
      <a href="#menu" class="btn">our popular menu</a>
   </div>

</section>

<!-- about section ends -->

<!-- facility section starts  -->

<section class="facility">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>our facility</h3>
   </div>

   <div class="box-container">

      <div class="box">
         <img src="images/out.jpg" alt="">
         <h3>Outdoor</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, adipisci!</p>
      </div>

      <div class="box">
         <img src="images/in1.jpg" alt="">
         <h3>Indoor</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, adipisci!</p>
      </div>

      <div class="box">
         <img src="images/live.jpg" alt="">
         <h3>Live Music</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, adipisci!</p>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>read to go coffee</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, adipisci!</p>
      </div>

   </div>

</section>

<!-- facility section ends -->

<!-- menu section starts  -->

<section class="menu" id="menu">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>popular menu</h3>
   </div>

   <div class="box-container">

      <div class="box">
         <img src="images/menu4.jpg" alt="">
         <h3>Cappuccino</h3>
      </div>

      <div class="box">
         <img src="images/menu1.jpg" alt="">
         <h3>Sparkling</h3>
      </div>

      <div class="box">
         <img src="images/menu3.jpg" alt="">
         <h3>Taro</h3>
      </div>

      <div class="box">
         <img src="images/menu5b.jpeg" alt="">
         <h3>Macha Latte</h3>
      </div>

      <div class="box">
         <img src="images/menu6b.jpeg" alt="">
         <h3>Cafe Latte</h3>
      </div>

      <div class="box">
         <img src="images/menu7.jpeg" alt="">
         <h3>Chocolate</h3>
      </div>

   </div>
   <div class="box-container">
      <div class="box">
          <a href="minuman.php" class="btn">Minuman</a>
      </div>
      <div class="box">
          <a href="makanan.php" class="btn">Makanan</a>
      </div>
   </div>
     
</section>

<!-- menu section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>our gallery</h3>
   </div>

   <div class="box-container">
      <img src="images/g1.jpg" alt="">
      <img src="images/g2.jpg" alt="">
      <img src="images/g3.jpg" alt="">
      <img src="images/g4.jpg" alt="">
      <img src="images/g5.jpg" alt="">
      <img src="images/gallery-6.webp" alt="">
   </div>

</section>

<!-- gallery section ends -->

<!-- team section starts  -->

<section class="team" id="team">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>our team</h3>
   </div>

   <div class="box-container">

      <div class="box">
         <img src="images/m1.jpeg" alt="">
         <h3>harismart founder ottokopi</h3>
      </div>
      <div class="box">
         <img src="images/m8.jpeg" alt="">
         <h3>tondy raynes ogano founder</h3>
      </div>
      <div class="box">
         <img src="images/m3.jpg" alt="">
         <h3>Barista</h3>
      </div>
      <div class="box">
         <img src="images/m4.jpg" alt="">
         <h3>Barista</h3>
      </div>
      <div class="box">
         <img src="images/m5.jpg" alt="">
         <h3>Barista</h3>
      </div>
      <div class="box">
         <img src="images/m2.jpg" alt="">
         <h3>Barista</h3>
      </div>

   </div>

</section>

<!-- team section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>contact us</h3>
   </div>

   <div class="row">

      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>

      <form action="" method="post">
         <h3>book a table</h3>
         <input type="text" name="name" required class="box" maxlength="20" placeholder="enter your name">
         <input type="number" name="number" required class="box" maxlength="20" placeholder="enter your number" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false">
         <input type="number" name="guests" required class="box" maxlength="20" placeholder="how many guests" min="0" max="99" onkeypress="if(this.value.length == 2) return false">
         <input type="submit" name="send" value="send message" class="btn">
      </form>

   </div>

</section>

<!-- mitra starts -->

<section class="contact" id="contact">

   <div class="heading">
      <img src="images/heading-img.png" alt="">
      <h3>Mau Usaha Coffe Shop?</h3>
   </div>

   <div class="row">

      <div class="image">
         <h2>Mari bermitra dengan Ottokopi dan anda akan mendapatkan paket coffee Shop lengkap dengan peralatan, bahan baku, training barista, dll. </h2>
      </div>

      

   </div>

</section>

<!-- mitra end -->

<!-- contact section ends -->

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <i class="fab fa-instagram"></i>
         <h3>our instagram</h3>
         <a href="https://www.instagram.com/ottokopi_/">ottokopi_</a>
         
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <a>10:00am to 12:00pm</a>
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>shop location</h3>
         <a href="https://www.google.com/maps/place/Ottokopi,+Jl.+Dr.+Moh.+Hatta+Jl.+Ps.+Baru+No.1a,+RW.02,+Limau+Manis,+Kec.+Pauh,+Kota+Padang,+Sumatera+Barat+25157/@-0.9273233,100.4307974,17z/data=!4m5!3m4!1s0x2fd4b924526166ad:0xf035ef48aee1c264!8m2!3d-0.9273233!4d100.4307974?hl=en-ID&gl=id">Pasar baru No1A, PDG</a></br>
         <a href="https://www.google.com/maps/place/Ottokopi,+Jl.+Dr.+Moh.+Hatta+Kelurahan+No.18,+Pasar+Ambacang,+Kuranji,+Padang+City,+West+Sumatra+25152/@-0.9320108,100.4103797,16z/data=!4m5!3m4!1s0x2fd4b9c3dcf4dfd7:0xe56649edebfb4a9d!8m2!3d-0.9320108!4d100.4103797?hl=en-ID&gl=id">Pasar Ambacang No 12, PDG</a>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email</h3>
         <a href="https://mail.google.com/mail/u/0/?hl=en#inbox?compose=GTvVlcRzCMhJrsgggLsZFdpRGlkPBGmjqtjMPkcGcHmFMlsKRrHqVNqSghRqTZqrRZctNlPGGxsnG">ottokopipdg@gmail.com</a>
      </div>
      

   </div>

   <div class="credit"> &copy; Ottokopi @ <?= date('Y'); ?> by <span>AMO</span> | all rights reserved! </div>

</section>

<!-- footer section ends -->























<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>