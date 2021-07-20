<?php
/**
 * Social Links Elementor widget.
 *
 * @package Mm
 */

namespace Mm\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Control_Media;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;

/**
 * Class Mm_Social
 *
 * @package Mm/Widgets
 */
class Mm_Social extends Widget_Base {
	/**
	 * Widget unique name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'mm-social';
	}

	/**
	 * Widget title.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Social Links', 'mm' );
	}

	/**
	 * Widget icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-share';
	}

	/**
	 * Get widget keywords.
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'social', 'link' );
	}

	/**
	 * Widget category.
	 * Append widget to Mm category.
	 *
	 * @return string[]
	 */
	public function get_categories() {
		return array( 'mm' );
	}

	/**
	 * Widget controls.
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_links',
			array(
				'label' => esc_html__( 'Social Links', 'mm' ),
			)
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			array(
				'label'       => esc_html__( 'Title', 'mm' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'mm' ),
				'label_block' => true,
			)
		);

		$repeater->add_control(
			'image',
			array(
				'label'   => esc_html__( 'Image', 'mm' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => array(
					'active' => true,
				),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'link',
			array(
				'label'       => esc_html__( 'Link', 'mm' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => array(
					'active' => true,
				),
				'placeholder' => esc_html__( 'https://your-link.com', 'mm' ),
				'separator'   => 'before',
			)
		);

		$repeater->add_control(
			'text_color',
			array(
				'label' => esc_html__( 'Text Color', 'mm' ),
				'type'  => Controls_Manager::COLOR,
			)
		);

		$this->add_control(
			'links',
			array(
				'label'       => esc_html__( 'Links', 'alpio' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render social widget output on the frontend.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$links = $settings['links'];

		if ( ! empty( $links ) && count( $links ) > 0 ) {
			?>
			<ul class="mm-social-links">
				<?php foreach ( $links as $social_link ) : ?>
					<li>
						<?php
						$target   = $social_link['link']['is_external'] ? ' target="_blank"' : '';
						$nofollow = $social_link['link']['nofollow'] ? ' rel="nofollow"' : '';
						?>
						<a
							href="<?php echo esc_url( $social_link['link']['url'] ); ?>"
							<?php echo $target . $nofollow; // phpcs:ignore WordPress.Security.EscapeOutput ?>
							style="color: <?php echo sanitize_hex_color( $social_link['text_color'] ); ?>">
							<?php echo wp_get_attachment_image( $social_link['image']['id'], 'full' ); ?>
							<span><?php echo esc_html( $social_link['title'] ); ?></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php
		}
	}
}
