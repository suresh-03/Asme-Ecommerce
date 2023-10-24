<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!--custom css -->
    <link rel="stylesheet" href="/asme/styles/style.css">
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- fontawesome-link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="container-fluid" style="display: flex; justify-content:center; align-items:center; height:100vh;">
        <form class="sizing-form">
            <div class="mb-1">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="form-control" class="form-control form-control-sm" id="name" aria-describedby="name" required>
            </div>
            <div class="mb-1">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="number" class="form-control form-control-sm" id="mobile" aria-describedby="mobile" required>
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-1">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- bootstrap-javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>