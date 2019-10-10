<?php 

namespace Hcode\Model;

use \Hcode\Model;
use \Hcode\DB\Sql;

class Category extends Model {

	const SESSION = "User";

	protected $fields = [
		"idcategory", "descategory", "dtregister"
	];

	public static function ListAll(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");
	}

	public function get($idcategory){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", array(
			":idcategory" => $idcategory 
		));
		$this->setData($results[0]);
	}

	public function save(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", 
			array(
			":idcategory" => $this->getidcategory(),
			":descategory" => $this->getdescategory()
		));

		$this->setData($results[0]);
	}

	public function update(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", 
			array(
			":iduser" => $this->getiduser(),
			":desperson" => $this->getdesperson(),
			":deslogin" => $this->getdeslogin(),
			":despassword" => $this->getdespassword(),
			":desemail" => $this->getdesemail(),
			":nrphone" => $this->getnrphone(),
			":inadmin" => $this->getinadmin()
		));

		$this->setData($results[0]);
	}

	public function delete(){
		$sql = new Sql();
		$results = $sql->select("DELETE FROM tb_categories WHERE idcategory = :idcategory", 
			array(
			":idcategory" => $this->getidcategory()
		));
	}

}

?>