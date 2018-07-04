<?php 
    $page_title='Notre équipe | soutien et accompagnement scolaire';
    include('includes/header.php'); 
?>
	<section class="title-section">
		<div class="container">
		        <div class="row">
	                        <center>
					<h2 class="text-uppercase">Notre équipe </h2>
	                        </center>
		        </div>        
		</div>
	</section>
	<br>
	<section>
		<div class="container">
			<div class="row">
<center>
				<div class="col-md-12 col-sm-6">
					<div class="team-member">
						<div class="team-img">
							<img src="/style/img/kevin.png" alt="team member" class="img-responsive">
						</div>
						<div class="team-hover">
							<div class="desk">
								<h4>Social</h4>
								<p>Passionné des marchés financiers, de big data, de Basketball, de Scrabble et de géopolitique.</p>
							</div>
							<div class="s-link">
								<a href="https://www.linkedin.com/in/kevin-ga%C3%ABl-tchongouang-yanou-29199aa3/" target="_blank"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
					<div class="team-title">
						<h5>Kevin Gaël Yanou</h5>
						<span>Founder: Shareholder, Chairman & CEO</span><p><p>
						<p>Etudiant en Msc in Management – Programme Grande Ecole à l’<b>EMLYON BUSINESS SCHOOL</b> et en Master de mathématiques appliquées à l’<b>Université Pierre et Marie Curie</b>. Il est titulaire d’un diplôme d’Ingénieur de Conception obtenu avec <b>la mention Très Bien</b> à l’<b>Ecole Nationale Supérieure Polytechnique de Yaoundé</b>. Associé senior chez <strong>INTELLIGENTSIA CORPORATION</strong> de 2009 à 2014. Il s’intéresse aux marchés financiers, à l’éducation et à l’innovation.</p>
					</div>
				</div>
</center>


				<div class="col-md-6 col-sm-9">
					<div class="team-member">
						<div class="team-img">
							<img src="/style/img/deric.png" alt="team member" class="img-responsive">
						</div>
						<div class="team-hover">
							<div class="desk">
								<h4>Social</h4>
								<p>Fort intérêt pour l'économie notamment les secteurs éducation, santé et sport.</p>
							</div>
							<div class="s-link">
								<a href="https://www.linkedin.com/in/joel-kamegni-670513a4/" target="_blank"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>

<div class="team-title">
<h5>Joël Kamegni</h5>
<span>Co-Founder: Shareholder, Partner & CFO</span><p><p>
<p>Etudiant en fin de parcours en Msc in Management – Programme Grande Ecole à l’<b>EMLYON BUSINESS SCHOOL</b>. Il est diplômé de l’<b>Université Catholique d'Afrique Centrale</b> où il a obtenu une licence en Comptabilité et Finances avec la mention <b>Bien</b>. Passionné par l'entrepreneuriat et enthousiaste à l'idée de construire une Afrique riche et prospère, il s'investit dans le développement économique du Cameroun au travers des actions menées dans les domaines de l'éducation et du sport.</p>
</div>
</div>




				<div class="col-md-6 col-sm-6">
					<div class="team-member">
						<div class="team-img">
							<img src="/style/img/new/william.png" alt="team member" class="img-responsive">
						</div>
						<div class="team-hover">
							<div class="desk">
								<h4>Social</h4>
								<p>Ingénieur, très dynamique. S'intéresse à l'économie, l'éducation et à l'industrie. </p>
							</div>
							<div class="s-link">
								<a href="https://www.linkedin.com/in/frank-william-nsongan-biboum-a8a72545/" target="_blank"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
					<div class="team-title">
						<h5>Frank William Biboum</h5>
						<span>COO</span><p><p>
						<p>Ingénieur en génie électrique diplômé de l'<b>Ecole Nationale Supérieure Polytechnique de Yaoundé</b>. Il participe durant tout son cursus étudiant à la planification des opérations chez <strong>INTELLIGENTSIA CORPORATION</strong> où il occupe successivement les  postes de regional manager Littoral, puis de national manager. Après un passage rapide dans l'industrie du cacao, il décide de se lancer dans l'éducation, un domaine qui le passionne depuis toujours. Cultivé et engagé , il s'intéresse à la géostratégie, à l'économie, à l'industrie et à l'éducation.</p>
					</div>
				</div>
					<p class="p-top-30 half-txt">&nbsp;</p>

			</div>

		</div>		
	</section>
    <?php include('includes/footer.php'); ?>
	<style>
	@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic);

body {
    font-family: 'Source Sans Pro', sans-serif;
    color: #323232;
    font-size: 15px;
    font-weight: 400;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-font-smoothing: antialiased;
}
.heading-title {
    margin-bottom: 50px;
}
.text-center {
    text-align: center;
}
.heading-title h3 {
    margin-bottom: 0;
    letter-spacing: 2px;
    font-weight: normal;
}
.p-top-30 {
    padding-top: 30px;
}
.half-txt {
    width: 60%;
    margin: 0 auto;
    display: inline-block;
    line-height: 25px;
    color: #7e7e7e;
}
.text-uppercase {
    text-transform: uppercase;
}

.team-member, .team-member .team-img {
    position: relative;
}
.team-member {
    overflow: hidden;
}
.team-member, .team-member .team-img {
    position: relative;
}

.team-hover {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    margin: 0;
    border: 20px solid rgba(0, 0, 0, 0.1);
    background-color: rgba(255, 255, 255, 0.90);
    opacity: 0;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
}
.team-member:hover .team-hover .desk {
    top: 35%;
}
.team-member:hover .team-hover, .team-member:hover .team-hover .desk, .team-member:hover .team-hover .s-link {
    opacity: 1;
}
.team-hover .desk {
    position: absolute;
    top: 0%;
    width: 100%;
    opacity: 0;
    -webkit-transform: translateY(-55%);
    -ms-transform: translateY(-55%);
    transform: translateY(-55%);
    -webkit-transition: all 0.3s 0.2s;
    transition: all 0.3s 0.2s;
    padding: 0 20px;
}
.desk, .desk h4, .team-hover .s-link a {
    text-align: center;
    color: #222;
}
.team-member:hover .team-hover .s-link {
    bottom: 10%;
}
.team-member:hover .team-hover, .team-member:hover .team-hover .desk, .team-member:hover .team-hover .s-link {
    opacity: 1;
}
.team-hover .s-link {
    position: absolute;
    bottom: 0;
    width: 100%;
    opacity: 0;
    text-align: center;
    -webkit-transform: translateY(45%);
    -ms-transform: translateY(45%);
    transform: translateY(45%);
    -webkit-transition: all 0.3s 0.2s;
    transition: all 0.3s 0.2s;
    font-size: 35px;
}
.desk, .desk h4, .team-hover .s-link a {
    text-align: center;
    color: #222;
}
.team-member .s-link a {
    margin: 0 10px;
    color: #333;
    font-size: 16px;
}
.team-title {
    position: static;
    padding: 20px 0;
    display: inline-block;
    letter-spacing: 2px;
    width: 100%;
}
.team-title h5 {
	font-weight: bold;
    margin-bottom: 0px;
    display: block;
    text-transform: uppercase;
}
.team-title p {
text-align: justify;
font-weight: normal;
font-size: 15px;
}
.breadcrumb{
margin-bottom: 0px;
}
.team-title span {
    font-size: 12px;
    text-transform: uppercase;
    color: #a5a5a5;
    letter-spacing: 1px;
}

	<style>
