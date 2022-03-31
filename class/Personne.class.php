<?php
class Personne EXTENDS Projet
{
    private $id_per;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    //private $sel;
    private $news_letter;



    public function __construct($id = null)
    {
        parent::__construct();

        if ($id) {
            $this->set_id_per($id);
            $this->init();
        }
    }

    /**
     * Initialise
     * @return bool
     */

    public function init()
    {
        try {
            $query = "SELECT * FROM t_personnes WHERE id_per= :id_per";
            $stmt = $this->pdo->prepare($query);
            $args = array();
            $args[':id_per'] = $this->get_id_per();
            $stmt->execute($args);

            $tab = $stmt->fetch();

            $this->set_nom($tab['nom_per']);
            $this->set_prenom($tab['prenom_per']);
            $this->set_email($tab['email_per']);
            $this->set_password($tab['password_per']);
            $this->set_news_letter($tab['news_letter_per']);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Contrôle si l'email passé en argument existe dans la base
     * @param $email
     * @return bool (true = existe)
     */
    public function check_email($email)
    {
        try {
            $query = "SELECT * FROM t_personnes WHERE email_per= :email LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $args = array();
            $args[':email'] = $email;
            $stmt->execute($args);

            $tab = $stmt->fetch();
            if ($tab['email_per'] == $email) {
                return true;
            }

        } catch (Exception $e) {
            return false;
        }
    }

    public function check_login($email, $password)
    {
        try {
            $query = "SELECT * FROM t_personnes WHERE email_per= :email LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $args = array();
            $args[':email'] = $email;
            $stmt->execute($args);


            if ($stmt->rowCount()) {
                $tab = $stmt->fetch();
                if (password_verify($password, $tab['password_per'])) {
                    $_SESSION['id'] = $tab['id_per'];
                    $_user_browser_ip = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'];
                    $_SESSION['login_string'] = password_hash($tab['password_per'].$_user_browser_ip, PASSWORD_DEFAULT);
                    $_SESSION['email'] = $tab['email_per'];
                    echo "OK";
                } else {
                    echo "KO";
                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }


    /**
     * Controle la pérénité du login
     * @return bool
     */
public function check_connect(){
       if(isset($_SESSION['id'],$_SESSION['email'],$_SESSION['login_string'])){
           $_user_browser_ip = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'];
           if(password_verify($this->get_password().$_user_browser_ip,$_SESSION['login_string'])){
               return true;
           }else{
               return false;
           }
       } else{
           return false;
       }
}






    public function add($tab){
        $this->gen_password($tab['password']);

        $args = array();
        $args['nom_per'] = $tab['nom_per'];
        $args['prenom_per'] = $tab['prenom_per'];
        $args['email_per'] = $tab['email_per'];
        $args['news_letter_per'] = $tab['news_letter_per'];
        $args['password_per'] = $this->get_password();

        try {
            $query = "INSERT INTO t_personnes SET 
            nom_per = :nom_per,
            prenom_per = :prenom_per,
            email_per = :email_per,
            password_per = :password_per,
            news_letter_per = :news_letter_per";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);

            return $this->pdo->lastInsertId();

        }catch(Exception $e){
            //echo 'Exception reçue : ', $e->getMessage(), "\n";
            return false;
        }
    }


    /**
     * Génére un hash et le stock dans l'instance
     * @param $password
     */
    public function gen_password($password){
        $this->set_password(password_hash($password, PASSWORD_DEFAULT));
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
    public function get_id_per()
    {
        return $this->id_per;
    }

    /**
     * @param mixed $id
     */
    public function set_id_per($id)
    {
        $this->id_per = $id;
    }

    /**
     * @return mixed
     */
    public function get_prenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function set_prenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function get_email()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function set_email($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function get_password()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function set_password($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function get_news_letter()
    {
        return $this->news_letter;
    }

    /**
     * @param mixed $news_letter
     */
    public function set_news_letter($news_letter)
    {
        $this->news_letter = $news_letter;
    }



} //Initialisation de la classe

?>