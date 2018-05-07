   	<div class="container faqcon">
        	<div class="row">
                               
               <div class="contentsedtion"> 
			   <h2>Sitemap</h2>
<div class='menusitemap'>
<?php
class Walker_Quickstart_Menu extends Walker {

    // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
		'parent' => 'menu_item_parent', 
        'id'     => 'ID'
    );


}
?>
<ul>
    <?php
    wp_nav_menu(array(
            'menu' => 'top_menu',
            'depth' => 3,
            'container' => true,
            'menu_class' => 'sitemap',
            'fallback_cb' => 'wp_page_menu',
      //  'walker'  => new Walker_Quickstart_Menu() //use our custom walker
    ));
    ?>
</ul>
    </div>
</div>
</div>
</div>


