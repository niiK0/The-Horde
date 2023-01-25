using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class PlayerController : MonoBehaviour
{
    [SerializeField] public float speed;
    [SerializeField] float dspeed;

    [SerializeField] bool dash = false;

    [SerializeField] Rigidbody2D rb;
    [SerializeField] Vector2 moveVelocity;
    [SerializeField] Vector2 dashVelocity;

    [SerializeField] Vector3 moveInput;
    [SerializeField] LayerMask dashLayerMask;
    [SerializeField] GameObject dashEffect;

    [SerializeField] float manaD;
    [SerializeField] public float mana;
    [SerializeField] int manaPerDash;
    [SerializeField] int manaRegen;

    [SerializeField] Text manaText;

    void Start(){
        rb = GetComponent<Rigidbody2D>();
        mana = manaD;
    }

    void Update()
    {
        if (mana <= manaD) {
            mana += manaRegen * Time.deltaTime;
            manaText.text = "Mana: " + Mathf.Floor(mana) + " / " + manaD;
        } 
        moveInput = new Vector3(Input.GetAxisRaw("Horizontal"), Input.GetAxisRaw("Vertical")).normalized;
        moveVelocity = moveInput * speed;
        dashVelocity = moveInput * dspeed;
        if (Input.GetButtonDown("Jump"))
        {
            if (mana >= manaPerDash) {
                dash = true;
                mana -= manaPerDash;
            }
            else{
                print("No Mana!");
            }
        }
    }

    void FixedUpdate(){
        rb.MovePosition(rb.position + moveVelocity * Time.fixedDeltaTime);
        if(dash){
            Vector3 afterDashPosition = transform.position + moveInput * dspeed;
            RaycastHit2D raycastHit2D = Physics2D.Raycast(transform.position, moveInput, dspeed, dashLayerMask);
            if(raycastHit2D.collider != null) {
                afterDashPosition = raycastHit2D.point;
            }
            StartCoroutine(dashEffectCall());
            rb.MovePosition(transform.position + moveInput * dspeed);
            dash = false;
        }
    }

    IEnumerator dashEffectCall() {
        GameObject dashEffectI = Instantiate(dashEffect, new Vector3(transform.position.x, transform.position.y, 0), Quaternion.identity);
        FindObjectOfType<AudioManager>().PlaySound("Dash");
        yield return new WaitForSeconds(1f);
        Destroy(dashEffectI);
    }
}
