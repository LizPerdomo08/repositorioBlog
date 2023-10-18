<table border="1">
	<tr>
		<td>Escrito por</td>
		<td>Posts del 2022</td>
		<td>Posts del 2023</td>
	</tr>
	<tr>
		<td>Mujeres</td>

		<td>
			<?php foreach($postsEscritosPorMujeres2023 as $pepm23): ?>
				<?= $pepm23['pepm23'] ?>
			<?php endforeach; ?>
		</td>


	<?php if ($postsEscritosPorMujeres2023 > $postsEscritosPorMujeres2022) : ?>

		<td style="background-color: green; color: white">
			<?php foreach($postsEscritosPorMujeres2022 as $pepm22): ?>
				<?= $pepm22['pepm22'] ?>
			<?php endforeach; ?>
		</td>
	<?php elseif ($postsEscritosPorMujeres2023 < $postsEscritosPorMujeres2022) : ?>
		<td style="background-color: red; color: white">
			<?php foreach($postsEscritosPorMujeres2022 as $pepm22): ?>
				<?= $pepm22['pepm22'] ?>
			<?php endforeach; ?>
		</td>
	<?php else : ?>
		<td>
			<?php foreach($postsEscritosPorMujeres2022 as $pepm22): ?>
				<?= $pepm22['pepm22'] ?>
			<?php endforeach; ?>
		</td>
	<?php endif; ?>
	</tr>

	<tr>
		<td>Hombres</td>

        <td>
			<?php foreach($postsEscritosPorHombres2023 as $ph23): ?>
				<?= $ph23['ph23'] ?>
			<?php endforeach; ?>
		</td>


	<?php if ($postsEscritosPorHombres2023 > $postsEscritosPorHombres2022) : ?>

		<td style="background-color: green; color: white">
			<?php foreach($postsEscritosPorHombres2022 as $ph22): ?>
				<?= $ph22['pepm22'] ?>
			<?php endforeach; ?>
		</td>
	<?php elseif ($postsEscritosPorHombres2023 < $postsEscritosPorHombres2022) : ?>
		<td style="background-color: red; color: white">
			<?php foreach($postsEscritosPorHombres2022 as $ph22): ?>
				<?= $ph22['ph22'] ?>
			<?php endforeach; ?>
		</td>
	<?php else : ?>
		<td>
			<?php foreach($postsEscritosPorHombres2022 as $ph22): ?>
				<?= $ph22['ph22'] ?>
			<?php endforeach; ?>
		</td>
	<?php endif; ?>
		
		
	</tr>
</table>




