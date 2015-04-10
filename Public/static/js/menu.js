/**
 * Created by aibo on 2015/3/11.
 */
(function(){
    $('.l-tools-wz .more').click(function(){
        $('.l-set-tools').show();
        $('.mask-tools-wz').show();
        var setH=$('.icon-set-tools img').height(),
            toolH=$('.icon-li-tools img').height(),
            forkH=$('.fork-li-tools img').height(),
            cssH=toolH+'px',
            cssFh=forkH+'px';
        $('.icon-set-tools').height(setH);
        $('.icon-li-tools').height(toolH);
        $('.fork-li-tools').height(forkH);
        $('.text-li-tools').height(toolH).css('line-height',cssH);
        $('.js-text-fork').height(forkH).css('line-height',cssFh);
    });
    $('.fork-li-tools').click(function(){
        $('.l-set-tools').fadeOut();
        $('.mask-tools-wz').fadeOut();
    });

    $('.l-tools-wz .collect').click(function(){
        $('.box-collect-wz').show();
        $('.mask-collect-wz').show();

    });
    $('.close-collect-wz').click(function(){
        $('.box-collect-wz').hide();
        $('.mask-collect-wz').hide();
    });
})();