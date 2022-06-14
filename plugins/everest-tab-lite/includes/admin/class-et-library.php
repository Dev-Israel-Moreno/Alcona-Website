<?php defined('ABSPATH') or die('No script kiddies please!!');
if ( !class_exists('ETabL_Library') ) {
    class ETabL_Library {
        /**
         * Prints array in pre format
         *
         * @since 1.0.0
         *
         * @param array $array
         */
       public function displayArr($array) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        }
        
        /**
         * Function to generate random number
         * @param  integer $length Length of the random number to be generated
         * @return mixed Returns the mixed value of number and alphabets
         */
        public function generateRandomIndex($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

                 //SLUG TO ID
         public static function get_ID_by_slug($post_slug) {
          $posts = get_posts(array('name' => $post_slug, 'post_type' => 'everest_tab'));
           return $posts[0]->ID;
          }

                
        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
        function sanitize_array($array = array(), $sanitize_rule = array()) {
            if ( !is_array($array) || count($array) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( !is_array($v) ) {

                    $default_sanitize_rule = (is_numeric($k)) ? 'text' : 'html';
                    $sanitize_type = isset($sanitize_rule[ $k ]) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = $this->sanitize_value($v, $sanitize_type);
                }
                if ( is_array($v) ) {
                    $array[ $k ] = $this->sanitize_array($v, $sanitize_rule);
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_value($value = '', $sanitize_type = 'text') {
            switch ( $sanitize_type ) {
                case 'html':
                    // iframe 
                    $allowed_tags = wp_kses_allowed_html('post');
                    $allowed_tags['iframe']=array(
                      'align' => true,
                      'width' => true,
                      'height' => true,
                      'frameborder' => true,
                      'name' => true,
                      'src' => true,
                      'id' => true,
                      'class' => true,
                      'style' => true,
                      'scrolling' => true,
                      'marginwidth' => true,
                      'marginheight' => true,
                      'allowfullscreen' => true,
                    );
                    return wp_kses(stripslashes_deep($value), $allowed_tags);
                    break;
                default:
                    return sanitize_text_field($value);
                    break;
            }
        }

    
          /*
       * Get Lighter Color From Darker Color Using Color Code
       */
     public static function colourBrightness($hex, $percent) {
                // Work out if hash given
                $hash = '';
                if (stristr($hex,'#')) {
                    $hex = str_replace('#','',$hex);
                    $hash = '#';
                }
                /// HEX TO RGB
                $rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
                //// CALCULATE 
                for ($i=0; $i<3; $i++) {
                    // See if brighter or darker
                    if ($percent > 0) {
                        // Lighter
                        $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
                    } else {
                        // Darker
                        $positivePercent = $percent - ($percent*2);
                        $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
                    }
                    // In case rounding up causes us to go to 256
                    if ($rgb[$i] > 255) {
                        $rgb[$i] = 255;
                    }
                }
                //// RBG to Hex
                $hex = '';
                for($i=0; $i < 3; $i++) {
                    // Convert the decimal digit to hex
                    $hexDigit = dechex($rgb[$i]);
                    // Add a leading zero if necessary
                    if(strlen($hexDigit) == 1) {
                    $hexDigit = "0" . $hexDigit;
                    }
                    // Append to the hex string
                    $hex .= $hexDigit;
                }
                return $hash.$hex;
            }


        
    }
}