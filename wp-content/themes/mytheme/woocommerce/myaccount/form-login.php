<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


?>

<section class="my_account_area pt--80 pb--55 bg--white">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-12">
				<div class="my__account__wrapper">
					<h3 class="account__title">Login</h3>
					<form class="" method="post">
						<div class="account__form">
							<div class="input__box">
								<label for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
								<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																			?>
							</div>
							<div class="input__box">
								<label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
								<input type="password" name="password" id="password" autocomplete="current-password" />
							</div>


							<?php do_action('woocommerce_login_form'); ?>

							<div class="form__btn">
								<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
								<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>

								<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
									<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
								</label>
							</div>

							<a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="forget_pass"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>

						</div>


					</form>
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="my__account__wrapper">
					<h3 class="account__title">Register</h3>


					<form method="post" class="" <?php do_action('woocommerce_register_form_tag'); ?>>

						<div class="account__form">

							<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

								<div class="input__box"> <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																					?>
								</div>

							<?php endif; ?>

							<div class="input__box">
								<label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
								<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																	?>
							</div>

							<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

								<div class="input__box">
									<label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
									<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
								</div>

							<?php else : ?>

								<p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>

							<?php endif; ?>

							<?php do_action('woocommerce_register_form'); ?>

							<div class="form__btn">
								<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
								<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
							</div>

							<?php do_action('woocommerce_register_form_end'); ?>

						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</section>