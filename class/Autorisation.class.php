<?php
class Autorisation EXTENDS Projet
{
    private $id_aut;
    private $nom;
    private $code;
    private $desc;

    //private $sel;



    public function __construct($id = null)
    {
        parent::__construct();

        if ($id) {
            $this->set_id_aut($id);
            $this->init();
        }
    }

    /**
     * Initialise
     * @return bool
     */

    public function check_code($code)
    {
        try {
            $query = "SELECT * FROM t_autorisations WHERE code_aut= :code_aut LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $args = array();
            $args[':code_aut'] = "USR_".$code;
            $stmt->execute($args);

            $tab = $stmt->fetch();
            if ($tab['code_aut'] == $code) {
                return true;
            }

        } catch (Exception $e) {
            return false;
        }
    }

    public function init()
    {
        try {
            $query = "SELECT * FROM t_autorisations WHERE id_aut= :id_aut";
            $stmt = $this->pdo->prepare($query);
            $args = array();
            $args[':id_aut'] = $this->get_id_aut();
            $stmt->execute($args);

            $tab = $stmt->fetch();

            $this->set_nom($tab['nom_aut']);
            $this->set_code($tab['code_aut']);
            $this->set_desc_aut($tab['desc_aut']);


            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function add($tab){

        $args = array();
        $args['nom_aut'] = $tab['nom_aut'];
        $args['code_aut'] = $tab['code_aut'];
        $args['desc_aut'] = $tab['desc_aut'];



        try {
            $query = "INSERT INTO t_autorisations SET 
            nom_aut = :nom_aut,
            code_aut = :code_aut,
            desc_aut = :desc_aut";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);

            return $this->pdo->lastInsertId();

        }catch(Exception $e){
            //echo 'Exception reçue : ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function __toString()
    {
        $str ="<pre>";
        foreach ($this as $key => $val){
            if($key !="pdo"){
                $str.="\t".$key;
                for($i=strlen($key);$i>20;$i++){
                    $str .= "&nbsp;";
                }
                $str .="=>&nbsp;&nbsp;&nbsp;".$val."\n";
            }
        }
        $str .= "\n</pre>";
        return $str;
    }





    /**
     * Set la propriété de la class
     * @param $nom
     */
    public function set_nom($nom){
        $this->nom = $nom;
    }

    public function get_nom(){
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function get_id_aut()
    {
        return $this->id_aut;
    }

    /**
     * @param mixed $id
     */
    public function set_id_aut($id)
    {
        $this->id_aut = $id;
    }

    public function set_desc_aut($desc){
        $this->desc = $desc;
    }

    public function get_desc_aut(){
        return $this->desc;
    }

    public function set_code($code){
        $this->code = $code;
    }

    public function get_code(){
        return $this->code;
    }





} //Initialisation de la classe

?>