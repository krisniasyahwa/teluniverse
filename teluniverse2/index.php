<?php
session_start();
include 'koneksi.php';

$query = "SELECT * FROM event";
if(isset($_POST['sport'])){
  $query .= " WHERE Kategori='sport'";
}else if(isset($_POST['pensi'])){
  $query .= " WHERE Kategori='pensi'"; 
}else if(isset($_POST['seminar'])){
  $query .= " WHERE Kategori='seminar'"; 
}else if(isset($_POST['expo'])){
  $query .= " WHERE Kategori='expo'"; 
}else if(isset($_POST['lomba'])){
  $query .= " WHERE Kategori='lomba'"; 
}else if(isset($_POST['lain'])){
  $query .= " WHERE Kategori='lain'"; 
}
$result = mysqli_query($conn, $query);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>

<body>
  <div class="container">

    <nav>
      <div class="logo">
        <img src="img/logos.svg" alt="logo">
      </div>
      <div class="hamburger">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </div>
      <div class="top-menu ">
        <div class="close">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#fff"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </div>
        <ul>
          <li>
          <form action="" method="post">
  <!-- <button type="submit" name="logout">Logout</button> -->
</form>
            <a>
              <input class="input" name="text" placeholder="Search..." type="search">
            </a></li>
          <li class="active"><a href="">Home</a></li>
          <!-- <li><a href="">Event</a></li> -->
          <!-- <li><a href="notify.html">Notify</a></li> -->
          <li><a><button onclick="document.location='addBiodata.html'">
                Account
              </button></a></li>
        </ul>
      </div>
    </nav>
  </div>


  <div class="astro">
    <img src="img/bg.png" alt="astro">
    <div class="text-hero">
      <h3>Your event space is here!</h3>
    </div>
  </div>

  <section class="product"> 
    <h2 class="product-category">Event Category</h2>
    <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
    <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
    <div class="product-container">
      <div class="product-card">
        <form  method="post">
          <button class="product-image" type="submit" name="sport">
            <img src="img/sport.png" class="product-thumb" alt="">
            <h2 class="product-brand">sport</h2>
          </button>
      </div>
      <div class="product-card">
        <button class="product-image" name="pensi">
            <img src="img/pensi.png" class="product-thumb" alt="">
            <h2 class="product-brand">pensi</h2>
            
        </button>
      </div>
      <div class="product-card">
        <button class="product-image" name="seminar">
            <img src="img/seminar.png" class="product-thumb" alt="">
            <h2 class="product-brand">seminar</h2>
        </button>
      </div>
      <div class="product-card">
        <button class="product-image" name="expo">
            <img src="img/expo.png" class="product-thumb" alt="">
            <h2 class="product-brand">expo</h2>
        </button>
      </div>
      <div class="product-card">
        <button class="product-image" name="lomba">
            <img src="img/lomba.png" class="product-thumb" alt="">
            <h2 class="product-brand">lomba</h2>
        </button>
      </div>
      <div class="product-card">
        <button class="product-image" name="lain">
            <img src="img/lainlain.png" class="product-thumb" alt="">
            <h2 class="product-brand">lain-lain</h2>
        </button>
      </div>
      </form>
    </div>
   </section>

    
 
  <div class="containerz">
  <main class="grid"> 
   

  <?php
    

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['Id']; 
        $JudulEvent = $row['Judul_Event'];
        $kategori = $row['Kategori'];
        $deskripsi = $row['Deskripsi'];
        $poster = $row['Poster'];
        $waktu = $row['Waktu'];
        $tempat = $row['Tempat'];

        
        ?>

        <article>
          <img src="<?php echo $poster?>" width="247.96%" height="330%" alt="career">
          <div class="konten" style="color:wheat">
            <h2><?php echo $JudulEvent?></h2>
            <p><?php echo $deskripsi?></p>
            <div class="button-event">
              <a href="detailEvent.php?id=<?php echo $id?>" class="btn-purple">More Detail</a>
            </div>
          </div>
        </article>
        
<?php }
    } else {
      echo "Tidak ada data event.";
    }
    ?>



    <!-- <article> 
      <img src="./img/korea.png" width="247.96%" height="330%" alt="korea">
      <div class="konten">
        <h2>Course</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>

    <article>
      <img src="./img/alumni.jpeg" width="247.96%" height="330%" alt="webinar">
      <div class="konten">
        <h2>Webinar</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>

    <article>
      <img src="./img/obathati.jpeg" width="268.19%" height="330%" alt="fast">
      <div class="konten">
        <h2>obathati</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>

    <article>
      <img src="./img/lpdp.png" width="268.19%" height="330%" alt="fast">
      <div class="konten">
        <h2>LPDP</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>

    <article>
      <img src="./img/mlval.jpeg" width="247.96%" height="330%" alt="fast">
      <div class="konten">
        <h2>Valentine</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>

    <article>
      <img src="./img/bumn.png" width="247.96%" height="330%" alt="fast">
      <div class="konten">
        <h2>BUMN</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>
    
    <article>
      <img src="./img/rmdvs.png" width="247.96%" height="330%" alt="fast">
      <div class="konten">
        <h2>RamadanVS</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>
    <article>
      <img src="./img/fast.png" width="247.96%" height="330%" alt="fast">
      <div class="konten">
        <h2>FastRamadan</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>
    <article>
      <img src="./img/fast5.png" width="268.19%" height="330%" alt="fast">
      <div class="konten">
        <h2>FastRamadan5</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>
    <article>
      <img src="./img/ml1.png" width="268.19%" height="330%" alt="fast">
      <div class="konten">
        <h2>ml1</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>
    <article>
      <img src="./img/pmk.png" width="247.96%" height="330%" alt="fast">
      <div class="konten">
        <h2>pmk</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>
    <article>
      <img src="./img/pdep2.png" width="268.19%" height="330%" alt="fast">
      <div class="konten">
        <h2>Webinar pdep2</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>
    <article>
      <img src="./img/lrslr.png" width="247.96%" height="330%" alt="fast">
      <div class="konten">
        <h2>Webinar Labs</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>
    <article>
      <img src= "./img/langfest.png" width="247.96%" height="330%" alt="fast">
      <div class="konten">
        <h2>Festival</h2>
        <p>blablablablabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article>
    <article>
      <img src="./img/fashion.png" width="247.96%" height="330%" alt="fashion">
      <div class="konten">
        <h2>Fashion</h2>
        <p>blablabalabla</p>
        <div class="button-event">
          <a href="#" class="btn-purple">More Detail</a>
        </div>
      </div>
    </article> -->
  </main>
  </div>

  <!--Footer-->
  <footer>
    <div class="container-fluid">
      <div class="item-footer item-footer-1">
        <img src="./img/logos.svg" alt="logo-footer" class="logo-footer">
      </div>
      <div class="item-footer item-footer-2">
        <h3>Contact</h3>
        <ul>
          <li><i class="fab fa-whatsapp"></i> <span>0812-5738-6xx7</span></li>
          <li><i class="fab fa-twitter"></i><span>@teluniverse</span></li>
          <li><i class="fab fa-instagram"></i><span>teluniverse</span></li>
          <li><i class="far fa-envelope"></i><span>teluniverse@gmail.com</span></li>
        </ul>
      </div>
      <div class="item-footer item-footer-3">
        <h3>Campus  Location</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.3074542903328!2d107.6316854!3d-6.973006999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adf177bf8d%3A0x437398556f9fa03!2sTelkom%20University!5e0!3m2!1sen!2sid!4v1683984812796!5m2!1sen!2sid" width="300" height=150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>