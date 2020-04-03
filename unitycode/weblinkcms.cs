using UnityEngine;
using System.Collections;

public class weblinkcms : MonoBehaviour
{
    public GameObject gameobjecttorender1;


    Renderer renderer;
    public string url = "http://i313818.hera.fhict.nl/OpenInno/upload/digital-transformation-emea-grillo.png";
    IEnumerator Start()
    {
        using (WWW www = new WWW(url))
        {
            yield return www;
            renderer = gameobjecttorender1.GetComponent<Renderer>();
            renderer.material.mainTexture = www.texture;
        }
    }
}