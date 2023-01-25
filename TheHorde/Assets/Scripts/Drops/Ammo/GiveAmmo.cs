using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GiveAmmo : MonoBehaviour
{
    private void OnTriggerEnter2D(Collider2D collision) {
        if (collision.CompareTag("Player")) {
            var currentWeapon = collision.GetComponent<Weapon>();
            currentWeapon.maxAmmo += currentWeapon.magazineSize;
            FindObjectOfType<AudioManager>().PlaySound("Pickup");
            Destroy(gameObject);
        }
    }
}
