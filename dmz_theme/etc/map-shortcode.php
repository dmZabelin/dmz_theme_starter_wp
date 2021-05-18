<?php

if ( !function_exists( 'dmz_google_map' ) ) 
{
	function dmz_google_map( $atts, $content = null ) 
	{
		 extract( shortcode_atts( [
			  'lat'   => true,
			  'long'   => true,
			  'zoom'   => 18,
			  'widht'  => '100%',
			  'height'    => 'auto',
		 ], $atts ) );

		 $latitude = $atts['lat'];
		 $longitude = $atts['long'];
		 $zoom = $atts['zoom'];

		 if( $latitude && $longitude ) :

			  $map_id = 'map';

			  ob_start(); ?>

			  <div class="contacts-map" id="<?php echo esc_attr( $map_id ); ?>" style="height: <?php echo esc_attr( $atts['height'] ); ?>; width: <?php echo esc_attr( $atts['width'] ); ?>"></div>
			  <script type="text/javascript">

					function initMap() {
						 <?php  $marker = esc_url( get_template_directory_uri() . '/assets/img/marker.png' ); ?>

						 var local = { lat:<?php echo $latitude; ?>, lng:<?php echo $longitude; ?> };
						 var map = new google.maps.Map(document.getElementById('<?php echo esc_attr( $map_id ); ?>'), {
							  zoom: <?php echo $zoom; ?> ,
							  center: local
						 } );
						 var marker = new google.maps.Marker( {
							  position: local,
							  map: map,
							  animation: google.maps.Animation.BOUNCE,
							  icon: '<?php echo $marker; ?>'
						 } );
					}

			  </script>

		 <?php
			  wp_print_scripts( 'google-maps-api' );
		 endif;

		 return ob_get_clean();

	}
	add_shortcode( 'dmz_google_map', 'dmz_google_map' );


	//Loads Google Map API
	function dmz_map_load_scripts() 
	{
		wp_register_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA7fOr4hUJ-VG92YPty5fCkdnYtTeqZ7Ro&callback=initMap' );
	}
	add_action( 'wp_enqueue_scripts', 'dmz_map_load_scripts' );
}