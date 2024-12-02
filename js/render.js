// COPYRIGHT (C) HARRY CLARK 2024
// THREE JS BACKGROUND VISUALS

// THIS FILE PERTAINS TOWARDS THE RENDER SETUP AND THE OTHER
// PRE-REQUSITIES THAT FOLLOW WITH THAT

export function animate(BEES, SCENE, CAMERA, RENDERER)
{
    let TIME = 0;

    function RENDER()
    {
        requestAnimationFrame(RENDER);

        BEES.forEach((BEE) => 
        {
            if(BEE) 
            { 
                const { OFFSET_X, OFFSET_Y } = BEE.userData;
            }
        });
    }
}