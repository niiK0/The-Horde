using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class SpawnEnemy : MonoBehaviour {

    //[DIFFRENT TYPES OF MOBS]
    [SerializeField] GameObject zombie, reinforced, devil, boss;

    //[ENEMY TYPE AND LOCATION]
    private GameObject whichEnemy;
    public Transform[] spLocation;
    private Vector2[] spawnPoint;
    private int spawnLocation;

    //[SPAWNING]
    public float spawnRate = 2f;
    private float nextSpawn = 0.0f;

    //[ROUNDS]
    public int currentRound;
    private int nextRound;

    //[MOBS PER ROUND]
    [SerializeField] int totalRoundMobs, totalRoundMobsRemaining, totalMobsSpawned, totalPresentMobs;

    [SerializeField] int[] totalMobTypes, totalMobTypesRemaining, totalMobTypesSpawned, totalPresentMobTypes;

    private bool lastMob = false;

    public int maxMobsSpawned;

    //[BOSS ROUND]
    private bool bossRound = false;
    private bool bossDead = true;
    public Transform bossSP;

    [SerializeField] Text roundText;

    private void Awake() {
        SpawnEnemy[] ops = GameObject.FindObjectsOfType<SpawnEnemy>();
        if (ops.Length > 1) {
            Destroy(this.gameObject);
        }

        DontDestroyOnLoad(this.gameObject);
    }

    void Start()
    {
        //[FIRST ROUND CHANGES]

        //round swap
        currentRound = 1;
        roundText.text = "Round: " + currentRound;
        nextRound = currentRound + 1;

        //mob amount
        totalRoundMobs = 4;
        totalRoundMobsRemaining = totalRoundMobs;
        totalMobsSpawned = 0;
        totalPresentMobs = 0;

        //mob types
        totalMobTypes = new int[] { 3, 1, 0, 0 };
        totalMobTypesRemaining = totalMobTypes;
        totalMobTypesSpawned = new int[] { 0, 0, 0, 0 };
        totalPresentMobTypes = new int[] { 0, 0, 0, 0 };
        //--

        //[SPAWNPOINTS]
        spawnPoint = new Vector2[3] {
            new Vector2(spLocation[0].transform.position.x, spLocation[0].transform.position.y),
            new Vector2(spLocation[1].transform.position.x, spLocation[1].transform.position.y),
            new Vector2(spLocation[2].transform.position.x, spLocation[2].transform.position.y),
        };
    }

    void Update()
    {
        //[NEW ROUND RESETS]
        if (totalRoundMobsRemaining <= 0 && bossDead == true) {
            //round
            currentRound++;
            roundText.text = "Round: " + currentRound;
            nextRound = currentRound + 1;
                
            //mob amount
            if(currentRound % 3 != 0) {
                totalRoundMobs = 4 * currentRound;
            } else {
                totalRoundMobs = (4 * currentRound) + 1;
            }
            totalRoundMobsRemaining = totalRoundMobs;
            totalMobsSpawned = 0;
            totalPresentMobs = 0;

            //mob types
            totalMobTypes = new int[4] {
                    Mathf.RoundToInt(totalRoundMobs * 0.7f), //zombies
                    Mathf.CeilToInt(totalRoundMobs * 0.25f), //reinforced
                    0,
                    0
            };

            float devilsAmount = totalRoundMobs % (totalMobTypes[0] + totalMobTypes[1]);

            totalMobTypes[2] = Mathf.CeilToInt(devilsAmount); //devils

            if (currentRound % 3 != 0) { //boss
                bossRound = false;
                bossDead = true;
            } else {
                totalMobTypes[3] = 1;
                bossRound = true;
                bossDead = false;
                FindObjectOfType<AudioManager>().PlaySound("BossRound");
            }

            totalMobTypesRemaining = totalMobTypes;
            totalMobTypesSpawned = new int[] { 0, 0, 0, 0};
            totalPresentMobTypes = new int[] { 0, 0, 0, 0};

            lastMob = false;
        }
        //--

        //[LAST MOB]
        if(totalRoundMobsRemaining == 1 && bossRound == false && bossDead == true) {
            lastMob = true;
        }
        //--

        //[MOBS SPAWNS]
        if (Time.time > nextSpawn && totalMobsSpawned < totalRoundMobs && totalPresentMobs < maxMobsSpawned) {
            nextSpawn = Time.time + spawnRate;

            int spawnLocation = Random.Range(0,3);

            int mobAmount = Random.Range(1, totalMobTypesRemaining[0] + totalMobTypesRemaining[1] + totalMobTypesRemaining[2]);

            if (mobAmount > 0 && mobAmount <= totalMobTypesRemaining[0]) {
                Instantiate(zombie, spawnPoint[spawnLocation], Quaternion.identity);
                totalMobTypesRemaining[0]--;
                totalMobTypesSpawned[0]++;
                totalPresentMobTypes[0]++;
            } else if (mobAmount <= totalMobTypesRemaining[0] + totalMobTypesRemaining[1]) {
                Instantiate(reinforced, spawnPoint[spawnLocation], Quaternion.identity);
                totalMobTypesRemaining[1]--;
                totalMobTypesSpawned[1]++;
                totalPresentMobTypes[1]++;
            } else if (mobAmount <= totalMobTypesRemaining[0] + totalMobTypesRemaining[1] + totalMobTypesRemaining[2]) {
                Instantiate(devil, spawnPoint[spawnLocation], Quaternion.identity);
                totalMobTypesRemaining[2]--;
                totalMobTypesSpawned[2]++;
                totalPresentMobTypes[2]++;
            }

            if(bossRound == true && totalMobTypesRemaining[3] > 0) {
                int bossSpawnChance = Random.Range(0, 101);

                if (bossSpawnChance <= 20 || totalMobTypesRemaining[0] + totalMobTypesRemaining[1] + totalMobTypesRemaining[2] == 0) {
                    Instantiate(boss, new Vector2(bossSP.transform.position.x, bossSP.transform.position.y), Quaternion.identity);
                    totalMobTypesRemaining[3]--;
                    totalMobTypesSpawned[3]++;
                    totalPresentMobTypes[3]++;
                }
            }

            totalMobsSpawned++;
            totalPresentMobs++;
        }
        //--
    }

    public void removeOneEnemeyAlive(int typeId) {
        if (typeId != 3) {
            totalRoundMobsRemaining -= 1;
            totalPresentMobs -= 1;
            totalPresentMobTypes[typeId] -= 1;
        } else {
            bossDead = true;
            totalRoundMobsRemaining -= 1;
            totalPresentMobs -= 1;
            totalPresentMobTypes[typeId] -= 1;
        }
    }
}