<?php 
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class jewel_store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function jewel_store_get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->jewel_store_setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function jewel_store_setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'jewel_store_sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'jewel_store_enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function jewel_store_sections( $manager ) {

		// Load custom sections.
		get_template_part( 'customize-pro/section', 'pro' );

		// Register custom section types.
		$manager->register_section_type( 'jewel_store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new jewel_store_Customize_Section_Pro(
				$manager,
				'jewel-store',
				array(
					'title'    => esc_html__( 'Upgrade to Pro', 'jewel-store' ),
					'pro_text' => esc_html__( 'Upgrade Now', 'jewel-store' ),
					'pro_url'  => 'https://netnus.com/product/jewel-pro-wordpress-theme-for-multipurpose/',
					'priority'   => 1,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function jewel_store_enqueue_control_scripts() {

		wp_enqueue_script( 'jewel-store-customize-controls', trailingslashit( get_template_directory_uri() ) . 'customize-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'jewel-store-customize-controls', trailingslashit( get_template_directory_uri() ) . 'customize-pro/customize-controls.css' );
	}
}

// Doing this customizer thang!
jewel_store_Customize::jewel_store_get_instance();