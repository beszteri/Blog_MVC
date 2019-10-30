<?php
class Post extends Model
{
    public function create($title, $description, $image)
    {
        $sql = "INSERT INTO posts (title, description, image, created_at, updated_at) VALUES (:title, :description, :image, :created_at, :updated_at)";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'title' => $title,
            'description' => $description,
            'image' => $image,
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

    public function edit($id, $title, $description, $image)
    {
        $sql = "UPDATE posts SET title = :title, description = :description , image = :image, updated_at = :updated_at WHERE id = :id";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'id' => $id,
            'title' => $title,
            'image' => $image,
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
