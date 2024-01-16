var canvas = document.getElementById("canvas");
canvas.width = $("#container").outerWidth();
canvas.height = $("#container").outerHeight();


var ctx = canvas.getContext("2d");

var canvasOffset = $("#canvas").offset();
var offsetX = canvasOffset.left + 50;
var offsetY = canvasOffset.top;

// animation variables
var frameCount = 60;
var timer;
var points;
var currentFrame;
var round = 1
const FPS = 60;
const GRID_SIZE = canvas.width / 10;
const shakeDuration = 500;
var shakeStartTime = -1;

function attack() {
    requestAnimationFrame(attack);
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    preShake();
    drawCharacter(underAttackedCharacter);
    postShake();
    drawCharacter(attackCharacter);
    ctx.drawImage(heart.object, underAttackedCharacter.location.x + 50, underAttackedCharacter.location.y - 50, heart.size, heart.size * heart.object.height / heart.object.width);
}

function healthDown(underAttackedCharacter, health) {
    underAttackedCharacter.hp = health;
    $("#" + underAttackedCharacter.name + "-hp").html(underAttackedCharacter.hp);
}

function drawCharacter(character) {
    ctx.drawImage(character.object, character.location.x, character.location.y, character.size, character.size * character.object.height / character.object.width);
    $("#" + character.name + "-hp").html(character.hp);
    $("#" + character.name + "-str").html(character.str);
}

function preShake() {
    if (shakeStartTime == -1) return;
    var dt = Date.now() - shakeStartTime;
    if (dt > shakeDuration) {
        shakeStartTime = -1;
        return;
    }
    var easingCoef = dt / shakeDuration;
    var easing = Math.pow(easingCoef - 1, 3) + 1;
    ctx.save();
    var dx = easing * (Math.cos(dt * 0.1) + Math.cos(dt * 0.3115)) * 15;
    var dy = easing * (Math.sin(dt * 0.05) + Math.sin(dt * 0.057113)) * 15;
    ctx.translate(dx, dy);
}

function postShake() {
    if (shakeStartTime == -1) return;
    ctx.restore();
}

function animate() {
    if (round > 0) {
        attackCharacter = userPokemon
        underAttackedCharacter = pikachu
        shakeStartTime = Date.now()
        attack();
        healthDown(underAttackedCharacter, result[index][1]);
    } else {
        attackCharacter = pikachu
        underAttackedCharacter = userPokemon
        shakeStartTime = Date.now()
        attack();
        healthDown(underAttackedCharacter, result[index][0]);
        index++;
    }
    round *= -1
    // refire the timer until out-of-points
    if (index < result.length) {
        timer = setTimeout(animate, FPS * 10);
    } else {
        if (userPokemon.hp > 0) {
            $("#battle-result").html("You win!!!");
            $("#return-btn").attr("link", "map3.html");
        } else {
            $("#battle-result").html("You lose!!!");
            $("#return-btn").attr("link", "new_game.html");
        }
        document.getElementById('dialog-default').showModal();
    }
}

$("#action-fight").click(function (e) {
    e.preventDefault();
    $.post("/backend/index.php?level=map3", { "action": "fight" }).done(function (data) {
        data = JSON.parse(data);
        result = data;
        if (result.length == 0)
            return;        
        animate();
    })
});

$("#action-run").click(function (e) {
    e.preventDefault();
    $.post("/backend/index.php?level=map3", { "action": "run" }).done(function (data) {
        $("#battle-result").html(data);
        if (data == "You escaped")
            $("#return-btn").attr("link", "map3.html");
        else    
            $("#return-btn").attr("link", "");
        document.getElementById('dialog-default').showModal();
    })
})

$("document").ready(function (e) {
    $.post("/backend/index.php?level=map3", { "action": "new_battle" }).done(function (data) {
        data = JSON.parse(data);
        userPokemon = CreateCharacter("user", `../materials/pokemons/${data[0]["type"]}.png`, 0.07 * canvas.width, 0.65 * canvas.height, GRID_SIZE * 1.2, data[0]["health"], data[0]["damage"]);
        pikachu = CreateCharacter("wild", "../materials/pokemons/pikachu.png", 0.7 * canvas.width, 0.15 * canvas.height, GRID_SIZE, data[1]["health"], data[1]["damage"]);
        pikachu.object.onload = function () {
            drawCharacter(pikachu);
        }
        
        userPokemon.object.onload = function () {
            drawCharacter(userPokemon);
        }
    })
});
var pikachu
var heart = CreateCharacter("heart", "../materials/heart.png", 100, 100, 30, 0, 0)

var userPokemon
var attackCharacter = userPokemon
var underAttackedCharacter = pikachu



var result 
var index = 0;
var round = 1;
