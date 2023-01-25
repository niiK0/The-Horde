using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class UseChest : MonoBehaviour
{

    [SerializeField] bool boxMessageBool, boxAvailable;
    [SerializeField] Text boxMessage;
    [SerializeField] int boxUseCost = 500;
    [SerializeField] float useTime;
    [SerializeField] string[] weaponsAvailable;

    [SerializeField] GameObject useEffect;
    private GameObject generatedEffect;

    void Start()
    {
        boxMessage.gameObject.SetActive(false);
        boxAvailable = true;       
    }

    void Update()
    {
        if (Input.GetKeyDown(KeyCode.F)) {
            if (boxMessageBool) {
                if (boxAvailable) {
                    generateWeapon();
                } else {
                    Debug.Log("Box is already being used.");
                }
            }
        }
    }

    private void generateWeapon() {
        int playerMoney = FindObjectOfType<GameManager>().money;
        if(playerMoney >= boxUseCost) {
            FindObjectOfType<GameManager>().removeMoney(boxUseCost);
            boxAvailable = false;
            generatedEffect = Instantiate(useEffect, transform.position, Quaternion.identity);
            Invoke("giveGeneratedWeapon", useTime);
        } else {
            boxAvailable = true;
            Debug.Log("Not enough money");
        }
    }

    private void giveGeneratedWeapon() {
        string weaponGenerated = weaponsAvailable[Random.Range(0, 5)];
        GameObject.FindGameObjectWithTag("Player").GetComponent<Weapons>().changeWeapon(weaponGenerated);
        Destroy(generatedEffect);
        boxAvailable = true;
    }

    private void OnTriggerEnter2D(Collider2D collision) {
        if (collision.CompareTag("Player")) {
            if (!boxMessageBool) {
                boxMessageBool = true;
                boxMessage.gameObject.SetActive(true);
            }
        }
    }

    private void OnTriggerExit2D(Collider2D collision) {
        if (collision.CompareTag("Player")) {
            if (boxMessageBool) {
                boxMessageBool = false;
                boxMessage.gameObject.SetActive(false);
            }
        }
    }
}
