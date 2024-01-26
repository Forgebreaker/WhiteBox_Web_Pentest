<?php
    if(isset($_POST['command'],$_POST['target'])){
        $command = $_POST['command'];
        $target = $_POST['target'];
        switch($command) {
			case "backup":
                $result = shell_exec("timeout 3 zip /tmp/$target -r /var/www/html/index.php 2>&1");
                if ($result !== null && strpos($result, "zip error") === false)
                    die("Backup thành công");
                else
                    die("Backup không thành công");
				break;
            // CHANGELOG: Bảo trì
			// case "ping":
			// 	$result = shell_exec("timeout 10 ping -c 4 $target 2>&1");
			// 	break;
			// case "nslookup":
			// 	$result = shell_exec("timeout 10 nslookup $target 2>&1");
			// 	break;	
			// case "dig":
			// 	$result = shell_exec("timeout 10 dig $target 2>&1");
			// 	break;
		}
        die("Một số chức năng đang được bảo trì. Mời bạn nạp tiền để có thể tiếp tục duy trì dự án");
    }
?>
<html>
<head>
    <title>whois tool version 2.0</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/sketchy/bootstrap.min.css" integrity="sha384-RxqHG2ilm4r6aFRpGmBbGTjsqwfqHOKy1ArsMhHusnRO47jcGqpIQqlQK/kmGy9R" crossorigin="anonymous">
    <lin rel="stylesheet" href="https://getbootstrap.com/docs/4.0/examples/cover/cover.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
    <style>
        pre {
    white-space: pre-wrap;       /* Since CSS 2.1 */
    white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
    white-space: -pre-wrap;      /* Opera 4-6 */
    white-space: -o-pre-wrap;    /* Opera 7 */
    word-wrap: break-word;       /* Internet Explorer 5.5+ */
}
    </style>
</head>
<body>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                    <h1 class="cover-heading">whois tool Level 6</h1>
                    <form action="#" id=frm_tool>
                    <select name=command>
                        <option value="backup">backup</option>
                        <option value="nslookup">nslookup</option>
                        <option value="ping">ping</option>
                        <option value="dig">dig</option>
                    </select>
                        <input type=text name=target />
                        <button class="btn btn-primary">check</button>
                    </form>
                    <pre id=result></pre>
            </div>
            <div class="row">
        	<button class="btn btn-primary" onclick="nextLevel()">Next level</button>
		</div>
    </div>
</div>

</body>
<script>
    function nextLevel() {
        const url = new URL(origin);
        url.port = (parseInt(url.port) + 1).toString();
        location.href = url.toString();
    }
    var frm_tool = document.getElementById('frm_tool');
    var result_div = document.getElementById('result');

    function logSubmit(event) {
        event.preventDefault();
        result_div.innerHTML = `<img style="position:absolute; top: 5px; left: 0; margin-left: auto; margin-right: auto; right: 0; border: 0;" src="data:image/gif;base64,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"/>`;
        $.post('index.php',$(frm_tool).serialize(),function(data){
            result_div.innerText = data;
        });
    }
    frm_tool.addEventListener('submit', logSubmit);
</script>
</html>
