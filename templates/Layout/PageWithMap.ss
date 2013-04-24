<% require css(weboftalent-mappable-demo/css/mapdemo.css) %>
<% include PrevNextPageNav %>

<div class="content-container unit size3of4 lastUnit">
	<article>

<h1>$Title</h1>
$BriefDescription
<% if $ShowExampleLines %>
$MapWithLines
<% else %>
<% if $ShowExampleDataset %>
$MapWithDataSet
<% else %>
$BasicMap
<% end_if %>
<% end_if %>

$Content
</article>

<% include PrevNextPageNav %>

		$Form
		$PageComments
</div>

