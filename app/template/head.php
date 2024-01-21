<!doctype html>
<html>

<head>
    <title></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Selenite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/calculator">Calculator</a>
                    </li>
                    <!-- <li class="nav-item"> -->
                    <!--     <a class="nav-link" href="/guides">Guides</a> -->
                    <!-- </li> -->
                    <?php
            if (@$_SESSION['username'] == null) {
                echo '
                <li class="nav-item">
                    <a class="nav-link" href="/login">Log In/Register</a>
                </li>
                ';
            } else {
                echo '
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile: '
                    .$_SESSION['username'].
                    '</a>
                </li>
                ';
            }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
