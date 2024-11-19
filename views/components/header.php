<?php
/**
 * @var \App\Kernel\Auth\AuthInterface $auth
 * @var \App\Kernel\Session\SessionInterface $session
 * @var string $activeMenu
 */

$user = $auth->user();

?>

<header class="header">
    <div class="container header__container">
        <div class="header__inner">
            <button class="header__burger btn-reset">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="header__logo logo" href="/">
                <svg viewBox="0 0 109 50" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.48 23.6C21.1067 23.9467 22.4133 24.76 23.4 26.04C24.3867 27.2933 24.88 28.7333 24.88 30.36C24.88 32.7067 24.0533 34.5733 22.4 35.96C20.7733 37.32 18.4933 38 15.56 38H2.48V9.92H15.12C17.9733 9.92 20.2 10.5733 21.8 11.88C23.4267 13.1867 24.24 14.96 24.24 17.2C24.24 18.8533 23.8 20.2267 22.92 21.32C22.0667 22.4133 20.92 23.1733 19.48 23.6ZM9.32 21.28H13.8C14.92 21.28 15.7733 21.04 16.36 20.56C16.9733 20.0533 17.28 19.32 17.28 18.36C17.28 17.4 16.9733 16.6667 16.36 16.16C15.7733 15.6533 14.92 15.4 13.8 15.4H9.32V21.28ZM14.36 32.48C15.5067 32.48 16.3867 32.2267 17 31.72C17.64 31.1867 17.96 30.4267 17.96 29.44C17.96 28.4533 17.6267 27.68 16.96 27.12C16.32 26.56 15.4267 26.28 14.28 26.28H9.32V32.48H14.36ZM32.2872 13.36C31.0872 13.36 30.1005 13.0133 29.3272 12.32C28.5805 11.6 28.2072 10.72 28.2072 9.68C28.2072 8.61333 28.5805 7.73333 29.3272 7.04C30.1005 6.32 31.0872 5.96 32.2872 5.96C33.4605 5.96 34.4205 6.32 35.1672 7.04C35.9405 7.73333 36.3272 8.61333 36.3272 9.68C36.3272 10.72 35.9405 11.6 35.1672 12.32C34.4205 13.0133 33.4605 13.36 32.2872 13.36ZM35.6872 15.68V38H28.8472V15.68H35.6872ZM54.2841 38L47.4841 28.64V38H40.6441V8.4H47.4841V24.76L54.2441 15.68H62.6841L53.4041 26.88L62.7641 38H54.2841Z"
                        fill="#EA0129"
                    />
                    <path
                        d="M64.3545 27.2383C64.3545 25.181 64.7451 23.3451 65.5264 21.7305C66.3076 20.1159 67.4274 18.8398 68.8857 17.9023C70.3571 16.9518 72.1279 16.4766 74.1982 16.4766C76.2946 16.4766 78.085 16.9518 79.5693 17.9023C81.0537 18.8398 82.18 20.1159 82.9482 21.7305C83.7295 23.3451 84.1201 25.181 84.1201 27.2383V27.6484C84.1201 29.6927 83.7295 31.5286 82.9482 33.1562C82.18 34.7708 81.0537 36.0469 79.5693 36.9844C78.098 37.9219 76.3206 38.3906 74.2373 38.3906C72.154 38.3906 70.3766 37.9219 68.9053 36.9844C67.4339 36.0469 66.3076 34.7708 65.5264 33.1562C64.7451 31.5286 64.3545 29.6927 64.3545 27.6484V27.2383ZM69.3545 27.6484C69.3545 28.8724 69.5238 29.9987 69.8623 31.0273C70.2008 32.043 70.7282 32.8568 71.4443 33.4688C72.1605 34.0677 73.0915 34.3672 74.2373 34.3672C75.3831 34.3672 76.3141 34.0677 77.0303 33.4688C77.7464 32.8568 78.2673 32.043 78.5928 31.0273C78.9313 29.9987 79.1006 28.8724 79.1006 27.6484V27.2383C79.1006 26.0273 78.9313 24.9141 78.5928 23.8984C78.2673 22.8698 77.7399 22.0495 77.0107 21.4375C76.2946 20.8125 75.3571 20.5 74.1982 20.5C73.0654 20.5 72.141 20.8125 71.4248 21.4375C70.7087 22.0495 70.1813 22.8698 69.8428 23.8984C69.5173 24.9141 69.3545 26.0273 69.3545 27.2383V27.6484ZM87.0498 27.2383C87.0498 25.181 87.4404 23.3451 88.2217 21.7305C89.0029 20.1159 90.1227 18.8398 91.5811 17.9023C93.0524 16.9518 94.8232 16.4766 96.8936 16.4766C98.9899 16.4766 100.78 16.9518 102.265 17.9023C103.749 18.8398 104.875 20.1159 105.644 21.7305C106.425 23.3451 106.815 25.181 106.815 27.2383V27.6484C106.815 29.6927 106.425 31.5286 105.644 33.1562C104.875 34.7708 103.749 36.0469 102.265 36.9844C100.793 37.9219 99.016 38.3906 96.9326 38.3906C94.8493 38.3906 93.0719 37.9219 91.6006 36.9844C90.1292 36.0469 89.0029 34.7708 88.2217 33.1562C87.4404 31.5286 87.0498 29.6927 87.0498 27.6484V27.2383ZM92.0498 27.6484C92.0498 28.8724 92.2191 29.9987 92.5576 31.0273C92.8962 32.043 93.4235 32.8568 94.1396 33.4688C94.8558 34.0677 95.7868 34.3672 96.9326 34.3672C98.0785 34.3672 99.0094 34.0677 99.7256 33.4688C100.442 32.8568 100.963 32.043 101.288 31.0273C101.627 29.9987 101.796 28.8724 101.796 27.6484V27.2383C101.796 26.0273 101.627 24.9141 101.288 23.8984C100.963 22.8698 100.435 22.0495 99.7061 21.4375C98.9899 20.8125 98.0524 20.5 96.8936 20.5C95.7607 20.5 94.8363 20.8125 94.1201 21.4375C93.404 22.0495 92.8766 22.8698 92.5381 23.8984C92.2126 24.9141 92.0498 26.0273 92.0498 27.2383V27.6484Z"
                        fill="#EA0129"
                    />
                </svg>
            </a>
            <nav class="nav header__nav">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a class="nav__link <?php echo $activeMenu === 'hlavni' ? 'nav__link--current' : '' ?>" href="/">Hlavní</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?php echo $activeMenu === 'katalog' ? 'nav__link--current' : '' ?>"" href="/catalog">Katalog</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?php echo $activeMenu === 'onas' ? 'nav__link--current' : '' ?>"" href="/about">O nás</a>
                    </li>
                    <li class="nav__item">
                        <a class="nav__link <?php echo $activeMenu === 'kontakty' ? 'nav__link--current' : '' ?>"" href="/contacts">Kontakty</a>
                    </li>
                </ul>
            </nav>
            <ul class="profile-menu header__profile">
                <li class="profile-menu__item search-item">
                    <a class="profile-menu__link">
                        <svg
                            viewBox="0 0 19 18"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <g clip-path="url(#clip0_1_791)">
                                <path
                                    d="M17.9278 17.028L13.2658 12.456C13.8898 11.772 14.3758 11.01 14.7238 10.17C15.0718 9.306 15.2458 8.4 15.2458 7.452C15.2458 6.096 14.8978 4.842 14.2018 3.69C13.5418 2.562 12.6358 1.668 11.4838 1.008C10.3078 0.336001 9.03284 7.7486e-07 7.65884 7.7486e-07C6.28484 7.7486e-07 5.00984 0.336001 3.83384 1.008C2.69384 1.668 1.78784 2.562 1.11584 3.69C0.431844 4.842 0.0898438 6.096 0.0898438 7.452C0.0898438 8.808 0.431844 10.062 1.11584 11.214C1.78784 12.342 2.69384 13.236 3.83384 13.896C5.00984 14.568 6.28784 14.904 7.66784 14.904C8.54384 14.904 9.40184 14.754 10.2418 14.454C11.0338 14.178 11.7658 13.776 12.4378 13.248L17.0998 17.838C17.2198 17.946 17.3578 18 17.5138 18C17.6698 18 17.8048 17.943 17.9188 17.829C18.0328 17.715 18.0898 17.58 18.0898 17.424C18.0898 17.268 18.0358 17.136 17.9278 17.028ZM7.66784 13.752C6.50384 13.752 5.42384 13.464 4.42784 12.888C3.46784 12.336 2.70584 11.586 2.14184 10.638C1.55384 9.654 1.25984 8.592 1.25984 7.452C1.25984 6.312 1.55384 5.25 2.14184 4.266C2.70584 3.318 3.46784 2.568 4.42784 2.016C5.42384 1.44 6.50084 1.152 7.65884 1.152C8.81684 1.152 9.89384 1.44 10.8898 2.016C11.8618 2.568 12.6298 3.318 13.1938 4.266C13.7818 5.25 14.0758 6.312 14.0758 7.452C14.0758 8.592 13.7818 9.654 13.1938 10.638C12.6298 11.586 11.8618 12.336 10.8898 12.888C9.89384 13.464 8.81984 13.752 7.66784 13.752Z"
                                    fill="#0D0D0D"
                                />
                            </g>
                            <defs>
                                <clipPath id="clip0_1_791">
                                    <rect
                                        width="18"
                                        height="18"
                                        fill="white"
                                        transform="matrix(1 0 0 -1 0.0898438 18)"
                                    />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </li>
                <li class="profile-menu__item">
                    <a class="profile-menu__link"
                       <?php if ($auth->check()) { ?>
                       href="/profile"
                       <?php } else{ ?>
                           href="/authorisation"
                       <?php }  ?>
                    >
                        <svg
                            width="19"
                            height="18"
                            viewBox="0 0 19 18"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M15.9131 11.6367C17.6709 13.3945 18.5498 15.5156 18.5498 18H17.1436C17.1436 15.9141 16.3994 14.127 14.9111 12.6387C13.4229 11.1504 11.6357 10.4062 9.5498 10.4062C7.46387 10.4062 5.67676 11.1504 4.18848 12.6387C2.7002 14.127 1.95605 15.9141 1.95605 18H0.549805C0.549805 15.5156 1.42871 13.3945 3.18652 11.6367C4.1709 10.6523 5.30762 9.9375 6.59668 9.49219C5.91699 9.02344 5.37207 8.4082 4.96191 7.64648C4.55176 6.88477 4.34668 6.07031 4.34668 5.20312C4.34668 3.77344 4.85645 2.54883 5.87598 1.5293C6.89551 0.509766 8.12012 0 9.5498 0C10.9795 0 12.2041 0.509766 13.2236 1.5293C14.2432 2.54883 14.7529 3.77344 14.7529 5.20312C14.7529 5.78906 14.6592 6.35156 14.4717 6.89062C14.2842 7.42969 14.0205 7.92187 13.6807 8.36719C13.3408 8.8125 12.9482 9.1875 12.5029 9.49219C13.792 9.9375 14.9287 10.6523 15.9131 11.6367ZM6.86035 7.89258C6.86035 7.89258 7.04492 8.07715 7.41406 8.44629C7.7832 8.81543 8.49512 9 9.5498 9C10.6045 9 11.501 8.63086 12.2393 7.89258C12.9775 7.1543 13.3467 6.25781 13.3467 5.20312C13.3467 4.14844 12.9775 3.25195 12.2393 2.51367C11.501 1.77539 10.6045 1.40625 9.5498 1.40625C8.49512 1.40625 7.59863 1.77539 6.86035 2.51367C6.12207 3.25195 5.75293 4.14844 5.75293 5.20312C5.75293 6.25781 6.12207 7.1543 6.86035 7.89258Z"
                                fill="#0D0D0D"
                            />
                        </svg>
                    </a>
                </li>
                <li class="profile-menu__item">
                    <a class="profile-menu__link" href="/shopping-cart">
                        <svg
                            width="18"
                            height="16"
                            viewBox="0 0 18 16"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M6.53704 11.1496C6.90664 11.1496 7.24824 11.2392 7.56184 11.4184C7.87544 11.5976 8.12184 11.844 8.30104 12.1576C8.48024 12.4712 8.56984 12.8128 8.56984 13.1824C8.56984 13.552 8.48024 13.8936 8.30104 14.2072C8.12184 14.5208 7.87544 14.7672 7.56184 14.9464C7.24824 15.1256 6.90664 15.2152 6.53704 15.2152C6.16744 15.2152 5.82584 15.1256 5.51224 14.9464C5.19864 14.7672 4.95224 14.5208 4.77304 14.2072C4.59384 13.8936 4.50424 13.552 4.50424 13.1824C4.50424 12.8128 4.59384 12.4712 4.77304 12.1576C4.95224 11.844 5.19864 11.5976 5.51224 11.4184C5.82584 11.2392 6.16744 11.1496 6.53704 11.1496ZM13.0722 11.1328C12.7026 11.0992 12.3498 11.158 12.0138 11.3092C11.6778 11.4604 11.4034 11.6844 11.1906 11.9812C10.9778 12.278 10.8546 12.6112 10.821 12.9808C10.7874 13.3504 10.8462 13.7004 10.9974 14.0308C11.1486 14.3612 11.3726 14.6328 11.6694 14.8456C11.9662 15.0584 12.2994 15.1816 12.669 15.2152C12.8034 15.2264 12.9378 15.2264 13.0722 15.2152C13.4418 15.1816 13.7722 15.0584 14.0634 14.8456C14.3546 14.6328 14.5758 14.3612 14.727 14.0308C14.8782 13.7004 14.937 13.3504 14.9034 12.9808C14.8586 12.488 14.6654 12.068 14.3238 11.7208C13.9822 11.3736 13.565 11.1776 13.0722 11.1328ZM17.2554 3.37123C17.1546 3.21443 17.0034 3.13603 16.8018 3.13603L5.88184 3.10243L4.20184 3.13603L3.63064 0.532033C3.59704 0.397633 3.52704 0.288433 3.42064 0.204433C3.31424 0.120433 3.19384 0.0784334 3.05944 0.0784334H0.589844V1.25443H2.58904L4.42024 9.70483C4.44264 9.83923 4.50984 9.95123 4.62184 10.0408C4.73384 10.1304 4.85704 10.1752 4.99144 10.1752H15.3402C15.4746 10.1752 15.595 10.1332 15.7014 10.0492C15.8078 9.96523 15.8778 9.85603 15.9114 9.72163L17.373 3.87523C17.429 3.68483 17.3898 3.51683 17.2554 3.37123Z"
                                fill="white"
                            />
                        </svg>
                        <span class="profile-menu__quantity"> <?php echo $session->has("productCount") ? $session->get("productCount") : 0; ?></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="header__btmsearch bottom-search">
            <form class="bottom-search__search" action="/catalog" method="get">
                <input class="bottom-search__text" name="query" placeholder="Search..." type="text" />
                <button
                    class="profile-menu__btn bottom-search__link btn-reset"
                    href="#"
                    type="submit"
                >
                    <svg
                        version="1.1"
                        id="Capa_1"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 488.4 488.4"
                        xml:space="preserve"
                    >
                  <g>
                      <g>
                          <path
                              d="M0,203.25c0,112.1,91.2,203.2,203.2,203.2c51.6,0,98.8-19.4,134.7-51.2l129.5,129.5c2.4,2.4,5.5,3.6,8.7,3.6
                   s6.3-1.2,8.7-3.6c4.8-4.8,4.8-12.5,0-17.3l-129.6-129.5c31.8-35.9,51.2-83,51.2-134.7c0-112.1-91.2-203.2-203.2-203.2
                   S0,91.15,0,203.25z M381.9,203.25c0,98.5-80.2,178.7-178.7,178.7s-178.7-80.2-178.7-178.7s80.2-178.7,178.7-178.7
                   S381.9,104.65,381.9,203.25z"
                          />
                      </g>
                  </g>
                </svg>
                </button>
            </form>
        </div>
    </div>
</header>