$(window).load(function () {
    //初期値セット 全て１つ目のアソートを選択状態に
    var txt = $('[name=assort1] option:selected').text();
    $('input#assort1').attr('value', txt);
    var txt = $('[name=assort2] option:selected').text();
    $('input#assort2').attr('value', txt);
    var txt = $('[name=assort3] option:selected').text();
    $('input#assort3').attr('value', txt);
    var txt = $('[name=assort4] option:selected').text();
    $('input#assort4').attr('value', txt);
    var txt = $('[name=assort5] option:selected').text();
    $('input#assort5').attr('value', txt);
    var txt = $('[name=assort6] option:selected').text();
    $('input#assort6').attr('value', txt);
    
    //初期画像をcapture
    setTimeout(function(){screenshot('#detail_image_box__item--1')}, 200);
    //screenshot('#item_photo_area');
    
    $('select[name=assort1]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort1]').val();
        console.log(val);
        // 選択したアソートを商品画面にセット
        $("#assort1").css("background-image", 'url('+val+')');
        
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort1] option:selected').text();
        console.log(txt);
        //formの値を選択されているものに変える
        $(':text[name="assort1"]').val(txt);
        $('input#assort1').attr('value', txt);
        //screenshot('#item_photo_area');
        setTimeout(function(){screenshot('#detail_image_box__item--1')}, 200);
        //capture.postMessage('#item_photo_area');
        
    });
    
    $('select[name=assort2]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort2]').val();
        console.log(val);
        // 選択したアソートを商品画面にセット
        $("#assort2").css("background-image", 'url('+val+')');
        
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort2] option:selected').text();
        console.log(txt);
        //formの値を選択されているものに変える
        $(':text[name="assort2"]').val(txt);
        $('input#assort2').attr('value', txt);
        //screenshot('#item_photo_area');
        setTimeout(function(){screenshot('#detail_image_box__item--1')}, 200);
    });
    
    $('select[name=assort3]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort3]').val();
        console.log(val);
        // 選択したアソートを商品画面にセット
        $("#assort3").css("background-image", 'url('+val+')');
        
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort3] option:selected').text();
        console.log(txt);
        //formの値を選択されているものに変える
        $(':text[name="assort3"]').val(txt);
        $('input#assort3').attr('value', txt);
        //screenshot('#item_photo_area');
        setTimeout(function(){screenshot('#detail_image_box__item--1')}, 200);
    });
    
    $('select[name=assort4]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort4]').val();
        console.log(val);
        // 選択したアソートを商品画面にセット
        $("#assort4").css("background-image", 'url('+val+')');
        
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort4] option:selected').text();
        console.log(txt);
        //formの値を選択されているものに変える
        $(':text[name="assort4"]').val(txt);
        $('input#assort4').attr('value', txt);
        //screenshot('#item_photo_area');
        setTimeout(function(){screenshot('#detail_image_box__item--1')}, 200);
    });
    
    $('select[name=assort5]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort5]').val();
        console.log(val);
        // 選択したアソートを商品画面にセット
        $("#assort5").css("background-image", 'url('+val+')');
        
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort5] option:selected').text();
        console.log(txt);
        //formの値を選択されているものに変える
        $(':text[name="assort5"]').val(txt);
        $('input#assort5').attr('value', txt);
        //screenshot('#item_photo_area');
        setTimeout(function(){screenshot('#detail_image_box__item--1')}, 200);
    });
    
    $('select[name=assort6]').change(function() {
        // 選択されているvalue属性値を取り出す
        var val = $('[name=assort6]').val();
        console.log(val);
        // 選択したアソートを商品画面にセット
        $("#assort6").css("background-image", 'url('+val+')');
        
        // 選択されている表示文字列を取り出す
        var txt = $('[name=assort6] option:selected').text();
        console.log(txt);
        //formの値を選択されているものに変える
        $(':text[name="assort6"]').val(txt);
        $('input#assort6').attr('value', txt);
        //screenshot('#item_photo_area');
        setTimeout(function(){screenshot('#detail_image_box__item--1')}, 200);
    });
});

function screenshot( selector) {
    var element = $(selector)[0];
    html2canvas(element, { onrendered: function(canvas) {
        var imgData = canvas.toDataURL();
        //console.log(imgData);
        $('input#assort_img').attr('value', imgData);
    }
    }
    );
}
