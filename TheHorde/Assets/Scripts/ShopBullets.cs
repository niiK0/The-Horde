using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class ShopBullets : MonoBehaviour
{
    [SerializeField] bool buyMessageBool;
    [SerializeField] Text buyMessage;
    [SerializeField] int buyPrice = 500;

    private void Start() {
        buyMessage.gameObject.SetActive(false);
    }

    private void OnTriggerEnter2D(Collider2D collision) {
        if (collision.CompareTag("Player")) {
            buyMessageBool = true;
            buyMessage.gameObject.SetActive(true);
        }
    }

    private void OnTriggerExit2D(Collider2D collision) {
        if (collision.CompareTag("Player")) {
            buyMessageBool = false;
            buyMessage.gameObject.SetActive(false);
        }
    }

    private void Update() {
        if (Input.GetKeyDown(KeyCode.F)) {
            if (buyMessageBool) {
                int playerMoney = FindObjectOfType<GameManager>().money;
                if (playerMoney >= buyPrice) {
                    FindObjectOfType<GameManager>().removeMoney(buyPrice);
                    var currentWeapon = GameObject.FindGameObjectWithTag("Player").GetComponent<Weapon>();
                    currentWeapon.maxAmmo += currentWeapon.magazineSize;
                } else {
                    Debug.Log("Not enough money");
                }
            }
        }
    }
}
