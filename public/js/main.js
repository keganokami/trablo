
(function() {
  'use strict';
  var cmds = document.getElementsByClassName('del');
  var i;

  for (i = 0; i < cmds.length; i++) {
    cmds[i].addEventListener('click', function(e) {
      e.preventDefault();
      if (confirm('選択された内容を削除します よろしければOKを押してください')) {
        document.getElementById('form_' + this.dataset.id).submit();
      }
    });
  }

})();
