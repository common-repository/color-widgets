<?php
/*
Plugin Name: Color Widgets
Plugin URI: http://oasissolutions.co.in
Description: Color Widgets allows adding custom style to your widgets
Author: Nilay Medh
Version: 1.0
Author URI: http://oasissolutions.co.in

*/
/**
 * ColorWidgets Class
 */
class ColorWidgets extends WP_Widget {
    /** constructor */
    function ColorWidgets() {
        parent::WP_Widget(false, $name = 'ColorWidgets');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
		$themestyle = apply_filters('widget_themestyle', $instance['themestyle']);
        $title = apply_filters('widget_title', $instance['title']);
		$text = apply_filters('widget_text', $instance['text']);
		$titlebgcolor = apply_filters('widget_titlebgcolor', $instance['titlebgcolor']);
		$titlefontcolor = apply_filters('widget_titlefontcolor', $instance['titlefontcolor']);
		$titlehalign = apply_filters('widget_titlehalign', $instance['titlehalign']);
		$textbgcolor = apply_filters('widget_textbgcolor', $instance['textbgcolor']);
		$textfontcolor = apply_filters('widget_textfontcolor', $instance['textfontcolor']);
		$texthalign = apply_filters('widget_texthalign', $instance['texthalign']);
		$titlepadding = apply_filters('widget_titlepadding', $instance['titlepadding']);
		$textpadding = apply_filters('widget_textpadding', $instance['textpadding']);
		$widgetborderwidth = apply_filters('widget_widgetborderwidth', $instance['widgetborderwidth']);
		$widgetbordercolor = apply_filters('widget_widgetbordercolor', $instance['widgetbordercolor']);
		$widgetmargin = apply_filters('widget_widgetmargin', $instance['widgetmargin']);
		$widgetborderstyle = apply_filters('widget_widgetborderstyle', $instance['widgetborderstyle']);
        ?>
        <div style="border:<?php echo $widgetborderwidth; ?> <?php echo $widgetborderstyle; ?> <?php echo $widgetbordercolor; ?>; margin:<?php echo $widgetmargin; ?>">
			  <?php if ($themestyle == 'Yes') { echo $before_widget; } ?>
                  <?php if ( $title != NULL ) {
                        if ($themestyle == 'Yes') {
							echo $before_title . $title . $after_title; 
						} else {
				  ?>
						<div style="background-color:<?php echo $titlebgcolor; ?>; color:<?php echo $titlefontcolor; ?>; text-align:<?php echo $titlehalign; ?>; padding:<?php echo $titlepadding; ?>"><?php echo $title; ?></div>
				  <?php }
				  } ?>		
                  <div style="background-color:<?php echo $textbgcolor; ?>; color:<?php echo $textfontcolor; ?>; text-align:<?php echo $texthalign; ?>; padding:<?php echo $textpadding; ?>"><?php echo $text; ?></div>
              <?php if ($themestyle == 'Yes') { echo $after_widget; } ?>
        </div>
		<?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
		$themestyle = esc_attr($instance['themestyle']);
        $title = esc_attr($instance['title']);
		$text = esc_attr($instance['text']);
		$titlebgcolor = esc_attr($instance['titlebgcolor']);
		$titlefontcolor = esc_attr($instance['titlefontcolor']);
		$titlehalign = esc_attr($instance['titlehalign']);
		$textbgcolor = esc_attr($instance['textbgcolor']);
		$textfontcolor = esc_attr($instance['textfontcolor']);
		$texthalign = esc_attr($instance['texthalign']);
		$titlepadding = esc_attr($instance['titlepadding']);
		$textpadding = esc_attr($instance['textpadding']);
		$widgetborderwidth = esc_attr($instance['widgetborderwidth']);
		$widgetbordercolor = esc_attr($instance['widgetbordercolor']);
		$widgetmargin = esc_attr($instance['widgetmargin']);
		$widgetborderstyle = esc_attr($instance['widgetborderstyle']);
        ?>	
		<div style="font-weight: bold; text-align: center; text-decoration:underline">Widget Parameters</div><br />
			<p><label for="<?php echo $this->get_field_id('widgetborderwidth'); ?>"><?php _e('Border Width for Widget <em>Example 2px</em>:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('widgetborderwidth'); ?>" name="<?php echo $this->get_field_name('widgetborderwidth'); ?>" type="text" value="<?php echo $widgetborderwidth; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('widgetbordercolor'); ?>"><?php _e('Border Color for Widget <em>Example #FFC47F</em>:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('widgetbordercolor'); ?>" name="<?php echo $this->get_field_name('widgetbordercolor'); ?>" type="text" value="<?php echo $widgetbordercolor; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id( 'widgetborderstyle' ); ?>"><?php _e( 'Border Style for Widget:' ); ?>
		<select id="<?php echo $this->get_field_id( 'widgetborderstyle' ); ?>" name="<?php echo $this->get_field_name( 'widgetborderstyle' ); ?>">
		<?php
			$widgetborderstyle_choices = array( 'none' => __( 'None' ), 'dotted' => __( 'Dotted' ), 'dashed' => __( 'Dashed' ), 'solid' => __( 'Solid' ), 'double' => __( 'Double' ), 'groove' => __( 'Groove' ), 'ridge' => __( 'Ridge' ), 'inset' => __( 'Inset' ), 'outset' => __( 'Outset' ) );
			foreach ( $widgetborderstyle_choices as $widgetborderstyle_value => $widgetborderstyle_text ) {
				echo "<option value='$widgetborderstyle_value' " . ( $widgetborderstyle == $widgetborderstyle_value ? "selected='selected'" : '' ) . ">$widgetborderstyle_text</option>\n";
			}
		?>
		</select>
		</label></p>
			<p><label for="<?php echo $this->get_field_id('widgetmargin'); ?>"><?php _e('Margin for Widget <em>Distance between widget and template div in px</em>:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('widgetmargin'); ?>" name="<?php echo $this->get_field_name('widgetmargin'); ?>" type="text" value="<?php echo $widgetmargin; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id( 'themestyle' ); ?>"><?php _e( 'Enable Default Theme Style ?:' ); ?>
		<select id="<?php echo $this->get_field_id( 'themestyle' ); ?>" name="<?php echo $this->get_field_name( 'themestyle' ); ?>">
		<?php
			$themestyle_choices = array( 'Yes' => __( 'Yes' ), 'No' => __( 'No' ) );
			foreach ( $themestyle_choices as $themestyle_value => $themestyle_text ) {
				echo "<option value='$themestyle_value' " . ( $themestyle == $themestyle_value ? "selected='selected'" : '' ) . ">$themestyle_text</option>\n";
			}
		?>
		</select>
		</label></p>
		<div style="font-weight: bold; text-align: center; text-decoration:underline">Title Parameters</div><br />
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('titlepadding'); ?>"><?php _e('Title Padding:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('titlepadding'); ?>" name="<?php echo $this->get_field_name('titlepadding'); ?>" type="text" value="<?php echo $titlepadding; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('titlebgcolor'); ?>"><?php _e('Title Background Color:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('titlebgcolor'); ?>" name="<?php echo $this->get_field_name('titlebgcolor'); ?>" type="text" value="<?php echo $titlebgcolor; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('titlefontcolor'); ?>"><?php _e('Title Font Color:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('titlefontcolor'); ?>" name="<?php echo $this->get_field_name('titlefontcolor'); ?>" type="text" value="<?php echo $titlefontcolor; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('titlehalign'); ?>"><?php _e('Title Horizontal Alignment:'); ?> 
				<select id="<?php echo $this->get_field_id( 'titlehalign' ); ?>" name="<?php echo $this->get_field_name( 'titlehalign' ); ?>">
		<?php
			$titlehalign_choices = array( 'left' => __( 'Left' ), 'right' => __( 'Right' ), 'center' => __( 'Center' ), 'justify' => __( 'Justify' ) );
			foreach ( $titlehalign_choices as $titlehalign_value => $titlehalign_text ) {
				echo "<option value='$titlehalign_value' " . ( $titlehalign == $titlehalign_value ? "selected='selected'" : '' ) . ">$titlehalign_text</option>\n";
			}
		?>
		</select>
		</label></p>
		<div style="font-weight: bold; text-align: center; text-decoration:underline">Content Text Parameters <em>(HTML Allowed)</em></div><br />
			<p><label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Content:'); ?> <textarea class="widefat" rows="16" cols="10" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea></label></p>
			<p><label for="<?php echo $this->get_field_id('textpadding'); ?>"><?php _e('Text Padding:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('textpadding'); ?>" name="<?php echo $this->get_field_name('textpadding'); ?>" type="text" value="<?php echo $textpadding; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('textbgcolor'); ?>"><?php _e('Text Background Color:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('textbgcolor'); ?>" name="<?php echo $this->get_field_name('textbgcolor'); ?>" type="text" value="<?php echo $textbgcolor; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('textfontcolor'); ?>"><?php _e('Text Font Color:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('textfontcolor'); ?>" name="<?php echo $this->get_field_name('textfontcolor'); ?>" type="text" value="<?php echo $textfontcolor; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('texthalign'); ?>"><?php _e('Text Horizontal Alignment:'); ?>
				<select id="<?php echo $this->get_field_id( 'texthalign' ); ?>" name="<?php echo $this->get_field_name( 'texthalign' ); ?>">
		<?php
			$texthalign_choices = array( 'left' => __( 'Left' ), 'right' => __( 'Right' ), 'center' => __( 'Center' ), 'justify' => __( 'Justify' ) );
			foreach ( $texthalign_choices as $texthalign_value => $texthalign_text ) {
				echo "<option value='$texthalign_value' " . ( $texthalign == $texthalign_value ? "selected='selected'" : '' ) . ">$texthalign_text</option>\n";
			}
		?>
		</select>
		</label></p>
		<div style="background-color:#FFE59F">Want more than Color Widgets ? Get <a href="http://oasissolutions.co.in/web-development/wordpress-plugins/pretty-widgets.html" target="_blank">Pretty Widgets</a></div>
        <?php 
    }

} // class ColorWidgets
// register ColorWidgets widget
add_action('widgets_init', create_function('', 'return register_widget("ColorWidgets");'));

?>