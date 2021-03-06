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

    public function saveCom($com, $username, $id_photo) {
        $array = array($com, $username, $id_photo);
        $ret = $this->db->prepare('INSERT INTO comments VALUES (?, ?, ?)', $array, NULL, false, true);
    }

    public function printCom($id) {
        if (isset($id))
            return $this->db->query('SELECT * FROM comments WHERE id=\'' . $id . '\'');
        else
            return $this->db->query('SELECT * FROM comments');
    }
}