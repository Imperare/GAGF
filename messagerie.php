<?php
if (!isset($_COOKIE["log"]))
	header("Location: index.php");
?>

<?php 
$css = "style/messagerie.css";
include('include/header.php'); 
include ('include/main.php');

function WriteLine($name, $title, $date, $read)
{
	echo "  <tr>\n";
	echo "   <td>$name</td>\n";
	echo $read == true 
			? "   <td><a href=\"#\" class=\"read\">$title</a></td>\n"
			: "   <td><a href=\"#\" >$title</a></td>\n";;
	echo "   <td>$date</td>\n";
	echo "  </tr>\n";
}
$mail_login = DecryptCookieMail($_COOKIE['log']);
?>

<table class="responstable" >
  
  <tbody><tr>
    <th width="400">Destinataire</th>
    <th>Sujet</th>
    <th width="300">Date</th>
  </tr>
  
  <?php 
  $personnalID = $bdd->GetUtilisateurData($mail_login)['UTILISATEUR_ID'];
  $conversations = $bdd->GetConversations($mail_login);
  print_r($conversations);
  
  WriteLine("Pauline Kim", "Demande de fijrebg", "01/01/1978", true); 
  WriteLine("Steffie Jayzy", "Question à propos du rehgbiuhb", "01/01/1978", false); 
  WriteLine("Emma Watson", "Un autographe svp", "01/01/1978", false); ?>
  
</tbody></table>


<div style="margin-top:100px">
			<div class="container">
				<div class="panel panel-default" style="margin:0 auto">
					<div class="panel-heading">
						<h2 class="panel-title">Nouveau message</h2>
					</div>
					<div class="panel-body">
						<form name="contactform" method="post" action="create_conversation.php" class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputEmail1" class="col-lg-2 control-label">Destinataire du message</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputEmail" name="mail" required="required" placeholder="Ajoutez un email">
								</div>
							</div>
							<div class="form-group">
								<label for="inputSubject" class="col-lg-2 control-label">Sujet du message</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputSubject" name="sujet" required="required" placeholder="Sujet du message">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword1" class="col-lg-2 control-label">Rédigez votre message</label>
								<div class="col-lg-10">
									<textarea class="form-control" rows="4" id="inputMessage" name="message" required="required" placeholder="Votre message"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-color-text--white" type="submit" value="Envoyer" data-upgraded=",MaterialButton,MaterialRipple"></input>
								</div>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>

<?php include('include/footer.php'); ?>