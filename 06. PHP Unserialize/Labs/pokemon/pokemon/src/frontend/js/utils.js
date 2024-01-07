function makeStruct(names) {
	var names = names.split(' ');
	var count = names.length;
	function constructor() {
		for (var i = 0; i < count; i++) {
			this[names[i]] = arguments[i];
		}
	}
	return constructor;
}

$("#container").ready(function (e) {
	$("#container").append(`<div class="grid-button-menu">
    <div class="dialog-menu">
        <div id="button-menu">
            <i class="fa fa-bars" style="font-size:30px;"></i>
        </div>
        <section>
            <dialog class="nes-dialog" id="dialog-menu">
                <form method="dialog">
                    <menu class="dialog-menu" style="display: flex; flex-direction: column; padding: 0;">
                        <button class="nes-btn">Back</button>
                        <button class="nes-btn is-primary" id="how-to-btn">How to play</button>
                        <button class="nes-btn is-error" id="button-character">View Info</button>
                        <button class="nes-btn is-success" id="load-game-btn">Load Game</button>
                        <input type="file" id="load-game-input" name="load-game-input" hidden>
                        <button class="nes-btn is-warning" id="save-game-btn">Save Game</button>
                    </menu>
                </form>
            </dialog>
        </section>
    </div>
    <div class="dialog-menu">
        <section>
            <dialog class="nes-dialog" id="dialog-character">
                <form method="dialog">
                    <div class="nes-container with-title is-centered">
                        <div class="grid-character-info">
                            <div class="nes-container with-title is-centered grid-general">
                                <p id="trainer-name" class="title" style="background-color: white !important;"></p>
                                <i class="nes-ash"></i>
                            </div>
                            <div class="nes-container with-title is-centered grid-image">
                                <p id="pokemon-name" class="title" style="background-color: white !important;"></p>
                                <i id="pokemon-icon"></i>
                            </div>
                            <div class="nes-container with-title is-centered grid-detail">
                                <table class="nes-table info-detail-pokemon">
                                    <tbody>
                                        <tr>
                                            <td><i class="nes-icon star"></i>Strength</td>
                                            <td>:</td>
                                            <td id="pokemon-str"></td>
                                        </tr>
                                        <tr>
                                            <td><i class="nes-icon heart"></i>Health</td>
                                            <td>:</td>
                                            <td id="pokemon-hp"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <menu class="dialog-menu" style="display: flex; flex-direction: column; padding: 0;">
                        <button class="nes-btn is-primary">Back</button>
                    </menu>
                </form>
            </dialog>
        </section>
    </div>
    <div class="dialog-menu">
        <section>
            <dialog class="nes-dialog" id="dialog-howto">
                <form method="dialog">
                    <div class="nes-container with-title is-centered grid-general">
						<p class="title" style="background-color: white !important;">How to play</p>
						<p style="background-color: white !important;">
							Use mouse to move and interact with NPC.
						</p>
                    </div>
                    <menu class="dialog-menu" style="display: flex; flex-direction: column; padding: 0;">
                        <button class="nes-btn is-primary">Back</button>
                    </menu>
                </form>
            </dialog>
        </section>
    </div>
</div>`)

	$("#button-menu").click(function (e) {
		document.getElementById('dialog-menu').showModal();
	});

	$("#load-game-btn").click(function (e) {
		$("#load-game-input").click();
	})

	$("#load-game-input").change(function (e) {
		var fd = new FormData();
		var files = $("#load-game-input")[0].files[0];
		fd.append("data", files);
		$.ajax({
			url: "/backend/save-load.php?action=load",
			type: "post",
			data: fd,
			contentType: false,
			processData: false,
			success: function (response) {
				alert(response);
				if (response == "Load successfully") {
					if (location.pathname == '/frontend/html/main.html' || location.pathname == '/frontend/html/new_game.html') {
						location.href = "/frontend/html/map1.html"
					}
					else {
						location.reload();
					}
				}
			},
		});
	})

	$("#save-game-btn").click(function (e) {
		location.href = "/backend/save-load.php?action=save";
	})

	$("#button-character").click(function (e) {
		$.get("/backend/helper/info.php").done(function (data) {
			data = JSON.parse(data);
			$("#trainer-name").text("Trainer " + data["name"]);
			$("#pokemon-name").text(data["pokemon"]["name"]);
			$("#pokemon-icon").addClass("nes-" + data["pokemon"]["type"]);
			$("#pokemon-str").text(data["pokemon"]["damage"]);
			$("#pokemon-hp").text(data["pokemon"]["health"]);
			document.getElementById('dialog-character').showModal();
		})
	})

	$("#how-to-btn").click(function (e) {
		document.getElementById('dialog-howto').showModal();
	})
})

function setCookie(name, value, days) {
	var expires = "";
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toUTCString();
	}
	document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}