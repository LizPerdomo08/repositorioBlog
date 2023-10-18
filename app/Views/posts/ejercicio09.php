<table border="1">
    <thead>
        <tr>
            <th>Titulo del post</th>
            <th>Contenido del post</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($postsAdmin as $post) : ?>
            <tr>
                <td> <?= $post['title']; ?> </td>
                <td> <?= $post['content']; ?> </td>
                <td> <?= $post['category']; ?> </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>