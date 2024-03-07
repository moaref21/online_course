<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD With Multiple Image Upload</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>

    <div class="container" style="margin-top: 50px;">
        <div class="row">


            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h3 class="text-center text-danger"><b>Contact Page </b> </h3>
                <div class="form-group">
                    <form action="/sendcontact" method="post" >
                        @csrf
                        <input type="text" name="first_name" class="form-control m-2" placeholder="enter first_name ">
                        <input type="text" name="last_name" class="form-control m-2" placeholder="enter last_name">
                        <input type="text" name="email" class="form-control m-2" placeholder="enter Your Email">
                        <input type="text" name="number" class="form-control m-2" placeholder="enter Your Number">
                        <input type="text" name="subject" class="form-control m-2" placeholder="enter your Subject">
                        <Textarea name="message" cols="20" rows="4" class="form-control m-2" placeholder="enter your message"></Textarea>
                        

                   

                {{-- <input type="text" name="title" class="form-control m-2" placeholder="title"> --}}

                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div>
            <div>
            </div>

           