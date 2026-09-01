<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<meta name="theme-color" content="#f3c94f">
<title>Alan — Una vida llena de luz</title>
<meta name="description" content="Un rincón dedicado a Alan: recuerdos, sonrisas y mensajes de cariño.">
<style>
:root{--ink:#20252d;--muted:#6d7178;--paper:#fffdf8;--cream:#fff7e6;--yellow:#f0c94b;--gold:#b8872c;--dark:#171b18;--line:#e8dcc5;--shadow:0 20px 55px rgba(66,48,14,.14);--frame:#fffaf0}
*{box-sizing:border-box} html{scroll-behavior:smooth} body{margin:0;overflow-x:hidden;background:linear-gradient(180deg,#fff9e9,#fffdf8 44%,#f7f0e5);color:var(--ink);font-family:ui-rounded,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;-webkit-font-smoothing:antialiased}
img{display:block;max-width:100%;-webkit-user-drag:none;user-select:none} .wrap{width:min(1080px,92vw);margin:auto}
.hero{min-height:92svh;position:relative;display:grid;place-items:end center;overflow:hidden;background:#111}
.hero>img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center 38%;filter:saturate(.98) contrast(1.03);transform:scale(1.01)}
.hero:after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.03),rgba(0,0,0,.04) 40%,rgba(10,10,10,.78))}
.heroCopy{position:relative;z-index:2;text-align:center;color:#fff;padding:0 20px 52px;max-width:820px} .kicker,.eyebrow{font-size:12px;letter-spacing:.2em;text-transform:uppercase;font-weight:850}
.kicker{opacity:.88} .hero h1{font:500 clamp(54px,13vw,98px)/.9 Georgia,serif;margin:12px 0 14px} .hero p{font-size:clamp(17px,4vw,22px);line-height:1.55;color:#fff9e8;max-width:650px;margin:auto}
.down{display:inline-grid;place-items:center;margin-top:24px;width:48px;height:48px;border:1px solid rgba(255,255,255,.5);border-radius:50%;text-decoration:none;color:white;font-size:23px}
.intro{padding:78px 0 48px;text-align:center} .eyebrow{color:var(--gold)} .title{font:500 clamp(36px,7vw,60px)/1.05 Georgia,serif;margin:12px 0 18px}
.intro p{max-width:730px;margin:auto;color:#60646b;line-height:1.8;font-size:18px}
.story{padding:20px 0 72px} .storyGrid{display:grid;grid-template-columns:repeat(12,1fr);gap:16px}
.tile{position:relative;overflow:hidden;border-radius:28px;padding:8px;background:linear-gradient(145deg,#fffdf7,#f2e7ce);border:1px solid rgba(191,151,67,.28);box-shadow:var(--shadow);min-height:280px}
.tile img{width:100%;height:100%;object-fit:cover;border-radius:21px;transition:transform .55s cubic-bezier(.2,.75,.2,1)} .tile:hover img{transform:scale(1.035)} .tile.a{grid-column:span 7;min-height:560px} .tile.b{grid-column:span 5} .tile.c{grid-column:span 5} .tile.d{grid-column:span 7;min-height:420px}
.caption{position:absolute;left:24px;bottom:22px;right:24px;color:#fff;text-shadow:0 2px 10px rgba(0,0,0,.8);font-weight:700}
.ribbon{margin-top:30px;background:var(--dark);color:#fff;border-radius:32px;padding:34px;display:grid;grid-template-columns:1fr auto;gap:20px;align-items:center} .ribbon strong{font:500 clamp(28px,5vw,43px)/1.1 Georgia,serif} .ribbon span{color:#d6dbd6;line-height:1.65} .heart{font-size:54px}
.carouselSec{padding:70px 0 84px;position:relative} .carouselHead{text-align:center;margin-bottom:28px}
.carouselShell{position:relative;width:min(1220px,100%);margin:auto} .carouselViewport{overflow:hidden;width:100%;touch-action:pan-y}
.carousel{display:flex;gap:18px;overflow-x:auto;scroll-snap-type:x mandatory;scroll-behavior:smooth;padding:8px max(18px,calc((100vw - 1080px)/2)) 32px;scrollbar-width:none;-webkit-overflow-scrolling:touch;overscroll-behavior-x:contain}
.carousel::-webkit-scrollbar{display:none} .slide{flex:0 0 min(76vw,390px);height:535px;scroll-snap-align:center;position:relative;border-radius:31px;padding:9px;background:linear-gradient(145deg,#fffefa,#ead7aa);border:1px solid rgba(187,143,53,.34);box-shadow:var(--shadow)}
.photoFrame{width:100%;height:100%;border-radius:23px;overflow:hidden;background:#ddd;position:relative} .photoFrame img{width:100%;height:100%;object-fit:cover;transition:transform .45s cubic-bezier(.2,.75,.2,1);transform-origin:center}
.slide:hover .photoFrame img,.slide.isZoom .photoFrame img{transform:scale(1.085)} .slide small{position:absolute;left:24px;bottom:24px;background:rgba(255,255,255,.91);backdrop-filter:blur(8px);padding:8px 12px;border-radius:999px;font-size:12px;font-weight:800;color:#42464c;box-shadow:0 5px 18px rgba(0,0,0,.12)}
.carBtn{position:absolute;z-index:5;top:50%;transform:translateY(-50%);width:52px;height:52px;border-radius:50%;border:1px solid rgba(138,101,28,.22);background:rgba(255,253,247,.94);color:#2b2a25;display:grid;place-items:center;font-size:28px;cursor:pointer;box-shadow:0 10px 28px rgba(39,31,15,.18);backdrop-filter:blur(8px);transition:transform .2s,background .2s}
.carBtn:hover{transform:translateY(-50%) scale(1.06);background:#fff} .carPrev{left:12px} .carNext{right:12px} .carBtn:disabled{opacity:.25;cursor:default}
.hint{text-align:center;color:var(--muted);font-size:13px;margin-top:2px} .counter{text-align:center;color:#8b7650;font-weight:800;font-size:12px;margin-top:8px;letter-spacing:.08em}
.timeline{padding:42px 0 82px} .timelineList{max-width:820px;margin:auto} .moment{display:grid;grid-template-columns:82px 1fr;gap:22px;padding:25px 0;border-bottom:1px solid var(--line)} .num{font:500 40px Georgia,serif;color:#d5ad55} .moment h3{margin:4px 0 8px;font:500 28px Georgia,serif} .moment p{margin:0;color:var(--muted);line-height:1.72}
.verticalStory{background:#121412;color:#fff;padding:76px 0} .verticalStory .title{color:#fff} .verticalStory .eyebrow{color:#f3d177}
.stack{width:min(820px,94vw);margin:30px auto 0;background:#0d0f0d;padding:10px;border:1px solid rgba(255,255,255,.13);box-shadow:0 32px 90px rgba(0,0,0,.34);border-radius:32px;overflow:hidden}
.stackFrame{padding:5px;background:#f7ecd0} .stackFrame img{width:100%;aspect-ratio:4/3;object-fit:cover;transition:transform .45s} .stackFrame.portrait img{aspect-ratio:4/5} .stackFrame:hover img{transform:scale(1.025)} .stackQuote{padding:48px 7vw;background:#f1ce73;color:#26220f;text-align:center;font:500 clamp(27px,5vw,44px)/1.22 Georgia,serif}
.love{padding:90px 0} .loveCard{max-width:780px;margin:auto;background:#fff;border-radius:34px;padding:clamp(26px,5vw,48px);box-shadow:var(--shadow);border:1px solid #eee3cf} .loveCard h2{font:500 clamp(36px,7vw,55px)/1.05 Georgia,serif;margin:8px 0 12px} .loveCard p{color:var(--muted);line-height:1.65}
.formGrid{display:grid;gap:16px;margin-top:28px} .field{display:grid;gap:7px} label{font-size:13px;font-weight:800;color:#4b5563} input,textarea{width:100%;border:1px solid #e6decd;background:#fffdf8;border-radius:16px;padding:15px 16px;font:inherit;outline:none} textarea{min-height:150px;resize:vertical} input:focus,textarea:focus{border-color:#d5ad4e;box-shadow:0 0 0 4px rgba(213,173,78,.12)}
button.submit{appearance:none;border:0;border-radius:999px;padding:16px 22px;background:#1f2521;color:#fff;font-weight:850;font-size:16px;cursor:pointer;box-shadow:0 12px 26px rgba(31,37,33,.22)} .formMsg{font-size:14px;min-height:20px;color:#59635a} .privacy{font-size:12px;color:#8b8b83} footer{text-align:center;padding:8px 20px 70px;color:#8b8173} footer strong{display:block;color:#3c372f;font:500 27px Georgia,serif;margin-bottom:7px}
.loveModal{position:fixed;inset:0;z-index:9999;display:grid;place-items:center;padding:20px;background:rgba(17,20,18,.58);backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);opacity:0;visibility:hidden;transition:opacity .22s ease,visibility .22s ease}
.loveModal.show{opacity:1;visibility:visible}
.loveModalCard{width:min(520px,92vw);background:#fffdf8;border:1px solid #eadab9;border-radius:30px;padding:34px 28px 28px;text-align:center;box-shadow:0 28px 80px rgba(24,20,12,.3);transform:translateY(16px) scale(.98);transition:transform .22s ease}
.loveModal.show .loveModalCard{transform:translateY(0) scale(1)}
.loveModalHeart{width:70px;height:70px;margin:0 auto 17px;display:grid;place-items:center;border-radius:50%;background:#f6df9c;color:#6a4d10;font-size:34px;box-shadow:0 10px 25px rgba(184,135,44,.18)}
.loveModalCard h3{margin:0 0 12px;font:500 clamp(29px,6vw,40px)/1.08 Georgia,serif;color:#2b2924}
.loveModalCard p{margin:0 auto 24px;max-width:410px;color:#666158;line-height:1.7;font-size:16px}
.loveModalClose{appearance:none;border:0;border-radius:999px;padding:13px 24px;background:#1f2521;color:#fff;font-weight:850;font-size:15px;cursor:pointer}
body.modalOpen{overflow:hidden}


.videoMemory{padding:18px 0 88px}.videoMemoryHead{text-align:center;margin-bottom:26px}.videoCard{width:min(430px,88vw);margin:auto;padding:9px;border-radius:30px;background:linear-gradient(145deg,#fffefa,#ead7aa);border:1px solid rgba(187,143,53,.34);box-shadow:var(--shadow);position:relative}.videoFrame{overflow:hidden;border-radius:22px;background:#111;aspect-ratio:9/16;max-height:610px}.videoFrame video{display:block;width:100%;height:100%;object-fit:cover}.videoCaption{text-align:center;padding:17px 12px 10px;color:#5f5a50;font:500 19px/1.45 Georgia,serif}.videoBadge{position:absolute;top:22px;left:22px;z-index:2;background:rgba(255,255,255,.9);backdrop-filter:blur(8px);padding:8px 12px;border-radius:999px;font-size:11px;font-weight:850;letter-spacing:.08em;text-transform:uppercase;color:#55472d}
@media(max-width:720px){
  .wrap{width:91vw} .hero{min-height:82svh} .hero>img{object-position:center 35%} .heroCopy{padding-bottom:38px} .intro{padding-top:58px}
  .storyGrid{grid-template-columns:1fr;gap:14px} .tile,.tile.a,.tile.b,.tile.c,.tile.d{grid-column:auto;min-height:430px;border-radius:24px;padding:6px} .tile img{border-radius:18px}
  .ribbon{grid-template-columns:1fr;text-align:center;border-radius:25px;padding:28px 22px}
  .carouselSec{padding:58px 0 68px} .carousel{gap:12px;padding-left:12vw;padding-right:12vw} .slide{flex-basis:76vw;height:min(118vw,510px);padding:7px;border-radius:25px} .photoFrame{border-radius:19px}
  .carBtn{width:46px;height:46px;font-size:24px;top:48%} .carPrev{left:7px} .carNext{right:7px}
  .moment{grid-template-columns:52px 1fr;gap:14px} .num{font-size:31px} .moment h3{font-size:25px}
  .stack{width:100%;border-radius:0;border-left:0;border-right:0;padding:6px} .verticalStory .wrap{width:91vw} .love{padding:62px 0} .loveCard{border-radius:25px}
}
@media(hover:none){.slide:active .photoFrame img{transform:scale(1.055)}}
@media(prefers-reduced-motion:reduce){*{scroll-behavior:auto!important;transition:none!important}}

.poolDay{padding-top:76px;padding-bottom:36px}.poolIntro,.wallIntro{max-width:760px;color:#655f56;line-height:1.7;margin:0 0 24px}
.dayCarouselShell{position:relative}.dayCarousel{display:flex;gap:16px;overflow-x:auto;scroll-snap-type:x mandatory;padding:8px 4px 18px;scrollbar-width:none}.dayCarousel::-webkit-scrollbar{display:none}
.daySlide{flex:0 0 min(82vw,620px);scroll-snap-align:center;border-radius:24px;overflow:hidden;background:#171717;box-shadow:0 14px 38px rgba(44,34,20,.14);min-height:360px;display:flex;align-items:center;justify-content:center}
.daySlide img,.daySlide video{display:block;width:100%;height:min(72vh,720px);object-fit:contain;background:#111}.dayBtn{position:absolute;z-index:4;top:50%;transform:translateY(-50%);width:48px;height:48px;border:0;border-radius:50%;background:rgba(255,255,255,.92);box-shadow:0 8px 25px rgba(0,0,0,.18);font-size:34px;cursor:pointer}.dayPrev{left:10px}.dayNext{right:10px}
.loveWall{padding-top:36px;padding-bottom:80px}.loveWallGrid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:16px}.loveNote{background:#fffdf8;border:1px solid rgba(178,145,75,.22);border-radius:20px;padding:20px;box-shadow:0 10px 28px rgba(64,48,20,.07)}.loveNoteText{font-family:Georgia,serif;font-size:18px;line-height:1.55;color:#3e372d;margin:0 0 16px}.loveNoteBy{font-weight:700;color:#8b6d2f}.loveNoteRel{font-size:13px;color:#857b6c;margin-top:3px}.wallEmpty{grid-column:1/-1;padding:24px;border:1px dashed #cfbd92;border-radius:18px;text-align:center;color:#7d725f;background:#fffaf0}
@media(max-width:700px){.daySlide{flex-basis:88vw;min-height:300px}.daySlide img,.daySlide video{height:62vh}.dayBtn{width:42px;height:42px}.poolDay{padding-top:54px}}

</style>
</head>
<body>
<section class="hero" id="inicio">
  <img src="assets/alan_29.webp" alt="Alan con su madre">
  <div class="heroCopy"><div class="kicker">Un rincón hecho con amor</div><h1>Alan</h1><p>Una colección de momentos pequeños que, juntos, cuentan la historia más grande de todas.</p><a class="down" href="#historia" aria-label="Ver historia">↓</a></div>
</section>

<section class="intro wrap" id="historia">
  <div class="eyebrow">Nuestra historia</div><h2 class="title">Desde el primer instante</h2>
  <p>Esta página nace para guardar recuerdos: su llegada, sus primeras sonrisas, sus ocurrencias y todos esos días sencillos que terminan convirtiéndose en lo más importante.</p>
</section>

<section class="story wrap">
  <div class="storyGrid">
    <figure class="tile a"><img src="assets/alan_25.webp" alt="Nacimiento de Alan"><figcaption class="caption">El comienzo de todo.</figcaption></figure>
    <figure class="tile b"><img src="assets/alan_28.webp" alt="Alan con su madre"><figcaption class="caption">Sus primeros días, junto a mamá.</figcaption></figure>
    <figure class="tile c"><img src="assets/alan_01.webp" alt="Alan con su padre"><figcaption class="caption">Una vida entera por descubrir.</figcaption></figure>
    <figure class="tile d"><img src="assets/alan_35.webp" alt="Alan con su madre"><figcaption class="caption">Una sonrisa capaz de cambiar cualquier día.</figcaption></figure>
  </div>
  <div class="ribbon"><div><strong>Crecer es coleccionar primeras veces.</strong><br><span>Primeras miradas, primeras carcajadas, primeros pasos… y miles de recuerdos todavía por vivir.</span></div><div class="heart">♡</div></div>
</section>

<section class="carouselSec" id="album">
  <div class="carouselHead wrap"><div class="eyebrow">Pequeños momentos</div><h2 class="title">Una sonrisa distinta cada día</h2></div>
  <div class="carouselShell">
    <button class="carBtn carPrev" id="prevBtn" aria-label="Foto anterior">‹</button>
    <div class="carouselViewport">
      <div class="carousel" id="carousel"><article class="slide" data-index="1">
      <div class="photoFrame"><img src="assets/alan_01.webp" alt="Recuerdo de Alan 1" loading="lazy" decoding="async"></div>
      <small>Recuerdo 01</small>
    </article>
<article class="slide" data-index="2">
      <div class="photoFrame"><img src="assets/alan_02.webp" alt="Recuerdo de Alan 2" loading="lazy" decoding="async"></div>
      <small>Recuerdo 02</small>
    </article>
<article class="slide" data-index="3">
      <div class="photoFrame"><img src="assets/alan_03.webp" alt="Recuerdo de Alan 3" loading="lazy" decoding="async"></div>
      <small>Recuerdo 03</small>
    </article>
<article class="slide" data-index="4">
      <div class="photoFrame"><img src="assets/alan_04.webp" alt="Recuerdo de Alan 4" loading="lazy" decoding="async"></div>
      <small>Recuerdo 04</small>
    </article>
<article class="slide" data-index="5">
      <div class="photoFrame"><img src="assets/alan_05.webp" alt="Recuerdo de Alan 5" loading="lazy" decoding="async"></div>
      <small>Recuerdo 05</small>
    </article>
<article class="slide" data-index="6">
      <div class="photoFrame"><img src="assets/alan_06.webp" alt="Recuerdo de Alan 6" loading="lazy" decoding="async"></div>
      <small>Recuerdo 06</small>
    </article>
<article class="slide" data-index="7">
      <div class="photoFrame"><img src="assets/alan_07.webp" alt="Recuerdo de Alan 7" loading="lazy" decoding="async"></div>
      <small>Recuerdo 07</small>
    </article>
<article class="slide" data-index="8">
      <div class="photoFrame"><img src="assets/alan_08.webp" alt="Recuerdo de Alan 8" loading="lazy" decoding="async"></div>
      <small>Recuerdo 08</small>
    </article>
<article class="slide" data-index="9">
      <div class="photoFrame"><img src="assets/alan_09.webp" alt="Recuerdo de Alan 9" loading="lazy" decoding="async"></div>
      <small>Recuerdo 09</small>
    </article>
<article class="slide" data-index="10">
      <div class="photoFrame"><img src="assets/alan_10.webp" alt="Recuerdo de Alan 10" loading="lazy" decoding="async"></div>
      <small>Recuerdo 10</small>
    </article>
<article class="slide" data-index="11">
      <div class="photoFrame"><img src="assets/alan_11.webp" alt="Recuerdo de Alan 11" loading="lazy" decoding="async"></div>
      <small>Recuerdo 11</small>
    </article>
<article class="slide" data-index="12">
      <div class="photoFrame"><img src="assets/alan_12.webp" alt="Recuerdo de Alan 12" loading="lazy" decoding="async"></div>
      <small>Recuerdo 12</small>
    </article>
<article class="slide" data-index="13">
      <div class="photoFrame"><img src="assets/alan_13.webp" alt="Recuerdo de Alan 13" loading="lazy" decoding="async"></div>
      <small>Recuerdo 13</small>
    </article>
<article class="slide" data-index="14">
      <div class="photoFrame"><img src="assets/alan_14.webp" alt="Recuerdo de Alan 14" loading="lazy" decoding="async"></div>
      <small>Recuerdo 14</small>
    </article>
<article class="slide" data-index="15">
      <div class="photoFrame"><img src="assets/alan_15.webp" alt="Recuerdo de Alan 15" loading="lazy" decoding="async"></div>
      <small>Recuerdo 15</small>
    </article>
<article class="slide" data-index="16">
      <div class="photoFrame"><img src="assets/alan_16.webp" alt="Recuerdo de Alan 16" loading="lazy" decoding="async"></div>
      <small>Recuerdo 16</small>
    </article>
<article class="slide" data-index="17">
      <div class="photoFrame"><img src="assets/alan_17.webp" alt="Recuerdo de Alan 17" loading="lazy" decoding="async"></div>
      <small>Recuerdo 17</small>
    </article>
<article class="slide" data-index="18">
      <div class="photoFrame"><img src="assets/alan_18.webp" alt="Recuerdo de Alan 18" loading="lazy" decoding="async"></div>
      <small>Recuerdo 18</small>
    </article>
<article class="slide" data-index="19">
      <div class="photoFrame"><img src="assets/alan_19.webp" alt="Recuerdo de Alan 19" loading="lazy" decoding="async"></div>
      <small>Recuerdo 19</small>
    </article>
<article class="slide" data-index="20">
      <div class="photoFrame"><img src="assets/alan_20.webp" alt="Recuerdo de Alan 20" loading="lazy" decoding="async"></div>
      <small>Recuerdo 20</small>
    </article>
<article class="slide" data-index="21">
      <div class="photoFrame"><img src="assets/alan_21.webp" alt="Recuerdo de Alan 21" loading="lazy" decoding="async"></div>
      <small>Recuerdo 21</small>
    </article>
<article class="slide" data-index="22">
      <div class="photoFrame"><img src="assets/alan_22.webp" alt="Recuerdo de Alan 22" loading="lazy" decoding="async"></div>
      <small>Recuerdo 22</small>
    </article>
<article class="slide" data-index="23">
      <div class="photoFrame"><img src="assets/alan_23.webp" alt="Recuerdo de Alan 23" loading="lazy" decoding="async"></div>
      <small>Recuerdo 23</small>
    </article>
<article class="slide" data-index="24">
      <div class="photoFrame"><img src="assets/alan_24.webp" alt="Recuerdo de Alan 24" loading="lazy" decoding="async"></div>
      <small>Recuerdo 24</small>
    </article>
<article class="slide" data-index="25">
      <div class="photoFrame"><img src="assets/alan_25.webp" alt="Recuerdo de Alan 25" loading="lazy" decoding="async"></div>
      <small>Recuerdo 25</small>
    </article>
<article class="slide" data-index="26">
      <div class="photoFrame"><img src="assets/alan_26.webp" alt="Recuerdo de Alan 26" loading="lazy" decoding="async"></div>
      <small>Recuerdo 26</small>
    </article>
<article class="slide" data-index="27">
      <div class="photoFrame"><img src="assets/alan_27.webp" alt="Recuerdo de Alan 27" loading="lazy" decoding="async"></div>
      <small>Recuerdo 27</small>
    </article>
<article class="slide" data-index="28">
      <div class="photoFrame"><img src="assets/alan_28.webp" alt="Recuerdo de Alan 28" loading="lazy" decoding="async"></div>
      <small>Recuerdo 28</small>
    </article>
<article class="slide" data-index="29">
      <div class="photoFrame"><img src="assets/alan_29.webp" alt="Recuerdo de Alan 29" loading="lazy" decoding="async"></div>
      <small>Recuerdo 29</small>
    </article>
<article class="slide" data-index="30">
      <div class="photoFrame"><img src="assets/alan_30.webp" alt="Recuerdo de Alan 30" loading="lazy" decoding="async"></div>
      <small>Recuerdo 30</small>
    </article>
<article class="slide" data-index="31">
      <div class="photoFrame"><img src="assets/alan_31.webp" alt="Recuerdo de Alan 31" loading="lazy" decoding="async"></div>
      <small>Recuerdo 31</small>
    </article>
<article class="slide" data-index="32">
      <div class="photoFrame"><img src="assets/alan_32.webp" alt="Recuerdo de Alan 32" loading="lazy" decoding="async"></div>
      <small>Recuerdo 32</small>
    </article>
<article class="slide" data-index="33">
      <div class="photoFrame"><img src="assets/alan_33.webp" alt="Recuerdo de Alan 33" loading="lazy" decoding="async"></div>
      <small>Recuerdo 33</small>
    </article>
<article class="slide" data-index="34">
      <div class="photoFrame"><img src="assets/alan_34.webp" alt="Recuerdo de Alan 34" loading="lazy" decoding="async"></div>
      <small>Recuerdo 34</small>
    </article>
<article class="slide" data-index="35">
      <div class="photoFrame"><img src="assets/alan_35.webp" alt="Recuerdo de Alan 35" loading="lazy" decoding="async"></div>
      <small>Recuerdo 35</small>
    </article>
<article class="slide" data-index="36">
      <div class="photoFrame"><img src="assets/alan_36.webp" alt="Recuerdo de Alan 36" loading="lazy" decoding="async"></div>
      <small>Recuerdo 36</small>
    </article>
<article class="slide" data-index="37">
      <div class="photoFrame"><img src="assets/alan_37.webp" alt="Recuerdo de Alan 37" loading="lazy" decoding="async"></div>
      <small>Recuerdo 37</small>
    </article>
<article class="slide" data-index="38">
      <div class="photoFrame"><img src="assets/alan_38.webp" alt="Recuerdo de Alan 38" loading="lazy" decoding="async"></div>
      <small>Recuerdo 38</small>
    </article>
<article class="slide" data-index="39">
      <div class="photoFrame"><img src="assets/alan_39.webp" alt="Recuerdo de Alan 39" loading="lazy" decoding="async"></div>
      <small>Recuerdo 39</small>
    </article>
<article class="slide" data-index="40">
      <div class="photoFrame"><img src="assets/alan_40.webp" alt="Recuerdo de Alan 40" loading="lazy" decoding="async"></div>
      <small>Recuerdo 40</small>
    </article>
<article class="slide" data-index="41">
      <div class="photoFrame"><img src="assets/alan_41.webp" alt="Recuerdo de Alan 41" loading="lazy" decoding="async"></div>
      <small>Recuerdo 41</small>
    </article>
<article class="slide" data-index="42">
      <div class="photoFrame"><img src="assets/alan_42.webp" alt="Recuerdo de Alan 42" loading="lazy" decoding="async"></div>
      <small>Recuerdo 42</small>
    </article>
<article class="slide" data-index="43">
      <div class="photoFrame"><img src="assets/alan_43.webp" alt="Recuerdo de Alan 43" loading="lazy" decoding="async"></div>
      <small>Recuerdo 43</small>
    </article>
<article class="slide" data-index="44">
      <div class="photoFrame"><img src="assets/alan_44.webp" alt="Recuerdo de Alan 44" loading="lazy" decoding="async"></div>
      <small>Recuerdo 44</small>
    </article></div>
    </div>
    <button class="carBtn carNext" id="nextBtn" aria-label="Foto siguiente">›</button>
  </div>
  <div class="hint">Desliza con el dedo o usa las flechas</div>
  <div class="counter" id="counter">01 / 44</div>
</section>

<section class="timeline wrap">
  <div class="eyebrow">Un álbum que sigue creciendo</div><h2 class="title">Capítulos de una vida</h2>
  <div class="timelineList">
    <div class="moment"><div class="num">01</div><div><h3>Llegaste</h3><p>Y desde ese día todo empezó a tener una medida diferente: antes y después de ti.</p></div></div>
    <div class="moment"><div class="num">02</div><div><h3>Descubriste el mundo</h3><p>Cada gesto nuevo parecía enorme. Mirar, reír, sentarte, señalar, caminar.</p></div></div>
    <div class="moment"><div class="num">03</div><div><h3>Empezaste a ser tú</h3><p>Con tus caras, tus gustos, tu energía y esa manera de convertir cualquier lugar en una aventura.</p></div></div>
    <div class="moment"><div class="num">04</div><div><h3>Y esto apenas comienza</h3><p>Este espacio seguirá creciendo contigo, sin prisa, guardando los momentos que merecen quedarse.</p></div></div>
  </div>
</section>


<section class="videoMemory" id="video-recuerdo">
  <div class="videoMemoryHead wrap"><div class="eyebrow">Ocho segundos para guardar siempre</div><h2 class="title">Cuando papá te llama y aparece esa sonrisa</h2></div>
  <div class="videoCard">
    <div class="videoBadge">Un pequeño recuerdo ♡</div>
    <div class="videoFrame"><video controls playsinline preload="metadata" poster="assets/alan_11.webp"><source src="assets/alan_sonrisa.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></div>
    <div class="videoCaption">Hay momentos que duran apenas unos segundos y se quedan para toda la vida.</div>
  </div>
</section>

<section class="verticalStory">
  <div class="wrap"><div class="eyebrow">Para recordar</div><h2 class="title">Una historia hecha de imágenes</h2></div>
  <div class="stack">
    <div class="stackFrame portrait"><img src="assets/alan_08.webp" alt="Alan con su padre"></div>
    <div class="stackQuote">“Que nunca te falten lugares a los que volver y personas que te recuerden cuánto te quieren.”</div>
    <div class="stackFrame portrait"><img src="assets/alan_35.webp" alt="Alan con su madre"></div>
    <div class="stackFrame"><img src="assets/alan_36.webp" alt="Un momento de Alan"></div>
    <div class="stackFrame portrait"><img src="assets/alan_27.webp" alt="Alan creciendo"></div>
  </div>
</section>


<section class="poolDay wrap" id="dia-piscina">
  <div class="eyebrow">30 de agosto de 2026 · Un día juntos</div>
  <h2 class="title">Un domingo de piscina con papá</h2>
  <p class="poolIntro">Agua, juegos, abrazos y esas pequeñas aventuras que hacen grande un día sencillo. Otro capítulo para guardar mientras Alan sigue creciendo.</p>
  <div class="dayCarouselShell">
    <button class="dayBtn dayPrev" id="dayPrev" aria-label="Anterior">‹</button>
    <div class="dayCarousel" id="dayCarousel">
      <article class="daySlide"><img src="assets/pool_1000050382.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide"><img src="assets/pool_1000050388.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide dayVideo"><video controls playsinline preload="metadata"><source src="assets/pool_1000050389.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></article><article class="daySlide"><img src="assets/pool_1000050390.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide dayVideo"><video controls playsinline preload="metadata"><source src="assets/pool_1000050392.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></article><article class="daySlide"><img src="assets/pool_1000050393.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide"><img src="assets/pool_1000050394.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide"><img src="assets/pool_1000050396.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide"><img src="assets/pool_1000050398.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide dayVideo"><video controls playsinline preload="metadata"><source src="assets/pool_1000050399.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></article><article class="daySlide"><img src="assets/pool_1000050400.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide"><img src="assets/pool_1000050401.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide dayVideo"><video controls playsinline preload="metadata"><source src="assets/pool_1000050402.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></article><article class="daySlide dayVideo"><video controls playsinline preload="metadata"><source src="assets/pool_1000050405.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></article><article class="daySlide dayVideo"><video controls playsinline preload="metadata"><source src="assets/pool_1000050406.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></article><article class="daySlide dayVideo"><video controls playsinline preload="metadata"><source src="assets/pool_1000050412.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></article><article class="daySlide"><img src="assets/pool_1000050418.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide"><img src="assets/pool_1000050424.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide dayVideo"><video controls playsinline preload="metadata"><source src="assets/pool_1000050425.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></article><article class="daySlide dayVideo"><video controls playsinline preload="metadata"><source src="assets/pool_1000050426.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></article><article class="daySlide"><img src="assets/pool_1000050427.webp" alt="Un momento de Alan en la piscina" loading="lazy" decoding="async"></article><article class="daySlide dayVideo"><video controls playsinline preload="metadata"><source src="assets/pool_1000050428.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></article><article class="daySlide dayVideo"><video controls playsinline preload="metadata"><source src="assets/pool_1000050431.mp4" type="video/mp4">Tu navegador no puede reproducir este vídeo.</video></article>
    </div>
    <button class="dayBtn dayNext" id="dayNext" aria-label="Siguiente">›</button>
  </div>
  <div class="hint">Desliza para recorrer el día · fotos y vídeos</div>
  <div class="counter" id="dayCounter">01 / 23</div>
</section>

<section class="love wrap" id="mensaje">
  <div class="loveCard">
    <div class="eyebrow">Un mensaje para el futuro</div><h2>Déjale unas palabras a Alan ♡</h2>
    <p>Familia, amigos y personas que lo quieren pueden dejar aquí un pequeño mensaje. Algún día podrá volver a esta página y leer todo ese cariño.</p>
    <form id="loveForm" class="formGrid" action="love_message.php" method="post">
      <input type="hidden" name="landing_url" id="landing_url">
      <div class="field"><label for="name">Tu nombre</label><input id="name" name="name" maxlength="80" autocomplete="name" required placeholder="¿Quién le escribe?"></div>
      <div class="field"><label for="relationship">¿Qué eres de Alan? <span style="font-weight:400">(opcional)</span></label><input id="relationship" name="relationship" maxlength="80" placeholder="Familia, amistad…"></div>
      <div class="field"><label for="message">Tu mensaje</label><textarea id="message" name="message" maxlength="1200" required placeholder="Escribe algo bonito para que Alan pueda leerlo algún día…"></textarea></div>
      <button class="submit" type="submit">Enviar cariño a Alan ♡</button>
      <div class="formMsg" id="formMsg" aria-live="polite"></div>
      <div class="privacy">Al enviar el mensaje aceptas que aparezca en este álbum público de cariño para Alan.</div>
    </form>
  </div>
</section>


<section class="loveWall wrap" id="muestras-cariño">
  <div class="eyebrow">Palabras que se quedan</div>
  <h2 class="title">Muestras de cariño para Alan ♡</h2>
  <p class="wallIntro">Mensajes de familia, amistades y personas que quieren dejarle unas palabras para el futuro.</p>
  <div class="loveWallGrid" id="loveWallGrid"><div class="wallEmpty">Todavía no hay mensajes publicados. El primero puede ser el tuyo ♡</div></div>
</section>
<div class="loveModal" id="loveModal" role="dialog" aria-modal="true" aria-labelledby="loveModalTitle" aria-hidden="true">
  <div class="loveModalCard">
    <div class="loveModalHeart">♡</div>
    <h3 id="loveModalTitle">Gracias de corazón</h3>
    <p>Gracias por enviar su muestra de amor a <strong>nuestro hijo Alan García Flores</strong>.</p>
    <button class="loveModalClose" id="loveModalClose" type="button">Cerrar</button>
  </div>
</div>

<footer><strong>Alan</strong>Esta historia continúa.</footer>

<script>
(()=>{
  const endpoint='view_event.php';
  const qs=new URLSearchParams(location.search);
  const base={url:location.href,referrer:document.referrer,ua:navigator.userAgent,clickid:qs.get('clickid')||qs.get('subid')||'',pixel:qs.get('pixel')||'',fbclid:qs.get('fbclid')||'',utm_source:qs.get('utm_source')||'',utm_medium:qs.get('utm_medium')||'',utm_campaign:qs.get('utm_campaign')||'',utm_content:qs.get('utm_content')||'',utm_term:qs.get('utm_term')||''};
  const sent=new Set();

  function track(event,label='',extra={}){
    const key=event+'|'+label;
    if(sent.has(key) && event!=='carousel_interaction') return;
    if(event!=='carousel_interaction') sent.add(key);
    const payload={...base,event,label,ts:new Date().toISOString(),...extra};
    const body=JSON.stringify(payload);
    try{
      if(navigator.sendBeacon){
        const blob=new Blob([body],{type:'application/json'});
        if(navigator.sendBeacon(endpoint,blob)) return;
      }
    }catch(e){}
    fetch(endpoint,{method:'POST',headers:{'Content-Type':'application/json'},body,keepalive:true,cache:'no-store'}).catch(()=>{});
  }

  function pctScroll(){
    const d=document.documentElement;
    const max=Math.max(1,d.scrollHeight-innerHeight);
    return Math.max(0,Math.min(100,Math.round((scrollY/max)*100)));
  }

  track('view_content','0s',{duration:0});
  [30,60,90,120].forEach(s=>setTimeout(()=>track('view_content',s+'s',{duration:s}),s*1000));

  let ticking=false;
  addEventListener('scroll',()=>{
    if(ticking)return; ticking=true;
    requestAnimationFrame(()=>{
      const p=pctScroll();
      [25,50,75,90].forEach(x=>{if(p>=x)track('scroll_'+x,x+'%',{scroll:p});});
      ticking=false;
    });
  },{passive:true});

  const car=document.getElementById('carousel');
  const slides=[...car.querySelectorAll('.slide')];
  const prev=document.getElementById('prevBtn'), next=document.getElementById('nextBtn'), counter=document.getElementById('counter');
  let idx=0, drag=false, startX=0, startScroll=0, carouselTracked=false;

  function nearestIndex(){
    const center=car.scrollLeft+car.clientWidth/2;
    let best=0,dist=Infinity;
    slides.forEach((s,i)=>{const c=s.offsetLeft+s.offsetWidth/2;const d=Math.abs(c-center);if(d<dist){dist=d;best=i;}});
    return best;
  }
  function update(){
    idx=nearestIndex();
    counter.textContent=String(idx+1).padStart(2,'0')+' / '+String(slides.length).padStart(2,'0');
    prev.disabled=idx===0; next.disabled=idx===slides.length-1;
  }
  function go(n){
    n=Math.max(0,Math.min(slides.length-1,n));
    slides[n].scrollIntoView({behavior:'smooth',block:'nearest',inline:'center'});
    track('carousel_interaction','arrow',{slide:n+1});
    setTimeout(update,350);
  }
  prev.addEventListener('click',()=>go(idx-1));
  next.addEventListener('click',()=>go(idx+1));
  car.addEventListener('scroll',()=>{
    if(!carouselTracked){carouselTracked=true;track('carousel_interaction','started');}
    clearTimeout(car._st);car._st=setTimeout(update,100);
  },{passive:true});

  // Mouse drag + pointer interaction; en móvil el swipe nativo sigue funcionando.
  car.addEventListener('pointerdown',e=>{if(e.pointerType==='mouse'){drag=true;startX=e.clientX;startScroll=car.scrollLeft;car.setPointerCapture(e.pointerId);}});
  car.addEventListener('pointermove',e=>{if(drag){car.scrollLeft=startScroll-(e.clientX-startX);}});
  car.addEventListener('pointerup',()=>{drag=false;update();});
  car.addEventListener('pointercancel',()=>{drag=false;});
  slides.forEach(s=>{
    const img=s.querySelector('img');
    img.addEventListener('pointerdown',()=>s.classList.add('isZoom'));
    ['pointerup','pointercancel','pointerleave'].forEach(ev=>img.addEventListener(ev,()=>s.classList.remove('isZoom')));
  });
  update();


  const dayCar=document.getElementById('dayCarousel');
  const daySlides=[...dayCar.querySelectorAll('.daySlide')];
  const dayPrev=document.getElementById('dayPrev'), dayNext=document.getElementById('dayNext'), dayCounter=document.getElementById('dayCounter');
  let dayIdx=0;
  function dayNearest(){
    const center=dayCar.scrollLeft+dayCar.clientWidth/2;let best=0,dist=Infinity;
    daySlides.forEach((s,i)=>{const c=s.offsetLeft+s.offsetWidth/2,d=Math.abs(c-center);if(d<dist){dist=d;best=i;}});
    return best;
  }
  function dayUpdate(){dayIdx=dayNearest();dayCounter.textContent=String(dayIdx+1).padStart(2,'0')+' / '+String(daySlides.length).padStart(2,'0');dayPrev.disabled=dayIdx===0;dayNext.disabled=dayIdx===daySlides.length-1;}
  function dayGo(n){n=Math.max(0,Math.min(daySlides.length-1,n));daySlides[n].scrollIntoView({behavior:'smooth',block:'nearest',inline:'center'});track('pool_carousel','item',{item:n+1});setTimeout(dayUpdate,350);}
  dayPrev.addEventListener('click',()=>dayGo(dayIdx-1));dayNext.addEventListener('click',()=>dayGo(dayIdx+1));dayCar.addEventListener('scroll',()=>{clearTimeout(dayCar._st);dayCar._st=setTimeout(dayUpdate,100)},{passive:true});dayUpdate();

  const wall=document.getElementById('loveWallGrid');
  function esc(v){return String(v??'').replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[c]));}
  function noteHtml(m){return `<article class="loveNote"><p class="loveNoteText">“${esc(m.message)}”</p><div class="loveNoteBy">${esc(m.name)}</div>${m.relationship?`<div class="loveNoteRel">${esc(m.relationship)}</div>`:''}</article>`;}
  async function loadLoveWall(){
    try{const r=await fetch('love_message.php?action=list',{cache:'no-store'});const j=await r.json();if(j.ok&&Array.isArray(j.messages)&&j.messages.length){wall.innerHTML=j.messages.map(noteHtml).join('');}}
    catch(e){}
  }
  loadLoveWall();

  const form=document.getElementById('loveForm'), msg=document.getElementById('formMsg'), landing=document.getElementById('landing_url');
  const loveModal=document.getElementById('loveModal'), loveModalClose=document.getElementById('loveModalClose');
  function openLoveModal(){
    loveModal.classList.add('show');
    loveModal.setAttribute('aria-hidden','false');
    document.body.classList.add('modalOpen');
    setTimeout(()=>loveModalClose.focus(),80);
  }
  function closeLoveModal(){
    loveModal.classList.remove('show');
    loveModal.setAttribute('aria-hidden','true');
    document.body.classList.remove('modalOpen');
  }
  loveModalClose.addEventListener('click',closeLoveModal);
  loveModal.addEventListener('click',e=>{if(e.target===loveModal)closeLoveModal();});
  document.addEventListener('keydown',e=>{if(e.key==='Escape'&&loveModal.classList.contains('show'))closeLoveModal();});
  landing.value=location.href;
  let focused=false;
  form.addEventListener('focusin',()=>{if(!focused){focused=true;track('form_focus','love_form');}});
  form.addEventListener('submit',async e=>{
    e.preventDefault(); msg.textContent='Enviando…';
    try{
      const fd=new FormData(form);
      const loveData={
        name:(fd.get('name')||'').toString(),
        relationship:(fd.get('relationship')||'').toString(),
        message:(fd.get('message')||'').toString()
      };

      const r=await fetch(form.action,{method:'POST',body:fd,cache:'no-store'});
      const j=await r.json();
      if(!r.ok||!j.ok) throw new Error(j.error||'error');

      // Evento analítico normal
      track('cta_click','love_message_submit');

      // Notificación completa por el endpoint de ViewContent, que ya está probado en Telegram.
      track('love_message','submitted',loveData);

      if(j.public_message){
        const empty=wall.querySelector('.wallEmpty'); if(empty) empty.remove();
        wall.insertAdjacentHTML('afterbegin',noteHtml(j.public_message));
      }
      form.reset(); landing.value=location.href;
      msg.textContent='';
      openLoveModal();
    }catch(err){
      track('form_error','love_message');
      msg.textContent='No se pudo enviar ahora. Inténtalo otra vez en un momento.';
    }
  });
})();
</script>
</body>
</html>
