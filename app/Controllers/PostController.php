<?php

namespace App\Controllers;
use CodeIgniter\HTTP\Response;

class PostController extends BaseController
{

	public function ejercicio01()
	{
		$db = \Config\Database::connect();
		$posts = $db->query('select c.category, p.id, p.title, u.username, p.created_at from categories as c right 
        join posts as p on p.category = c.id left join users as u on u.id = p.autor where p.created_at 
        between "2023/01/01" and "2023/12/31"')->getResultArray();

		$data = [
			'posts' => $posts
		];

		return view('posts/ejercicio01', $data);
	}
    public function ejercicio02(){
        $db = \Config\Database::connect();
        
        $posts = $db->query('select p.title, concat(ui.name," ",ui.lastname) as "nombreCompleto", 
        p.category, p.created_at from posts as p 
        left join users as u on p.autor = u.id 
        right join userinfo as ui on u.id = ui.id
        order by p.category desc, p.created_at desc limit 1')->getResultArray();

        $data = [
            'posts'=>$posts
        ];
    
        return view('posts/ejercicio02', $data);
    }
	public function ejercicio03()
	{
		$db = \Config\Database::connect();
	
		// Realiza una consulta para obtener todos los posts únicos con estado 0 por usuario
		$query = $db->query('
			SELECT CONCAT(u.name, " ", u.lastname) AS full_name, u.website, u.phone, p.title, p.status
			FROM userinfo AS u
			LEFT JOIN (
				SELECT DISTINCT autor, title, status
				FROM posts
				WHERE status = 0
			) AS p ON u.id = p.autor
		');
		$results = $query->getResultArray();
		$data = [
			'userData' => $results,
		];
		return view('posts/ejercicio03', $data);
	}
	public function ejercicio04()
	{
		$db = \Config\Database::connect();
	
		// Realiza una consulta para obtener los datos requeridos
		$query = $db->query('
		select u.name, concat(u.name, " ", u.lastname) as full_name, u.website, 
		case 
			when u.gender = "m" THEN "hombre"
			when u.gender = "f" THEN "mujer"
		end as gender,
		p.title, p.created_at
		from userinfo as u
		left join posts as p on u.id = p.autor
		where year (p.created_at) = 2022
	
		');
		$results = $query->getResultArray();
		$data = [
			'userData' => $results,
		];
		return view('posts/ejercicio04', $data);
	}

	public function ejercicio05()
	{
		// 5. Mostrar una tabla con los siguientes datos: cantidad total de usuarios registrados, cantidad total de posts, cantidad total de comentarios, cantidad total de categorias.

		$db = \Config\Database::connect();
		$totalUsers = $db->query('select count(*) as "totalUsuarios" from users')->getResultArray();

		$totalPosts = $db->query('select count(*) as "totalPublicaciones" from posts')->getResultArray();
		
		$totalComments = $db->query('select count(*) as "totalComentarios" from comments')->getResultArray();

		$totalCategories = $db->query('select count(*) as "totalCategorias" from categories')->getResultArray();

		$data = [
			'totalUsers'		=> $totalUsers,
			'totalPosts'		=> $totalPosts,
			'totalComments'		=> $totalComments,
			'totalCategories'	=> $totalCategories
		];

		return view('posts/ejercicio05', $data);
	}
	public function ejercicio06()
	{
		$db = \Config\Database::connect();

		$postsPorCategoria = $db->query('select p.*, c.category as ccategory, count(*) as 
		ppc from categories as c join posts as p on p.category = c.id group by category 
		order by category')->getResultArray();

		
		$postsPorAutor = $db->query('select p.*, u.username as aautor, count(*) as 
		ppa from posts as p right join users as u on p.autor = u.id group by autor order by autor')->getResultArray();

		$data = [
			'postsPorCategoria' => $postsPorCategoria,
			'postsPorAutor' 	=> $postsPorAutor
		];


		return view('posts/ejercicio06', $data);
	}


	public function ejercicio07()
	{
		$db = \Config\Database::connect();

		$postsEscritosPorMujeres2022 = $db->query('select p.*, count(*) as pepm22, u.*, ui.* 
		from posts as p join users as u on p.autor = u.id join userinfo as ui on u.id = ui.id 
		where ui.gender = "f" and p.created_at between "2022/01/01" and "2022/12/31"')->getResultArray();

		$postsEscritosPorMujeres2023 = $db->query('select p.*, count(*) as pepm23, u.*, ui.* 
		from posts as p join users as u on p.autor = u.id join userinfo as ui on u.id = ui.id 
		where ui.gender = "f" and p.created_at between "2023/01/01" and "2023/12/31"')->getResultArray();

		$postsEscritosPorHombres2022 = $db->query('select p.*, count(*) as ph22, u.*, ui.* 
		from posts as p join users as u on p.autor = u.id join userinfo as ui on u.id = ui.id 
		where ui.gender = "m" and p.created_at between "2022/01/01" and "2022/12/31"')->getResultArray();

		$postsEscritosPorHombres2023 = $db->query('select p.*, count(*) as ph23, u.*, ui.* 
		from posts as p join users as u on p.autor = u.id join userinfo as ui on u.id = ui.id 
		where ui.gender = "m" and p.created_at between "2023/01/01" and "2023/12/31"')->getResultArray();

		$data = [
			'postsEscritosPorMujeres2022'	=> $postsEscritosPorMujeres2022,
			'postsEscritosPorMujeres2023'	=> $postsEscritosPorMujeres2023,
			'postsEscritosPorHombres2022'	=> $postsEscritosPorHombres2022,
			'postsEscritosPorHombres2023'	=> $postsEscritosPorHombres2023
		];

		return view('posts/ejercicio07', $data);
	}

	// Mostrar una tabla con un resumen de las cantidades de posts escritos por
	//categoría y otro resumen de posts escritos por autor. Resaltar con un color
	//distinto el valor más alto y el más bajo en ambos resumenes.
	public function ejercicio08()
	{
		$db = \Config\Database::connect();

		$postsPorCategoria = $db->query('select p.*, c.category as ccategory, count(*) as 
		ppc from categories as c join posts as p on p.category = c.id group by category 
		order by category')->getResultArray();

		
		$postsPorAutor = $db->query('select p.*, u.username as aautor, count(*) as 
		ppa from posts as p right join users as u on p.autor = u.id group by autor order by autor')->getResultArray();

		$data = [
			'postsPorCategoria' => $postsPorCategoria,
			'postsPorAutor' 	=> $postsPorAutor
		];

		return view('posts/ejercicio08', $data);
	}

	public function ejercicio09()
	{
		$db = \Config\Database::connect();

		$query = 'select p.title, p.content, c.category from posts p
		join categories c on p.category = c.id join users u on p.autor = u.id
		where u.profile = (select id from profiles where profile = "admin")';

		$postsAdmin = $db->query($query)->getResultArray();

		$data = [
			'postsAdmin' => $postsAdmin
		];

		return view('posts/ejercicio09', $data);
	}


	public function ejercicio10(){
        $db = \Config\Database::connect();
    
		$postsMujeres = $db->query('select u.username, ui.gender, ui.birthday, max(p.id) as
		"ultimoPost" from posts as p left join users as u on p.autor = u.id left join userinfo as ui on u.id = ui.id
		where ui.gender = "f" and ui.birthday between "1993/01/01" and "2023/12/31" group by u.username limit 20')->getResultArray();

		$postsHombres = $db->query('select u.username, ui.gender, ui.birthday, min(p.id) as "primerPost" from posts
		as p left join users as u on p.autor = u.id left join userinfo as ui on u.id = ui.id
		where ui.gender = "m" and ui.birthday not between "2007/01/01" and "2023/12/31" group by u.username limit 20')->getResultArray();

        $data = [
			'postsMujeres'	=>$postsMujeres,
			'postsHombres'	=>$postsHombres
        ];
    
        //dd($posts, $p,$u,$ui);
        return view('posts/ejercicio10', $data);
    }
	
	public function descargar() {

		$db = \Config\Database::connect();
	
		$nombreBD = $db->getDatabase();

		$archivo = 'whole_database_' . date('Y-m-d_H-i-s') . '.csv';
	
		$ruta = "mysqldump -u lizbeth -p Luna2003 $nombreBD > $archivo 2>&1"; 
		salida($ruta, $importar, $regresarVista);
	
		if ($regresarVista !== 0) {
			echo "Error al exportar la base de datos: ";
			foreach ($importar as $datos) {
				echo $datos . '<br>';
			}
		} else {

			$descarga = servicio('response');
			$descarga->descargar($archivo, NULL);
		}
	}
}
