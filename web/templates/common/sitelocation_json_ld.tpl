<% if $site_location_feature && $atleastSilver %>
    <script
        type="application/ld+json"
        id="locationData"
        data-embed-key="<% $config->common->google_maps->embed_api_key %>">
        {
            "@context": "http://schema.org",
            "@type": "LocalBusiness",
            "telephone": "<% PROPERTY name="phone.main" %>",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "<% PROPERTY name="address.line1" %> <% PROPERTY name="address.line2" %>",
                "addressLocality": "<% PROPERTY name="address.city" %>",
                "addressRegion": "<% PROPERTY name="address.state" %>",
                "addressCountry": "<% PROPERTY name="address.country" %>",
                "postalCode": "<% PROPERTY name="address.postal_code" %>"
            },
            "openingHours": <% PROPERTY name="business_hours" %>
        }
    </script>
<% /if %>
