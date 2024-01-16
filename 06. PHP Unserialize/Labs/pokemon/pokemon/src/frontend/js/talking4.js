var ChatContent = makeStruct("who content");
var ListChatContent = [];
ListChatContent.push(new ChatContent("npc", "You travel this far. But this should be the end"))
ListChatContent.push(new ChatContent("npc", "You can defeat every pokemon in this world"))
ListChatContent.push(new ChatContent("user", "Yes..."))
ListChatContent.push(new ChatContent("npc", "But if you want to pass this level"))
ListChatContent.push(new ChatContent("npc", "You have to give me a secret from the server"))
ListChatContent.push(new ChatContent("npc", "Tell me child, what is the secret?"))
ListChatContent.push(new ChatContent("user", `The secret is <form id="secret-form" action=../../backend/helper/check_secret.php><input type="text" id="name_field" class="nes-input" style="width:300px" name="secret"><br><button class="nes-btn" type="submit">Submit</button></form>`))
var i = 0;
function handleMouseDown(e) {
    if (i < ListChatContent.length) {
        if (ListChatContent[i].who == "npc") {
            $(".message-list").append(`<section class="message-left" style="float:left">
            <img src="../materials/npcs/npc2.png" width="80px"/>
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
