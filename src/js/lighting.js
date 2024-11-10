// COPYRIGHT (C) HARRY CLARK 2024
// THREE JS IMPLEMENTATION

// THE FOLLOWING FILE PERTAINS TOWARDS THE MODULARISATION OF PROVIDING
// DECLARATION AND GETTERS AND SETTERS FOR THE LIGHTING

import * as THREE from 'three';

export class LightingManager 
{
    constructor(scene) 
    {
        this.scene = scene;
        this.setupLights();
        this.setupEventListeners();
    }

    setupLights() 
    {
        this.dirLight = new THREE.DirectionalLight(0xFFFFFF, 10);
        this.dirLight.position.set(0, 1, 0);
        this.dirLight.castShadow = true;
        this.scene.add(this.dirLight);

        this.ambientLight = new THREE.AmbientLight(0xC4C4C4, 0.5);
        this.scene.add(this.ambientLight);

        this.keyLight = new THREE.DirectionalLight(0xC4C4C4, 1.0);
        this.keyLight.position.set(5, 5, 5);
        this.scene.add(this.keyLight);

        this.fillLight = new THREE.DirectionalLight(0xC4C4C4, 1.0);
        this.fillLight.position.set(-5, 0, 5);
        this.scene.add(this.fillLight);

        this.backLight = new THREE.DirectionalLight(0xC4C4C4, 0.5);
        this.backLight.position.set(0, 3, -5);
        this.scene.add(this.backLight);
    }

    setupEventListeners() 
    {
        const controls = 
        {
            'ambient-intensity': light => this.ambientLight.intensity = light,
            'key-intensity': light => this.keyLight.intensity = light,
            'fill-intensity': light => this.fillLight.intensity = light,
            'back-intensity': light => this.backLight.intensity = light,
            'dir-intensity': light => this.dirLight.intensity = light
        };

        Object.entries(controls).forEach(([id, setter]) => 
        {
            document.getElementById(id).addEventListener('input', (e) => 
            {
                setter(parseFloat(e.target.value));
                this.updateDisplay();
            });
        });
    }

    updateDisplay() 
    {
        document.getElementById('ambient-value').textContent = this.ambientLight.intensity.toFixed(1);
        document.getElementById('key-value').textContent = this.keyLight.intensity.toFixed(1);
        document.getElementById('fill-value').textContent = this.fillLight.intensity.toFixed(1);
        document.getElementById('back-value').textContent = this.backLight.intensity.toFixed(1);
        document.getElementById('dir-value').textContent = this.dirLight.intensity.toFixed(1);
    }
}