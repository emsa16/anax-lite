<?php
namespace Emsa\Database;

class UserDatabase extends Database
{
    /**
     * Adds user to the database
     * @param $user string The name of the user
     * @param $pass string The user's password
     * @return void
     */
    public function addUser($user, $pass)
    {
        $stmt = $this->pdo->prepare("INSERT into me_users (name, pass) VALUES ('$user', '$pass')");
        $stmt->execute();
    }

    /**
     * Gets the hashed password from the database
     * @param $user string The user to get password from/for
     * @return string The hashed password
     */
    public function getHash($user)
    {
        $stmt = $this->pdo->prepare("SELECT pass FROM me_users WHERE name='$user'");
        $stmt->execute();

        $res = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $res["pass"];
    }

    /**
     * Changes the password for a user
     * @param $user string The usr to change the password for
     * @param $pass string The password to change to
     * @return void
     */
    public function changePassword($user, $pass)
    {
        $stmt = $this->pdo->prepare("UPDATE me_users SET pass='$pass' WHERE name='$user'");
        $stmt->execute();
    }

    /**
     * Check if user exists in the database
     * @param $user string The user to search for
     * @return bool true if user exists, otherwise false
     */
    public function exists($user)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM me_users WHERE name='$user'");
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return !$row ? false : true;
    }
}
