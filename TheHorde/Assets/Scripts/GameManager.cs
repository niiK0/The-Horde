using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class GameManager : MonoBehaviour
{
    //TIME
    [SerializeField] float gameTime;
    [SerializeField] Text gameTimeText;

    //SCORE
    [SerializeField] public int score = 0, dScore = 0;
    [SerializeField] Text scoreText;

    //MONEY
    public int money = 0, lastMoney = 0;
    [SerializeField] Text moneyText;

    //PAUSE
    [SerializeField] bool isPaused;
    [SerializeField] GameObject pauseUI;

    private void Awake() {
        GameManager[] ops = GameObject.FindObjectsOfType<GameManager>();
        if (ops.Length > 1) {
            Destroy(this.gameObject);
        }

        DontDestroyOnLoad(this.gameObject);
    }

    void Start() {
        score = 0;
        money = 0;
        gameTimeText.text = "Time Survive: 0";

        pauseUI.SetActive(false);
    }

    void Update() {

        if(SceneManager.GetActiveScene().buildIndex == 0) {
            Destroy(this.gameObject);
            return;
        }

        if (Input.GetKeyDown(KeyCode.Escape) && isPaused) {
            Time.timeScale = 1;
            isPaused = false;
            pauseUI.SetActive(false);
        } else if(Input.GetKeyDown(KeyCode.Escape) && !isPaused) {
            Time.timeScale = 0;
            isPaused = true;
            pauseUI.SetActive(true);
        }

        matchTime();
        if(lastMoney != money) {
            lastMoney = money;
            moneyText.text = "" + lastMoney;
        }
    }

    public void ContinueGame() {
        Time.timeScale = 1;
        isPaused = false;
        pauseUI.SetActive(false);
    }

    public void LeaveGame() {
        Destroy(gameObject);
        Destroy(FindObjectOfType<SpawnEnemy>().gameObject);
        SceneManager.LoadScene(0);
        Time.timeScale = 1f;
        return;
    }

    private void matchTime() {
        gameTime += Time.deltaTime;
        gameTimeText.text = "Time Survived: " + Mathf.Floor(gameTime) + " Seconds";
    }

    public void removeMoney(int value) {
        money -= value;
    }

    public void addScoreOnKill(string enemyType, int scoreToAdd) {
        switch (enemyType) {
            case "zombie":
                money += 25;
                break;
            case "reinforced":
                money += 35;
                break;
            case "devil":
                money += 50;
                break;
            case "boss":
                money += 150;
                break;
        }
        score += scoreToAdd;
        scoreText.text = "Score: " + score;
    }
}
