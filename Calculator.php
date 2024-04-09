<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="CSS/main.css">
    <title>Calculator</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="grid_container">
            <input type="number" name="num01" placeholder="Number one">
            <select name="operator">
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>
            <input type="number" name="num02" placeholder="Number two">
        <button>Calculate</button>
        </div>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){

        //Grab Data
        $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
        $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST["operator"]);

        //Error handlers
        $errors = false;

        if(empty($num01) || empty($num02) || empty($operator)){

            echo "<p class='calc_error'> Fill in all fields!</p>";
            $errors = true;
        }

        if(!is_numeric($num01) || !is_numeric($num02)){
            echo "<p class='calc_error'> Only wirte numbers!</p>";
            $errors = true;
        }

        //Calculate the numbers if no erros

        if(!$errors){
            $total = 0;
            switch($operator){
                case "add":
                    $total = $num01 + $num02;
                    break;
                case "subtract":
                    $total = $num01 - $num02;
                    break;
                case "divide":
                    $total = $num01 / $num02;
                    break;
                case "multiply":
                    $total = $num01 * $num02;    
                    break;   
                default:
                    echo "<p class='calc_error'> Something went horribly wrong!</p>";        
            }

            echo "<p class='total'>Result = " . $total . "</p>";


        }
    }
    

    ?>
</body>
</html>