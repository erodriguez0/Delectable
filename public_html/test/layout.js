// Global vars
var canvasEl = $("#canvas");
var canvas;
var number;

// Grid
const grid = 15
const canvasBg = 		'#f8f8f8';
const lineStroke = 		'#ebebeb';

// Tables
const tableFill = 		'rgba(150, 111, 51, 0.7)';
const tableStroke = 	'#694d23';
const tableShadow = 	'rgba(0, 0, 0, 0) 3px 3px 7px';
const minScaleX =		0.75;
const maxScaleX = 		3;
const minScaleY =		0.75;
const maxScaleY = 		2;

// Chairs
const chairFill = 		'rgba(67, 42, 4, 0.7)';
const chairStroke = 	'#32230b';
const chairShadow = 	'rgba(0, 0, 0, 0) 3px 3px 7px';

// Bar
const barFill = 		'rgba(0, 93, 127, 0.7)';
const barStroke = 		'#003e54';
const barShadow = 		'rgba(0, 0, 0, 0) 3px 3px 7px';
const barText = 		'Bar';

// Wall
const wallFill = 		'rgba(136, 136, 136, 0.7)';
const wallStroke = 		'#686868';
const wallShadow = 		'rgba(0, 0, 0, 0) 5px 5px 20px';

// Generate a UUIDv4
function uuidv4() {
	return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
		(c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16));
}

// Generate an ID for tables
function generateId() {
	return uuidv4();
}

// Moves canvas lines to background
function sendLinesToBack() {
	canvas.getObjects().map(o => {
		if (o.type === 'line') {
		  	canvas.sendToBack(o);
		}
	});
}

// Snap object to grid
function snapToGrid(target) {
	target.set({
		left: Math.round(target.left / (grid)) * grid,
		top: Math.round(target.top / (grid)) * grid
	});
}

function checkBoundingBox(e) {
	const obj = e.target;

	// Invalid object
	if (!obj) {
		return;
	}

	obj.setCoords();

	const objBoundingBox = obj.getBoundingRect();

	// Check if out of bounds
	// Top
	if (objBoundingBox.top < 0) {
		obj.set('top', 0);
		obj.setCoords();
	}

	// Width
	if (objBoundingBox.left > canvas.width - objBoundingBox.width) {
		obj.set('left', canvas.width - objBoundingBox.width);
		obj.setCoords();
	}

	// Height
	if (objBoundingBox.top > canvas.height - objBoundingBox.height) {
		obj.set('top', canvas.height - objBoundingBox.height);
		obj.setCoords();
	}

	// Left
	if (objBoundingBox.left < 0) {
		obj.set('left', 0);
		obj.setCoords();
	}
}

// CREATE FABRIC OBJECTS

// New Rectangle Table
function addRect() {
  	const id = generateId();

	const o = new fabric.Rect({
		width: 75,
		height: 75,
		fill: tableFill,
		stroke: tableStroke,
		strokeWidth: 1,
		originX: 'center',
		originY: 'center',
		centeredRotation: true,
		snapAngle: 45,
		selectable: true
	});

	const t = new fabric.IText(number.toString(), {
		fontFamily: 'Calibri',
		fontSize: 14,
		fill: '#fff',
		textAlign: 'center',
		originX: 'center',
		originY: 'center'
	});

	const g = new fabric.Group([o, t], {
		left: 0,
		top: 0,
		centeredRotation: true,
		snapAngle: 45,
		selectable: true,
		type: 'rect',
		id: id,
		number: number
	});

	canvas.add(g);
	number++;
	return g;
}

function initCanvas() {
	if (canvas) {
    	canvas.clear()
    	canvas.dispose()
  	}

  	// Create new canvas
  	// Set initial table number
  	canvas = new fabric.Canvas('canvas');
  	canvas.backgroundColor = canvasBg;
  	number = 1;

  	// Create horizonal grid lines
  	for (let i = 0; i < (canvas.width / grid); i++) {
	    const lineX = new fabric.Line([ 0, i * grid, canvas.width, i * grid], {
			stroke: lineStroke,
			selectable: false,
			excludeFromExport: true,
			type: 'line'
	    });
	    canvas.add(lineX);
  	}

  	// Create vertical grid lines
  	for (let i = 0; i < (canvas.width / grid); i++) {
	    const lineY = new fabric.Line([ i * grid, 0, i * grid, canvas.height], {
			stroke: lineStroke,
			selectable: false,
			excludeFromExport: true,
			type: 'line'
	    });
	    sendLinesToBack();
	    canvas.add(lineY);
  	}

	canvas.on('object:moving', function(e) {
		snapToGrid(e.target);
	});

	canvas.on('object:scaling', function(e) {
		if(e.target.scaleX > maxScaleX) {
		  	e.target.scaleX = maxScaleX;
		  	e.left = e.lastGoodLeft;
    		e.top = e.lastGoodTop;
		}

		if(e.target.scaleY > maxScaleY) {
		  	e.target.scaleY = maxScaleY;
		  	e.left = e.lastGoodLeft;
    		e.top = e.lastGoodTop;
		}

		if(e.target.scaleX < minScaleX) {
		  	e.target.scaleX = minScaleX;
		  	e.left = e.lastGoodLeft;
    		e.top = e.lastGoodTop;
		}

		if(e.target.scaleY < minScaleY) {
		  	e.target.scaleY = minScaleY;
		  	e.left = e.lastGoodLeft;
    		e.top = e.lastGoodTop;
		}

		if(!e.target.strokeWidthUnscaled && e.target.strokeWidth) {
		  	e.target.strokeWidthUnscaled = e.target.strokeWidth;
		}

		if(e.target.strokeWidthUnscaled) {
		  	e.target.strokeWidth = e.target.strokeWidthUnscaled / e.target.scaleX;

			if(e.target.strokeWidth === e.target.strokeWidthUnscaled) {
			  	e.target.strokeWidth = e.target.strokeWidthUnscaled / e.target.scaleY;
			}
		}
	});

	// 
	canvas.on('object:modified', function(e) {
		snapToGrid(e.target);

		// Tables moved to top of other objects
		if (e.target.type === 'table') {
		  	canvas.bringToFront(e.target);
		}
		else {
		  	canvas.sendToBack(e.target);
		}

		sendLinesToBack();
	});

	// Check if objects were moved or resized and are out of bounds
	canvas.observe('object:moving', function (e) {
		checkBoundingBox(e);
	});
	canvas.observe('object:rotating', function (e) {
		checkBoundingBox(e);
	});
	canvas.observe('object:scaling', function (e) {
		checkBoundingBox(e);
	});

	addRect();

} // initCanvas() Close

initCanvas();