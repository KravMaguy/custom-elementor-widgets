<?php
namespace Elementor;

class My_Widget_1 extends Widget_Base {
	
	public function get_name() {
		return 'title-subtitle';
	}
	
	public function get_title() {
		return 'SRS custom widget coded by abe';
	}
	
	public function get_icon() {
		return 'fa fa-code';
	}
	
	public function get_categories() {
		return [ 'basic' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);
		
		// $this->add_control(
		// 	'title',
		// 	[
		// 		'label' => __( 'Title', 'elementor' ),
		// 		'label_block' => true,
		// 		'type' => Controls_Manager::TEXT,
		// 		'placeholder' => __( 'Enter the name of your button', 'elementor' ),
		// 	]
		// );

		// $this->add_control(
		// 	'subtitle',
		// 	[
		// 		'label' => __( 'Sub-title', 'elementor' ),
		// 		'label_block' => true,
		// 		'type' => Controls_Manager::TEXT,
        //         'placeholder' => __( 'Enter your sub-title', 'elementor' ),
		// 	]
		// );

		// $this->add_control(
		// 	'link',
		// 	[
		// 		'label' => __( 'Link', 'elementor' ),
		// 		'type' => Controls_Manager::URL,
		// 		'placeholder' => __( 'https://your-link.com', 'elementor' ),
		// 		'default' => [
		// 			'url' => '',
		// 		]
		// 	]
		// );


		// add repeater control
		$this->add_control(
			'list',
			[
				'label' => __( 'List', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'text',
						'label' => __( 'Text', 'plugin-name' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'placeholder' => __( 'List Item', 'plugin-name' ),
						'default' => __( 'List Item', 'plugin-name' ),
					],
					[
						'name' => 'link',
						'label' => __( 'Link', 'plugin-name' ),
						'type' => \Elementor\Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-name' ),
					],
				],
				'default' => [
					[
						'text' => __( 'List Item #1', 'plugin-name' ),
						'link' => 'https://elementor.com/',
					],
					// [
					// 	'text' => __( 'List Item #2', 'plugin-name' ),
					// 	'link' => 'https://elementor.com/',
					// ],
				],
				'title_field' => '{{{ text }}}',
			]
		);



		// end repeater control




		$this->end_controls_section();
	}
	
	protected function render() {

        // $settings = $this->get_settings_for_display();
        // $url = $settings['link']['url'];
		// echo  "<a href='$url'><button class='title'>$settings[title]
		// <!--</div>		
		// <div class='subtitle'>$settings[subtitle] -->
		// </button></a>";
		 


		$settings = $this->get_settings_for_display();
		?>
		<div class="grid-buttons-wrap">
		<?php foreach ( $settings['list'] as $index => $item ) : ?>
			<button>
				<?php
				if ( ! $item['link']['url'] ) {
					echo $item['text'];
				} else {
					?><a href="<?php echo esc_url( $item['link']['url'] ); ?>"><?php echo $item['text']; ?></a><?php
				}
				?>
			</button>
		<?php endforeach; ?>
		</div>
		<?php

	}
	
	protected function _content_template() {
		?>
		<div class="grid-buttons-wrap">
		<#
		if ( settings.list ) {
			_.each( settings.list, function( item, index ) {
			#>
			<button>
				<# if ( item.link && item.link.url ) { #>
					<a href="{{{ item.link.url }}}">{{{ item.text }}}</a>
				<# } else { #>
					{{{ item.text }}}
				<# } #>
			</button>
			<#
			} );
		}
		#>
		</div>
		<?php
    }
	
	
}