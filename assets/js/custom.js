function getValue(to) {
    const selected = document.getElementById("list");
    const value = selected.options[selected.selectedIndex].text;
    window.location.href = "znacky.php?" + to + "=" + value;
}

