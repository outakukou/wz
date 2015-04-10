/**
 * Created by aibo on 2015/3/18.
 */
function dShow (){
    var struc='<div class="mask-dialog"></div>'+
                '<div class="close-dialog-content"></div>'+
                '<div class="content-dialog">'+
                    '<ul class="l-dialog-create">'+
                        '<li class="li-dialog-create"><span class="link-dialog-create">图文</span></li>'+
                        '<li class="li-dialog-create"><span class="link-dialog-create">链接</span></li>'+
                        '<li class="close-dialog"></li>'+
                    '</ul>'+
                '</div>';
    $('body').append(struc);
}
function dClose (){
    $('.mask-dialog').hide().remove();
    $('.close-dialog-content').hide().remove();
    $('.content-dialog').hide().remove();
}

$('.js-type-create').click(function(){
    dShow();

    $('.li-dialog-create').click(function(){
        var txt=$(this).children('.link-dialog-create').text();
        var ndx=$(this).index();
        var originDom=$('.type-create-normal').html();
        var targetDom=txt+''+originDom;
        $('[the-id=toggleBox]:eq('+ndx+')').show().siblings('[the-id=toggleBox]').hide();
        $('[the-id=toggleBox]').find('[the-id=typeTxt]').text(txt);
        $('[the-id=toggleBox]').find('[the-id=hiddenType]').val(txt);
        $('[the-id=toggleBox]:eq('+ndx+')').find('[the-id=typeTxt]').text(txt);
        $('[the-id=toggleBox]:eq('+ndx+')').find('[the-id=hiddenType]').val(txt);
        dClose();
    });

    $('.close-dialog-content').click(function(){
        dClose();
    });
});

/*
$('[the-id=addBtn]').click(function(){
    var thisDom=$(this).parents('[ the-id=toggleBox]').find('[the-id=toAdd]').show();
});
*/