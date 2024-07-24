<?php
    require "partials/__header.php";
    ?>

<div id="carouselExampleIndicators" class="carousel slide carousel-fade">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/m-1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/m-2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/m-3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<h3 class="text-center mt-5 fw-semibold fs-2 h2">- EXPLORE CATEGORIES -</h3>

<div class="my-5 d-flex flex-wrap mx-auto justify-content-center" id="cardContainer">
    
    <?php
    $sql_get_categories = "SELECT * FROM `categories`";
    $result = mysqli_query($conn, $sql_get_categories);

    if (!$result) {
        echo "Something Went Wrong, We are working on it, Please try again later.";
    } else {
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card mx-3 shadow border-rounded rounded-4 my-3 p-3" style="width: 25vw;">
                <img src="img/' . $row['category_name'] . '.jpg" class="card-img-top border-rounded rounded-3 img-fluid" alt="' . $row['category_name'] . ' Image">
                <div class="card-body">
                    <h5 class="card-title">' . $row['category_name'] . '</h5>
                    <p class="card-text">' . substr($row['category_description'], 0, 100) . '...</p>
                    <form method="get" action="threads.php">
                    <input type="hidden" id="category_id" name="category_id" value="' . $row['category_id'] . '">
                    <button type="submit" class="btn btn-primary">See Threads</button>
                    </form>
                    </div>
                </div>';
            }
        }

    }
?>
</div>
<?php
    require 'partials/__footer.php';
    ?>
