<?php
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function studio_cosplay_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['prof_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Professional Theme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );
  $form['prof_settings']['breadcrumbs'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show breadcrumbs in a page'),
    '#default_value' => theme_get_setting('breadcrumbs','studio_cosplay'),
    '#description'   => t("Check this option to show breadcrumbs in page. Uncheck to hide."),
  );
  $form['prof_settings']['top_social_link'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social links in header'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['prof_settings']['top_social_link']['social_links'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show social icons (Facebook, Twitter and RSS) in header'),
    '#default_value' => theme_get_setting('social_links', 'studio_cosplay'),
    '#description'   => t("Check this option to show twitter, facebook, rss icons in header. Uncheck to hide."),
  );
  $form['prof_settings']['top_social_link']['email_address'] = array(
    '#type' => 'textfield',
    '#title' => t('Contact Us Email Address'),
    '#default_value' => theme_get_setting('email_address', 'studio_cosplay'),
    '#description' => t("Enter your company Email address."),
  );
  $form['prof_settings']['top_social_link']['instagram_profile_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Instagram URL'),
    '#default_value' => theme_get_setting('instagram_profile_url', 'studio_cosplay'),
    '#description' => t("Enter your Instagram profile URL."),
  );
  $form['prof_settings']['top_social_link']['twitter_profile_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter URL'),
    '#default_value' => theme_get_setting('twitter_profile_url', 'studio_cosplay'),
    '#description' => t("Enter your Twitter profile URL."),
  );
  $form['prof_settings']['top_social_link']['facebook_profile_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook URL'),
    '#default_value' => theme_get_setting('facebook_profile_url', 'studio_cosplay'),
    '#description' => t("Enter your Facebook profile URL."),
  );
  $form['prof_settings']['top_social_link']['gplus_profile_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Gplus URL'),
    '#default_value' => theme_get_setting('gplus_profile_url', 'studio_cosplay'),
    '#description' => t("Enter your Gplus profile URL."),
  );
  $form['prof_settings']['top_social_link']['linkedin_profile_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Linkedin URL'),
    '#default_value' => theme_get_setting('linkedin_profile_url', 'studio_cosplay'),
    '#description' => t("Enter your Linkedin profile URL."),
  );
  $form['prof_settings']['top_social_link']['pinterest_profile_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Pinterest URL'),
    '#default_value' => theme_get_setting('pinterest_profile_url', 'studio_cosplay'),
    '#description' => t("Enter your Linkedin Pinterest URL."),
  );
  $form['prof_settings']['top_social_link']['youtube_profile_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Youtube URL'),
    '#default_value' => theme_get_setting('youtube_profile_url', 'studio_cosplay'),
    '#description' => t("Enter your Youtube profile URL."),
  );
}


