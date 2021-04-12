<section>
    <div class="demi"></div>
    <form action="index.php?page=ActionConnexion" method="post">

        <div class="info centre colonne">

                <label class="info" for="emailUser">Adresse E-mail :</label>
                <input id="email" type="text" name="emailUser" required pattern="^[0-9a-zA-Z._-]+@{1}[0-9a-zA-Z.-]{2,}[.]{1}[a-z]{2,6}$"/>
        </div>


        <div class="info centre colonne">

                <label class="info" for="mdpUser">Mot de passe :</label>
                <input id="mdp" type="password" name="mdpUser" required />
        </div>
        <div class="espaceHor"></div>
        <button id="submit" class="bouton" type="submit" disabled >Valider</button>
        <div>
                <div class="info center">
                    <div class="erreur"></div>
                </div>
        </div>
    </form>
    <div class="demi"></div>
</section>