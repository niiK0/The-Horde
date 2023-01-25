using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class LoadingScreen : MonoBehaviour
{
    private void Start() {
        Invoke("DisableOtherUI", 0.5f);
    }

    private void DisableOtherUI() {
        GameObject.Find("OptionsMenu").SetActive(false);
        gameObject.SetActive(false);
    }
}
