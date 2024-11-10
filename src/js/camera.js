// COPYRIGHT (C) HARRY CLARK 2024
// THREE JS IMPLEMENTATION

// THE FOLLOWING FILE SERVES TO PROVIDE THE MODULARISED LOGIC FOR THE CAMERA
// AND SUBSQUENT CONTROLS

import * as THREE from 'three';

export class CameraManager 
{
    constructor() 
    {
        this.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        this.camera.position.z = 5;
        this.setupEventListeners();
    }

    setupEventListeners() 
    {
        document.getElementById('fov-control').addEventListener('input', (e) => 
        {
            this.camera.fov = parseFloat(e.target.value);
            this.camera.updateProjectionMatrix();
            this.updateDisplay();
        });

        document.getElementById('near-control').addEventListener('input', (e) => 
        {
            this.camera.near = parseFloat(e.target.value);
            this.camera.updateProjectionMatrix();
            this.updateDisplay();
        });
    }

    updateDisplay() 
    {
        document.getElementById('fov-value').textContent = `${this.camera.fov}°`;
        document.getElementById('near-value').textContent = this.camera.near.toFixed(1);
    }

    GET_CAMERA() 
    {
        return this.camera;
    }

    updateAspect(aspect) 
    {
        this.camera.aspect = aspect;
        this.camera.updateProjectionMatrix();
    }
}