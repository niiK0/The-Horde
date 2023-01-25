using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class FollowMouse2 : MonoBehaviour
{
    
    // Update is called once per frame
    void Update()
    {
        facemouse();
    }

    void facemouse(){
        Vector3 mousePos = Input.mousePosition;
        mousePos = Camera.main.ScreenToWorldPoint(mousePos);

        Vector2 direction = new Vector2(
            mousePos.x - transform.position.x, mousePos.y - transform.position.y
        );

        transform.right = -direction;

    }
}
