<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://api.fontshare.com/v2/css?f%5B%5D=supreme@1,2&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">

        <?php wp_head(); ?>

    </head>

    <body <?php body_class(); ?>>

      <header>

        <?php 
        if (isset(get_nav_menu_locations()['header-menu'])) :
            echo '<div class="navbar-center lg:flex">';
            $header_menu = get_term(get_nav_menu_locations()['header-menu'], 'nav_menu');
            $header_menu_items = wp_get_nav_menu_items($header_menu->term_id);
            $menu_items_with_children = array();
            foreach ($header_menu_items as $menu_item) {
              if ($menu_item->menu_item_parent && !in_array($menu_item->menu_item_parent, $menu_items_with_children)) {
                array_push($menu_items_with_children, $menu_item->menu_item_parent);
              }
            }
            echo '<ul class="desk-top-menu">';
            foreach ($header_menu_items as $menu_item) :
              $parent_ID = $menu_item->ID;
              if ($menu_item->menu_item_parent == 0) :
                echo '<li class="desk-top-menu-li">';
                if (!in_array($menu_item->ID, $menu_items_with_children)) :
                  echo '<a href="' . $menu_item->url . '" class="nav-links">' . $menu_item->title . '</a>';
                else :
                  echo '<a href="' . $menu_item->url . '" class="nav-links">' . $menu_item->title . '</a>';
                  echo '<ul class="desk-top-menu-dropdown">';
                  foreach ($header_menu_items as $menu_child_item) :
                    if ($menu_child_item->menu_item_parent == $parent_ID) :
                      echo '<li class="desk-top-menu-dropdown-li"><a class="dropdown-options" href="' . $menu_child_item->url . '">' . $menu_child_item->title . '</a></li>';
                    endif;
                  endforeach;
                  echo '</ul>';
                endif;
                echo '</li>';
              endif;
            endforeach;
            echo '</ul>';
            echo '</div>';
        endif;
        
        
        echo do_shortcode( '[gtranslate]'); ?>

      </header>