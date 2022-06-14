<?php defined('ABSPATH') or die('No script kidding please!');
/*
 * Register Plugin Widget : Everest_Tab_Widget
 */
if (!class_exists('Everest_Tab_Lite_Widget')) {

    class Everest_Tab_Lite_Widget extends WP_Widget {

        public function __construct() {
            parent::__construct('Everest_Tab_Widget', 'Everest Tab Lite Widget', array('description' => __('Display Specific tab with its specific configuration post.', 'everest-tab-lite')));
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget($args, $instance) {

            echo $args['before_widget'];
            echo '<div class="etab-widget-wrap">';
            if (!empty($instance['title'])) {
                echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
            }
            $etab_id = isset($instance['etab_id']) ? intval($instance['etab_id']) : '';
            $post = get_post($etab_id); 
            $slug = $post->post_name;
            echo do_shortcode("[etabs slug='" . $slug . "']");
            echo '</div>';
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance) {
            global $post;
            $title = isset($instance['title']) ? sanitize_text_field($instance['title']) : '';
            $id = isset($instance['etab_id']) ? intval($instance['etab_id']) : '';
            ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'everest-tab-lite'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('etab_id'); ?>"><?php _e('Select Tab:', 'everest-tab-lite'); ?></label>
                <select name="<?php echo $this->get_field_name('etab_id'); ?>" class='widefat' id="<?php echo $this->get_field_id('etab_id'); ?>" type="text">
                    <?php
                    $args = array(
                        'post_type' => 'everest_tab',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'order' => 'ASC', 
                        'orderby' => 'id'
                    );
                    $posts = get_posts($args);
                    if (!empty($posts)) {

                        foreach ($posts as $post) {
                            ?>

                            <option value="<?php echo $post->ID; ?>" <?php if ($post->ID == $id) { ?>selected="selected"<?php } ?>><?php echo $post->post_title; ?></option>

                            <?php
                        }
                    }
                    ?>
                </select>
            </p>
            <?php
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param array $new_instance Values just sent to be saved.
         * @param array $old_instance Previously saved values from database.
         *
         * @return array Updated safe values to be saved.
         */
        public function update($new_instance, $old_instance) {

            $instance = $old_instance;
            $instance['title'] = isset($new_instance['title']) ? strip_tags($new_instance['title']) : '';
            $instance['etab_id'] = isset($new_instance['etab_id']) ? strip_tags($new_instance['etab_id']) : '';
            return $instance;
        }

    }

}

