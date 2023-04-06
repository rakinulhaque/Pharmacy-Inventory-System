<!DOCTYPE html>

<html>
    <head>
        <title>Pharmacy Management System</title>
      
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">       
        <link rel="stylesheet" type="text/css" href="{{asset('/')}}asset/css/bootstrap.min.css"/>       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <style>
     
     
body{
    margin:7px;
    color:black;
}

table{

    border:1px solid black;

}

#wrapper{
    width: 100%;
    height: 60px;
}

#header_wrapper{
    width: 100%;
    height: 150px;

}

#menu{
    background-color:#1C919D;
    color:white;
    width: 100%;
    height: 55px;
    margin-bottom: .3%;
}

#menu ul{
    padding: 0px;
    margin:0px auto;

}

#menu ul li{
    list-style: none;
    float:left;
    width: 8%;
    text-align: center;
    padding: 15px;
    margin-right: 0px;
    transition:1s;

    text-transform: uppercase;

    position: relative;
    display: inline-block;
}
#menu ul li ul{

    display: none;
    position: absolute;
    width: 100%;
    padding: 10px;
    text-decoration: none;
    border: 1px solid black;
    margin: 15px -14px;

}

#menu ul li ul li{
    display: block;
    border-radius: 0px;
    margin:2px;
    padding: 2px;
    float:none;
    font-size: 14px;
    width: 100%;

}
#menu ul li ul li a{   
    color: white;
}

#menu ul li ul li:hover {
    border-bottom: 2px solid white;
    background:none;
    transition:.01s;
}

#menu ul li a{
    text-decoration: none;
    color: white;
    font-size: 18px;
}
#menu ul li:hover ul{
    display: block; 
}

#menu ul li:hover{
    background: #006778;
    color: white;
    transition:0.08s;
}

.section{

    background-color: #white;
    width:100%;
    height: 750px;

}
.dashboard{


    width:100%;
    height: 788px;
        background-size: 100% 700px ;
        background-attachment: fixed;

}

.footer{   
    height:100px;
}

.footer_p{
    font-weight: bold; 
    padding: 30px;
}



.oneline:hover{

    background:whitesmoke;
    color: black;
    transition:0.08s;

}

.form-row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: 4px;
    margin-left: 4px;
}
.center{
    background-color: #333333;
    margin-left: 533px;
    margin-bottom: 10px;
}
   </style>
   
   
    </head>

    <body>

        <div class="" id="wrapper">
            <div class="bg-bg-info" id="menu">                          
                <ul>
                    <a style="color:white;"  href="{{url('/')}}"><li>DASHBOARD</li></a>      

                    <li  style="margin-left:15%;" ><a href="#">Supplier</a>
                        <ul class="bg-dark">
                            <li> <a href="{{url('/add-supplier')}}" > Add </a></li>
                            <li><a href="{{url('/manage-supplier')}}" >View</a> </li>                                   
                        </ul>  
                    </li>              
                    <li><a href="#">product</a>
                        <ul class="bg-dark">
                            <li> <a href="{{url('/add-product')}}" > Add </a></li>
                            <li><a href="{{url('/manage-product')}}" >View</a> </li>                               
                        </ul>  
                    </li>
                    <li><a href="{{url('/purchase')}}">Item</a> </li>
                    <li><a href="{{url('/stoke')}}">Stock</a> </li>
                    <li><a href="{{url('/sale')}}">Sale</a> </li>
                    <li><a href="{{url('/report')}}">Report</a> </li>                    
                </ul>

                <div  style="color:white;">
                        <a style="margin-top:10px; margin-left:15%; color: white; list-style:none;"  href="#" class="dropdown-toggle" data-toggle="dropdown">                                
                                    <span class="username">{{ Auth::user()->name }}</span>
                                    <b class="caret"></b>
                                </a>

                                <ul class="dropdown-menu extended logout">
                                    <li style="width:100%; height: 40px" >
                                        <form  action="{{ route('logout') }}" method="POST">
                                            @csrf                                  
                                            <button type="submit" style="border:0px; width:100%; background: none;color:grey; margin-top:7px;margin-bottom:0px;"><b><i class="icon-key"></i>Log Out</b></button>
                                        </form>
                                    </li>

                                </ul>

                </div>
                

    

            </div>

        </div>  
        <!---------------------------------------------------------------------------------->               


        <section class="section"> 

            @yield('dashboard')
            <div class="Space_" style="height: 100px; width:100%; "></div>  

            @yield('content')

        </section>


        <!---------------------------------------------------------------------------------------->
        <section class="footer bg-info text-warning text-center">
            <p class="footer_p">Tayful's Property</p>
        </section>


        <script src="{{asset('/')}}asset/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>

</html>