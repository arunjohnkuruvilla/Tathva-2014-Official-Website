var container, stats;

			var camera, scene, renderer;

			var text, plane;

			var targetRotation = 0;
			var targetRotationOnMouseDown = 0;

			var mouseX = 0;
			var mouseXOnMouseDown = 0;
            //This is the dimension screen
			var windowHalfX = window.innerWidth / 2;
			var windowHalfY = window.innerHeight / 2;

			var heartShape, particleCloud, sparksEmitter, emitterPos;
			var _rotation = 0;
			var timeOnShapePath = 0;
			var x = 0, y = 0;
            var val = 2;
			init(val);
			animate();
			var textType = 0;

			function settingType(textType) {

			    if (textType == 0) {
			        document.forms['myform'].hidden.value = "0";
			        init(2);
			    }
			    else if (textType == 1) {
			        document.forms['myform'].hidden.value = "1";
			        init(2);
			    }
			    else if (textType == 2) {
			        document.forms['myform'].hidden.value = "2";
			        init(2);
			    }


			}

			function init(val) {
			    var container;

			    container = document.getElementById('container');

                /*Remove node container scene*/
				if (container.hasChildNodes()) {
				    while (container.childNodes.length >= 1) {
				        container.removeChild(container.firstChild);
				    }
				}
				//Costructor : ( fov <Number>, aspect <Number>, near <Number>, far <Number> )
				camera = new THREE.PerspectiveCamera( 50, window.innerWidth / window.innerHeight, 1, 1000 );
				camera.position.y = 150;
				camera.position.z = 700;
                
				scene = new THREE.Scene();

				// Get text from hash

				var string = "tathva '14";
				//var hash = document.location.hash.substr( 1 );

				//if ( hash.length !== 0 ) {

				//	string = hash;

				//}

				var text3d = new THREE.TextGeometry( string, {

					size: 100,
					height: 35,
					curveSegments: 2,

					font: "fontastique"

				});

				text3d.computeBoundingBox();
				var centerOffset = -0.5 * ( text3d.boundingBox.x[ 1 ] - text3d.boundingBox.x[ 0 ] );

				var textMaterial = new THREE.MeshLambertMaterial({ color: 0xffffff, wireframe: true, wireframeLinewidth: 0.5, overdraw: true });
				text = new THREE.Mesh( text3d, textMaterial );

				// Potentially, we can extract the vertices or faces of the text to generate particles too.
				// Geo > Vertices > Position

				text.doubleSided = false;

				text.position.x = centerOffset;
				text.position.y = 100;
				text.position.z = 0;

				text.rotation.x = 0;
				text.rotation.y = Math.PI * 2;
				text.overdraw = true;

				parent = new THREE.Object3D();
				parent.add( text );


				particleCloud = new THREE.Object3D(); // Just a group
				particleCloud.y = 800;
				parent.add( particleCloud );

				scene.add( parent );


				// Create Particle Systems

				heartShape = new THREE.Shape();

                //create arcSup
				if (val == 1) {
				    heartShape.moveTo(x + 20, y + 5);
				    heartShape.arc(15, 25, 55, 0, Math.PI * 1, false);
				}
                //Create arc Inf
				if (val == -1) {
				    heartShape.moveTo(x + 20, y + 5);
				    heartShape.arc(15, 25, 55, 0, -Math.PI * 1, false);
				}
                //Create Circle
				if (val == 2) {
				    heartShape.moveTo(x + 20, y + 5);
				    heartShape.arc(15, 25, 55, 0, Math.PI * 2, false);
				}
                //Create Angle
				if (val == 3) {
				    heartShape.moveTo(x + -70, y + 10);
				    heartShape.bezierCurveTo(30, 100, 20, 80, 100, 0);
				}
                //Create Line
				if (val == 4) {
				    heartShape.moveTo(x + -100, y + 5);
				    heartShape.lineTo(100, 0);
				}

				var circleLines = function ( context ) {
					context.lineWidth = 0.05;
					context.beginPath();
					context.arc( 0, 0, 1, 0, Math.PI*2, true );
					context.closePath();
					context.stroke();

					context.globalAlpha = 0.2;
					context.fill();
				}

				var hue = 0;

				//Draw a path from one point to another and stretch the path from two controllpoints:
				//Structure : context.bezierCurveTo(cpx1,cpy1,cpx2,cpy2,x,y)

				var hearts = function (context) {
				    context.globalAlpha = 0.5;
				    var x = 0, y = 0;
				    context.scale(0.1, -0.1); // Scale so canvas render can redraw within bounds
				    context.beginPath();


				    //drops
				    if (document.forms['myform'].hidden.value == 0) {
				        context.bezierCurveTo(x + 6, y + 10, x + 5.5, y + 11.5, x + 5.5, y + 12.5);
				        context.bezierCurveTo(x + 5.5, y + 13.5, x + 6, y + 15, x + 7.5, y + 15);
				        context.bezierCurveTo(x + 9, y + 15, x + 9.5, y + 13.5, x + 9.5, y + 12.5);
				        context.bezierCurveTo(x + 9.5, y + 11.5, x + 9, y + 10, x + 7.5, y + 10);
				    }
				    else if (document.forms['myform'].hidden.value == 1) {
				        //bird
				        context.lineTo(10, 10);
				        context.quadraticCurveTo(2.5, 5, 5, 10);
				        context.bezierCurveTo(2.5, 5, 2.5, 5, 5, 5); // <- this is right formula for the image on the right ->  
				        context.lineTo(10, 10);
				    }
				    //Arrows
				    else if (document.forms['myform'].hidden.value == 2) {
				        context.lineTo(10, 10);
				        context.bezierCurveTo(2.5, 5, 2.5, 5, 5, 5); // <- this is right formula for the image on the right ->  
				        context.lineTo(10, 10);

				    }
				    

				    context.closePath();
				    context.fill();
				    context.lineWidth = 0.5; //0.05
				    context.stroke();
				}

				var setTargetParticle = function() {

					// circleLines
					var material = new THREE.ParticleCanvasMaterial( {  program: hearts, blending:THREE.AdditiveBlending } );

					material.color.setHSV(hue, 0.5, 1); 
					hue += 0.001;
					if (hue>1) hue-=1;

					particle = new THREE.Particle( material );

					particle.scale.x = particle.scale.y = Math.random() * 20 +20;
					particleCloud.add( particle );	

					return particle;
				};

				var onParticleCreated = function(p) {
					var position = p.position;
					p.target.position = position;	
				};

				var onParticleDead = function(particle) {
					particle.target.visible = false;
					particleCloud.remove(particle.target); 
				};

				sparksEmitter = new SPARKS.Emitter(new SPARKS.SteadyCounter(160));

				emitterpos = new THREE.Vector3();

				sparksEmitter.addInitializer(new SPARKS.Position( new SPARKS.PointZone( emitterpos ) ) );
				sparksEmitter.addInitializer(new SPARKS.Lifetime(0,2));
				sparksEmitter.addInitializer(new SPARKS.Target(null, setTargetParticle));

				sparksEmitter.addInitializer(new SPARKS.Velocity(new SPARKS.PointZone(new THREE.Vector3(0,-50,10))));

				// TOTRY Set velocity to move away from centroid

				sparksEmitter.addAction(new SPARKS.Age());
				sparksEmitter.addAction(new SPARKS.Accelerate(0.2));
				sparksEmitter.addAction(new SPARKS.Move()); 
				sparksEmitter.addAction(new SPARKS.RandomDrift(50,50,2000));

				sparksEmitter.addCallback("created", onParticleCreated);
				sparksEmitter.addCallback("dead", onParticleDead);
				sparksEmitter.start();

				// End Particles

				renderer = new THREE.CanvasRenderer();
				renderer.setSize( window.innerWidth, window.innerHeight );

				container.appendChild( renderer.domElement );

				document.addEventListener( 'mousedown', onDocumentMouseDown, false );

			}

			//

			document.addEventListener( 'mousemove', onDocumentMouseMove, false );
            
            //Function on mouse click and stop move
			function onDocumentMouseDown( event ) {

				event.preventDefault();

				mouseXOnMouseDown = event.clientX - windowHalfX;
				targetRotationOnMouseDown = targetRotation;

				if (sparksEmitter.isRunning()) {
					sparksEmitter.stop();
				} else {
					sparksEmitter.start();
				}

			}

			function onDocumentMouseMove( event ) {

				mouseX = event.clientX - windowHalfX;

				targetRotation = targetRotationOnMouseDown + ( mouseX - mouseXOnMouseDown ) * 0.02;

			}


			function animate() {

				requestAnimationFrame( animate );

				render();
				
			}

			function render() {

				timeOnShapePath += 0.0337;

				if (timeOnShapePath > 1) timeOnShapePath -= 1;

				// TODO Create a PointOnShape Action/Zone in the particle engine
				var pointOnShape = heartShape.getPointAt( timeOnShapePath );

				emitterpos.x = pointOnShape.x * 5 - 100;
				emitterpos.y = -pointOnShape.y * 5 + 400;

				// Pretty cool effect if you enable this
				particleCloud.rotation.y += 0.05;

				parent.rotation.y += ( targetRotation - parent.rotation.y ) * 0.05;
				renderer.render( scene, camera );

			}