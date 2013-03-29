<% require css(weboftalent-mappable-demo/css/mapdemo.css) %>

<h1>$Title</h1>
$Content

<% if $ShowExampleLines %>
map with lines
$MapWithLines
<% else %>
<% if $ShowExampleDataset %>
$MapWithDataSet
<% else %>
$BasicMap
<% end_if %>
<% end_if %>

