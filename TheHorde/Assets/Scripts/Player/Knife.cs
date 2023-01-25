using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Knife : MonoBehaviour {

    [SerializeField] GameObject knifePrefab;
    [SerializeField] Transform FirePoint;

    private GameObject knifeSpawned;

    private float waitTilNextFire;
    public float fireSpeed = 2;

    void Update() {
        if (Input.GetKeyDown(KeyCode.E)) {
            if (waitTilNextFire <= 0) {
                shoot();
                waitTilNextFire = 1f;
            }
        }

        waitTilNextFire -= Time.deltaTime * fireSpeed;
    }

    void shoot() {
        knifeSpawned = Instantiate(knifePrefab, FirePoint.position, FirePoint.rotation);
        knifeSpawned.transform.SetParent(this.gameObject.transform);
        FindObjectOfType<AudioManager>().PlaySound("SwordSlash");
        StartCoroutine(destroyKnife());
    }

    IEnumerator destroyKnife() {
        yield return new WaitForSeconds(0.3f);
        Destroy(knifeSpawned);
    }
}
