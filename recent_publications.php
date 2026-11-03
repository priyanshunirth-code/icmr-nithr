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
  padding: 12px; /* Reduced padding for a more compact look */
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
}

/* Publication Card */
.publication-card {
  flex: 0 0 auto;
  width: 240px; /* Slightly increased width for better spacing */
  height: 200px; /* Balanced height */
  border-radius: 12px;
  background-size: cover;
  background-position: center;
  color: #1E3A8A; /* Deep professional blue */
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  margin-right: 12px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 8px; /* Optimal padding inside the card */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.publication-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

/* Card Body */
.card-body {
  position: relative;
  padding: 2px;
  background: rgba(30, 58, 138, 0.85); /* Deep Blue with transparency */
  border-radius: 10px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
}

/* Card Title */
.card-title {
  font-size: 15px; /* Readable size */
  font-weight: bold;
  color: #FACC15; /* Elegant golden yellow */
  text-transform: uppercase;
}

/* Card Text */
.card-text {
  font-size: 12px;
  color: white;
  font-weight: 500;
}

/* Professional Button Styling */
.btn-primary {
  background-color: #FF6B6B; /* Vibrant Coral Red */
  border: none;
  border-radius: 8px; /* Balanced edges */
  padding: 8px 14px; /* Optimal padding */
  font-size: 14px;
  font-weight: 600;
  color: white;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  display: inline-block;
  text-align: center;
}

.btn-primary:hover {
  background-color: #E63946; /* Slightly darker red */
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.btn-primary:active {
  background-color: #C62828; /* Even darker red */
  transform: translateY(0);
}

/* Hover Effect on Card */
.publication-card:hover .btn-primary {
  background-color: white;
  color: #E63946;
  border: 2px solid #E63946;
}

/* Keyframes for Smooth Movement */
@keyframes move {
  0% {
    transform: translateX(100%);
  }
  100% {
    transform: translateX(-100%);
  }
}

/* Pause Animation on Hover */
.publication-container:hover {
  animation-play-state: paused;
}

/* Styling for h2 */
h2 {
  color: #1E293B;
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 30px;
  text-align: center;
}

/* Responsive Design */
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

  .btn-primary {
    padding: 6px 12px;
    font-size: 13px;
  }

  h2 {
    font-size: 20px;
  }
}

@media (max-width: 480px) {
  .publication-card {
    width: 100%;
    height: 160px;
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
