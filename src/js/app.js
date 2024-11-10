// COPYRIGHT (C) HARRY CLARK 2024
// THREE JS IMPLEMENTATION

// THE FOLLOWING FILE PERTAINS TOWARDS THE MODULARISATION OF PROVIDING
// DECLARATION AND GETTERS AND SETTERS FOR THE MAIN ENCOMPASSING APP

// NESTED INCLUDES

import { SceneManager } from './scene.js';
import { CameraManager } from './camera.js';
import { LightingManager } from './lighting.js';
import { MaterialManager } from './mats.js';
import { ModelLoader } from './model.js';
import { RendererManager } from './render.js';
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';

class App 
{
    constructor() 
    {
        // CONSTRUCTORS FOR MANAGERS

        this.sceneManager = new SceneManager();
        this.cameraManager = new CameraManager();
        this.rendererManager = new RendererManager();

        // EVALUATE THE GETTER METHODS
        
        this.scene = this.sceneManager.GET_SCENE();
        this.camera = this.cameraManager.GET_CAMERA();
        this.renderer = this.rendererManager.GET_RENDERER();
        
        this.controls = new OrbitControls(this.camera, this.renderer.domElement);
        this.controls.enableDamping = true;
        this.controls.dampingFactor = 0.05;
        
        this.lightingManager = new LightingManager(this.scene);
        this.materialManager = new MaterialManager();
        this.modelLoader = new ModelLoader(this.scene, this.materialManager);
        
        this.setupEventListeners();
        this.animate();
    }

    setupEventListeners() 
    {
        window.addEventListener('resize', () => 
            {
            this.cameraManager.updateAspect(window.innerWidth / window.innerHeight);
            this.rendererManager.updateSize(window.innerWidth, window.innerHeight);
        }, false);

    }

    animate() 
    {
        requestAnimationFrame(() => this.animate());
        this.controls.update();
        this.renderer.render(this.scene, this.camera);
    }
}

new App();

// END OF FILE