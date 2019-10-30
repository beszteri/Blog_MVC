<?php
Session::init()
?>
<h1>Edit post</h1>
<form method='post' enctype="multipart/form-data">
    <div class="form-group" >
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" value ="<?php if (isset($post["title"]))
            echo $post["title"];?>">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description"
               value ="<?php if (isset($post["description"])) echo $post["description"];?>">
    </div>
    <input type="file" name="image">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>