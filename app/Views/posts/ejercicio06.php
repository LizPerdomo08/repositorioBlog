<table border="1">
	<tr>
		<td>Posts por categoría</td>
		<td>Posts por autor</td>
	</tr>
	<tr>
		<td>
			<?php foreach($postsPorCategoria as $ppc): ?>
				
				<?= $ppc['ppc'] . ' - ' . $ppc['ccategory'] . '<br />' ?>

			<?php endforeach; ?>
		</td>

		<td>
			<?php foreach($postsPorAutor as $ppa): ?>
				<?= $ppa['ppa'] . ' - ' . $ppa['aautor'] . '<br />' ?>
			<?php endforeach; ?>
		</td>

		
	</tr>
</table>