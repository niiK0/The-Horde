using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RemoveSelfAmmo : MonoBehaviour
{
    [SerializeField] int timeAlive;

    void Start()
    {
        Invoke("DestroySelfAfterTime", timeAlive);
    }

    void DestroySelfAfterTime() {
        Destroy(gameObject);
    }
}
