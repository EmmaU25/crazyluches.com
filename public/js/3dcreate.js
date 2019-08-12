var renderer;  // A three.js WebGL or Canvas renderer.
var scene;     // The 3D scene that will be rendered, containing the model.
var camera;    // The camera that takes the picture of the scene.
var loader
var model; // The three.js object that represents the model.

var rotateX = 0;   // rotation of model about the x-axis
var rotateY = 0;  // rotation of model about the y-axis


function createWorld() {
    var light;  // A light shining from the direction of the camera.
    light = new THREE.DirectionalLight();
    light.position.set(0,0,1);
    scene.add(light);
}


function modelLoadedCallback(geometry, materials) {
   
    var object = new THREE.Mesh(geometry, new THREE.MeshFaceMaterial(materials));

    /* Determine the ranges of x, y, and z in the vertices of the geometry. */

    var xmin = Infinity;
    var xmax = -Infinity;
    var ymin = Infinity;
    var ymax = -Infinity;
    var zmin = Infinity;
    var zmax = -Infinity;
    for (var i = 0; i < geometry.vertices.length; i++) {
        var v = geometry.vertices[i];
        if (v.x < xmin)
            xmin = v.x;
        else if (v.x > xmax)
            xmax = v.x;
        if (v.y < ymin)
            ymin = v.y;
        else if (v.y > ymax)
            ymax = v.y;
        if (v.z < zmin)
            zmin = v.z;
        else if (v.z > zmax)
            zmax = v.z;
    }
    
    /* translate the center of the object to the origin */
    var centerX = (xmin+xmax)/2;
    var centerY = (ymin+ymax)/2; 
    var centerZ = (zmin+zmax)/2;
    var max = Math.max(centerX - xmin, xmax - centerX);
    max = Math.max(max, Math.max(centerY - ymin, ymax - centerY) );
    max = Math.max(max, Math.max(centerZ - zmin, zmax - centerZ) );
    var scale = 10/max;
    object.position.set( -centerX, -centerY, -centerZ );
    console.log("Loading finished, scaling object by " + scale);
    console.log("Center at ( " + centerX + ", " + centerY + ", " + centerZ + " )");
    
    /* Create the wrapper, model, to scale and rotate the object. */
    
    model = new THREE.Object3D();
    model.add(object);
    model.scale.set(scale,scale,scale);
    rotateX = rotateY = 0;
    scene.add(model);
    render();

}

function installModel(file, bgColor) { 
    if (model) {
        scene.remove(model);
    }
    renderer.setClearColor(bgColor);
    render();
    loader = new THREE.JSONLoader();
    loader.load("http://127.0.0.1:8000/" + file, modelLoadedCallback);
}

function render() {
    renderer.render(scene, camera);
}

function changeColor(hexa){
model.traverse(function(child) {
    if(child instanceof THREE.Mesh){
           var faces= child.geometry.faces.length;
        for ( var i = 0; i < faces; i++ ) {
            var face = child.geometry.faces[ i ];
            face.color.setHex(hexa);
        }
    }
 });

//model.children[0].material.color.set(hexa);
 //model.material.color.setHex(hexa);
//alert(hexa);
}




function doKey(evt) { 
    var rotationChanged = true;
	switch (evt.keyCode) {
	    case 37: rotateY -= 0.05; break;        // left arrow
	    case 39: rotateY +=  0.05; break;       // right arrow
	    case 38: rotateX -= 0.05; break;        // up arrow
	    case 40: rotateX += 0.05; break;        // down arrow
	    case 13: rotateX = rotateY = 0; break;  // return
	    case 36: rotateX = rotateY = 0; break;  // home
	    default: rotationChanged = false;
	}
	if (model && rotationChanged) {
       model.rotation.set(rotateX,rotateY,0);	
       render();
	   evt.preventDefault();
	}
}

function init() {
    try {
        var theCanvas = document.getElementById("cnvs");
        if (!theCanvas || !theCanvas.getContext) {
            document.getElementById("message").innerHTML = 
                             "Sorry, your browser doesn't support canvas graphics.";
            return;
        }
        try {  // try to create a WebGLRenderer
            if (window.WebGLRenderingContext) {
                renderer = new THREE.WebGLRenderer( { 
                   canvas: theCanvas, 
                   antialias: true
                } );
            } 
        }
        catch (e) {
        }
        if (!renderer) { // If the WebGLRenderer couldn't be created, try a CanvasRenderer.
            renderer = new THREE.CanvasRenderer( { canvas: theCanvas } );
            renderer.setSize(theCanvas.width,theCanvas.height);
            document.getElementById("message").innerHTML =
                          "WebGL not available; falling back to CanvasRenderer.";
        }
        scene = new THREE.Scene();
        camera = new THREE.PerspectiveCamera(50, theCanvas.width/theCanvas.height, 0.1, 100);
        camera.position.z = 30;
        createWorld();
        //installModel("fnaf.js");
        render();
        document.addEventListener("keydown", doKey, false);
        //document.getElementById("r1").checked = true;
     }
     catch (e) {
        document.getElementById("message").innerHTML = "Sorry, an error occurred: " + e;
     }
}