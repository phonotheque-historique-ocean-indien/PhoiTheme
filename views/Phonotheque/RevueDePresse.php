<h2>Revue de presse</h2>
<link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready( function () {
		$('#revueDePresse').DataTable({
			"language": {"url": "/datatables_french.json"},
			"info": false
		});
	} );
</script>
<table class="table" id="revueDePresse">
	<thead>
	<tr>
		<th>Titre</th>
		<th>Date</th>
		<th>Source</th>
		<th>Lien</th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<th>Titre</th>
		<th>Date</th>
		<th>Source</th>
		<th>Lien</th>
	</tr>
	</tfoot>
	<tbody>
	<?php for($i=1;$i<250;$i++) : ?>
		<tr><td>Article <?php print substr("  ".$i,-3); ?></td><td></td><td></td><td></td></tr>
	<?php endfor; ?>
	</tbody>
</table>
