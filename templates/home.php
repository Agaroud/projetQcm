<?php
session_start();
?>

<?php
$this->title = "Accueil";
?>

  <header>
    <div class="entete">
        <h1 >QCM  prévention et sécurité incendie</h1>
        <h3 >(Attention : pour chaque question, vous devez donner <strong>la</strong> ou <strong>les</strong> réponses  </h3>
    </div>
        <?php
			if(isset($_SESSION['envoi_form'])) {
    		echo '<p class="notification">'.$_SESSION['envoi_form'].'</p>';
    		unset($_SESSION['envoi_form']);
            }
            
            if(isset($_SESSION['manque_reponse'])) {
                echo '<p class="notification">'.$_SESSION['manque_reponse'].'</p>';
                unset($_SESSION['manque_reponse']);
            }
        ?>         
  </header>  
  <section>
  	<!-- <form method="post" action="../public/index.php?route=cocherChoix"> -->
  	
        <?php       
        foreach ($questions as $question)
        {
        ?>
            <div class="questions">
                <h2><?= htmlspecialchars_decode($question->getTheme());?></h2>                
                <h3><?= htmlspecialchars_decode($question->getSujet());?></h3>
                <?php 
                /*foreach ($propositions as $proposition)
        		{*/
        		?>
        			<!-- <div class="propositions">      			
        			
        				<input type="checkbox" name="title" value="<?= htmlspecialchars_decode($proposition->getChoix());?>"><br>
        		<?php
                }        
                ?>  	      	     
            		</div>  		                
            </div>
            <br>
        <?php
        }        
        ?>
        <input type="submit" value="Envoyer" id="submit" name="submit">	
  	</form>   
  </section>
    
