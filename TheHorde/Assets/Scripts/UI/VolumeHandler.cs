using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Audio;
using UnityEngine.UI;

public class VolumeHandler : MonoBehaviour
{
    public AudioMixer mixer;
    public string groupName;

    private void Start() {
        gameObject.GetComponent<Slider>().value = PlayerPrefs.GetFloat("Volume_" + groupName, gameObject.GetComponent<Slider>().value);
    }

    private void OnDisable() {
        PlayerPrefs.SetFloat("Volume_" + groupName, gameObject.GetComponent<Slider>().value);
    }

    public void SetLevel(float sliderValue) {
        mixer.SetFloat(groupName, Mathf.Log10(sliderValue) * 20);
        PlayerPrefs.SetFloat("Volume_" + groupName, gameObject.GetComponent<Slider>().value);
    }
}
