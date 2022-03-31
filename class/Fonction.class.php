<?php
class Fonction EXTENDS Projet
{
    private $id_fnc;
    private $nom;
    private $abr;
    private $desc;
    //private $sel;




    public function __construct($id = null)
    {
        parent::__construct();


        if ($id) {
            $this->set_id($id);
            $this->init();
        }
    }

    /**
     * Initialise
     * @return bool
     */


    public function check_abr($abr)
    {
        try {
            $query = "SELECT * FROM t_fonctions WHERE abr_fnc= :abr_fnc LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $args = array();
            $args[':abr_fnc'] = $abr;
            $stmt->execute($args);

            $tab = $stmt->fetch();
            if ($tab['abr_fnc'] == $abr) {
                return true;
            }

        } catch (Exception $e) {
            return false;
        }
    }

    public function init()
    {
        try {
            $query = "SELECT * FROM t_fonctions WHERE id_fnc= :id_fnc";
            $stmt = $this->pdo->prepare($query);
            $args = array();
            $args[':id_fnc'] = $this->get_id_fnc();
            $stmt->execute($args);

            $tab = $stmt->fetch();

            $this->set_nom($tab['nom_fnc']);
            $this->set_abr_fnc($tab['abr_fnc']);
            $this->set_desc_fnc($tab['desc_fnc']);


            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function add($tab){

        $args = array();
        $args['nom_fnc'] = $tab['nom_fnc'];
        $args['abr_fnc'] = $tab['abr_fnc'];
        $args['desc_fnc'] = $tab['desc_fnc'];



        try {
            $query = "INSERT INTO t_fonctions SET 
            nom_fnc = :nom_fnc,
            abr_fnc = :abr_fnc,
            desc_fnc = :desc_fnc";
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
    public function get_id_fnc()
    {
        return $this->id_fnc;
    }

    /**
     * @param mixed $id
     */
    public function set_id_fnc($id)
    {
        $this->id_fnc = $id;
    }

    public function set_abr_fnc($abr){
        $this->abr = $abr;
    }

    public function get_abr_fnc(){
        return $this->abr;
    }

    public function set_desc_fnc($desc){
        $this->desc = $desc;
    }

    public function get_desc_fnc(){
        return $this->desc;
    }







} //Initialisation de la classe

?>