using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Bullet : MonoBehaviour
{
    public float speed = 20f;
    public Rigidbody2D rb;
    public float timeUntilDespawn;
    [SerializeField] GameObject exploEffect;

    // Start is called before the first frame update
    void Start()
    {
        rb.velocity = -transform.right * speed;
        Invoke("DespawnBullet", timeUntilDespawn);
    }

    private void DespawnBullet()
    {
        Instantiate(exploEffect, transform.position, Quaternion.identity);
        Destroy(gameObject);
    }

    private void OnTriggerEnter2D(Collider2D col) {
        if (col.CompareTag("Wall")) {
            DespawnBullet();
        }
    }
}
