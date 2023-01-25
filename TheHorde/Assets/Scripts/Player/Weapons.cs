using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class Weapons : MonoBehaviour
{
    [SerializeField] Text weaponNameText;

    public void changeWeapon(string weaponName) {
        var weapon = gameObject.GetComponent<Weapon>();

        switch (weaponName) {
            case "pistol":
                weapon.weaponName = "pistol";
                weaponNameText.text = "Weapon: Pistol";
                weapon.damage = 1;
                weapon.reloadTime = 2;
                weapon.allowButtonHold = false;
                weapon.timeBetweenShooting = 0.65f;
                weapon.timeBetweenShots = 0.05f;
                weapon.maxAmmo = 60;
                weapon.magazineSize = 12;
                weapon.bulletsLeft = 12;
                weapon.bulletsPerTap = 1;
                break;
            case "heavypistol":
                weapon.weaponName = "heavypistol";
                weaponNameText.text = "Weapon: Heavy Pistol";
                weapon.damage = 3;
                weapon.reloadTime = 2;
                weapon.allowButtonHold = false;
                weapon.timeBetweenShooting = 0.9f;
                weapon.timeBetweenShots = 0.05f;
                weapon.maxAmmo = 28;
                weapon.magazineSize = 7;
                weapon.bulletsLeft = 7;
                weapon.bulletsPerTap = 1;
                break;
            case "rifle":
                weapon.weaponName = "rifle";
                weaponNameText.text = "Weapon: Rifle";
                weapon.damage = 1;
                weapon.reloadTime = 2;
                weapon.allowButtonHold = true;
                weapon.timeBetweenShooting = 0.1f;
                weapon.timeBetweenShots = 1;
                weapon.maxAmmo = 150;
                weapon.magazineSize = 30;
                weapon.bulletsLeft = 30;
                weapon.bulletsPerTap = 1;
                break;
            case "burstrifle":
                weapon.weaponName = "burstrifle";
                weaponNameText.text = "Weapon: Burst Rifle";
                weapon.damage = 2;
                weapon.reloadTime = 2;
                weapon.allowButtonHold = false;
                weapon.timeBetweenShooting = 0.6f;
                weapon.timeBetweenShots = 0.1f;
                weapon.maxAmmo = 75;
                weapon.magazineSize = 15;
                weapon.bulletsLeft = 15;
                weapon.bulletsPerTap = 3;
                break;
            case "sniper":
                weapon.weaponName = "sniper";
                weaponNameText.text = "Weapon: Sniper";
                weapon.damage = 12;
                weapon.reloadTime = 1.5f;
                weapon.allowButtonHold = false;
                weapon.timeBetweenShooting = 2f;
                weapon.timeBetweenShots = 1f;
                weapon.maxAmmo = 25;
                weapon.magazineSize = 1;
                weapon.bulletsLeft = 1;
                weapon.bulletsPerTap = 1;
                break;
        }
    }
}
