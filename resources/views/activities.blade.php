
@extends('layouts.app2')
@section('content')
 
  <div class="p-3 mb-4 bg-light rounded-3">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="3000">
            <img src="{{asset('img/medoc.jpg')}}" class="img-fluid" alt="image de médicaments">
            <div class="carousel-caption d-none d-md-block">
              <h5>Ghef_Site de Meaux</h5>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="{{asset('img/medoc2.jpg')}}" class="img-fluid" alt="image de médicaments">
            <div class="carousel-caption d-none d-md-block">
              <h5>Ghef_Site de Meaux</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{asset('img/medoc3.jpg')}}" class="img-fluid" alt="image de médicaments">
            <div class="carousel-caption d-none d-md-block">
              <h5>Ghef_Site de Meaux</h5>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </div>
  <div class="container">
      <h1 class="text-center text-primary">Les Missions</h1>
      <p>I.-Les pharmacies à usage intérieur répondent aux besoins pharmaceutiques des personnes prises en charge par l'établissement, service ou organisme dont elles relèvent, ou au sein d'un groupement hospitalier de territoire ou d'un groupement de coopération sanitaire dans lequel elles ont été constituées. A ce titre, elles ont pour missions :</p>
        <ol>
            <li> D'assurer la gestion, l'approvisionnement, la vérification des dispositifs de sécurité, la préparation, le contrôle, la détention, l'évaluation et la dispensation des médicaments, produits ou objets mentionnés à l'article L. 4211-1, des dispositifs médicaux stériles et des médicaments expérimentaux ou auxiliaires définis à l'article L. 5121-1-1, et d'en assurer la qualité ;</li>
            <li>De mener toute action de pharmacie clinique, à savoir de contribuer à la sécurisation, à la pertinence et à l'efficience du recours aux produits de santé mentionnés au 1° et de concourir à la qualité des soins, en collaboration avec les autres membres de l'équipe de soins mentionnée à l'article L. 1110-12, et en y associant le patient ;</li>
            <li> D'entreprendre toute action d'information aux patients et aux professionnels de santé sur les produits de santé mentionnés au 1°, ainsi que toute action de promotion et d'évaluation de leur bon usage, et de concourir à la pharmacovigilance, à la matériovigilance, et à la politique du médicament et des dispositifs médicaux stériles mentionnée à l'article L. 6111-2 ;</li>
            <li>S'agissant des pharmacies à usage intérieur des établissements publics de santé, d'exercer les missions d'approvisionnement et de vente en cas d'urgence ou de nécessité mentionnées à l'article L. 5126-8 ;</li>
            <li>Pour des pathologies dont la liste est fixée par arrêté, de renouveler les prescriptions des patients pris en charge par l'établissement et de les adapter, dans le respect d'un protocole mentionné à l'article L. 4011-4 ;</li>
        </ol>
        <h2 class="text-center text-primary ">L'organisation de la pharmacie en unités pharmaceutiques</h1>
      
  </div>

<!-- tableau des activités--->
<div class="container">

    <div class="card mt-5" id="card-tab">
        <div class="card-body text-center" id="tab">
           UP MEDICAMENTS
        </div>
      </div>
    
    <table class="table table-hover">
        <tbody>
            <tr>
                <th scope="row">Responsable</th>
                <td>Mohamed DIALLO</td>
            </tr>
            <tr>
                <th scope="row">Automatisation/PDA</th>
                <td>Laurence PELAMOURGUES</td>
            </tr>
            <tr>
                <th scope="row">Stupéfiants/T2A</th>
                <td>Sylvie DJOUSSA</td>
            </tr>
            <tr>
                <th scope="row">Rétrocession</th>
                <td>Souad BOUTOUIL</td>
            </tr>
            <tr>
                <th scope="row">Economie de la Santé et pharmacovigilance</th>
                <td>Mohamed DIALLO</td>
            </tr>
        </tbody>
            
    </table>

    <div class="card" id="card-tab">
        <div class="card-body text-center" id="tab">
           UP/LOGISTIQUE/APPROVISIONNEMENT
        </div>
      </div>
    
    <table class="table table-hover" >
        <tbody>
            <tr>
                <th scope="row">Responsable</th>
                <td>Sylvie DJOUSSA</td>
            </tr>
            <tr>
                <th scope="row">Pharmacie clinique/Conciliation</th>
                <td>Julien POTIER</td>
            </tr>
            <tr>
                <th scope="row">Essais Cliniques</th>
                <td>Honoré MABIALA</td>
            </tr>
        </tbody>
    </table>
        <div class="card" id="card-tab">
            <div class="card-body text-center" id="tab">
            UP DMS/DMI
            </div>
        </div>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th scope="row">Responsable</th>
                    <td>Frédérique BOIVIN</td>
                </tr>
                <tr>
                    <th scope="row">Marchés et liquidation des factures</th>
                    <td>Frédérique BOIVIN</td>
                </tr>
                <tr>
                    <th scope="row">Matériovigilance</th>
                    <td>Frédérique BOIVIN</td>
                </tr>
            </tbody>
        </table>
        <div class="card"  id="card-tab" >
            <div class="card-body text-center" id="tab">
            UP STERILISATION
            </div>
        </div>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th scope="row">Responsable GHEF</th>
                    <td>Napoléon TUYINDI</td>
                </tr>
                <tr>
                    <th scope="row">Responsable site</th>
                    <td>A.SOLA</td>
                </tr>
            </tbody>
        </table>
       
        <div class="card"  id="card-tab">
            <div class="card-body text-center" id="tab">
            UP SUPPORT ET SI
            </div>
        </div>
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th scope="row">Responsable</th>
                    <td>Sylvie DJOUSSA</td>
                </tr> 
            </tbody>
        </table>

@endsection