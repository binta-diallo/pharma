
  @extends('layouts.app2')

    @section('content')
      <main>
        <section class="py-5 text-center container" id="section1">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="fw-bold">L'équipe du Site de meaux</h1>
            </div>
          </div>
          <div class="row">
            <div class="col md-3">
              <h5 class="text-success fw-bold">Pharmacien Chef de Pôle</h5>
               <h5 class="text-success fw-bold">Pharmacien Gérant</h5>
              <h6>Severine COULON</h6>
              <h5 class="text-success fw-bold" id="top">Adjoint au Chef de pôle</h5>
              <h6>Mohamed DIALLO</h6>
            </div>
            <div class="col md-3">
              <h5 class="text-success fw-bold">Responsable de site</h5>
              <h6>Sylvie DJOUSSA</h6>
            </div>
            <div class="col md-3">
              <h5 class="text-success fw-bold">Encadrement du personnel non médical</h5>
              <h6>Sandra FERNANDES(cadre de pôle)</h6>
              <h5 class="text-success fw-bold" id="top2">Encadrement du personnel non médical(Cadre de Site)</h5>
              <h6>Julien JEAN-BAPTISTE</h6>
            </div>
            <div class="col md-3">
              <h5 class="text-success fw-bold">Direction de pôle</h5>
              <h6>Riad BOUMADANI</h6>
              <h5 class="text-success fw-bold" id="top1">RSMQ</h5>
              <h6>Cathérine CUVELIER</h6>
            </div>
          </div>
        </section>
      
        <div class="album py-5 bg-light">
          <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  @foreach ($pharmaciens as $pharmacien)
                    <div class="col">
                      <div class="card shadow-sm">
                        <img src="{{asset('pharmacien/'.$pharmacien->photo)}}" alt="photo de profil" height="300px" >
                          <div class="card-body">
                            <h4>{{$pharmacien->nom}}</h4>
                            <p class="card-text">{{$pharmacien->metier}}</p>
                          </div>
                      </div>
                    </div>
                  @endforeach
                </div>
             
        </div>
      </div>
      
    </main>

      
  @endsection