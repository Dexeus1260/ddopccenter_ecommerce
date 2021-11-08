<?php 
require_once 'php_files/header.php';

if(!isset($_SESSION['USER'])){
    header("location: user_login.php");
}else{
    $user = $_SESSION['USER'];
}

?>
<style>
    	
			@import url(https://fonts.googleapis.com/css?family=Roboto);

body{
    font-family: 'Roboto';
    text-align: center;
    overflow: hidden;
    margin: 15;
    padding: 0;
}
#main{
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    text-align: center;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
        -ms-flex-direction: row;
            flex-direction: row;
    -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;				
}

#hello{
    float: left;
    position: relative;
top: 10em;
}
#cons{
   margin-top:10%; 
   
}


h1{
    margin: 0;
    padding: 0;
    float: left;
    letter-spacing: 0.3em;
    position: relative;
}
@-webkit-keyframes animate-con {
      0%{opacity:0;}
      33.3%{opacity: 0;}
      100%{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0;}
  }

 #con
{
    -webkit-animation-name:             animate-con;
    -webkit-animation-duration:         5.5s; 
    -webkit-animation-iteration-count:  1;
    -webkit-animation-timing-function: ease-out;
    }

@-webkit-keyframes animate-one {
      0%{opacity:0;margin-right: 1500px;margin-bottom: 1000px;}
      70%{opacity: 0;}
      100%{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0;}
  }

 #one
{
    -webkit-animation-name:             animate-one; 
    -webkit-animation-duration:         1.5s; 
    -webkit-animation-iteration-count:  1;
    -webkit-animation-timing-function: ease-out;
    }


@-webkit-keyframes animate-two {
      0%{opacity:0;margin-top: 1050px; margin-left: 100px;}
      70%{opacity: 0;}
      100%{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0;}
  }

 #two
{
    -webkit-animation-name:             animate-two; 
    -webkit-animation-duration:         1.5s; 
    -webkit-animation-iteration-count:  1;
    -webkit-animation-timing-function: ease-out;
    }


@-webkit-keyframes animate-three {
      0%{opacity:0;margin-bottom: 1000px;margin-left: 0;margin-right: 0;}
      70%{opacity: 0;}
      100%{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0;}
  }

 #three
{
    -webkit-animation-name:             animate-three; 
    -webkit-animation-duration:         1.5s; 
    -webkit-animation-iteration-count:  1;
    -webkit-animation-timing-function: ease-out;
    }


@-webkit-keyframes animate-four {
      0%{opacity:0;margin-top: 1000px;margin-left: 0;margin-right: 1500px;}
      70%{opacity: 0;}
      100%{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0;}
  }

 #four
{
    -webkit-animation-name:             animate-four; 
    -webkit-animation-duration:         1.5s; 
    -webkit-animation-iteration-count:  1;
    -webkit-animation-timing-function: ease-out;
    }


@-webkit-keyframes animate-five {
      0%{opacity: 0;}
      70%{opacity: 0;}
      100%{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0;}
  }

 #five
{
    -webkit-animation-name:             animate-five; 
    -webkit-animation-duration:         1.5s; 
    -webkit-animation-iteration-count:  1;
    -webkit-animation-timing-function: ease-out;
    }

</style>

<!DOCTYPE html>
<html>
<body>

<div id="main">
    
		<div id="hello">
		<h1 id="one">H</h1>
		<h1 id="two">E</h1>
		<h1 id="three">L</h1>
		<h1 id="four">L</h1>
		<h1 id="five">O</h1>
        
        <h1> &nbsp;<b><?php echo strtoupper($user)?></b></h1>
		</div>

        
</div>
   
        
            <img src="img/158667.gif" height="500" width="600" id="cons">
        
            <div class="container"> 
              
                 <div class="row">  
                      <div class="col align-self-center mt-3">
                        <a href="#" class="btn btn-primary btn-user btn-lg" data-toggle="modal" data-target="#UlogoutModal" >
                            Logout
                        </a>   
                  
                        </div>
                      
                 </div>
            </div>
          



     <div class="modal fade" id="UlogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="user_logout.php">Logout</a>
                </div>
            </div>
        </div>

     </div>


<?php require_once 'php_files/footer.php'?>

