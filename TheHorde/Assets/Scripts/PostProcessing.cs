using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Rendering.PostProcessing;

public class PostProcessing : MonoBehaviour
{
    public PostProcessVolume volume;
    private Vignette vignette;
    private Bloom bloom;
    [SerializeField] float changesPerSecond, healthChangesPerSecond, healthColor;
    [SerializeField] Health playerHealth;
   
    // Start is called before the first frame update
    void Start()
    {
        volume.profile.TryGetSettings(out vignette);
        vignette.smoothness.value = 0.6f;
        playerHealth = GameObject.FindGameObjectWithTag("Player").GetComponent<Health>();
    }

    // Update is called once per frame
    void Update()
    {
        if (Input.GetKeyDown(KeyCode.Space)){
            vignette.smoothness.value = 1f;
        }
        if(vignette.smoothness.value > 0.6f) {
            vignette.smoothness.value -= changesPerSecond * Time.deltaTime;
        }

        if (playerHealth.health < 20) {
            vignette.color.value = new Color(100, 0, 0);
            healthColor = 100;
        } else {
            if (healthColor > 0) {
                healthColor -= healthChangesPerSecond * Time.deltaTime;
            }
            vignette.color.value = new Color(healthColor, 0, 0);
        }

    }
}
