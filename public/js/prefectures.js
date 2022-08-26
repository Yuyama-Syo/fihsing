$(function () {
   //都道府県 が変更された場合
   $('[name=prefecture]').on('change', function () {
       //idが一桁の時はゼロうめする
       var prefecture_id = ('00' + $(this).val()).slice(-2);
       
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           type: "POST",
           url: "/ajax/city",
           data: { "prefecture_id": prefecture_id },
           dataType: "json"
       }).done(function (data) {
           //selectタグ（子） の option値 を一旦削除
           $('#city option').remove();
           //戻って来た data の値をそれそれ optionタグ として生成し、
           // city に optionタグ を追加する
           $.each(data['data'], function (id) {
               $('#city').append($('<option>').text(data['data'][id]['name']).attr('value', data['data'][id]['name']));
           });
           

       }).fail(function () {
           console.log("失敗");
       });
   });
});