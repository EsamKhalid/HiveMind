// COPYRIGHT (C) HARRY CLARK 2024
// THREE JS IMPLEMENTATION

// THE FOLLOWING FILE PERTAINS TOWARDS THE MODULARISATION OF PROVIDING
// DECLARATION AND GETTERS AND SETTERS FOR THE RENDERER

import * as THREE from 'three';

export class RendererManager 
{
    constructor() 
    {
        this.renderer = new THREE.WebGLRenderer({ 
            antialias: true, 
            powerPerformance: "high-performance" 
        });

        this.SETUP_RENDERER();
    }

    SETUP_RENDERER() 
    {
        this.renderer.setSize(window.innerWidth, window.innerHeight);
        this.renderer.setClearColor(0x1a1a1a);
        this.renderer.physicallyCorrectLights = true;
        this.renderer.outputEncoding = THREE.sRGBEncoding;
        document.getElementById('scene-container').appendChild(this.renderer.domElement);
    }

    GET_RENDERER() 
    {
        return this.renderer;
    }

    updateSize(width, height) 
    {
        this.renderer.setSize(width, height);
    }
}