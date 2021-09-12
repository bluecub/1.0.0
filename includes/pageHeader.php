<body>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ?></title>
        
        <link rel="icon" href="admin/images/logo.png" type="image/png" sizes="32x32">
        <link href="./admin/stylesheet/simpleGrid/simple-grid1.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="./admin/stylesheet/feedpage.css" type="text/css" rel="stylesheet">
        <link href="./admin/stylesheet/main.css" type="text/css" rel="stylesheet">
        

    </head>

    <!--navbar -->
    <div class="navbar backgroundNav" id="navbarBox">
        <span class="material-icons margin2 md-light noUse none540">drag_indicator</span>
        <input type="search" name="searchBar" id="searchBar"  class="input  margin2 backgroundw none540 borderNone">
        <button type="button" name="search" id="search" class="button backgroundw flex borderNone none540"><span class="material-icons md-18 md-lights none540">search</span></button>

        <div class="centerb margin2 flex none960 none540">
            <a href="a.html" class="links text" id="feedPageLink">FeedPage</a>
            <a href="b.html" class="links  text" id="dashboardLink">DashBoard</a>
            <a href="c.html" class="links text" id="newsLink">News</a>
        </div>
        <div class="replace none flex960 none540">
            <button type="button" class="button borderNone flex margin10 icon" id="" name=""><span class="material-icons md-light">code_off</span></button>
            <button type="button" class="button borderNone flex margin10 icon" id="" name=""><span class="material-icons md-light">space_dashboard</span></button>
            <button type="button" class="button borderNone flex margin10 icon" id="" name=""><span class="material-icons md-light">tips_and_updates</span></button>
        </div>
        <div class="rightb margin2 flex flex960 none540">
            <button type="button" class="button borderNone margin2" id="settings" name="settings"><span class="material-icons md-light">settings</span></button>
            <div><a href="logout.php"  class="button borderNone flex smallScreenIcon" id="logOut" name="logOut"><span class="links material-icons md-light">logout</span></a></div>
        </div>
        <div class="smallScreen none none960">
            <div><button type="button" class="button borderNone flex smallScreenIcon" id="" name=""><span class="material-icons margin2 md-light">drag_indicator</span></button></div>
            <div><button type="button" class="button borderNone flex smallScreenIcon" id="" name=""><span class="material-icons md-light">search</span></button></div>
            <div><button type="button" class="button borderNone flex smallScreenIcon" id="" name=""><span class="material-icons md-light">roofing</span></button></div>
            <div><button type="button" class="button borderNone flex smallScreenIcon" id="" name=""><span class="material-icons md-light">space_dashboard</span></button></div>
            <div><button type="button" class="button borderNone flex smallScreenIcon" id="" name=""><span class="material-icons md-light">tips_and_updates</span></button></div>
            <div><button type="button" class="button borderNone flex smallScreenIcon" id="settings" name="settings"><span class="material-icons md-light">settings</span></button></div>
            <div><a href="logout.php"  class="button borderNone flex smallScreenIcon" id="logOut" name="logOut"><span class="links material-icons md-light">logout</span></a></div>
            
        </div>
    </div>
    <!-- ends here-->
    <!--top bar-->
    <div class="bara backgroundNav">
        <div class="pageName block">FeedPage</div>
        <div class="pageName block" id="lineFont">Your Freinds Have A Few Posts To Show ...</div>
    </div>
    <!-- ends here-->