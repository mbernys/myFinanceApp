<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <h1 class="header p-4 text-center text-primary">myFinanceApp</h1>
<form  class="p-3 mb-2 bg-light text-dark rounded border border-primary text-center" action="/myFinanceApp/Users/Login" method="post">
    <div class="form-group">
        <h1>Login form</h1>
        <hr/>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-6 text-right pr-2">
                <label for="email">Login / Email</label>
            </div>
            <div class="col-6 text-left pl-2">
                <input class="bg-light text-dark rounded" type="email" name="email" id="email">
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-6 text-right pr-2">
        <label for="password">Password</label>
            </div>
            <div class="col-6 text-left pl-2">
        <input class="bg-light text-dark rounded" type="password" name="password" id="password">
            </div>
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary mr-2" type="submit" name="submit">Sign in!</button>
    </div>
</form>
    <div class="mt-4 text-center">
        <a class="text-secondary" href="../Users/Add">Create account!</a>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
</body>
</html>
