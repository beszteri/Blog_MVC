<h1>Posts</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="/blogmvc/posts/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new post</a>
        <tr>
            <th>ID</th>
            <th>Post</th>
            <th>Description</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>

        <?php



        foreach ($posts as $post)
        {
            echo '<tr>';
            echo "<td>" . $post['id'] . "</td>";
            echo "<td>" . $post['title'] . "</td>";
            echo "<td>" . $post['description'] . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/blogmvc/posts/edit/" . $post["id"] . "' >
            <span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/blogmvc/posts/delete/" . $post["id"] . "'
             class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>



</div>