<?php
session_start();
include 'koneksi.php';

// $judul = $_POST['judul'];
// $kategori = $_POST['kategori'];
// $deskripsi = $_POST['deskripsi'];
// $waktu = $_POST['waktu'];
// $tempat = $_POST['tempat'];

$id = $_GET['id']; 

$query = "SELECT * FROM event WHERE Id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  // jadi variabel

  $id = $row['Id']; 
  $JudulEvent = $row['Judul_Event'];
  $kategori = $row['Kategori'];
  $deskripsi = $row['Deskripsi'];
  $poster = $row['Poster'];
  $waktu = $row['Waktu'];
  $tempat = $row['Tempat'];

  // echo "ID: " . $row['Id'] . "<br>";
  // echo "Judul Event: " . $row['Judul_Event'] . "<br>";
  // echo "Kategori: " . $row['Kategori'] . "<br>";
  // echo "Deskripsi: " . $row['Deskripsi'] . "<br>";
  // echo "Poster: " . $row['Poster'] . "<br>";
  // echo "Waktu: " . $row['Waktu'] . "<br>";
  // echo "Tempat: " . $row['Tempat'] . "<br>";
} else {
  echo "Data event dengan ID $id tidak ditemukan.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <!-- icon title -->
    <link rel="apple-touch-icon" type="image/png" href="img/iconLogo.svg" />
    <link
      rel="apple-touch-icon"
      type="image/png"
      sizes="76x76"
      href="img/iconLogo.svg"
    />
    <link
      rel="apple-touch-icon"
      type="image/png"
      sizes="120x120"
      href="img/iconLogo.svg"
    />
    <link
      rel="apple-touch-icon"
      type="image/png"
      sizes="152x152"
      href="img/iconLogo.svg"
    />
    <link
      rel="apple-touch-icon"
      type="image/png"
      href="img/iconLogo.svg"
      sizes="60x60"
    />
    <link rel="icon" type="image/png" href="img/iconLogo.svg" />
    <link rel="icon" type="image/png" href="img/iconLogo.svg" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/iconLogo.svg" sizes="192x192" />
    <link rel="icon" type="image/png" href="img/iconLogo.svg" sizes="16x16" />

    <!-- aosJS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Flowbite -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"
      rel="stylesheet"
    />

    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />

    <!-- Tailwind Elements -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
    rel="stylesheet" />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <script>
    tailwind.config = {
    darkMode: "class",
    theme: {
      fontFamily: {
        sans: ["Roboto", "sans-serif"],
        body: ["Roboto", "sans-serif"],
        mono: ["ui-monospace", "monospace"],
        },
      },
    corePlugins: {
    preflight: false,
      },
    };
    </script>


    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {},
            keyframes: {
              /*AnimationName: {
                '0%, 100%': { transform: 'rotate(-3deg)' },
                '50%': { transform: 'rotate(3deg)' },
              }*/
              infiniteSlide :{
                '0%':{
                  transform : 'translateX(0)'
                },
                '50%':{
                  transform : 'translateX(-50%)'
                },
                '100%':{
                  transform : 'translateX{-100%}'
                },
              }
            },
            animation: {
              'infinite-slide':'InfiniteSlide 40s linear infinite', 
            }
          },
        },
      };
    </script>
    <!-- 
    <style type="text/tailwindcss">
        @layer utilities {
          .content-auto {
            content-visibility: auto;
          }
        }
      </style> 
    -->

    <!-- style css -->
    <style>
      html {
        scroll-behavior: smooth;
      }
      body {
        scroll-behavior: smooth 5000s;
        color: #bdbed1;
       
      }
    </style>
    
    <title>TelUniverse - Welcome to your Universe</title>
</head>
<body class="bg-[#04052B] min-h-[100vh] relative">
  <div id="container" class="relative">
  <header class="max-w-full h-20 relative flex items-center justify-between px-5">
    <div id="logo" class="rounded-full w-[5rem]">
      <img src="/img/logo.svg" alt="" class="w-full">
    </div>
    <div id="search" class="bg-white/10 p-2 rounded-full flex items-center self-center  w-60 md:w-[30rem]">
        <input type="text" placeholder="Search" class="w-44 md:w-[26rem] h-5 bg-white/10 rounded-full placeholder:text-sm placeholder:font-semibold placeholder:my-auto p-3">
      <img src="/img/search.svg" alt="" class="w-5 mx-auto">
    </div>
    <div class="dropdown dropdown-bottom dropdown-end md:hidden">
      <label tabindex="0" class="m-1 bg-none">
        <img src="/img/menu.svg" alt="" class="w-5">
      </label>
      <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
        <li><a>Item 1</a></li>
        <li><a>Item 2</a></li>
      </ul>
    </div>
    <ul id="menuLaptop" class="absolute invisible md:text-white md:flex md:w-72 md:relative md:visible md:justify-around">
      <li>Home</li>
      <li>Event</li>
      <li>Forum</li>
      <li>Notify</li>
      <li>Login</li>
    </ul>
  </header>
  <main class="bg-auto h-[35rem] px-24 bg-center bg-scroll flex flex-col justify-center items-center relative" style="background-image: url('img/stars\ \(1\).png');">
    <div class="flex h-max justify-start gap-14 w-[70rem] m-auto">
    <div id="uploadImage" class="w-[25rem] h-96 bg-[#4E53BE]/30 flex rounded-lg">
      <!-- <input type="file" class="m-auto"> -->
      <img src="<?php echo $poster?>" alt="">
    </div>
    <div id="desc" class="items-start flex flex-col justify-between">
      <div class="flex flex-col gap-3">
      <div id="addTitle">
        <p class="text-4xl font-semibold underline"><?php echo $JudulEvent?></p>
        <!-- <p class="underline">[ FAST Ramadhan Sharing #03 ] will be held on Friday,
        31 March 2023 at Tel-U Coffee, Telkom University.</p> -->
      </div>
      <!-- <div id="radioCategory" class="flex gap-5 flex-wrap w-72">
        <div class="flex items-center gap-2">
          <label for="">Sports</label>
          <input type="radio">
        </div>
        <div class="flex items-center gap-2">
          <label for="">Pensi</label>
          <input type="radio">
        </div>
        <div class="flex items-center gap-2">
          <label for="">Seminar</label>
          <input type="radio">
        </div>
        <div class="flex items-center gap-2">
          <label for="">Expo</label>
          <input type="radio">
        </div>
        <div class="flex items-center gap-2">
          <label for="">Lomba</label>
          <input type="radio">
        </div>
        <div class="flex items-center gap-3">
          <label for="">Lain-lain</label>
          <input type="radio">
        </div>
      </div> -->
      </div>



      <div id="WhenAndWhere">
        <h3 class="text-3xl font-semibold">When and Where</h3>
        <div>
        
        <div class="flex flex-col items-start py-3">
            <div class="flex">
              <div class="bg-[#5834b4] bg-opacity-20 w-12 h-12 rounded-lg">
                <img src="img/svg/calender.svg" class=" pt-2 h-10 fill-white m-auto" alt="">
              </div>
                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-10 fill-slate-400 m-auto" viewBox="0 0 448 512">! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.<style>svg{fill:#ffffff}</style><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z"/></svg> -->
                <div class="pl-4 stron">
                    <h3 class="text-lg font-bold">Date and Time</h3>
                    <p><?php echo $waktu?>⁣</p>
                </div>
            </div>
            <div class="flex mt-4">
                <div class="bg-[#5834b4] bg-opacity-20 w-12 h-12 rounded-lg">
                  <img src="img/svg/location.svg" class=" pt-2 h-10 fill-white m-auto" alt="">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 384 512">! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.<path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg> -->
                </div>
                <div class="pl-4 stron">
                    <h3 class="text-lg font-bold mt-[-2px]">Location</h3>
                    <p><?php echo $tempat?>⁣</p>
                </div>
            </div>
        </div>
        </div>
        <div>
        </div>
      </div>
    </div>
    </div>
    <div id="About" class="flex flex-col justify-center w-[70rem] m-auto py-3">
      <p class="text-2xl font-semibold">About this event</p>
      <p><?php echo $deskripsi?><br>

        <!-- <br>E-Sertifikat & Paket Buka Puasa dapatkan *Doorprize berupa Saldo LinkAja</p> -->
    </div>
    <a href="addPartisipan.php?id=<?php echo $id?>"> <button class="bg-[#5834b4] hover:bg-[#7033AD] bg-opacity-20 hover:bg-opacity-10 py-3 px-8 rounded absolute right-20 -bottom-10" name="tombol">
      <span class="opacity-50 font-medium">Regist Event</span>
    </button> </
  </main>
</div>
<script>
AOS.init();
</script>
<!-- Flowbite -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
</body>
</html>