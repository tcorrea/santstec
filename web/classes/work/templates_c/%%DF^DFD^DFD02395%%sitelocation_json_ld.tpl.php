<?php /* Smarty version 2.6.25-dev, created on 2017-03-30 18:14:32
         compiled from templates/common/sitelocation_json_ld.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'PROPERTY', 'templates/common/sitelocation_json_ld.tpl', 9, false),)), $this); ?>
<?php if ($this->_tpl_vars['site_location_feature'] && $this->_tpl_vars['atleastSilver']): ?>
    <script
        type="application/ld+json"
        id="locationData"
        data-embed-key="<?php echo $this->_tpl_vars['config']->common->google_maps->embed_api_key; ?>
">
        {
            "@context": "http://schema.org",
            "@type": "LocalBusiness",
            "telephone": "<?php echo smarty_function_PROPERTY(array('name' => "phone.main"), $this);?>
",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "<?php echo smarty_function_PROPERTY(array('name' => "address.line1"), $this);?>
 <?php echo smarty_function_PROPERTY(array('name' => "address.line2"), $this);?>
",
                "addressLocality": "<?php echo smarty_function_PROPERTY(array('name' => "address.city"), $this);?>
",
                "addressRegion": "<?php echo smarty_function_PROPERTY(array('name' => "address.state"), $this);?>
",
                "addressCountry": "<?php echo smarty_function_PROPERTY(array('name' => "address.country"), $this);?>
",
                "postalCode": "<?php echo smarty_function_PROPERTY(array('name' => "address.postal_code"), $this);?>
"
            },
            "openingHours": <?php echo smarty_function_PROPERTY(array('name' => 'business_hours'), $this);?>

        }
    </script>
<?php endif; ?>