<?php
/**
 * Created by PhpStorm.
 * User: rpatillo
 * Date: 8/22/16
 * Time: 4:31 PM
 */

namespace Core\Auth;

use Core\Database\Database;
use \PDO;

class Photos
{
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function savePic($photo, $username) {
        if (isset($photo) && isset($username)) {
            $array = array($photo, $username);
            $req = $this->db->prepare('INSERT INTO photo VALUES ( ?, ? , NULL)', $array, NULL, false, true);
            return true;
        }
        return false;
    }

    public function printPic($username) { //, $one, $id_pict) {
        if (isset($username)) {
            $pict = $this->db->query('SELECT * FROM photo WHERE username=\''. $username . '\'');
        } else {
            $pict = $this->db->query('SELECT * FROM photo');
        }
        return $pict;
    }
}