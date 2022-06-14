<div class="social-post">

    
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_
        blank" style="float:left;"> <span class="ps-social-icon fa fa-facebook" style="background-color: #449d44; color:white;"></span>
    </a>   


    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title_attribute(); ?>%20por%20@ayudawp" target="_blank" style="float:left;"> 
        <span class="ps-social-icon fa fa-twitter" style="background-color: #449d44; color:white;"></span>
    </a>
    

    <a href="https://www.instagram.com" target="_
        blank" style="float:left;"> <span class="ps-social-icon fa fa-instagram" style="background-color: #449d44; color:white;"></span>
    </a>
    

    <a href="mailto:?subject=Alcona: <?php the_title()?>&body=%0D%0A<?php pll__('Puede que te interese: '). the_title() ?>%0D%0A<?php pll__("en este enlace: "). the_permalink() ?>" target="_blank" style="float:left;"> 
        <span class="ps-social-icon fa fa-envelope-o" style="background-color: #449d44; color:white;"></span>
    </a>
  

    <!-- <a onclick="window.print()" target="_blank" class='print-button' style="float:left;"> 
        <span  class="ps-social-icon fa fa-print" style="background-color: #449d44; color:white;"> </span>
    </a> -->
        

  


    <?php //Obtenemos la URL de la imagen destacada
    $pin_imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );?>

 

   
    

</div> <!-- /. share-post -->

