<?PHP

namespace Core\Auth;

use Core\Database\Database;
use \PDO;

class DBAuth {

    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getUserId() {
        if ($this->logged()) {
            return $_SESSION['auth'];
        }
        return false;
    }

    public function logout() {
        if ($this->logged()) {
            $_SESSION['auth'] = NULL;
            return true;
        }    
        return false;
    }
    
    /**
     * @param $login
     * @param $password
     */
    public function subscribe($login, $password) {
        $hash = hash('whirlpool', $password);
        $array = array($login, $hash);
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$login], NULL, true);
        if (!$user) {
            $req = $this->db->prepare('INSERT INTO users VALUES ( ?, ? , NULL)', $array, NULL, false, true);
            return true;
        }
        return false;
    }
    
    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password) {
        $user = $this->db->prepare('SELECT * FROM users Where username = ?', [$username], NULL, true);
        if ($user) {
            if ($user->password === hash('whirlpool', $password)) {
                $_SESSION['auth'] = $user->username;
                return true;
            }
        }
        return false;
    }

    public function logged() {
        return isset($_SESSION['auth']);
    }
}