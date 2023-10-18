<h1>Mostrar una tabla con el id del post, el nombre de la categoría, el nombre del
usuario de los posts publicados en el año 2023.</h1>

<table border="1">
    <thead>
        <tr>
            <th>POST ID</th>
            <th>CATEGORIA</th>
            <th>USERNAME</th>
            <th>PUBLICACION</th>
            <th>FECHA DE CREACION</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post['id']; ?></td>
                <td><?= $post['category']; ?></td>
                <td><?= $post['title']; ?></td>
                <td><?= $post['username']; ?></td>
                <td><?= $post['created_at']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>