<div class="container text-center">
	<div class="row">
		<div class="col-sm-12">
			<h1>Jeu du pendu</h1>
		</div>
	</div>
	<div class="penduDecoMilieu" id="partiePendu">
		<div class="row">
			<?php if(isset($dejaJoue)) { echo $dejaJoue; } ?>
			<div class="col-sm-6">
				<img src="assets/img/pendu<?php echo $_SESSION['nbErreurs']; ?>.gif" width="200px" height="200px" />
			</div>
			<span class="disparuBr"><br/></span>
			<div class="col-sm-6">
				<div class="partieRightPosi">
					<span class="MotAfficherCSS"><?= $_SESSION['motAAfficher']; ?></span><br/>
					<span class=""><?= $comError; ?></span><br/>	
					<span class=""><?= $_SESSION['lettreErreur']; ?></span>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<FORM action="" method="POST">
					Votre proposition (1 caractère) ? <INPUT class="propoBtn form-control" type="text" name="eProp" size="1" maxlength="1"  required autofocus />
					<span class="disparuBr"><br/><br/></span>		
					<INPUT class="btn" type="submit" name="bValider" value="Proposer" />
				</FORM>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<FORM action="pendu" method="POST">
					<INPUT class="btn" type="submit" name="<?= $_SESSION['rejouer'];?>" value="Recommencer la partie" />
				</FORM>
			</div>
			<span class="disparuBr"><br/></span>
			<div class="col-sm-6">
				<FORM action="pendu" method="POST">
					<INPUT class="btn" type="submit" name="bAleae" value="Revenir au menu principal" />
				</FORM>
				<a class="stylePopUp" title="Réglement" href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle"></i></a>
			</div>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
   










	 





