<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>논문</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body id="all">
    <?php if($_SESSION['id']==null){?>
    <div class="user">
        <ul>
            <li><a class="topLink" href="#">회원가입</a></li>
            <li><a>｜</a></li>
            <li><a class="topLink" href="#">로그인</a></li>
            <li><a>｜</a></li>
            <li><a class="topLink" href="main.php">홈으로</a></li>
        </ul>
    </div>
    <?php }else {?>
    <div class="user">
        <ul>
            <li><a class="topLink" href="#">로그아웃</a></li>
            <li><a>｜</a></li>
            <li><a class="topLink" href="main.php">홈으로</a></li>
            <li><a>｜</a></li>
            <li><?echo $_SESSION['name']." 회원님"; ?></a></li>
        </ul>
    </div>
    <?php }?>

    <header>
        <div>
            <span>MY</span> C
        </div>
    </header>

    <nav>
        <div class="nav_menu">
            <ul>
                <li class="menu1">
                    <a>메뉴1</a>
                    <ul>
                        <li><a href="tab.php">메뉴1-1</a></li>
                    </ul>
                </li>
                <li class="menu2" href="#">
                    <a>메뉴2</a>
                    <ul>                        
                        <li><a href="#">메뉴2-1</a></li>
                        <li><a href="#">메뉴2-2</a></li>
                    </ul>
                </li>
                <li class="menu3" href="#">
                    <a>메뉴3</a>
                    <ul>
                        <li><a href="#">메뉴3-1</a></li>
                        <li><a href="#">메뉴3-2</a></li>
                    </ul>
                </li>
                <li class="menu4" href="#">
                    <a>메뉴4</a>
                    <ul>
                        <li><a href="#">Q&A</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    
</body>
</html>