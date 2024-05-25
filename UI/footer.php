<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
footer {
    background: #10105a;
    color: #fff;
    padding: 20px;
    text-align: center;
}

footer .motto {
    margin-top: 10px;
    font-size: 1.2rem;
    font-weight: 500;
}

footer .motto {
    margin-top: 10px;
    font-size: 1.2rem;
    font-weight: 500;
    position: relative; /* Added position relative */
    display: inline-block; /* Ensuring inline-block display */
}

footer .motto::after {
    content: ""; /* Adding a pseudo-element */
    position: absolute; /* Position it absolutely */
    bottom: -2px; /* Push it slightly below the text */
    left: 0; /* Align it with the text */
    width: 100%; /* Full width */
    height: 2px; /* Height of the line */
    background-color: transparent; /* Initially transparent */
    transition: background-color 0.3s; /* Smooth transition for background-color */
}

footer .motto:hover::after {
    background-color:darkorange; /* Change background color on hover */
}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <footer>
        <p>&copy; 2024 Ember Transport Services. All Rights Reserved.</p>
        <p class="motto">"Your Journey, Our Passion"</p>
    </footer>
</body>
</html>