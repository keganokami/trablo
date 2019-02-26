jQuery.noConflict();
jQuery(function($) {
  $('#example').DataTable({

  language: {
   "decimal": ".",
   "thousands": ",",
   "sProcessing": "処理中...",
   "sLengthMenu": "表示件数:_MENU_ ",
   "sZeroRecords": "検索された投稿はありません。",
   "sInfo": " _TOTAL_ 件中 _START_ から _END_ まで表示",
   "sInfoEmpty": " 0 件中 0 から 0 まで表示",
   "sInfoFiltered": "（全 _MAX_ 件より抽出）",
   "sInfoPostFix": "",
   "sSearch": "投稿の検索:",
   "sUrl": "",
   "oPaginate": {
   "sFirst": "先頭",
   "sPrevious": "前",
   "sNext": "次",
   "sLast": "最終"
   }
  },
  order: [ [ 2, "desc" ] ]
  });

});
