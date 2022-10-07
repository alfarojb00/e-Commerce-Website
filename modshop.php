<?php
include 'includes/session.php';
include 'includes/header.php';
include 'includes/navbar.php';
$page = (int) $_GET['page'];
$sort = $_GET['sortBy'];
$showperpage = 12;
$conn = $pdo->open();

try {

    if (isset($sort)) {
        if ($sort == "ASC") {
            $query = 'SELECT * FROM products ORDER BY price ASC LIMIT :page , :per ';
        } else {
            $query = 'SELECT * FROM products ORDER BY price DESC LIMIT :page , :per ';
        }

        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $stmt = $conn->prepare($query);

        $stmt->execute(['page' => ($page - 1) * $showperpage, 'per' => $showperpage]);
    } else {
        $query = "SELECT * FROM products LIMIT ? , ?";
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $stmt = $conn->prepare($query);
        $stmt->execute([($page - 1) * $showperpage, $showperpage]);
    }

    $result = $stmt->fetchAll();
    $stmt = $conn->prepare("SELECT COUNT(*) FROM products");;
    $stmt->execute();
    $total = $stmt->fetchAll()[0]['COUNT(*)'];
} catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();


?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Distributor</title>

<style>
@media (max-width: 575.98px) { 
    #nav-header .container{
        width:auto;
    }
    .navbar-header{
        
    }
    #nav-header .carticon{
        position:relative;
        right:400px;
        top:8px;
    }
    #nav-header .loginnav{
        position:relative;
         
        top:8px;
    }
    #nav-header .signinnav{
        position:relative;
        top:8px;
    }
    #nav-header .LOGO{
        float:left;   
        position:relative;
        left:-12px;
        bottom:8px;
      }
    
    
            body    {
            background: #ebebeb;
            display:block;
            width:auto;
        }

        .bodywrap {
            display:flex;
            /* padding-left: 10%;
            padding-right: 10%; */
        }

        .box-body {
            background: #ebebeb;
            margin-bottom: 20px;
        }   
         .Searchbar{
            margin-left: 6%;
            margin-top: 60px;
            width:800px ;
            display:flex;
            align-content:left;
            position:relative;
            top:20px
            left:100px;
            flex-wrap: wrap;
            align-content: center;
         }
         .search {
            
            display:flex;
            flex-wrap: wrap;
            align-content: center;
            position:relative;
            
            padding: 10px;
            font-size: 18px;
            font-weight:500;
            border-radius: 25px;
            border: 1px solid grey;
            float: left;
            width: 35%;
            height: 50px;
            background: #f1f1f1;
            

        }
        #filter .Filterset{
            display:block;  
            width:50%;  
            background-color:green;
        }
         #productbtn {
            border: 1px solid #305A30;
            width: 100%;
        }
        .whole {
            display: flex;
            flex-direction: row;
        }   
        .col-sm-4{
            display:flex;   
        }
}


        body {
            background: #ebebeb;
        }

        .bodywrap {
            /* padding-left: 10%;
            padding-right: 10%; */
        }

        .box-body {
            background: #ebebeb;
            margin-bottom: 20px;
        }
        .Searchbar{
            margin-left: 6%;
            margin-top: 60px;
            display:flex;
            align-content:left;
            position:relative;
            top:20px;
            
            flex-wrap: wrap;
            align-content: center;
            
        }
        .search {
            
            display:flex;
            flex-wrap: wrap;
            align-content: center;
            position:relative;
            
            padding: 10px;
            font-size: 18px;
            font-weight:500;
            border-radius: 25px;
            border: 1px solid grey;
            float: left;
            width: 35%;
            height: 50px;
            background: #f1f1f1;
            
           

        }
        #selectitems {
            margin-bottom: 20px;
        }

        .hover:hover {
            cursor: pointer;
        }

        .whole {
            display: flex;
            flex-direction: row;
        }

        .left,
        .right {
            width: 50%;
        }

        .shop_title {
            background: linear-gradient(135deg, #559E54, #305A30);
            padding: 20px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: row;
        }

        .one {
            width: 10%;
        }

        .two {
            width: 90%;
        }

        .two h5 {
            color: #FFF;
        }

        .twoflex {
            display: flex;
            flex-direction: row;
        }

        .twoleft,
        .tworight {
            width: 50%;
        }

        .shop_title h4 {
            color: #FFF;
            width: 85%;
        }

        .mypurchase {
            border: 1px solid #FFF;
            background: none;
            padding: 10px;
            width: 200px;
            border-radius: 5px;
        }

        #productbtn {
            border: 1px solid #305A30;
            width: 100%;
        }
        .buttoncon{
            position:relative;
            bottom  : 50%;
            border: 1px solid black;    
        }
        .buttonext{
            position:relative;
            border: 1px solid black;
            border-radius: 22px;
        }
    </style>

</head>
<body class="hold-transition skin-blue layout-top-nav">
    <div class="bodywrap">
        <div class="box-body">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                 
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="reseller_mydistributor.php" style="color: #305A30;">Shop</a></li>
                </ol> -->
                            
                
                 
                <div class= "Searchbar" >
                
                        <input class="search" onchange="search(this)"  placeholder="Search.." />
                        
                        <img src="https://cdn-icons-png.flaticon.com/512/8367/8367586.png " width="36px" height="38px" position="relative"  onclick="filterClicked()"/>
                   <!-- <img src="https://img.icons8.com/search " width="50px"/>  -->
                    </div>
                    
                    
                        <div class="Filterset">
                        <div style="width:40%;
                        position:relative;
                        top:40px;
                        left:20px;
                        background:white;
                        z-index:2;
                        display:none;" 
                        id="filter" >
                            <ul style="list-style: none;">
                                Sort By:

                                <li>
                                    <a 
                                        style="text-decoration:<?php echo str_contains($_SERVER['REQUEST_URI'], "sortBy=DESC")?"underline":"none"?>"
                                    href="<?php echo str_contains($_SERVER['REQUEST_URI'], "sortBy=ASC") ? str_replace("ASC", "DESC", $_SERVER['REQUEST_URI']) : $_SERVER['REQUEST_URI'] . "&sortBy=DESC"; ?> ">Price:Highest to Lowest</a>
                                </li>
                                <li>
                                    <a
                                    style="text-decoration:<?php echo str_contains($_SERVER['REQUEST_URI'], "sortBy=ASC")?"underline":"none"?>"
                                     href="<?php echo str_contains($_SERVER['REQUEST_URI'], "sortBy=DESC") ? str_replace("DESC", "ASC", $_SERVER['REQUEST_URI']) : $_SERVER['REQUEST_URI'] . "&sortBy=ASC"; ?>">Price:Lowest to Highest</a>
                                </li>

                            </ul>

                        </div>
                        </div>
                    </div>

                    <div id="search" style="width:79%;position:absolute;background:white;padding:50px;z-index:2;display:none;">


                    </div>
                </div>
            </nav>
        </div>
       
    </div>
    

    <?php
    
   
    
    foreach ($result as $key => $value) {
        
    ?>
        <div class='col-sm-4'>
            <div class='box box-solid'>
                <div class='box-body prod-body'>
                    <img src='images/<?php echo $value['photo']; ?>' width='100%' height='340px' class='thumbnail'>
                    <h5><a href='product.php?product=<?php echo $value['slug']; ?>'></a></h5>
                </div>
                <div class='box-footer'>
                    <h5><a href='product.php?product=<?php echo $value['slug']; ?>'><?php echo $value['name']; ?></a></h5>
                    <b><?php echo "₱" . number_format($user['user_type']=="Distributor"? $value['price'] - ($value['price'] * .25) : $value['price'], 2) ?></b>
                </div>
            </div>
        </div>


        
    <?php
    }
    ?>
    <ul>        
        <?php
        for ($i = 0; $i < $total / $showperpage; $i++) {
        ?>
            <a href="modshop.php?page=<?php echo $i + 1 ?>" class="buttonext" style=" padding: 5px; text-decoration:underline"><?php echo $i + 1 ?></a>
        
        <?php
        }
        ?>
    </ul>

    <?php include 'includes/scripts.php'; ?>
    <script>
        async function search(text) {
            if (text.value == "") {
                $('#search').hide();
                return;
            }
            $.ajax({
                url: `itemsearch.php?item=${text.value}`,
                type: "GET",
                contentType: "text/plain",
                processData: false, // avoid the data being parsed to query string params
                success: (data) => {
                    $('#search').empty();
                    $('#search').append(data.trim());
                    $('#search').show();


                },

            });

        }
        function filterClicked(){
            
            if($('#filter').css('display')=="none"){
                $('#filter').show()
            }else{
                $('#filter').hide()
            }
            
        }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>
