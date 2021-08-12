<?php
/**
 * Night mode switcher button template.
 *
 * @package Mm
 */

?>
<label class="switch night-mode-switcher">
	<input class="switch__input" type="checkbox"<?php checked( isset( $_COOKIE['mm-night-mode'] ) && '1' === $_COOKIE['mm-night-mode'] ); ?>>
	<span class="switch__background">
	<span class="switch__toggle"><span class="switch__moon"></span></span>
	<span class="switch__stars"></span>
	<span class="switch__clouds"></span></span>
</label>
