<?php
/**
 * @var \App\Kernel\View\View $view
 */
?>

<!DOCTYPE html>

<?php $view->component("head"); ?>
<html lang="en">
  <body>
    <div class="wrapper">
        <?php $view->component("header") ?>
      <main class="main">
        <section class="hero">
          <h1 class="visually-hidden">Main slider</h1>

          <div class="swiper mainSwiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              <div
                class="swiper-slide mainSwiper-slide"
                style="background-image: url(assets/img/Slider-01.png)"
                    >
                <div class="hero__content content">
                  <span class="hero__tag">Vše nové</span>
                  <h2 class="hero__title">Mountain Jízdní kolo</h2>
                  <p class="hero__descr">Šíleně lehké, šíleně rychlé</p>
                  <a class="hero__catalog" href="#">Všechna kola</a>
                  <div class="hero__links">
                    <img src="assets/img/play.png" alt="play" />
                    <a class="hero__video video" href="#">Přehrát video</a>
                  </div>
                </div>
              </div>
              <div
                class="swiper-slide mainSwiper-slide"
                style="background-image: url(assets/img/Slider-01.png)"
                    >
                <div class="hero__content content">
                  <span class="hero__tag">Vše nové</span>
                  <h2 class="hero__title">Mountain Jízdní kolo</h2>
                  <p class="hero__descr">Šíleně lehké, šíleně rychlé</p>

                  <a class="hero__catalog" href="#">Všechna kola</a>
                  <div class="hero__links">
                    <img src="assets/img/play.png" alt="play" />
                    <a class="hero__video video" href="#">Přehrát video</a>
                  </div>
                </div>
              </div>
              <!-- If we need navigation buttons -->
              <div class="swiper-button-prev">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="30"
                  height="32"
                  viewBox="0 0 30 32"
                  fill="none"
                      >
                  <path
                    d="M19.8896 7.48L11.1296 16L19.8596 24.52L19.3796 25L10.1396 16L19.3796 7L19.8896 7.48Z"
                    fill="#EA0129"
                        />
                </svg>
              </div>
              <div class="swiper-button-next">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="30"
                  height="32"
                  viewBox="0 0 30 32"
                  fill="none"
                      >
                  <path
                    d="M10.1396 24.52L18.8996 16L10.1396 7.48L10.6196 7L19.8596 16L10.6196 25L10.1396 24.52Z"
                    fill="#EA0129"
                        />
                </svg>
              </div>
            </div>
          </div>
        </section>
        <section class="bike-coming">
          <div class="container bike-coming__container">
            <div class="bike-coming__left">
              <span class="bike-coming__tag coming-tag">Jízdní kola</span>
              <h2 class="bike-coming__title">Nadcházející 2024</h2>
              <p class="bike-coming__desc">
Nová kola Monster v našem obchodě pro vás
</p>
              <div class="bike-coming__btns">
                <div class="bike-coming__prev"></div>
                <div class="bike-coming__next"></div>
              </div>
            </div>
            <div class="bike-coming__right">
              <div class="swiper bikeComing">
                <div class="swiper-wrapper">
                  <div class="swiper-slide bikeComing-slide">
                    <article class="product">
                      <img
                        class="product__img"
                        src="assets/img/coming-bike1.png"
                        alt="bike1"
                            />
                      <div class="product__description">
                        <h3 class="product__title">Sarrio Mc 002</h3>
                        <p class="product__dsc">
Speciální silniční kolo s odpružením z uhlíkových
                          vláken
                          </p>
                        <a class="product__view cloud-btn" href="#">
                          <nav>
                            <ul class="cloud-btn__list">
                              <li class="cloud-btn__item cloud-btn__item--red">
PŘEHLED
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                              </li>
                            </ul>
                          </nav>
                        </a>
                      </div>
                    </article>
                  </div>
                  <div class="swiper-slide bikeComing-slide">
                    <article class="product">
                      <img
                        class="product__img"
                        src="assets/img/coming-bike1.png"
                        alt="bike1"
                            />
                      <div class="product__description">
                        <h3 class="product__title">Sarrio Mc 002</h3>
                        <p class="product__dsc">
Speciální silniční kolo s odpružením z uhlíkových
                          vláken
                          </p>
                        <a class="product__view cloud-btn" href="#">
                          <nav>
                            <ul class="cloud-btn__list">
                              <li class="cloud-btn__item cloud-btn__item--red">
PŘEHLED
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                              </li>
                            </ul>
                          </nav>
                        </a>
                      </div>
                    </article>
                  </div>
                  <div class="swiper-slide bikeComing-slide">
                    <article class="product">
                      <img
                        class="product__img"
                        src="assets/img/coming-bike2.png"
                        alt="bike2"
                            />
                      <div class="product__description">
                        <h3 class="product__title">Gyanno Mt 22</h3>
                        <p class="product__dsc">
Speciální silniční kolo s odpružením z uhlíkových
                          vláken
                          </p>
                        <a class="product__view cloud-btn" href="#">
                          <nav>
                            <ul class="cloud-btn__list">
                              <li class="cloud-btn__item cloud-btn__item--red">
PŘEHLED
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                              </li>
                            </ul>
                          </nav>
                        </a>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="parallax background-parallax">
          <div class="container parralax__container">
            <!--Get In Touch-->
            <div class="get-in-touch">
              <h3 class="get-in-touch__title">SPOJTE SE S NÁMI</h3>
              <p class="get-in-touch__desc">
Máte nápad nebo projekt, pojďme spolupracovat a vytvořit něco
                úžasného.
              </p>
              <a class="et-in-touch__link" href="#">Koupit nyní</a>
            </div>
            <!--End Get In Touch-->
          </div>
        </section>
      </main>
        <?php $view->component("footer"); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/burger.js"></script>
  </body>
</html>
