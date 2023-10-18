<table border="1">
        <thead>
            <tr>
                <th>Username</th>
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Género</th>
                <th>Título del Post</th>
                <th>Fecha de creacion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userData as $user): ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['full_name'] ?></td>
                    <td><?= $user['website'] ?></td>
                    <td><?= $user['gender'] ?></td>
                    <td><?= $user['title'] ?></td>
                    <td><?= $user ['created_at']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
