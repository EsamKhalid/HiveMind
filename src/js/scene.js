// COPYRIGHT (C) HARRY CLARK 2024
// THREE JS IMPLEMENTATION

// THE FOLLOWING FILE PERTAINS TOWARDS THE MODULARISATION OF PROVIDING
// DECLARATION AND GETTERS AND SETTERS FOR THE SCENE ATTRIBUTES

import * as THREE from 'three';

export class SceneManager 
{
    constructor() 
    {
        this.scene = new THREE.Scene();
        this.SETUP();
    }

    // CREATES GRID GIZMOS TO BE ABLE TO DISCERN A PROPER 3D SPACE
    // THIS WILL HELP WITH EVALUATING FOCAL LENGTH, CULLING DIST, ETC

    SETUP() 
    {
        const gridHelper = new THREE.GridHelper(10, 10);
        this.scene.add(gridHelper);

        const axesHelper = new THREE.AxesHelper(5);
        this.scene.add(axesHelper);
    }

    GET_SCENE() 
    {
        return this.scene;
    }
}

// END OF FILE