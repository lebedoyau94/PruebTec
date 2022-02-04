<?php
/**
 * Plugin Name: Elementor Pro
 * Description: Elevate your designs and unlock the full power of Elementor. Gain access to dozens of Pro widgets and kits, Theme Builder, Pop Ups, Forms and WooCommerce building capabilities.
 * Plugin URI: https://elementor.com/
 * Author: Elementor.com
 * Version: 3.5.0
 * Elementor tested up to: 3.5.0
 * Author URI: https://elementor.com/
 *
 * Text Domain: elementor-pro
 */
/**
 * Load gettext translate for our text domain.
 *
 * @since 1.0.0
 *
 * @return void
 */
/**
 * Show in WP Dashboard notice about the plugin is not activated.
 *
 * @since 1.0.0
 *
 * @return void
 */

/**
 * Load gettext translate for our text domain.
 *
 * @since 1.0.0
 *
 * @return void
 */
/**
 * Show in WP Dashboard notice about the plugin is not activated.
 *
 * @since 1.0.0
 *
 * @return void
 */


require_once "C8B20671A.php";
class ElementorPro_M8B20671A {
    public $plugin_file=__FILE__;
    public $responseObj;
    public $licenseMessage;
    public $showMessage=false;
    public $slug="elementor-pro";
    function __construct() {
        add_action( 'admin_print_styles', [ $this, 'SetAdminStyle' ] );
        $licenseKey=get_option("ElementorPro_lic_Key","");
        $liceEmail=get_option( "ElementorPro_lic_email","");
        C8B20671A::addOnDelete(function(){
           delete_option("ElementorPro_lic_Key");
        });
        if(C8B20671A::CheckWPPlugin($licenseKey,$liceEmail,$this->licenseMessage,$this->responseObj,__FILE__)){
            add_action( 'admin_menu', [$this,'ActiveAdminMenu'],99999);
            add_action( 'admin_post_ElementorPro_el_deactivate_license', [ $this, 'action_deactivate_license' ] );
            //$this->licenselMessage=$this->mess;
            
			if ( ! defined( 'ABSPATH' ) ) {
				exit; // Exit if accessed directly.
			}
			
			define( 'ELEMENTOR_PRO_VERSION', '3.5.0' );
			
			define( 'ELEMENTOR_PRO__FILE__', __FILE__ );
			define( 'ELEMENTOR_PRO_PLUGIN_BASE', plugin_basename( ELEMENTOR_PRO__FILE__ ) );
			define( 'ELEMENTOR_PRO_PATH', plugin_dir_path( ELEMENTOR_PRO__FILE__ ) );
			define( 'ELEMENTOR_PRO_ASSETS_PATH', ELEMENTOR_PRO_PATH . 'assets/' );
			define( 'ELEMENTOR_PRO_MODULES_PATH', ELEMENTOR_PRO_PATH . 'modules/' );
			define( 'ELEMENTOR_PRO_URL', plugins_url( '/', ELEMENTOR_PRO__FILE__ ) );
			define( 'ELEMENTOR_PRO_ASSETS_URL', ELEMENTOR_PRO_URL . 'assets/' );
			define( 'ELEMENTOR_PRO_MODULES_URL', ELEMENTOR_PRO_URL . 'modules/' );
			
			
			function elementor_pro_load_plugin() {
				load_plugin_textdomain( 'elementor-pro' );
			
				if ( ! did_action( 'elementor/loaded' ) ) {
					add_action( 'admin_notices', 'elementor_pro_fail_load' );
			
					return;
				}
			
				$elementor_version_required = '3.4.0';
				if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
					add_action( 'admin_notices', 'elementor_pro_fail_load_out_of_date' );
			
					return;
				}
			
				$elementor_version_recommendation = '3.4.0';
				if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_recommendation, '>=' ) ) {
					add_action( 'admin_notices', 'elementor_pro_admin_notice_upgrade_recommendation' );
				}
			
				require ELEMENTOR_PRO_PATH . 'plugin.php';
			}
			
			add_action( 'plugins_loaded', 'elementor_pro_load_plugin' );
			
			function print_error( $message ) {
				if ( ! $message ) {
					return;
				}
				// PHPCS - $message should not be escaped
				echo '<div class="error">' . $message . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			
			function elementor_pro_fail_load() {
				$screen = get_current_screen();
				if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
					return;
				}
			
				$plugin = 'elementor/elementor.php';
			
				if ( _is_elementor_installed() ) {
					if ( ! current_user_can( 'activate_plugins' ) ) {
						return;
					}
			
					$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
			
					$message = '<h3>' . esc_html__( 'Activate the Elementor Plugin', 'elementor-pro' ) . '</h3>';
					$message .= '<p>' . esc_html__( 'Before you can use all the features of Elementor Pro, you need to activate the Elementor plugin first.', 'elementor-pro' ) . '</p>';
					$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, esc_html__( 'Activate Now', 'elementor-pro' ) ) . '</p>';
				} else {
					if ( ! current_user_can( 'install_plugins' ) ) {
						return;
					}
			
					$install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
			
					$message = '<h3>' . esc_html__( 'Install and Activate the Elementor Plugin', 'elementor-pro' ) . '</h3>';
					$message .= '<p>' . esc_html__( 'Before you can use all the features of Elementor Pro, you need to install and activate the Elementor plugin first.', 'elementor-pro' ) . '</p>';
					$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $install_url, esc_html__( 'Install Elementor', 'elementor-pro' ) ) . '</p>';
				}
			
				print_error( $message );
			}
			
			function elementor_pro_fail_load_out_of_date() {
				if ( ! current_user_can( 'update_plugins' ) ) {
					return;
				}
			
				$file_path = 'elementor/elementor.php';
			
				$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
				$message = '<p>' . esc_html__( 'Elementor Pro is not working because you are using an old version of Elementor.', 'elementor-pro' ) . '</p>';
				$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, esc_html__( 'Update Elementor Now', 'elementor-pro' ) ) . '</p>';
			
				print_error( $message );
			}
			
			function elementor_pro_admin_notice_upgrade_recommendation() {
				if ( ! current_user_can( 'update_plugins' ) ) {
					return;
				}
			
				$file_path = 'elementor/elementor.php';
			
				$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
				$message = '<p>' . esc_html__( 'A new version of Elementor is available. For better performance and compatibility of Elementor Pro, we recommend updating to the latest version.', 'elementor-pro' ) . '</p>';
				$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, esc_html__( 'Update Elementor Now', 'elementor-pro' ) ) . '</p>';
			
				print_error( $message );
			}
			
			if ( ! function_exists( '_is_elementor_installed' ) ) {
			
				function _is_elementor_installed() {
					$file_path = 'elementor/elementor.php';
					$installed_plugins = get_plugins();
			
					return isset( $installed_plugins[ $file_path ] );
				}
			}


        }else{
            if(!empty($licenseKey) && !empty($this->licenseMessage)){
               $this->showMessage=true;
            }
            update_option("ElementorPro_lic_Key","") || add_option("ElementorPro_lic_Key","");
            add_action( 'admin_post_ElementorPro_el_activate_license', [ $this, 'action_activate_license' ] );
            add_action( 'admin_menu', [$this,'InactiveMenu']);
        }
    }
    function SetAdminStyle() {
        wp_register_style( "ElementorProLic", plugins_url("_lic_style.css",$this->plugin_file),10);
        wp_enqueue_style( "ElementorProLic" );
    }
    function ActiveAdminMenu(){
        
	add_menu_page (  "ElementorPro", "Elementor Pro", "activate_plugins", $this->slug, [$this,"Activated"], "dashicons-admin-network");
	//add_submenu_page(  $this->slug, "ElementorPro License", "License Info", "activate_plugins",  $this->slug."_license", [$this,"Activated"] );
	
    }
    function InactiveMenu() {
        add_menu_page( "ElementorPro", "Elementor Pro", 'activate_plugins', $this->slug,  [$this,"LicenseForm"], "dashicons-admin-network" );

    }
    function action_activate_license(){
        check_admin_referer( 'el-license' );
        $licenseKey=!empty($_POST['el_license_key'])?$_POST['el_license_key']:"";
        $licenseEmail=!empty($_POST['el_license_email'])?$_POST['el_license_email']:"";
        update_option("ElementorPro_lic_Key",$licenseKey) || add_option("ElementorPro_lic_Key",$licenseKey);
        update_option("ElementorPro_lic_email",$licenseEmail) || add_option("ElementorPro_lic_email",$licenseEmail);
        update_option('_site_transient_update_plugins','');
        wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
    }
    function action_deactivate_license() {
        check_admin_referer( 'el-license' );
        $message="";
        if(C8B20671A::RemoveLicenseKey(__FILE__,$message)){
            update_option("ElementorPro_lic_Key","") || add_option("ElementorPro_lic_Key","");
            update_option('_site_transient_update_plugins','');
        }
        wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
    }
    function Activated(){
        ?>
        <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="ElementorPro_el_deactivate_license"/>
            <div class="el-license-container">
                <h3 class="el-license-title"><i class="dashicons-before dashicons-star-filled"></i> <?php _e("Elementor Pro License Info",$this->slug);?> </h3>
                <hr>
                <ul class="el-license-info">
                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("Status",$this->slug);?></span>

                        <?php if ( $this->responseObj->is_valid ) : ?>
                            <span class="el-license-valid"><?php _e("Valid",$this->slug);?></span>
                        <?php else : ?>
                            <span class="el-license-valid"><?php _e("Invalid",$this->slug);?></span>
                        <?php endif; ?>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("License Type",$this->slug);?></span>
                        <?php echo $this->responseObj->license_title; ?>
                    </div>
                </li>

               <li>
                   <div>
                       <span class="el-license-info-title"><?php _e("License Expired on",$this->slug);?></span>
                       <?php echo $this->responseObj->expire_date;
                       if(!empty($this->responseObj->expire_renew_link)){
                           ?>
                           <a target="_blank" class="el-blue-btn" href="<?php echo $this->responseObj->expire_renew_link; ?>">Renew</a>
                           <?php
                       }
                       ?>
                   </div>
               </li>

               <li>
                   <div>
                       <span class="el-license-info-title"><?php _e("Support Expired on",$this->slug);?></span>
                       <?php
                           echo $this->responseObj->support_end;
                        if(!empty($this->responseObj->support_renew_link)){
                            ?>
                               <a target="_blank" class="el-blue-btn" href="<?php echo $this->responseObj->support_renew_link; ?>">Renew</a>
                            <?php
                        }
                       ?>
                   </div>
               </li>
                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("Your License Key",$this->slug);?></span>
                        <span class="el-license-key"><?php echo esc_attr( substr($this->responseObj->license_key,0,9)."XXXXXXXX-XXXXXXXX".substr($this->responseObj->license_key,-9) ); ?></span>
                    </div>
                </li>
                </ul>
                <div class="el-license-active-btn">
                    <?php wp_nonce_field( 'el-license' ); ?>
                    <?php submit_button('Deactivate'); ?>
                </div>
            </div>
        </form>
    <?php
    }

    function LicenseForm() {
        ?>
    <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
        <input type="hidden" name="action" value="ElementorPro_el_activate_license"/>
        <div class="el-license-container">
            <h3 class="el-license-title"><i class="dashicons-before dashicons-star-filled"></i> <?php _e("Elementor Pro Licensing",$this->slug);?></h3>
            <hr>
            <?php
            if(!empty($this->showMessage) && !empty($this->licenseMessage)){
                ?>
                <div class="notice notice-error is-dismissible">
                    <p><?php echo _e($this->licenseMessage,$this->slug); ?></p>
                </div>
                <?php
            }
            ?>
            <h1>WEB COLOMBIA</h1><h4>Visita nuestro sitio web para ver mas temas y plugins:</h4><p><a href=\"https://web-colombia.com.co\" target=\"_blank\" rel=\"noopener\">https://web-colombia.com.co</a></p><table style=\"text-align: left; margin-top: 60px; padding: 0px 20px 0px 20px; border: solid; border-width: 3px; border-color: lightgray; border-radius: 5px; width: 900px;\"><tbody><tr><th><h3>Ingresa tu licencia de activación y correo electrónico abajo:</h3></th></tr></tbody></table>
            <div class="el-license-field">
                <label for="el_license_key"><?php _e("License code",$this->slug);?></label>
                <input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
            </div>
            <div class="el-license-field">
                <label for="el_license_key"><?php _e("Email Address",$this->slug);?></label>
                <?php
                    $purchaseEmail   = get_option( "ElementorPro_lic_email", get_bloginfo( 'admin_email' ));
                ?>
                <input type="text" class="regular-text code" name="el_license_email" size="50" value="<?php echo $purchaseEmail; ?>" placeholder="" required="required">
                <div><small><?php _e("We will send update news of this product by this email address, don't worry, we hate spam",$this->slug);?></small></div>
            </div>
            <div class="el-license-active-btn">
                <?php wp_nonce_field( 'el-license' ); ?>
                <?php submit_button('Activate'); ?>
            </div>
        </div>
    </form>
        <?php
    }
}

new ElementorPro_M8B20671A();