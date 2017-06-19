<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.3/fastclick.min.js"></script>
<script type="text/javascript">
  window.addEventListener("load", function() {
    FastClick.attach(document.body);
  }, false);
</script>

<% if $tracking.custom.script && $tracking.custom.enabled %>
<!-- Start of user defined footer tracking codes -->
<% $tracking.custom.script %>
<!-- End of user defined footer tracking codes -->
<% /if %>

<% if $tracking.site_analytics.url && $tracking.site_analytics.enabled %>
<script type="text/javascript" id="site_analytics_tracking" data-id="<% $system.site.id %>" data-user="<% $system.user.id %>" data-partner="<% $system.partnerId %>" data-url="<% $tracking.site_analytics.url %>">
  var _yts = _yts || [];
  var tracking_tag = document.getElementById('site_analytics_tracking');
  _yts.push(["_siteId", tracking_tag.getAttribute('data-id')]);
  _yts.push(["_userId", tracking_tag.getAttribute('data-user')]);
  _yts.push(["_partnerId", tracking_tag.getAttribute('data-partner')]);
  _yts.push(["_trackPageview"]);
  (function() {
    var yts = document.createElement("script");
    yts.type = "text/javascript";
    yts.async = true;
    yts.src = document.getElementById('site_analytics_tracking').getAttribute('data-url');
    (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(yts);
  })();
</script>
<% /if %>

<% if $tracking.quantcast.enabled %>
<!-- Quantcast Tag -->
<script type="text/javascript">
var _qevents = _qevents || [];

(function() {
var elem = document.createElement('script');
elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
elem.async = true;
elem.type = "text/javascript";
var scpt = document.getElementsByTagName('script')[0];
scpt.parentNode.insertBefore(elem, scpt);
})();


_qevents.push({
qacct:"p-b8x17GqsQ_656"
});
</script>

<noscript>
<div style="display:none;">
<img src="//pixel.quantserve.com/pixel/p-b8x17GqsQ_656.gif" border="0" height="1" width="1" alt="" />
</div>
</noscript>
<!-- End Quantcast tag -->
<% /if %>

<% if $tracking.google_analytics.id && $tracking.google_analytics.enabled %>
<!-- Start of Google Analytics code configured in the Site Settings dialog -->
<script type="text/javascript" id="ga_tracking" data-id="<% $tracking.google_analytics.id %>">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', document.getElementById('ga_tracking').getAttribute('data-id'), 'auto');  // Replace with your property ID.
  ga('send', 'pageview');
</script>
<!-- End of Google Analytics code configured in the Site Settings dialog -->
<% /if %>
