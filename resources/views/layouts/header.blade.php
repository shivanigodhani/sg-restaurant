<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SORA — Fine Dining Restaurant &amp; Cafe</title>
<meta name="description" content="SORA is an award-winning fine dining restaurant and cafe — seasonal ingredients, chef-led tasting menus, and an atmosphere built for slow, beautiful evenings." />
<meta name="keywords" content="SORA, fine dining, restaurant, cafe, luxury restaurant, reservation, chef tasting menu" />
<meta name="author" content="SORA" />

<!-- Open Graph -->
<meta property="og:title" content="SORA — Fine Dining Restaurant & Cafe" />
<meta property="og:description" content="Seasonal ingredients. Chef-led tasting menus. An atmosphere built for slow, beautiful evenings." />
<meta property="og:type" content="website" />

<!-- Favicon -->
<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🍽️</text></svg>" />

<!-- Google Fonts: Fraunces (display) + Manrope (body) + Cormorant (accent italic) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,400;1,9..144,500&family=Manrope:wght@300;400;500;600;700;800&family=Cormorant:ital@1&display=swap" rel="stylesheet">

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
<!-- AOS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<!-- Swiper -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css" rel="stylesheet">

<!-- Custom Styles -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

<!-- ============ LOADING SCREEN ============ -->
<div id="loader" aria-hidden="true">
  <div class="loader-inner">
    <svg class="loader-mark" viewBox="0 0 120 120" width="72" height="72">
      <circle cx="60" cy="60" r="46" fill="none" stroke="currentColor" stroke-width="1.2" stroke-dasharray="4 6"/>
      <text x="60" y="70" text-anchor="middle" class="loader-glyph">S</text>
    </svg>
    <p class="loader-word">SORA</p>
    <div class="loader-bar"><span></span></div>
  </div>
</div>

<!-- ============ CUSTOM CURSOR ============ -->
<div class="cursor-dot" aria-hidden="true"></div>
<div class="cursor-ring" aria-hidden="true"></div>

<!-- ============ SCROLL PROGRESS ============ -->
<div class="scroll-progress" aria-hidden="true"><span id="scrollProgressBar"></span></div>

