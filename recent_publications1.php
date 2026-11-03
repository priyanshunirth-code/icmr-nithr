<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recent Publications</title>

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
  /* Page background */
/* Page background */
body {
  color: white;
  font-family: 'Poppins', sans-serif;
}

.wrapper {
  padding: 20px;
}

.text-center {
  text-align: center;
}

.publication-highlight-box {
  padding: 12px;
  background-color: white;
}

.publication-marquee {
  width: 100%;
  overflow: hidden;
  position: relative;
  margin-top: 0px;
}

.publication-container {
  display: flex;
  animation: move 17s linear infinite;
  will-change: transform; /* Optimizes animation */
}

.publication-card {
  flex: 0 0 auto;
  width: 230px; /* Reduced width */
  height: 200px; /* Reduced height */
  border-radius: 15px;
  background-size: cover;
  background-position: center;
  color: #4A90E2;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  margin-right: 10px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

/* Hover Effect for Card */
.publication-card:hover {
  transform: scale(1.05); /* Slightly enlarge card */
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15);
}

.card-body {
  position: relative;
  padding: 5px;
  background: rgba(74, 144, 226, 0.85);
  border-radius: 40px 12px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
}

.card-title {
  font-size: 16px;
  font-weight: bold;
  color: #FFD700;
}

.card-text {
  font-size: 12px;
  color: white;
}

.btn-primary {
  background-color: #FFD700;
  border: none;
  border-radius: 30px;
  padding: 8px 30px;
  font-size: 12px;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

/* Button Hover Effect */
.btn-primary:hover {
  background-color: #B8860B;
  transform: scale(1.1);
}

/* Marquee Animation */
@keyframes move {
  0% {
    transform: translateX(100%);
  }
  100% {
    transform: translateX(-100%);
  }
}

/* Ensure Animation Works */
.publication-container:hover {
  animation-play-state: paused;
}

/* Styling for h2 */
h2 {
  color: black;
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 30px;
}

/* Media Queries */
@media (max-width: 768px) {
  .publication-container {
    flex-direction: column;
    align-items: center;
  }

  .publication-card {
    width: 100%;
    height: 180px;
    margin-bottom: 15px;
  }

  h2 {
    font-size: 20px;
  }
}

@media (max-width: 480px) {
  .publication-card {
    width: 100%;
    height: 170px;
  }

  h2 {
    font-size: 18px;
  }
}

</style>
</head>

<body>
  <div class="wrapper">
    <!-- Main Content -->
    <div class="container my-5">
      <h2 class="text-center mb-4">RECENT PUBLICATIONS</h2>

      <div class="publication-highlight-box">
        <div class="publication-marquee">
          <div class="publication-container" id="publicationMarquee">
            <!-- Publication 1 -->
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Hypertension and Cardiovascular Health</h5>
                <p class="card-text">Hypertension's significant impact on cardiovascular outcomes globally.</p>
                <a href="https://www.nature.com/articles/s41371-022-00742-5" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            <!-- Publication 2 -->
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Women's Health in Modern Society</h5>
                <p class="card-text">An in-depth analysis of health issues faced by women globally.</p>
                <a href="https://www.tandfonline.com/doi/full/10.1080/03630269.2024.2356607" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            <!-- Publication 3 -->
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Advances in Malaria Research</h5>
                <p class="card-text">Insights into new strategies for malaria prevention and treatment.</p>
                <a href="https://link.springer.com/article/10.1007/s13337-022-00789-5" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            <!-- Publication 4 -->
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Exploring Pediatric Tuberculosis</h5>
                <p class="card-text">A comprehensive review of pediatric tuberculosis in urban regions.</p>
                <a href="https://www.sciencedirect.com/science/article/pii/S258900422400885X?via%3Dihub" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            <!-- Publication 5 -->
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Hematology and Immune Disorders</h5>
                <p class="card-text">Latest research on hematological diseases and immune responses.</p>
                <a href="https://onlinelibrary.wiley.com/doi/10.1111/bjh.19829" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>

            <!-- Publication 6 -->
            
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Neonatal mortality in Indian tribal communities.</h5>
                <p class="card-text">Insights into neonatal mortality in tribal communities in India.</p>
                <a href="https://doi.org/10.1242/dev.201581" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            <!-- Publication 7 -->
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Scrub Typhus in India: The Untold Burden</h5>
                <p class="card-text">Review of the prevalence and burden of scrub typhus across India.</p>
                <a href="https://doi.org/10.1007/s13337-023-00851-5" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            <!-- Publication 8 -->
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Burden of Malaria in Eastern India</h5>
                <p class="card-text">Study on the ongoing burden of malaria in rural Eastern India.</p>
                <a href="https://www.sciencedirect.com/science/article/pii/S002235491930324X" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            <!-- Publication 9 -->
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Factors Affecting Mental Health in Urban Areas</h5>
                <p class="card-text">Research on mental health factors affecting urban populations in India.</p>
                <a href="https://www.journals.elsevier.com/journal-of-mental-health" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            <!-- Publication 10 -->
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Diabetes & heart risk in India</h5>
                <p class="card-text">Study on the prevalence of diabetes and cardiovascular risk in India.</p>
                <a href="https://www.elsevier.com/en-xm/solutions/diabetes-journal" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    // Pause animation when hovering over a publication card
    document.querySelectorAll('.publication-card').forEach(card => {
      card.addEventListener('mouseenter', function () {
        document.getElementById('publicationMarquee').classList.add('paused-animation');
      });

      card.addEventListener('mouseleave', function () {
        document.getElementById('publicationMarquee').classList.remove('paused-animation');
      });
    });
  </script>
</body>

</html>
