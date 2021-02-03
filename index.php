
<?php

  // How to connect database : MySQLi & PDO (PHP DATA Objects)
  include('config/db_connect.php');

  // Write query for all pizzas
  $sql = "SELECT title, ingredients, id FROM pizzas ORDER BY created_at";
  // Make query & Get results
  $results = mysqli_query($conn, $sql);
  
  // fetch the resulting rows as an associated array
  $pizzas = mysqli_fetch_all($results, MYSQLI_ASSOC);

  // Free results from memory : not to hang on to the results
  mysqli_free_result($results);

  // Close Connectin
  mysqli_close($conn);


  // (experiments : )
  // print_r(explode(',', $pizzas[0]['ingredients']))
  // print_r($pizzas);

?>

<!DOCTYPE html>
<html lang="en">
  <!-- header -->
  <?php include('./templates/header.php') ;?>

  <h4 class="center grey-text">PIZZA 🍕🍕🍕</h4>
  <div class="container">
    <div class="row">

      <?php foreach( $pizzas as $pizza ) : ?>
      
        <div class="col s6 md3">
          <div class="card zz-depth-0">

            <img src="img/pizza.svg"  alt="pizza image" class="pizza">

            <div class="card-content center">
              <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
              <ul>
                <?php foreach( explode(',', $pizza['ingredients']) as $ing ) : ?>
                  <li><?php echo htmlspecialchars($ing) ; ?></li>
                <?php endforeach ; ?>
              </ul>
            </div>
            <div class="card-action right-align">
              <a href="details.php?id=<?php echo $pizza['id'] ;?>" class="brand-text">More Info 💁‍♀️💁🏻‍♂️</a>
            </div>
          </div>
        </div>

      <?php endforeach ; ?>

    </div>
  </div>
    
  <!-- footer -->
  <?php include('./templates/footer.php') ;?>
</html>