var ChatContent = makeStruct("who content");
var ListChatContent = [];
ListChatContent.push(new ChatContent("npc", "Welcome to Pokemon World."))
ListChatContent.push(new ChatContent("npc", "This a world where every trainer want to defeat all the Pokemon"))
ListChatContent.push(new ChatContent("npc", "To do so, you must have a starter Pokemon"))
ListChatContent.push(new ChatContent("user", "Yeah I already have one"))
ListChatContent.push(new ChatContent("npc", "That's good."))
ListChatContent.push(new ChatContent("npc", "Now you have to fight other Pokemon to grow up, and become stronger"))
ListChatContent.push(new ChatContent("user", "Yes!!!"))
ListChatContent.push(new ChatContent("npc", "(Or maybe just learn hacking with CyberJutsu and break this game, who knows...)"))
ListChatContent.push(new ChatContent("user", "???!!!!"))
ListChatContent.push(new ChatContent("npc", "You should leave now"))
ListChatContent.push(new ChatContent("npc", "<a href='map2.html'>Click here to leave</a>"))
var i = 0;
function handleMouseDown(e) {
    if (i < ListChatContent.length) {
        if (ListChatContent[i].who == "npc") {
            $(".message-list").append(`<section class="message-left" style="float:left">
            <img src="../materials/npcs/npc1.png" width="80px"/>
            <div class="nes-balloon from-left" id="npc-ballon">
                <p class="chat-ballon" id="npc-chat">${ListChatContent[i].content}</p>
            </div>
          </section>`);
          $(".message-list").animate({ scrollTop: 300 * i }, 1000);
        } else {
            $(".message-list").append(`<section class="message-right" style="float:right;">
            <div class="nes-balloon from-right" id="user-ballon">
              <p class="chat-ballon" id="user-chat" autofocus>${ListChatContent[i].content}</p>
            </div>
            <img src="../materials/moving_user.png" width="80px"/>
          </section>`);
          
          $(".message-list").animate({ scrollTop: 300 * i }, 1000);
        }
        i = i + 1;
    }
}

$(".message-list").mousedown(function (e) {
    handleMouseDown(e);
});
