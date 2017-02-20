<?php
 
class project_widget extends WP_Widget {
 
    function project_widget(){
        // Constructor del Widget.
        $widget_ops = array('classname' => 'project_widget', 'description' => "Descripción de Mi primer Widget" );
        $this->WP_Widget('project_widget', "Mi primer Widget", $widget_ops);
    }
 
    function widget($args,$instance){
        // Contenido del Widget que se mostrará en la Sidebar
        echo $before_widget;    
        ?>
        <aside id='project_widget' class='widget'>
            <?php if (isset($instance["title"]) && $instance["title"] != "") : ?>
            <div class="widget_title">
                <h3 class="widget_title_text"><?php echo $instance["title"];?></h3>
                <hr class="widget_separator"></hr>
            </div>
            <?php endif; ?>
            <div class="row project_widget_row <?php echo ($instance["container"])?"container":"";?>">
            <?php
                $limit = (isset($instance["number"]) && $instance["number"] != "")?$instance["number"]:-1;
                $limitCount = 0;
                $query = get_pages( array('hierarchical' => 0, 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/project-template.php' ) );
                foreach($query as $page) {
                    if($limit != -1 && $limit == $limitCount)
                        break;
                    $id = $page->ID;
                    if( has_post_thumbnail( $id) ) {
                        $image = get_the_post_thumbnail_url( $id );
                    } else {
                        $image = "error";
                    }
                    echo '
                    <div class="card medium col s12 m6 l4 project_widget_item">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="'.$image.'">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">'.$page->post_title.'<i class="material-icons right">expand_less</i></span>
                        </div>
                        <div class="card-action">
                            <span class="right"><a href="'.get_permalink($id).'">Leer mas</a></span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">'.$page->post_title.'<i class="material-icons right">expand_more</i></span>
                            <p>'.get_the_excerpt($id).'</p>
                            <div class="card-action">
                                <span class="right"><a href="'.get_permalink($id).'">Leer mas</a></span>
                            </div>
                        </div>
                    </div>';
                    $limitCount = $limitCount+1;
                }
            ?>
            </div>
            <?php if (isset($instance["see_all"]) && $instance["see_all"] != "") : ?>
            <div class ="bt center-align">
                <a class="waves-effect waves-light btn" href="<?php echo $instance["see_all"]; ?>"><?php echo ($instance["see_all_text"] != "")?$instance["see_all_text"]:"See all our projects"; ?></a>
            </div>
            <?php endif; ?>
        </aside>
        <?php
        echo $after_widget;
    }
 
    function update($new_instance, $old_instance){
        // Función de guardado de opciones  
        $instance = $old_instance;
		$instance['title'] 			= sanitize_text_field($new_instance['title']);
		$instance['number'] 		= sanitize_text_field($new_instance['number']);
		$instance['see_all'] 		= esc_url_raw( $new_instance['see_all'] );	
		$instance['see_all_text'] 	= sanitize_text_field($new_instance['see_all_text']);		
		$instance['container'] 		= $new_instance['container'];		
		    			
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['atframework_projects']) )
			delete_option('atframework_projects');		  
		  
		return $instance; 
    }
 
    function form($instance){
        // Formulario de opciones del Widget, que aparece cuando añadimos el Widget a una Sidebar
        $title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    		= isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$container  	= isset( $instance['container'] ) ? ( $instance['container'] ) : 'true';
		$see_all   		= isset( $instance['see_all'] ) ? esc_url( $instance['see_all'] ) : '';
		$see_all_text  	= isset( $instance['see_all_text'] ) ? esc_html( $instance['see_all_text'] ) : 'See all our projects';

	    ?>

        <p><?php _e('This widget displays all pages that have the Single Project page template assigned to them.', 'ncatz'); ?></p>
        <p><em><?php _e('Tip: to rearrange the projects order, edit each project page and add a value in Page Attributes > Order', 'ncatz'); ?></em></p>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'ncatz'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of projects to show (-1 shows all of them):', 'ncatz' ); ?></label>
            <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        <p>
            <label for="<?php echo $this->get_field_id( 'container' ); ?>"><?php _e( 'Show the widget inside a container.', 'ncatz' ); ?></label>
            <input class="checkbox" type="checkbox" checked="<?php echo $container; ?>" id="<?php echo $this->get_field_id( 'container' ); ?>" name="<?php echo $this->get_field_name( 'container' ); ?>" /> 
        <p>
            <label for="<?php echo $this->get_field_id('see_all'); ?>"><?php _e('The URL for your button [In case you want a button below your projects block]', 'ncatz'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'see_all' ); ?>" name="<?php echo $this->get_field_name( 'see_all' ); ?>" type="text" value="<?php echo $see_all; ?>" size="3" /></p>	
        <p>
            <label for="<?php echo $this->get_field_id('see_all_text'); ?>"><?php _e('The text for the button [Defaults to <em>See all our projects</em> if left empty]', 'ncatz'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'see_all_text' ); ?>" name="<?php echo $this->get_field_name( 'see_all_text' ); ?>" type="text" value="<?php echo $see_all_text; ?>" size="3" />
        </p>	
        <?php
    }    
} 
 
?>