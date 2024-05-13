// Close the dropdown when clicking outside of it
window.onclick = function (event) {
  if (!event.target.matches(".btn")) {
    var dropdowns = document.getElementsByClassName("content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.style.display === "block") {
        openDropdown.style.display = "none";
      }
    }
  }
};

// Toggle message content
document.getElementById("messageBtn").addEventListener("click", function () {
  var messageContent = document.getElementById("messageContent");
  if (messageContent.style.display === "block") {
    messageContent.style.display = "none";
  } else {
    messageContent.style.display = "block";
  }
});

// Toggle notification content
document
  .getElementById("notificationBtn")
  .addEventListener("click", function () {
    var notificationContent = document.getElementById("notificationContent");
    if (notificationContent.style.display === "block") {
      notificationContent.style.display = "none";
    } else {
      notificationContent.style.display = "block";
    }
  });
