<body class ="about">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">My Webpage</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Sign Up.php">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Log In.php">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
include_once("sql/db_connect.php");
include_once("templates/header.php");
?>

<div class="container my-4">
    <h1>Home</h1>
    <img src="images/banner.jpg" class="img-fluid" alt="Banner">
    <p>This is a website that helps you learn. Results guaranteed! Get ahead of your class, give yourself a head start.</p>
    <ul>
        <li>Access Free KCSE lessons</li>
        <li>Evaluation and teacher SUPPORT</li>
        <li>Flexible payment plans</li>
        <li>Practice Questions</li>
    </ul>

    <div class="container my-4">
        <h2>Our Services</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Service</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT name, description, price FROM services";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>{$row['name']}</td><td>{$row['description']}</td><td>Ksh.{$row['price']}</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No services available</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Service Details Form</h2>
        <form action="submit_service.php" method="post">
            <div class="mb-3">
                <label for="serviceName" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="serviceName" name="serviceName" required>
            </div>
            <div class="mb-3">
                <label for="serviceDescription" class="form-label">Service Description</label>
                <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="servicePrice" class="form-label">Service Price</label>
                <input type="number" class="form-control" id="servicePrice" name="servicePrice" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php
include_once("templates/footer.php");
?>

</body>
</html>