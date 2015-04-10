/**
 * Created by aibo on 2015/3/19.
 */
$(window).ready(function(){
    var h=Math.max($(document).height(),$('body').height());
    $('.container').css({'min-height':h});
    $('.container-blue').css({'min-height':h});
});
