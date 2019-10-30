<?php
class User extends Model
{
    public function create($name, $email, $password)
    {
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }

    public function findUserByEmail($email){
        $sql = "SELECT * FROM users WHERE email = ?";
        $req = Database::getBdd()->prepare($sql);
        $req->execute([$email]);
        return $req->fetch();
   
    }

    public function validateUser($email, $password){
        $user = $this->findUserByEmail($email);
        if($user['password'] == $password)
        {
            return $user;
        }
        return null;
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM users WHERE id = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }

}
