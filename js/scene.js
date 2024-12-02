// COPYRIGHT (C) HARRY CLARK 2024
// THREE JS BACKGROUND VISUALS

// THIS FILE PERTAINS TOWARDS THE SCENE SETUP AND THE OTHER
// PRE-REQUSITIES THAT FOLLOW WITH THAT

import { LOAD_MODEL } from "./model";

export const SCENE = new THREE.Scene();
export const RENDERER = new THREE.WebGLRenderer();

RENDERER.setSize(window.innerWidth, window.innerHeight);
RENDERER.setClearColor(0xFFFFFF);

document.body.appendChild(RENDERER.domElement);


const ASPECT = window.innerWidth / window.innerHeight;
const CAMERA_ANGLE = 10;

export const CAMERA = new THEEE.OrthographicCamera(

    -CAMERA_ANGLE * ASPECT,
    CAMERA_ANGLE * ASPECT,
    CAMERA_ANGLE,
    -CAMERA_ANGLE,
    0.1,
    1000
);

CAMERA.position.z = 50;


window.addEventListener('resize', () => 
{
    const NEW_ASPECT = window.innerWidth / window.innerHeight;
    CAMERA.left = -CAMERA_ANGLE * NEW_ASPECT;
    CAMERA.right = CAMERA_ANGLE * NEW_ASPECT;

    CAMERA.updateProjectionMatrix();
    RENDERER.setSize(window.innerWidth, window.innerHeight);
});

LOAD_MODEL(SCENE).then((BEES) => animate(BEES, SCENE, CAMERA, RENDERER));
