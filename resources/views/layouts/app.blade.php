<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
		<link href="https://fonts.googleapis.com/css?family=Rasa:400,500,700&display=swap" rel="stylesheet"> 
        <style>
            body,html{
                font-family: 'Rasa', serif;
            }
            .row{
                height: 100%;
            }
            aside .sidebar-container{
                height: 100%;
                background: linear-gradient(to top, #FF8674 0%, #FA4616 100%);
                padding: 20px 0;
                text-align: center;
                color: #fff;
                font-weight: 700;
            }
            aside .sidebar-container h1{
                border-bottom: 1px solid #D74219;
                margin: 0;
            }
            aside .sidebar-container ul{
                list-style: none;
                margin:0;
                padding: 0;
            }
           
            aside .sidebar-container ul li a{
                display: block;
                font-size: 1.3em;
                color: #fff;
                font-weight: 500;
                padding: 5px 0;
                border-bottom: 1px solid #D74219;
                transition: all .5s ease;
            }
            aside .sidebar-container ul li a:hover{
                text-decoration: none;
                background-color: #E03A0D;
            }
            table thead{
                font-size: 1.3em;
            }
            h1{
                margin-top: 20px;
                border-bottom: 1px solid rgba(0,0,0,.1);
            }
        </style>
    </head>
    <body>
        <main class="main-wrapper">
            @yield('content')
        </main>
		<footer>
		
		</footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
	

</html>