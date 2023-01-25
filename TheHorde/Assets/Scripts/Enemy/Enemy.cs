using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.AI;

public class Enemy : MonoBehaviour {
    //[TARGET]
    private Transform target;

    //[SELF]
    public NavMeshAgent agent;

    //[DAMAGE]
    public int damage;

    [SerializeField] float attackRange, timeBetweenAttacks;
    [SerializeField] bool canAttack, readyToAttack;


    //[HEALTH]
    private Health Health;


    void Start()
    {
        target = GameObject.FindGameObjectWithTag("Player").GetComponent<Transform>();

        agent = GetComponent<NavMeshAgent>();
        agent.updateRotation = false;
        agent.updateUpAxis = false;

        readyToAttack = true;
    }

    private void Update() {
        float distance = Vector3.Distance(transform.position, target.transform.position);
        if (distance <= attackRange) {
            canAttack = true;
        } else {
            canAttack = false;
        }

        if (canAttack) {
            attack();
        }

        Vector3 direction = target.transform.position - transform.position;
        float angle = Mathf.Atan2(direction.y, direction.x) * Mathf.Rad2Deg;
        transform.GetComponent<Rigidbody2D>().rotation = angle;
    }

    private void attack() {
        if (readyToAttack) {
            target.GetComponent<Health>().removeHealth(damage);
            readyToAttack = false;
            Invoke("ResetAttack", timeBetweenAttacks);
        }
    }

    private void ResetAttack() {
        readyToAttack = true;
    }

    private void FixedUpdate() {
        agent.SetDestination(target.position);
    }

    private void OnCollisionEnter2D(Collision2D col)
    {
        if (col.gameObject.name == "Player")
        {
            Health.health -= damage;
            Physics2D.IgnoreCollision(target.GetComponent<Collider2D>(), gameObject.GetComponent<Collider2D>());
        }
    }

}
