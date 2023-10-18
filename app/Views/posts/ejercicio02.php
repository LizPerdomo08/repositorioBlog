<table border="1">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Nombre completo del usuario</th>
            <th>Categoria</th>
            <th>Fecha de creacion</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post['title']; ?></td>
                <td><?= $post['nombreCompleto']; ?></td>
                <td><?= $post['category']; ?></td>
                <td><?= $post['created_at']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>