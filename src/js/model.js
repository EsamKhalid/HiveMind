// COPYRIGHT (C) HARRY CLARK 2024
// THREE JS IMPLEMENTATION

// THE FOLLOWING FILE PERTAINS TOWARDS THE MODULARISATION OF PROVIDING
// DECLARATION AND GETTERS AND SETTERS FOR THE MODEL ATTRIBUTES

import { OBJLoader } from 'three/addons/loaders/OBJLoader.js';
import * as THREE from 'three';

export class ModelLoader 
{
    constructor(scene, materialManager) 
    {
        this.scene = scene;
        this.materialManager = materialManager;
        this.LOADER = new OBJLoader();
        this.setupEventListeners();
    }

    setupEventListeners() 
    {
        document.querySelector('input[type="file"]').addEventListener('change', (event) => 
        {
            const FILE = event.target.files[0];
            if (FILE) 
            {
                this.loadModel(FILE);
            }
        });
    }

    loadModel(file) 
    {
        const READER = new FileReader();
        READER.onload = () => 
        {
            if (this.materialManager.currentModel) 
            {
                this.scene.remove(this.materialManager.currentModel);
            }

            this.LOADER.load
            (
                (obj) => 
                    {
                    this.PROC_MODEL(obj);
                },
            );
        };
        READER.readAsDataURL(file);
    }

    PROC_MODEL(obj) 
    {
        obj.traverse((child) => 
        {
            if (child instanceof THREE.Mesh) 
            {
                if (!child.material || document.getElementById('material-type').value !== 'original') 
                {
                    child.material = this.materialManager.getCurrentMaterial();
                }
            }
        });

        const box = new THREE.Box3().setFromObject(obj);
        const center = box.getCenter(new THREE.Vector3());
        const size = box.getSize(new THREE.Vector3());
        
        obj.position.set(0, 0, 0);

        const maxDim = Math.max(size.x, size.y, size.z);
        const scale = 4 / maxDim;
        obj.scale.multiplyScalar(scale);

        this.materialManager.setCurrentModel(obj);
        this.scene.add(obj);
    }
}