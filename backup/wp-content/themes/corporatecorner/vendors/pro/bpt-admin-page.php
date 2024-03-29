<?php
/**
 * Businessline Admin Class.
 *
 * @author  BuyProTheme
 * @package corporatecorner
 * @since   1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'bpt_Admin' ) ) :

/**
 * bpt_Admin Class.
 */
class bpt_Admin {

	private $TextDomain = 'corporatecorner';
	private $ThemeInfoUrl = '//www.buyprotheme.com/product/corporatecorner';
	private $ViewProVersionUrl = '//www.buyprotheme.com/product/corporatecorner-pro/';
	private $RatingUrl = 'http://wordpress.org/support/view/theme-reviews/corporatecorner?filter=5#postform';

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'hide_notices' ) );
		add_action( 'load-themes.php', array( $this, 'admin_notice' ) );
	}

	/**
	 * Add admin menu.
	 */
	public function admin_menu() {
		$theme = wp_get_theme( get_template() );

		$page = add_theme_page( esc_html__( 'About', 'corporatecorner' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'About', 'corporatecorner' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'welcome', array( $this, 'welcome_screen' ) );
		add_action( 'admin_print_styles-' . $page, array( $this, 'enqueue_styles' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'corporatecorner-welcome', get_template_directory_uri() . '/vendors/pro/welcome.css', array(), '1.0' );
	}

	/**
	 * Add admin notice.
	 */
	public function admin_notice() {
		global $pagenow;

		wp_enqueue_style( 'corporatecorner-message', get_template_directory_uri() . '/vendors/pro/message.css', array(), '1.0' );

		// Let's bail on theme activation.
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
			update_option( 'bpt_admin_notice_welcome', 1 );

		// No option? Let run the notice wizard again..
		} elseif( ! get_option( 'bpt_admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
		}
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function hide_notices() {
		if ( isset( $_GET['corporatecorner-hide-notice'] ) && isset( $_GET['_corporatecorner_notice_nonce'] ) ) {
			if (isset( $_POST['_corporatecorner_notice_nonce'] ) && ! wp_verify_nonce( wp_unslash($_GET['_corporatecorner_notice_nonce']), 'corporatecorner_hide_notices_nonce' ) ) {
				/* translators: %s: plugin name. */
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'corporatecorner' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) 
			/* translators: %s: plugin name. */{
				wp_die( esc_html__( 'Cheatin&#8217; huh?', 'corporatecorner' ) );
			}

			$hide_notice = sanitize_text_field( wp_unslash( $_GET['corporatecorner-hide-notice'] ) );
			update_option( 'bpt_admin_notice_' . $hide_notice, 1 );
		}
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice() {
		?>
		<div id="message" class="updated cresta-message">
			<a class="cresta-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'corporatecorner-hide-notice', 'welcome' ) ), 'corporatecorner_hide_notices_nonce', '_corporatecorner_notice_nonce' ) ); ?>"><?php  /* translators: %s: plugin name. */ esc_html__( 'Dismiss', 'corporatecorner' ); ?></a>
			<p><?php printf( /* translators: %s: plugin name. */  esc_html__( 'Welcome! Thank you for choosing corporatecorner! To fully take advantage of the best our theme can offer please make sure you visit our %1$swelcome page%2$s.', 'corporatecorner' ), '<a href="' . esc_url( admin_url( 'themes.php?page=welcome' ) ) . '">', '</a>' ); ?></p>
			<p class="submit">
				<a class="button-secondary" href="<?php echo esc_url( admin_url( 'themes.php?page=welcome' ) ); ?>"><?php echo esc_html__( 'Get started with corporatecorner', 'corporatecorner' ); ?></a>
			</p>
		</div>
		<?php
	}

	/**
	 * Intro text/links shown to all about pages.
	 *
	 * @access private
	 */
	private function intro() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="cresta-theme-info">
				<h1>
					<?php echo esc_html__('About', 'corporatecorner'); ?>
					<?php echo esc_html( $theme->get( 'Name' )) ." ". esc_html( $theme->get( 'Version' ) ); ?>
				</h1>

			<div class="welcome-description-wrap">
				<div class="about-text"><?php echo esc_html( $theme->display( 'Description' ) ); ?>
				<p class="cresta-actions">
					<a href="<?php echo esc_url_raw( $this->ThemeInfoUrl ); ?>" class="button button-secondary" target="_blank"><?php echo esc_html__( 'Theme Info', 'corporatecorner' ); ?></a>

					<a href="<?php echo esc_url_raw( apply_filters( 'corporatecorner_pro_theme_url', $this->ViewProVersionUrl ) ); ?>" class="button button-primary docs" target="_blank"><?php echo esc_html__( 'View PRO version Demo', 'corporatecorner' ); ?></a>

					<a href="<?php echo esc_url_raw( apply_filters( 'corporatecorner_pro_theme_url', $this->RatingUrl ) ); ?>" class="button button-secondary docs" target="_blank"><?php echo esc_html__( 'Rate this theme', 'corporatecorner' ); ?></a>
				</p>
				</div>

				<div class="cresta-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" />
				</div>
			</div>
		</div>

		<h2 class="nav-tab-wrapper">
			
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php echo esc_html__( 'Free Vs PRO', 'corporatecorner' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'changelog' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'welcome', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>">
				<?php echo esc_html__( 'Changelog', 'corporatecorner' ); ?>
			</a>
		</h2>
		<?php
	}

	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
		$tabs_data = isset( $_GET['tab']  ) ? sanitize_title( wp_unslash( $_GET['tab'] ) ) : '';
		$current_tab = empty( $tabs_data ) ? /* translators: About. */ esc_html('about','corporatecorner') : $tabs_data;

		// Look for a {$current_tab}_screen method.
		if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
			return $this->{ $current_tab . '_screen' }();
		}

		// Fallback to about screen.
		return $this->about_screen();
	}

	/**
	 * Output the about screen.
	 */
	public function about_screen() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<div class="changelog point-releases">
				<div class="under-the-hood two-col">
					<div class="col">
						<h4><?php echo esc_html__( 'Theme Customizer', 'corporatecorner' ); ?></h4>
						<p><?php echo esc_html__( 'All Theme Options are available via Customize screen.', 'corporatecorner' ) ?></p>
						<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-secondary"><?php /* translators: %s: plugin name. */ echo esc_html__( 'Customize', 'corporatecorner' ); ?></a></p>
					</div>

					<div class="col">
						<h4><?php echo esc_html__( 'Got theme support question?', 'corporatecorner' ); ?></h4>
						<p><?php echo esc_html__( 'Please put it in our support forum.', 'corporatecorner' ) ?></p>
						<p><a target="_blank" href="<?php echo esc_url_raw( 'http://www.buyprotheme.com/support/' ); ?>" class="button button-secondary"><?php echo esc_html__( 'Support', 'corporatecorner' ); ?></a></p>
					</div>

					<div class="col">
						<h4><?php echo esc_html__( 'Need more features?', 'corporatecorner' ); ?></h4>
						<p><?php echo esc_html__( 'Upgrade to PRO version for more exciting features.', 'corporatecorner' ) ?></p>
						<p><a target="_blank" href="<?php echo esc_url_raw( $this->ViewProVersionUrl ); ?>" class="button button-secondary"><?php echo esc_html__( 'Info about PRO version', 'corporatecorner' ); ?></a></p>
					</div>

					
				</div>
			</div>

			<div class="return-to-dashboard cresta">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html__( 'Return to Updates', 'corporatecorner' ) : esc_html__( 'Return to Dashboard &rarr; Updates', 'corporatecorner' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html__( 'Go to Dashboard &rarr; Home', 'corporatecorner' ) : esc_html__( 'Go to Dashboard', 'corporatecorner' ); ?></a>
			</div>
		</div>
		<?php
	}

		/**
	 * Output the changelog screen.
	 */
	public function changelog_screen() {
		global $wp_filesystem;

		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<p class="about-description"><?php echo esc_html__( 'View changelog below:', 'corporatecorner' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'corporatecorner_changelog_file', get_template_directory() . '/readme.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = $this->parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
		<?php
	}

	/**
	 * Parse changelog from readme file.
	 * @param  string $content
	 * @return string
	 */
	private function parse_changelog( $content ) {
		$matches   = null;
		$regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
		$changelog = '';

		if ( preg_match( $regexp, $content, $matches ) ) {
			$changes = explode( '\r\n', trim( $matches[1] ) );

			$changelog .= '<pre class="changelog">';

			foreach ( $changes as $index => $line ) {
				$changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
			}

			$changelog .= '</pre>';
		}

		return wp_kses_post( $changelog );
	}

	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<p class="about-description"><?php echo esc_html__( 'Upgrade to PRO version for more exciting features.', 'corporatecorner' ); ?></p>

			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h4><?php echo esc_html__('Features', 'corporatecorner'); ?></h4></th>
						<th width="25%"><h4><?php echo esc_html__('Free version', 'corporatecorner'); ?></h4></th>
						<th width="25%"><h4><?php echo esc_html__('Pro version', 'corporatecorner'); ?></h4></th>
					</tr>
				</thead>
				<tbody>
                    <tr>
						<td><h4><?php echo esc_html__('Footer Copyright Credit', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-no"></span></td>
					</tr>
                	<tr>
						<td><h4><?php echo esc_html__('24/7 Priority Support', 'corporatecorner'); ?></h4></td>
						<td><?php echo esc_html__('WP forum', 'corporatecorner'); ?></td>
						<td><?php echo esc_html__('Ticket, email , Skype & Teamviewer', 'corporatecorner'); ?></td>
					</tr>
                     <tr>
						<td><h4><?php echo esc_html__('Theme Layout', 'corporatecorner'); ?></h4></td>
						<td><?php echo esc_html__('Container', 'corporatecorner'); ?></td>
						<td><?php echo esc_html__('Container And fluid', 'corporatecorner'); ?></td>
					</tr>
                    <tr>
						<td><h4><?php echo esc_html__('Home Page Layout Options', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h4><?php echo esc_html__('Default Banner', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h4><?php echo esc_html__('Banner Widgets', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                    <tr>
						<td><h4><?php echo esc_html__('Navigation Color', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h4><?php echo esc_html__('Responsive Design', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                    <tr>
						<td><h4><?php echo esc_html__('Post format', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h4><?php echo esc_html__('Unlimited Text Color', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h4><?php echo esc_html__('Theme Color Scheme', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                    <tr>
						<td><h4><?php echo esc_html__('Custom Theme Color', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h4><?php echo esc_html__('Logo Upload', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h4><?php echo esc_html__('Choose Social Icon ', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                    <tr>
						<td><h4><?php echo esc_html__('Extended Theme Options Panel', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                     <tr>
						<td><h4><?php echo esc_html__('Styling for most of all sections', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                    <tr>
						<td><h4><?php echo esc_html__('Google Fonts Supported (500+ Fonts)', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h4><?php echo esc_html__('Custom Preloader', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                     <tr>
						<td><h4><?php echo esc_html__('Page Layout Style', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                     <tr>
						<td><h4><?php echo esc_html__('Blog Layout Style', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                     <tr>
						<td><h4><?php echo esc_html__('Blog Gird Style', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                     <tr>
						<td><h4><?php echo esc_html__('Breadcrumb', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                    <tr>
						<td><h4><?php echo esc_html__('  Footer/Copyright Section', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
                    <tr>
						<td><h4><?php echo esc_html__('WP-Admin Welcome Section', 'corporatecorner'); ?></h4></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-no"></span></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							
							<a href="<?php echo esc_url_raw( apply_filters( 'corporatecorner_pro_theme_url', $this->ThemeInfoUrl ) ); ?>" class="button button-secondary" target="_blank"><?php echo esc_html__( 'More Information', 'corporatecorner' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<?php
	}
}

endif;

return new bpt_Admin();
