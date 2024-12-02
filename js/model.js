// COPYRIGHT (C) HARRY CLARK 2024
// THREE JS BACKGROUND VISUALS

// THIS FILE PERTAINS TO MODEL LOADING AND OTHER
// PREREQUISITES THAT FOLLOW WITH THAT

export async function LOAD_MODEL(SCENE) 
{
    const LOADER = new THREE.OBJLoader(); 
    const BEES = []; 
    const BEE_INDEX = 200; 

    return new Promise((RESOLVE) => 
    {
        LOADER.load(
            './Bee.obj',
            
            (OBJECT) => 
            {
                OBJECT.traverse((CHILD) => 
                {
                    if (CHILD.isMesh) 
                    {
                        CHILD.material = new THREE.MeshBasicMaterial(
                        {
                            color: 0xf7a00a, 
                            emissive: 0x000000, 
                            emissiveIntensity: 0, 
                            flatShading: true, 
                        });
                        CHILD.material.color.multiplyScalar(0.6); 
                    }
                });

                OBJECT.scale.set(0.2, 0.2, 0.2);

                for (let INDEX = 0; INDEX < BEE_INDEX; INDEX++) 
                {
                    const CLONE = OBJECT.clone();
                    const OFFSET_X = (Math.random() - 0.5) * 100; 
                    const OFFSET_Y = (Math.random() - 0.5) * 100; 

                    CLONE.userData = 
                    {
                        OFFSET_X: OFFSET_X,
                        OFFSET_Y: OFFSET_Y,
                    };

                    SCENE.add(CLONE);
                    BEES.push(CLONE);
                }

                RESOLVE(BEES);
            },
        );
    });
}
