if ("serviceWorker" in navigator)
{
    navigator.serviceWorker.register("./Sw.js").then(registration => {
        // On a réussi ! Youpi !
        console.log(
          "App: Achievement unlocked."
        );
    });
    console.log("toto");
}
