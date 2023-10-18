<table border="1">
	<tr>
		<td>Usuario</td>
		<td>Genero</td>
        <td>Fecha de nacimiento</td>
        <td>Id de post</td>
	</tr>
	<tr>

        <?php foreach ($postsMujeres as $post): ?>
            <tr>
                <td><?= $post['username']; ?></td>
                <td><?= $post['gender']; ?></td>
                <td><?= $post['birthday']; ?></td>
                <td><?= $post['ultimoPost']; ?></td>
            </tr>
        <?php endforeach; ?>


        <?php foreach ($postsHombres as $post): ?>
            <tr>
                <td><?= $post['username']; ?></td>
                <td><?= $post['gender']; ?></td>
                <td><?= $post['birthday']; ?></td>
                <td><?= $post['primerPost']; ?></td>
            </tr>
        <?php endforeach; ?>



	</tr>
</table>