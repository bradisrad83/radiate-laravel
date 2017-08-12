/**
 * A livestream visualizer i made for DFNTN radio, Bass music.
 * Takes the FFT bands from the mp3 streams and visualizes around them.
 */

/**
 * The sound analysis part etc.
 */
!(function() {
	!(function() {
		var n = function(t) {
			function e(e, a, c) {
				if (
					(
						(y.audio = null != t ? t : new Audio()),
						(i = null != e ? e : 32),
						(u = null != a ? a : 0.1),
						(s = null != c ? c : !1),
						"string" == typeof y.audio
					)
				) {
					var p = y.audio;
					(y.audio = new Audio()), (y.audio.crossOrigin =
						"use-credentials"), (y.audio.controls = !0), (y.audio.src = p);
				}
				(r = new n.AudioContext()), (d = r.createScriptProcessor(
					1024,
					1,
					1
				)), (l = r.createAnalyser()), (l.smoothingTimeConstant = u), (l.fftSize =
					2 * i), (f = !1), (y.bands = new Uint8Array(
					l.frequencyBinCount
				)), y.audio.addEventListener("play", o, !1);
			}
			function o() {
				f ||
					(
						(c = r.createMediaElementSource(y.audio)),
						c.connect(l),
						l.connect(d),
						d.connect(r.destination),
						s || c.connect(r.destination),
						(d.onaudioprocess = a),
						(f = !0)
					);
			}
			function a(n) {
				l.getByteFrequencyData(y.bands);
				for (
					var t = n.outputBuffer.getChannelData(0),
						e = n.inputBuffer.getChannelData(0),
						o = 0,
						a = 0;
					a < e.length;
					a++
				)
					(t[a] = 0), (o = e[a] > o ? e[a] : o);
				(y.energy = o), (y.decibels =
					20 * Math.log(Math.max(o, Math.pow(10, -3.6))) / Math.LN10), y.audio
					.paused ||
					(null != y.onUpdate &&
						"function" == typeof y.onUpdate &&
						y.onUpdate(y.bands, y.decibels, y.energy));
			}
			var i,
				u,
				s,
				r,
				d,
				l,
				c,
				f,
				y = this;
			e();
		};
		(n.prototype.start = function() {
			return this.audio.play();
		}), (n.prototype.stop = function() {
			return this.audio.pause();
		}), (n.AudioContext =
			window.AudioContext || window.webkitAudioContext), (n.enabled =
			null != n.AudioContext), (window.AudioAnalyser = n);
	})(), (function() {
		(window.Analyser = function(n) {
			function t() {
				i++, (Analyser.energy = Math.sin(i / u) * s);
				for (var n = 0; n < Analyser.bands.length; n++)
					Analyser.bands[n] = Math.sin((n + i) / u) * (255 * Math.random());
			}
			(this.numOfBands = 32), (this.smoothing = 0.3);
			var e,
				o,
				a = 16,
				i = 0,
				u = 15,
				s = 0.6,
				r = this;
			(this.init = function(a, i) {
				var u;
				(u = n ? n : ""), (r.numOfBands = null != a
					? a
					: 32), (r.smoothing = null != i ? i : 0.3), (o = new AudioAnalyser(
					u,
					r.numOfBands,
					r.smoothing
				)), (o.onUpdate = function(n, o, a) {
					null != e &&
						(
							clearInterval(e),
							(e = null)
						), (Analyser.bands = n), (Analyser.decibels = o), (Analyser.energy = a), 0 ==
						a && t(), null != r.onUpdate &&
						"function" == typeof r.onUpdate &&
						r.onUpdate(n, o, Analyser.energy);
				});
			}), (this.start = function() {
				o.start(), (e = setInterval(t, a));
			}), (this.stop = function() {
				o.stop();
			});
		}), (Analyser.bands = []), (Analyser.decibels = 0), (Analyser.energy = 0);
	})(), (function() {
		var n = function() {
			this.map = function(n, t, e, o, a) {
				return o + (a - o) * (n - t) / (e - t);
			};
		};
		window.Calc = new n();
	})();
})();

/**
 * The sketch
 */
(function() {
	"use strict";
	var canvas = document.getElementById("canvas"),
		ctx = canvas.getContext("2d"),
		w = (canvas.width = window.innerWidth),
		h = (canvas.height = window.innerHeight),
		points = [],
		drawCount = 0,
		rotationRadius = 0,
		rotationRadiusUp = true,
		center = {
			x: w / 2,
			y: h / 2
		},
		settings = {
			speed: 1,
			rotationSpeed: 1,
			rotationRadiusFrom: 40,
			rotationRadiusTo: 280,
			rotationRadiusSpeed: 1.5,
			connectionDistance: 15,
			connectionDistanceFract: 17.5,
			lineWidth: 0.1,
			size: 1.1,
			killAfter: 190,
			hue: 100,
			saturation: 100,
			brightness: 30,
			backgroundSaturation: 17,
			backgroundBrightness: 4,
			backgroundAlpha: 0.04,
			randomSize: 0,
			pushEvery: 1,
			scaleFrom: 680,
			scaleTo: 760,
			scaleMin: -0.4,
			scaleMax: 0.1
		},
		analyser;

	// Degub / framerate
	var filterStrength = 20;
	var frameTime = 0,
		lastLoop = new Date(),
		thisLoop;
	var fpsOut = document.getElementById("fps");

	function setup() {
		w = canvas.width = window.innerWidth;
		h = canvas.height = window.innerHeight;

		// Allocate a new analyser
		analyser = new Analyser(document.getElementById("stream"));
		analyser.init();
		analyser.start();

		ctx.fillStyle = "hsl(" + settings.hue + ",40%,50%)";
		ctx.fillRect(0, 0, w, h);

		rotationRadius = settings.rotationRadiusFrom;

		var gui = new dat.GUI();
		gui.add(settings, "speed").min(0).max(500).step(2);
		gui.add(settings, "rotationSpeed").min(0).max(500).step(2);
		gui.add(settings, "rotationRadiusFrom").min(0).max(500).step(2);
		gui.add(settings, "rotationRadiusTo").min(0).max(1000).step(2);
		gui.add(settings, "rotationRadiusSpeed").min(0.0).max(3.0).step(0.01);
		gui.add(settings, "connectionDistance").min(0).max(500).step(1);
		gui.add(settings, "connectionDistanceFract").min(0.0).max(35.0).step(0.1);
		gui.add(settings, "lineWidth").min(0).max(20).step(0.1);
		gui.add(settings, "size").min(0.2).max(20).step(0.1);
		gui.add(settings, "killAfter").min(10).max(1000).step(2);
		gui.add(settings, "hue").min(0).max(360).step(1);
		gui.add(settings, "saturation").min(0).max(100).step(1);
		gui.add(settings, "brightness").min(0).max(100).step(1);
		gui.add(settings, "backgroundSaturation").min(0).max(100).step(1);
		gui.add(settings, "backgroundBrightness").min(0).max(100).step(1);
		gui.add(settings, "backgroundAlpha").min(0.0).max(1.0).step(0.01);
		gui.add(settings, "randomSize").min(0).max(5).step(0.1);
		gui.add(settings, "pushEvery").min(1).max(100).step(1);
		gui.add(settings, "scaleFrom").min(0).max(5000).step(10);
		gui.add(settings, "scaleTo").min(0).max(5000).step(10);
		gui.add(settings, "scaleMin").min(-2.0).max(2.0).step(0.1);
		gui.add(settings, "scaleMax").min(0.0).max(5.0).step(0.1);
		gui.close();

		draw();
	}

	function draw() {
		ctx.globalCompositeOperation = "source-over";

		ctx.fillStyle =
			"hsla(" +
			settings.hue +
			"," +
			settings.backgroundSaturation +
			"%," +
			settings.backgroundBrightness +
			"%, " +
			settings.backgroundAlpha +
			")";
		ctx.fillRect(-(w / 2), -(h / 2), w * 2, h * 2);

		ctx.save();

		if (Analyser.bands != null && Analyser.bands.length > 0) {
			var lowEnd =
				Analyser.bands[0] +
				Analyser.bands[1] +
				Analyser.bands[2] +
				Analyser.bands[3] +
				Analyser.bands[4];
			var scale = mapValue(
				lowEnd,
				settings.scaleFrom,
				settings.scaleTo,
				settings.scaleMin,
				settings.scaleMax
			);

			ctx.translate((w - w * scale) / 2, (h - h * scale) / 2);
			ctx.scale(scale, scale);
		}

		ctx.fillStyle =
			"hsl(" +
			settings.hue +
			"," +
			settings.saturation +
			"%," +
			settings.brightness +
			"%)";
		ctx.strokeStyle =
			"hsl(" +
			settings.hue +
			"," +
			settings.saturation +
			"%," +
			settings.brightness +
			"%)";
		ctx.lineWidth = settings.lineWidth;

		var distanceAdd = Calc.map(
			rotationRadius,
			settings.rotationRadiusFrom,
			settings.rotationRadiusTo,
			1.0,
			settings.connectionDistanceFract
		);

		var connDistance = settings.connectionDistance;
		connDistance += distanceAdd;

		ctx.globalCompositeOperation = "lighter";

		points.each(function(point) {
			point.draw();

			points.each(function(connection) {
				var distanceX = Math.pow(connection.x - point.x, 2);
				var distanceY = Math.pow(connection.y - point.y, 2);
				var distance = Math.sqrt(distanceX + distanceY);

				if (distance <= connDistance) {
					ctx.strokeStyle =
						"hsla(" +
						settings.hue +
						"," +
						settings.saturation +
						"%," +
						settings.brightness +
						"%, " +
						connection.opacity +
						")";

					ctx.beginPath();
					ctx.moveTo(point.x, point.y);
					ctx.lineTo(connection.x, connection.y);
					ctx.stroke();
					ctx.closePath();
				}
			});
		});

		drawCount++;

		pushPoints();

		ctx.restore();

		if (rotationRadiusUp) {
			rotationRadius += settings.rotationRadiusSpeed;
		} else {
			rotationRadius -= settings.rotationRadiusSpeed;
		}

		if (rotationRadius > settings.rotationRadiusTo) {
			rotationRadiusUp = false;
		} else if (rotationRadius < settings.rotationRadiusFrom) {
			rotationRadiusUp = true;
		}

		updateFps();

		window.requestAnimationFrame(draw);
	}

	function updateFps() {
		var thisFrameTime = (thisLoop = new Date()) - lastLoop;
		frameTime += (thisFrameTime - frameTime) / filterStrength;
		lastLoop = thisLoop;

		fpsOut.innerHTML = Math.ceil(1000 / frameTime) + " fps";
	}

	function pushPoints() {
		if (drawCount % settings.pushEvery == 0) {
			var centerX = Math.sin(drawCount / settings.rotationSpeed) * rotationRadius;
			var centerY = Math.cos(drawCount / settings.rotationSpeed) * rotationRadius;

			points.push(
				new Point(center.x + centerX, center.y + centerY, settings.killAfter)
			);
		}
	}

	var Point = function(_x, _y, _killAfter) {
		this.x = _x;
		this.y = _y;
		this.killAfter = _killAfter != null ? _killAfter : 400;
		this.lifetime = 0;
		this.opacity = 1.0;

		var _this = this;

		this.draw = function() {
			if (_this.lifetime > _this.killAfter) {
				_this.dealloc();

				return;
			}

			_this.opacity = 1.0 - _this.lifetime / _this.killAfter;

			ctx.fillStyle =
				"hsla(" +
				settings.hue +
				"," +
				settings.saturation +
				"%," +
				settings.brightness +
				"%," +
				_this.opacity +
				")";

			ctx.beginPath();
			ctx.arc(_this.x, _this.y, settings.size, 0, 2 * Math.PI);
			ctx.fill();
			ctx.closePath();

			_this.lifetime++;
		};

		this.dealloc = function() {
			var index = points.indexOf(_this);

			if (index > -1) {
				points.splice(index, 1);
			}

			_this = null; // remove strong reference to 'this'
		};
	};

	function mapValue(value, low1, high1, low2, high2) {
		return low2 + (high2 - low2) * (value - low1) / (high1 - low1);
	}

	window.addEventListener(
		"resize",
		function() {
			w = canvas.width = window.innerWidth;
			h = canvas.height = window.innerHeight;

			center = {
				x: w / 2,
				y: h / 2
			};

			ctx.fillStyle = "hsl(" + settings.hue + ",40%,50%)";
			ctx.fillRect(0, 0, w, h);
		},
		false
	);

	// Faster than .forEach
	Array.prototype.each = function(a) {
		var l = this.length;
		for (var i = 0; i < l; i++) {
			var e = this[i];

			if (e) {
				a(e, i);
			}
		}
	};

	setup();
})();
