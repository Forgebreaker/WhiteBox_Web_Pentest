<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Point</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($_SESSION["students"] as $idx => $student)
                // Duyệt qua từng học sinh và in thông tin ra màn hình
                echo <<<EOF
                    <tr>
                        <th scope="row">{$idx}</th>{$student}
                    </tr>
                EOF;
        ?>
    </tbody>
</table>