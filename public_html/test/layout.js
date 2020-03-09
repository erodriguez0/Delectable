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
const squareMinScale = 	0.75;
const squareMaxScale = 	2;
const squareMinSize =   60;
const squareMaxSize = 	150;


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

function roundSize(num) {
    return Math.round(num / grid) * grid;
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
		left: roundSize(target.left),
		top: roundSize(target.top)
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
	if(objBoundingBox.top < 0) {
		if(obj.angle == 45) {
			obj.set('top', 15);
			obj.setCoords();
		} else {
			obj.set('top', 0);
			obj.setCoords();
		}
	}

	// Width
	if(objBoundingBox.left > canvas.width - objBoundingBox.width) {
		if(obj.angle == 45) {
			obj.set('left', canvas.width - (obj.width - roundSize(obj.width / 15)));
			obj.setCoords();
		} else {
			obj.set('left', canvas.width - objBoundingBox.width);
			obj.setCoords();
		}
	}

	// Height
	if(objBoundingBox.top > canvas.height - objBoundingBox.height) {
		if(obj.angle == 45) {
			obj.set('top', canvas.height - objBoundingBox.height - 15);
			obj.setCoords();
		} else {
			obj.set('top', canvas.height - objBoundingBox.height);
			obj.setCoords();
		}
	}

	// Left
	if(objBoundingBox.left < 0) {

		// Check if object is rotated
		// Apply scaling
		// TODO: check object type
		if(obj.angle == 45) {
			obj.set('left', obj.width - roundSize((obj.width / 15)));
			obj.setCoords();
		} else {
			obj.set('left', 0);
			obj.setCoords();
		}
	}
}

// CREATE FABRIC OBJECTS

function addSquareTable(deg = 0) {
  	const id = generateId();
  	let gleft = 315;
  	let gtop = 215;

  	if(deg > 0) {
  		gleft = 352;
  		gtop = 200;
  	}

	const o = new fabric.Rect({
		width: 75,
		height: 75,
		fill: tableFill,
		stroke: tableFill,
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
		originY: 'center',
		lockUniScaling: true,
		angle: -deg
	});

	const g = new fabric.Group([o, t], {
		left: gleft,
		top: gtop,
		centeredRotation: true,
		hasRotatingPoint: false,
		snapThreshold: 45,
		snapAngle: 45,
		angle: deg,
		selectable: true,
		type: 'square',
		table: true,
		id: id,
		number: number
	});

	// Set resizing controls
	// Bottom right only for square
	g.setControlsVisibility({
		bl: false,
		ml: false,
		tl: false,
		tr: false,
		mt: false,
		mb: false
	});

	canvas.add(g);
	number++;
	return g;
}

function initCanvas() {
	if(canvas) {
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

  	// Snap objects to grid when moving
	canvas.on('object:moving', function(e) {
		snapToGrid(e.target);
	});

	// Fixed increments on resizing objects
	canvas.on('object:scaling', function(e) {
		// o = group, obj = object
		// roundSize() rounds to nearest grid size (15)
		// type is type of table, chair, etc.
		fabric.Object.prototype.objectCaching = false;
		let o = e.target;
		let obj = e.target._objects[0];
		let l = roundSize(o.left);
		let t = roundSize(o.top);
		let w = roundSize(o.getWidth());
		let h = roundSize(o.getHeight());
		let a = o.angle;
		let table = o.table;
		let type = o.type;

		// Check min and max size for squared objects
		// Round tables are considered square objects
		if(type == "square" || type == "circle") {
			if(h < squareMinSize) { w = h = squareMinSize; }
			if(h > squareMaxSize) { w = h = squareMaxSize; }
		}

		// Set left, top, width, and height
		// Resets scaleX and scaleY for incrementing size by grid
		o.set({
			left: 	l,
			top: 	t,
			width: 	w,
			height: h,
			scaleX: 1,
			scaleY: 1
		});

		// Sets the rect object's width and height
		// to fill in the group object
		obj.set({
			width: 	w,
			height: h
		});

		// Prevent object flipping
		if(e.target.flipX == true || e.target.flipY == true) {
			e.target.flipX = false;
			e.target.flipY = false;
		}
	});

	// 
	canvas.on('object:modified', function(e) {

		snapToGrid(e.target);

		// Tables moved to top of other objects
		// e.target.table return t/f
		if (e.target.table) {
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

	// Examples
	addSquareTable(0);
	addSquareTable(45);

} // initCanvas() Close

initCanvas();