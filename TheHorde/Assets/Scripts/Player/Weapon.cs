using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Audio;

public class Weapon : MonoBehaviour
{
    //GUN STATS
    public string weaponName;
    public float timeBetweenShooting, range, reloadTime, timeBetweenShots;
    public int damage, maxAmmo, magazineSize, bulletsPerTap, bulletsLeft, bulletsShot;
    public bool allowButtonHold;

    //bools
    private bool shooting, readyToShoot, reloading;

    //refference
    public Text AmmoText;
    public Transform FirePoint;
    public GameObject bulletPrefab;

    void Start()
    {
        bulletsLeft = magazineSize;
        readyToShoot = true;
        weaponName = "pistol";
    }

    void Update() {
        AmmoText.text = "Ammo: " + bulletsLeft + " / " + maxAmmo;
        checkInput();

        //WEAPONS FOR TESTING BELOW
        //if (Input.GetKeyDown(KeyCode.Alpha1)) {
        //    gameObject.GetComponent<Weapons>().changeWeapon("pistol");
        //}
        //if (Input.GetKeyDown(KeyCode.Alpha2)) {
        //    gameObject.GetComponent<Weapons>().changeWeapon("heavypistol");
        //}
        //if (Input.GetKeyDown(KeyCode.Alpha3)) {
        //    gameObject.GetComponent<Weapons>().changeWeapon("rifle");
        //}
        //if (Input.GetKeyDown(KeyCode.Alpha4)) {
        //    gameObject.GetComponent<Weapons>().changeWeapon("burstrifle");
        //}
        //if (Input.GetKeyDown(KeyCode.Alpha5)) {
        //    gameObject.GetComponent<Weapons>().changeWeapon("sniper");
        //}
    }

    private void checkInput() {
        if (allowButtonHold) {
            shooting = Input.GetKey(KeyCode.Mouse0);
        } else {
            shooting = Input.GetKeyDown(KeyCode.Mouse0);
        }

        if (Input.GetKeyDown(KeyCode.R) && bulletsLeft < magazineSize && !reloading && maxAmmo > 0) {
            Reload();
        }

        //Shooting
        if (readyToShoot && shooting && !reloading && bulletsLeft > 0) {
            bulletsShot = bulletsPerTap;
            Shoot();
        }

        if(shooting && !reloading && bulletsLeft <= 0 && maxAmmo > 0) {
            Reload();
        }
    }

    private void Shoot() {
        readyToShoot = false;

        Instantiate(bulletPrefab, FirePoint.position, FirePoint.rotation);
        switch (weaponName) {
            case "pistol":
                FindObjectOfType<AudioManager>().PlaySound("PistolShot");
                break;
            case "heavypistol":
                FindObjectOfType<AudioManager>().PlaySound("HeavyPistolShot");
                break;
            case "rifle":
                FindObjectOfType<AudioManager>().PlaySound("RifleShot");
                break;
            case "burstrifle":
                FindObjectOfType<AudioManager>().PlaySound("RifleShot");
                break;
            case "sniper":
                FindObjectOfType<AudioManager>().PlaySound("SniperShot");
                break;
        }

        bulletsLeft--;
        bulletsShot--;

        Invoke("ResetShot", timeBetweenShooting);

        if(bulletsShot > 0 && bulletsLeft > 0) {
            Invoke("Shoot", timeBetweenShots);
        }
    }

    private void Reload() {
        reloading = true;
        FindObjectOfType<AudioManager>().PlaySound("Reload");
        Invoke("ReloadFinished", reloadTime);
    }

    private void ReloadFinished() {
        if(maxAmmo >= magazineSize) {
            maxAmmo -= magazineSize - bulletsLeft;
            bulletsLeft = magazineSize;
        } else {
            if(bulletsLeft == 0) {
                bulletsLeft = maxAmmo;
                maxAmmo = 0;
            } else {
                if(maxAmmo >= (magazineSize - bulletsLeft)) {
                    maxAmmo -= magazineSize - bulletsLeft;
                    bulletsLeft = magazineSize;
                } else {
                    bulletsLeft += maxAmmo;
                    maxAmmo = 0;
                }
            }
        }
        reloading = false;
    }

    private void ResetShot() {
        readyToShoot = true;
    }
}
