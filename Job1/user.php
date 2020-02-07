<?php
class User
{

    private $id ;
    public $login ;
    public $password ;
    public $email ;
    public $firstname ;
    public $lastname ;

    public function register($login, $password, $email, $firstname, $lastname)
    {

        $bdd = mysqli_connect("localhost", "root", "", "users");
        var_dump($connexion);
        $request2 = "INSERT INTO `users`( `login`, `password`, `email`, `firstname`, `lastname`) VALUES ('$login','$password ','$email','$firstname',' $lastname')";
        var_dump($request2);
        $query2 =  mysqli_query($bdd, $request2);
        var_dump($query2);
    }

    public function connect($login, $password)
    {
        $connexion = mysqli_connect("localhost", "root", "", "users");
        $requestco = "SELECT * from users WHERE login='$login'";
        $result = mysqli_query($connexion,$requestco);
        $table = mysqli_fetch_array($result);
        $this->id=$table['id'];
        $this->login=$table['login'];
        $this->password=$table['password'];
        $this->email=$table['email'];
        $this->firstname=$table['firstname'];
        $this->lastname=$table['lastname'];

        var_dump($table);
    }

    public function disconnect()
    {
    session_destroy();
    echo"vous êtes bien deconnecté";
    }
    public function delete()
    {
        $bdd = new PDO('mysql:host=localhost;bddname = users',"root","");
        $query = $bdd -> query("DELETE*FROM users WHERE login = `$login`");
        session_destroy();
        return `données supprimés`;
    }

    public function update($login,$email,$firstname,$lastname)
    {
        if(isset($SESSION['login']))
        {
            $bdd = new PDO('mysql:host=localhost;bddname=users',"root","");
            $login = $_SESSION['login'];
            $query = $bdd->query("UPDATE utilisateurs SET login='$login', email='$email',firstname='$firstname', lastname='$lastname' WHERE login='$log'");
            return "données changés";
        }
    }
   public function isConnected()
   {
    $bool = FALSE;
    if(isset($_SESSION['login']))
    {
        return $bool=TRUE;
        return "vous êtes bien connecté";
    }
    else
    {
        return "vous n'êtes pas connecté";
    }
   }
}





$user = new User();
//$user->register("zac", "motdepasse", "Z.Z@live.fr", "zaccaria", "ziani");
$result = $user->connect("zac","motdepasse");
$disconnect = $user -> disconnect();
var_dump($result);
var_dump($user);


?>