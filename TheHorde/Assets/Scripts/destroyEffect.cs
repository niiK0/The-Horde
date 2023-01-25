using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class destroyEffect : MonoBehaviour
{
    private void Start() {
        StartCoroutine(destroyEffectC());
    }

    IEnumerator destroyEffectC(){
        yield return new WaitForSeconds(1);
        Destroy(this.gameObject);
    }
}
