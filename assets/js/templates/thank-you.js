window.onbeforeunload = function(e) {
  e.returnValue = 'onbeforeunload';
  return 'onbeforeunload';
};