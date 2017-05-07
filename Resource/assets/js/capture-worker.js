// UIスレッドからのデータを取得します
onmessage = function(e) {
    console.log('http://' + location.host + '/eccube/html/plugin/AssortContent/assets/js/'+ 'html2canvas.js');
    importScripts('http://' + location.host + '/eccube/html/plugin/AssortContent/assets/js/'+ 'html2canvas.js');
    //importScripts('http://' + location.host + '/eccube/html/index_dev.php/plugin/AssortContent/assets/js/'+ 'html2canvas.js');
    //importScripts('http://ec-cube-test-yheihei.c9users.io/eccube/html/plugin/AssortContent/assets/js/html2canvas.js');
  // 表示させてみる
  console.log(e.data);
  html2canvas(e, { onrendered: function(canvas) {
        var imgData = canvas.toDataURL();
        //console.log(imgData);
        $(':text[name="assort_img"]').val(imgData);
        //$('#screen_image')[0].src = imgData;
        //$('#download')[0].href = imgData;
        //$('#download')[0].innerHTML = "Download";
    }
    }
    );

  //...dataを元に重たい処理などを行う
  //var result = //...

  //結果をUIスレッドに返す
  //postMessage(result);

};