<link rel="stylesheet" href="styles.css">
    <body bgcolor="#EEE8AA">
    <div id="primeiro">

    <form method="post">
        <h2>Informe valor do troco: </h2>
        <input type="number" name='dinheiro' step='1' autofocus><br>
        <br><input type="submit" value='Distribuir'>
    </form>
    
    <?php
    if(isset($_POST['dinheiro'])) {
        $notas = [100, 50, 20, 10, 5, 2, 1];
        $valor = $_POST['dinheiro'];
        $display = null;
        foreach ($notas as $v) {

            $cedulas[$v] = null;
            while ($valor >= $v) {
                $cedulas[$v] +=1;
                $valor-=$v;
            }
            $display .=$cedulas[$v] ? "<p>$cedulas[$v] * R$ $v,00</p>": null;
        }
    

    $msg = '<p class="error">Valor não pode ser distribuído nas notas disponíveis.<br>Faltaria R$ '. $valor . ',00<br>Tente outro valor.</p>';
    if ($valor == 0) {
        $msg = '<p class="ok">Valor OK! Distribuir: R$ '. (int) $_POST['dinheiro'] . ',00</p>'. $display;
    }
    echo $msg;
    }   
    ?>
    </div>
