using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class SteeringCollider : MonoBehaviour
{
    public float requiredDistanceFromNeighbors;
    public List<GameObject> neighbors;

    //The three steering methods of boids.
    public void OnCollisionEnter(Collision collidee) {
        neighbors.Add(collidee.gameObject);
    }

    public void OnCollisionExit(Collision collidee) {
        neighbors.Remove(collidee.gameObject);
    }


    //Moves the NPC/AI/Whatever away from its neighbors that are too close.
    public Vector3 Seperate() {
        Vector3 ReturnVector = new Vector3(0, 0, 0);
        int averageCounter = 0;

        for (int I = 0; I < neighbors.Count; I++) {
            if (Vector3.Distance(neighbors[I].transform.position, transform.position) < requiredDistanceFromNeighbors) //If the neighbor is too close.
            {
                averageCounter += 1;
                ReturnVector += (transform.position - neighbors[I].transform.position);
            }
        }

        ReturnVector = ReturnVector / averageCounter; //Average the vector.

        return ReturnVector;
    }


    //Moves the NPC/AI/Whatever towards the direction its neighbors are headed.
    public Vector3 Alignment() {
        Vector3 ReturnVector = new Vector3(0, 0, 0);

        for (int I = 0; I < neighbors.Count; I++) {
            ReturnVector += neighbors[I].transform.forward;
        }

        ReturnVector = ReturnVector / neighbors.Count; //Average the vector.

        return ReturnVector;
    }

    //Moves the NPC/AI/Whatever towards the center of its neighbors.
    public Vector3 Cohesion() {
        Vector3 ReturnVector = new Vector3(0, 0, 0);

        for (int I = 0; I < neighbors.Count; I++) {
            ReturnVector += neighbors[I].transform.position;
        }

        ReturnVector = ReturnVector / neighbors.Count;

        return ReturnVector;
    }
}
