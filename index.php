<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/vendor/cartalyst/data-grid/public/js/underscore.js"></script>
<script src="/vendor/cartalyst/data-grid/public/js/data-grid.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>

<table class="table results" data-grid="main" data-source="/weather.php">
  <thead>
    <tr>
      <th>Date</th>
      <th>Low</th>
      <th>High</th>
      <th>Conditions</th>
    </tr>
  </thead>
  <tbody></tbody>
</table>

<script type="text/template" data-grid="main" data-template="results">
  <% _.each(results, function(r) { %>
    <tr>
      <td><%= r.date %></td>
      <td><%= r.low %></td>
      <td><%= r.high %></td>
      <td><%= r.conditions %></td>
    </tr>
  <% }); %>
</script>

<script type="text/template" data-grid="main" data-template="no_results">
  <tr>
    <td colspan="4">No results</td>
  </tr>
</script>

<ul class="filters" data-grid="main"></ul>

<script type="text/template" data-grid="main" data-template="filters">
  <% _.each(filters, function(f) { %>
    <li>
      <% if (column === "all") { %>
        <%= f.value %>
      <% } else { %>
        <%= r.value %> in <%= f.column %>
      <% } %>
    </li>
  <% }); %>
</script>

<ul class="pagination" data-grid="main"></ul>

<script type="text/template" data-grid="main" data-template="pagination">
  <% _.each(pagination, function(p) { %>
    <li data-grid="main" data-page="<%= p.page %>"><%= p.page_start %> - <%= p.page_limit %></li>
  <% }); %>
</script>

<script>
  $.datagrid("main", ".results", ".pagination", ".filters");
</script>
