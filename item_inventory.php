<?php
include 'includes/session.php';
include 'includes/header.php';
include 'includes/navbar.php';


try {
    if ($user['user_type'] == "Reseller") {
        $query = "SELECT *,reseller_orders.id as orderID  FROM reseller_orders INNER JOIN products on reseller_orders.product_id = products.id INNER JOIN users on reseller_orders.dist_id = users.id  WHERE reseller_id = ? ";
    } else {
        
        $query = "SELECT * FROM distributor_inventory d INNER JOIN products p on d.productid = p.id WHERE userid = ?";
    }

    $stmt = $conn->prepare($query);
    $stmt->execute([$user['id']]);

    $data = $stmt->fetchAll();
} catch (\Throwable $th) {
    throw $th;
}

?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="custom.css">
    <title>My Distributor</title>

<style>
    @media (max-width: 575.98px) {
        .bodywrap {
            display:flex;
            padding-left: 10%;
            padding-right: 10%;
        }

        .box-body {
            display:block;
            width:480px;
            position:relative;
            top:150px;
            right:26px;    
            background: #FFF;
            padding-top:50px;
            margin-bottom: 20px;
        }
        
    }
    
        body {
            background: #ebebeb;
        }

        .bodywrap {
            padding-left: 10%;
            padding-right: 10%;
        }

        .box-body {
            position:relative;
            top:150px;
            background: #FFF;
            padding-top:50px;
            
            margin-bottom: 20px;
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
    </style>

</head>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="bodywrap">
        <div class="box-body">
            <?php
                if($user['user_type']!="Distributor"){
            ?>
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="reseller_mydistributor.php" style="color: #305A30;">My Inventory</a></li>
                </ol>
            </nav>
            <?php
                }
            ?>
            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th> Order ID</th>
                        <th>Product Name: </th>
                        <th>Quantity</th>
                        <?php
                            if($user['user_type']!="Distributor"){
                        ?>
                        <th>Distributor</th>

                        <?php
                            }
                        ?>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>



    <?php include 'includes/scripts.php'; ?>
    <script>
        <?php
        if (count($data) > 0) {


            ?>
            var c = [];
            <?php
            foreach ($data as $key => $value) {
                
                if($user['user_type']!="Distributor"){
            ?>

            
            c.push({
                    orderID: <?php echo $value['orderID'];?>,
                    productName: '<?php echo $value['product_name'];?>',
                    quantity: <?php echo $value['product_quantity'];?>,
                    distributor: '<?php echo $value['firstname'] . " " . $value['lastname'];?>',
                    action: '<?php echo $value['slug'];?>'
                });
            <?php
                }else{
            ?>
c.push({
                    orderID: <?php echo $value['dist_inventoryid'];?>,
                    productName: '<?php echo $value['name'];?>',
                    quantity: <?php echo $value['inventoryquantity'];?>,
                    action: '<?php echo $value['slug'];?>'
                });
        <?php
                }
            }
        } else {
        ?>
            var c = [];
        <?php
        }

        if($user['user_type'] == 'Distributor'){
        ?>

$('#datatable').DataTable({
            ordering: true,
            pageLength: 20,
            data: c,
            columns: [{
                    title: "Order ID",
                    data: "orderID",
                },
                {
                    title: "Product Name",
                    data: "productName",
                },
                {
                    title: "Quantity",
                    data: "quantity",
                },
                {
                    title: "Action",
                    class: "center",
                    data: "action",
                    render: function(data, type, full, meta) {
                        return `<a href="product.php?product=${data}">ORDER</a>`
                    },
                }

            ],
            buttons: [
                'copy', 'excel', 'pdf', 'csv', 'print'
            ],
           
        });
        <?php
        }else{
        ?>
        $('#datatable').DataTable({
            ordering: true,
            pageLength: 20,
            data: c,
            columns: [{
                    title: "Order ID",
                    data: "orderID",
                },
                {
                    title: "Product Name",
                    data: "productName",
                },
                {
                    title: "Quantity",
                    data: "quantity",
                },
                
                {
                    title: "Distributor",
                    data: "distributor",
                },
                
                {
                    title: "Action",
                    class: "center",
                    data: "action",
                    render: function(data, type, full, meta) {
                        return `<a href="product.php?product=${data}">ORDER</a>`
                    },
                }

            ],
            buttons: [
                'copy', 'excel', 'pdf', 'csv', 'print'
            ],
           
        });
        <?php
        }
        ?>
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>