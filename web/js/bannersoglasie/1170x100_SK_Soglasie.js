(function (lib, img, cjs, ss) {

var p; // shortcut to reference prototypes
lib.webFontTxtFilters = {}; 

// library properties:
lib.properties = {
	width: 1170,
	height: 100,
	fps: 24,
	color: "#FFFFFF",
	webfonts: {},
	manifest: [
		{src:"/js/bannersoglasie/images/_1.jpg", id:"_1"},
		{src:"/js/bannersoglasie/images/_2.jpg", id:"_2"},
		{src:"/js/bannersoglasie/images/bg_2.jpg", id:"bg_2"},
		{src:"/js/bannersoglasie/images/logo.png", id:"logo"}
	]
};



lib.webfontAvailable = function(family) { 
	lib.properties.webfonts[family] = true;
	var txtFilters = lib.webFontTxtFilters && lib.webFontTxtFilters[family] || [];
	for(var f = 0; f < txtFilters.length; ++f) {
		txtFilters[f].updateCache();
	}
};
// symbols:



(lib._1 = function() {
	this.initialize(img._1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,164,164);


(lib._2 = function() {
	this.initialize(img._2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,164,164);


(lib.bg_2 = function() {
	this.initialize(img.bg_2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,1000,120);


(lib.logo = function() {
	this.initialize(img.logo);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,198,37);


(lib.Символ22 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#CCFF00").s().p("AyufPMAAAg+dMAldAAAMAAAA+dg");
	this.shape._off = true;

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(3).to({_off:false},0).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = null;


(lib.Символ21 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AyufPMAAAg+dMAldAAAMAAAA+dg");
	this.shape.setTransform(380,-140,4.167,0.3);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-120,-200,1000,120);


(lib.Символ20 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#000000").s().p("AgEAiQgCgCAAgEQAAgDACgCQACgCACAAQADAAACACQACACAAADQAAAEgCACQgCACgDAAQgCAAgCgCgAgDANIgCgwIALAAIgCAwg");
	this.shape.setTransform(428.6,-105.9);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#000000").s().p("AAOAbIAAgbIABgGIAAgIIgZApIgOAAIAAg0IALAAIAAAZIgBAOIAZgnIAOAAIAAA0g");
	this.shape_1.setTransform(423.8,-105.1);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#000000").s().p("AAMAbIAAgYIgJAFQgDABgFABQgIgBgFgEQgFgFAAgFIAAgUIAMAAIAAATQAAAHAJAAIAGgBIAIgDIAAgWIAMAAIAAA0g");
	this.shape_2.setTransform(417.3,-105.1);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJgBIAAgCQAAgFgCgDQgDgCgFAAIgGABIgHACIgEgIIAKgDIAIgBQAKgBAFAFQAFAEAAAKIAAAjIgIAAIgCgIQgEAFgEACQgEACgEAAQgIgBgFgEgAAEABQgGAAgEACQgDADAAAFQAAADACADQACACAEAAQAEgBAEgDQAEgDAAgHIAAgEg");
	this.shape_3.setTransform(411.1,-105.1);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#000000").s().p("AASAkIAAgTIgjAAIAAATIgLAAIAAgcIAFAAQAGgIADgKQADgLABgOIAfAAIAAArIAIAAIAAAcgAgEgHQgDAIgEAHIAVAAIAAgiIgKAAQgBAKgDAJg");
	this.shape_4.setTransform(405.2,-104.2);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#000000").s().p("AgXAlIAAgJIAGABQAIAAADgKIACgEIgVg0IAMAAIALAeIACAKIACgEIAMgkIAMAAIgXA6QgEASgPgBIgHgBg");
	this.shape_5.setTransform(399.7,-103.9);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#000000").s().p("AAUAbIAAgqIgBADIgDALIgMAcIgHAAIgMgcIgEgOIAAAqIgLAAIAAg0IAQAAIALAaIADAOIAAgCIAEgLIAMgbIAPAAIAAA0g");
	this.shape_6.setTransform(390.4,-105.1);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#000000").s().p("AgPAUQgIgHAAgNQABgMAGgHQAGgIAKABQALgBAGAHQAHAGgBAMIAAAEIgiAAQABAIAEAEQADAEAGABIAJgBIAIgEIAAAKQgDACgFABIgKABQgLAAgGgIgAgGgOQgEADgBAHIAXAAQAAgHgDgDQgDgEgGAAQgDAAgDAEg");
	this.shape_7.setTransform(383.7,-105.1);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJgBIAAgCQAAgFgCgDQgDgCgFAAIgGABIgHACIgEgIIAKgDIAIgBQAKgBAFAFQAFAEAAAKIAAAjIgIAAIgCgIQgEAFgEACQgEACgEAAQgIgBgFgEgAAEABQgGAAgEACQgDADAAAFQAAADACADQACACAEAAQAEgBAEgDQAEgDAAgHIAAgEg");
	this.shape_8.setTransform(377.7,-105.1);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#000000").s().p("AgYAaIAAgJIADAAQAFABADgMQADgJACgXIAiAAIAAA0IgMAAIAAgrIgOAAQAAARgDAIQgCAKgDAFQgFAEgFAAIgGgBg");
	this.shape_9.setTransform(371.5,-105.1);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#000000").s().p("AgPAUQgIgHABgNQAAgMAGgHQAHgIAJABQALgBAGAHQAHAGgBAMIAAAEIgiAAQAAAIAFAEQADAEAGABIAJgBIAJgEIAAAKQgEACgFABIgKABQgLAAgGgIgAgGgOQgEADgBAHIAXAAQAAgHgDgDQgDgEgGAAQgDAAgDAEg");
	this.shape_10.setTransform(366,-105.1);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#000000").s().p("AAfAjIgagjIAAAjIgJAAIAAgjIgaAjIgNAAIAcgjIgbgiIAMAAIAaAiIAAgiIAJAAIAAAiIAagiIAMAAIgaAiIAbAjg");
	this.shape_11.setTransform(358.6,-106);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#000000").s().p("AgEAFQgCgCAAgDQAAgCACgCQACgCACAAQADAAACACQACACAAACQAAADgCACQgCACgDAAQgCAAgCgCg");
	this.shape_12.setTransform(597.5,-125.2);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#000000").s().p("AAAAQIALgQIgLgQIAGgEIARAUIAAAAIgRAVgAgWAQIANgQIgNgQIAIgEIAPAUIAAAAIgPAVg");
	this.shape_13.setTransform(593.4,-127.3);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#000000").s().p("AgPAUQgIgHABgNQAAgMAGgHQAHgIAJAAQALAAAGAHQAGAGAAAMIAAAEIgiAAQAAAIAFAEQAEAFAFAAIAJgBIAJgEIAAAKQgEACgFABIgJABQgMAAgGgIgAgGgOQgEADgBAHIAXAAQAAgHgDgDQgDgEgGAAQgDAAgDAEg");
	this.shape_14.setTransform(587.8,-127.3);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#000000").s().p("AAOAbIAAgbIABgGIAAgHIgZAoIgOAAIAAg0IALAAIAAAZIgBAOIAZgnIAOAAIAAA0g");
	this.shape_15.setTransform(581.5,-127.3);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.f("#000000").s().p("AgNAVQgGgIAAgNQAAgMAGgHQAHgIALAAQAIABAHADIgDAJQgIgDgEAAQgMAAAAARQAAAJADAEQAEAFAEAAQAIAAAHgEIAAAKQgDACgEABIgIABQgLgBgGgGg");
	this.shape_16.setTransform(575.7,-127.3);

	this.shape_17 = new cjs.Shape();
	this.shape_17.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJAAIAAgDQAAgGgCgCQgDgDgFAAIgGACIgHADIgEgJIAKgDIAIgCQAKAAAFAFQAFAFAAAJIAAAjIgIAAIgCgIQgEAFgEABQgEADgEAAQgIAAgFgFgAAEABQgGAAgEACQgDADAAAFQAAAEACABQACADAEAAQAEAAAEgEQAEgDAAgHIAAgEg");
	this.shape_17.setTransform(570.1,-127.3);

	this.shape_18 = new cjs.Shape();
	this.shape_18.graphics.f("#000000").s().p("AgYAaIAAgJIADAAQAFABADgLQADgKABgXIAiAAIAAA0IgLAAIAAgrIgOAAQAAARgDAIQgCAKgEAFQgDAEgHAAIgFgBg");
	this.shape_18.setTransform(563.9,-127.2);

	this.shape_19 = new cjs.Shape();
	this.shape_19.graphics.f("#000000").s().p("AgQAbIAAg0IAhAAIAAAJIgVAAIAAArg");
	this.shape_19.setTransform(559.6,-127.3);

	this.shape_20 = new cjs.Shape();
	this.shape_20.graphics.f("#000000").s().p("AgMAYQgGgDgDgHQgDgGAAgIQAAgMAHgHQAGgIALAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMAAQgGAAgGgEgAgJgNQgDAFAAAIQAAASAMAAQAOAAAAgSQAAgRgOAAQgFAAgEAEg");
	this.shape_20.setTransform(554,-127.3);

	this.shape_21 = new cjs.Shape();
	this.shape_21.graphics.f("#000000").s().p("AgRAbQgJgKAAgRQAAgKAFgIQADgIAJgFQAHgEAIAAQAMAAAIAEIgDAKIgIgDIgJgBQgIAAgGAHQgFAHAAALQAAANAFAHQAGAGAIAAIAJgBIAJgCIAAAKQgIADgLAAQgOAAgIgJg");
	this.shape_21.setTransform(547.9,-128.2);

	this.shape_22 = new cjs.Shape();
	this.shape_22.graphics.f("#000000").s().p("AAAAAIAAAAIAPgUIAIAEIgNAQIANAQIgIAFgAgWAAIAAAAIARgUIAGAEIgLAQIALAQIgGAFg");
	this.shape_22.setTransform(541.8,-127.3);

	this.shape_23 = new cjs.Shape();
	this.shape_23.graphics.f("#000000").s().p("AANAjIgbgjIAAAjIgMAAIAAhFIAMAAIAAAiIAbgiIANAAIgbAiIAcAjg");
	this.shape_23.setTransform(533.7,-128.2);

	this.shape_24 = new cjs.Shape();
	this.shape_24.graphics.f("#000000").s().p("AgRAbQgIgKgBgRQAAgKAEgIQAFgIAIgFQAHgEAJAAQAKAAAJAEIgDAKIgIgDIgIgBQgJAAgGAHQgFAHgBALQABANAFAHQAGAGAJAAIAIgBIAJgCIAAAKQgIADgLAAQgOAAgIgJg");
	this.shape_24.setTransform(527,-128.2);

	this.shape_25 = new cjs.Shape();
	this.shape_25.graphics.f("#000000").s().p("AgPAUQgIgHAAgNQABgMAGgHQAGgIAKAAQALAAAGAHQAHAGgBAMIAAAEIgiAAQABAIAEAEQADAFAGAAIAJgBIAIgEIAAAKQgDACgFABIgKABQgLAAgGgIgAgGgOQgEADgBAHIAXAAQAAgHgDgDQgDgEgGAAQgEAAgCAEg");
	this.shape_25.setTransform(518.2,-127.3);

	this.shape_26 = new cjs.Shape();
	this.shape_26.graphics.f("#000000").s().p("AASAkIAAgTIgjAAIAAATIgLAAIAAgcIAFAAQAGgIADgKQADgMABgNIAfAAIAAArIAIAAIAAAcgAgEgHQgDAIgEAHIAVAAIAAgiIgKAAQgBAKgDAJg");
	this.shape_26.setTransform(512.2,-126.3);

	this.shape_27 = new cjs.Shape();
	this.shape_27.graphics.f("#000000").s().p("AAMAbIAAgYIgXAAIAAAYIgMAAIAAg0IAMAAIAAAVIAXAAIAAgVIAMAAIAAA0g");
	this.shape_27.setTransform(505.8,-127.3);

	this.shape_28 = new cjs.Shape();
	this.shape_28.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJAAIAAgDQAAgGgCgCQgDgDgFAAIgGACIgHADIgEgJIAKgDIAIgCQAKAAAFAFQAFAFAAAJIAAAjIgIAAIgCgIQgEAFgEABQgEADgEAAQgIAAgFgFgAAEABQgGAAgEACQgDADAAAFQAAAEACABQACADAEAAQAEAAAEgEQAEgDAAgHIAAgEg");
	this.shape_28.setTransform(499.5,-127.3);

	this.shape_29 = new cjs.Shape();
	this.shape_29.graphics.f("#000000").s().p("AAUAbIAAgqIgBADIgDALIgMAcIgHAAIgMgcIgEgOIAAAqIgLAAIAAg0IAQAAIALAaIADAOIAAgCIAEgLIAMgbIAPAAIAAA0g");
	this.shape_29.setTransform(492.8,-127.3);

	this.shape_30 = new cjs.Shape();
	this.shape_30.graphics.f("#000000").s().p("AgMAYQgGgDgDgHQgDgGAAgIQAAgMAGgHQAHgIALAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMAAQgGAAgGgEgAgJgNQgDAFAAAIQAAASAMAAQANAAABgSQgBgRgNAAQgFAAgEAEg");
	this.shape_30.setTransform(485.9,-127.3);

	this.shape_31 = new cjs.Shape();
	this.shape_31.graphics.f("#000000").s().p("AAKAbIgVgbIAAAbIgMAAIAAg0IAMAAIAAAZIAUgZIANAAIgWAZIAYAbg");
	this.shape_31.setTransform(480.5,-127.3);

	this.shape_32 = new cjs.Shape();
	this.shape_32.graphics.f("#000000").s().p("AALAbIgWgbIAAAbIgMAAIAAg0IAMAAIAAAZIAUgZIANAAIgWAZIAXAbg");
	this.shape_32.setTransform(472.2,-127.3);

	this.shape_33 = new cjs.Shape();
	this.shape_33.graphics.f("#000000").s().p("AAMAbIAAgWIgLAAIgLAWIgNAAIAPgXQgFgBgDgDQgEgDABgGQgBgIAGgEQAFgFAJABIAYAAIAAA0gAgGgPQgCACAAAEQAAAEADACQADACADAAIALAAIAAgQIgMAAQgDAAgDACg");
	this.shape_33.setTransform(463.2,-127.3);

	this.shape_34 = new cjs.Shape();
	this.shape_34.graphics.f("#000000").s().p("AgNAVQgGgIAAgNQAAgMAGgHQAHgIALAAQAIABAHADIgDAJQgIgDgEAAQgMAAAAARQAAAJADAEQAEAFAEAAQAIAAAHgEIAAAKQgDACgEABIgIABQgLgBgGgGg");
	this.shape_34.setTransform(458.3,-127.3);

	this.shape_35 = new cjs.Shape();
	this.shape_35.graphics.f("#000000").s().p("AgXAbIAAg0IAMAAIAAAVIAMAAQAWAAAAAOQAAAIgFAEQgGAEgLABgAgLASIALAAQAGAAADgCQADgCAAgEQAAgEgDgCQgEgBgFAAIgLAAg");
	this.shape_35.setTransform(452.9,-127.3);

	this.shape_36 = new cjs.Shape();
	this.shape_36.graphics.f("#000000").s().p("AgFAbIAAgrIgRAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_36.setTransform(447.1,-127.3);

	this.shape_37 = new cjs.Shape();
	this.shape_37.graphics.f("#000000").s().p("AAOAbIAAgbIABgGIAAgHIgZAoIgOAAIAAg0IALAAIAAAZIgBAOIAZgnIAOAAIAAA0g");
	this.shape_37.setTransform(441.2,-127.3);

	this.shape_38 = new cjs.Shape();
	this.shape_38.graphics.f("#000000").s().p("AAMAbIAAgYIgXAAIAAAYIgMAAIAAg0IAMAAIAAAVIAXAAIAAgVIAMAAIAAA0g");
	this.shape_38.setTransform(434.5,-127.3);

	this.shape_39 = new cjs.Shape();
	this.shape_39.graphics.f("#000000").s().p("AAOAbIAAgbIABgGIAAgHIgZAoIgOAAIAAg0IALAAIAAAZIgBAOIAZgnIAOAAIAAA0g");
	this.shape_39.setTransform(427.9,-127.3);

	this.shape_40 = new cjs.Shape();
	this.shape_40.graphics.f("#000000").s().p("AASAkIAAgTIgjAAIAAATIgLAAIAAgcIAFAAQAGgIADgKQADgMABgNIAfAAIAAArIAIAAIAAAcgAgEgHQgDAIgEAHIAVAAIAAgiIgKAAQgBAKgDAJg");
	this.shape_40.setTransform(421.4,-126.3);

	this.shape_41 = new cjs.Shape();
	this.shape_41.graphics.f("#000000").s().p("AgPAUQgIgHABgNQAAgMAGgHQAHgIAJAAQALAAAGAHQAHAGgBAMIAAAEIgiAAQAAAIAFAEQADAFAGAAIAJgBIAJgEIAAAKQgEACgFABIgKABQgLAAgGgIgAgGgOQgEADgBAHIAXAAQAAgHgDgDQgDgEgGAAQgDAAgDAEg");
	this.shape_41.setTransform(415.5,-127.3);

	this.shape_42 = new cjs.Shape();
	this.shape_42.graphics.f("#000000").s().p("AgMAYQgGgDgDgHQgDgGAAgIQAAgMAGgHQAIgIAKAAQALAAAIAIQAGAHAAAMQAAANgGAHQgIAIgLAAQgGAAgGgEgAgJgNQgDAFAAAIQAAASAMAAQAOAAgBgSQABgRgOAAQgGAAgDAEg");
	this.shape_42.setTransform(409.6,-127.3);

	this.shape_43 = new cjs.Shape();
	this.shape_43.graphics.f("#000000").s().p("AgNAVQgGgIAAgNQAAgMAGgHQAHgIALAAQAIABAHADIgDAJQgIgDgEAAQgMAAAAARQAAAJADAEQAEAFAEAAQAIAAAHgEIAAAKQgDACgEABIgIABQgLgBgGgGg");
	this.shape_43.setTransform(404.1,-127.3);

	this.shape_44 = new cjs.Shape();
	this.shape_44.graphics.f("#000000").s().p("AAOAbIAAgbIABgGIAAgHIgZAoIgOAAIAAg0IALAAIAAAZIgBAOIAZgnIAOAAIAAA0g");
	this.shape_44.setTransform(398.2,-127.3);

	this.shape_45 = new cjs.Shape();
	this.shape_45.graphics.f("#000000").s().p("AgXAnIAAhMIAKAAIABAHIABAAQAFgIAJAAQAKAAAFAIQAGAGAAAOQAAALgGAHQgGAIgJAAQgJAAgFgIIgBAAIABAJIAAAWgAgIgZQgDAFAAAIIAAACQAAAKADACQADAEAFAAQAGAAADgEQADgDABgJQgBgKgDgEQgDgEgGgBQgFAAgDAEg");
	this.shape_45.setTransform(391.8,-126.1);

	this.shape_46 = new cjs.Shape();
	this.shape_46.graphics.f("#000000").s().p("AAMAbIAAgrIgXAAIAAArIgLAAIAAg0IAtAAIAAA0g");
	this.shape_46.setTransform(385.4,-127.3);

	this.shape_47 = new cjs.Shape();
	this.shape_47.graphics.f("#000000").s().p("AAUAbIAAg0IAMAAIAAA0gAgfAbIAAg0IALAAIAAAVIAMAAQAJAAAGAEQAFACAAAIQAAAIgGAEQgGAEgIABgAgUASIAJAAQAHAAAEgCQABgCAAgEQAAgEgBgCQgDgBgGAAIgLAAg");
	this.shape_47.setTransform(375.6,-127.3);

	this.shape_48 = new cjs.Shape();
	this.shape_48.graphics.f("#000000").s().p("AgRAdQgHgIAAgQQAAgQAGgKQAHgKALgCIAXgEIACAKIgYADQgFACgEAFQgDAFgBAJIABAAQACgEAFgCQAEgCAEAAQAKAAAFAGQAGAFAAALQAAANgHAHQgGAHgMAAQgKAAgHgJgAgDgBIgFACIgEAEQAAAMAEAGQADAGAFAAQANAAAAgRQAAgOgMAAQgBAAgDABg");
	this.shape_48.setTransform(368.5,-128.4);

	this.shape_49 = new cjs.Shape();
	this.shape_49.graphics.f("#000000").s().p("AgMAYQgGgDgDgHQgDgGAAgIQAAgMAGgHQAHgIALAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMAAQgGAAgGgEgAgJgNQgDAFAAAIQAAASAMAAQAOAAAAgSQAAgRgOAAQgFAAgEAEg");
	this.shape_49.setTransform(362.4,-127.3);

	this.shape_50 = new cjs.Shape();
	this.shape_50.graphics.f("#000000").s().p("AgFAbIAAgrIgRAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_50.setTransform(356.9,-127.3);

	this.shape_51 = new cjs.Shape();
	this.shape_51.graphics.f("#000000").s().p("AAMAbIAAgYIgJAFQgDACgFAAQgIAAgFgFQgFgFAAgFIAAgUIAMAAIAAATQAAAHAJAAIAGgBIAIgDIAAgWIAMAAIAAA0g");
	this.shape_51.setTransform(351.1,-127.3);

	this.shape_52 = new cjs.Shape();
	this.shape_52.graphics.f("#000000").s().p("AgHAMIAFgXIAKAAIAAABQgCAJgGANg");
	this.shape_52.setTransform(347.1,-124.5);

	this.shape_53 = new cjs.Shape();
	this.shape_53.graphics.f("#000000").s().p("AgWAbIAAg0IALAAIAAAVIALAAQAYAAAAAOQAAAIgHAEQgFAEgMABgAgLASIALAAQAGAAADgCQADgCAAgEQAAgEgEgCQgDgBgFAAIgLAAg");
	this.shape_53.setTransform(343.1,-127.3);

	this.shape_54 = new cjs.Shape();
	this.shape_54.graphics.f("#000000").s().p("AgEAbIAAgrIgSAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_54.setTransform(337.4,-127.3);

	this.shape_55 = new cjs.Shape();
	this.shape_55.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJAAIAAgDQAAgGgCgCQgDgDgFAAIgGACIgHADIgEgJIAKgDIAIgCQAKAAAFAFQAFAFAAAJIAAAjIgIAAIgCgIQgEAFgEABQgEADgEAAQgIAAgFgFgAAEABQgGAAgEACQgDADAAAFQAAAEACABQACADAEAAQAEAAAEgEQAEgDAAgHIAAgEg");
	this.shape_55.setTransform(331.7,-127.3);

	this.shape_56 = new cjs.Shape();
	this.shape_56.graphics.f("#000000").s().p("AgZAaIAAgJIAEAAQAFABADgLQACgKACgXIAiAAIAAA0IgLAAIAAgrIgOAAQAAARgCAIQgDAKgEAFQgEAEgGAAIgGgBg");
	this.shape_56.setTransform(325.6,-127.2);

	this.shape_57 = new cjs.Shape();
	this.shape_57.graphics.f("#000000").s().p("AgQAUQgGgHgBgNQAAgMAHgHQAGgIAKAAQALAAAGAHQAGAGABAMIAAAEIgiAAQAAAIADAEQAFAFAFAAIAJgBIAIgEIAAAKQgEACgEABIgKABQgLAAgHgIgAgHgOQgDADAAAHIAWAAQAAgHgDgDQgEgEgFAAQgEAAgDAEg");
	this.shape_57.setTransform(320.1,-127.3);

	this.shape_58 = new cjs.Shape();
	this.shape_58.graphics.f("#000000").s().p("AASAkIAAgTIgjAAIAAATIgLAAIAAgcIAFAAQAGgIADgKQADgMABgNIAfAAIAAArIAIAAIAAAcgAgEgHQgDAIgEAHIAVAAIAAgiIgKAAQgBAKgDAJg");
	this.shape_58.setTransform(314,-126.3);

	this.shape_59 = new cjs.Shape();
	this.shape_59.graphics.f("#000000").s().p("AgNAVQgGgIAAgNQAAgMAGgHQAHgIALAAQAIABAHADIgDAJQgIgDgEAAQgMAAAAARQAAAJADAEQAEAFAEAAQAIAAAHgEIAAAKQgDACgEABIgIABQgLgBgGgGg");
	this.shape_59.setTransform(308.6,-127.3);

	this.shape_60 = new cjs.Shape();
	this.shape_60.graphics.f("#000000").s().p("AgMAYQgGgDgDgHQgDgGAAgIQAAgMAGgHQAIgIAKAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMAAQgGAAgGgEgAgJgNQgDAFAAAIQAAASAMAAQANAAABgSQgBgRgNAAQgFAAgEAEg");
	this.shape_60.setTransform(300.4,-127.3);

	this.shape_61 = new cjs.Shape();
	this.shape_61.graphics.f("#000000").s().p("AAUAbIAAgqIgBADIgDALIgMAcIgHAAIgMgcIgEgOIAAAqIgLAAIAAg0IAQAAIALAaIADAOIAAgCIAEgLIAMgbIAPAAIAAA0g");
	this.shape_61.setTransform(293.3,-127.3);

	this.shape_62 = new cjs.Shape();
	this.shape_62.graphics.f("#000000").s().p("AAOAbIAAgbIABgGIAAgHIgZAoIgOAAIAAg0IALAAIAAAZIgBAOIAZgnIAOAAIAAA0g");
	this.shape_62.setTransform(286,-127.3);

	this.shape_63 = new cjs.Shape();
	this.shape_63.graphics.f("#000000").s().p("AASAkIAAgTIgjAAIAAATIgLAAIAAgcIAFAAQAGgIADgKQADgMABgNIAfAAIAAArIAIAAIAAAcgAgEgHQgDAIgEAHIAVAAIAAgiIgKAAQgBAKgDAJg");
	this.shape_63.setTransform(279.5,-126.3);

	this.shape_64 = new cjs.Shape();
	this.shape_64.graphics.f("#000000").s().p("AgMAYQgGgDgDgHQgDgGAAgIQAAgMAHgHQAGgIALAAQALAAAIAIQAGAHAAAMQAAANgGAHQgIAIgLAAQgGAAgGgEgAgJgNQgDAFAAAIQAAASAMAAQANAAAAgSQAAgRgNAAQgGAAgDAEg");
	this.shape_64.setTransform(273.4,-127.3);

	this.shape_65 = new cjs.Shape();
	this.shape_65.graphics.f("#000000").s().p("AANAbIgNgVIgMAVIgNAAIATgbIgSgZIANAAIALATIAMgTIANAAIgSAZIATAbg");
	this.shape_65.setTransform(267.9,-127.3);

	this.shape_66 = new cjs.Shape();
	this.shape_66.graphics.f("#000000").s().p("AgRAdQgHgIAAgQQAAgQAGgKQAGgKAMgCIAXgEIABAKIgXADQgGACgDAFQgDAFgBAJIABAAQACgEAFgCQAEgCAEAAQAKAAAGAGQAFAFAAALQAAANgHAHQgGAHgMAAQgKAAgHgJgAgDgBIgFACIgEAEQAAAMAEAGQADAGAFAAQANAAAAgRQAAgOgLAAQgCAAgDABg");
	this.shape_66.setTransform(262.1,-128.4);

	this.shape_67 = new cjs.Shape();
	this.shape_67.graphics.f("#000000").s().p("AgMAYQgGgDgDgHQgDgGAAgIQAAgMAHgHQAGgIALAAQALAAAIAIQAGAHAAAMQAAANgGAHQgIAIgLAAQgGAAgGgEgAgJgNQgDAFAAAIQAAASAMAAQANAAAAgSQAAgRgNAAQgGAAgDAEg");
	this.shape_67.setTransform(256,-127.3);

	this.shape_68 = new cjs.Shape();
	this.shape_68.graphics.f("#000000").s().p("AgQAUQgGgHAAgNQgBgMAHgHQAGgIAKAAQALAAAGAHQAGAGAAAMIAAAEIgiAAQAAAIAEAEQAFAFAFAAIAJgBIAJgEIAAAKQgEACgFABIgJABQgLAAgIgIgAgHgOQgDADgBAHIAXAAQAAgHgDgDQgDgEgGAAQgEAAgDAEg");
	this.shape_68.setTransform(250.1,-127.3);

	this.shape_69 = new cjs.Shape();
	this.shape_69.graphics.f("#000000").s().p("AAMAbIAAgYIgXAAIAAAYIgMAAIAAg0IAMAAIAAAVIAXAAIAAgVIAMAAIAAA0g");
	this.shape_69.setTransform(243.9,-127.3);

	this.shape_70 = new cjs.Shape();
	this.shape_70.graphics.f("#000000").s().p("AgMAYQgGgDgDgHQgDgGAAgIQAAgMAGgHQAIgIAKAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMAAQgGAAgGgEgAgJgNQgDAFAAAIQAAASAMAAQAOAAAAgSQAAgRgOAAQgFAAgEAEg");
	this.shape_70.setTransform(235,-127.3);

	this.shape_71 = new cjs.Shape();
	this.shape_71.graphics.f("#000000").s().p("AgFAbIAAgrIgRAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_71.setTransform(229.5,-127.3);

	this.shape_72 = new cjs.Shape();
	this.shape_72.graphics.f("#000000").s().p("AAMAbIAAgYIgJAFQgDACgFAAQgIAAgFgFQgFgFAAgFIAAgUIAMAAIAAATQAAAHAJAAIAGgBIAIgDIAAgWIAMAAIAAA0g");
	this.shape_72.setTransform(223.8,-127.3);

	this.shape_73 = new cjs.Shape();
	this.shape_73.graphics.f("#000000").s().p("AgHAMIAFgXIAKAAIAAABQgCAJgGANg");
	this.shape_73.setTransform(216.6,-124.5);

	this.shape_74 = new cjs.Shape();
	this.shape_74.graphics.f("#000000").s().p("AAUAbIAAgqIgBADIgDALIgMAcIgHAAIgMgcIgEgOIAAAqIgLAAIAAg0IAQAAIALAaIADAOIAAgCIAEgLIAMgbIAPAAIAAA0g");
	this.shape_74.setTransform(211.5,-127.3);

	this.shape_75 = new cjs.Shape();
	this.shape_75.graphics.f("#000000").s().p("AgMAYQgGgDgDgHQgDgGAAgIQAAgMAGgHQAIgIAKAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMAAQgGAAgGgEgAgJgNQgDAFAAAIQAAASAMAAQANAAABgSQgBgRgNAAQgFAAgEAEg");
	this.shape_75.setTransform(204.5,-127.3);

	this.shape_76 = new cjs.Shape();
	this.shape_76.graphics.f("#000000").s().p("AgFAbIAAgrIgRAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_76.setTransform(199,-127.3);

	this.shape_77 = new cjs.Shape();
	this.shape_77.graphics.f("#000000").s().p("AgMAYQgGgDgDgHQgDgGAAgIQAAgMAHgHQAGgIALAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMAAQgGAAgGgEgAgJgNQgDAFAAAIQAAASAMAAQAOAAAAgSQAAgRgOAAQgFAAgEAEg");
	this.shape_77.setTransform(190.8,-127.3);

	this.shape_78 = new cjs.Shape();
	this.shape_78.graphics.f("#000000").s().p("AAOAmIAAgbIABgIIAAgFIgZAoIgOAAIAAg0IALAAIAAAZIgBAPIAZgoIAOAAIAAA0gAgOgYQgFgEAAgJIAKAAQAAADACACIADADIAEABQAEAAADgCQACgCABgFIAKAAQAAAIgFAFQgGADgJAAQgJAAgFgDg");
	this.shape_78.setTransform(567.5,-150.6);

	this.shape_79 = new cjs.Shape();
	this.shape_79.graphics.f("#000000").s().p("AAOAaIAAgaIABgGIAAgHIgZAnIgOAAIAAg0IALAAIAAAaIgBAOIAZgoIAOAAIAAA0g");
	this.shape_79.setTransform(560.7,-149.4);

	this.shape_80 = new cjs.Shape();
	this.shape_80.graphics.f("#000000").s().p("AARAkIAAgTIgrAAIAAg0IALAAIAAArIAXAAIAAgrIAMAAIAAArIAHAAIAAAcg");
	this.shape_80.setTransform(554.4,-148.5);

	this.shape_81 = new cjs.Shape();
	this.shape_81.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJAAIAAgEQAAgFgCgCQgDgDgFAAIgGABIgHAEIgEgJIAKgEIAIgBQAKAAAFAFQAFAFAAAJIAAAiIgIAAIgCgHQgEAFgEABQgEACgEABQgIAAgFgFgAAEABQgGABgEACQgDACAAAFQAAADACACQACACAEABQAEAAAEgEQAEgEAAgGIAAgEg");
	this.shape_81.setTransform(547.7,-149.4);

	this.shape_82 = new cjs.Shape();
	this.shape_82.graphics.f("#000000").s().p("AgEAaIAAgrIgSAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_82.setTransform(542.5,-149.4);

	this.shape_83 = new cjs.Shape();
	this.shape_83.graphics.f("#000000").s().p("AgXAaIAAg0IAMAAIAAAWIAMAAQAXAAgBAOQAAAIgFAEQgGAEgLAAgAgLASIALAAQAGAAADgCQADgCAAgEQAAgEgDgCQgDgBgGAAIgLAAg");
	this.shape_83.setTransform(537.6,-149.4);

	this.shape_84 = new cjs.Shape();
	this.shape_84.graphics.f("#000000").s().p("AgZAaIAAgJIAEAAQAFABADgLQADgKACgXIAiAAIAAA0IgMAAIAAgrIgOAAQAAARgDAIQgCAKgDAFQgFAEgFAAIgHgBg");
	this.shape_84.setTransform(530.9,-149.4);

	this.shape_85 = new cjs.Shape();
	this.shape_85.graphics.f("#000000").s().p("AgXAlIAAgJIAGABQAIAAADgKIACgFIgVg0IAMAAIALAfIACAKIACgEIAMglIAMAAIgXA7QgEARgPAAIgHgBg");
	this.shape_85.setTransform(525.8,-148.2);

	this.shape_86 = new cjs.Shape();
	this.shape_86.graphics.f("#000000").s().p("AgNAVQgGgIAAgNQAAgMAGgHQAHgIALAAQAIAAAHAEIgDAJQgIgDgEAAQgMAAAAARQAAAJADAEQAEAFAEAAQAIAAAHgEIAAAKQgDACgEAAIgIACQgLgBgGgGg");
	this.shape_86.setTransform(520.7,-149.4);

	this.shape_87 = new cjs.Shape();
	this.shape_87.graphics.f("#000000").s().p("AAMAaIAAgXIgXAAIAAAXIgMAAIAAg0IAMAAIAAAWIAXAAIAAgWIAMAAIAAA0g");
	this.shape_87.setTransform(514.9,-149.4);

	this.shape_88 = new cjs.Shape();
	this.shape_88.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAHgHQAGgIALAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMAAQgGAAgGgEgAgJgMQgDAFAAAHQAAASAMAAQAOAAAAgSQAAgRgOAAQgFAAgEAFg");
	this.shape_88.setTransform(508.6,-149.4);

	this.shape_89 = new cjs.Shape();
	this.shape_89.graphics.f("#000000").s().p("AALAaIgWgaIAAAaIgLAAIAAg0IALAAIAAAaIAUgaIANAAIgWAaIAXAag");
	this.shape_89.setTransform(503.3,-149.4);

	this.shape_90 = new cjs.Shape();
	this.shape_90.graphics.f("#000000").s().p("AAUAaIAAgpIgBADIgDALIgMAbIgHAAIgMgbIgEgOIAAApIgLAAIAAg0IAQAAIALAbIADAOIAAgCIAEgLIAMgcIAPAAIAAA0g");
	this.shape_90.setTransform(493.5,-149.4);

	this.shape_91 = new cjs.Shape();
	this.shape_91.graphics.f("#000000").s().p("AgPAUQgIgHAAgNQABgMAGgHQAGgIAKAAQALAAAGAHQAHAGgBAMIAAAEIgiAAQABAIAEAEQADAFAGAAIAJgCIAIgDIAAAKQgDACgFAAIgKACQgLAAgGgIgAgGgOQgEADgBAHIAXAAQAAgHgDgDQgDgEgGAAQgDAAgDAEg");
	this.shape_91.setTransform(486.7,-149.4);

	this.shape_92 = new cjs.Shape();
	this.shape_92.graphics.f("#000000").s().p("AAOAaIAAgaIABgGIAAgHIgZAnIgOAAIAAg0IALAAIAAAaIgBAOIAZgoIAOAAIAAA0g");
	this.shape_92.setTransform(480.4,-149.4);

	this.shape_93 = new cjs.Shape();
	this.shape_93.graphics.f("#000000").s().p("AAMAaIAAgXIgXAAIAAAXIgMAAIAAg0IAMAAIAAAWIAXAAIAAgWIAMAAIAAA0g");
	this.shape_93.setTransform(473.8,-149.4);

	this.shape_94 = new cjs.Shape();
	this.shape_94.graphics.f("#000000").s().p("AgPAUQgIgHAAgNQABgMAGgHQAHgIAJAAQALAAAGAHQAHAGgBAMIAAAEIgiAAQAAAIAFAEQADAFAGAAIAJgCIAIgDIAAAKQgDACgFAAIgKACQgLAAgGgIgAgGgOQgEADgBAHIAXAAQAAgHgDgDQgDgEgGAAQgDAAgDAEg");
	this.shape_94.setTransform(467.7,-149.4);

	this.shape_95 = new cjs.Shape();
	this.shape_95.graphics.f("#000000").s().p("AAMAaIAAgWIgJAEQgDACgFAAQgIAAgFgFQgEgFgBgFIAAgVIAMAAIAAAUQAAAHAIAAIAGgBIAJgDIAAgXIAMAAIAAA0g");
	this.shape_95.setTransform(461.6,-149.4);

	this.shape_96 = new cjs.Shape();
	this.shape_96.graphics.f("#000000").s().p("AgXAlIAAgJIAGABQAIAAADgKIACgFIgVg0IAMAAIALAfIACAKIACgEIAMglIAMAAIgXA7QgEARgPAAIgHgBg");
	this.shape_96.setTransform(455.8,-148.2);

	this.shape_97 = new cjs.Shape();
	this.shape_97.graphics.f("#000000").s().p("AgYAaIAAgJIADAAQAFABADgLQACgKADgXIAiAAIAAA0IgMAAIAAgrIgOAAQAAARgDAIQgCAKgDAFQgFAEgGAAIgFgBg");
	this.shape_97.setTransform(449.7,-149.4);

	this.shape_98 = new cjs.Shape();
	this.shape_98.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAGgHQAHgIALAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMAAQgGAAgGgEgAgJgMQgDAFAAAHQAAASAMAAQANAAABgSQgBgRgNAAQgFAAgEAFg");
	this.shape_98.setTransform(444,-149.4);

	this.shape_99 = new cjs.Shape();
	this.shape_99.graphics.f("#000000").s().p("AAMAaIAAgrIgXAAIAAArIgLAAIAAg0IAtAAIAAA0g");
	this.shape_99.setTransform(437.8,-149.4);

	this.shape_100 = new cjs.Shape();
	this.shape_100.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJAAIAAgEQAAgFgCgCQgDgDgFAAIgGABIgHAEIgEgJIAKgEIAIgBQAKAAAFAFQAFAFAAAJIAAAiIgIAAIgCgHQgEAFgEABQgEACgEABQgIAAgFgFgAAEABQgGABgEACQgDACAAAFQAAADACACQACACAEABQAEAAAEgEQAEgEAAgGIAAgEg");
	this.shape_100.setTransform(428.9,-149.4);

	this.shape_101 = new cjs.Shape();
	this.shape_101.graphics.f("#000000").s().p("AgUAYIAAgKQAJAFAJAAQAFgBAEgCQADgCAAgDQAAgFgDgCQgEgBgGAAIgGAAIAAgHIAFAAQAGAAAEgBQADgCAAgEQABgHgKAAQgIAAgJAEIgDgIQAKgFAKAAQAJAAAGAEQAFAEAAAHQAAAJgLACIAAABQAHAAADADQADAEAAAEQAAAHgHAFQgGAFgKAAQgNAAgGgEg");
	this.shape_101.setTransform(423.6,-149.4);

	this.shape_102 = new cjs.Shape();
	this.shape_102.graphics.f("#000000").s().p("AADAjIAAgsIABgNIgDADIgJAJIgGgIIATgQIAKAAIAABFg");
	this.shape_102.setTransform(415,-150.3);

	this.shape_103 = new cjs.Shape();
	this.shape_103.graphics.f("#000000").s().p("AgRAbQgGgJAAgSQAAgRAGgJQAGgJALAAQALAAAGAJQAHAJAAARQAAASgGAJQgGAJgMAAQgLAAgGgJgAgIgTQgDAGAAANQAAAOADAGQADAHAFAAQAGAAADgHQADgGAAgOQAAgNgDgGQgDgHgGAAQgFAAgDAHg");
	this.shape_103.setTransform(409.9,-150.3);

	this.shape_104 = new cjs.Shape();
	this.shape_104.graphics.f("#000000").s().p("AADAjIAAgsIABgNIgDADIgJAJIgGgIIATgQIAKAAIAABFg");
	this.shape_104.setTransform(401,-150.3);

	this.shape_105 = new cjs.Shape();
	this.shape_105.graphics.f("#000000").s().p("AgRAbQgGgJAAgSQAAgRAGgJQAGgJALAAQALAAAGAJQAHAJAAARQAAASgGAJQgGAJgMAAQgLAAgGgJgAgIgTQgDAGAAANQAAAOADAGQADAHAFAAQAGAAADgHQADgGAAgOQAAgNgDgGQgDgHgGAAQgFAAgDAHg");
	this.shape_105.setTransform(395.9,-150.3);

	this.shape_106 = new cjs.Shape();
	this.shape_106.graphics.f("#000000").s().p("AgRAjIAAgJQAEABAEAAQAKAAAGgGQAFgGABgOIgBAAQgDAFgEACQgEABgDAAQgKAAgFgFQgGgEAAgLQAAgLAHgGQAGgHAKAAQAGAAAGAEQAGADADAHQADAHAAAKQAAATgJALQgIAKgPAAIgJgBgAgIgWQgDAEAAAHQAAAGADAEQADABAFAAQAEAAAEgBQAEgEAAgEQAAgFgBgDQgCgEgDgCQgDgDgDAAQgFAAgDAEg");
	this.shape_106.setTransform(387.5,-150.3);

	this.shape_107 = new cjs.Shape();
	this.shape_107.graphics.f("#000000").s().p("AgWAgIAAgKIAKAEIAJABQAHAAADgDQAEgDABgHQAAgFgFgDQgFgDgHAAIgGAAIAAgHIAGAAQAPAAAAgMQAAgFgDgCQgDgDgEAAQgEAAgEACQgDABgGADIgFgIQAKgHAMAAQAKAAAFAEQAGAFABAIQAAAHgFAFQgDAEgHACIAAAAQAIAAAEADQAFAFAAAHQAAAKgIAGQgHAFgLAAQgMAAgIgEg");
	this.shape_107.setTransform(381.8,-150.3);

	this.shape_108 = new cjs.Shape();
	this.shape_108.graphics.f("#000000").s().p("AgOAjIAag7IgjAAIAAgKIAvAAIAAAIIgaA9g");
	this.shape_108.setTransform(376.1,-150.3);

	this.shape_109 = new cjs.Shape();
	this.shape_109.graphics.f("#000000").s().p("AgLArQAHgJAEgLQABgLAAgMQAAgKgBgMQgEgLgHgJIAKAAQAFAIAEAMQAEALAAALQAAANgEALQgEALgFAIg");
	this.shape_109.setTransform(369.1,-149.5);

	this.shape_110 = new cjs.Shape();
	this.shape_110.graphics.f("#000000").s().p("AgWAgIAAgLQAEADAGABIAJABQAGAAAEgDQAEgEAAgGQAAgNgOAAIgGAAIgGABIgFgBIADgjIAjAAIAAALIgZAAIgCARIAEAAIAFgBQAKAAAGAGQAHAEAAAJQAAAMgHAGQgIAHgLAAQgMAAgHgEg");
	this.shape_110.setTransform(364.7,-150.3);

	this.shape_111 = new cjs.Shape();
	this.shape_111.graphics.f("#000000").s().p("AgRAjIAAgJQAEABAEAAQAKAAAGgGQAFgGABgOIgBAAQgDAFgEACQgEABgDAAQgKAAgFgFQgGgEAAgLQAAgLAHgGQAGgHAKAAQAGAAAGAEQAGADADAHQADAHAAAKQAAATgJALQgIAKgPAAIgJgBgAgIgWQgDAEAAAHQAAAGADAEQADABAFAAQAEAAAEgBQAEgEAAgEQAAgFgBgDQgCgEgDgCQgDgDgDAAQgFAAgDAEg");
	this.shape_111.setTransform(359,-150.3);

	this.shape_112 = new cjs.Shape();
	this.shape_112.graphics.f("#000000").s().p("AAFAjIAAgPIgeAAIAAgJIAegtIALAAIAAAsIAKAAIAAAKIgKAAIAAAPgAABgOIgQAYIAUAAIAAgQIABgPIgBAAIgEAHg");
	this.shape_112.setTransform(353.3,-150.3);

	this.shape_113 = new cjs.Shape();
	this.shape_113.graphics.f("#000000").s().p("AACArQgFgIgEgLQgEgLAAgNQAAgLAEgLQAEgMAFgIIAKAAQgHAJgDALQgCAMAAAKQAAAMACALQADALAHAJg");
	this.shape_113.setTransform(348.9,-149.5);

	this.shape_114 = new cjs.Shape();
	this.shape_114.graphics.f("#000000").s().p("AgOAjIAag7IgjAAIAAgKIAvAAIAAAIIgaA9g");
	this.shape_114.setTransform(341.8,-150.3);

	this.shape_115 = new cjs.Shape();
	this.shape_115.graphics.f("#000000").s().p("AgDAYIAAgUIgUAAIAAgHIAUAAIAAgUIAHAAIAAAUIAUAAIAAAHIgUAAIAAAUg");
	this.shape_115.setTransform(336.2,-150.3);

	this.shape_116 = new cjs.Shape();
	this.shape_116.graphics.f("#000000").s().p("AgXAlIAAgJIAGABQAIAAADgKIACgFIgVg0IAMAAIALAfIACAKIACgEIAMglIAMAAIgXA7QgEARgPAAIgHgBg");
	this.shape_116.setTransform(328,-148.2);

	this.shape_117 = new cjs.Shape();
	this.shape_117.graphics.f("#000000").s().p("AAMAaIAAgXIgXAAIAAAXIgMAAIAAg0IAMAAIAAAWIAXAAIAAgWIAMAAIAAA0g");
	this.shape_117.setTransform(322.1,-149.4);

	this.shape_118 = new cjs.Shape();
	this.shape_118.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAHgHQAGgIALAAQALAAAHAIQAHAHAAAMQAAANgHAHQgHAIgLAAQgGAAgGgEgAgJgMQgDAFAAAHQAAASAMAAQANAAAAgSQAAgRgNAAQgGAAgDAFg");
	this.shape_118.setTransform(315.8,-149.4);

	this.shape_119 = new cjs.Shape();
	this.shape_119.graphics.f("#000000").s().p("AgEAxIAAgXQgNgBgHgHQgIgHAAgLQAAgMAIgHQAHgHANgBIAAgWIAJAAIAAAWQANABAHAHQAIAIAAALQAAALgIAHQgHAHgNABIAAAXgAAFARQAIgBAEgEQAEgFAAgHQAAgHgEgFQgEgFgIgBgAgQgNQgEAFAAAIQAAAHAEAFQAEAEAIABIAAgjQgIABgEAEg");
	this.shape_119.setTransform(308.9,-149.3);

	this.shape_120 = new cjs.Shape();
	this.shape_120.graphics.f("#000000").s().p("AgQAUQgGgHAAgNQgBgMAHgHQAGgIAKAAQALAAAGAHQAGAGAAAMIAAAEIgiAAQAAAIAEAEQAFAFAFAAIAJgCIAJgDIAAAKQgEACgFAAIgJACQgLAAgIgIgAgHgOQgDADgBAHIAXAAQAAgHgDgDQgEgEgFAAQgEAAgDAEg");
	this.shape_120.setTransform(302.3,-149.4);

	this.shape_121 = new cjs.Shape();
	this.shape_121.graphics.f("#000000").s().p("AgYAaIAAgJIADAAQAFABADgLQADgKACgXIAiAAIAAA0IgMAAIAAgrIgOAAQAAARgDAIQgCAKgDAFQgFAEgFAAIgGgBg");
	this.shape_121.setTransform(295.9,-149.4);

	this.shape_122 = new cjs.Shape();
	this.shape_122.graphics.f("#000000").s().p("AgPAUQgIgHABgNQAAgMAGgHQAHgIAJAAQALAAAGAHQAHAGgBAMIAAAEIgiAAQAAAIAFAEQADAFAGAAIAJgCIAJgDIAAAKQgEACgFAAIgKACQgLAAgGgIgAgGgOQgEADgBAHIAXAAQAAgHgDgDQgDgEgGAAQgDAAgDAEg");
	this.shape_122.setTransform(290.4,-149.4);

	this.shape_123 = new cjs.Shape();
	this.shape_123.graphics.f("#000000").s().p("AgEAaIAAgrIgSAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_123.setTransform(285.1,-149.4);

	this.shape_124 = new cjs.Shape();
	this.shape_124.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAGgHQAHgIALAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMAAQgGAAgGgEgAgJgMQgDAFAAAHQAAASAMAAQAOAAAAgSQAAgRgOAAQgFAAgEAFg");
	this.shape_124.setTransform(276.9,-149.4);

	this.shape_125 = new cjs.Shape();
	this.shape_125.graphics.f("#000000").s().p("AAMAaIAAgrIgXAAIAAArIgLAAIAAg0IAtAAIAAA0g");
	this.shape_125.setTransform(270.6,-149.4);

	this.shape_126 = new cjs.Shape();
	this.shape_126.graphics.f("#000000").s().p("AAOAaIAAgaIABgGIAAgHIgZAnIgOAAIAAg0IALAAIAAAaIgBAOIAZgoIAOAAIAAA0g");
	this.shape_126.setTransform(261.5,-149.4);

	this.shape_127 = new cjs.Shape();
	this.shape_127.graphics.f("#000000").s().p("AAOAaIAAgaIABgGIAAgHIgZAnIgOAAIAAg0IALAAIAAAaIgBAOIAZgoIAOAAIAAA0g");
	this.shape_127.setTransform(254.7,-149.4);

	this.shape_128 = new cjs.Shape();
	this.shape_128.graphics.f("#000000").s().p("AAMAaIAAgXIgXAAIAAAXIgMAAIAAg0IAMAAIAAAWIAXAAIAAgWIAMAAIAAA0g");
	this.shape_128.setTransform(248.1,-149.4);

	this.shape_129 = new cjs.Shape();
	this.shape_129.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJAAIAAgEQAAgFgCgCQgDgDgFAAIgGABIgHAEIgEgJIAKgEIAIgBQAKAAAFAFQAFAFAAAJIAAAiIgIAAIgCgHQgEAFgEABQgEACgEABQgIAAgFgFgAAEABQgGABgEACQgDACAAAFQAAADACACQACACAEABQAEAAAEgEQAEgEAAgGIAAgEg");
	this.shape_129.setTransform(241.8,-149.4);

	this.shape_130 = new cjs.Shape();
	this.shape_130.graphics.f("#000000").s().p("AAMAaIAAgrIgXAAIAAArIgLAAIAAg0IAtAAIAAA0g");
	this.shape_130.setTransform(235.9,-149.4);

	this.shape_131 = new cjs.Shape();
	this.shape_131.graphics.f("#000000").s().p("AAUAaIAAgpIgBADIgDALIgMAbIgHAAIgMgbIgEgOIAAApIgLAAIAAg0IAQAAIALAbIADAOIAAgCIAEgLIAMgcIAPAAIAAA0g");
	this.shape_131.setTransform(228.7,-149.4);

	this.shape_132 = new cjs.Shape();
	this.shape_132.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAHgHQAGgIALAAQALAAAHAIQAHAHAAAMQAAANgHAHQgHAIgLAAQgGAAgGgEgAgJgMQgDAFAAAHQAAASAMAAQANAAAAgSQAAgRgNAAQgGAAgDAFg");
	this.shape_132.setTransform(221.8,-149.4);

	this.shape_133 = new cjs.Shape();
	this.shape_133.graphics.f("#000000").s().p("AALAaIgWgaIAAAaIgLAAIAAg0IALAAIAAAaIAUgaIANAAIgWAaIAXAag");
	this.shape_133.setTransform(216.4,-149.4);

	this.shape_134 = new cjs.Shape();
	this.shape_134.graphics.f("#000000").s().p("AgXAnIAAhMIAJAAIACAHIAAAAQAGgIAJAAQAKAAAFAIQAGAGAAAOQAAALgGAHQgFAIgLAAQgIAAgGgIIAAAAIAAAJIAAAWgAgIgZQgEAFAAAIIAAACQAAAKAEACQADAEAFABQAGAAADgGQAEgCgBgJQABgJgEgFQgDgFgGABQgFAAgDADg");
	this.shape_134.setTransform(607,-170.4);

	this.shape_135 = new cjs.Shape();
	this.shape_135.graphics.f("#000000").s().p("AgEAaIAAgrIgSAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_135.setTransform(601.2,-171.6);

	this.shape_136 = new cjs.Shape();
	this.shape_136.graphics.f("#000000").s().p("AAMAaIAAgXIgXAAIAAAXIgMAAIAAg0IAMAAIAAAWIAXAAIAAgWIAMAAIAAA0g");
	this.shape_136.setTransform(595.3,-171.6);

	this.shape_137 = new cjs.Shape();
	this.shape_137.graphics.f("#000000").s().p("AgQAUQgGgHAAgNQgBgMAHgHQAGgIAKAAQALABAGAGQAGAHABALIAAAEIgiAAQAAAIADAEQAFAFAFgBIAJgBIAJgDIAAAKQgFACgEAAIgJABQgLABgIgIgAgHgOQgDADAAAHIAWAAQAAgHgDgDQgDgEgGAAQgDAAgEAEg");
	this.shape_137.setTransform(589.3,-171.6);

	this.shape_138 = new cjs.Shape();
	this.shape_138.graphics.f("#000000").s().p("AARAkIAAgTIgsAAIAAg0IAMAAIAAArIAXAAIAAgrIAMAAIAAArIAHAAIAAAcg");
	this.shape_138.setTransform(583.4,-170.6);

	this.shape_139 = new cjs.Shape();
	this.shape_139.graphics.f("#000000").s().p("AgLAEIAAgHIAXAAIAAAHg");
	this.shape_139.setTransform(578.2,-171.6);

	this.shape_140 = new cjs.Shape();
	this.shape_140.graphics.f("#000000").s().p("AgEAaIAAgrIgSAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_140.setTransform(574.3,-171.6);

	this.shape_141 = new cjs.Shape();
	this.shape_141.graphics.f("#000000").s().p("AALAaIgWgaIAAAaIgLAAIAAg0IALAAIAAAaIAUgaIANAAIgWAaIAXAag");
	this.shape_141.setTransform(569.2,-171.6);

	this.shape_142 = new cjs.Shape();
	this.shape_142.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJAAIAAgEQAAgFgCgCQgDgCgFgBIgGABIgHAEIgEgJIAKgEIAIgBQAKABAFAEQAFAFAAAJIAAAiIgIAAIgCgHQgEAFgEABQgEACgEAAQgIABgFgFgAAEABQgGABgEACQgDACAAAFQAAADACACQACACAEAAQAEAAAEgDQAEgEAAgGIAAgFg");
	this.shape_142.setTransform(562.9,-171.6);

	this.shape_143 = new cjs.Shape();
	this.shape_143.graphics.f("#000000").s().p("AgFAaIAAgrIgRAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_143.setTransform(557.7,-171.6);

	this.shape_144 = new cjs.Shape();
	this.shape_144.graphics.f("#000000").s().p("AAMAaIAAgXIgXAAIAAAXIgMAAIAAg0IAMAAIAAAWIAXAAIAAgWIAMAAIAAA0g");
	this.shape_144.setTransform(551.8,-171.6);

	this.shape_145 = new cjs.Shape();
	this.shape_145.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAHgHQAGgIALAAQAMAAAHAIQAGAHAAAMQAAANgGAHQgHAIgMgBQgGAAgGgDgAgJgMQgDAFAAAHQAAASAMAAQANAAAAgSQAAgRgNAAQgGAAgDAFg");
	this.shape_145.setTransform(545.6,-171.6);

	this.shape_146 = new cjs.Shape();
	this.shape_146.graphics.f("#000000").s().p("AAKAaIgVgaIAAAaIgLAAIAAg0IALAAIAAAaIAUgaIANAAIgWAaIAYAag");
	this.shape_146.setTransform(540.2,-171.6);

	this.shape_147 = new cjs.Shape();
	this.shape_147.graphics.f("#000000").s().p("AgXAaIAAg0IAYAAQAVAAAAAPQAAAJgLACIAAAAQAGAAAEACQADADAAAGQAAAHgGAFQgGADgLAAgAgMASIAMAAQAMAAAAgIQAAgEgDgBQgDgCgGAAIgMAAgAgMgEIAMAAQAFAAADgBQADgCAAgEQgBgDgCgCQgDgBgEAAIgNAAg");
	this.shape_147.setTransform(531.6,-171.6);

	this.shape_148 = new cjs.Shape();
	this.shape_148.graphics.f("#000000").s().p("AAMAaIAAgVIgKAAIgMAVIgMAAIAPgVQgGgCgDgDQgDgDgBgGQAAgIAGgEQAGgFAIAAIAXAAIAAA0gAgFgPQgDACAAAEQAAAEADACQADACAEAAIAKAAIAAgQIgMAAQgDAAgCACg");
	this.shape_148.setTransform(522.5,-171.6);

	this.shape_149 = new cjs.Shape();
	this.shape_149.graphics.f("#000000").s().p("AgNAVQgGgIAAgNQAAgMAGgHQAHgIALAAQAIAAAHAEIgDAJQgIgDgEAAQgMAAAAARQAAAJADAFQAEAEAEAAQAIAAAHgEIAAAKQgDACgEAAIgIABQgLAAgGgGg");
	this.shape_149.setTransform(517.6,-171.6);

	this.shape_150 = new cjs.Shape();
	this.shape_150.graphics.f("#000000").s().p("AgXAaIAAg0IAMAAIAAAWIALAAQAYAAAAANQAAAJgHAFQgFADgMAAgAgLASIALAAQAGAAADgCQADgCAAgEQAAgEgEgBQgDgCgFAAIgLAAg");
	this.shape_150.setTransform(512.2,-171.6);

	this.shape_151 = new cjs.Shape();
	this.shape_151.graphics.f("#000000").s().p("AgEAaIAAgrIgSAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_151.setTransform(506.5,-171.6);

	this.shape_152 = new cjs.Shape();
	this.shape_152.graphics.f("#000000").s().p("AAOAaIAAgaIABgGIAAgHIgZAnIgOAAIAAg0IALAAIAAAaIgBAOIAZgoIAOAAIAAA0g");
	this.shape_152.setTransform(500.5,-171.6);

	this.shape_153 = new cjs.Shape();
	this.shape_153.graphics.f("#000000").s().p("AgEAaIAAgrIgSAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_153.setTransform(494.6,-171.6);

	this.shape_154 = new cjs.Shape();
	this.shape_154.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJAAIAAgEQAAgFgCgCQgDgCgFgBIgGABIgHAEIgEgJIAKgEIAIgBQAKABAFAEQAFAFAAAJIAAAiIgIAAIgCgHQgEAFgEABQgEACgEAAQgIABgFgFgAAEABQgGABgEACQgDACAAAFQAAADACACQACACAEAAQAEAAAEgDQAEgEAAgGIAAgFg");
	this.shape_154.setTransform(489,-171.6);

	this.shape_155 = new cjs.Shape();
	this.shape_155.graphics.f("#000000").s().p("AgXAnIAAhMIAKAAIABAHIAAAAQAGgIAJAAQAKAAAGAIQAFAGAAAOQAAALgFAHQgGAIgKAAQgJAAgGgIIAAAAIAAAJIAAAWgAgIgZQgDAFgBAIIAAACQABAKADACQADAEAFABQAGAAADgGQADgCABgJQgBgJgDgFQgDgFgGABQgFAAgDADg");
	this.shape_155.setTransform(483.3,-170.4);

	this.shape_156 = new cjs.Shape();
	this.shape_156.graphics.f("#000000").s().p("AgRAdQgHgIAAgQQAAgQAGgKQAGgKAMgCIAXgEIABAKIgXADQgFACgEAFQgDAFgBAJIABAAQADgEAEgCQAEgCAEAAQAKAAAGAGQAFAFAAALQAAANgHAHQgGAHgMAAQgKAAgHgJgAgDgBIgFACIgEAEQAAAMADAGQAEAGAFAAQANAAAAgRQAAgOgLAAQgCAAgDABg");
	this.shape_156.setTransform(477,-172.7);

	this.shape_157 = new cjs.Shape();
	this.shape_157.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAHgHQAGgIALAAQALAAAIAIQAGAHAAAMQAAANgGAHQgIAIgLgBQgGAAgGgDgAgJgMQgDAFAAAHQAAASAMAAQAOAAgBgSQABgRgOAAQgGAAgDAFg");
	this.shape_157.setTransform(470.9,-171.6);

	this.shape_158 = new cjs.Shape();
	this.shape_158.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAHgHQAGgIALAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMgBQgGAAgGgDgAgJgMQgDAFAAAHQAAASAMAAQAOAAAAgSQAAgRgOAAQgFAAgEAFg");
	this.shape_158.setTransform(462.2,-171.6);

	this.shape_159 = new cjs.Shape();
	this.shape_159.graphics.f("#000000").s().p("AAUAaIAAgpIgBADIgDALIgMAbIgHAAIgMgbIgEgOIAAApIgLAAIAAg0IAQAAIALAbIADAOIAAgCIAEgLIAMgcIAPAAIAAA0g");
	this.shape_159.setTransform(455.1,-171.6);

	this.shape_160 = new cjs.Shape();
	this.shape_160.graphics.f("#000000").s().p("AAOAaIAAgaIABgGIAAgHIgZAnIgOAAIAAg0IALAAIAAAaIgBAOIAZgoIAOAAIAAA0g");
	this.shape_160.setTransform(447.8,-171.6);

	this.shape_161 = new cjs.Shape();
	this.shape_161.graphics.f("#000000").s().p("AASAkIAAgTIgjAAIAAATIgLAAIAAgcIAFAAQAGgIADgKQADgMABgNIAfAAIAAArIAIAAIAAAcgAgEgHQgDAJgEAGIAVAAIAAgiIgKAAQgBAKgDAJg");
	this.shape_161.setTransform(441.3,-170.6);

	this.shape_162 = new cjs.Shape();
	this.shape_162.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAGgHQAIgIAKAAQALAAAIAIQAGAHAAAMQAAANgGAHQgIAIgLgBQgGAAgGgDgAgJgMQgDAFAAAHQAAASAMAAQAOAAgBgSQABgRgOAAQgGAAgDAFg");
	this.shape_162.setTransform(435.2,-171.6);

	this.shape_163 = new cjs.Shape();
	this.shape_163.graphics.f("#000000").s().p("AANAaIgNgUIgMAUIgNAAIATgaIgSgaIANAAIALATIAMgTIANAAIgSAaIATAag");
	this.shape_163.setTransform(429.7,-171.6);

	this.shape_164 = new cjs.Shape();
	this.shape_164.graphics.f("#000000").s().p("AgRAdQgHgIAAgQQAAgQAGgKQAGgKAMgCIAXgEIABAKIgXADQgFACgEAFQgEAFAAAJIABAAQADgEAEgCQAEgCAEAAQAKAAAGAGQAFAFAAALQAAANgHAHQgGAHgMAAQgKAAgHgJgAgDgBIgFACIgEAEQAAAMADAGQAEAGAFAAQANAAAAgRQAAgOgLAAQgCAAgDABg");
	this.shape_164.setTransform(423.9,-172.7);

	this.shape_165 = new cjs.Shape();
	this.shape_165.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAHgHQAGgIALAAQALAAAIAIQAGAHAAAMQAAANgGAHQgIAIgLgBQgGAAgGgDgAgJgMQgDAFAAAHQAAASAMAAQAOAAgBgSQABgRgOAAQgGAAgDAFg");
	this.shape_165.setTransform(417.8,-171.6);

	this.shape_166 = new cjs.Shape();
	this.shape_166.graphics.f("#000000").s().p("AgQAUQgGgHgBgNQAAgMAHgHQAGgIAKAAQALABAGAGQAGAHABALIAAAEIgiAAQAAAIADAEQAEAFAGgBIAJgBIAIgDIAAAKQgEACgEAAIgKABQgLABgHgIgAgHgOQgDADAAAHIAWAAQAAgHgDgDQgEgEgFAAQgEAAgDAEg");
	this.shape_166.setTransform(411.9,-171.6);

	this.shape_167 = new cjs.Shape();
	this.shape_167.graphics.f("#000000").s().p("AAMAaIAAgXIgXAAIAAAXIgMAAIAAg0IAMAAIAAAWIAXAAIAAgWIAMAAIAAA0g");
	this.shape_167.setTransform(405.7,-171.6);

	this.shape_168 = new cjs.Shape();
	this.shape_168.graphics.f("#000000").s().p("AgHAMIAFgXIAKAAIAAABQgCAJgGANg");
	this.shape_168.setTransform(398.4,-168.8);

	this.shape_169 = new cjs.Shape();
	this.shape_169.graphics.f("#000000").s().p("AAAAQIALgQIgLgQIAGgEIARAUIAAAAIgRAVgAgWAQIANgQIgNgQIAIgEIAPAUIAAAAIgPAVg");
	this.shape_169.setTransform(394.5,-171.6);

	this.shape_170 = new cjs.Shape();
	this.shape_170.graphics.f("#000000").s().p("AgPAUQgIgHABgNQAAgMAGgHQAHgIAJAAQALABAGAGQAGAHAAALIAAAEIgiAAQAAAIAFAEQAEAFAFgBIAJgBIAJgDIAAAKQgEACgFAAIgJABQgMABgGgIgAgGgOQgEADgBAHIAXAAQAAgHgDgDQgDgEgGAAQgDAAgDAEg");
	this.shape_170.setTransform(388.9,-171.6);

	this.shape_171 = new cjs.Shape();
	this.shape_171.graphics.f("#000000").s().p("AAOAaIAAgaIABgGIAAgHIgZAnIgOAAIAAg0IALAAIAAAaIgBAOIAZgoIAOAAIAAA0g");
	this.shape_171.setTransform(382.6,-171.6);

	this.shape_172 = new cjs.Shape();
	this.shape_172.graphics.f("#000000").s().p("AgNAVQgGgIAAgNQAAgMAGgHQAHgIALAAQAIAAAHAEIgDAJQgIgDgEAAQgMAAAAARQAAAJADAFQAEAEAEAAQAIAAAHgEIAAAKQgDACgEAAIgIABQgLAAgGgGg");
	this.shape_172.setTransform(376.8,-171.6);

	this.shape_173 = new cjs.Shape();
	this.shape_173.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJAAIAAgEQAAgFgCgCQgDgCgFgBIgGABIgHAEIgEgJIAKgEIAIgBQAKABAFAEQAFAFAAAJIAAAiIgIAAIgCgHQgEAFgEABQgEACgEAAQgIABgFgFgAAEABQgGABgEACQgDACAAAFQAAADACACQACACAEAAQAEAAAEgDQAEgEAAgGIAAgFg");
	this.shape_173.setTransform(371.2,-171.6);

	this.shape_174 = new cjs.Shape();
	this.shape_174.graphics.f("#000000").s().p("AgYAaIAAgJIADABQAFgBADgKQADgKABgXIAiAAIAAA0IgLAAIAAgrIgOAAQAAARgDAIQgCAKgEAEQgDAFgHAAIgFgBg");
	this.shape_174.setTransform(365,-171.5);

	this.shape_175 = new cjs.Shape();
	this.shape_175.graphics.f("#000000").s().p("AgQAaIAAg0IAhAAIAAAJIgVAAIAAArg");
	this.shape_175.setTransform(360.7,-171.6);

	this.shape_176 = new cjs.Shape();
	this.shape_176.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAHgHQAGgIALAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMgBQgGAAgGgDgAgJgMQgDAFAAAHQAAASAMAAQAOAAAAgSQAAgRgOAAQgFAAgEAFg");
	this.shape_176.setTransform(355.1,-171.6);

	this.shape_177 = new cjs.Shape();
	this.shape_177.graphics.f("#000000").s().p("AgRAbQgJgKAAgRQAAgKAFgIQADgIAJgFQAHgEAIAAQAMAAAIAEIgDAKIgIgDIgJgBQgIAAgGAHQgFAHAAALQAAANAFAHQAGAGAIAAIAJgBIAJgCIAAAKQgIADgLAAQgOAAgIgJg");
	this.shape_177.setTransform(349,-172.5);

	this.shape_178 = new cjs.Shape();
	this.shape_178.graphics.f("#000000").s().p("AAAAAIAAAAIAPgUIAIAEIgNAQIANAQIgIAFgAgWAAIAAAAIARgUIAGAEIgLAQIALAQIgGAFg");
	this.shape_178.setTransform(342.9,-171.6);

	this.shape_179 = new cjs.Shape();
	this.shape_179.graphics.f("#000000").s().p("AANAjIgbgjIAAAjIgMAAIAAhFIAMAAIAAAiIAbgiIANAAIgbAiIAcAjg");
	this.shape_179.setTransform(334.8,-172.5);

	this.shape_180 = new cjs.Shape();
	this.shape_180.graphics.f("#000000").s().p("AgRAbQgIgKAAgRQgBgKAEgIQAFgIAIgFQAHgEAJAAQAKAAAJAEIgDAKIgIgDIgIgBQgJAAgGAHQgFAHgBALQABANAFAHQAGAGAJAAIAIgBIAJgCIAAAKQgIADgLAAQgOAAgIgJg");
	this.shape_180.setTransform(328.1,-172.5);

	this.shape_181 = new cjs.Shape();
	this.shape_181.graphics.f("#000000").s().p("AgYAbQgIgKAAgRQAAgQAIgKQAKgJAOAAQAQAAAIAJQAJAKAAAQQAAARgJAKQgIAJgQAAQgPAAgJgJgAgPgSQgEAGAAAMQAAANAEAGQAGAHAJAAQAKAAAFgGQAGgHgBgNQABgMgGgGQgFgHgKAAQgJAAgGAHg");
	this.shape_181.setTransform(318.3,-172.5);

	this.shape_182 = new cjs.Shape();
	this.shape_182.graphics.f("#000000").s().p("AgYAbQgIgKAAgRQAAgQAIgKQAKgJAOAAQAPAAAJAJQAJAKAAAQQAAARgJAKQgJAJgPAAQgPAAgJgJgAgPgSQgEAGAAAMQAAANAEAGQAGAHAJAAQAKAAAFgGQAGgHgBgNQABgMgGgGQgFgHgKAAQgJAAgGAHg");
	this.shape_182.setTransform(310.4,-172.5);

	this.shape_183 = new cjs.Shape();
	this.shape_183.graphics.f("#000000").s().p("AgXAbQgJgKAAgRQAAgQAJgKQAIgJAPAAQAPAAAJAJQAJAKAAAQQAAARgJAKQgJAJgPAAQgPAAgIgJgAgOgSQgFAGgBAMQABANAFAGQAFAHAJAAQAKAAAFgGQAFgHAAgNQAAgMgFgGQgFgHgKAAQgJAAgFAHg");
	this.shape_183.setTransform(302.6,-172.5);

	this.shape_184 = new cjs.Shape();
	this.shape_184.graphics.f("#000000").s().p("AAUAaIAAgpIgBADIgDALIgMAbIgHAAIgMgbIgEgOIAAApIgLAAIAAg0IAQAAIALAbIADAOIAAgCIAEgLIAMgcIAPAAIAAA0g");
	this.shape_184.setTransform(292,-171.6);

	this.shape_185 = new cjs.Shape();
	this.shape_185.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAGgHQAIgIAKAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMgBQgGAAgGgDgAgJgMQgDAFAAAHQAAASAMAAQANAAABgSQgBgRgNAAQgFAAgEAFg");
	this.shape_185.setTransform(285.1,-171.6);

	this.shape_186 = new cjs.Shape();
	this.shape_186.graphics.f("#000000").s().p("AARAkIAAgTIgsAAIAAg0IAMAAIAAArIAYAAIAAgrIALAAIAAArIAIAAIAAAcg");
	this.shape_186.setTransform(279.1,-170.6);

	this.shape_187 = new cjs.Shape();
	this.shape_187.graphics.f("#000000").s().p("AgXAaIAAg0IAYAAQAVAAAAAPQAAAJgLACIAAAAQAGAAAEACQADADAAAGQAAAHgGAFQgGADgLAAgAgLASIALAAQAMAAAAgIQAAgEgDgBQgDgCgGAAIgLAAgAgLgEIALAAQAEAAADgBQAEgCAAgEQAAgDgDgCQgCgBgFAAIgMAAg");
	this.shape_187.setTransform(272.7,-171.6);

	this.shape_188 = new cjs.Shape();
	this.shape_188.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJAAIAAgEQAAgFgCgCQgDgCgFgBIgGABIgHAEIgEgJIAKgEIAIgBQAKABAFAEQAFAFAAAJIAAAiIgIAAIgCgHQgEAFgEABQgEACgEAAQgIABgFgFgAAEABQgGABgEACQgDACAAAFQAAADACACQACACAEAAQAEAAAEgDQAEgEAAgGIAAgFg");
	this.shape_188.setTransform(266.3,-171.6);

	this.shape_189 = new cjs.Shape();
	this.shape_189.graphics.f("#000000").s().p("AASAkIAAgTIgjAAIAAATIgLAAIAAgcIAFAAQAGgIADgKQADgMABgNIAfAAIAAArIAIAAIAAAcgAgEgHQgDAJgEAGIAVAAIAAgiIgKAAQgBAKgDAJg");
	this.shape_189.setTransform(260.5,-170.6);

	this.shape_190 = new cjs.Shape();
	this.shape_190.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAGgHQAIgIAKAAQAMAAAGAIQAHAHAAAMQAAANgHAHQgGAIgMgBQgGAAgGgDgAgJgMQgDAFAAAHQAAASAMAAQAOAAAAgSQAAgRgOAAQgFAAgEAFg");
	this.shape_190.setTransform(254.4,-171.6);

	this.shape_191 = new cjs.Shape();
	this.shape_191.graphics.f("#000000").s().p("AgXAnIAAhMIAJAAIACAHIAAAAQAGgIAJAAQAKAAAFAIQAGAGAAAOQAAALgGAHQgFAIgLAAQgIAAgGgIIAAAAIAAAJIAAAWgAgIgZQgEAFAAAIIAAACQAAAKAEACQADAEAFABQAGAAADgGQAEgCgBgJQABgJgEgFQgDgFgGABQgFAAgDADg");
	this.shape_191.setTransform(248.3,-170.4);

	this.shape_192 = new cjs.Shape();
	this.shape_192.graphics.f("#000000").s().p("AAMAaIAAgrIgXAAIAAArIgLAAIAAg0IAtAAIAAA0g");
	this.shape_192.setTransform(241.9,-171.6);

	this.shape_193 = new cjs.Shape();
	this.shape_193.graphics.f("#000000").s().p("AgXAaIAAg0IAMAAIAAAWIAMAAQAWAAAAANQAAAJgFAFQgGADgLAAgAgLASIALAAQAGAAADgCQADgCAAgEQAAgEgDgBQgEgCgFAAIgLAAg");
	this.shape_193.setTransform(233.3,-171.6);

	this.shape_194 = new cjs.Shape();
	this.shape_194.graphics.f("#000000").s().p("AgFAaIAAgrIgRAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_194.setTransform(227.5,-171.6);

	this.shape_195 = new cjs.Shape();
	this.shape_195.graphics.f("#000000").s().p("AgRAXQgEgEAAgIQAAgIAGgDQAGgEALAAIAJAAIAAgEQAAgFgCgCQgDgCgFgBIgGABIgHAEIgEgJIAKgEIAIgBQAKABAFAEQAFAFAAAJIAAAiIgIAAIgCgHQgEAFgEABQgEACgEAAQgIABgFgFgAAEABQgGABgEACQgDACAAAFQAAADACACQACACAEAAQAEAAAEgDQAEgEAAgGIAAgFg");
	this.shape_195.setTransform(221.9,-171.6);

	this.shape_196 = new cjs.Shape();
	this.shape_196.graphics.f("#000000").s().p("AgEAaIAAgrIgSAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_196.setTransform(216.6,-171.6);

	this.shape_197 = new cjs.Shape();
	this.shape_197.graphics.f("#000000").s().p("AgNAVQgGgIAAgNQAAgMAGgHQAHgIALAAQAIAAAHAEIgDAJQgIgDgEAAQgMAAAAARQAAAJADAFQAEAEAEAAQAIAAAHgEIAAAKQgDACgEAAIgIABQgLAAgGgGg");
	this.shape_197.setTransform(211.7,-171.6);

	this.shape_198 = new cjs.Shape();
	this.shape_198.graphics.f("#000000").s().p("AAVAaIAAg0IALAAIAAA0gAgfAaIAAg0IALAAIAAAWIALAAQAKAAAFAEQAGACAAAHQAAAJgGAFQgGADgJAAgAgUASIAJAAQAIAAACgCQABgCABgEQgBgEgBgBQgDgCgFAAIgLAAg");
	this.shape_198.setTransform(202.5,-171.6);

	this.shape_199 = new cjs.Shape();
	this.shape_199.graphics.f("#000000").s().p("AgRAdQgHgIAAgQQAAgQAGgKQAGgKAMgCIAXgEIABAKIgXADQgFACgEAFQgDAFgBAJIABAAQADgEAEgCQAEgCAEAAQAKAAAGAGQAFAFAAALQAAANgHAHQgHAHgLAAQgLAAgGgJgAgDgBIgFACIgEAEQAAAMADAGQAEAGAFAAQANAAAAgRQAAgOgLAAQgCAAgDABg");
	this.shape_199.setTransform(195.4,-172.7);

	this.shape_200 = new cjs.Shape();
	this.shape_200.graphics.f("#000000").s().p("AgMAYQgGgEgDgGQgDgGAAgIQAAgMAHgHQAGgIALAAQALAAAIAIQAGAHAAAMQAAANgGAHQgIAIgLgBQgGAAgGgDgAgJgMQgDAFAAAHQAAASAMAAQANAAAAgSQAAgRgNAAQgGAAgDAFg");
	this.shape_200.setTransform(189.3,-171.6);

	this.shape_201 = new cjs.Shape();
	this.shape_201.graphics.f("#000000").s().p("AgFAaIAAgrIgRAAIAAgJIAtAAIAAAJIgSAAIAAArg");
	this.shape_201.setTransform(183.8,-171.6);

	this.shape_202 = new cjs.Shape();
	this.shape_202.graphics.f("#000000").s().p("AAPAjIAAgcIgLADIgJABQgKAAgFgFQgGgEAAgHIAAgdIAMAAIAAAaQAAAGADACQACABAHAAIAHgBIAKgBIAAghIAMAAIAABFg");
	this.shape_202.setTransform(177.5,-172.5);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_202},{t:this.shape_201},{t:this.shape_200},{t:this.shape_199},{t:this.shape_198},{t:this.shape_197},{t:this.shape_196},{t:this.shape_195},{t:this.shape_194},{t:this.shape_193},{t:this.shape_192},{t:this.shape_191},{t:this.shape_190},{t:this.shape_189},{t:this.shape_188},{t:this.shape_187},{t:this.shape_186},{t:this.shape_185},{t:this.shape_184},{t:this.shape_183},{t:this.shape_182},{t:this.shape_181},{t:this.shape_180},{t:this.shape_179},{t:this.shape_178},{t:this.shape_177},{t:this.shape_176},{t:this.shape_175},{t:this.shape_174},{t:this.shape_173},{t:this.shape_172},{t:this.shape_171},{t:this.shape_170},{t:this.shape_169},{t:this.shape_168},{t:this.shape_167},{t:this.shape_166},{t:this.shape_165},{t:this.shape_164},{t:this.shape_163},{t:this.shape_162},{t:this.shape_161},{t:this.shape_160},{t:this.shape_159},{t:this.shape_158},{t:this.shape_157},{t:this.shape_156},{t:this.shape_155},{t:this.shape_154},{t:this.shape_153},{t:this.shape_152},{t:this.shape_151},{t:this.shape_150},{t:this.shape_149},{t:this.shape_148},{t:this.shape_147},{t:this.shape_146},{t:this.shape_145},{t:this.shape_144},{t:this.shape_143},{t:this.shape_142},{t:this.shape_141},{t:this.shape_140},{t:this.shape_139},{t:this.shape_138},{t:this.shape_137},{t:this.shape_136},{t:this.shape_135},{t:this.shape_134},{t:this.shape_133},{t:this.shape_132},{t:this.shape_131},{t:this.shape_130},{t:this.shape_129},{t:this.shape_128},{t:this.shape_127},{t:this.shape_126},{t:this.shape_125},{t:this.shape_124},{t:this.shape_123},{t:this.shape_122},{t:this.shape_121},{t:this.shape_120},{t:this.shape_119},{t:this.shape_118},{t:this.shape_117},{t:this.shape_116},{t:this.shape_115},{t:this.shape_114},{t:this.shape_113},{t:this.shape_112},{t:this.shape_111},{t:this.shape_110},{t:this.shape_109},{t:this.shape_108},{t:this.shape_107},{t:this.shape_106},{t:this.shape_105},{t:this.shape_104},{t:this.shape_103},{t:this.shape_102},{t:this.shape_101},{t:this.shape_100},{t:this.shape_99},{t:this.shape_98},{t:this.shape_97},{t:this.shape_96},{t:this.shape_95},{t:this.shape_94},{t:this.shape_93},{t:this.shape_92},{t:this.shape_91},{t:this.shape_90},{t:this.shape_89},{t:this.shape_88},{t:this.shape_87},{t:this.shape_86},{t:this.shape_85},{t:this.shape_84},{t:this.shape_83},{t:this.shape_82},{t:this.shape_81},{t:this.shape_80},{t:this.shape_79},{t:this.shape_78},{t:this.shape_77},{t:this.shape_76},{t:this.shape_75},{t:this.shape_74},{t:this.shape_73},{t:this.shape_72},{t:this.shape_71},{t:this.shape_70},{t:this.shape_69},{t:this.shape_68},{t:this.shape_67},{t:this.shape_66},{t:this.shape_65},{t:this.shape_64},{t:this.shape_63},{t:this.shape_62},{t:this.shape_61},{t:this.shape_60},{t:this.shape_59},{t:this.shape_58},{t:this.shape_57},{t:this.shape_56},{t:this.shape_55},{t:this.shape_54},{t:this.shape_53},{t:this.shape_52},{t:this.shape_51},{t:this.shape_50},{t:this.shape_49},{t:this.shape_48},{t:this.shape_47},{t:this.shape_46},{t:this.shape_45},{t:this.shape_44},{t:this.shape_43},{t:this.shape_42},{t:this.shape_41},{t:this.shape_40},{t:this.shape_39},{t:this.shape_38},{t:this.shape_37},{t:this.shape_36},{t:this.shape_35},{t:this.shape_34},{t:this.shape_33},{t:this.shape_32},{t:this.shape_31},{t:this.shape_30},{t:this.shape_29},{t:this.shape_28},{t:this.shape_27},{t:this.shape_26},{t:this.shape_25},{t:this.shape_24},{t:this.shape_23},{t:this.shape_22},{t:this.shape_21},{t:this.shape_20},{t:this.shape_19},{t:this.shape_18},{t:this.shape_17},{t:this.shape_16},{t:this.shape_15},{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(113.7,-181.6,556.7,84.1);


(lib.Символ19 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#000000").s().p("AgJA2QgDgEAAgFQAAgHADgDQAEgEAFAAQAGAAAEAEQADADAAAHQAAAFgDAEQgEAEgGgBQgFABgEgEgAgIASIgEhLIAZAAIgEBLg");
	this.shape.setTransform(577.9,-236);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#000000").s().p("AglAnIAAgTIAPAFIAQABQAJAAAGgCQAGgDAAgFQAAgFgGgCQgGgDgLAAIgJAAIAAgOIAIAAQAMAAAGgDQAFgCAAgFQAAgEgEgCQgEgCgHAAIgOABIgOAEIgHgQQAJgEAJgBQAJgCAJAAQAQAAAKAHQAKAGAAAKQAAAPgSAFIAAAAQALABAEAFQAFAFAAAIQAAAIgFAGQgFAGgKADQgKAEgLAAQgWAAgMgGg");
	this.shape_1.setTransform(571.1,-234.8);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#000000").s().p("AAVArIAAgjIACgYIgmA7IgcAAIAAhVIAWAAIAAAiIgBAZIAmg7IAdAAIAABVg");
	this.shape_2.setTransform(561,-234.8);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#000000").s().p("AgnA/IAAh8IATAAIADAMIACAAQAIgNAOAAQAQAAAJAMQAIAMAAAVQAAAOgEAIQgEALgHAFQgIAFgKAAQgOAAgIgLIgCAAIACANIAAAjgAgLgmQgEAGAAAMIAAADQAAAOAEAEQAEAGAHAAQAQAAAAgYQAAgNgEgHQgEgGgIAAQgHAAgEAFg");
	this.shape_3.setTransform(550.4,-232.9);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#000000").s().p("AAPArIAAhDIgdAAIAABDIgYAAIAAhVIBNAAIAABVg");
	this.shape_4.setTransform(539.8,-234.8);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#000000").s().p("AAVA+IAAgjIADgaIgnA9IgcAAIAAhVIAXAAIAAAgIgCAbIAmg7IAdAAIAABVgAgagoQgJgGgBgPIAVAAQABAIADAEQADACAIAAQAIABADgEQAFgDAAgIIAVAAQgBAOgKAHQgJAHgRAAQgRAAgJgHg");
	this.shape_5.setTransform(524.7,-236.6);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#000000").s().p("AAfArIAAhVIAYAAIAABVgAg2ArIAAhVIAYAAIAAAiIALAAQATAAAJAGQAKAEAAANQAAAOgKAHQgJAHgSAAgAgeAbIALAAQAPAAAAgLQAAgFgDgDQgFgCgIAAIgKAAg");
	this.shape_6.setTransform(512.2,-234.8);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#000000").s().p("AAQArIAAgkIgfAAIAAAkIgYAAIAAhVIAYAAIAAAiIAfAAIAAgiIAYAAIAABVg");
	this.shape_7.setTransform(500.1,-234.8);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#000000").s().p("AgoArIAAhVIArAAQARAAAJAGQAJAGAAALQAAAHgEAFQgEAFgJABIAAABQAJAAAGAEQAFAFAAAIQAAANgKAHQgKAGgSAAgAgQAbIARAAQAIAAAEgDQADgDAAgFQAAgFgEgDQgEgCgIAAIgQAAgAgQgIIAQAAQAGAAAEgCQAEgCAAgFQAAgIgMAAIgSAAg");
	this.shape_8.setTransform(489.9,-234.8);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#000000").s().p("AgeAmQgIgIAAgNQABgOAJgEQAKgHASgBIAPAAIAAgEQAAgNgNAAQgJAAgPAGIgHgQQAPgIAQAAQASAAAJAIQAJAHAAAQIAAA4IgQAAIgEgMIgBAAQgGAIgHADQgEADgKAAQgNAAgHgHgAAFADQgHAAgFAEQgGADAAAHQAAAKALAAQAHAAAFgEQAFgFAAgIIAAgHg");
	this.shape_9.setTransform(479.4,-234.8);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#000000").s().p("AgsAqIAAgTIAIABQAEAAADgHQADgFADgNQACgPACgbIBAAAIAABVIgYAAIAAhDIgVAAQgBAcgEAOQgEAOgFAGQgGAHgKAAQgIAAgGgCg");
	this.shape_10.setTransform(469.1,-234.7);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#000000").s().p("AgdArIAAhVIA7AAIAAASIgjAAIAABDg");
	this.shape_11.setTransform(461.7,-234.8);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(399.8,-249.5,238,25.8);


(lib.Символ18 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#000000").s().p("AAWA+IAAgjIACgaIgnA9IgdAAIAAhVIAYAAIAAAgIgCAbIAmg7IAcAAIAABVgAgagnQgJgHgBgPIAVAAQABAIADAEQAEACAHAAQAHAAAFgDQADgEABgHIAVAAQgBAOgKAIQgJAGgRAAQgSAAgIgGg");
	this.shape.setTransform(601.4,-236.8);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#000000").s().p("AgeAmQgIgIAAgNQABgOAJgEQAKgHASgBIAPAAIAAgEQAAgNgNAAQgJAAgPAGIgHgQQAPgIAQAAQASAAAJAIQAJAHABAQIAAA4IgRAAIgEgMIgBAAQgGAIgHADQgEADgKAAQgNAAgHgHgAAFADQgHAAgFAEQgGADAAAHQAAAKALAAQAHAAAFgEQAFgFAAgIIAAgHg");
	this.shape_1.setTransform(590.6,-235);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#000000").s().p("AgnA/IAAh8IATAAIADAMIACAAQAIgNAOAAQAQAAAJAMQAIAMAAAVQAAAOgEAIQgEALgHAFQgIAFgKAAQgOAAgIgLIgCAAIACANIAAAjgAgLgmQgEAGAAAMIAAADQAAAOAEAEQAEAGAHAAQAQAAAAgYQAAgNgEgHQgEgGgIAAQgHAAgEAFg");
	this.shape_2.setTransform(581.2,-233.1);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#000000").s().p("AgdArIAAhVIA7AAIAAASIgjAAIAABDg");
	this.shape_3.setTransform(572.5,-235);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#000000").s().p("AAWArIAAgjIABgYIgmA7IgdAAIAAhVIAXAAIAAAiIgBAZIAmg7IAcAAIAABVg");
	this.shape_4.setTransform(562.5,-235);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#000000").s().p("AAfArIAAhVIAYAAIAABVgAg2ArIAAhVIAYAAIAAAiIAMAAQASAAAJAGQAJAEAAANQAAAOgJAHQgJAHgSAAgAgeAbIALAAQAPAAAAgLQAAgFgEgDQgEgCgHAAIgLAAg");
	this.shape_5.setTransform(549.9,-235);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#000000").s().p("AgoArIAAhVIArAAQARAAAJAGQAJAGAAALQAAAHgEAFQgEAFgJABIAAABQAJAAAGAEQAFAFAAAIQAAANgKAHQgKAGgSAAgAgQAbIARAAQAIAAAEgDQADgDAAgFQAAgFgEgDQgEgCgIAAIgQAAgAgQgIIAQAAQAGAAAEgCQAEgCAAgFQAAgIgMAAIgSAAg");
	this.shape_6.setTransform(538.3,-235);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#000000").s().p("AAVArIAAgjIACgYIgmA7IgcAAIAAhVIAWAAIAAAiIgBAZIAmg7IAdAAIAABVg");
	this.shape_7.setTransform(523,-235);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#000000").s().p("AgYAlQgGgGgBgLQAAgNALgHQALgEARgBIAQAAIAAgGQAAgMgFgHQgFgFgLgBQgJAAgNAHIgDgHQAOgHALABQAOgBAIAIQAGAHABAPIAAA3IgGAAIgCgNIgBAAQgGAIgHADQgGADgIAAQgMABgIgHgAAJAAQgQAAgIAFQgHAEAAALQAAAHAFAFQAFAFAIAAQAMAAAIgIQAIgIAAgOIAAgHg");
	this.shape_8.setTransform(508.5,-234.8);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#000000").s().p("AghAqIAAhTIAiAAQAPAAAIAFQAHAFAAAKQAAAJgEAEQgEAEgJACIAAABQAKABAFADQAFAFAAAIQgBANgHAHQgJAGgQAAgAgZAiIAbAAQAXABAAgTQAAgPgYAAIgaAAgAgZgEIAZAAQANgBAFgDQAEgEAAgIQAAgHgEgEQgGgCgLAAIgaAAg");
	this.shape_9.setTransform(500.3,-234.8);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#000000").s().p("AgCAqIAAhMIgdAAIAAgHIA/AAIAAAHIgcAAIAABMg");
	this.shape_10.setTransform(491.9,-234.8);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#000000").s().p("AgTAgQgKgLAAgVQAAgTALgMQAKgLARAAQALAAAKADIgCAHQgLgEgJAAQgNAAgIAKQgIAKAAAQQAAARAIAKQAIAKAMAAQAMAAAKgFIAAAHQgIAEgOAAQgPABgLgMg");
	this.shape_11.setTransform(484.8,-234.8);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#000000").s().p("AgXAgQgKgLAAgVQAAgSAKgNQAKgLAPAAQAPAAAJAKQAIALAAARIAAAFIg7AAQAAARAIAKQAIAIANABIANgBQAGgCAHgDIAAAHQgGAEgGAAIgOABQgRABgKgMgAgQgcQgHAJgBAPIAyAAQAAgPgGgJQgHgHgLgBQgKABgIAHg");
	this.shape_12.setTransform(476.4,-234.8);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#000000").s().p("AA0A4IAAgcIhuAAIAAhUIAIAAIAABMIAqAAIAAhMIAIAAIAABMIAoAAIAAhMIAIAAIAABMIALAAIAAAkg");
	this.shape_13.setTransform(465.6,-233.4);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#000000").s().p("AgjA8IAAgHQAFABAFAAQAEAAADgCQADgCACgEIAGgMIAEgLIgghTIAIAAIASAvIAJAcIAAAAIAKgcIASgvIAIAAIgkBhQgEAMgEAEQgDAEgEACQgEACgGAAIgKgBg");
	this.shape_14.setTransform(454.5,-232.9);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#000000").s().p("AAgAqIAAhJIgDAJIgaBAIgFAAIgYg5IgDgIIgCgJIAABKIgIAAIAAhTIALAAIAZA9IADANIAEgNIAZg9IALAAIAABTg");
	this.shape_15.setTransform(445.5,-234.8);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.f("#000000").s().p("AAaAqIAAg7IAAgQIgwBLIgLAAIAAhTIAIAAIAAA8IgBAPIAxhLIALAAIAABTg");
	this.shape_16.setTransform(435.3,-234.8);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_16},{t:this.shape_15},{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(399.8,-249.7,238,25.8);


(lib.Символ17 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#000000").s().p("AAZAqIAAgkIgZAAIgWAkIgKAAIAaglQgMgCgFgEQgGgGAAgJQAAgLAIgHQAIgHANAAIAhAAIAABTgAgPgdQgFAEAAAJQAAAIAFAEQAGAEAJAAIAZAAIAAghIgZAAQgKgBgFAFg");
	this.shape.setTransform(608.1,-234.8);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#000000").s().p("AAaAqIAAg7IAAgQIgwBLIgKAAIAAhTIAHAAIAAA8IAAAPIAwhLIALAAIAABTg");
	this.shape_1.setTransform(599.7,-234.8);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#000000").s().p("AAbAqIAAgpIg0AAIAAApIgIAAIAAhTIAIAAIAAAlIA0AAIAAglIAHAAIAABTg");
	this.shape_2.setTransform(590,-234.8);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#000000").s().p("AgXAlQgIgGAAgLQAAgNALgHQAKgEASgBIAQAAIAAgGQAAgMgFgHQgEgFgLgBQgKAAgNAHIgDgHQAOgHAMABQAOgBAGAIQAIAHgBAPIAAA3IgFAAIgCgNIgBAAQgGAIgHADQgGADgIAAQgMABgHgHgAAJAAQgQAAgHAFQgIAEAAALQAAAHAFAFQAEAFAJAAQAMAAAIgIQAIgIAAgOIAAgHg");
	this.shape_3.setTransform(580.6,-234.8);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#000000").s().p("AggAqIAAhTIAiAAQAPAAAGAFQAIAFAAAKQAAAJgEAEQgEAEgJACIAAABQAKABAFADQAFAFgBAIQAAANgIAHQgIAGgPAAgAgYAiIAaAAQAXABAAgTQAAgPgYAAIgZAAgAgYgEIAZAAQALgBAFgDQAGgEgBgIQABgHgGgEQgFgCgKAAIgaAAg");
	this.shape_4.setTransform(572.4,-234.8);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#000000").s().p("AgSAmQgJgFgFgLQgEgKAAgMQAAgUAKgLQAKgLAQAAQARAAAKALQAKAMAAATQAAAUgKAMQgKAMgRgBQgKABgIgGgAgVgaQgHAKAAAQQAAARAHAKQAJAKAMAAQANAAAIgKQAIgKAAgRQAAgQgIgKQgIgKgNAAQgNAAgIAKg");
	this.shape_5.setTransform(562.9,-234.8);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#000000").s().p("AAaAqIgagmIgaAmIgIAAIAfgqIgegpIAJAAIAYAkIAZgkIAIAAIgdApIAfAqg");
	this.shape_6.setTransform(554.5,-234.8);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#000000").s().p("AgYAlQgGgGAAgLQgBgNALgHQAKgEASgBIAQAAIAAgGQAAgMgFgHQgFgFgKgBQgKAAgNAHIgDgHQAOgHAMABQANgBAIAIQAGAHABAPIAAA3IgGAAIgCgNIgBAAQgGAIgHADQgHADgHAAQgMABgIgHgAAJAAQgQAAgIAFQgHAEAAALQAAAHAFAFQAEAFAKAAQALAAAIgIQAIgIAAgOIAAgHg");
	this.shape_7.setTransform(546,-234.8);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#000000").s().p("AgjA+IAAh6IAHAAIACANQAJgOARAAQASAAAIALQAKALgBAWQAAATgJAMQgKALgQAAQgSAAgJgPIAAAAIAAAHIAAAMIAAAhgAgTguQgIAIAAATIAAACQABASAGAIQAHAJANAAQANAAAHgKQAHgIAAgRQAAglgbAAQgNAAgGAIg");
	this.shape_8.setTransform(537.5,-233);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#000000").s().p("AgCAqIAAhMIgdAAIAAgHIA/AAIAAAHIgcAAIAABMg");
	this.shape_9.setTransform(528.9,-234.8);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#000000").s().p("AgTAgQgKgLAAgVQAAgTAKgMQALgLARAAQALAAAKADIgCAHQgLgEgJAAQgNAAgIAKQgIAKAAAQQAAARAIAKQAIAKAMAAQAMAAAKgFIAAAHQgIAEgOAAQgPABgLgMg");
	this.shape_10.setTransform(521.8,-234.8);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#000000").s().p("AAgAqIAAhJIgDAJIgaBAIgFAAIgXg5IgEgIIgCgJIAABKIgIAAIAAhTIALAAIAYA9IAEANIAEgNIAZg9IAKAAIAABTg");
	this.shape_11.setTransform(508.2,-234.8);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#000000").s().p("AgTAmQgIgFgEgLQgFgKAAgMQAAgUAKgLQAKgLAQAAQARAAAKALQAKAMAAATQAAAUgKAMQgKAMgRgBQgKABgJgGgAgVgaQgHAKAAAQQAAARAHAKQAJAKAMAAQANAAAIgKQAIgKAAgRQAAgQgIgKQgHgKgOAAQgNAAgIAKg");
	this.shape_12.setTransform(498.1,-234.8);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#000000").s().p("AAfA4IAAgcIhEAAIAAhUIAIAAIAABMIAwAAIAAhMIAIAAIAABMIALAAIAAAkg");
	this.shape_13.setTransform(489.1,-233.4);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#000000").s().p("AghAqIAAhTIAiAAQAPAAAIAFQAHAFAAAKQAAAJgEAEQgEAEgJACIAAABQAKABAFADQAFAFAAAIQgBANgHAHQgJAGgQAAgAgZAiIAbAAQAXABAAgTQAAgPgYAAIgaAAgAgZgEIAZAAQANgBAFgDQAEgEAAgIQAAgHgEgEQgGgCgLAAIgaAAg");
	this.shape_14.setTransform(479.6,-234.8);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#000000").s().p("AgYAlQgGgGgBgLQAAgNALgHQALgEARgBIAQAAIAAgGQAAgMgFgHQgFgFgLgBQgJAAgNAHIgDgHQAOgHALABQAOgBAIAIQAGAHABAPIAAA3IgGAAIgCgNIgBAAQgGAIgHADQgGADgIAAQgMABgIgHgAAJAAQgQAAgIAFQgHAEAAALQAAAHAFAFQAFAFAIAAQAMAAAIgIQAIgIAAgOIAAgHg");
	this.shape_15.setTransform(470.3,-234.8);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.f("#000000").s().p("AAgA4IAAgcIg/AAIAAAcIgIAAIAAgkIAGAAQALgPAFgSQAGgTABgYIAmAAIAABMIAMAAIAAAkgAgYAUIAtAAIAAhEIgZAAQgCAqgSAag");
	this.shape_16.setTransform(461.9,-233.4);

	this.shape_17 = new cjs.Shape();
	this.shape_17.graphics.f("#000000").s().p("AgTAmQgIgFgFgLQgEgKAAgMQAAgUAKgLQAKgLAQAAQARAAAKALQAKAMAAATQAAAUgKAMQgKAMgRgBQgKABgJgGgAgVgaQgHAKAAAQQAAARAHAKQAJAKAMAAQAOAAAHgKQAIgKAAgRQAAgQgIgKQgIgKgNAAQgNAAgIAKg");
	this.shape_17.setTransform(452.9,-234.8);

	this.shape_18 = new cjs.Shape();
	this.shape_18.graphics.f("#000000").s().p("AgjA+IAAh6IAHAAIACANQAJgOARAAQASAAAIALQAJALAAAWQABATgKAMQgKALgQAAQgRAAgKgPIAAAAIAAAHIAAAMIAAAhgAgUguQgGAIgBATIAAACQAAASAHAIQAHAJANAAQANAAAHgKQAHgIAAgRQAAglgbAAQgMAAgIAIg");
	this.shape_18.setTransform(443.7,-233);

	this.shape_19 = new cjs.Shape();
	this.shape_19.graphics.f("#000000").s().p("AAZAqIAAhLIgxAAIAABLIgIAAIAAhTIBBAAIAABTg");
	this.shape_19.setTransform(433.9,-234.8);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_19},{t:this.shape_18},{t:this.shape_17},{t:this.shape_16},{t:this.shape_15},{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(402,-249.7,238,25.8);


(lib.Символ16 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#000000").s().p("AAgAqIAAhKIgDAKIgaBAIgFAAIgXg6IgEgIIgCgIIAABKIgIAAIAAhTIALAAIAYA8IAEAPIAEgOIAZg9IAKAAIAABTg");
	this.shape.setTransform(567.6,-235.4);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#000000").s().p("AAaAqIAAg7IAAgRIgwBMIgKAAIAAhTIAHAAIAAA7IgBARIAxhMIAKAAIAABTg");
	this.shape_1.setTransform(557.4,-235.4);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#000000").s().p("Ag0AqIAAhTIAIAAIAABMIAqAAIAAhMIAFAAIAABMIArAAIAAhMIAIAAIAABTg");
	this.shape_2.setTransform(545.8,-235.4);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#000000").s().p("AAZAqIAAgpQgIAHgIACQgHADgHAAQgNAAgHgHQgGgGAAgMIAAgdIAHAAIAAAcQAAALAFADQAGAFALAAQAFAAAHgDQAHgCAIgFIAAglIAHAAIAABTg");
	this.shape_3.setTransform(534.2,-235.4);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#000000").s().p("AgjA8IAAgHQAFABAFAAQAEAAADgCQADgCACgEIAGgMIAEgLIgghTIAIAAIASAvIAJAcIAAAAIAKgcIASgvIAIAAIgkBhQgEAMgEAEQgDAEgEACQgEACgGAAIgKgBg");
	this.shape_4.setTransform(526,-233.5);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#000000").s().p("AgiApIAAgHIAEABQAJAAAFgTQAGgQADgpIAqAAIAABSIgHAAIAAhLIgdAAQgCAegDAPQgEAQgFAHQgFAJgJgBIgFgBg");
	this.shape_5.setTransform(517.3,-235.4);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#000000").s().p("AggAqIAAhTIAIAAIAAAkIAbAAQAeAAABAWQAAALgJAIQgIAGgQAAgAgYAjIAaAAQALgBAGgEQAGgFAAgJQAAgIgFgEQgGgEgMAAIgaAAg");
	this.shape_6.setTransform(505.2,-235.4);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#000000").s().p("AAbAqIAAgpIg0AAIAAApIgIAAIAAhTIAIAAIAAAlIA0AAIAAglIAHAAIAABTg");
	this.shape_7.setTransform(495.5,-235.4);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#000000").s().p("AgXAlQgIgGABgMQAAgMAKgHQAKgEASgBIAQgBIAAgFQAAgMgFgHQgEgFgMAAQgJAAgNAGIgDgHQAOgGALgBQAPABAGAHQAIAHgBAPIAAA3IgFAAIgCgOIgBAAQgGAJgHADQgGADgIABQgNgBgGgGgAAJAAQgQABgHAEQgIAEAAAKQAAAJAFAEQAEAEAJAAQAMAAAIgHQAIgIAAgOIAAgHg");
	this.shape_8.setTransform(486.1,-235.4);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#000000").s().p("AgCAqIAAhMIgdAAIAAgHIA/AAIAAAHIgcAAIAABMg");
	this.shape_9.setTransform(478.5,-235.4);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#000000").s().p("AgbArQgOgQAAgbQAAgQAHgNQAHgOAMgHQAMgHAPAAQAQAAAOAGIgEAHQgMgGgOAAQgTAAgNAOQgMAOAAAWQAAAYAMANQALAOAUAAQAOAAAMgEIAAAHQgLAEgRAAQgWAAgOgPg");
	this.shape_10.setTransform(470.2,-236.9);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(400,-250.3,238,25.8);


(lib.Символ14 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.instance = new lib._2();
	this.instance.setTransform(185.6,-182);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(185.6,-182,164,164);


(lib.Символ13 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#000000").s().p("AgCAbIAUgbIgUgZIAPgKIAdAjIAAABIgdAjgAgpAbIAVgbIgVgZIARgKIAbAjIAAABIgbAjg");
	this.shape.setTransform(559.9,-227.1);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#000000").s().p("AgbAhQgMgLAAgWQAAgUALgMQALgMASAAQASAAALALQAKAKAAATIAAAKIg2AAQAAAKAGAFQAFAGAIAAQAIAAAHgCQAHgBAIgEIAAATQgGADgHABQgHACgLAAQgTAAgMgMgAgJgWQgEAFgBAJIAgAAQgBgJgEgFQgEgFgIAAQgGAAgEAFg");
	this.shape_1.setTransform(550.3,-227.1);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#000000").s().p("AAVArIAAgjIACgYIgmA7IgcAAIAAhVIAWAAIAAAiIgBAZIAmg7IAdAAIAABVg");
	this.shape_2.setTransform(539.8,-227.1);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#000000").s().p("AgiAAQAAgUAMgMQALgMASAAQAPAAANAGIgIATIgKgEIgKgCQgQAAAAAZQAAAaAQAAQAHAAAGgCQAGgCAGgEIAAAUQgGAEgGABQgGACgJAAQgnAAAAgtg");
	this.shape_3.setTransform(530,-227.1);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#000000").s().p("AgeAmQgIgIAAgNQABgOAJgEQAKgHASgBIAPAAIAAgEQAAgNgNAAQgJAAgPAGIgHgQQAPgIARAAQARAAAJAIQAKAHAAAQIAAA4IgRAAIgEgMIgCAAQgFAIgHADQgEADgKAAQgNAAgHgHgAAFADQgIAAgEAEQgGADAAAHQAAAKALAAQAHAAAFgEQAFgFAAgIIAAgHg");
	this.shape_4.setTransform(520.7,-227.1);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#000000").s().p("AgsApIAAgTIAIACQAEAAADgGQADgGADgOQACgPACgaIBAAAIAABWIgYAAIAAhEIgVAAQgBAcgEAOQgEAOgFAGQgGAHgKAAQgIAAgGgDg");
	this.shape_5.setTransform(510.4,-227);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#000000").s().p("AgdArIAAhVIA7AAIAAASIgjAAIAABDg");
	this.shape_6.setTransform(503,-227.1);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#000000").s().p("AgVAnQgKgFgFgLQgFgKAAgNQAAgUAMgMQAKgMATAAQAMAAAKAGQAKAFAEAKQAGALAAAMQAAAVgLAMQgLAMgUAAQgLAAgKgGgAgMgSQgFAGAAAMQABAMAEAHQAEAHAIAAQAJAAAFgHQADgHAAgMQAAgMgDgGQgFgHgJAAQgIAAgEAHg");
	this.shape_7.setTransform(493.8,-227.1);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#000000").s().p("AgdArQgNgPAAgcQAAgQAHgNQAGgOAMgHQAMgHAPAAQAQAAARAIIgIAUIgNgGQgHgCgFAAQgNAAgHAKQgIALABAQQAAAmAbAAQAMAAAQgGIAAAUQgOAGgRAAQgXAAgNgPg");
	this.shape_8.setTransform(483.9,-228.4);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#000000").s().p("AgCABIAAgBIAbgjIARAKIgWAZIAWAbIgRAJgAgpABIAAgBIAdgjIAPAKIgUAZIAUAbIgPAJg");
	this.shape_9.setTransform(473.7,-227.1);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(425.6,-263.6,182.4,47.6);


(lib.Символ12 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#000000").s().p("AAWArIAAgjIABgYIgmA7IgdAAIAAhVIAYAAIAAAiIgCAZIAmg7IAcAAIAABVg");
	this.shape.setTransform(600.2,-238);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#000000").s().p("AAVArIAAgjIACgYIgmA7IgcAAIAAhVIAWAAIAAAiIgBAZIAmg7IAdAAIAABVg");
	this.shape_1.setTransform(588.7,-238);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#000000").s().p("AAQArIAAgkIgfAAIAAAkIgYAAIAAhVIAYAAIAAAiIAfAAIAAgiIAYAAIAABVg");
	this.shape_2.setTransform(577.6,-238);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#000000").s().p("AgeAmQgHgIAAgNQgBgOAKgEQAKgHASgBIAPAAIAAgEQAAgNgOAAQgIAAgOAGIgIgQQAPgIARAAQARAAAJAIQAKAHAAAQIAAA4IgRAAIgFgMIgBAAQgFAIgGADQgFADgKAAQgNAAgHgHgAAGADQgIAAgGAEQgFADAAAHQAAAKAMAAQAGAAAFgEQAFgFAAgIIAAgHg");
	this.shape_3.setTransform(567.2,-238);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#000000").s().p("AAPArIAAhDIgdAAIAABDIgYAAIAAhVIBNAAIAABVg");
	this.shape_4.setTransform(557.4,-238);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#000000").s().p("AAgArIAAhDIgBAFQgEARgEAGIgPAnIgPAAIgPgnQgEgHgEgPIgBgGIAABDIgXAAIAAhVIAhAAIAQAlIADAMIACANIADgQIADgIIAQgmIAhAAIAABVg");
	this.shape_5.setTransform(545.5,-238);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#000000").s().p("AgVAnQgJgFgGgLQgFgKAAgNQAAgUALgMQAMgMASAAQAMAAAKAGQAJAFAGAKQAFALAAAMQAAAVgMAMQgLAMgTAAQgMAAgJgGgAgNgSQgDAGAAAMQgBAMAFAHQAEAHAIAAQAJAAAEgHQAEgHABgMQgBgMgEgGQgEgHgJAAQgIAAgFAHg");
	this.shape_6.setTransform(533.8,-238);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#000000").s().p("AAQArIgigrIAAArIgYAAIAAhVIAYAAIAAAqIAggqIAaAAIgjAqIAmArg");
	this.shape_7.setTransform(524.8,-238);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#000000").s().p("AAVA+IAAgjIADgaIgnA9IgcAAIAAhWIAWAAIAAAhIgBAbIAmg8IAdAAIAABWgAgagoQgJgGgBgPIAVAAQABAIADADQADAEAIAAQAHAAAEgEQAFgDAAgIIAVAAQgBAPgJAGQgKAHgRAAQgRAAgJgHg");
	this.shape_8.setTransform(509.3,-239.8);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#000000").s().p("AgVAnQgKgFgEgLQgGgKAAgNQAAgUAMgMQAKgMATAAQAMAAAKAGQAKAFAEAKQAGALAAAMQAAAVgMAMQgKAMgUAAQgLAAgKgGgAgNgSQgEAGAAAMQABAMAEAHQAEAHAIAAQAJAAAFgHQADgHAAgMQAAgMgDgGQgFgHgJAAQgIAAgFAHg");
	this.shape_9.setTransform(498.6,-238);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#000000").s().p("AgoArIAAhVIArAAQARAAAJAGQAJAGAAALQAAAHgEAFQgEAFgJABIAAABQAJAAAGAEQAFAFAAAIQAAANgKAHQgKAGgSAAgAgQAbIARAAQAIAAAEgDQADgDAAgFQAAgFgEgDQgEgCgIAAIgQAAgAgQgIIAQAAQAGAAAEgCQAEgCAAgFQAAgIgMAAIgSAAg");
	this.shape_10.setTransform(488.8,-238);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#000000").s().p("AgVAnQgKgFgEgLQgGgKAAgNQAAgUAMgMQAKgMATAAQAMAAAKAGQAKAFAEAKQAGALAAAMQAAAVgLAMQgLAMgUAAQgLAAgKgGgAgMgSQgFAGAAAMQABAMAEAHQAEAHAIAAQAJAAAFgHQADgHAAgMQAAgMgDgGQgFgHgJAAQgIAAgEAHg");
	this.shape_11.setTransform(478.5,-238);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#000000").s().p("AASArIgSgeIgRAeIgbAAIAegrIgcgqIAbAAIAPAcIARgcIAbAAIgdAqIAeArg");
	this.shape_12.setTransform(469.2,-238);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#000000").s().p("AgeAmQgIgIABgNQAAgOAKgEQAJgHASgBIAPAAIAAgEQAAgNgOAAQgIAAgPAGIgHgQQAPgIAQAAQASAAAJAIQAJAHAAAQIAAA4IgQAAIgFgMIAAAAQgHAIgFADQgFADgKAAQgNAAgHgHgAAGADQgJAAgFAEQgFADAAAHQAAAKAMAAQAGAAAFgEQAFgFAAgIIAAgHg");
	this.shape_13.setTransform(459.5,-238);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#000000").s().p("AgnA/IAAh8IATAAIADAMIACAAQAIgNAOAAQAQAAAJAMQAIAMAAAVQAAAOgEAIQgEALgHAFQgIAFgKAAQgOAAgIgLIgCAAIACANIAAAjgAgLgmQgEAGAAAMIAAADQAAAOAEAEQAEAGAHAAQAQAAAAgYQAAgNgEgHQgEgGgIAAQgHAAgEAFg");
	this.shape_14.setTransform(450.1,-236.1);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#000000").s().p("AgKArIAAhDIgdAAIAAgSIBPAAIAAASIgdAAIAABDg");
	this.shape_15.setTransform(440.3,-238);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.f("#000000").s().p("AgiAAQAAgUAMgMQALgMASAAQAPAAANAGIgIATIgKgEIgKgCQgQAAAAAZQAAAaAQAAQAHAAAGgCQAGgCAGgEIAAAUQgGAEgGABQgGACgJAAQgnAAAAgtg");
	this.shape_16.setTransform(431.9,-238);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_16},{t:this.shape_15},{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(425.6,-252.7,182.4,25.8);


(lib.Символ11 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#000000").s().p("AAZAqIAAgjIgZAAIgWAjIgKAAIAaglQgMgCgFgEQgGgFAAgKQAAgMAIgGQAIgHANAAIAhAAIAABTgAgPgdQgFAEAAAJQAAAIAFAEQAGAEAJAAIAZAAIAAghIgZAAQgKAAgFAEg");
	this.shape.setTransform(622.7,-238.2);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#000000").s().p("AAaAqIAAg7IAAgQIgwBLIgLAAIAAhTIAIAAIAAA8IgBAQIAxhMIALAAIAABTg");
	this.shape_1.setTransform(614.3,-238.2);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#000000").s().p("AAbAqIAAgpIg0AAIAAApIgIAAIAAhTIAIAAIAAAlIA0AAIAAglIAHAAIAABTg");
	this.shape_2.setTransform(604.6,-238.2);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#000000").s().p("AgXAgQgKgLAAgVQAAgSAKgNQAKgMAPABQAPAAAIAKQAJAKAAASIAAAFIg7AAQAAARAIAKQAIAJANAAIANgBQAFgBAJgEIAAAHQgIADgGACIgNABQgQAAgLgMgAgQgbQgIAHAAAPIAyAAQAAgOgGgIQgHgIgLAAQgKAAgIAIg");
	this.shape_3.setTransform(595.3,-238.2);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#000000").s().p("AgiApIAAgHIAEABQAJAAAFgTQAGgQADgpIAqAAIAABSIgHAAIAAhLIgdAAQgCAegDAPQgEAQgFAHQgFAJgJgBIgFgBg");
	this.shape_4.setTransform(585.9,-238.2);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#000000").s().p("AgXAgQgKgLAAgVQAAgSAKgNQAKgMAPABQAPAAAJAKQAIAKAAASIAAAFIg7AAQAAARAIAKQAIAJANAAIANgBQAGgBAHgEIAAAHQgHADgGACIgNABQgQAAgLgMgAgQgbQgIAHgBAPIAzAAQAAgOgHgIQgGgIgLAAQgLAAgHAIg");
	this.shape_5.setTransform(577.8,-238.2);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#000000").s().p("AAgA4IAAgdIg/AAIAAAdIgIAAIAAgkIAGAAQALgPAFgSQAGgTABgXIAmAAIAABLIAMAAIAAAkgAgYAUIAtAAIAAhEIgZAAQgCAqgSAag");
	this.shape_6.setTransform(569,-236.8);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#000000").s().p("AgRAqQgGgCgFgDIAAgHQAIAEAFABQAHABAGABQAKAAAHgGQAFgEABgJQgBgJgFgFQgHgDgKAAIgMAAIAAgGIALAAQAVAAAAgPQAAgIgFgEQgGgDgHAAQgHAAgFABIgMAEIgDgGQAOgHANABQAMAAAGAFQAIAGAAAKQAAAPgPAEIAAAAQAJACAEAEQAFAGAAAIQAAAMgJAHQgJAHgNAAQgIAAgHgCg");
	this.shape_7.setTransform(560.9,-238.2);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#000000").s().p("AgYAlQgHgGAAgMQAAgMALgHQALgEARgBIAQgBIAAgFQAAgMgFgHQgEgFgMAAQgKgBgMAHIgDgHQAOgGALAAQAOAAAIAHQAGAHAAAPIAAA3IgFAAIgCgOIgBAAQgGAJgHADQgHAEgHAAQgNAAgHgHgAAJAAQgQABgHAEQgIAEAAAKQAAAJAFAEQAFAEAIABQAMgBAIgHQAIgIAAgOIAAgHg");
	this.shape_8.setTransform(552.9,-238.2);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#000000").s().p("AgiA+IAAh5IAHAAIABAMQAJgOARAAQASAAAJAMQAJAKAAAWQAAATgKAMQgJALgRAAQgSAAgIgOIgBAAIAAAGIABANIAAAggAgTguQgIAIABASIAAADQgBASAHAIQAHAJANAAQANAAAHgKQAHgIAAgRQAAglgbAAQgNAAgGAIg");
	this.shape_9.setTransform(544.4,-236.4);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#000000").s().p("AAgA4IAAgdIg/AAIAAAdIgIAAIAAgkIAGAAQALgPAFgSQAGgTABgXIAmAAIAABLIAMAAIAAAkgAgYAUIAtAAIAAhEIgZAAQgCAqgSAag");
	this.shape_10.setTransform(535,-236.8);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#000000").s().p("AgSAmQgJgFgFgLQgEgJAAgNQAAgTAKgMQAKgLAQAAQARAAAKALQAKAMAAATQAAAUgKAMQgKAMgRAAQgKAAgIgGgAgVgaQgHAKAAAQQAAARAHAKQAJAKAMAAQANAAAIgKQAIgKAAgRQAAgQgIgKQgIgJgNAAQgNAAgIAJg");
	this.shape_11.setTransform(526,-238.2);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#000000").s().p("AAZAqIAAhLIgyAAIAABLIgHAAIAAhTIBBAAIAABTg");
	this.shape_12.setTransform(516.5,-238.2);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#000000").s().p("AgTAmQgIgFgFgLQgEgJAAgNQAAgTAKgMQAKgLAQAAQARAAAKALQAKAMAAATQAAAUgKAMQgKAMgRAAQgKAAgJgGgAgVgaQgHAKAAAQQAAARAHAKQAJAKAMAAQAOAAAHgKQAIgKAAgRQAAgQgIgKQgIgJgNAAQgNAAgIAJg");
	this.shape_13.setTransform(502.8,-238.2);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#000000").s().p("AgXAqIAAhTIAvAAIAAAHIgnAAIAABMg");
	this.shape_14.setTransform(495.4,-238.2);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#000000").s().p("AgXAgQgKgLAAgVQAAgSAKgNQAKgMAPABQAPAAAIAKQAJAKAAASIAAAFIg7AAQAAARAIAKQAIAJANAAIANgBQAFgBAJgEIAAAHQgHADgHACIgNABQgQAAgLgMgAgQgbQgIAHgBAPIAzAAQAAgOgHgIQgGgIgLAAQgLAAgHAIg");
	this.shape_15.setTransform(487.1,-238.2);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.f("#000000").s().p("AA0A4IAAgdIhuAAIAAhSIAIAAIAABLIAqAAIAAhLIAIAAIAABLIAoAAIAAhLIAIAAIAABLIALAAIAAAkg");
	this.shape_16.setTransform(476.3,-236.8);

	this.shape_17 = new cjs.Shape();
	this.shape_17.graphics.f("#000000").s().p("AgGAgQgJgLAAgUIgcAAIAAApIgIAAIAAhTIAIAAIAAAlIAcAAQABgSAJgKQAHgKAPAAQAQAAAJALQAKAMAAATQAAAUgKAMQgJAMgQAAQgQAAgHgMgAAAgaQgHAKAAAQQAAARAHAKQAFAKAMAAQANAAAHgKQAGgKAAgRQAAgQgGgKQgHgJgNAAQgNAAgEAJg");
	this.shape_17.setTransform(462.8,-238.2);

	this.shape_18 = new cjs.Shape();
	this.shape_18.graphics.f("#000000").s().p("AgXAlQgIgGABgMQAAgMAKgHQAKgEASgBIAQgBIAAgFQAAgMgFgHQgEgFgLAAQgLgBgMAHIgDgHQAOgGAMAAQAOAAAGAHQAIAHAAAPIAAA3IgGAAIgCgOIgBAAQgGAJgHADQgGAEgIAAQgNAAgGgHgAAJAAQgQABgHAEQgIAEAAAKQAAAJAFAEQAEAEAKABQALgBAIgHQAIgIAAgOIAAgHg");
	this.shape_18.setTransform(451.7,-238.2);

	this.shape_19 = new cjs.Shape();
	this.shape_19.graphics.f("#000000").s().p("AAgA4IAAgdIg/AAIAAAdIgIAAIAAgkIAGAAQALgPAFgSQAGgTABgXIAmAAIAABLIAMAAIAAAkgAgYAUIAtAAIAAhEIgZAAQgCAqgSAag");
	this.shape_19.setTransform(443.3,-236.8);

	this.shape_20 = new cjs.Shape();
	this.shape_20.graphics.f("#000000").s().p("AgSAmQgJgFgFgLQgEgJAAgNQAAgTAKgMQAKgLAQAAQARAAAKALQAKAMAAATQAAAUgKAMQgKAMgRAAQgKAAgIgGgAgUgaQgIAKAAAQQAAARAIAKQAHAKANAAQANAAAIgKQAIgKAAgRQAAgQgIgKQgIgJgNAAQgNAAgHAJg");
	this.shape_20.setTransform(434.3,-238.2);

	this.shape_21 = new cjs.Shape();
	this.shape_21.graphics.f("#000000").s().p("AgiA+IAAh5IAHAAIABAMQAJgOARAAQASAAAJAMQAIAKABAWQAAATgKAMQgJALgRAAQgSAAgIgOIgBAAIAAAGIABANIAAAggAgUguQgGAIAAASIAAADQgBASAHAIQAHAJANAAQANAAAHgKQAHgIAAgRQAAglgbAAQgMAAgIAIg");
	this.shape_21.setTransform(425.1,-236.4);

	this.shape_22 = new cjs.Shape();
	this.shape_22.graphics.f("#000000").s().p("AAaAqIAAhLIgzAAIAABLIgIAAIAAhTIBDAAIAABTg");
	this.shape_22.setTransform(415.3,-238.2);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_22},{t:this.shape_21},{t:this.shape_20},{t:this.shape_19},{t:this.shape_18},{t:this.shape_17},{t:this.shape_16},{t:this.shape_15},{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(408.4,-253.1,221.2,25.8);


(lib.Символ10 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#000000").s().p("AgXAgQgKgLAAgVQAAgSAKgMQAKgNAPAAQAPAAAIALQAJAKAAATIAAADIg7AAQAAASAIAJQAIAJANAAIANgBQAFAAAIgEIAAAHQgHADgFABIgOABQgRAAgKgLgAgQgcQgHAJgBAPIAyAAQAAgPgGgJQgHgHgLgBQgLABgHAHg");
	this.shape.setTransform(613,-238.6);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#000000").s().p("AAgA5IAAgdIg/AAIAAAdIgIAAIAAglIAGAAQALgPAFgRQAGgUABgYIAmAAIAABMIAMAAIAAAlgAgYAUIAtAAIAAhEIgZAAQgCAqgSAag");
	this.shape_1.setTransform(604.1,-237.2);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#000000").s().p("AAbAqIAAgpIg0AAIAAApIgIAAIAAhTIAIAAIAAAmIA0AAIAAgmIAHAAIAABTg");
	this.shape_2.setTransform(594.9,-238.6);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#000000").s().p("AgXAlQgIgGAAgLQAAgNALgHQAKgFASAAIAQAAIAAgGQAAgMgFgGQgEgHgMAAQgJABgNAGIgDgHQAOgHALAAQAPAAAGAIQAIAHgBAQIAAA2IgFAAIgCgNIgBAAQgGAIgHADQgGAEgIgBQgMAAgHgGgAAJAAQgQAAgHAFQgIAFAAAKQAAAHAFAFQAEAFAJgBQAMABAIgIQAIgIAAgOIAAgHg");
	this.shape_3.setTransform(585.5,-238.6);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#000000").s().p("AAgAqIAAhJIgDAKIgaA/IgFAAIgXg6IgEgHIgCgJIAABKIgIAAIAAhTIALAAIAYA9IAEANIAEgNIAZg9IAKAAIAABTg");
	this.shape_4.setTransform(576.2,-238.6);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#000000").s().p("AgTAmQgIgFgEgKQgFgLAAgMQAAgTAKgMQAKgMAQAAQARAAAKAMQAKAMAAATQAAAUgKAMQgKALgRAAQgKABgJgGgAgVgaQgHAKAAAQQAAARAHAKQAJAKAMgBQAOABAHgKQAIgKAAgRQAAgQgIgKQgHgKgOAAQgNAAgIAKg");
	this.shape_5.setTransform(566.1,-238.6);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#000000").s().p("AATAqIgngqIAAAqIgIAAIAAhTIAIAAIAAApIAlgpIAJAAIgkApIAnAqg");
	this.shape_6.setTransform(558.6,-238.6);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#000000").s().p("AATAqIgngqIAAAqIgIAAIAAhTIAIAAIAAApIAlgpIAJAAIgkApIAnAqg");
	this.shape_7.setTransform(547.1,-238.6);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#000000").s().p("AAZAqIAAgkIgZAAIgWAkIgKAAIAaglQgMgCgFgEQgGgFAAgKQAAgMAIgGQAIgHANAAIAhAAIAABTgAgPgdQgFAFAAAHQAAAJAFAFQAGADAJAAIAZAAIAAgiIgZAAQgKAAgFAFg");
	this.shape_8.setTransform(533.9,-238.6);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#000000").s().p("AgTAgQgKgLAAgVQAAgTALgMQAKgMARAAQALABAKAEIgCAGQgLgDgJgBQgNAAgIAKQgIAKAAAQQAAARAIAKQAIAKAMgBQAMAAAKgEIAAAIQgIADgOAAQgPAAgLgLg");
	this.shape_9.setTransform(526.6,-238.6);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#000000").s().p("AAaA7IAAg7IAAgRIgwBMIgKAAIAAhTIAHAAIAAA7IgBAQIAxhLIAKAAIAABTgAgQgpQgHgFAAgMIAGAAQACAJAEADQAEAEAHAAQAIAAAFgEQADgEABgIIAHAAQgBAWgXAAQgKAAgGgFg");
	this.shape_10.setTransform(517.8,-240.3);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#000000").s().p("AAZAqIAAgkIgZAAIgWAkIgKAAIAaglQgMgCgFgEQgGgFAAgKQAAgMAIgGQAIgHANAAIAhAAIAABTgAgPgdQgFAFAAAHQAAAJAFAFQAGADAJAAIAZAAIAAgiIgZAAQgKAAgFAFg");
	this.shape_11.setTransform(508.2,-238.6);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#000000").s().p("AAbAqIAAgpIg0AAIAAApIgIAAIAAhTIAIAAIAAAmIA0AAIAAgmIAHAAIAABTg");
	this.shape_12.setTransform(499.7,-238.6);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#000000").s().p("AAaAqIAAg7IAAgRIgwBMIgKAAIAAhTIAHAAIAAA7IgBAQIAxhLIAKAAIAABTg");
	this.shape_13.setTransform(490,-238.6);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#000000").s().p("AAgA5IAAgdIg/AAIAAAdIgIAAIAAglIAGAAQALgPAFgRQAGgUABgYIAmAAIAABMIAMAAIAAAlgAgYAUIAtAAIAAhEIgZAAQgCAqgSAag");
	this.shape_14.setTransform(480.8,-237.2);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#000000").s().p("AgXAgQgKgLAAgVQAAgSAKgMQAKgNAPAAQAPAAAJALQAIAKAAATIAAADIg7AAQAAASAIAJQAIAJANAAIANgBQAGAAAHgEIAAAHQgHADgFABIgOABQgQAAgLgLgAgQgcQgIAJgBAPIAzAAQAAgPgHgJQgGgHgLgBQgLABgHAHg");
	this.shape_15.setTransform(472.1,-238.6);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.f("#000000").s().p("AgSAmQgJgFgFgKQgEgLAAgMQAAgTAKgMQAKgMAQAAQARAAAKAMQAKAMAAATQAAAUgKAMQgKALgRAAQgKABgIgGgAgVgaQgHAKAAAQQAAARAHAKQAJAKAMgBQANABAIgKQAIgKAAgRQAAgQgIgKQgIgKgNAAQgNAAgIAKg");
	this.shape_16.setTransform(463,-238.6);

	this.shape_17 = new cjs.Shape();
	this.shape_17.graphics.f("#000000").s().p("AgTAgQgKgLAAgVQAAgTAKgMQALgMARAAQALABAKAEIgCAGQgLgDgIgBQgOAAgIAKQgIAKAAAQQAAARAIAKQAIAKANgBQALAAAKgEIAAAIQgIADgNAAQgRAAgKgLg");
	this.shape_17.setTransform(454.7,-238.6);

	this.shape_18 = new cjs.Shape();
	this.shape_18.graphics.f("#000000").s().p("AAaAqIAAg7IAAgRIgwBMIgLAAIAAhTIAIAAIAAA7IAAAQIAwhLIALAAIAABTg");
	this.shape_18.setTransform(445.9,-238.6);

	this.shape_19 = new cjs.Shape();
	this.shape_19.graphics.f("#000000").s().p("AgiA+IAAh6IAGAAIACAMQAJgNARAAQARAAAKALQAIAMABAVQAAATgKALQgKAMgQAAQgRAAgKgPIAAAAIAAAHIAAAMIAAAhgAgUguQgGAIgBATIAAACQAAASAHAIQAHAJANAAQANAAAHgJQAHgJAAgQQAAgmgbAAQgMAAgIAIg");
	this.shape_19.setTransform(436.6,-236.8);

	this.shape_20 = new cjs.Shape();
	this.shape_20.graphics.f("#000000").s().p("AAgA5IAAhpIhAAAIAABpIgIAAIAAhwIBQAAIAABwg");
	this.shape_20.setTransform(425.9,-240.1);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_20},{t:this.shape_19},{t:this.shape_18},{t:this.shape_17},{t:this.shape_16},{t:this.shape_15},{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(398.6,-253.5,240.5,25.8);


(lib.Символ8 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 2
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgYAgQgLgLAAgVQAAgTAKgMQALgMAPAAQAQAAAJALQAKAKAAASIAAAGIg5AAQAAAPAHAIQAIAHALAAQANAAAOgFIAAALIgNAFIgPABQgRAAgLgMgAgOgZQgGAGgBAMIArAAQAAgMgGgHQgFgGgKAAQgJAAgGAHg");
	this.shape.setTransform(803.1,-308.8);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AAYAqIAAgyIABgKIAAgLIgsBHIgQAAIAAhTIAMAAIAAA0IgBAOIAAAFIAshHIAQAAIAABTg");
	this.shape_1.setTransform(793.5,-308.8);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AgFAqIAAhIIgcAAIAAgLIBDAAIAAALIgcAAIAABIg");
	this.shape_2.setTransform(784.7,-308.8);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("AgUAgQgJgLgBgVQAAgTALgMQAKgMASAAIALABIAKAEIgDALIgKgDIgJgBQgYAAAAAfQAAAQAHAIQAFAIALAAQALAAALgEIAAALQgIAFgNAAQgRAAgLgMg");
	this.shape_3.setTransform(777.4,-308.8);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AgaAlQgHgGAAgMQAAgYAogCIAOAAIAAgFQAAgKgEgFQgFgFgJAAQgJAAgNAGIgEgJQAGgEAIgCQAHgCAGAAQAPAAAHAHQAIAHAAAPIAAA4IgKAAIgCgMIgBAAQgGAIgHADQgGADgIAAQgMAAgIgHgAAIABQgOAAgGAFQgHAEAAAJQAAAHAEADQAEAEAIAAQAKAAAHgHQAHgGAAgMIAAgIg");
	this.shape_4.setTransform(768.7,-308.8);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AAWAqIAAgmQgIAFgHACQgHADgHAAQgNAAgHgHQgHgHAAgJIAAggIANAAIAAAfQAAANARAAQAFAAAHgCQAGgBAIgFIAAgkIANAAIAABTg");
	this.shape_5.setTransform(759.5,-308.8);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("AglA8IAAgKIAJABQANAAAGgQIAFgLIgjhVIAOAAIATAxQAGAPAAAHIAAAAIAFgLIAVg8IAOAAIglBgQgEAPgHAFQgHAHgLAAQgGgBgFgBg");
	this.shape_6.setTransform(750.7,-306.9);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("AgjAqIAAhTIANAAIAAAjIAYAAQAiAAgBAWQAAANgIAHQgJAGgQAAgAgWAfIAXAAQALAAAFgDQAGgEAAgHQgBgHgFgDQgEgEgMAAIgXAAg");
	this.shape_7.setTransform(738.1,-308.8);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("AgFAqIAAhIIgcAAIAAgLIBDAAIAAALIgcAAIAABIg");
	this.shape_8.setTransform(729.4,-308.8);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#FFFFFF").s().p("AAXAqIAAgiIgWAAIgUAiIgQAAIAZgkQgKgCgFgEQgGgHABgJQAAgMAIgHQAHgGAPAAIAjAAIAABTgAgSgQQAAAPAUAAIAVAAIAAgdIgXAAQgSAAAAAOg");
	this.shape_9.setTransform(720.7,-308.8);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#FFFFFF").s().p("AAXAqIAAgmIguAAIAAAmIgMAAIAAhTIAMAAIAAAjIAuAAIAAgjIANAAIAABTg");
	this.shape_10.setTransform(711.7,-308.8);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#FFFFFF").s().p("AAYAqIAAgyIABgKIAAgLIgsBHIgQAAIAAhTIAMAAIAAA0IgBAOIAAAFIAshHIAQAAIAABTg");
	this.shape_11.setTransform(701.5,-308.8);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#FFFFFF").s().p("AgkA+IAAh6IALAAIABAMIABAAQAFgHAGgDQAHgDAHAAQARAAAJALQAJAMAAAVQAAATgJAMQgJALgRAAQgHAAgHgDQgGgDgFgGIgBAAIABAOIAAAjgAgRgrQgGAHAAAQIAAADQgBARAHAHQAGAHALAAQALAAAHgJQAFgHAAgPQAAgQgFgJQgHgIgLAAQgLAAgGAHg");
	this.shape_12.setTransform(691.8,-307);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#FFFFFF").s().p("AAdA4IAAhkIg5AAIAABkIgNAAIAAhwIBTAAIAABwg");
	this.shape_13.setTransform(680.8,-310.2);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

	// Слой 1
	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#F5822A").s().p("AsmC9Qg8ABAAg9IAAkBQAAg9A8ABIZNAAQA8gBAAA9IAAEBQAAA9g8gBg");
	this.shape_14.setTransform(741.2,-311);

	this.timeline.addTween(cjs.Tween.get(this.shape_14).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(654.5,-330,173.4,38);


(lib.Символ7 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.instance = new lib._1();
	this.instance.setTransform(186.4,-182.2);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(186.4,-182.2,164,164);


(lib.Символ6 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#F5822A").s().p("AgIBTQgFgDAAgJQABgQAMAAQAGAAAEAEQAEAFgBAHQABAIgEAEQgEAEgGAAQgFAAgDgEgAgFAlIgGh7IAWAAIgGB7g");
	this.shape.setTransform(625.2,-47.1);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#F5822A").s().p("AgQBVQgEgEAAgJQAAgQAOAAQAGAAACAEQAEAFAAAHQAAAIgEAEQgCAEgGAAQgGAAgEgDgAgOAmIAAgHQAAgOAEgIQAEgJAKgIQAPgOAFgGQAEgHAAgKQAAgMgIgGQgIgHgMAAQgJAAgJADQgJACgLAFIgHgPQAWgMAXAAQAWAAAMALQAMALAAAUQAAAJgCAGQgCAHgFAFQgEAGgPAMQgMAJgDAHQgDAHAAALIAAAEg");
	this.shape_1.setTransform(616.7,-47.2);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#F5822A").s().p("AAlBaIAAhOIAAgOIABgPIhDBrIgZAAIAAh+IASAAIAABPIgBAWIAAAGIBEhrIAYAAIAAB+gAgeg9QgLgJgBgTIASAAQACAMAFAFQAFAFAMAAQAMAAAFgGQAGgFABgLIATAAQgCASgKAJQgLAJgUAAQgVAAgJgIg");
	this.shape_2.setTransform(604.1,-47.8);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#F5822A").s().p("AgkAxQgRgSAAgeQAAgdAQgTQAPgSAYAAQAYAAAOAQQAOAQAAAaIAAAKIhXAAQABAXALALQALAMARAAQAVAAAUgJIAAASQgKAEgJACQgJACgNAAQgbAAgQgRgAgVgnQgKAKgBASIBBAAQAAgSgIgKQgIgKgQAAQgNAAgJAKg");
	this.shape_3.setTransform(589.8,-45.1);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#F5822A").s().p("Ag4A/IAAgOIAGAAQANAAAIgcQAIgaAFg7IBJAAIAAB/IgUAAIAAhuIglAAQgDAqgFAWQgGAZgJALQgJAMgOAAQgGAAgEgCg");
	this.shape_4.setTransform(575.3,-45);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#F5822A").s().p("AgpBIQgPgVAAgmQAAgoAMgXQANgYAagGIA5gMIAEARIg4ALQgRAEgJAPQgIAOgBAZIABAAQAIgKALgGQAMgFAKAAQAYAAANAPQAOANAAAcQAAAegQARQgQARgaAAQgaAAgPgVgAgLgHQgIAEgHAEQgHAGgDAGQgBAfAKAQQAKAQASAAQAjAAAAgtQAAgqgfAAQgIAAgIAEg");
	this.shape_5.setTransform(562.3,-47.8);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#F5822A").s().p("Ag5BbIAAgQQAHACAIgBQAUABAIgXIAHgSIg0iAIAVAAIAcBKQAKAXAAALIABAAIAGgTIAghZIAVAAIg3CRQgGAWgLAJQgLAJgQAAQgJAAgJgCg");
	this.shape_6.setTransform(549,-42.2);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#F5822A").s().p("Ag3BeIAAi4IAQAAIADARIABAAQAHgKAKgFQAKgFALAAQAZAAAPASQANARAAAgQAAAegOARQgOASgZAAQgKAAgLgFQgLgFgGgJIgCAAIACAVIAAA1gAgahBQgJALAAAYIAAAEQAAAaAJALQAIALATAAQAQAAAKgNQAJgMAAgXQAAgYgJgNQgKgNgRAAQgSAAgIALg");
	this.shape_7.setTransform(536.2,-42.4);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#F5822A").s().p("AgrBBQgPgWAAgrQAAgsAOgVQAPgWAdAAQAdAAAPAXQAPAWABAqQAAAsgPAWQgPAWgeAAQgcAAgPgXgAgRgsQgGAOABAeQgBAfAGAOQAFANAMAAQAMAAAFgNQAHgOAAgfQAAgegHgOQgFgNgMAAQgMAAgFANg");
	this.shape_8.setTransform(515.5,-47.3);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#F5822A").s().p("AgrBBQgQgWAAgrQAAgsAPgVQAPgWAdAAQAdAAAQAXQAPAWAAAqQAAAsgPAWQgPAWgeAAQgcAAgPgXgAgRgsQgGAOAAAeQAAAfAGAOQAGANALAAQAMAAAFgNQAGgOABgfQgBgegGgOQgFgNgMAAQgLAAgGANg");
	this.shape_9.setTransform(501.8,-47.3);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#F5822A").s().p("AgrBBQgQgWAAgrQABgsAPgVQAOgWAdAAQAdAAAQAXQAOAWAAAqQAAAsgOAWQgPAWgeAAQgcAAgPgXgAgRgsQgFAOgBAeQABAfAFAOQAGANALAAQAMAAAGgNQAFgOAAgfQAAgegFgOQgGgNgMAAQgLAAgGANg");
	this.shape_10.setTransform(488.1,-47.3);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#F5822A").s().p("AgrBBQgQgWAAgrQABgsAPgVQAOgWAdAAQAdAAAQAXQAOAWAAAqQAAAsgOAWQgPAWgeAAQgcAAgPgXgAgRgsQgFAOAAAeQAAAfAFAOQAFANAMAAQAMAAAGgNQAFgOAAgfQAAgegFgOQgGgNgMAAQgMAAgFANg");
	this.shape_11.setTransform(468.2,-47.3);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#F5822A").s().p("AgrBBQgPgWAAgrQgBgsAPgVQAPgWAdAAQAdAAAPAXQAQAWgBAqQAAAsgOAWQgPAWgeAAQgcAAgPgXgAgRgsQgGAOABAeQgBAfAGAOQAFANAMAAQAMAAAFgNQAHgOgBgfQABgegHgOQgFgNgMAAQgMAAgFANg");
	this.shape_12.setTransform(454.5,-47.3);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#F5822A").s().p("AgrBBQgPgWAAgrQAAgsAOgVQAPgWAdAAQAdAAAPAXQAPAWABAqQAAAsgPAWQgPAWgeAAQgcAAgPgXgAgRgsQgGAOABAeQgBAfAGAOQAFANAMAAQAMAAAFgNQAHgOAAgfQAAgegHgOQgFgNgMAAQgMAAgFANg");
	this.shape_13.setTransform(440.8,-47.3);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#F5822A").s().p("AAGBVIAAhhIABgQIAAgSIgLAMIgUAQIgRgWIA1gsIAeAAIAACpg");
	this.shape_14.setTransform(419.7,-47.3);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(405.7,-66.3,224.8,36.7);


(lib.Символ5 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#F5822A").s().p("Ag1BAIAAh/IAUAAIAAA1IAlAAQAyAAAAAjQAAATgNAKQgNAKgZAAgAghAvIAjAAQAQAAAIgFQAIgFAAgLQAAgLgHgFQgIgFgRAAIgjAAg");
	this.shape.setTransform(591,-45.1);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#F5822A").s().p("AgJBAIAAhuIgpAAIAAgRIBlAAIAAARIgqAAIAABug");
	this.shape_1.setTransform(577.9,-45.1);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#F5822A").s().p("AAlBAIAAhNIAAgPIABgPIhEBrIgYAAIAAh/IASAAIAABQIgBAVIAAAHIBEhsIAYAAIAAB/g");
	this.shape_2.setTransform(564.7,-45.1);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#F5822A").s().p("AAiBAIAAg6QgNAIgLAEQgKADgLAAQgUAAgLgKQgKgKAAgPIAAgxIATAAIAAAvQAAAVAaAAQAIAAAKgEQAKgBANgIIAAg3IATAAIAAB/g");
	this.shape_3.setTransform(549.7,-45.1);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#F5822A").s().p("Ag5BbIAAgQQAHACAIgBQAUABAIgXIAHgSIg0iAIAVAAIAcBKQAKAXAAALIABAAIAGgTIAghZIAVAAIg3CRQgGAWgLAJQgLAJgQAAQgJAAgJgCg");
	this.shape_4.setTransform(536.4,-42.2);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#F5822A").s().p("Ag4A/IAAgOIAGAAQANAAAIgcQAIgaAFg7IBJAAIAAB/IgUAAIAAhuIglAAQgDAqgFAWQgGAZgJALQgJAMgOAAQgGAAgEgCg");
	this.shape_5.setTransform(522.6,-45);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#F5822A").s().p("AgeA6QgNgIgHgPQgIgPAAgUQAAgeAQgRQAQgSAaAAQAaAAAQASQAQASAAAdQAAAfgQASQgPARgbAAQgQAAgOgIgAgcgkQgJANgBAXQABAYAJANQAKANASAAQASAAALgNQAKgNAAgYQAAgXgKgNQgLgNgSAAQgSAAgKANg");
	this.shape_6.setTransform(509.5,-45.1);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#F5822A").s().p("AAiBAIAAhuIhDAAIAABuIgUAAIAAh/IBqAAIAAB/g");
	this.shape_7.setTransform(494.8,-45.1);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#F5822A").s().p("AAbBAIg4hAIAABAIgUAAIAAh/IAUAAIAAA/IA1g/IAVAAIg1A+IA6BBg");
	this.shape_8.setTransform(475.8,-45.1);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#F5822A").s().p("AgnA4QgLgKAAgSQAAglA8gCIAWgBIAAgHQAAgQgHgHQgGgHgOAAQgPAAgTAKIgHgPQAKgFAMgDQAKgDAKAAQAXAAALAKQALAKAAAXIAABVIgPAAIgDgSIgBAAQgKAMgJAFQgKAEgMAAQgUAAgKgKgAAMABQgVABgLAHQgKAGABANQAAALAGAGQAGAFAMAAQAQAAALgKQAJgKABgSIAAgMg");
	this.shape_9.setTransform(461.6,-45.1);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#F5822A").s().p("AAlBVIhNhVIAABVIgUAAIAAipIAUAAIAABTIBLhTIAXAAIhKBTIBNBWg");
	this.shape_10.setTransform(449.1,-47.3);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(438.5,-66.3,161.3,36.7);


(lib.Символ3 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.instance = new lib.bg_2();
	this.instance.setTransform(-51,-182.9,0.78,0.78);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-51,-182.9,780,93.6);


(lib.Символ2 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.instance = new lib.logo();
	this.instance.setTransform(-91.9,6.6,0.888,0.888);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-91.9,6.6,175.8,32.9);


(lib.Символ15 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1 - копия: 2 - копия
	this.instance = new lib.Символ19();
	this.instance.setTransform(0,44);
	this.instance.alpha = 0;
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(15).to({_off:false},0).to({y:32.3,alpha:1},9).wait(67).to({y:42},4).to({y:20,alpha:0},6).wait(49));

	// Слой 1 - копия: 2
	this.instance_1 = new lib.Символ18();
	this.instance_1.setTransform(0,24);
	this.instance_1.alpha = 0;
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(9).to({_off:false},0).to({y:10.6,alpha:1},9).wait(69).to({y:22},4).to({y:-2,alpha:0},6).wait(53));

	// Слой 1 - копия
	this.instance_2 = new lib.Символ17();
	this.instance_2.alpha = 0;
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(4).to({_off:false},0).to({y:-11.2,alpha:1},9).wait(70).to({y:2},4).to({y:-26,alpha:0},6).wait(57));

	// Слой 1
	this.instance_3 = new lib.Символ16();
	this.instance_3.setTransform(0,-22);
	this.instance_3.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_3).to({y:-32.7,alpha:1},9).wait(70).to({y:-21},4).to({y:-45,alpha:0},6).wait(61));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(400,-272.3,238,25.8);


(lib.Символ9 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 4
	this.instance = new lib.Символ13();
	this.instance.setTransform(2.2,31);
	this.instance.alpha = 0;
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(14).to({_off:false},0).to({y:26.9,alpha:0.445},4).to({y:21.8,alpha:1},5).wait(71).to({y:33},5).to({y:8,alpha:0},6).wait(15));

	// Слой 3
	this.instance_1 = new lib.Символ12();
	this.instance_1.setTransform(2.2,22);
	this.instance_1.alpha = 0;
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(9).to({_off:false},0).to({y:10.9,alpha:1},9).wait(71).to({y:22},5).to({y:2,alpha:0},5).wait(21));

	// Слой 2
	this.instance_2 = new lib.Символ11();
	this.instance_2.setTransform(0.1,0);
	this.instance_2.alpha = 0;
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(4).to({_off:false},0).to({y:-10.9,alpha:1},9).wait(71).to({y:1},5).to({y:-22,alpha:0},5).wait(26));

	// Слой 1
	this.instance_3 = new lib.Символ10();
	this.instance_3.setTransform(0,-21);
	this.instance_3.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_3).to({y:-32.7,alpha:1},9).wait(71).to({y:-22},4).to({y:-40,alpha:0},5).wait(31));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(398.6,-274.5,240.5,25.8);


(lib.Символ4 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Слой 1
	this.instance = new lib.Символ6();
	this.instance.setTransform(0,36);
	this.instance.alpha = 0;
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(4).to({_off:false},0).to({y:19.3,alpha:0.801},5,cjs.Ease.get(1)).to({y:15.2,alpha:1},4).wait(67).to({y:29},5).to({y:-2,alpha:0},8).wait(7));

	// Слой 2
	this.instance_1 = new lib.Символ5();
	this.instance_1.setTransform(0.1,14);
	this.instance_1.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).to({y:-14.8,alpha:1},9,cjs.Ease.get(1)).wait(66).to({y:-2},5).to({y:-29,alpha:0},8).wait(12));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(438.6,-52.3,161.3,36.7);


(lib.Символ1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// roll
	this.instance = new lib.Символ21();
	this.instance.setTransform(871.6,1,0.01,1);
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(448).to({_off:false},0).to({scaleX:1,x:0},6).wait(1));

	// Txt4
	this.instance_1 = new lib.Символ20();
	this.instance_1.setTransform(-1.5,0.4);
	this.instance_1.alpha = 0;
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(347).to({_off:false},0).to({alpha:1},8).wait(100));

	// Txt4
	this.instance_2 = new lib.Символ15();
	this.instance_2.setTransform(55.3,43.9,0.777,0.777);
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(245).to({_off:false},0).to({_off:true},103).wait(107));

	// Txt3
	this.instance_3 = new lib.Символ9();
	this.instance_3.setTransform(459.2,-157.2,0.769,0.765,0,0,0,518.9,-261.8);
	this.instance_3._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_3).wait(138).to({_off:false},0).to({_off:true},104).wait(213));

	// elipse 2
	this.instance_4 = new lib.Символ14();
	this.instance_4.setTransform(266.3,-140,0.019,0.019,0,0,0,267.5,-100.3);
	this.instance_4.alpha = 0;
	this.instance_4._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_4).wait(240).to({_off:false},0).to({regX:267.3,regY:-100.1,scaleX:1.13,scaleY:1.13,alpha:1},5).to({regX:267.4,scaleX:0.5,scaleY:0.5,x:266.2,y:-138.7},7,cjs.Ease.get(1)).wait(84).to({regX:267.3,scaleX:1.13,scaleY:1.13,x:266.3,y:-140},4).to({regX:267.5,regY:-100.3,scaleX:0.02,scaleY:0.02,alpha:0},7,cjs.Ease.get(1)).to({_off:true},1).wait(107));

	// elipse
	this.instance_5 = new lib.Символ7();
	this.instance_5.setTransform(266.3,-140.5,0.036,0.036,0,0,0,268.1,-100.5);
	this.instance_5.alpha = 0;
	this.instance_5._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_5).wait(129).to({_off:false},0).to({regX:268.4,regY:-100.2,scaleX:1.13,scaleY:1.13,x:266.6,y:-140,alpha:1},5).to({regY:-100.3,scaleX:0.5,scaleY:0.5,x:266.2,y:-138.7},7,cjs.Ease.get(1)).wait(93).to({regY:-100.2,scaleX:1.13,scaleY:1.13,x:266.6,y:-140},5).to({regX:268.1,regY:-100.5,scaleX:0.04,scaleY:0.04,x:266.3,y:-140.5,alpha:0},7,cjs.Ease.get(1)).to({_off:true},59).wait(150));

	// txt 1
	this.instance_6 = new lib.Символ4();
	this.instance_6.setTransform(-31,-97.9);
	this.instance_6._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_6).wait(29).to({_off:false},0).to({_off:true},101).wait(325));

	// cta
	this.instance_7 = new lib.Символ8();
	this.instance_7.setTransform(-0.7,211);
	this.instance_7.alpha = 0;
	this.instance_7._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_7).wait(39).to({_off:false},0).to({y:170,alpha:1},10,cjs.Ease.get(1)).wait(406));

	// Logo
	this.instance_8 = new lib.Символ2();
	this.instance_8.setTransform(-1,-211);
	this.instance_8.alpha = 0;
	this.instance_8._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_8).wait(4).to({_off:false},0).to({y:-163.5,alpha:1},14,cjs.Ease.get(1)).wait(437));

	// Bg2
	this.instance_9 = new lib.Символ3();
	this.instance_9.alpha = 0;
	this.instance_9._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_9).wait(18).to({_off:false},0).to({alpha:1},11).wait(84).to({alpha:0},11).wait(331));

	// Bg
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("EhOHAJXIAAytMCcOAAAIAAStg");
	this.shape.setTransform(379.5,-139.4);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(455));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-120.5,-199.4,1000,120);


// stage content:
(lib._1170x100_SK_Soglasie = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// btn
	this.instance = new lib.Символ22();
	this.instance.setTransform(585.5,50,4.875,0.25);
	new cjs.ButtonHelper(this.instance, 0, 1, 2, false, new lib.Символ22(), 3);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	// Border
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#000000").ss(1,1,1).p("EhbZgHzMC2zAAAIAAPnMi2zAAAg");
	this.shape.setTransform(585,50);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	// Main
	this.instance_1 = new lib.Символ1();
	this.instance_1.setTransform(141.5,212,1.17,1.17);

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(565.1,-466.6,1190.9,675);

})(lib = lib||{}, images = images||{}, createjs = createjs||{}, ss = ss||{});
var lib, images, createjs, ss;