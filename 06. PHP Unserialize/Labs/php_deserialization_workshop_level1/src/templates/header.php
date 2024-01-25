<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</head>
<br />
<br />
<h3 class="display-4 text-center">PHP Object Injection Workshop</h3>
<h4 id="level" class="display-4 text-center">Level 1</h4>
<p class="display-5 text-center">Goal: RCE me!</p>
<div class="container mt-5">
    <form method="post">
        <div class="row">
            <div class="col-4">
                <input type="text" placeholder="name" class="form-control" name="name" required>
            </div>
            <div class="col-4">
                <input type="text" placeholder="age" class="form-control" name="age" required>
            </div>
            <div id="submit-group" class="col-4">
                <button type="submit" class="btn btn-primary">Insert new student</button>
            </div>
        </div>
    </form>