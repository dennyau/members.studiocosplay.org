<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to main-menu administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>

<!-- header -->

<div id="header_wrapper">
  <header id="header" class="clearfix">
    <div class="logo_wrap">
      <?php if ($logo): ?>
        <div id="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>"/></a></div>
      <?php endif; ?>
      <h1 id="site-title">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
        <div id="site-description"><?php print $site_slogan; ?></div>
      </h1>
    </div>
    <?php print render($page['search']) ?>
    <?php print render($page['user_menu']) ?> 
    <?php print render($page['contact_no']) ?>
  </header>
</div>

<!-- End Header -->

  <div class="menu-wrap">
    <div class="full-wrap clearfix">
      <nav id="main-menu"  role="navigation">
        <a class="nav-toggle" href="#">Navigation</a>
        <div class="menu-navigation-container">
          <?php $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
            print drupal_render($main_menu_tree);
          ?>
        </div>
        <div class="clear"></div>
      </nav>
      
    </div>
  </div>

  <div class="slideshow">
    <?php if ($is_front): ?>
      <?php print render($page['slideshow']); ?>
    <?php endif; ?>
  </div>

<div id="top-area">
  <?php if ($is_front): ?>           
    <?php if ($page['top_first'] || $page['top_second'] || $page['top_third']): ?> 
      <div class="page-wrap clearfix">
        <?php if ($page['top_first']): ?>
        <div class="column one"><?php print render($page['top_first']); ?></div>
        <?php endif; ?>
        <?php if ($page['top_second']): ?>
        <div class="column two"><?php print render($page['top_second']); ?></div>
        <?php endif; ?>
        <?php if ($page['top_third']): ?>
        <div class="column three"><?php print render($page['top_third']); ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if ($page['top_separator']): ?>
      <div class="page-wrap clearfix"><?php print render($page['top_separator']); ?></div>
    <?php endif; ?>
    <?php if ($page['top_forth'] || $page['top_fifth'] || $page['top_sixth']): ?> 
      <div class="page-wrap clearfix">
        <?php if ($page['top_forth']): ?>
        <div class="column four"><?php print render($page['top_forth']); ?></div>
        <?php endif; ?>
        <?php if ($page['top_fifth']): ?>
        <div class="column five"><?php print render($page['top_fifth']); ?></div>
        <?php endif; ?>
        <?php if ($page['top_sixth']): ?>
        <div class="column six"><?php print render($page['top_sixth']); ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  <?php endif; ?>
</div>

<div id="page-wrap">

  <?php if ($is_front): ?>
    <div class="container-wrap clearfix">
      <?php print render($page['testimonials']); ?>
    </div>
  <?php endif; ?>

  <div id="container">
    <div class="container-wrap">
      <div class="content-sidebar-wrap">
        <div id="content">

          <?php if (theme_get_setting('breadcrumbs')): ?>
            <div id="breadcrumbs">
              <?php if ($breadcrumb): print $breadcrumb; endif;?>
            </div>
          <?php endif; ?>

          <section id="post-content" role="main">
            <?php print $messages; ?>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
              <h1 class="page-title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            <?php if (!empty($tabs['#primary'])): ?>
              <div class="tabs-wrapper"><?php print render($tabs); ?></div>
            <?php endif; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>
            <?php $page['content']['system_main']['default_message'] = array(); // This will remove the 'No front page content has been created yet.'?>
            <?php print render($page['content']); ?>
          </section>
        </div>
      
        <?php if ($page['sidebar_first']): ?>
          <aside id="sidebar-first" role="complementary"><?php print render($page['sidebar_first']); ?></aside>
        <?php endif; ?>
      
        </div>

        <?php if ($page['sidebar_second']): ?>
          <aside id="sidebar-second" role="complementary"><?php print render($page['sidebar_second']); ?></aside> 
        <?php endif; ?>

    </div>
  </div>

  <?php if ($is_front): ?>

    <div id="footer_wrapper" class="footer_block bottom_widget">
      <?php if ($page['bottom_widget_1'] || $page['bottom_widget_2'] || $page['bottom_widget_3']): ?> 
        <div id="footer-area" class="full-wrap clearfix">
          <?php if ($page['bottom_widget_1']): ?>
          <div class="column"><?php print render($page['bottom_widget_1']); ?></div>
          <?php endif; ?>
          <?php if ($page['bottom_widget_2']): ?>
          <div class="column two"><?php print render($page['bottom_widget_2']); ?></div>
          <?php endif; ?>
          <?php if ($page['bottom_widget_3']): ?>
          <div class="column"><?php print render($page['bottom_widget_3']); ?></div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>

  <?php endif; ?>

</div>


<!-- Footer -->

<div id="footer">

  <?php if ($page['footer_first']): ?> 
    <div id="footer-area" class="full-wrap clearfix">
      <?php if ($page['footer_first']): ?>
      <div class="column"><?php print render($page['footer_first']); ?></div>
      <?php endif; ?>
      <?php if ($page['footer_second']): ?>
      <div class="column two"><?php print render($page['footer_second']); ?></div>
      <?php endif; ?>
      <?php if ($page['footer_third']): ?>
      <div class="column"><?php print render($page['footer_third']); ?></div>
      <?php endif; ?>
      <?php if ($page['footer_forth']): ?>
      <div class="column"><?php print render($page['footer_forth']); ?></div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <div id="mc_embed_signup" class="credits">
    <form action="//StudioCosplay.us12.list-manage.com/subscribe/post?u=006154eedadc6dadd43174bba&amp;id=20f6149d2e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
      <div id="mc_embed_signup_scroll">
        <h1>We &lt;3 you, talk to us!</h1>
        <p>Have a great idea or a question? We'd love to hear it!</p>
        <p>Email us at <a href="mailto:contactus@studiocosplay.org" target="_target">contactus@studiocosplay.org</a> or use the form below to join our mailing list.</p>
        <div class="mc-field-group">
          <label for="mce-EMAIL">Email Address</label>
          <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="&#xf0e0; required.field@email.com">
        </div>
        <div class="mc-field-group">
          <label for="mce-FNAME">First Name </label>
          <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
        </div>
        <div class="mc-field-group">
          <label for="mce-LNAME">Last Name </label>
          <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
        </div>
        <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
        </div>
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_006154eedadc6dadd43174bba_20f6149d2e" tabindex="-1" value=""></div>
        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
      </div>
    </form>
  </div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
<script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
  <div class="footer_credit">
      
    <div id="copyright" class="full-wrap clearfix">
      <div class="copyright">&copy; <?php echo date("Y"); ?> <?php print $site_name; ?>. All Rights Reserved.</div> 
      
      <!-- Social Links -->
        
      <?php if (theme_get_setting('social_links')): ?>
        <span class="social-icons">
         <ul>
          <li><a class="fb" href="<?php echo theme_get_setting('facebook_profile_url'); ?>" target="_blank" rel="me"><i class="fa fa-facebook"></i></a></li>
          <li><a class="twitter" href="<?php echo theme_get_setting('twitter_profile_url'); ?>" target="_blank" rel="me"><i class="fa fa-twitter"></i></a></li>
          <li><a class="instagram" href="<?php echo theme_get_setting('instagram_profile_url'); ?>" target="_blank" rel="me"><i class="fa fa-instagram"></i></a></li>
          <li><a class="gplus" href="<?php echo theme_get_setting('gplus_profile_url'); ?>" target="_blank" rel="me"><i class="fa fa-google-plus"></i></a></li>
          <li><a class="linkedin" href="<?php echo theme_get_setting('linkedin_profile_url'); ?>" target="_blank" rel="me"><i class="fa fa-linkedin"></i></a></li>
          <li><a class="pinterest" href="<?php echo theme_get_setting('pinterest_profile_url'); ?>" target="_blank" rel="me"><i class="fa fa-pinterest"></i></a></li>
          <li><a class="youtube" href="<?php echo theme_get_setting('youtube_profile_url'); ?>" target="_blank" rel="me"><i class="fa fa-youtube"></i></a></li>
          <li><a class="email" href="<?php echo theme_get_setting('email_address'); ?>" target="_blank" rel="me"><i class="fa fa-envelope"></i></a></li>
          
         </ul>
        </span>
      <?php endif; ?>
      <!-- End Social Links -->

    </div>

  </div>

</div>
