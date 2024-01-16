var canvas = document.getElementById("canvas");
canvas.width = 805;
canvas.height = 678;
var ctx = canvas.getContext("2d");

var canvasOffset = $("#canvas").offset();
var offsetX = canvasOffset.left + 20;
var offsetY = 60;

// animation variables
var currentX = 10;
var currentY = 10;
var frameCount = 60;
var timer;
var points;
var currentFrame;
const FPS = 60;
const GRID_SIZE = canvas.width / 17;
const ENEMY_RATE = 0.9;
// const GRID_SIZE = 100;
var startTalking = false;
var startBattle = false;
function animate() {
    var point = points[currentFrame++];
    draw(user, point.x, point.y);
    if (currentFrame < points.length) {
        timer = setTimeout(animate, FPS);
    }
    else {
        if (startBattle) {
            setCookie("posX3", Math.floor((point.x) / GRID_SIZE));
            setCookie("posY3", Math.floor((point.y) / GRID_SIZE));
            location = "battle.html";
        }
        if (startTalking) {
            setCookie("posX3", Math.floor((point.x) / GRID_SIZE));
            setCookie("posY3", Math.floor((point.y) / GRID_SIZE));
            location = "boss2.html";
        }
    }
}


function BFS(startX, startY, desX, desY, map) {
    var res = new Array();
    if (startX > desX) {
        while (startX > desX) {
            res.push({ x: startX * GRID_SIZE + offsetX, y: startY * GRID_SIZE })
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
            res.push({ x: startX * GRID_SIZE + offsetX, y: startY * GRID_SIZE })
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
            res.push({ x: startX * GRID_SIZE + offsetX, y: startY * GRID_SIZE })
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
            res.push({ x: startX * GRID_SIZE + offsetX, y: startY * GRID_SIZE })
            startY = startY + 1
            rate = Math.random();
            if (rate > ENEMY_RATE) {
                startBattle = true;
                return res;
            }
        }
    }
    res.push({ x: startX * GRID_SIZE + offsetX, y: startY * GRID_SIZE })
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
    startTalking = false;
    startBattle = false;
    if (1 >= Math.abs(desX - Math.floor(boss2.location.x / GRID_SIZE) - 1) && 1 >= Math.abs(desY - Math.floor(boss2.location.y / GRID_SIZE) - 2)) {
        startTalking = true;
    }
    var a = BFS(startX, startY, desX, desY, '')

    return (a);
}

function draw(character, x, y) {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.beginPath();
    gridMap();
    ctx.drawImage(character.object, x, y, character.size, character.size * character.object.height / character.object.width);
    drawCharacter(boss2);
}

function handleMouseDown(e) {
    mouseX = parseInt(e.clientX - offsetX);
    mouseY = parseInt(e.clientY - offsetY);
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
        ctx.moveTo(0, y);
        ctx.lineTo(canvas.width, y);
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

var boss2 = CreateCharacter("boss2", "../materials/bosses/boss2.png", 3 * GRID_SIZE + offsetX, 7 * GRID_SIZE, GRID_SIZE * 3, 0, 0)
var user = CreateCharacter("user", "../materials/moving_user.png", 11 * GRID_SIZE + offsetX, 1 * GRID_SIZE, GRID_SIZE, 0, 0)
if (getCookie("posX3") != null) {
    user = CreateCharacter("user", "../materials/moving_user.png", getCookie("posX3") * GRID_SIZE + offsetX, getCookie("posY3") * GRID_SIZE, GRID_SIZE, 0, 0)
}
boss2.object.onload = function () {
    drawCharacter(boss2);
}

user.object.onload = function () {
    drawCharacter(user);
    currentX = user.location.x;
    currentY = user.location.y + 1;
}
gridMap();