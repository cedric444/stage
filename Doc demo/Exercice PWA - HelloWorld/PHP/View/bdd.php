<div id="container">
  <div id="content">
  <p><a href="index.php?a=home">retour à l'accueil</a></p>

    <div class="bloc">
      <h1>Requêtes PHP - SQL (serveur)</h1>
      <?php
      $list = UserManager::getList();
      foreach ($list as $person) {
          echo '<br />Client numéro ' . $person->getIdUser() . ' - ' . $person->getNom() . ' ' 
          . $person->getPrenom() . '<br />';

          $expenses = ExpenseManager::getListbyUser($person->getIdUser());
          if ($expenses == null)
            echo 'Pas de dépenses<br />';
          else {
            foreach ($expenses as $expense) {
              echo '<span>- Dépense numéro ' . $expense->getIdExpense() . ' d\'une valeur de ' . 
              $expense->getSum() . ' € <a class="classOnlyOnline" href="index.php?a=actExpense&m=2&id='. $expense->getIdExpense() .'">(suppr.)</a></span><br />';
            }
          }
      }
      ?>
    </div>

    <div class="bloc">
      <h1>Ajouter données</h1>
      <form action="index.php?a=actExpense&m=1" method="post">
        <label for="idUser">ID User</label>
        <input type="number" min="1" max="3" name="idUser" id="idUser" required>
        <label for="sum">Dépense</label>
        <input type="number" name="sum" id="sum" required>
        <input id="buttonOnlyOnline" type=submit value="Envoyer les données">
      </form>
    </div>

  </div>
</div>