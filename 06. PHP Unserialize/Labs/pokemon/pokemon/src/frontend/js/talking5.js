var ChatContent = makeStruct("who content");
var ListChatContent = [];
ListChatContent.push(new ChatContent("npc", "This really is the end!"))
ListChatContent.push(new ChatContent("npc", "You dont have any action in this level"))
ListChatContent.push(new ChatContent("user", "Yes..."))
ListChatContent.push(new ChatContent("npc", "Please quit and don't try to hack this game"))
ListChatContent.push(new ChatContent("npc", "And I don't think you can"))
ListChatContent.push(new ChatContent("npc", "(Unless you learn special skill from CyberJutsu)"))
ListChatContent.push(new ChatContent("user", "!!!???"))
ListChatContent.push(new ChatContent("npc", "Forgot what I just said, please <a href='map5.html'>leave</a>"))
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

$("#secret-form").submit(function (e) {

})
