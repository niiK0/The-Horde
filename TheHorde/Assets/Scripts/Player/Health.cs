using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class Health : MonoBehaviour
{

    [SerializeField] public float healthD, health;
    [SerializeField] int lifeRegen;
    [SerializeField] Text hpText;

    [SerializeField] GameObject deathUI;
    [SerializeField] bool isDead;

    [SerializeField] Text endRound, endScore, endMoney;

    // Start is called before the first frame update
    void Start()
    {
        health = healthD;
        deathUI.SetActive(false);
    }

    // Update is called once per frame
    void Update()
    {
        if (health <= healthD)
        {
            health += lifeRegen * Time.deltaTime;
            hpText.text = "Health: " + Mathf.Floor(health) + " / " + healthD;
        }

        if(health <= 0 && !isDead) {
            isDead = true;
            Time.timeScale = 0.0f;
            deathUI.SetActive(true);
            endRound.text = "Round: " + FindObjectOfType<SpawnEnemy>().currentRound;
            endScore.text = "Score: " + FindObjectOfType<GameManager>().score;
            endMoney.text = "Money: " + FindObjectOfType<GameManager>().money;
        }
    }

    public void LeaveGame() {
        Destroy(FindObjectOfType<GameManager>().gameObject);
        Destroy(FindObjectOfType<SpawnEnemy>().gameObject);
        Time.timeScale = 1f;
        SceneManager.LoadScene(0);
    }

    public void removeHealth(int value) {
        health -= value;
        FindObjectOfType<AudioManager>().PlaySound("GetHit");
    }

}
