function getValue(to) {
    var selected = document.getElementById("list");
    var value = selected.options[selected.selectedIndex].text;
    window.location.href = "znacky.php?" + to + "=" + value;
}