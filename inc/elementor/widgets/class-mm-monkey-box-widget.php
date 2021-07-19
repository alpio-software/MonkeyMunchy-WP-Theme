<?php
/**
 * Monkey Box Elementor widget.
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
 * Class Mm_Monkey_Box
 *
 * @package Mm/Widgets
 */
class Mm_Monkey_Box extends Widget_Base {
	/**
	 * Widget unique name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'mm-monkey-box';
	}

	/**
	 * Widget title.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Monkey Box', 'mm' );
	}

	/**
	 * Widget icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-image-box';
	}

	/**
	 * Get widget keywords.
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'monkey', 'box' );
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
			'section_image',
			array(
				'label' => esc_html__( 'Monkey Box', 'mm' ),
			)
		);

		$this->start_controls_tabs( 'box_images' );
		$this->start_controls_tab(
			'image_tab',
			array(
				'label' => esc_html__( 'Image', 'mm' ),
			)
		);

		$this->add_control(
			'image',
			array(
				'label'   => esc_html__( 'Choose Image', 'mm' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => array(
					'active' => true,
				),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'      => 'thumbnail',
				'default'   => 'full',
				'separator' => 'none',
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'hover_image_tab',
			array(
				'label' => esc_html__( 'Hover Image', 'mm' ),
			)
		);

		$this->add_control(
			'hover_image',
			array(
				'label'   => esc_html__( 'Choose Image', 'mm' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => array(
					'active' => true,
				),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'      => 'hover_thumbnail',
				'default'   => 'full',
				'separator' => 'none',
			)
		);

		$this->end_controls_tab();
		$this->end_controls_tabs( 'box_images' );

		$this->add_control(
			'number',
			array(
				'label'       => esc_html__( 'Number', 'mm' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your number', 'mm' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'title_text',
			array(
				'label'       => esc_html__( 'Title & Description', 'mm' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => array(
					'active' => true,
				),
				'default'     => esc_html__( 'This is the heading', 'mm' ),
				'placeholder' => esc_html__( 'Enter your title', 'mm' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'description_text',
			array(
				'label'       => esc_html__( 'Content', 'mm' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => array(
					'active' => true,
				),
				'default'     => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'mm' ),
				'placeholder' => esc_html__( 'Enter your description', 'mm' ),
				'separator'   => 'none',
				'rows'        => 10,
				'show_label'  => false,
			)
		);

		$this->add_control(
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

		$this->add_control(
			'title_size',
			array(
				'label'   => esc_html__( 'Title HTML Tag', 'mm' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				),
				'default' => 'h3',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render monkey box widget output on the frontend.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$has_content = ! Utils::is_empty( $settings['title_text'] ) || ! Utils::is_empty( $settings['description_text'] );

		$html = '<div class="monkey-box-wrapper">';

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'link', $settings['link'] );
		}

		if ( ! empty( $settings['number'] ) ) {
			$this->add_inline_editing_attributes( 'number', 'none' );
			$this->add_render_attribute( 'number', 'class', 'monkey-box-number' );
			$html .= '<span ' . $this->get_render_attribute_string( 'number' ) . '>' . $settings['number'] . '</span>';
		}

		if ( ! empty( $settings['image']['url'] ) ) {
			$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
			$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
			$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );

			$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );

			if ( ! empty( $settings['link']['url'] ) ) {
				$image_html = '<a ' . $this->get_render_attribute_string( 'link' ) . '>' . $image_html . '</a>';
			}

			$html .= '<figure class="monkey-box-img">' . $image_html . '</figure>';
		}

		if ( ! empty( $settings['hover_image']['url'] ) ) {
			$this->add_render_attribute( 'hover_image', 'src', $settings['hover_image']['url'] );
			$this->add_render_attribute( 'hover_image', 'alt', Control_Media::get_image_alt( $settings['hover_image'] ) );
			$this->add_render_attribute( 'hover_image', 'title', Control_Media::get_image_title( $settings['hover_image'] ) );

			$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'hover_image' );

			if ( ! empty( $settings['link']['url'] ) ) {
				$image_html = '<a ' . $this->get_render_attribute_string( 'link' ) . '>' . $image_html . '</a>';
			}

			$html .= '<figure class="monkey-box-hover-img">' . $image_html . '</figure>';
		}

		if ( $has_content ) {
			$html .= '<div class="monkey-box-content">';

			if ( ! Utils::is_empty( $settings['title_text'] ) ) {
				$this->add_render_attribute( 'title_text', 'class', 'monkey-box-title' );

				$this->add_inline_editing_attributes( 'title_text', 'none' );

				$title_html = $settings['title_text'];

				if ( ! empty( $settings['link']['url'] ) ) {
					$title_html = '<a ' . $this->get_render_attribute_string( 'link' ) . '>' . $title_html . '</a>';
				}

				$html .= sprintf( '<%1$s %2$s>%3$s</%1$s>', Utils::validate_html_tag( $settings['title_size'] ), $this->get_render_attribute_string( 'title_text' ), $title_html );
			}

			if ( ! Utils::is_empty( $settings['description_text'] ) ) {
				$this->add_render_attribute( 'description_text', 'class', 'monkey-box-description' );

				$this->add_inline_editing_attributes( 'description_text' );

				$html .= sprintf( '<p %1$s>%2$s</p>', $this->get_render_attribute_string( 'description_text' ), $settings['description_text'] );
			}

			$html .= '</div>';
		}

		$html .= '</div>';

		echo $html; // phpcs:ignore WordPress.Security.EscapeOutput
	}

	/**
	 * Render monkey box widget output in the editor.
	 */
	protected function content_template() {
		?>
		<#
		var html = '<div class="monkey-box-wrapper">';

			if ( settings.image.url || settings.hover_image.url ) {
				if ( settings.image.url ) {
					var image = {
					id: settings.image.id,
					url: settings.image.url,
					size: settings.thumbnail_size,
					dimension: settings.thumbnail_custom_dimension,
					model: view.getEditModel()
					}
				};

				if ( settings.hover_image.url ) {
					var hover_image = {
					id: settings.hover_image.id,
					url: settings.hover_image.url,
					size: settings.hover_thumbnail_size,
					dimension: settings.hover_thumbnail_custom_dimension,
					model: view.getEditModel()
					}
				};

				var image_url = elementor.imagesManager.getImageUrl( image );
				var hover_image_url = elementor.imagesManager.getImageUrl( hover_image );

				var imageHtml = '<img src="' + image_url + '"/>';
				var hoverImageHtml = '<img src="' + hover_image_url + '"/>';

				if ( settings.link.url ) {
				imageHtml = '<a href="' + settings.link.url + '">' + imageHtml + '</a>';
				hoverImageHtml = '<a href="' + settings.link.url + '">' + hoverImageHtml + '</a>';
				}

				if ( settings.number ) {
				view.addInlineEditingAttributes( 'number', 'none' );
				view.addRenderAttribute( 'number', 'class', 'monkey-box-number' );
				html += '<span  ' + view.getRenderAttributeString( 'number' ) + '>' + settings.number + '</span>';
				}

				html += '<figure class="monkey-box-img">' + imageHtml + '</figure>';
				html += '<figure class="monkey-box-hover-img">' + hoverImageHtml + '</figure>';
			}

			var hasContent = !! ( settings.title_text || settings.description_text );

			if ( hasContent ) {
			html += '<div class="monkey-box-content">';

				if ( settings.title_text ) {
				var title_html = settings.title_text,
				titleSizeTag = elementor.helpers.validateHTMLTag( settings.title_size );

				if ( settings.link.url ) {
				title_html = '<a href="' + settings.link.url + '">' + title_html + '</a>';
				}

				view.addRenderAttribute( 'title_text', 'class', 'monkey-box-title' );

				view.addInlineEditingAttributes( 'title_text', 'none' );

				html += '<' + titleSizeTag  + ' ' + view.getRenderAttributeString( 'title_text' ) + '>' + title_html + '</' + titleSizeTag  + '>';
			}

			if ( settings.description_text ) {
			view.addRenderAttribute( 'description_text', 'class', 'monkey-box-description' );

			view.addInlineEditingAttributes( 'description_text' );

			html += '<p ' + view.getRenderAttributeString( 'description_text' ) + '>' + settings.description_text + '</p>';
			}

			html += '</div>';
		}

		html += '</div>';

		print( html );
		#>
		<?php
	}
}
