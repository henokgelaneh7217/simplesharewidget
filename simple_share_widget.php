<?php

/**
 *
 * @link              gelanehhenok.wordpress.com
 * @since             1.0.0
 * @package           Simple Share Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Share Widget
 * Plugin URI:        simplesharewidget.com
 * Description:       Simple Widget for Social Media Share Buttons
 * Version:           1.0.0
 * Author:            Henok Gelaneh
 * Author URI:        gelanehhenok.wordpress.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simplesharewidget
 * Domain Path:       /languages
 *
 * Simple Share Widget is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * WPForms is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

// The widget class
class simple_share_widget_function extends WP_Widget {

	// Main constructor
	public function __construct() {
		parent::__construct(
			'simple_share_widget',
			__( 'Simple Share Widget', 'ssw' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}
	// The widget form (for the backend )
	public function form( $instance ) {
		// Set widget defaults
		$defaults = array(
			'design_style' 		=> 'icon',
			'background_color' 	=> '#14e4ff',
			'icon_color' 		=> '#ffffff',
			'layout'			=> 'horizontal',
			'facebook' 			=> '',
			'twitter'   		=> '',
			'linkedin' 			=> '',
			'telegram' 			=> '',
			'email' 			=> ''
		);
		
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<label><b>Icons to be Displayed:</b></label>

		<?php // Facebook ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $facebook ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="48" height="48"
viewBox="0 0 24 24"
style=" fill:#000000;"><path d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.014467 17.065322 19.313017 13.21875 19.898438 L 13.21875 14.384766 L 15.546875 14.384766 L 15.912109 12.019531 L 13.21875 12.019531 L 13.21875 10.726562 C 13.21875 9.7435625 13.538984 8.8710938 14.458984 8.8710938 L 15.935547 8.8710938 L 15.935547 6.8066406 C 15.675547 6.7716406 15.126844 6.6953125 14.089844 6.6953125 C 11.923844 6.6953125 10.654297 7.8393125 10.654297 10.445312 L 10.654297 12.019531 L 8.4277344 12.019531 L 8.4277344 14.384766 L 10.654297 14.384766 L 10.654297 19.878906 C 6.8702905 19.240845 4 15.970237 4 12 C 4 7.5698774 7.5698774 4 12 4 z"></path></svg></label>
		</p>

		<?php // Twitter ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $twitter ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="48" height="48"
viewBox="0 0 24 24"
style=" fill:#000000;">    <path d="M 5 3 C 3.897 3 3 3.897 3 5 L 3 19 C 3 20.103 3.897 21 5 21 L 19 21 C 20.103 21 21 20.103 21 19 L 21 5 C 21 3.897 20.103 3 19 3 L 5 3 z M 5 5 L 19 5 L 19.001953 19 L 5 19 L 5 5 z M 14.566406 7.1132812 C 13.194406 7.1132812 12.080078 8.2286094 12.080078 9.5996094 C 12.080078 9.8566094 12.166016 10.028219 12.166016 10.199219 C 10.109016 10.114219 8.309375 9.0859063 7.109375 7.6289062 C 6.852375 7.9719062 6.765625 8.399125 6.765625 8.828125 C 6.765625 9.685125 7.1948594 10.372656 7.8808594 10.972656 C 7.4528594 10.886656 7.108625 10.799906 6.765625 10.628906 C 6.765625 11.828906 7.6223281 12.772297 8.7363281 13.029297 C 8.4793281 13.115297 8.3077812 13.115234 8.0507812 13.115234 C 7.9647813 13.115234 7.7920938 13.029297 7.6210938 13.029297 C 7.9640937 13.972297 8.8215469 14.742188 9.9355469 14.742188 C 9.0785469 15.342187 7.9636094 15.771484 6.8496094 15.771484 L 6.25 15.771484 C 7.364 16.456484 8.6504844 16.886719 10.021484 16.886719 C 14.564484 16.886719 17.050781 13.114422 17.050781 9.8574219 L 17.050781 9.5136719 C 17.479781 9.1706719 17.906953 8.7425625 18.251953 8.2265625 C 17.737953 8.4845625 17.308922 8.57025 16.794922 8.65625 C 17.308922 8.31425 17.737203 7.8851562 17.908203 7.2851562 C 17.479203 7.5421562 16.965234 7.7987656 16.365234 7.8847656 C 15.936234 7.3707656 15.252406 7.1132812 14.566406 7.1132812 z"></path></svg>
					</label>
		</p>
		<?php // LinkedIn ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $linkedin ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="48" height="48"
viewBox="0 0 24 24"
style=" fill:#000000;">    <path d="M 5 3 C 3.895 3 3 3.895 3 5 L 3 19 C 3 20.105 3.895 21 5 21 L 19 21 C 20.105 21 21 20.105 21 19 L 21 5 C 21 3.895 20.105 3 19 3 L 5 3 z M 5 5 L 19 5 L 19 19 L 5 19 L 5 5 z M 7.7792969 6.3164062 C 6.9222969 6.3164062 6.4082031 6.8315781 6.4082031 7.5175781 C 6.4082031 8.2035781 6.9223594 8.7167969 7.6933594 8.7167969 C 8.5503594 8.7167969 9.0644531 8.2035781 9.0644531 7.5175781 C 9.0644531 6.8315781 8.5502969 6.3164062 7.7792969 6.3164062 z M 6.4765625 10 L 6.4765625 17 L 9 17 L 9 10 L 6.4765625 10 z M 11.082031 10 L 11.082031 17 L 13.605469 17 L 13.605469 13.173828 C 13.605469 12.034828 14.418109 11.871094 14.662109 11.871094 C 14.906109 11.871094 15.558594 12.115828 15.558594 13.173828 L 15.558594 17 L 18 17 L 18 13.173828 C 18 10.976828 17.023734 10 15.802734 10 C 14.581734 10 13.930469 10.406562 13.605469 10.976562 L 13.605469 10 L 11.082031 10 z"></path></svg></label>
		</p>

		<?php // Telegram ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'telegram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'telegram' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $telegram ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'telegram' ) ); ?>"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="48" height="48"
viewBox="0 0 24 24"
style=" fill:#000000;">    <path d="M 20.572266 3.0117188 C 20.239891 2.9764687 19.878625 3.028375 19.515625 3.171875 C 19.065625 3.348875 12.014406 6.3150313 5.4414062 9.0820312 L 3.2695312 9.9960938 C 2.4285313 10.337094 2.0039062 10.891672 2.0039062 11.638672 C 2.0039062 12.161672 2.22525 12.871063 3.28125 13.289062 L 6.9472656 14.757812 C 7.2642656 15.708813 8.0005469 17.916906 8.1855469 18.503906 C 8.2955469 18.851906 8.5733906 19.728594 9.2753906 19.933594 C 9.4193906 19.982594 9.5696563 20.007813 9.7226562 20.007812 C 10.165656 20.007812 10.484625 19.801641 10.640625 19.681641 L 12.970703 17.710938 L 15.800781 20.328125 C 15.909781 20.439125 16.486719 21 17.261719 21 C 18.228719 21 18.962234 20.195016 19.115234 19.416016 C 19.198234 18.989016 21.927734 5.2870625 21.927734 5.2890625 C 22.172734 4.1900625 21.732219 3.6199531 21.449219 3.3769531 C 21.206719 3.1694531 20.904641 3.0469688 20.572266 3.0117188 z M 19.910156 5.171875 C 19.533156 7.061875 17.478016 17.378234 17.166016 18.865234 L 13.029297 15.039062 L 10.222656 17.416016 L 11 14.375 C 11 14.375 16.362547 8.9468594 16.685547 8.6308594 C 16.945547 8.3778594 17 8.2891719 17 8.2011719 C 17 8.0841719 16.939781 8 16.800781 8 C 16.675781 8 16.506016 8.1197812 16.416016 8.1757812 C 15.272669 8.8885973 10.404094 11.662239 8.0078125 13.025391 L 4.53125 11.636719 L 6.21875 10.927734 C 10.51775 9.1177344 18.174156 5.893875 19.910156 5.171875 z"></path></svg></label>
		</p>

		<?php // Email ?>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $email ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="40" height="48"><title>Share via Email</title><path d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"/></svg></label>
		</p>

		


		<?php //Style ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'design_style' ); ?>"><b><?php _e( 'Style:', 'ssw' ); ?></b></label>
			<select required name="<?php echo $this->get_field_name( 'design_style' ); ?>" id="<?php echo $this->get_field_id( 'design_style' ); ?>" class="widefat">
			<?php
				$options = array(
					'icon' => __( 'Icon', 'ssw' ),
					'circles' => __( 'Circle', 'ssw' ),
					'square' => __( 'Square', 'ssw' )
				);
				foreach ( $options as $key => $name ) {
					echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select, $key, false ) . '>'. $name . '</option>';
				} ?>
			</select>
		</p>
		<style>
			input[type="color"] {
				-webkit-appearance: none;
				border: none;
				width: 48px;
				height: 16px;
			}
			input[type="color"]::-webkit-color-swatch-wrapper {
				padding: 0;
			}
			input[type="color"]::-webkit-color-swatch {
				border: solid;
			}
		</style>


		<label><b>Color Theme:</b></label>
		<?php // Background Color ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'background_color' ) ); ?>"><?php _e( 'Background:', 'ssw' ); ?></label>
			<input required id="<?php echo esc_attr( $this->get_field_id( 'background_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'background_color' ) ); ?>" type="color" value="<?php echo esc_attr( $background_color ); ?>" />
		</p>

		<?php // Icon Color ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>"><?php _e( 'Icon:', 'ssw' ); ?></label>
			<input required id="<?php echo esc_attr( $this->get_field_id( 'icon_color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_color' ) ); ?>" type="color" value="<?php echo esc_attr( $icon_color ); ?>" />
		</p>

	<?php }

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['design_style'] 		= isset( $new_instance['design_style'] ) ? wp_strip_all_tags( $new_instance['design_style'] ) : '';
		$instance['background_color']   = isset( $new_instance['background_color'] ) ? wp_strip_all_tags( $new_instance['background_color'] ) : '';
		$instance['icon_color']   		= isset( $new_instance['icon_color'] ) ? wp_strip_all_tags( $new_instance['icon_color'] ) : '';
		$instance['layout'] 			= isset( $new_instance['layout'] ) ? wp_strip_all_tags( $new_instance['layout'] ) : '';
		$instance['facebook'] 			= isset( $new_instance['facebook'] ) ? 1 : false;
		$instance['twitter'] 			= isset( $new_instance['twitter'] ) ? 1 : false;
		$instance['email'] 				= isset( $new_instance['email'] ) ? 1 : false;
		$instance['linkedin'] 			= isset( $new_instance['linkedin'] ) ? 1 : false;
		$instance['telegram'] 			= isset( $new_instance['telegram'] ) ? 1 : false;
		return $instance;
	}
	// Display the widget
	public function widget( $args, $instance ) {
		extract( $args );

		// Check the widget options
		$design_style   	= isset( $instance['design_style'] ) ? $instance['design_style'] : '';
		$background_color	= isset( $instance['background_color'] ) ? $instance['background_color'] : '';
		$icon_color			= isset( $instance['icon_color'] ) ? $instance['icon_color'] : '';
		$layout   			= isset( $instance['layout'] ) ? $instance['layout'] : '';
		$facebook 			= ! empty( $instance['facebook'] ) ? $instance['facebook'] : false;
		$twitter 			= ! empty( $instance['twitter'] ) ? $instance['twitter'] : false;
		$email 				= ! empty( $instance['email'] ) ? $instance['email'] : false;
		$linkedin 			= ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : false;
		$telegram 			= ! empty( $instance['telegram'] ) ? $instance['telegram'] : false;

		// page url to share
		global $wp;
		$current_url = home_url( add_query_arg( array(), $wp->request ) );

		// page title to share
		$page_title = get_the_title();

		// WordPress core before_widget hook
		echo $before_widget;

		// Display the widget
		echo '<div class="simple-share-widget ' . $design_style . ' ' . $layout . '">';

			if ( $facebook ) {
				echo '<a style="background-color: ' . $background_color . '; color: ' . $icon_color . ';" href="https://www.facebook.com/sharer/sharer.php?u=' . $current_url . '" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="48" height="48"
viewBox="0 0 24 24"
style=" fill:#000000;"><path d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.014467 17.065322 19.313017 13.21875 19.898438 L 13.21875 14.384766 L 15.546875 14.384766 L 15.912109 12.019531 L 13.21875 12.019531 L 13.21875 10.726562 C 13.21875 9.7435625 13.538984 8.8710938 14.458984 8.8710938 L 15.935547 8.8710938 L 15.935547 6.8066406 C 15.675547 6.7716406 15.126844 6.6953125 14.089844 6.6953125 C 11.923844 6.6953125 10.654297 7.8393125 10.654297 10.445312 L 10.654297 12.019531 L 8.4277344 12.019531 L 8.4277344 14.384766 L 10.654297 14.384766 L 10.654297 19.878906 C 6.8702905 19.240845 4 15.970237 4 12 C 4 7.5698774 7.5698774 4 12 4 z"></path></svg>
					</a>';
			}

			if ( $twitter ) {
				echo '<a style="background-color: ' . $background_color . '; color: ' . $icon_color . ';" href="https://twitter.com/intent/tweet?url=' . $current_url . '&text=' . urlencode($page_title) . '" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="48" height="48"
viewBox="0 0 24 24"
style=" fill:#000000;">    <path d="M 5 3 C 3.897 3 3 3.897 3 5 L 3 19 C 3 20.103 3.897 21 5 21 L 19 21 C 20.103 21 21 20.103 21 19 L 21 5 C 21 3.897 20.103 3 19 3 L 5 3 z M 5 5 L 19 5 L 19.001953 19 L 5 19 L 5 5 z M 14.566406 7.1132812 C 13.194406 7.1132812 12.080078 8.2286094 12.080078 9.5996094 C 12.080078 9.8566094 12.166016 10.028219 12.166016 10.199219 C 10.109016 10.114219 8.309375 9.0859063 7.109375 7.6289062 C 6.852375 7.9719062 6.765625 8.399125 6.765625 8.828125 C 6.765625 9.685125 7.1948594 10.372656 7.8808594 10.972656 C 7.4528594 10.886656 7.108625 10.799906 6.765625 10.628906 C 6.765625 11.828906 7.6223281 12.772297 8.7363281 13.029297 C 8.4793281 13.115297 8.3077812 13.115234 8.0507812 13.115234 C 7.9647813 13.115234 7.7920938 13.029297 7.6210938 13.029297 C 7.9640937 13.972297 8.8215469 14.742188 9.9355469 14.742188 C 9.0785469 15.342187 7.9636094 15.771484 6.8496094 15.771484 L 6.25 15.771484 C 7.364 16.456484 8.6504844 16.886719 10.021484 16.886719 C 14.564484 16.886719 17.050781 13.114422 17.050781 9.8574219 L 17.050781 9.5136719 C 17.479781 9.1706719 17.906953 8.7425625 18.251953 8.2265625 C 17.737953 8.4845625 17.308922 8.57025 16.794922 8.65625 C 17.308922 8.31425 17.737203 7.8851562 17.908203 7.2851562 C 17.479203 7.5421562 16.965234 7.7987656 16.365234 7.8847656 C 15.936234 7.3707656 15.252406 7.1132812 14.566406 7.1132812 z"></path></svg>
					</a>';
			}

			if ( $linkedin ) {
				echo '<a style="background-color: ' . $background_color . '; color: ' . $icon_color . ';" href="https://www.linkedin.com/shareArticle?mini=true&url=' . $current_url . '&title=' . urlencode($page_title) . '" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="48" height="48"
viewBox="0 0 24 24"
style=" fill:#000000;">    <path d="M 5 3 C 3.895 3 3 3.895 3 5 L 3 19 C 3 20.105 3.895 21 5 21 L 19 21 C 20.105 21 21 20.105 21 19 L 21 5 C 21 3.895 20.105 3 19 3 L 5 3 z M 5 5 L 19 5 L 19 19 L 5 19 L 5 5 z M 7.7792969 6.3164062 C 6.9222969 6.3164062 6.4082031 6.8315781 6.4082031 7.5175781 C 6.4082031 8.2035781 6.9223594 8.7167969 7.6933594 8.7167969 C 8.5503594 8.7167969 9.0644531 8.2035781 9.0644531 7.5175781 C 9.0644531 6.8315781 8.5502969 6.3164062 7.7792969 6.3164062 z M 6.4765625 10 L 6.4765625 17 L 9 17 L 9 10 L 6.4765625 10 z M 11.082031 10 L 11.082031 17 L 13.605469 17 L 13.605469 13.173828 C 13.605469 12.034828 14.418109 11.871094 14.662109 11.871094 C 14.906109 11.871094 15.558594 12.115828 15.558594 13.173828 L 15.558594 17 L 18 17 L 18 13.173828 C 18 10.976828 17.023734 10 15.802734 10 C 14.581734 10 13.930469 10.406562 13.605469 10.976562 L 13.605469 10 L 11.082031 10 z"></path></svg>
					</a>';
			}

			if ( $telegram ) {
				echo '<a style="background-color: ' . $background_color . '; color: ' . $icon_color . ';" href="https://t.me/share/url?url=' . $current_url .'&text=' . urlencode($page_title).' " target="_blank">
				    	<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="48" height="48"
viewBox="0 0 24 24"
style=" fill:#000000;">    <path d="M 20.572266 3.0117188 C 20.239891 2.9764687 19.878625 3.028375 19.515625 3.171875 C 19.065625 3.348875 12.014406 6.3150313 5.4414062 9.0820312 L 3.2695312 9.9960938 C 2.4285313 10.337094 2.0039062 10.891672 2.0039062 11.638672 C 2.0039062 12.161672 2.22525 12.871063 3.28125 13.289062 L 6.9472656 14.757812 C 7.2642656 15.708813 8.0005469 17.916906 8.1855469 18.503906 C 8.2955469 18.851906 8.5733906 19.728594 9.2753906 19.933594 C 9.4193906 19.982594 9.5696563 20.007813 9.7226562 20.007812 C 10.165656 20.007812 10.484625 19.801641 10.640625 19.681641 L 12.970703 17.710938 L 15.800781 20.328125 C 15.909781 20.439125 16.486719 21 17.261719 21 C 18.228719 21 18.962234 20.195016 19.115234 19.416016 C 19.198234 18.989016 21.927734 5.2870625 21.927734 5.2890625 C 22.172734 4.1900625 21.732219 3.6199531 21.449219 3.3769531 C 21.206719 3.1694531 20.904641 3.0469688 20.572266 3.0117188 z M 19.910156 5.171875 C 19.533156 7.061875 17.478016 17.378234 17.166016 18.865234 L 13.029297 15.039062 L 10.222656 17.416016 L 11 14.375 C 11 14.375 16.362547 8.9468594 16.685547 8.6308594 C 16.945547 8.3778594 17 8.2891719 17 8.2011719 C 17 8.0841719 16.939781 8 16.800781 8 C 16.675781 8 16.506016 8.1197812 16.416016 8.1757812 C 15.272669 8.8885973 10.404094 11.662239 8.0078125 13.025391 L 4.53125 11.636719 L 6.21875 10.927734 C 10.51775 9.1177344 18.174156 5.893875 19.910156 5.171875 z"></path></svg>
				    </a>';
			}

			if ( $email ) {
				echo '<a style="background-color: ' . $background_color . '; color: ' . $icon_color . ';" href="mailto:?subject=' . urlencode($page_title) . '&body=' . $current_url . '">
				      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="40" height="48"><title>Share via Email</title><path d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"/></svg>
				    </a>';
			}

			

		echo '</div>';


		// WordPress core after_widget hook
		echo $after_widget;
	}

}

// Register the widget
function register_simple_share_widget() {
	register_widget( 'simple_share_widget_function' );
}
add_action( 'widgets_init', 'register_simple_share_widget' );

// add css to front-end
function simple_share_widget_enqueue_styles() {
    wp_enqueue_style( 'simple_share_widget_enqueue_styles', plugins_url( '/style.css', __FILE__ ) );
}
add_action('wp_enqueue_scripts', 'simple_share_widget_enqueue_styles');
