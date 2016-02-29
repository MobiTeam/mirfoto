window.onload = function(){

	   //canvas ini	
	   canvas = new fabric.Canvas('map_layout'); 

	   //font ini	
	   var f1 = new fabric.Text('text', {
		    fontFamily: 'DsNarrow'
	    });

	    var f2 = new fabric.Text('text', {
		    fontFamily: 'BigNoodLetitling'
	    });
	
		 var f3 = new fabric.Text('text', {
			    fontFamily: 'Massacre'
		    });
	
	
	   changeColorPhone(0);	 
	   	  	  
	   $('.color-bg, .color-text, .strokeColor').colorPicker({
	   		opacity: false,
	   		renderCallback: function(){
	   			setBgColor();
	   			setTextColor();
	   			if($('.strokeCheckbox').prop('checked')) setStrokeColor();
	   		}
	    });
	   
      
	    $( "#slider" ).slider({
	    	 value: 0,
		     min: 0,
		     max: 600,
		     step: 1,
		     slide: function( event, ui ) {
				setStroke();
	    	 }
		});
	  

	  $(window).scroll(function() {
	
		var sb_m = 20; /* отступ сверху и снизу */
		var mb = 300; /* высота подвала с запасом */
		var st = $(window).scrollTop();
		var sb = $(".canvas-block");
		var sb_ot = sb.offset().top;
		var sb_h = sb.height();
	 
		if(sb_h + $(document).scrollTop() + sb_m + mb < $(document).height()) {
			if(st > sb_ot) {
				var h = Math.round(st - sb_ot) + sb_m;
				sb.css({"paddingTop" : h});
			}
			else {
				sb.css({"paddingTop" : 0});
			}
		}
	});

}

////////////////////////////////////////////
///   Повернуть canvas [22.02.2016] 	 ///
////////////////////////////////////////////

function rotateCanvas(){

	var currAngle = canvas.item(0).getAngle();

	if(currAngle == 90){

		canvas.backgroundImage.setAngle(-90);
		canvas.item(0).setAngle(0);
		
	} else {
		canvas.backgroundImage.setAngle(0);
		canvas.item(0).setAngle(90);
	}

	canvas.renderAll();
	
}

// function rotateCanvas(){
// 	var canvasCenter = new fabric.Point(0,0),
// 		rads = 0.174532925;

// 	canvas.getObjects().forEach(function (obj) {
//         var objectOrigin = new fabric.Point(obj.left, obj.top);
//         var new_loc = fabric.util.rotatePoint(objectOrigin, canvasCenter, rads);
//         obj.top = new_loc.y;
//         obj.left = new_loc.x;
//         obj.angle += 180; //rotate each object buy the same angle
//         canvas.renderAll();
//     });
// }

////////////////////////////////////////////
///   Выбор цвета текста [22.02.2016] 	 ///
////////////////////////////////////////////

function getTextColor(){
	return $('.color-text').css('background-color');
}


////////////////////////////////////////////
///   Выбор цвета фона [22.02.2016] 	 ///
////////////////////////////////////////////

function getBgColor(){
	return $('.color-bg').css('background-color');
}


////////////////////////////////////////////
///   Изменение цвета фона [23.02.2016] 	 ///
////////////////////////////////////////////

function setBgColor(color){
	canvas.setBackgroundColor(color || getBgColor(), canvas.renderAll.bind(canvas));
}

////////////////////////////////////////////
/// Изменение цвета текста [20.02.2016]  ///
////////////////////////////////////////////

function setTextColor(){

	var $el = canvas.getObjects(), 
		color = getTextColor();

	for(var i = 0; i < $el.length; i++){
		if($el[i]['type'] == 'text') $el[i].set('fill', color);
	}

	canvas.renderAll();	
	
}

//////////////////////////////////////////////
/// Удалить текст с canvas [23.02.2016]    ///
//////////////////////////////////////////////

function deleteText(){

	var $el = canvas.getObjects();
	
	for(var i = 0; i < $el.length; i++){
		if($el[i]['type'] == "text"){
			$el[i].remove();
		}
	}
}


//////////////////////////////////////////////
/// Добавить текст на canvas [20.02.2016]  ///
//////////////////////////////////////////////

function addTextOnCanvas(){

	deleteText();
	var fontFam = $('.fontSelector option:selected').text();
	var textOnPhone = new fabric.Text($('.entered-text').val() || "MIR-FOTO", {
			fontFamily: fontFam,
			lineHeight: 0.8,
			fill: getTextColor(),
			hasRotatingPoint: true,
			fontSize: 60,
			left: 270, 
			top: 260,
			// scaleY: 2.8,
			// scaleX: 0.9,
			originX: 'center',
			originY: 'center',
			borderColor: 'red',
  			cornerColor: 'green',
  			cornerSize: 10
		});

	canvas.add(textOnPhone);
	canvas.bringToFront(textOnPhone)
	
}


///////////////////////////////////// 
/// Изменить шрифт  [24.02.2016]  ///
///////////////////////////////////// 

function changeFontText(){
	var $el = canvas.getObjects(),
		fontFam = $('.fontSelector option:selected').text();
	
	for(var i = 0; i < $el.length; i++){
		if($el[i]['type'] == "text"){
			$el[i].set({'fontFamily' : fontFam});
		}
	}

	canvas.renderAll();
}

/////////////////////////////////////////////////////
/// Открыть выбранную модель телефона [20.02.16]  ///
/////////////////////////////////////////////////////

function openSelectedPhoneModel(imgSrc){
	
	canvas.setOverlayImage(imgSrc, canvas.renderAll.bind(canvas), {
        scaleX:1,
        scaleY:1,
        top: canvas.getCenter().top,
        left: canvas.getCenter().left,
        originX: 'center',
        originY: 'center',
        angle: -90
	});

	changePhoneTitle();
	changePhonePrice();

}


/////////////////////////////////////////////////////
/// Изменить цену на выбранный чехол  [20.02.16]  ///
/////////////////////////////////////////////////////

function changePhonePrice(){
	
	$('.price_phone_value').html($('.phoneSelector option:selected').attr('price'));


}

//////////////////////////////////////////////////////////
/// Изменить название выбранного телефона  [20.02.16]  ///
//////////////////////////////////////////////////////////

function changePhoneTitle(){
	$('.phone_model_text').html($('.phoneSelector option:selected').text());
}

//////////////////////////////////////////////////// 
/// Определить цвет выбранного чехла [22.02.16]  ///
//////////////////////////////////////////////////// 

function getColorSelPhone(num){
	
	var src = "";

	num = num || $('.currentColorSkin').attr('codecolor');
	
	switch(+num){
		case 1:
			src = "white.png";
			//canvas.setBackgroundColor('#000', canvas.renderAll.bind(canvas));
			$('.currentColorSkin').removeClass('currentColorSkin');
			$('.whiteSkin').addClass('currentColorSkin');
		break;
		case 2:
			src = "black.png";
			//canvas.setBackgroundColor('#fff', canvas.renderAll.bind(canvas));
			$('.currentColorSkin').removeClass('currentColorSkin');
			$('.blackSkin').addClass('currentColorSkin');	
		break;
		case 3:
			src = "transparent.png";
			//canvas.setBackgroundColor('#000', canvas.renderAll.bind(canvas));
			$('.currentColorSkin').removeClass('currentColorSkin');
			$('.transpentSkin').addClass('currentColorSkin');
		break;
		default: 
			src = "white.png";
			$('.currentColorSkin').removeClass('currentColorSkin');
			$('.whiteSkin').addClass('currentColorSkin');
		break;
	}

	return src;
}


/////////////////////////////////////////////// 
/// Выбрать цвет чехла телефона [22.02.16]  ///
/////////////////////////////////////////////// 

function changeColorPhone(num){

	var imgObj = new Image(),
		newImgSrc = $('.phoneSelector option:selected').val();

	imgObj.src = newImgSrc + getColorSelPhone(num);
   
	imgObj.onload = function() {
		openSelectedPhoneModel(imgObj.src);
	}

	imgObj.onerror = function() {
		alert("Чехла в данной расцветке нет.");
	} 
}


///////////////////////////////////////////////////////////////////////////
/// Функция изменения размера окна canvas и его элементов [19.02.16]	///
///////////////////////////////////////////////////////////////////////////

function zoomCanvas(scale) {

	// resize canvas size 
	// canvas.setHeight(canvas.getHeight() * scale);
	// canvas.setWidth(canvas.getWidth() * scale);
	
	if (canvas.backgroundImage) { // Need to scale background images as well
	    var bi = canvas.backgroundImage;
	    bi.width = bi.width * scale; bi.height = bi.height * scale;
	}
	
	var objects = canvas.getObjects();
	
	for (var i in objects) {
	    var scaleX = objects[i].scaleX;
	    var scaleY = objects[i].scaleY;
	    var left = objects[i].left;
	    var top = objects[i].top;

	    var tempScaleX = scaleX * scale;
	    var tempScaleY = scaleY * scale;
	    var tempLeft = left * scale;
	    var tempTop = top * scale;

	    objects[i].scaleX = tempScaleX;
	    objects[i].scaleY = tempScaleY;
	    objects[i].left = tempLeft;
	    objects[i].top = tempTop;

	    objects[i].setCoords();
	}
	
	canvas.renderAll();
	canvas.calcOffset();
}


//////////////////////////////////////////////////////////////////////
////  Функция отображения блока выбора цвета заливки [23.02.2016]   //
//////////////////////////////////////////////////////////////////////

function bgColorToggle(){
	$block = $('.bgColorBox');

	if($block.css('display') == 'block'){
		$block.css('display', 'none');
		$('.color-bg').css('background', 'white');
		setBgColor('#fff');
	} else {
		$block.css('display', 'block');
		setBgColor();
	}

}


/////////////////////////////////////////////////////////////////////
////  Функция отображения блока выбора цвета текста [23.02.2016]   //
/////////////////////////////////////////////////////////////////////

function TextColorToggle(){
	$block = $('.TextColorBox');

	if($block.css('display') == 'block'){
		$block.css('display', 'none');
		deleteText();
		//setBgColor('#fff');
	} else {
		$block.css('display', 'block');
		addTextOnCanvas();
		//setBgColor();
	}
}


/////////////////////////////////////////////////////////////////////
////  Функция отображения блока выбора цвета текста [23.02.2016]   //
/////////////////////////////////////////////////////////////////////

function FonToggle(){
	$block = $('.FonBox');
	if($block.css('display') == 'block'){
		$block.css('display', 'none');
		hideResizeButtons();
		deleteImages();
	} else {
		$block.css('display', 'block');
	}

}


//////////////////////////////////////////////////////
////  Функция добавления нового фона [24.02.2016]   //
//////////////////////////////////////////////////////

function setFon(imgSrc){
	if(imgSrc){
		fabric.Image.fromURL(imgSrc, function(oImg) {
		  deleteImages();
		  canvas.add(oImg);
		  canvas.sendBackwards(oImg);
		});
		activateResizeButtons();
	}
}


////////////////////////////////////////////////////////////////// 
////  Функция удаления всех изображений с холста [23.02.2016]   //
////////////////////////////////////////////////////////////////// 

function deleteImages(){
	$el = canvas.getObjects();
	for(var i = 0; i < $el.length; i++){
		if($el[i]['type'] == 'image') $el[i].remove();
	}
}


/////////////////////////////////////////////////////////////////////////////////
////  Функция отображения кнопок для изменения размера картинки [24.02.2016]   //
/////////////////////////////////////////////////////////////////////////////////

function activateResizeButtons(){
	$('.resize-buttons').show(0);
}

/////////////////////////////////////////////////////////////////////////////////
////  Функция скрытия кнопок для изменения размера картинки [24.02.2016]       //
/////////////////////////////////////////////////////////////////////////////////

function hideResizeButtons(){
	$('.resize-buttons').hide(0);
}


//////////////////////////////////////////////////////////////////
////  Функция получения фонового изображения [24.02.2016]       //
//////////////////////////////////////////////////////////////////

function getBgImage(){
	var $el = canvas.getObjects();

	for(var i = 0; i < $el.length; i++){
		if($el[i]['type'] == 'image'){
			return $el[i];
		}
	}	
}



//////////////////////////////////////////////////////////////////
////  Функция изменения масштаба изображения [24.02.2016]       //
//////////////////////////////////////////////////////////////////

function scalling(val){
	var bgImg = getBgImage();
	
	if(bgImg){
		bgImg.scale(bgImg.scaleX + val);
		canvas.renderAll();
	}
}


//////////////////////////////////////////////////////
////  Функция добавления обводки [25.02.2016]       //
//////////////////////////////////////////////////////

function setStroke(){
	var $el = canvas.getObjects(),
		strokeVal = $('.strokeCheckbox').prop('checked') ? parseFloat(($('#slider').slider("option", "value") / 100.0).toFixed(2)) : 0;
	
	for(var i = 0; i < $el.length; i++){
		if($el[i]['type'] == "text"){
			$el[i].setStrokeWidth(strokeVal);
			$el[i].setStroke($('.color-stroke').css('background-color'));
		}
	}
	canvas.renderAll();
}

////////////////////////////////////////////////////
////  Изменение обводки текста [25.02.2016]       //
////////////////////////////////////////////////////

function setStrokeColor(){
	var $el = canvas.getObjects();
	for(var i = 0; i < $el.length; i++){
		if($el[i]['type'] == "text"){
			$el[i].setStroke($('.color-stroke').css('background-color'));
		}
	}
}


/// trash

///// rect = new fabric.Rect({
		// 			left: 100,
		// 			top: 100,
		// 			fill: '#000',
		// 			width: 100,
		// 			height: 60,
		// 			angle: 70
		// 		}),
		// circle = new fabric.Circle({
		// 	radius: 20,
		// 	fill: 'green',
		// 	left: 100,
		// 	top: 100
		// }),
		// triangle = new fabric.Triangle({
		// 	width: 20,
		// 	height: 30,
		// 	fill: 'blue',
		// 	left: 50,
		// 	top: 50
		// });

	// fabric.Image.fromURL('map.jpg', function(oImg){
	// 	canvas.add(oImg);
	// })

	// canvas.add(rect);
// canvas.add(path);

// canvas.add(circle);
// canvas.add(group);

// setTimeout(function(){
// 	rect.animate('angle', '-=50', {
// 		duration: 1000,
// 		onChange: canvas.renderAll.bind(canvas),
// 		easing: fabric.util.ease.easeOutBounce
// 	});
// }, 1000)

// canvas.on('mouse:down', function(options) {
//   console.log(options);
//   console.log(options.e.layerX, options.e.layerY);

  //console.log(options.e.clientX, options.e.clientY);
//});


// canvas.add(rect); // добавляем

// canvas.item(0); // получаем fabric.Rect, добавленный ранее (первый объект)
// canvas.getObjects(); // поучаем все объекты (прямоугольник будет первым и единственным)

// canvas.remove(rect); // удаляем прямоугольник


	// canvas.add(circle);
	// canvas.add(triangle);
	// canvas.add(rect);
	// setTimeout(function(){
	// 	rect.set({left: 20, top: 50});
	// 	canvas.renderAll();
	// }, 1500)
	
	
	// rect.animate('angle', -150, {
	// 	onChange: canvas.renderAll.bind(canvas)
	// });	


// 	canvas.setBackgroundImage('img/iphone_5_5s_black.png',  canvas.renderAll.bind(canvas), {
//         scaleX:1,
//         scaleY:1,
//         top: center.top,
//         left: center.left,
//         originX: 'center',
//         originY: 'center'
// });

// var path = new fabric.Path('M 0 0 L 50 0 L 0 50 L 50 50 z');
// 	path.set({ left: 120, top: 120 });

// var circle = new fabric.Circle({
// 			radius: 2,
// 			fill: 'green',
// 			left: 100,
// 			top: 100
// 		});

// console.log(path.toObject());	

// var rect = new fabric.Rect({
// 	left: 50,
// 	top: 50,
// 	fill: '#000',
// 	width: 100, 
// 	height: 100,
// 	angle: 50
// });


// var group = new fabric.Group([path, rect], {
// 	left: 100,
// 	top: 100
// });

//center = canvas.getCenter();