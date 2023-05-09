<?php 
	class Usuarios extends Controller {
		public function __construct() {
			$this->usuario = $this->model('Usuario');
		}

		public function index() {
			if (usuarioLoggedIn()) {
				$projects = $this->usuario->getProjects();
				$name = $projects[0]->nombre;
				$project_name = str_replace(" ","_",$name);
				$controller = strtolower(get_called_class());

				$data = [
					'comics' => $projects,

					'project_name' => $project_name,
					'controller' => $controller,
					'page' => __FUNCTION__
				];

				// __METHOD__ ->  Admin::index ;   __FUNCTION__ -> index

				$this->view('usuarios/index',$data);

			} else {
				$this->view('pages/login');
			}
		}

		public function about() {
			if (usuarioLoggedIn()) {
				$projects = $this->usuario->getProjects();
				$name = $projects[0]->nombre;
				$project_name = str_replace(" ","_",$name);
				$controller = strtolower(get_called_class());

				$authors = $this->usuario->getAuthors();

				$data = [
					'authors' => $authors,

					'project_name' => $project_name,
					'controller' => $controller,
					'page' => __FUNCTION__
				];

				$this->view('usuarios/about',$data);

			} else {
				$this->view('pages/login');
			}
		}

		public function profile() {
			if (usuarioLoggedIn()) {
				$projects = $this->usuario->getProjects();
				$name = $projects[0]->nombre;
				$project_name = str_replace(" ","_",$name);
				$controller = strtolower(get_called_class());

				$user = $this->usuario->getUserProfile($_SESSION['user_email']);

				$data = [
					'user' => $user,

					'project_name' => $project_name,
					'controller' => $controller,
					'page' => __FUNCTION__
				];

				$this->view('usuarios/profile',$data);

			} else {
				$this->view('pages/login');
			}
		}

		public function galeria($name = null, $chapter = null) {
			if (usuarioLoggedIn()) {
				if (!is_null($name) && is_null($chapter)) {

					$project_name = str_replace("_"," ",$name);
					$controller = strtolower(get_called_class());

					$project = $this->usuario->getComic($project_name);

					$project_id = $project->id;
					$estado1 = 'publicado';
					$chapters = $this->usuario->getChapters($project_id,$estado1);

					$estado2 = 'programado';
					$upcoming = $this->usuario->getUpcoming($project_id,$estado2);

					$data = [
						'comic' => $project, // lleva la informacion de ficha tecnica
						'chapters' => $chapters,
						'upcoming' => $upcoming,

						'project_name' => $name,
						'controller' => $controller,
						'page' => __FUNCTION__
					];

					$this->view('usuarios/galeria', $data);

				} 

				if (!is_null($name) && !is_null($chapter)) {
					$project_name = str_replace("_"," ",$name);
					$controller = strtolower(get_called_class());

					$project = $this->usuario->getComic($project_name);
					$project_id = $project->id;

					$chapter_num = explode('_', $chapter);
					$chapter_num = $chapter_num[1];
					$chapter = $this->usuario->getDataChapter($project_id,$chapter_num);

					$invoice_num = $this->usuario->getInvoiceNum()->number;

					$data = [
						'comic' => $project,
						'chapter' => $chapter,
						'invoice' => $invoice_num,

						'project_name' => $name,
						'controller' => $controller,
						'page' => __FUNCTION__
					];

					$this->view('usuarios/galeria', $data);
				}
			}
		}

		public function biblioteca($name = null, $chapter = null) {
			if (usuarioLoggedIn()) {

				if (!is_null($name) && is_null($chapter)) {

					$project_name = str_replace("_"," ",$name);
					$controller = strtolower(get_called_class());

					$project = $this->usuario->getComic($project_name);

					$paidChapters = $this->usuario->getPaidChapters($_SESSION['user_id']);

					$data = [
						'comic' => $project,
						'paidChapters' => $paidChapters,

						'project_name' => $name,
						'controller' => $controller,
						'page' => __FUNCTION__
					];

					$this->view('usuarios/biblioteca', $data);

				} 

				if (!is_null($name) && !is_null($chapter)) {
					$project_name = str_replace("_"," ",$name);
					$controller = strtolower(get_called_class());

					$project = $this->usuario->getComic($project_name);
					$project_id = $project->id;

					$chapter_num = explode('_', $chapter);
					$chapter_num = $chapter_num[1];
					$chapter = $this->usuario->getDataChapter($project_id,$chapter_num);

					$data = [
						'comic' => $project,
						'chapter' => $chapter,

						'project_name' => $name,
						'controller' => $controller,
						'page' => __FUNCTION__
					];

					$this->view('usuarios/biblioteca', $data);
				}

			}
		}

		public function payment($comic=null,$chapter=null,$order_id=null,$invoice_id=null,$procesador=null,$estado=null,$monto=null) {
			if (usuarioLoggedIn()) {
				if (!is_null($order_id)) {
					
					$user_id = $_SESSION['user_id'];

					$project = $this->usuario->getProjects();
					$project = $project[0]->nombre;
					$project_name = str_replace(" ","_",$project);

					$this->usuario->savePayment($user_id,$comic,$chapter,$monto,$order_id,$invoice_id,$procesador,$estado);

					redirect('usuarios/biblioteca' . '/' . $project_name);

				} else {

					$project = $this->usuario->getProjects();
					$project = $project[0]->nombre;
					$project_name = str_replace(" ","_",$project);

					redirect('usuarios/galeria' . '/' . $project_name);
				}

			} else {
				redirect('pages/login');
			}
		}


	}
?>