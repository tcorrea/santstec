<div class="recaptcha-wrap">
    <span class="recaptcha-spin"></span>
    <div class="g-recaptcha" data-sitekey="<% $siteKey %>" id="recaptcha-<%$widgetId%>"></div>
</div>

<script>
    window.formWidgetRecaptchaQueue = window.formWidgetRecaptchaQueue || [];
    window.formWidgetRecaptchaQueue.push('recaptcha-<%$widgetId%>');
</script>
<script src="<% 'classes/components/Form/layouts/Default/recaptcha.js'|anticache %>"></script>
<%*
    We use "nb" for Norwegian, docs say to use "no" but
    after some testing, both can codes seem to be supported.
    https://developers.google.com/recaptcha/docs/language
*%>
<script src="https://www.google.com/recaptcha/api.js?onload=recaptchacb&render=explicit&hl=<% $locale %>" async defer></script>
