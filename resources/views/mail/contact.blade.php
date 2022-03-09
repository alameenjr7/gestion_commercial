
<!doctype html>
<html lang="en">

<head>
    <title>Enquiry mail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="m-auto col-xl-6 col-lg-6 col-sm-12">
                <h3>New Enquiry Mail</h3>
                <p>Hey, My name is {{$details['f_name']}} {{$details['l_name']}}</p>
                <p>Email Address : {{$details['email']}}</p>
                <p>Subject : {{$details['subject']}}</p>
                <p>Message : {{$details['message']}}</p>
                <br>
                <br>
				<p>Best Ragards</p>
                <p>Team, AmeenTECH Ecom.</p>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+96"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity=""></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity=""></script>

</body>

</html>
