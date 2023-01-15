function update_information(name, value) {
  if (value.length == 0) {
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert(this.response);
      }
    };
    xmlhttp.open("GET", "handling/handling_information_update.php?name=" + name + "&value=" + value, true);
    xmlhttp.send();
  }
}
