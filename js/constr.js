window.onload = function(){

	   //canvas ini	
	   canvas = new fabric.Canvas('map_layout'); 
	   openSelectedPhoneModel($('.selectpicker'));	 

}

function changePhoneTitle(){
	$('.phone_model_text').html($('.phoneSelector option:selected').text());
}


/////////////////////////////////////////////////////
/// Открыть выбранную модель телефона [19.02.16]  ///
/////////////////////////////////////////////////////

function openSelectedPhoneModel(target){
	
	canvas.setBackgroundImage(target.value || target.val(),  canvas.renderAll.bind(canvas), {
        scaleX:1,
        scaleY:1,
        top: canvas.getCenter().top,
        left: canvas.getCenter().left,
        originX: 'center',
        originY: 'center'
	});

	changePhoneTitle();

}

/////////////////////////////////////////////// 
/// Выбрать цвет чехла телефона [19.02.16]  ///
/////////////////////////////////////////////// 

function changeColorPhone(num){

	var imgSrc = canvas.backgroundImage._element.currentSrc,
		imgObj = new Image(),
		newImgSrc = "";

	imgObj.src = imgSrc;
	
	switch(num){
		case 0:
			imgObj.src = newImgSrc = imgSrc.replace("black", "white");			
		break;
		case 1:
			imgObj.src = newImgSrc = imgSrc.replace("white", "black");
		break;
	}

	imgObj.onload = function() {
		openSelectedPhoneModel({value: newImgSrc});
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