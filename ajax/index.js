function loadOverview() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("box").innerHTML = this.response;
    }
  };
  xhttp.open("GET", "./ajax/ajax_info.php", true);
  xhttp.send();
}

function loadUsers() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("box").innerHTML = this.response;
    }
  };
  xhttp.open("GET", "./ajax/users.php", true);
  xhttp.send();
}

function loadAdmins() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("box").innerHTML = this.response;
    }
  };
  xhttp.open("GET", "./ajax/admins.php", true);
  xhttp.send();
}

function loadCategories() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("box").innerHTML = this.response;
    }
  };
  xhttp.open("GET", "./ajax/categories.php", true);
  xhttp.send();
}

function loadQuestions() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("box").innerHTML = this.response;
    }
  };
  xhttp.open("GET", "./ajax/questions.php", true);
  xhttp.send();
}

function loadComments() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("box").innerHTML = this.response;
    }
  };
  xhttp.open("GET", "./ajax/comments.php", true);
  xhttp.send();
}

window.onload = loadOverview();
