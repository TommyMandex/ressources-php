<div class="container text-center">
	<div class="row">
		<div class="col-sm-12">
			<h1>Jeu du pendu</h1>
		</div>
	</div>
	<div class="penduDecoMilieu" id="partiePendu">
		<div class="row">
			<div class="col-sm-12">
				<?= $fini; ?>
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