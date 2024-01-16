var canvas = document.getElementById("canvas");
canvas.width = $("#container").outerWidth();
canvas.height = $("#container").outerHeight();
var ctx = canvas.getContext("2d");

var canvasOffset = $("#canvas").offset();
var offsetX = canvasOffset.left + 50;
var offsetY = canvasOffset.top;

// animation variables
var currentX = 10;
var currentY = 10;
var frameCount = 60;
var timer;
var points;
var currentFrame;
const FPS = 60;
const GRID_SIZE = canvas.width / 30;
var startBattle = false;
const ENEMY_RATE = 0.25;
function animate() {
    var point = points[currentFrame++];
    draw(user, point.x, point.y);
    // refire the timer until out-of-points
    if (currentFrame < points.length) {
        timer = setTimeout(animate, FPS);
    }
    else {
        if (startBattle)
            location = "battle.html"
    }
}


function BFS(startX, startY, desX, desY, map) {
    var res = new Array();
    if (startX > desX) {
        while (startX > desX) {
            res.push({x: startX * GRID_SIZE + offsetX, y: startY * GRID_SIZE + offsetY})
            startX = startX - 1
            rate = Math.random();
            if (rate > ENEMY_RATE) {
                startBattle = true;
                return res;
            }
        }
    }
    else {
        while (startX < desX) {
            res.push({x: startX * GRID_SIZE + offsetX, y: startY * GRID_SIZE + offsetY})
            startX = startX + 1
            rate = Math.random();
            if (rate > ENEMY_RATE) {
                startBattle = true;
                return res;
            }
        }
    }
    if (startY > desY) {
        while (startY > desY) {
            res.push({x: startX * GRID_SIZE + offsetX, y: startY * GRID_SIZE + offsetY})
            startY = startY - 1
            rate = Math.random();
            if (rate > ENEMY_RATE) {
                startBattle = true;
                return res;
            }
        }
    }
    else {
        while (startY < desY) {
            res.push({x: startX * GRID_SIZE + offsetX, y: startY * GRID_SIZE + offsetY})
            startY = startY + 1
            rate = Math.random();
            if (rate > ENEMY_RATE) {
                startBattle = true;
                return res;
            }
        }
    }
    res.push({x: startX * GRID_SIZE + offsetX, y: startY * GRID_SIZE + offsetY})
    rate = Math.random();
    if (rate > ENEMY_RATE) {
        startBattle = true;
    }
    return res
}

function linePoints(x1, y1, x2, y2, frames) {
    var startX = Math.floor(x1 / GRID_SIZE);
    var startY = Math.floor(y1 / GRID_SIZE);
    var desX = Math.floor(x2 / GRID_SIZE);
    var desY = Math.floor(y2 / GRID_SIZE);
    if (desX == Math.floor(charmander.location.x / GRID_SIZE)) {
        desX = desX - 1;
        startBattle = true;
    }
    var a = BFS(startX, startY, desX, desY, '')

    return (a);
}

function draw(character, x, y) {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.beginPath();
    gridMap();
    ctx.drawImage(character.object, x, y, character.size, character.size * character.object.height / character.object.width);
    drawCharacter(charmander);
}

function handleMouseDown(e) {
    mouseX = parseInt(e.clientX - offsetX);
    mouseY = parseInt(e.clientY - offsetY);
    $("#downlog").html("Down: " + mouseX + " / " + mouseY);

    // Put your mousedown stuff here
    points = linePoints(currentX, currentY, mouseX, mouseY, frameCount);
    currentFrame = 0;
    currentX = mouseX;
    currentY = mouseY;
    animate();
    
}

function gridMap() {
    for (var x = 0.5; x < canvas.width; x += GRID_SIZE) {
        ctx.moveTo(x + offsetX, 0);
        ctx.lineTo(x + offsetX, canvas.height);
    }
    
    for (var y = 0.5; y < canvas.height; y += GRID_SIZE) {
        ctx.moveTo(0, y + offsetY);
        ctx.lineTo(canvas.width, y + offsetY);
    }
    
    ctx.strokeStyle = "#000";
    ctx.stroke();
}

function drawCharacter(character) {
    ctx.drawImage(character.object, character.location.x, character.location.y, character.size, character.size * character.object.height / character.object.width);
}

$("#canvas").mousedown(function (e) {
    handleMouseDown(e);
});

var charmander = CreateCharacter("charmander", "../materials/pokemons/charmander.png", 11 * GRID_SIZE + offsetX, 14 * GRID_SIZE + offsetY, GRID_SIZE, 0, 0)
var user = CreateCharacter("user", "../materials/moving_user.png", 1 * GRID_SIZE + offsetX, 15 * GRID_SIZE, GRID_SIZE, 0, 0)
charmander.object.onload = function() {
    gridMap();
    drawCharacter(user);
    drawCharacter(charmander);
    currentX = user.location.x;
    currentY = user.location.y;
}
gridMap();