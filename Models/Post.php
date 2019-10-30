<?php
class Post extends Model
{
    public function create($title, $description)
    {
        $sql = "INSERT INTO posts (title, description, created_at, updated_at) VALUES (:title, :description, :created_at, :updated_at)";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'title' => $title,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }

    public function showPost($id)
    {
        $sql = "SELECT * FROM posts WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function showLimitedPost($from) {
        $sql = "SELECT * FROM posts LIMIT " . $from . "," . 10 . ";";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        $limitedPosts = $req->fetchAll(PDO::FETCH_ASSOC);
        return $limitedPosts;
    }

    public function showAllPosts()
    {
        $sql = "SELECT * FROM posts";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function edit($id, $title, $description)
    {
        $sql = "UPDATE posts SET title = :title, description = :description , updated_at = :updated_at WHERE id = :id";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM posts WHERE id = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }
}
