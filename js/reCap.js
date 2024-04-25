$('#contact-form').submit(function(event) {
       event.preventDefault(); // Предотвращаем прямую отправку данных формы
       $('#alert').text('Processing...').fadeIn(0); // Выводим "Processing...", чтобы сообщить пользователю, что данные формы отправлены
       $.ajax({
           url: 'contact.php',
           type: 'post',
           data: $('#contact-form').serialize(),
           dataType: 'json',
           success: function( _response ){
               // Запрос Ajax выполнен успешно. _response - это объект JSON object
               var error = _response.error;
               var success = _response.success;
               if(error != "") {
                   // В случае ошибки выводим пользователю это сообщение
               $('#alert').html(error);
               }
               else {
                   // В случае успешного выполнения, выводим пользователю это сообщение и удаляем кнопку отправки
                   $('#alert').html(success);
                   $('#submit-button').remove();
               }
           },
           error: function(jqXhr, json, errorThrown){
               // В случае ошибки Ajax, выводим пользователю результат для демонстрационных целей
               var error = jqXhr.responseText;
               $('#alert').html(error);
           }
       });
   });
