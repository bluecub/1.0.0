<?php 

    require_once 'includes/basicFunctions.php';

    session_start();
    if(!basicFunctions::isLoggedIn()){
        header('location: login.php');
    }

    $userObject = $_SESSION['userObject'];

?>


<?php 

    //title of the page(will be diplayed by includes/formHeader.php)
    $title = 'BlueCub-Login';
    
    //including the header
    include_once 'includes/formHeader.php';

?>

<body class="container" id="mainframe">

    <div id="main">
        <div class="post">

        </div>
    </div>


<script src="admin/javascript/feedPage.js"></script>

<?php
    //including footer
    include_once 'includes/footer.php';

?>