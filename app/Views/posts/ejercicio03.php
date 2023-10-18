<th>Ejercicio 03</th>
  <table border="1">
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Título del Post</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userData as $user): ?>
                <tr>
                    <td><?= $user['full_name'] ?></td>
                    <td><?= $user['website'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td><?= $user['title'] ?></td>
                    <td><?= $user['status']?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
