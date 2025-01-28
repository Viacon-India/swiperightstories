<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="all" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<?php $locations = get_nav_menu_locations();
            $header_menu = wp_get_nav_menu_object( $locations[ 'header-menu' ] );
            $header_menu_items = wp_get_nav_menu_items($header_menu->term_id); ?>
            
            <ul class="menu menu-horizontal relative text-lg lg:gap-4 xl:gap-7 hidden lg:flex !p-0">
              <?php foreach ($header_menu_items as $header_menu_item) {
                
                echo '<pre>';
                print_r($header_menu_item); 
                echo '</pre>';


              } ?>
  <header class="relative">
    <nav class="navbar">
      <div class="container mx-auto">
        <div class="w-full flex justify-between items-center relative">

          <div class="navbar-start w-fit">
            <a href="<?php echo home_url(); ?>">
              <figure class="rounded-none m-0 w-[196px] md:w-[126px] xl:w-[240px] h-[48px] md:h-[38px] xl:h-[42px]">
                <?php echo logo_url(); ?>
              </figure>
            </a>
          </div>

          <div class="navbar-center flex gap-3">
            <?php
            $locations = get_nav_menu_locations();
            $header_menu = wp_get_nav_menu_object( $locations[ 'header-menu' ] );
            $header_menu_items = wp_get_nav_menu_items($header_menu->term_id); ?>
            
            <ul class="menu menu-horizontal relative text-lg lg:gap-4 xl:gap-7 hidden lg:flex !p-0">
              <?php foreach ($header_menu_items as $header_menu_item) {
                
                // echo '<pre>';
                // print_r($header_menu_item); 
                // echo '</pre>'; ?>
                <li class="nav-drop group">
                    <a class="nav-links nav-hov" href="<?php echo $header_menu_item->url; ?>">
                        <?php echo $header_menu_item->title;
                        
                        if($header_menu_item->menu_item_parent != 0) { ?>
                          <svg class="group-hover:rotate-180 !transition-all !duration-3000" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.7302 1.07458C11.6912 0.982056 11.6006 0.921875 11.5 0.921875L0.500023 0.921997C0.399559 0.921997 0.308861 0.982178 0.269677 1.07471C0.230614 1.16724 0.250756 1.27429 0.320824 1.34631L5.82082 7.00317C5.86782 7.05151 5.93252 7.07886 6.00002 7.07886C6.06753 7.07886 6.13223 7.05151 6.17922 7.00317L11.6792 1.34619C11.7493 1.27405 11.7693 1.16711 11.7302 1.07458Z" fill="#101010" />
                          </svg>
                        <?php } ?>
                    </a>
                    <?php if($header_menu_item->menu_item_parent != 0) { ?>
                    <ul class="center-dropdown">
                      <li><a class="drop-list" href="">Submenu 1</a></li>
                      <li><a class="drop-list" href="">Submenu 2</a></li>
                      <li><a class="drop-list" href="">Submenu 3</a></li>
                      <li><a class="drop-list" href="">Submenu 4</a></li>
                      <li><a class="drop-list" href="">Submenu 5</a></li>
                    </ul>
                    <?php } ?>
                </li>
              <?php } ?>

              <!-- <li class="nav-drop group">
                <a href="#" class="nav-links nav-hov">
                  Dating Apps
                  <svg class="group-hover:rotate-180 !transition-all !duration-3000" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.7302 1.07458C11.6912 0.982056 11.6006 0.921875 11.5 0.921875L0.500023 0.921997C0.399559 0.921997 0.308861 0.982178 0.269677 1.07471C0.230614 1.16724 0.250756 1.27429 0.320824 1.34631L5.82082 7.00317C5.86782 7.05151 5.93252 7.07886 6.00002 7.07886C6.06753 7.07886 6.13223 7.05151 6.17922 7.00317L11.6792 1.34619C11.7493 1.27405 11.7693 1.16711 11.7302 1.07458Z" fill="#101010" />
                  </svg>
                </a>
                <ul class="center-dropdown">
                  <li><a class="drop-list" href="">Submenu 1</a></li>
                  <li><a class="drop-list" href="">Submenu 2</a></li>
                  <li><a class="drop-list" href="">Submenu 3</a></li>
                  <li><a class="drop-list" href="">Submenu 4</a></li>
                  <li><a class="drop-list" href="">Submenu 5</a></li>
                </ul>
              </li>
              <li class="nav-drop group">
                <a href="#" class="nav-links nav-hov">
                  Modern Dating
                  <svg class="group-hover:rotate-180 !transition-all !duration-3000" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.7302 1.07458C11.6912 0.982056 11.6006 0.921875 11.5 0.921875L0.500023 0.921997C0.399559 0.921997 0.308861 0.982178 0.269677 1.07471C0.230614 1.16724 0.250756 1.27429 0.320824 1.34631L5.82082 7.00317C5.86782 7.05151 5.93252 7.07886 6.00002 7.07886C6.06753 7.07886 6.13223 7.05151 6.17922 7.00317L11.6792 1.34619C11.7493 1.27405 11.7693 1.16711 11.7302 1.07458Z" fill="#101010" />
                  </svg>
                </a>
              </li>
              <li class="nav-drop group">
                <a href="#" class="nav-links nav-hov">
                  Dating Diary
                  <svg class="group-hover:rotate-180 !transition-all !duration-3000" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.7302 1.07458C11.6912 0.982056 11.6006 0.921875 11.5 0.921875L0.500023 0.921997C0.399559 0.921997 0.308861 0.982178 0.269677 1.07471C0.230614 1.16724 0.250756 1.27429 0.320824 1.34631L5.82082 7.00317C5.86782 7.05151 5.93252 7.07886 6.00002 7.07886C6.06753 7.07886 6.13223 7.05151 6.17922 7.00317L11.6792 1.34619C11.7493 1.27405 11.7693 1.16711 11.7302 1.07458Z" fill="#101010" />
                  </svg>
                </a>
              </li>
              <li class="nav-drop group">
                <a href="#" class="nav-links nav-hov">
                  Find
                  <svg class="group-hover:rotate-180 !transition-all !duration-3000" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.7302 1.07458C11.6912 0.982056 11.6006 0.921875 11.5 0.921875L0.500023 0.921997C0.399559 0.921997 0.308861 0.982178 0.269677 1.07471C0.230614 1.16724 0.250756 1.27429 0.320824 1.34631L5.82082 7.00317C5.86782 7.05151 5.93252 7.07886 6.00002 7.07886C6.06753 7.07886 6.13223 7.05151 6.17922 7.00317L11.6792 1.34619C11.7493 1.27405 11.7693 1.16711 11.7302 1.07458Z" fill="#101010" />
                  </svg>
                </a>
              </li> -->
            </ul>
            <div class="flex justify-end items-center w-fit md:ml-[26px] pr-5">
              <button onclick="document.getElementById('myModal').style.display='block'" class="search-btn group" aria-label="search-button">
                <p class="relative text-[#202020] text-[18px] leading-[17px] font-medium hidden lg:flex nav-hov font-Manrope">SEARCH</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 25 25" fill="#202020">
                  <path d="M19.0358 17.3872L24.0327 22.3828L22.3818 24.0336L17.3862 19.0368C15.5274 20.5269 13.2153 21.3374 10.833 21.334C5.03701 21.334 0.333008 16.63 0.333008 10.834C0.333008 5.03798 5.03701 0.333984 10.833 0.333984C16.629 0.333984 21.333 5.03798 21.333 10.834C21.3364 13.2163 20.5259 15.5283 19.0358 17.3872ZM16.6955 16.5215C18.1761 14.9989 19.003 12.9578 18.9997 10.834C18.9997 6.32132 15.3445 2.66732 10.833 2.66732C6.32034 2.66732 2.66634 6.32132 2.66634 10.834C2.66634 15.3455 6.32034 19.0007 10.833 19.0007C12.9568 19.004 14.9979 18.1771 16.5205 16.6965L16.6955 16.5215Z" fill="" />
                </svg>
              </button>
              <!-- Hamburger Dropdown -->
              <div class="dropdown flex lg:hidden">
                <button class="ham-dropdown relative lg:hidden ml-[4px] -translate-y-4" aria-label="search-button">
                  <span class="bar1"></span>
                  <span class="bar2"></span>
                  <span class="bar3"></span>
                  <span class="bar4"></span>
                </button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </nav>
  </header>


  <!-- Modal start -->
  <div id="myModal" class="h-full" style="width:100% !important; display:none">

    <div class="modal-content">
      <div class="container mx-auto flex justify-center items-center relative">
        <div class="toggle-cut">
          <span onclick="document.getElementById('myModal').style.display='none'" class="close ">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="#202020" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.22387 1.0321L10.9999 8.8081L18.7439 1.0641C19.0181 0.772258 19.3994 0.604738 19.7999 0.600098C20.6835 0.600098 21.3999 1.31642 21.3999 2.2001C21.4074 2.59658 21.2511 2.97866 20.9679 3.2561L13.1439 11.0001L20.9679 18.8241C21.2315 19.082 21.3863 19.4315 21.3999 19.8001C21.3999 20.6838 20.6835 21.4001 19.7999 21.4001C19.3875 21.4172 18.9871 21.2604 18.6959 20.9681L10.9999 13.1921L3.23987 20.9521C2.96675 21.2342 2.59235 21.3955 2.19987 21.4001C1.31619 21.4001 0.599869 20.6838 0.599869 19.8001C0.592349 19.4036 0.748669 19.0215 1.03187 18.7441L8.85587 11.0001L1.03187 3.1761C0.768189 2.91818 0.613469 2.56874 0.599869 2.2001C0.599869 1.31642 1.31619 0.600098 2.19987 0.600098C2.58451 0.604738 2.95203 0.759778 3.22387 1.0321Z" fill="" />
            </svg>
          </span>
        </div>

        <div class="modal-main">

          <div class="modal-wrapper pt-5 lg:pt-0">

            <div class="input-sec">
              <div class="w-11 h-11 flex justify-center items-center absolute top-[8.5px] left-2 cursor-pointer">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.0495 16.0772L12.9451 11.9729C14.063 10.6056 14.6126 8.86099 14.4803 7.09988C14.3479 5.33877 13.5437 3.69589 12.2341 2.51107C10.9244 1.32624 9.20946 0.690119 7.44393 0.73427C5.6784 0.778422 3.99739 1.49947 2.74858 2.74828C1.49978 3.99708 0.778727 5.6781 0.734576 7.44363C0.690424 9.20915 1.32655 10.9241 2.51137 12.2338C3.6962 13.5434 5.33907 14.3476 7.10019 14.48C8.8613 14.6123 10.6059 14.0627 11.9732 12.9448L16.0775 17.0492C16.2087 17.1664 16.3797 17.2289 16.5555 17.224C16.7313 17.219 16.8986 17.147 17.0229 17.0226C17.1473 16.8983 17.2193 16.731 17.2243 16.5552C17.2292 16.3794 17.1667 16.2084 17.0495 16.0772ZM7.62644 13.1253C6.53808 13.1258 5.47402 12.8035 4.56888 12.1991C3.66373 11.5948 2.95816 10.7356 2.54143 9.73016C2.1247 8.72475 2.01553 7.61832 2.22773 6.55085C2.43993 5.48339 2.96397 4.50284 3.73356 3.73325C4.50314 2.96367 5.48369 2.43963 6.55116 2.22742C7.61863 2.01522 8.72505 2.12439 9.73047 2.54112C10.7359 2.95785 11.5951 3.66342 12.1994 4.56857C12.8038 5.47372 13.1261 6.53778 13.1256 7.62613C13.1235 9.08397 12.5435 10.4815 11.5127 11.5124C10.4818 12.5432 9.08427 13.1232 7.62644 13.1253Z" fill="#202020" />
                </svg>
              </div>
              <input type="text" id="default-search" class="input-field" placeholder="Type & Hit Enter..." required>
            </div>

            <div class="modal-body-wrapper flex overflow-y-auto h-[72vh] md:h-[72vh] lg:h-[50vh] 2xl:h-[35vh] relative mt-5 md:mt-6 lg:mt-8">
              <div class="modal-body">

                <div class="search-card">
                  <a href="">
                    <figure>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />
                    </figure>
                  </a>
                  <h3 class="search-card-title"><a href="">10 Things To Do In Arkansas In 2022 – Best Activities To Indulge In While On A Trip</a></h3>
                </div>
                <div class="search-card">
                  <a href="">
                    <figure>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />
                    </figure>
                  </a>
                  <h3 class="search-card-title"><a href="">10 Things To Do In Arkansas In 2022 – Best Activities To Indulge In While On A Trip</a></h3>
                </div>
                <div class="search-card">
                  <a href="">
                    <figure>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />
                    </figure>
                  </a>
                  <h3 class="search-card-title"><a href="">10 Things To Do In Arkansas In 2022 – Best Activities To Indulge In While On A Trip</a></h3>
                </div>
                <div class="search-card">
                  <a href="">
                    <figure>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />
                    </figure>
                  </a>
                  <h3 class="search-card-title"><a href="">10 Things To Do In Arkansas In 2022 – Best Activities To Indulge In While On A Trip</a></h3>
                </div>
                <div class="search-card">
                  <a href="">
                    <figure>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />
                    </figure>
                  </a>
                  <h3 class="search-card-title"><a href="">10 Things To Do In Arkansas In 2022 – Best Activities To Indulge In While On A Trip</a></h3>
                </div>
                <div class="search-card">
                  <a href="">
                    <figure>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/card1.jpg" alt="card" />
                    </figure>
                  </a>
                  <h3 class="search-card-title"><a href="">10 Things To Do In Arkansas In 2022 – Best Activities To Indulge In While On A Trip</a></h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!-- Modal End -->

  <!-- hamburger-menu -->
  <div id="hamMenu" class="lg:hidden">

    <div class="ham-content" style="width: 100%;">
      <div class="ham-main">
        <div class="ham-list">
          <h4 class="ham-links ham-accordion">Billionaires</h4>
          <div class="ham-submenu newPanel">
            <a class="submenu-list" href="">Submenu 1</a>
            <a class="submenu-list" href="">Submenu 1</a>
            <a class="submenu-list" href="">Submenu 1</a>
            <a class="submenu-list" href="">Submenu 1</a>
          </div>
        </div>
        <div class="ham-list">
          <h4 class="ham-links ham-accordion"> Wealth</h4>
          <div class="ham-submenu newPanel">
            <a class="submenu-list" href="">Submenu 1</a>
            <a class="submenu-list" href="">Submenu 1</a>
            <a class="submenu-list" href="">Submenu 1</a>
            <a class="submenu-list" href="">Submenu 1</a>
          </div>
        </div>
        <div class="ham-list">
          <h4 class="ham-links ham-accordion">Luxury</h4>
          <div class="ham-submenu newPanel">
            <a class="submenu-list" href="">Submenu 1</a>
            <a class="submenu-list" href="">Submenu 1</a>
          </div>
        </div>
        <div class="ham-list">
          <h4 class="ham-links ham-accordion">News</h4>
          <div class="ham-submenu newPanel">
            <a class="submenu-list" href="">Submenu 1</a>

          </div>
        </div>
        <div class="ham-list">
          <h4 class="ham-links ham-accordion">Blogs</h4>
          <div class="ham-submenu newPanel">
            <a class="submenu-list" href="">Submenu 1</a>
            <a class="submenu-list" href="">Submenu 1</a>
            <a class="submenu-list" href="">Submenu 1</a>
            <a class="submenu-list" href="">Submenu 1</a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <main>