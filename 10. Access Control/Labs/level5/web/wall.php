<?php
include("libs/auth.php");
include("static/html/header.html");
?>
<html>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <a class="navbar-brand" href="/wall.php">
            <h2 class="text-primary font-weight-bolder">fakebook v5</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/wall.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php?action=logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <div id="div-notifications" class="row mt-5">
            <div class="col-sm-12 mt-5 mb-3 text-center">
                <h2>System notifications</h2>
            </div>
            <div class="col-sm-12 text-center">
                <div id="notifications_feed"></div>
            </div>
        </div>
        <div class="row mt-5 justify-content-sm-center">
            <div id="div-online" class="col-sm-12 mt-5 text-center">
                <h2>Online users</h2>
                <a href="/wall.php?user_id=1">admin</a><br>
                <a href="/wall.php?user_id=2">crush</a><br>
            </div>
            <div id="div-create-post" class="col-sm-12 mt-5 text-center">
                <h2>What's on your mind?</h2>
            </div>
            <div id="div-form-create-post" class="col-sm-4">
                <form action="/post.php?action=create" method="POST">
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" class="form-control" id="content" name="content">
                    </div>
                    <div class="form-group">
                        <label for="public">Who can see your post?</label>
                        <select name="public" id="public">
                            <option value="0">🔒 Only me</option>
                            <option value="1">🌐 Public</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12 mt-5 text-center">
                <h2>Posts</h2>
            </div>
            <div class="col-sm-12 text-center">
                <div id="wall"></div>
            </div>
        </div>

    </div>
    <script src="/static/js/app.js"></script>
</body>

</html>