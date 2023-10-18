<table border="1">
    <tr>
        <td>Posts por categoría</td>
        <td>Posts por autor</td>
    </tr>
    <tr>
        <td>
            <?php
            $minCategory = PHP_INT_MAX;
            $maxCategory = -PHP_INT_MAX;

            foreach ($postsPorCategoria as $ppc) {
                $category = $ppc['ccategory'];
                $minCategory = min($minCategory, $ppc['ppc']);
                $maxCategory = max($maxCategory, $ppc['ppc']);
            }

            foreach ($postsPorCategoria as $ppc) {
                $category = $ppc['ccategory'];
                $posts = $ppc['ppc'];
                $bgColor = 'white';

                if ($posts === $minCategory) {
                    $bgColor = 'lightgreen'; 
                } elseif ($posts === $maxCategory) {
                    $bgColor = 'lightblue';  
                }

                echo '<div style="background-color: ' . $bgColor . ';">' . $posts . ' - ' . $category . '</div>';
            }
            ?>
        </td>

        <td>
            <?php
            $minPosts = PHP_INT_MAX;
            $maxPosts = -PHP_INT_MAX;
			
            foreach ($postsPorAutor as $ppa) {
                $posts = $ppa['ppa'];
                $minPosts = min($minPosts, $posts);
                $maxPosts = max($maxPosts, $posts);
            }

            foreach ($postsPorAutor as $ppa) {
                $posts = $ppa['ppa'];
                $author = $ppa['aautor'];
                $bgColor = 'white';
                if ($posts === $minPosts) {
                    $bgColor = 'lightgreen'; 
                } elseif ($posts === $maxPosts) {
                    $bgColor = 'lightblue';  
                }

                echo '<div style="background-color: ' . $bgColor . ';">' . $posts . ' - ' . $author . '</div>';
            }
			
            ?>
        </td>
    </tr>
</table>
