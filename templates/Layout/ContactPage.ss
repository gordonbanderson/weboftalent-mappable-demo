<% require css(weboftalent-mappable-demo/css/mapdemo.css) %>

<h1>$Title</h1>
$BriefDescription

<h2>Addresses</h2>

<% loop Locations %>
<h3>$PostalAddress</h3>
$BasicMap
<% end_loop %>

$Content