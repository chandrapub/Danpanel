window.onload = function () {
  var modals = document.getElementsByClassName(".w3-modal");
  var windows = document.getElementsByClassName(".w3-modal-content");

  var clearModal = function () {
    location.hash = '';
  };

  for (var i = 0; i < modals.length; i++) {
    modals[i].addEventListener('click', clearModal, false);
  }
  for (var i = 0; i < windows.length; i++) {
    windows[i].addEventListener('click', function () {
      event.stopPropagation();
      event.cancelBubble = true;
    }, false);
  }
  document.body.addEventListener('keydown', function () {
    if (event.keyCode == 27) {
      location.hash = '';
      clearModal();
    }
  }, false);
};