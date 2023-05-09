<?php 
	class Usuario {
		private $db;

		public function __construct() {
			$this->db = new Database;
		}

		public function getProjects() {
			$this->db->query('SELECT * FROM proyectos');
			$projects = $this->db->getSet();
			return $projects;
		}

		public function getAuthors() {
			$this->db->query('SELECT * FROM autores');
			$autores = $this->db->getSet();
			return $autores;
		}

		public function getUserProfile($email) {
			$this->db->query('SELECT * FROM usuarios WHERE email = :email');
			$this->db->bind(':email',$email);
			$autores = $this->db->getSingle();
			return $autores;
		}

		public function getComic($name) {
			$this->db->query('SELECT * FROM proyectos WHERE nombre = :name');
			$this->db->bind(':name',$name);
			$comic = $this->db->getSingle();
			return $comic;
		}

		public function getChapters($id,$estado1) {
			$this->db->query("SELECT * FROM capitulos WHERE proyecto_id = :id AND estado = :estado1 ORDER BY created_at DESC");
			$this->db->bind(':id',$id);
			$this->db->bind(':estado1',$estado1);
			$chapters = $this->db->getSet();
			return $chapters;
		}

		public function getUpcoming($id,$estado2) {
			$this->db->query("SELECT * FROM capitulos WHERE proyecto_id = :id AND estado = :estado2");
			$this->db->bind(':id',$id);
			$this->db->bind(':estado2',$estado2);
			$upcoming = $this->db->getSet();
			return $upcoming;
		}

		public function getDataChapter($id,$num) {
			$this->db->query("SELECT * FROM capitulos WHERE proyecto_id = :id AND cap_num = :num");
			$this->db->bind(':id',$id);
			$this->db->bind(':num',$num);
			$chapter = $this->db->getSingle();
			return $chapter;
		}

		public function getPaidChapters($user_id) {
			$this->db->query("SELECT * FROM capitulos c INNER JOIN pagos p ON c.cap_num = p.cap_num WHERE p.usuario_id = :user_id ORDER BY p.cap_num DESC");
			$this->db->bind(':user_id',$user_id);
			$chapters = $this->db->getSet();
			return $chapters;
		}


		public function getInvoiceNum() {
			$this->db->query("SELECT (MAX(id)+1) AS number FROM pagos");
			$number = $this->db->getSingle();
			return $number;
		}

		public function savePayment($user_id,$comic,$chapter,$monto,$order_id,$invoice_id,$procesador,$estado)
		{
			$this->db->query('INSERT INTO pagos (usuario_id, proyecto_id, cap_num, monto, order_id, invoice_id, procesador, estado) 
				VALUES (:user_id, :comic, :chapter, :monto, :order_id, :invoice_id, :procesador, :estado) ');

			$this->db->bind(':user_id', $user_id);
			$this->db->bind(':comic', $comic);
			$this->db->bind(':chapter', $chapter);
			$this->db->bind(':monto', $monto);
			$this->db->bind(':order_id', $order_id);
			$this->db->bind(':invoice_id', $invoice_id);
			$this->db->bind(':procesador', $procesador);
			$this->db->bind(':estado', $estado);

			// execute the statement
				if ($this->db->execute()) {
					return true;
				} else {
					return false;
				}
			
		}




	}
?>