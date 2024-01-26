var user_id = new URL(location.href).searchParams.get('user_id');

async function list_posts() {
    var url = "/post.php?action=list_posts" + (user_id ? `&user_id=${user_id}` : "");
    var response = await fetch(url);
    return await response.json()
}

async function read_post(post_id) {
    var url = `/post.php?action=read&id=${post_id}`;
    var response = await fetch(url);
    return await response.json()
}

function main() {
    if (user_id) {
        try {
            document.getElementById("div-create-post").style.display = "none";
            document.getElementById("div-form-create-post").style.display = "none";
            document.getElementById("div-online").style.display = "none";    
        } catch (e) {}
    }
    
    list_posts().then(function (posts) {
        var wall = document.getElementById("wall");
        posts.forEach(async function (post) {
            var p = document.createElement("p");
            if (post.public == "1") {
                await read_post(post.post_id).then(function (post_data) {
                    p.innerText = "🌐 " + post_data["content"];
                })
            } else {
                if (location.href.includes("user_id")) {
                    p.innerHTML = "🔒 <i>You don't have permission to view this content</i>";
                } else {
                    await read_post(post.post_id).then(function (post_data) {
                        p.innerText = "🔒 " + post_data["content"];
                    })    
                }
            }
            wall.appendChild(p);
        })
    });
}

main();