async function list_posts() {
    var url = "/post.php?action=list_posts";
    var response = await fetch(url);
    return await response.json()
}

async function read_post(post_id) {
    var url = `/post.php?action=read&id=${post_id}`;
    var response = await fetch(url);
    return await response.json()
}

function main() {
    list_posts().then(function (posts) {
        var wall = document.getElementById("wall");
        posts.forEach(async function (post) {
            var p = document.createElement("p");
            if (post.public == "1") {
                await read_post(post.post_id).then(function (post_data) {
                    p.innerText = "🌐 " + post_data["content"];
                })
            } else {
                await read_post(post.post_id).then(function (post_data) {
                p.innerText = "🔒 " + post_data["content"];
                })
            }
            wall.appendChild(p);
        })
    });
}

main();