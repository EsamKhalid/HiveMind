// COPYRIGHT (C) HARRY CLARK 2024
// THREE JS IMPLEMENTATION

// THE FOLLOWING FILE PERTAINS TOWARDS THE MODULARISATION OF PROVIDING
// DECLARATION AND GETTERS AND SETTERS FOR THE MATERIAL ATTRIBUTES

import * as THREE from 'three';

export class MaterialManager 
{
    constructor() {
        this.currentModel = null;
        this.currentMaterial = new THREE.MeshStandardMaterial({
            color: 0x808080,
            metalness: 0.2,
            roughness: 0.8
        });
        this.setupEventListeners();
    }

    createMaterial(type) 
    {
        const color = this.currentMaterial ? this.currentMaterial.color : 0x808080;
        switch(type) 
        {
            case 'LAMBERT':
                return new THREE.MeshLambertMaterial({ color });
            case 'PHONG':
                return new THREE.MeshPhongMaterial({ color });
            case 'BASIC':
                return new THREE.MeshBasicMaterial({ color });
            default:
                return new THREE.MeshStandardMaterial({
                    color,
                    metalness: this.currentMaterial ? this.currentMaterial.metalness : 0.2,
                    roughness: this.currentMaterial ? this.currentMaterial.roughness : 0.8
                });
        }
    }

    setupEventListeners() 
    {
        document.getElementById('material-type').addEventListener('change', (e) => 
        {
            this.currentMaterial = this.createMaterial(e.target.value);
            if (this.currentModel) 
            {
                this.currentModel.traverse((child) => 
                {
                    if (child instanceof THREE.Mesh) 
                    {
                        child.material = this.currentMaterial;
                    }
                });
            }
        });

        document.getElementById('metalness-control').addEventListener('input', (e) => 
        {
            if (this.currentMaterial.metalness !== undefined) 
            {
                this.currentMaterial.metalness = parseFloat(e.target.value);
                this.updateDisplay();
            }
        });

        document.getElementById('roughness-control').addEventListener('input', (e) => 
        {
            if (this.currentMaterial.roughness !== undefined) 
            {
                this.currentMaterial.roughness = parseFloat(e.target.value);
                this.updateDisplay();
            }
        });
    }

    updateDisplay() 
    {
        document.getElementById('metalness-value').textContent = this.currentMaterial.metalness.toFixed(1);
        document.getElementById('roughness-value').textContent = this.currentMaterial.roughness.toFixed(1);
    }

    getCurrentMaterial() 
    {
        return this.currentMaterial;
    }

    setCurrentModel(model) 
    {
        this.currentModel = model;
    }
}