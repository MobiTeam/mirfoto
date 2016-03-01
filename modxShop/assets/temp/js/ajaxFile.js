$(function(){
  
  $('#my_form').on('submit', function(e){
    
    e.preventDefault();
    var $that = $(this),
    formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
    
    $.ajax({
      url: $that.attr('action'),
      type: $that.attr('method'),
      contentType: false, // важно - убираем форматирование данных по умолчанию
      processData: false, // важно - убираем преобразование строк по умолчанию
      data: formData,
      dataType: 'json',
      success: function(json){
        if(json){
            if(!json.error_flag){
                setFon(json.img_src);
            } else {
                alert(json.server_mess);
            }
        }
      }
    });

  });


});