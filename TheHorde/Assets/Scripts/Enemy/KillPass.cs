using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class KillPass : MonoBehaviour
{
    [SerializeField] GameObject SpawnBot;
    public int health = 5;

    private GameObject player;
    private GameObject spawner;

    [SerializeField] Color damageColor;
    private Color normalColor;

    [SerializeField] GameObject damageEffect, ammoBox;

    private void Start() {
        player = GameObject.FindGameObjectWithTag("Player");
        spawner = GameObject.FindGameObjectWithTag("Spawner");
        normalColor = gameObject.GetComponent<SpriteRenderer>().color;
    }

    private void OnTriggerEnter2D(Collider2D col){
        if (col.CompareTag("Bullet") || (col.CompareTag("Sword"))){
            StartCoroutine(damageColorChange());
            Instantiate(damageEffect, transform.position, transform.rotation);
            if (col.CompareTag("Bullet")) {
                Destroy(col.gameObject);
                health -= player.GetComponent<Weapon>().damage;
            } else {
                //REMOVE SWORD MULTIPLE HIT BUG
                col.GetComponent<Collider2D>().enabled = false;
                health -= 3;
            }

            if (health <= 0){
                const float m_dropChance = 2f / 10f;
                if (Random.Range(0f, 1f) <= m_dropChance) {
                    Instantiate(ammoBox, transform.position, Quaternion.identity);
                }
                Destroy(SpawnBot);
                GameManager addScore = FindObjectOfType<GameManager>();
                FindObjectOfType<AudioManager>().PlaySound("KillEnemy");
                switch (SpawnBot.tag) {
                    case "Zombie":
                        addScore.addScoreOnKill("zombie", 1);
                        spawner.GetComponent<SpawnEnemy>().removeOneEnemeyAlive(0);
                        break;
                    case "Reinforced":
                        addScore.addScoreOnKill("reinforced", 1);
                        spawner.GetComponent<SpawnEnemy>().removeOneEnemeyAlive(1);
                        break;
                    case "Devil":
                        addScore.addScoreOnKill("devil", 1);
                        spawner.GetComponent<SpawnEnemy>().removeOneEnemeyAlive(2);
                        break;
                    case "Boss":
                        addScore.addScoreOnKill("boss", 1);
                        spawner.GetComponent<SpawnEnemy>().removeOneEnemeyAlive(3);
                        break;
                }
            } else {
                FindObjectOfType<AudioManager>().PlaySound("DamageEnemy");
            }

        }
    }

    IEnumerator damageColorChange() {
        var mobSpriteRenderer = gameObject.GetComponent<SpriteRenderer>();
        mobSpriteRenderer.color = damageColor;
        yield return new WaitForSeconds(0.1f);
        mobSpriteRenderer.color = normalColor;
    }
}
