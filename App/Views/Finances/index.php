<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <h1>Hello! <?php echo $_SESSION['username']; ?></h1>
    <p>I have already built my first successful startup -> commercial applications in structured PHP
        and I am professionally developing in broad-spectrum programming.
        I already know I think pretty well:</p>
    <ul>
        <li>PHP Structural</li>
        <li>PHP<->MySQL communication via mySQLi (XAMPP)</li>
        <li>PHP<->MSSQL Communication (IIS)</li>
        <li>JavaScript (forms validations)</li>
        <li>AJAX</li>
        <li>CSS</li>
        <li>Bootstrap</li>
        <li>C#<->Siemens PLC communication</li>
    </ul>
    <p>I wrote this application to learn: </p>
    <ul>
        <li>PHP OOP</li>
        <li>PDO Library</li>
        <li>MVC model</li>
        <li>Git</li>
        <li>GitHub</li>
    </ul>
    <p>I hope it will also be useful for managing your home budget :)</p>
    <p>Please Enjoy, comment my mistakes, write suggestions on <a target="_blank" href="https://mbernys@github.com/mbernys/myFinanceApp">My GitHub</a></p>
    <p><a class="btn btn-primary mr-2" href="/myFinanceApp/Home/Login">Sign in!</a><a class="btn btn-secondary" href="/myFinanceApp/Users/Add">Create account!</a></p>

    <div class="alert <?php if(!empty($this->vars['validation'])){ echo $this->vars['validation']['color_class'];}?>" role="alert"><?php if (!empty($this->vars['validation'])){ echo $this->vars['validation']['errors']; } ?></div>

</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
</body>
</html>
