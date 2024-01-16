var Character = makeStruct("name object location size hp str");
var Location = makeStruct("x y");

function CreateCharacter(name, imgSource, x, y, size, hp, str) {
    var characterObj = new Image();
    characterObj.src = imgSource;
    var characterLocation = new Location(x, y)
    var character = new Character(name, characterObj, characterLocation, size, hp, str);
    return character;
}


$("document").ready(function (e) {
    $('head').append(`
  <link href='https://fonts.googleapis.com/css?family=Press Start 2P' rel='stylesheet'>
  <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400&display=swap" rel="stylesheet">
    `)
});



$("#button-back-to-menu").click(function (e) {
    location = "main.html";
});

$("#new-game").click(function (e) {
    location = "login.html";
});

$("#start-game").click(function (e) {
    location = "map1.html";
});

$("#load-game").click(function (e) {
    $("#load-game-input").click();
});