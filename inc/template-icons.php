<?php
/**
 * Template svg icons.
 *
 * @package Monkey Munchy
 */

/**
 * Print icon svg content.
 *
 * @param string $icon Icon name.
 */
function mm_icon( $icon ) {
	switch ( $icon ) {
		case 'bars':
			?>
			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="22" viewBox="0 0 25 22">
				<path id="bars-solid" d="M.893,64.041H24.107a.9.9,0,0,0,.893-.9V60.9a.9.9,0,0,0-.893-.9H.893A.9.9,0,0,0,0,60.9v2.245A.9.9,0,0,0,.893,64.041Zm0,8.98H24.107a.9.9,0,0,0,.893-.9V69.878a.9.9,0,0,0-.893-.9H.893a.9.9,0,0,0-.893.9v2.245A.9.9,0,0,0,.893,73.02Zm0,8.98H24.107A.9.9,0,0,0,25,81.1V78.857a.9.9,0,0,0-.893-.9H.893a.9.9,0,0,0-.893.9V81.1A.9.9,0,0,0,.893,82Z" transform="translate(0 -60)" fill="#fff"/>
			</svg>
			<?php
			break;
	}
}
