<?php

	// add shortcode to show the portfolio skills (using for amenitities)
	if (!function_exists('whf_port_skills')) {
		add_shortcode('property_amenities', 'wfh_port_skills');

		function wfh_port_skills($atts) {
			$atts = shortcode_atts( array(
					'propID' => get_the_ID(),
				), $atts );
			$out_html = "";
			$terms = get_the_terms($prpoID, 'portfolio_skills');
			if ($terms && !is_wp_error($terms ) ) {
				$out_html .= '<ul class="wfp-amenities-list">';
				foreach ($terms as $amenity) {
					$out_html .= '<li class="wfp-amenity">';
					$out_html .= '<div class="amenity-desc">'.$amenity->description.'</div>';
					$out_html .= '<span class="amenity-name">'.esc_html( $amenity->name ).'</span>';
					$out_html .= '</li>';
				}
				$out_html .= '</ul>';
			}
			return $out_html;
		}
	}
