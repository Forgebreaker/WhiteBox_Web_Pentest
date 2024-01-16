var ChatContent = makeStruct("who content");
var ListChatContent = [];
ListChatContent.push(new ChatContent("npc", "Tìm hiểu nguyên nhân, nguyên căn của một lỗi bảo mật, quá trình đó sẽ giúp mình ghi nhớ sâu hơn "))
ListChatContent.push(new ChatContent("npc", "Và tất nhiên càng hiểu về nó thì mình càng có thể đặt nhiều giả thiết torng quá trình tìm lỗi bảo mật hơn."))
ListChatContent.push(new ChatContent("npc", "Như chúng ta đều đã biết, khi những tính năng ra đời, nhất là những tính năng phức tạp thì rất dễ kèm theo đó là những rủi ro tiềm tàng"))
ListChatContent.push(new ChatContent("npc", "Thế tính năng đó là gì? Thì mình có 1 ví du minh họa"))
ListChatContent.push(new ChatContent("npc", "Ai từng chơi game, nhất là những game offline thì đều có một tính năng cho phép người chơi save game lại."))
ListChatContent.push(new ChatContent("npc", "Ở đây mình lấy ví dụ là một game rất kinh điển là Pokémon"))
ListChatContent.push(new ChatContent("npc", "Ta có thể lưu file save game xuống một thiết bị lưu trữ, sau đó sang máy tính khác chúng ta có thể load nó lên lại đúng không."))
ListChatContent.push(new ChatContent("npc", "Okay mình sẽ cùng bắt tay vào mô tả xem quá trình này được thực hiện như thế nào"))
ListChatContent.push(new ChatContent("npc", "Như các bạn biết để lập trình game này thì chắc chắn chúng ta phải dùng phương pháp lập trình hướng đối tượng OOP để quản lý những đối tượng trong game rồi."))
ListChatContent.push(new ChatContent("npc", "Sau đó tất cả các đối tượng này sẽ được chụp lại trạng thái ngay tại khoảnh khắc này, và chuyển hóa nó thành chuỗi dữ liệu sau đó lưu trữ nó xuống."))
ListChatContent.push(new ChatContent("npc", "Ở quá trình load game thì ngược lại thôi."))
ListChatContent.push(new ChatContent("npc", "Chương trình game sẽ cố gắng đọc các chuỗi dữ liệu từ thiết bị lưu trữ và khôi phục lại trạng thái của trò chơi"))
ListChatContent.push(new ChatContent("user", "Ồ, vậy ra Serialize là quá trình <u>chuyển hóa trạng thái</u> của một đối tượng trở thành một chuỗi dữ liệu mà ta có thể <u>lưu trữ</u> hoặc <u>truyền đi</u>"))
ListChatContent.push(new ChatContent("user", "Unserialize là quá trình ngược lại của Serialize: từ chuỗi dữ liệu nhận được, <u>tái tạo lại trạng thái</u> của đối tượng"))
ListChatContent.push(new ChatContent("npc", "Chính xác"))
ListChatContent.push(new ChatContent("user", "Yes..."))
ListChatContent.push(new ChatContent("user", "Yes..."))
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
