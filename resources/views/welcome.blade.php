@extends('layouts.layapp')

@section('content')

    <!-- Image Main -->

    <div class="container-fluid">
      <img src="../public/img/main.png" class="img-fluid">
    </div>
    <div class="row-sm-12 text-center">
      <!-- Verification si l'utilisateur est connecté -->
      @auth 
        <a href="{{ url('home') }}"><button type="buton" class="btn btn-primary btn-lg">Start now</button></a>
      @endauth

      @guest
        <a href="{{ url('login') }}"><button type="buton" class="btn btn-primary btn-lg">Start now</button></a>
      @endguest
    </div>

    <!-- About -->

    <div class="container-fluid pad" id="about">
      <div class="row jumbotron text-center">        
          <div class="col-sm-12 text-center">
            <p class="lead">This website is a modern digital exam platform made for Polytech's network. We designed the best solution for students and teachers in terms of security and swiftness. The aim of our technology is to improve the passing of Toeic exams by allowing students to focus solely on their goal. We respect privacy and no data will be exploited outside Polytech.</p>
          </div>
          <div class="col-sm-12 text-center">
            <a href="https://www.etsglobal.org" target="_blank">What is the <span class="strong">Toeic</span> ?</a>
          </div>
      </div>
    </div>

    <!-- Build the future -->

    <div class="container-fluid pad pad-bottom">
    <div class="row">
        <div class="col-lg-6">
          <h1 class="my-marginTwo">We build the future...</h1>
          <br>
          <p class="text-justify my-marginTwo">Polytech Montpellier welcomes students from all over the world after a stiff selection & examination of candidates, at two possible levels :
          <br><br>
          - One at post Baccalaureate level, to join the selective two year preparatory programme integrated to the classes offered in the University, in the first year of study (PEIP).
          <br><br>
          - The other is for students who have already completed a minimum of two years at University.
          <br><br>
          The school ensures five years of high quality training which is finalised by the award of the National Degree of Engineering (equivalent to a Master's in Engineering), with obligatory work placements an integral part of the course. There is a core curriculum of traditional subjects such as Mathematics, Project Management, Human Sciences, Modern Languages, Communication and 9 scientific specialties. International Relations are an absolute priority at Polytech Montpellier, with all our students graduate with at least a 2 months experience abroad (summer job, studies or internship).
          <br>
          The Polytech network is made up of 15 Graduate Engineering schools, which are each an integral part of their respective university, and each with their own specific departments.</p>
          <br>
          <a href="https://www.polytech.umontpellier.fr/" target="_blank"><button type="button" class="btn btn-primary my-marginTwo">Visit our school</button></a>
        </div>
        <div class="col-sm-6">
          <img src="../public/img/city.gif" class="gif" style="width:100%;height:auto;">
        </div>
    </div>
    </div>

    <!-- Parallax -->

    <div class="parallax"></div>

    <!-- Features -->

    <div class="container-fluid pad" id="features">
    <div class="row welcome text-center padding">
      <div class="col-12">
        <h1 class="display-4">Features</h1>
      </div>
      <hr>
      <div class="col-12">
        <p class="lead">This website provide robust and intuitives features designed for easy and aesthetic navigation between different services.</p>
      </div>
    </div>
    </div>

    <!-- icons -->

    <div class="container-fluid pad pad-bottom">
    <div class="row text-center">
        <div class="col-xs-12 col-sm-6 col-md-4" style="padding-bottom: 150px">
          <i class="fas fa-user"></i>
          <h4 style="font-weight: bold;">USER</h4>
          <p class="my-marginTwo" style="padding-top: 20px;">You can check your personal account, update your informations and send requests/complaint to professors</p>          
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
          <i class="fas fa-tasks"></i>
          <h4 style="font-weight: bold;">SESSION</h4>
          <p class="my-marginTwo" style="padding-top: 20px;">You can join a session to pass the mock Toeic with other candidates. At the end, you will recieve your answer sheet and score</p>          
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
          <i class="fas fa-chart-pie"></i>
          <h4 style="font-weight: bold;">STATS</h4>
          <p class="my-marginTwo" style="padding-top: 20px;">You can analyze your performance for each Toeic you passed and see your personal progress. You are free to share your score</p>         
        </div>
    </div>
    </div>

    <!-- Parallax -->

    <div class="parallax"></div>

    <!-- Our team -->

    <div class="container-fluid padding" id="team">
    <div class="row welcome text-center">
      <div class="col-12 justify-content-center pad">
        <h1 class="display-4 text-center">Meet the team</h1>
      </div>
      <hr>
      <div class="col-12">
        <p class="lead">Because we know how boring is to correct 200 questions, we created this solution. This saves students and teachers time and prevent errors in corrections.</p>
      </div>
    </div>      
    </div>

    <!-- Cards -->

    <div class="container-fluid pad">
    <div class="row justify-content-center padding">
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="../public/img/people1.jpg">
          <div class="card-body">
            <h4 class="card-title">Solène Issartel</h4>
            <p class="card-text">John is eipfjae aezfaez fazefqsf zrfazf dfzefazef azefaezf ezafefd.</p>
            <a href="#" class="btn btn-outline-primary">See profile</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="../public/img/people1.jpg">
          <div class="card-body">
            <h4 class="card-title">Pierre Perrin</h4>
            <p class="card-text"> John is eipfjae aezfaez fazefqsf zrfazf dfzefazef azefaezf ezafefd.</p>
            <a href="#" class="btn btn-outline-primary">See profile</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="../public/img/people1.jpg">
          <div class="card-body">
            <h4 class="card-title">Chloé Serre-Combe</h4>
            <p class="card-text"> John is eipfjae aezfaez fazefqsf zrfazf dfzefazef azefaezf ezafefd.</p>
            <a href="#" class="btn btn-outline-primary">See profile</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center padding">
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="../public/img/people1.jpg">
          <div class="card-body">
            <h4 class="card-title">Axel Duval</h4>
            <p class="card-text">Etudiant en première année du cursur ingénieur Informatique & Gestion.</p>
            <a href="#" class="btn btn-outline-primary">See profile</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="../public/img/people1.jpg">
          <div class="card-body">
            <h4 class="card-title">Bryan Barbou</h4>
            <p class="card-text"> John is eipfjae aezfaez fazefqsf zrfazf dfzefazef azefaezf ezafefd.</p>
            <a href="#" class="btn btn-outline-primary">See profile</a>
          </div>
        </div>
      </div>
    </div>
    </div>

    <hr class="my-4 padding">

    <!-- Our philosophy -->

    <div class="container-fluid padding">
      <div class="row padding">
        <div class="col-lg-6">
          <img src="../public/img/illustration.jpg" class="image-fluid my-margin" width="600px">
        </div>
        <div class="col-lg-6 text-justify">
          <h1 class="my-marginTwo">Our philosophy</h1>
          <br>
          <p class="my-marginTwo">Because we know how boring is to correct 200 questions, we created this solution. This saves students and teachers time and prevent errors in corrections. Moreover, thanks to the performance monitoring, students are informed of their situations very quickly. Teachers can take steps to help struggling students.<br>Because we know how boring is to correct 200 questions, we created this solution. This saves students and teachers time and prevent errors in corrections. Moreover, thanks to the performance monitoring, students are informed of their situations very quickly. Teachers can take steps to help struggling students.
          </p>
          <br>
        </div>
      </div>
    </div>

    <hr class="my-4 padding">

    <!-- Keep in touch -->

    <div class="container-fluid padding" id="contact">
      <div class="row text-center">
        <div class="col-12 justify-content-center">
          <h1>We keep in touch !</h1>
        </div>
        <div class="col-12 social padding">
          <a href="https://www.facebook.com/ecole.polytechmontpellier/" target="_blank"><i class="fab fa-facebook"></i></a>
          <a href="https://twitter.com/PolytechMontp" target="_blank"><i class="fab fa-twitter"></i></a>
          <a href="https://instagram.com/ecole.polytechmontpellier" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <!-- Footer -->

    <footer class="footer font-small">
      <div class="container-fluid text-center">
        <div class="row text-center">

          <div class="col-md-4">
            <hr class="light">
            <h5>Our place</h5>
            <hr class="light">
            <p>IT & Management</p>
            <p>Polytech Montpellier</p>
            <p>34000, France</p>
          </div>

          <div class="col-md-4">
            <hr class="light">
            <h5>Polytech's network</h5>
            <hr class="light">
            <p>Angers | Annecy-Chambery | Clermont-Ferrand | Grenoble | Lille</p>
            <p>Lyon | Marseille | Montpellier | Nancy | Nantes</p>
            <p>Nice-Sophia | Orléans | Paris-Sud | Sorbonne | Tours</p>
          </div>

          <div class="col-md-4">
            <hr class="light">
            <h5>Contact</h5>
            <hr class="light">
            <p>Reception : 04.67.14.31.60</p>
            <p>Fax : 04.67.14.45.14</p>
            <p>Mail : polytech-responsable-ig@umontpellier.fr</p>
          </div>

          <div class="col-12">
            <hr class="light">
            <h5>&copy; ToeicWebAnalyser</h5>
          </div>

        </div> 
      </div>
    </footer>

@endsection















