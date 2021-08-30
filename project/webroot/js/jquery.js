
// *******УДАЛЕНИЕ МЫСЛЕЙ СТАТЕЙ ПОЛЬЗОВАТЕЛЕЙ ФОТО*********

$(document).ready(function () {
        $(document).on('submit', '.form_del', function (e) { // Устанавливаем событие отправки для формы с id=form
            e.preventDefault();
             
             let url = $(this).attr('action');
             let id = $(this[name="id"]).val();
             let del = $(this[name="delet"]).val();
         
          if(confirm("Вы действительно хотите удалить?")){  
            $.ajax({
                type: "POST", 
                url: url, 
                dateType: "text",
                data: {
                  id: id,
                  delet: del
                },
                success: function (data) {
                    
                  if(data == "del thought" || data == "del article" || data == "del user" || data == "del foto"){
                  
                    if(data == "del thought"){$('#thought'+id).fadeOut("2000");}
                    if(data == "del article"){$('.article'+id).fadeOut("1000");}      
                    if(data == "del user"){$('.user'+id).fadeOut("1000");} 
                    if(data == "del foto"){$('.photos'+id).fadeOut("1000");}
                  }
                  
                }
            });
          };
        });
      });
      
        

// *******ОТПРАВКА ОБРАТНОЙ СВЯЗИ*********

$(document).ready(function () {
        $(document).on('submit', '.feedback', function (e) { 
            e.preventDefault();
             
             let url = $(this).attr('action');
             let firstname = $(this[name="name"]).val();
             let email = $(this[name="email"]).val();
             let header = $(this[name="header"]).val();
             let message = $(this[name="message"]).val();
             let submit = $(this[name="submit"]).val();
             
             
             
            $.ajax({
                type: "POST", 
                url: url, 
                dateType: "text",
                data: {
                  name: firstname,
                  email: email,
                  header: header,
                  message: message,
                  submit: submit
                },
                success: function (data) {
                  if(data == 'ok'){
                    $('.feedback')[0].reset();
                    $('#error').text('Сообщение отправлено')
                    $('#error').delay(4000).fadeOut();
                  }
                  if(data == 'no'){
                    $('.feedback')[0].reset();
                    $('#error').text('Сообщение неудалось отправить')
                    $('#error').delay(4000).fadeOut();
                  }
                }
            });
        });
    });    

// *******ДОБАВЛЕНИЕ КОММЕНТАРИЯ*********      

$(document).ready(function () {
        $(document).on('submit', '.form_com', function (e) { 
            e.preventDefault();
             
             let url = $(this).attr('action');
             let id = $(this[name="id"]).val();
             let fullname = $(this[name="name"]).val();
             let comment = $(this[name="comment"]).val();
             let submit = $(this[name="submit"]).val();
             
             
             
            $.ajax({
                type: "POST",
                url: url, 
                dateType: "text",
                data: {
                  id: id,
                  name: fullname,
                  comment: comment,
                  submit: submit
                },
                success: function (data) {
                  if(data == 'comment added'){
                    $("#commentBlock").append("<div class='comment'>Автор: <strong>"+fullname+"</strong><br><p>"+comment+"</p></div>");
                    $(".commentBlock").scrollTop($(".commentBlock").prop('scrollHeight'));
                    $('.form_com')[0].reset();
                    $('#text_comment').focus();
                    
                  }
                }
            });
        });
    });    



// *******ПЛАВНЫЙ ПЕРЕХОД НА ДРУГУЮ СТРАНИЦУ*********        

$(document).ready(function() {
    $(".left").css("display", "none");

    $(".left").fadeIn("slow");

	$(".link").click(function(e){
		e.preventDefault();
		linkLocation = this.href;
		$(".left").fadeOut("slow", redirectPage);
	});

	function redirectPage() {
		window.location = linkLocation;
	}
}); 


// ********* ОТКРЫТИЕ ФОТО **********

$(document).ready(function() { 
	$(document).on('click', '.photo',function(){	
	  	let src = $(this).attr('src');	
		  let header = $(this).attr('alt');
		  
		
		$("body").append("<div class='popup'>"+ 
						 "<div class='popup_bg'></div>"+ 
						 "<img src='"+src+"' class='popup_img'/>"+
						 "</div>");
		$(".popup").fadeIn(200); 
		$(".popup_bg").click(function(){	  
			$(".popup").fadeOut(200);	
      setTimeout(function() {	
			  $(".popup").remove(); 
			}, 200);
		});
});
	
});


// *********МОДАЛЬНОЕ ОКНО ФОРМЫ ДОБАВЛЕНИЯ МЫСЛИ*********
	$(document).ready(function () {
        $(document).on('click', '#btn', function () { 
          modalAddThought();          
        })
        
        $(document).on('click','#myModal__close, #myOverlay',function(){
             modalWindowClose();
        });
        
        $(document).on('submit', '.add_thought', function (e) { 
             e.preventDefault();
             
             let url = $(this).attr('action');
             let thought = $(this[name="thought"]).val();
             let submit = $(this[name="submit"]).val();
             
            $.ajax({
                type: "POST", 
                url: url,
                dateType: "text",
                data: {
                  thought: thought,
                  submit: submit
                },
                success: function (data) {
                  modalWindowClose();
                  if(data == "ok"){
                    setTimeout("window.location = '/thoughts'",50);
                  }
                }
            });    
        })
	  	
	})
	





  // *************МОДАЛЬНОЕ ОКНО ДОБАВЛЕНИЯ ФОТО*****************

$(document).ready(function () {
        $(document).on('click', '.btn_add', function () { 
          modalAddPhoto()          
        })
        
        $(document).on('submit', '.form_photo', function (e) { 
            e.preventDefault();
            let url = $(this).attr('action');
            let submit = $(this[name="submit"]).val();
            let data = new FormData(this);
            let file = $('input[type="file"]')[0].files;
            data.append('submit', submit);
            data.append('file', file); 
             
             
            $.ajax({
                type: "POST", 
                url: url,
                dateType: "text",
                contentType: false, 
                processData: false, 
                data: data,
                success: function (data) {
                  modalWindowClose();
                  if(data == "ok"){
                   setTimeout("window.location = '/gallery'",50);
                 }
                }
            });    
        })
	  	
	})








	
function modalAddThought() {		
		$("body").append('<div id="myModal">'+
  '<p>Добавить мысль</p>'+
  '<span id="myModal__close" class="close">ₓ</span>'+
'<form action="/load_thought" method="POST" class="add_thought" >'+
						
			
        
			'<p>'+
				  '<label>Содержание <span>(обязательное поле)</span></label>'+
					'<textarea class="modalWindow" name="thought" rows="10" cols="39"  style="resize: none;" ></textarea>'+
				'</p>'+
							
		 
					'<input type="submit" class="button" name="submit" value="Добавить" />'+
				
					
		'</form>'+
'</div>'+
'<div id="myOverlay"></div>');
		
		$('#myOverlay').fadeIn(297, function(){
      $('#myModal') 
      .css('display', 'block')
      .animate({opacity: 1}, 198);
    });
 
}	



function modalAddPhoto() {		
		$("body").append('<div id="myModal">'+
  '<p>Добавить фото</p>'+
  '<span id="myModal__close" class="close">ₓ</span>'+
    
    '<form action="/load_foto"  method="POST" class="form_photo" enctype="multipart/form-data">'+
						
			
				
				'<p>'+
				 '<label>Загрузить фотографию</label>'+
				  '<input type="file" id="file" name="file">'+
				'</p>'+
					'<input type="submit" class="button" name="submit" value="Загрузить" />'+
				'</form>'+
'</div>'+
'<div id="myOverlay"></div>');
		
		$('#myOverlay').fadeIn(297, function(){
      $('#myModal') 
      .css('display', 'block')
      .animate({opacity: 1}, 198);
    });
 
}	
  
    


function modalWindowClose(){
  $('#myModal').animate({opacity: 0}, 100,
      function(){
        $(this).css('display', 'none');
        $('#myOverlay').fadeOut(100);
        setTimeout(function() {	
			  $("#myModal, #myOverlay").remove(); 
			}, 100);
    });
}



 
              
