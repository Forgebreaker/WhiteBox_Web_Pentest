function choose(elem) {
    $(".selected").removeClass("selected");
    elem.classList.add("selected");
    $("#type_field").val(elem.innerText.toLowerCase());
}