<?php 
	class Admin extends Controller {
		
		public function __construct() {
			$this->admin = $this->model('Administrador');
		}

		public function index() {
			if (adminLoggedIn()) {
				$projects = $this->admin->getProjects();
				$name = $projects[0]->nombre;
				$project_name = str_replace(" ","_",$name);
				$controller = strtolower(get_called_class());

				$data = [
					'comics' => $projects,

					'project_name' => $project_name,
					'controller' => $controller,
					'page' => __FUNCTION__
				];

				$this->view('admin/index',$data);

			} else {
				$this->view('pages/login');
			}
		}

		public function panel() {
			if (adminLoggedIn()) {
				$projects = $this->admin->getProjects();
				$name = $projects[0]->nombre;
				$project_name = str_replace(" ","_",$name);
				$controller = strtolower(get_called_class());

				$chapters = $this->admin->getAllChapters();
				$users = $this->admin->getUsers();

				$data = [
					'comics' => $projects,
					'chapters' => $chapters,
					'users' => $users,

					'project_name' => $project_name,
					'controller' => $controller,
					'page' => __FUNCTION__
				];

				// echo "<pre>";
				// print_r($data);
				// die();

				$this->view('admin/panel',$data);

			} else {
				$this->view('pages/login');
			}
		}

		public function about() {
			if (adminLoggedIn()) {
				$projects = $this->admin->getProjects();
				$name = $projects[0]->nombre;
				$project_name = str_replace(" ","_",$name);
				$controller = strtolower(get_called_class());

				$authors = $this->admin->getAuthors();

				$data = [
					'authors' => $authors,

					'project_name' => $project_name,
					'controller' => $controller,
					'page' => __FUNCTION__
				];

				// echo "<pre>";
				// print_r($data);
				// die();

				$this->view('admin/about',$data);

			} else {
				$this->view('pages/login');
			}
		}

		public function profile() {
			if (adminLoggedIn()) {
				$projects = $this->admin->getProjects();
				$name = $projects[0]->nombre;
				$project_name = str_replace(" ","_",$name);
				$controller = strtolower(get_called_class());

				$user = $this->admin->getUserProfile($_SESSION['user_email']);

				$data = [
					'user' => $user,

					'project_name' => $project_name,
					'controller' => $controller,
					'page' => __FUNCTION__
				];

				// echo "<pre>";
				// print_r($data);
				// die();

				$this->view('admin/profile',$data);

			} else {
				$this->view('pages/login');
			}
		}


		public function galeria($name = null, $chapter = null) {

			if (!is_null($name) && is_null($chapter)) {

				$project_name = str_replace("_"," ",$name);
				$controller = strtolower(get_called_class());

				$project = $this->admin->getComic($project_name);

				$project_id = $project->id;
				$estado1 = 'publicado';
				$chapters = $this->admin->getChapters($project_id,$estado1);

				$estado2 = 'programado';
				$upcoming = $this->admin->getUpcoming($project_id,$estado2);

				$data = [

					'comic' => $project,
					'chapters' => $chapters,
					'upcoming' => $upcoming,

					'project_name' => $name,
					'controller' => $controller,
					'page' => __FUNCTION__
				];

				// echo "<pre>";

				// print_r($data);

				// die();

				$this->view('admin/galeria', $data);

			} 

			if (!is_null($name) && !is_null($chapter)) {
				$project_name = str_replace("_"," ",$name);
				$controller = strtolower(get_called_class());

				$project = $this->admin->getComic($project_name);
				$project_id = $project->id;

				$chapter_num = explode('_', $chapter);
				$chapter_num = $chapter_num[1];
				$chapter = $this->admin->getDataChapter($project_id,$chapter_num);

				$data = [
					'comic' => $project,
					'chapter' => $chapter,

					'project_name' => $name,
					'controller' => $controller,
					'page' => __FUNCTION__
				];

				$this->view('admin/galeria', $data);
			}
		}

		public function editar($name = null, $chapter = null) {
			if (adminLoggedIn()) {

				if (!is_null($name) && is_null($chapter)) {

					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
						$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
						$comic_id = $_POST['comic_id'];
						$nombre             = $_POST['nombre'];
						$genero          = $_POST['genero'];
						$descripcion          = $_POST['descripcion'];
						$autor         = $_POST['autor'];
						$formato         = $_POST['formato'];
						$estado         = $_POST['estado'];

						$imagen_actual      = $_POST['imagen_actual'];
						$imagen             = $_FILES['imagen'];

						$portadas_dir  = 'img/portadas/';

						if(!empty($imagen['tmp_name'])) {
					    move_uploaded_file($imagen['tmp_name'], $portadas_dir . $imagen['name']);
					    $imgUrl = $portadas_dir . $imagen['name'];
						} else {
							$imgUrl = $imagen_actual;
						}

						$update = $this->admin->updateComic($comic_id,$nombre,$genero,$descripcion,$autor,$formato,$estado,$imgUrl);

						if ($update) {
							$_SESSION['msg'] = 'Actualizado correctamente.';
							redirect('admin/panel');
						} else {
							die('Algo salio mal');
						}

					} else {

						$project_name = str_replace("_"," ",$name);
						$controller = strtolower(get_called_class());

						$project = $this->admin->getComic($project_name);


						$data = [
							'comic' => $project,

							'project_name' => $project_name,
							'controller' => $controller,
							'page' => __FUNCTION__
						];

						$this->view('admin/editar',$data);
					}

				}

				if (!is_null($name) && !is_null($chapter)) {
					if (isset($_POST['delete'])) {

						$id = $_POST['chapter_id'];
						$deleted = $this->admin->deleteChapter($id);

						if ($deleted) {
							$_SESSION['msg'] = 'Eliminado correctamente.';
							redirect('admin/panel');
						} else {
							die('Algo salio mal');
						}
					}

					if (isset($_POST['update'])) {
						$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
						$comic_id = $_POST['comic_id'];
						$cap_num            = $_POST['cap_num'];
						$titulo             = $_POST['titulo'];
						$subtitulo          = $_POST['subtitulo'];
						$autor          = $_POST['autor'];
						$paginas         = $_POST['paginas'];
						$formato         = $_POST['formato'];
						$precio         = $_POST['precio'];
						$estado         = $_POST['estado'];
						$sinopsis         = $_POST['sinopsis'];

						$imagen_actual      = $_POST['imagen_actual'];
						$imagen             = $_FILES['imagen'];

						$portadas_dir  = 'img/portadas/';

						if(!empty($imagen['tmp_name'])) {
					    move_uploaded_file($imagen['tmp_name'], $portadas_dir . $imagen['name']);
					    $imgUrl = $portadas_dir . $imagen['name'];
						} else {
							$imgUrl = $imagen_actual;
						}

						// die('detenido');

						$update = $this->admin->updateChapter($comic_id,$cap_num,$titulo,$subtitulo,$autor,$paginas,$formato,$precio,$estado,$sinopsis,$imgUrl);

						if ($update) {
							$_SESSION['msg'] = 'Actualizado correctamente.';
							redirect('admin/panel');
						} else {
							die('Algo salio mal');
						}

					} else {

						$project_name = str_replace("_"," ",$name);
						$controller = strtolower(get_called_class());

						$project = $this->admin->getComic($project_name);
						$project_id = $project->id;

						$chapter_num = explode('_', $chapter);
						$chapter_num = $chapter_num[1];
						$chapter = $this->admin->getDataChapter($project_id,$chapter_num);

						$data = [
							'comic' => $project,
							'chapter' => $chapter,

							'project_name' => $name,
							'controller' => $controller,
							'page' => __FUNCTION__
						];


						$this->view('admin/editar', $data);
					}

				}

			} else {
				$this->view('pages/login');
			}
		}


		public function crear() {
			if (adminLoggedIn()) {

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
					$comic_id = $_POST['comic_id'];
					$cap_num            = $_POST['cap_num'];
					$titulo             = $_POST['titulo'];
					$subtitulo          = $_POST['subtitulo'];
					$autor          = $_POST['autor'];
					$paginas         = $_POST['paginas'];
					$formato         = $_POST['formato'];
					$precio         = $_POST['precio'];
					$estado         = $_POST['estado'];
					$sinopsis         = $_POST['sinopsis'];

					$imagen             = $_FILES['imagen'];

					$portadas_dir  = 'img/portadas/';

					mkdir('../public/img/files/capitulo_' . $cap_num);
					mkdir('../public/img/free/capitulo_' . $cap_num);

					if(!empty($imagen['tmp_name'])) {
				    move_uploaded_file($imagen['tmp_name'], $portadas_dir . $imagen['name']);
				    $portada = $portadas_dir . $imagen['name'];
					} else {
						$portada = '';
					}
					

					// die('detenido');

					$added = $this->admin->addChapter($comic_id,$cap_num,$titulo,$subtitulo,$sinopsis,$autor,$portada,$paginas,$formato,$precio,$estado);

					if ($added) {
						$_SESSION['msg'] = 'Creado correctamente.';
						redirect('admin/panel');
					} else {
						die('Algo salio mal');
					}

				} else {

					$project = $this->admin->getProjects();
					$name = $project[0]->nombre;
					$project_name = str_replace(" ","_",$name);
					$controller = strtolower(get_called_class());

					$project_id = $project[0]->id;

					$chapter_num = $this->admin->getChapterNum($project_id);
					$cap_num = (strval($chapter_num->lastChapter) + 1);

					$cap_title = 'Capitulo ' . (strval($chapter_num->lastChapter) + 1);

					$data = [
						'comic_id' => $project_id,
						'cap_num' => $cap_num,
						'cap_title' => $cap_title,

						'project_name' => $project_name,
						'controller' => $controller,
						'page' => __FUNCTION__
					];

					$this->view('admin/crear', $data);
				}

			} else {
				$this->view('pages/login');
			}
			
		}







	}
?>