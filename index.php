<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HARRY CLARK - BACKGROUND VIS</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.134.0/examples/js/loaders/OBJLoader.js"></script>
</head>
<body>
<script>

    // SCENE DECLARATIONS

    const SCENE = new THREE.Scene();
    const RENDERER = new THREE.WebGLRenderer({ antialias: true });
    RENDERER.setSize(window.innerWidth, window.innerHeight);
    RENDERER.setClearColor(0xffffff);
    document.body.appendChild(RENDERER.domElement);

    // CAMERA SETUP

    const ASPECT = window.innerWidth / window.innerHeight;
    const CAMERA_ANGLE = 10;
    const CAMERA = new THREE.OrthographicCamera(
        -CAMERA_ANGLE * ASPECT,
        CAMERA_ANGLE * ASPECT,
        CAMERA_ANGLE,
        -CAMERA_ANGLE,
        0.1,
        1000
    );
    CAMERA.position.z = 50;

    // MODEL LOADER

    const LOADER = new THREE.OBJLoader();
    const BEES = [];
    const BEE_COUNT = 200; 
    let BEE_MODEL;

    LOADER.load(
        './Bee.obj', 
        function (OBJECT) 
        {
            OBJECT.traverse(function (CHILD) 
            {
                if (CHILD.isMesh) 
                {
                    CHILD.material = new THREE.MeshBasicMaterial(
                    { 
                        color: 0xf7a00a, 
                        emissive: 0x000000, 
                        emissiveIntensity: 0, 
                        flatShading: true 
                    });
                    CHILD.material.color.multiplyScalar(0.6); 
                }
            });

            BEE_MODEL = OBJECT;
            BEE_MODEL.scale.set(0.2, 0.2, 0.2);

            for (let I = 0; I < BEE_COUNT; I++) 
            {
                const BEE_CLONE = BEE_MODEL.clone();
                const OFFSET_X = (Math.random() - 0.5) * 100; 
                const OFFSET_Y = (Math.random() - 0.5) * 100;
                BEE_CLONE.userData = 
                {     
                    OFFSET_X: OFFSET_X, 
                    OFFSET_Y: OFFSET_Y 
                };
                SCENE.add(BEE_CLONE);
                BEES.push(BEE_CLONE);
            }
        },
    );

    window.addEventListener('resize', () => 
    {
        const NEW_ASPECT_RATIO = window.innerWidth / window.innerHeight;
        CAMERA.left = -CAMERA_ANGLE * NEW_ASPECT_RATIO;
        CAMERA.right = CAMERA_ANGLE * NEW_ASPECT_RATIO;
        CAMERA.updateProjectionMatrix();
        RENDERER.setSize(window.innerWidth, window.innerHeight);
    });

    let TIME = 0; 
    function animate() 
    {
        requestAnimationFrame(animate);

        BEES.forEach((BEE) => 
        {
            if (BEE) 
            {
                const { OFFSET_X, OFFSET_Y } = BEE.userData;

                BEE.position.x = (TIME + OFFSET_X) % 100 - 10; 
                BEE.position.y = (TIME + OFFSET_Y) % 100 - 10; 
                BEE.rotation.y += 0.01;
            }
        });

        TIME += 0.005;
        RENDERER.render(SCENE, CAMERA);
    }
    animate();
</script>
</body>
</html>
