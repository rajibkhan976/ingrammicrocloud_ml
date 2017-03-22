jQuery(document).ready(function($){
    $('#wpfdlaunch').leanModal({ top : 20});
    $('body').append('<div id="wpfdmodal"><iframe id="wpfdmodalframe" width="100%" height="100%" marginWidth="0" marginHeight="0" frameBorder="0" scrolling="auto" src="admin.php?page=wpfd&noheader=1&caninsert=1" /></div>');
   return false;
});
