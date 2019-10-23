<?php


class Post {

    private $id;
    private $title;
    private $posted_at;
    private $post;
    private $image;

    public function __construct($id, $title, $posted_at, $post, $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->posted_at = $posted_at;
        $this->post = $post;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPostedAt()
    {
        return $this->posted_at;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function getImage()
    {
        return $this->image;
    }

}